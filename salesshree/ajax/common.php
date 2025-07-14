<?php
/**
 * Common AJAX Functions
 * Handles common AJAX requests across the system
 */
require_once '../config/config.php';

// Check if user is logged in
if (!is_logged_in()) {
    json_response(false, 'Unauthorized access');
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'get_user_info':
        getUserInfo();
        break;
        
    case 'update_user_status':
        updateUserStatus();
        break;
        
    case 'search_users':
        searchUsers();
        break;
        
    case 'search_leads':
        searchLeads();
        break;
        
    case 'upload_file':
        uploadFile();
        break;
        
    case 'delete_file':
        deleteFile();
        break;
        
    case 'get_states':
        getStates();
        break;
        
    case 'get_cities':
        getCities();
        break;
        
    case 'check_email_exists':
        checkEmailExists();
        break;
        
    case 'check_phone_exists':
        checkPhoneExists();
        break;
        
    case 'get_lead_timeline':
        getLeadTimeline();
        break;
        
    case 'bulk_action':
        bulkAction();
        break;
        
    default:
        json_response(false, 'Invalid action');
}

function getUserInfo() {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT id, name, email, role, phone, profile_image, created_at, last_login FROM users WHERE id = ?";
    $user = fetch_single($query, [$user_id], 'i');
    
    if ($user) {
        // Get user stats
        $stats = get_dashboard_stats($user_id, $_SESSION['user_role']);
        $user['stats'] = $stats;
        
        json_response(true, 'User info retrieved', $user);
    } else {
        json_response(false, 'User not found');
    }
}

function updateUserStatus() {
    if (!has_role('admin')) {
        json_response(false, 'Access denied');
    }
    
    $user_id = (int) ($_POST['user_id'] ?? 0);
    $status = (int) ($_POST['status'] ?? 1);
    
    if (!$user_id) {
        json_response(false, 'User ID is required');
    }
    
    if (update_record('users', ['is_active' => $status], 'id = ?', [$user_id])) {
        $action_text = $status ? 'activated' : 'deactivated';
        log_activity($_SESSION['user_id'], 'user_status_change', "User $user_id $action_text");
        json_response(true, "User $action_text successfully");
    } else {
        json_response(false, 'Failed to update user status');
    }
}

function searchUsers() {
    $search = sanitize_input($_GET['q'] ?? '');
    $limit = (int) ($_GET['limit'] ?? 10);
    
    if (strlen($search) < 2) {
        json_response(true, 'Search results', []);
    }
    
    $query = "SELECT id, name, email, role FROM users 
              WHERE (name LIKE ? OR email LIKE ?) AND is_active = 1 
              ORDER BY name ASC LIMIT ?";
    
    $search_term = "%$search%";
    $users = fetch_multiple($query, [$search_term, $search_term, $limit], 'ssi');
    
    json_response(true, 'Search results', $users);
}

function searchLeads() {
    $search = sanitize_input($_GET['q'] ?? '');
    $limit = (int) ($_GET['limit'] ?? 10);
    
    if (strlen($search) < 2) {
        json_response(true, 'Search results', []);
    }
    
    // Build query based on user role
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($_SESSION['user_role'] === 'executive') {
        $where_clause = ' AND assigned_to = ?';
        $params[] = $_SESSION['user_id'];
        $types .= 'i';
    }
    
    $query = "SELECT id, name, email, phone, company, status FROM leads 
              WHERE (name LIKE ? OR email LIKE ? OR phone LIKE ? OR company LIKE ?)$where_clause
              ORDER BY created_at DESC LIMIT ?";
    
    $search_term = "%$search%";
    $search_params = [$search_term, $search_term, $search_term, $search_term];
    $search_params = array_merge($search_params, $params);
    $search_params[] = $limit;
    
    $search_types = 'ssss' . $types . 'i';
    
    $leads = fetch_multiple($query, $search_params, $search_types);
    
    json_response(true, 'Search results', $leads);
}

function uploadFile() {
    if (!isset($_FILES['file'])) {
        json_response(false, 'No file uploaded');
    }
    
    $upload_type = $_POST['type'] ?? 'document';
    $allowed_types = [
        'document' => ['pdf', 'doc', 'docx', 'txt'],
        'image' => ['jpg', 'jpeg', 'png', 'gif'],
        'profile' => ['jpg', 'jpeg', 'png']
    ];
    
    $upload_dir = "uploads/" . ($upload_type === 'profile' ? 'profiles' : 'documents');
    $allowed = $allowed_types[$upload_type] ?? $allowed_types['document'];
    
    $result = upload_file($_FILES['file'], $upload_dir, $allowed);
    
    if ($result['success']) {
        // Log file upload
        log_activity($_SESSION['user_id'], 'file_upload', "Uploaded file: " . $result['filename']);
        json_response(true, 'File uploaded successfully', $result);
    } else {
        json_response(false, $result['error']);
    }
}

function deleteFile() {
    $filename = sanitize_input($_POST['filename'] ?? '');
    $type = $_POST['type'] ?? 'document';
    
    if (empty($filename)) {
        json_response(false, 'Filename is required');
    }
    
    $upload_dir = $type === 'profile' ? 'uploads/profiles' : 'uploads/documents';
    $filepath = "$upload_dir/$filename";
    
    if (file_exists($filepath)) {
        if (unlink($filepath)) {
            log_activity($_SESSION['user_id'], 'file_delete', "Deleted file: $filename");
            json_response(true, 'File deleted successfully');
        } else {
            json_response(false, 'Failed to delete file');
        }
    } else {
        json_response(false, 'File not found');
    }
}

function getStates() {
    $country = sanitize_input($_GET['country'] ?? 'India');
    
    // For Indian states - you can expand this for other countries
    $indian_states = [
        'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chhattisgarh',
        'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jharkhand',
        'Karnataka', 'Kerala', 'Madhya Pradesh', 'Maharashtra', 'Manipur',
        'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab',
        'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura',
        'Uttar Pradesh', 'Uttarakhand', 'West Bengal', 'Delhi'
    ];
    
    $states = [];
    foreach ($indian_states as $state) {
        $states[] = ['name' => $state, 'code' => strtoupper(str_replace(' ', '_', $state))];
    }
    
    json_response(true, 'States retrieved', $states);
}

function getCities() {
    $state = sanitize_input($_GET['state'] ?? '');
    
    // Sample cities for major states - you can expand this or use a proper database
    $state_cities = [
        'DELHI' => ['New Delhi', 'Delhi Cantonment', 'Karol Bagh', 'Lajpat Nagar'],
        'MAHARASHTRA' => ['Mumbai', 'Pune', 'Nagpur', 'Nashik', 'Aurangabad'],
        'KARNATAKA' => ['Bangalore', 'Mysore', 'Hubli', 'Mangalore', 'Belgaum'],
        'TAMIL_NADU' => ['Chennai', 'Coimbatore', 'Madurai', 'Tiruchirappalli', 'Salem'],
        'GUJARAT' => ['Ahmedabad', 'Surat', 'Vadodara', 'Rajkot', 'Bhavnagar'],
        'WEST_BENGAL' => ['Kolkata', 'Howrah', 'Durgapur', 'Asansol', 'Siliguri']
    ];
    
    $cities = $state_cities[$state] ?? [];
    
    json_response(true, 'Cities retrieved', $cities);
}

function checkEmailExists() {
    $email = sanitize_input($_POST['email'] ?? '');
    $exclude_id = (int) ($_POST['exclude_id'] ?? 0);
    
    if (!validate_email($email)) {
        json_response(false, 'Invalid email format');
    }
    
    $where = "email = ?";
    $params = [$email];
    $types = 's';
    
    if ($exclude_id) {
        $where .= " AND id != ?";
        $params[] = $exclude_id;
        $types .= 'i';
    }
    
    $query = "SELECT id FROM users WHERE $where";
    $user = fetch_single($query, $params, $types);
    
    json_response(true, '', ['exists' => (bool) $user]);
}

function checkPhoneExists() {
    $phone = sanitize_input($_POST['phone'] ?? '');
    $exclude_id = (int) ($_POST['exclude_id'] ?? 0);
    
    if (!validate_phone($phone)) {
        json_response(false, 'Invalid phone format');
    }
    
    $where = "phone = ?";
    $params = [$phone];
    $types = 's';
    
    if ($exclude_id) {
        $where .= " AND id != ?";
        $params[] = $exclude_id;
        $types .= 'i';
    }
    
    $query = "SELECT id FROM leads WHERE $where";
    $lead = fetch_single($query, $params, $types);
    
    json_response(true, '', ['exists' => (bool) $lead]);
}

function getLeadTimeline() {
    $lead_id = (int) ($_GET['lead_id'] ?? 0);
    
    if (!$lead_id) {
        json_response(false, 'Lead ID is required');
    }
    
    // Check if user can access this lead
    if ($_SESSION['user_role'] === 'executive') {
        $lead = fetch_single("SELECT id FROM leads WHERE id = ? AND assigned_to = ?", 
                            [$lead_id, $_SESSION['user_id']], 'ii');
        if (!$lead) {
            json_response(false, 'Access denied');
        }
    }
    
    // Get timeline data
    $timeline = [];
    
    // Get followups
    $followups = fetch_multiple(
        "SELECT f.*, u.name as user_name FROM followups f 
         LEFT JOIN users u ON f.created_by = u.id 
         WHERE f.lead_id = ? ORDER BY f.followup_date DESC",
        [$lead_id], 'i'
    );
    
    foreach ($followups as $followup) {
        $timeline[] = [
            'type' => 'followup',
            'date' => $followup['followup_date'],
            'time' => $followup['followup_time'],
            'title' => ucfirst($followup['type']) . ' Follow-up',
            'description' => $followup['notes'],
            'status' => $followup['status'],
            'user' => $followup['user_name'],
            'created_at' => $followup['created_at']
        ];
    }
    
    // Get quotations
    $quotations = fetch_multiple(
        "SELECT q.*, u.name as user_name FROM quotations q 
         LEFT JOIN users u ON q.created_by = u.id 
         WHERE q.lead_id = ? ORDER BY q.created_at DESC",
        [$lead_id], 'i'
    );
    
    foreach ($quotations as $quote) {
        $timeline[] = [
            'type' => 'quotation',
            'date' => date('Y-m-d', strtotime($quote['created_at'])),
            'time' => date('H:i', strtotime($quote['created_at'])),
            'title' => 'Quotation Created',
            'description' => "Quote #" . $quote['quote_number'] . " - " . format_currency($quote['total_amount']),
            'status' => $quote['status'],
            'user' => $quote['user_name'],
            'created_at' => $quote['created_at']
        ];
    }
    
    // Get activity logs
    $activities = fetch_multiple(
        "SELECT a.*, u.name as user_name FROM activity_logs a 
         LEFT JOIN users u ON a.user_id = u.id 
         WHERE a.lead_id = ? ORDER BY a.created_at DESC",
        [$lead_id], 'i'
    );
    
    foreach ($activities as $activity) {
        $timeline[] = [
            'type' => 'activity',
            'date' => date('Y-m-d', strtotime($activity['created_at'])),
            'time' => date('H:i', strtotime($activity['created_at'])),
            'title' => ucfirst(str_replace('_', ' ', $activity['activity_type'])),
            'description' => $activity['description'],
            'status' => 'completed',
            'user' => $activity['user_name'],
            'created_at' => $activity['created_at']
        ];
    }
    
    // Sort timeline by date/time
    usort($timeline, function($a, $b) {
        return strtotime($b['created_at']) - strtotime($a['created_at']);
    });
    
    json_response(true, 'Timeline retrieved', $timeline);
}

function bulkAction() {
    $action = $_POST['bulk_action'] ?? '';
    $ids = $_POST['ids'] ?? [];
    $table = $_POST['table'] ?? '';
    
    if (empty($action) || empty($ids) || empty($table)) {
        json_response(false, 'Missing required parameters');
    }
    
    // Validate table name
    $allowed_tables = ['leads', 'users', 'followups', 'quotations'];
    if (!in_array($table, $allowed_tables)) {
        json_response(false, 'Invalid table');
    }
    
    // Check permissions
    if ($table === 'users' && !has_role('admin')) {
        json_response(false, 'Access denied');
    }
    
    $ids = array_map('intval', $ids);
    $ids_placeholder = str_repeat('?,', count($ids) - 1) . '?';
    $success_count = 0;
    
    switch ($action) {
        case 'delete':
            // Check if user can delete records
            if ($_SESSION['user_role'] === 'executive' && $table === 'leads') {
                // Executives can only delete their own leads
                $query = "DELETE FROM $table WHERE id IN ($ids_placeholder) AND assigned_to = ?";
                $params = array_merge($ids, [$_SESSION['user_id']]);
                $types = str_repeat('i', count($ids)) . 'i';
            } else {
                $query = "DELETE FROM $table WHERE id IN ($ids_placeholder)";
                $params = $ids;
                $types = str_repeat('i', count($ids));
            }
            
            $stmt = $GLOBALS['conn']->prepare($query);
            $stmt->bind_param($types, ...$params);
            
            if ($stmt->execute()) {
                $success_count = $stmt->affected_rows;
                log_activity($_SESSION['user_id'], 'bulk_delete', "Deleted $success_count records from $table");
            }
            break;
            
        case 'activate':
        case 'deactivate':
            $status = ($action === 'activate') ? 1 : 0;
            $query = "UPDATE $table SET is_active = ? WHERE id IN ($ids_placeholder)";
            $params = array_merge([$status], $ids);
            $types = 'i' . str_repeat('i', count($ids));
            
            $stmt = $GLOBALS['conn']->prepare($query);
            $stmt->bind_param($types, ...$params);
            
            if ($stmt->execute()) {
                $success_count = $stmt->affected_rows;
                log_activity($_SESSION['user_id'], 'bulk_status_change', "Changed status of $success_count records in $table");
            }
            break;
            
        case 'assign':
            if ($table !== 'leads') {
                json_response(false, 'Assignment only available for leads');
            }
            
            $assign_to = (int) ($_POST['assign_to'] ?? 0);
            if (!$assign_to) {
                json_response(false, 'User to assign is required');
            }
            
            // Verify user exists and is active
            $user = fetch_single("SELECT id FROM users WHERE id = ? AND is_active = 1", [$assign_to], 'i');
            if (!$user) {
                json_response(false, 'Invalid user selected');
            }
            
            $query = "UPDATE leads SET assigned_to = ? WHERE id IN ($ids_placeholder)";
            $params = array_merge([$assign_to], $ids);
            $types = 'i' . str_repeat('i', count($ids));
            
            $stmt = $GLOBALS['conn']->prepare($query);
            $stmt->bind_param($types, ...$params);
            
            if ($stmt->execute()) {
                $success_count = $stmt->affected_rows;
                log_activity($_SESSION['user_id'], 'bulk_assign', "Assigned $success_count leads to user $assign_to");
            }
            break;
            
        case 'change_status':
            if ($table !== 'leads') {
                json_response(false, 'Status change only available for leads');
            }
            
            $new_status = $_POST['new_status'] ?? '';
            $allowed_statuses = ['cold', 'warm', 'hot', 'converted', 'junk'];
            
            if (!in_array($new_status, $allowed_statuses)) {
                json_response(false, 'Invalid status');
            }
            
            $query = "UPDATE leads SET status = ? WHERE id IN ($ids_placeholder)";
            $params = array_merge([$new_status], $ids);
            $types = 's' . str_repeat('i', count($ids));
            
            $stmt = $GLOBALS['conn']->prepare($query);
            $stmt->bind_param($types, ...$params);
            
            if ($stmt->execute()) {
                $success_count = $stmt->affected_rows;
                log_activity($_SESSION['user_id'], 'bulk_status_change', "Changed status of $success_count leads to $new_status");
            }
            break;
            
        default:
            json_response(false, 'Invalid action');
    }
    
    if ($success_count > 0) {
        json_response(true, "$success_count records updated successfully");
    } else {
        json_response(false, 'No records were updated');
    }
}
?>