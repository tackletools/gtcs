<?php
/**
 * Dashboard Data AJAX Handler
 * Provides data for dashboard widgets and charts
 */
require_once '../config/config.php';

// Check if user is logged in
if (!is_logged_in()) {
    json_response(false, 'Unauthorized access');
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'stats':
        getDashboardStats();
        break;
        
    case 'recent_leads':
        getRecentLeads();
        break;
        
    case 'pending_followups':
        getPendingFollowups();
        break;
        
    case 'lead_chart_data':
        getLeadChartData();
        break;
        
    case 'conversion_chart_data':
        getConversionChartData();
        break;
        
    case 'monthly_performance':
        getMonthlyPerformance();
        break;
        
    case 'top_performers':
        getTopPerformers();
        break;
        
    case 'recent_activities':
        getRecentActivities();
        break;
        
    case 'quota_progress':
        getQuotaProgress();
        break;
        
    case 'lead_sources':
        getLeadSources();
        break;
        
    default:
        json_response(false, 'Invalid action');
}

function getDashboardStats() {
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];
    
    $stats = get_dashboard_stats($user_id, $user_role);
    
    // Additional stats for dashboard
    $additional_stats = [];
    
    // Build WHERE clause based on user role
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause = 'WHERE assigned_to = ?';
        $params[] = $user_id;
        $types .= 'i';
    }
    
    // This month's leads
    $month_where = $where_clause ? $where_clause . " AND MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())" 
                                : "WHERE MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())";
    
    $query = "SELECT COUNT(*) as count FROM leads $month_where";
    $result = fetch_single($query, $params, $types);
    $additional_stats['this_month_leads'] = $result['count'];
    
    // This month's conversions
    $conversion_where = $where_clause ? $where_clause . " AND status = 'converted' AND MONTH(updated_at) = MONTH(CURDATE()) AND YEAR(updated_at) = YEAR(CURDATE())"
                                     : "WHERE status = 'converted' AND MONTH(updated_at) = MONTH(CURDATE()) AND YEAR(updated_at) = YEAR(CURDATE())";
    
    $query = "SELECT COUNT(*) as count FROM leads $conversion_where";
    $result = fetch_single($query, $params, $types);
    $additional_stats['this_month_conversions'] = $result['count'];
    
    // Total quotations
    $quote_where = '';
    if ($user_role === 'executive') {
        $quote_where = 'WHERE created_by = ?';
    }
    
    $query = "SELECT COUNT(*) as count FROM quotations $quote_where";
    $quote_params = $user_role === 'executive' ? [$user_id] : [];
    $quote_types = $user_role === 'executive' ? 'i' : '';
    $result = fetch_single($query, $quote_params, $quote_types);
    $additional_stats['total_quotations'] = $result['count'];
    
    // Total quotation value this month
    $quote_value_where = $user_role === 'executive' ? 'WHERE created_by = ? AND MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())'
                                                   : 'WHERE MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())';
    
    $query = "SELECT SUM(total_amount) as total FROM quotations $quote_value_where";
    $result = fetch_single($query, $quote_params, $quote_types);
    $additional_stats['this_month_quote_value'] = $result['total'] ?? 0;
    
    // Conversion rate
    if ($stats['total_leads'] > 0) {
        $additional_stats['conversion_rate'] = round(($stats['converted_leads'] / $stats['total_leads']) * 100, 2);
    } else {
        $additional_stats['conversion_rate'] = 0;
    }
    
    // Merge stats
    $final_stats = array_merge($stats, $additional_stats);
    
    json_response(true, 'Stats retrieved', $final_stats);
}

function getRecentLeads() {
    $limit = (int) ($_GET['limit'] ?? 10);
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause = 'WHERE l.assigned_to = ?';
        $params[] = $user_id;
        $types .= 'i';
    }
    
    $query = "SELECT l.*, u.name as assigned_user 
              FROM leads l 
              LEFT JOIN users u ON l.assigned_to = u.id 
              $where_clause 
              ORDER BY l.created_at DESC 
              LIMIT ?";
    
    $params[] = $limit;
    $types .= 'i';
    
    $leads = fetch_multiple($query, $params, $types);
    
    // Format data for display
    foreach ($leads as &$lead) {
        $lead['created_at_formatted'] = time_ago($lead['created_at']);
        $lead['status_badge'] = get_status_badge($lead['status']);
    }
    
    json_response(true, 'Recent leads retrieved', $leads);
}

function getPendingFollowups() {
    $limit = (int) ($_GET['limit'] ?? 10);
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    
    $where_clause = "WHERE f.status = 'pending' AND f.followup_date <= CURDATE()";
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause .= " AND l.assigned_to = ?";
        $params[] = $user_id;
        $types .= 'i';
    }
    
    $query = "SELECT f.*, l.name as lead_name, l.company, u.name as assigned_user 
              FROM followups f 
              JOIN leads l ON f.lead_id = l.id 
              LEFT JOIN users u ON l.assigned_to = u.id 
              $where_clause 
              ORDER BY f.followup_date ASC, f.followup_time ASC 
              LIMIT ?";
    
    $params[] = $limit;
    $types .= 'i';
    
    $followups = fetch_multiple($query, $params, $types);
    
    // Format data for display
    foreach ($followups as &$followup) {
        $followup['followup_datetime'] = $followup['followup_date'] . ' ' . $followup['followup_time'];
        $followup['is_overdue'] = strtotime($followup['followup_datetime']) < time();
        $followup['time_diff'] = time_ago($followup['followup_datetime']);
    }
    
    json_response(true, 'Pending followups retrieved', $followups);
}

function getLeadChartData() {
    $period = $_GET['period'] ?? '7days';
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause = 'WHERE assigned_to = ?';
        $params[] = $user_id;
        $types .= 'i';
    }
    
    switch ($period) {
        case '7days':
            $date_condition = $where_clause ? $where_clause . " AND created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)"
                                           : "WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
            $date_format = '%Y-%m-%d';
            break;
            
        case '30days':
            $date_condition = $where_clause ? $where_clause . " AND created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)"
                                           : "WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
            $date_format = '%Y-%m-%d';
            break;
            
        case '12months':
            $date_condition = $where_clause ? $where_clause . " AND created_at >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)"
                                           : "WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)";
            $date_format = '%Y-%m';
            break;
            
        default:
            $date_condition = $where_clause;
            $date_format = '%Y-%m-%d';
    }
    
    $query = "SELECT DATE_FORMAT(created_at, '$date_format') as date, 
                     COUNT(*) as count,
                     SUM(CASE WHEN status = 'converted' THEN 1 ELSE 0 END) as converted
              FROM leads 
              $date_condition 
              GROUP BY DATE_FORMAT(created_at, '$date_format') 
              ORDER BY date ASC";
    
    $chart_data = fetch_multiple($query, $params, $types);
    
    json_response(true, 'Chart data retrieved', $chart_data);
}

function getConversionChartData() {
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause = 'WHERE assigned_to = ?';
        $params[] = $user_id;
        $types .= 'i';
    }
    
    $query = "SELECT status, COUNT(*) as count 
              FROM leads 
              $where_clause 
              GROUP BY status 
              ORDER BY count DESC";
    
    $data = fetch_multiple($query, $params, $types);
    
    // Format for pie chart
    $chart_data = [
        'labels' => [],
        'data' => [],
        'backgroundColor' => [
            '#6c757d', // cold - gray
            '#ffc107', // warm - yellow
            '#dc3545', // hot - red
            '#28a745', // converted - green
            '#343a40'  // junk - dark
        ]
    ];
    
    foreach ($data as $item) {
        $chart_data['labels'][] = ucfirst($item['status']);
        $chart_data['data'][] = (int) $item['count'];
    }
    
    json_response(true, 'Conversion chart data retrieved', $chart_data);
}

function getMonthlyPerformance() {
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause = 'WHERE l.assigned_to = ?';
        $params[] = $user_id;
        $types .= 'i';
    }
    
    // Get last 6 months performance
    $query = "SELECT 
                DATE_FORMAT(l.created_at, '%Y-%m') as month,
                COUNT(l.id) as total_leads,
                SUM(CASE WHEN l.status = 'converted' THEN 1 ELSE 0 END) as converted_leads,
                COALESCE(SUM(q.total_amount), 0) as total_quote_value
              FROM leads l
              LEFT JOIN quotations q ON l.id = q.lead_id AND q.status = 'accepted'
              $where_clause AND l.created_at >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
              GROUP BY DATE_FORMAT(l.created_at, '%Y-%m')
              ORDER BY month ASC";
    
    $performance = fetch_multiple($query, $params, $types);
    
    // Format month names
    foreach ($performance as &$item) {
        $item['month_name'] = date('M Y', strtotime($item['month'] . '-01'));
        $item['conversion_rate'] = $item['total_leads'] > 0 ? 
            round(($item['converted_leads'] / $item['total_leads']) * 100, 2) : 0;
    }
    
    json_response(true, 'Monthly performance retrieved', $performance);
}

function getTopPerformers() {
    // Only admins and managers can see top performers
    if (!has_role('manager')) {
        json_response(false, 'Access denied');
    }
    
    $limit = (int) ($_GET['limit'] ?? 5);
    
    $query = "SELECT 
                u.id, u.name, u.email,
                COUNT(l.id) as total_leads,
                SUM(CASE WHEN l.status = 'converted' THEN 1 ELSE 0 END) as converted_leads,
                COALESCE(SUM(q.total_amount), 0) as total_quote_value
              FROM users u
              LEFT JOIN leads l ON u.id = l.assigned_to AND l.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
              LEFT JOIN quotations q ON l.id = q.lead_id AND q.status = 'accepted'
              WHERE u.role IN ('executive', 'manager') AND u.is_active = 1
              GROUP BY u.id, u.name, u.email
              HAVING total_leads > 0
              ORDER BY converted_leads DESC, total_quote_value DESC
              LIMIT ?";
    
    $performers = fetch_multiple($query, [$limit], 'i');
    
    // Calculate conversion rates
    foreach ($performers as &$performer) {
        $performer['conversion_rate'] = $performer['total_leads'] > 0 ? 
            round(($performer['converted_leads'] / $performer['total_leads']) * 100, 2) : 0;
        $performer['total_quote_value_formatted'] = format_currency($performer['total_quote_value']);
    }
    
    json_response(true, 'Top performers retrieved', $performers);
}

function getRecentActivities() {
    $limit = (int) ($_GET['limit'] ?? 10);
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause = 'WHERE a.user_id = ?';
        $params[] = $user_id;
        $types .= 'i';
    }
    
    $query = "SELECT a.*, u.name as user_name, l.name as lead_name 
              FROM activity_logs a 
              LEFT JOIN users u ON a.user_id = u.id 
              LEFT JOIN leads l ON a.lead_id = l.id 
              $where_clause 
              ORDER BY a.created_at DESC 
              LIMIT ?";
    
    $params[] = $limit;
    $types .= 'i';
    
    $activities = fetch_multiple($query, $params, $types);
    
    // Format activities for display
    foreach ($activities as &$activity) {
        $activity['time_ago'] = time_ago($activity['created_at']);
        $activity['activity_type_formatted'] = ucfirst(str_replace('_', ' ', $activity['activity_type']));
    }
    
    json_response(true, 'Recent activities retrieved', $activities);
}

function getQuotaProgress() {
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    
    // Get monthly quota from settings or default
    $monthly_quota = (int) get_setting('sales', 'monthly_quota') ?: 100000;
    
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause = 'WHERE q.created_by = ?';
        $params[] = $user_id;
        $types .= 'i';
    }
    
    // Get this month's quotation value
    $month_where = $where_clause ? $where_clause . " AND MONTH(q.created_at) = MONTH(CURDATE()) AND YEAR(q.created_at) = YEAR(CURDATE())"
                                : "WHERE MONTH(q.created_at) = MONTH(CURDATE()) AND YEAR(q.created_at) = YEAR(CURDATE())";
    
    $query = "SELECT SUM(q.total_amount) as total 
              FROM quotations q 
              $month_where AND q.status = 'accepted'";
    
    $result = fetch_single($query, $params, $types);
    $achieved = $result['total'] ?? 0;
    
    $progress = [
        'quota' => $monthly_quota,
        'achieved' => $achieved,
        'percentage' => $monthly_quota > 0 ? round(($achieved / $monthly_quota) * 100, 2) : 0,
        'remaining' => max(0, $monthly_quota - $achieved),
        'quota_formatted' => format_currency($monthly_quota),
        'achieved_formatted' => format_currency($achieved),
        'remaining_formatted' => format_currency(max(0, $monthly_quota - $achieved))
    ];
    
    json_response(true, 'Quota progress retrieved', $progress);
}

function getLeadSources() {
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause = 'WHERE assigned_to = ?';
        $params[] = $user_id;
        $types .= 'i';
    }
    
    $query = "SELECT source, COUNT(*) as count 
              FROM leads 
              $where_clause 
              GROUP BY source 
              ORDER BY count DESC";
    
    $sources = fetch_multiple($query, $params, $types);
    
    // Format for chart
    $chart_data = [
        'labels' => [],
        'data' => []
    ];
    
    foreach ($sources as $source) {
        $chart_data['labels'][] = ucfirst($source['source'] ?: 'Unknown');
        $chart_data['data'][] = (int) $source['count'];
    }
    
    json_response(true, 'Lead sources retrieved', $chart_data);
}
?>