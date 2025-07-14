<?php
/**
 * Leads Actions AJAX Handler
 * Handles all lead-related AJAX operations
 */
require_once '../config/config.php';

// Check if user is logged in
if (!is_logged_in()) {
    json_response(false, 'Unauthorized access');
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'get_leads':
        getLeads();
        break;
        
    case 'add_lead':
        addLead();
        break;
        
    case 'update_lead':
        updateLead();
        break;
        
    case 'delete_lead':
        deleteLead();
        break;
        
    case 'get_lead':
        getLead();
        break;
        
    case 'update_lead_status':
        updateLeadStatus();
        break;
        
    case 'assign_lead':
        assignLead();
        break;
        
    case 'add_note':
        addNote();
        break;
        
    case 'get_notes':
        getNotes();
        break;
        
    case 'delete_note':
        deleteNote();
        break;
        
    case 'duplicate_lead':
        duplicateLead();
        break;
        
    case 'import_leads':
        importLeads();
        break;
        
    case 'export_leads':
        exportLeads();
        break;
        
    default:
        json_response(false, 'Invalid action');
}

function getLeads() {
    global $conn;
    
    $page = (int) ($_GET['page'] ?? 1);
    $limit = (int) ($_GET['limit'] ?? 25);
    $search = sanitize_input($_GET['search'] ?? '');
    $status = $_GET['status'] ?? '';
    $source = $_GET['source'] ?? '';
    $assigned_to = (int) ($_GET['assigned_to'] ?? 0);
    $sort_by = $_GET['sort_by'] ?? 'created_at';
    $sort_order = $_GET['sort_order'] ?? 'DESC';
    
    $offset = ($page - 1) * $limit;
    
    // Validate sort parameters
    $allowed_sorts = ['name', 'email', 'phone', 'company', 'status', 'source', 'created_at', 'updated_at'];
    if (!in_array($sort_by, $allowed_sorts)) {
        $sort_by = 'created_at';
    }
    
    $sort_order = strtoupper($sort_order) === 'ASC' ? 'ASC' : 'DESC';
    
    // Build WHERE clause
    $where_conditions = [];
    $params = [];
    $types = '';
    
    // Role-based filtering
    if ($_SESSION['user_role'] === 'executive') {
        $where_conditions[] = 'l.assigned_to = ?';
        $params[] = $_SESSION['user_id'];
        $types .= 'i';
    }
    
    // Search filter
    if (!empty($search)) {
        $where_conditions[] = '(l.name LIKE ? OR l.email LIKE ? OR l.phone LIKE ? OR l.company LIKE ?)';
        $search_term = "%$search%";
        $params = array_merge($params, [$search_term, $search_term, $search_term, $search_term]);
        $types .= 'ssss';
    }
    
    // Status filter
    if (!empty($status)) {
        $where_conditions[] = 'l.status = ?';
        $params[] = $status;
        $types .= 's';
    }
    
    // Source filter
    if (!empty($source)) {
        $where_conditions[] = 'l.source = ?';
        $params[] = $source;
        $types .= 's';
    }
    
    // Assigned to filter
    if ($assigned_to > 0) {
        $where_conditions[] = 'l.assigned_to = ?';
        $params[] = $assigned_to;
        $types .= 'i';
    }
    
    $where_clause = '';
    if (!empty($where_conditions)) {
        $where_clause = 'WHERE ' . implode(' AND ', $where_conditions);
    }
    
    // Get total count
    $count_query = "SELECT COUNT(*) as total FROM leads l $where_clause";
    $count_stmt = $conn->prepare($count_query);
    if (!empty($params)) {
        $count_stmt->bind_param($types, ...$params);
    }
    $count_stmt->execute();
    $total_records = $count_stmt->get_result()->fetch_assoc()['total'];
    
    // Get leads data
    $query = "SELECT l.*, u.name as assigned_name 
              FROM leads l 
              LEFT JOIN users u ON l.assigned_to = u.id 
              $where_clause 
              ORDER BY l.$sort_by $sort_order 
              LIMIT ? OFFSET ?";
    
    $params[] = $limit;
    $params[] = $offset;
    $types .= 'ii';
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    $leads = $result->fetch_all(MYSQLI_ASSOC);
    
    json_response(true, 'Leads retrieved successfully', [
        'leads' => $leads,
        'total' => $total_records,
        'page' => $page,
        'limit' => $limit,
        'total_pages' => ceil($total_records / $limit)
    ]);
}

function addLead() {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        json_response(false, 'Invalid CSRF token');
    }
    
    $name = sanitize_input($_POST['name'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $phone = sanitize_input($_POST['phone'] ?? '');
    $company = sanitize_input($_POST['company'] ?? '');
    $source = sanitize_input($_POST['source'] ?? '');
    $service_interested = sanitize_input($_POST['service_interested'] ?? '');
    $status = sanitize_input($_POST['status'] ?? 'cold');
    $assigned_to = (int) ($_POST['assigned_to'] ?? 0);
    $notes = sanitize_input($_POST['notes'] ?? '');
    $lead_value = (float) ($_POST['lead_value'] ?? 0);
    
    // Validate required fields
    if (empty($name) || empty($source)) {
        json_response(false, 'Name and source are required');
    }
    
    // Validate email if provided
    if (!empty($email) && !validate_email($email)) {
        json_response(false, 'Invalid email format');
    }
    
    // Validate phone if provided
    if (!empty($phone) && !validate_phone($phone)) {
        json_response(false, 'Invalid phone format');
    }
    
    // Check for duplicate email/phone
    if (!empty($email)) {
        $check_query = "SELECT id FROM leads WHERE email = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        if ($check_stmt->get_result()->num_rows > 0) {
            json_response(false, 'Lead with this email already exists');
        }
    }
    
    $data = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'source' => $source,
        'service_interested' => $service_interested,
        'status' => $status,
        'assigned_to' => $assigned_to > 0 ? $assigned_to : null,
        'notes' => $notes,
        'lead_value' => $lead_value
    ];
    
    $lead_id = insert_record('leads', $data);
    
    if ($lead_id) {
        // Log activity
        log_activity($_SESSION['user_id'], 'lead_created', "Created new lead: $name", $lead_id);
        
        // Send notification to assigned user
        if ($assigned_to > 0 && $assigned_to != $_SESSION['user_id']) {
            send_notification($assigned_to, 'New Lead Assigned', "A new lead '$name' has been assigned to you", 'info');
        }
        
        json_response(true, 'Lead added successfully', ['lead_id' => $lead_id]);
    } else {
        json_response(false, 'Failed to add lead');
    }
}

function updateLead() {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        json_response(false, 'Invalid CSRF token');
    }
    
    $lead_id = (int) ($_POST['lead_id'] ?? 0);
    
    if ($lead_id <= 0) {
        json_response(false, 'Invalid lead ID');
    }
    
    // Check if user has permission to edit this lead
    if ($_SESSION['user_role'] === 'executive') {
        $check_query = "SELECT assigned_to FROM leads WHERE id = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("i", $lead_id);
        $check_stmt->execute();
        $result = $check_stmt->get_result()->fetch_assoc();
        
        if (!$result || $result['assigned_to'] != $_SESSION['user_id']) {
            json_response(false, 'Permission denied');
        }
    }
    
    $name = sanitize_input($_POST['name'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $phone = sanitize_input($_POST['phone'] ?? '');
    $company = sanitize_input($_POST['company'] ?? '');
    $source = sanitize_input($_POST['source'] ?? '');
    $service_interested = sanitize_input($_POST['service_interested'] ?? '');
    $status = sanitize_input($_POST['status'] ?? 'cold');
    $assigned_to = (int) ($_POST['assigned_to'] ?? 0);
    $notes = sanitize_input($_POST['notes'] ?? '');
    $lead_value = (float) ($_POST['lead_value'] ?? 0);
    
    // Validate required fields
    if (empty($name) || empty($source)) {
        json_response(false, 'Name and source are required');
    }
    
    // Validate email if provided
    if (!empty($email) && !validate_email($email)) {
        json_response(false, 'Invalid email format');
    }
    
    // Validate phone if provided
    if (!empty($phone) && !validate_phone($phone)) {
        json_response(false, 'Invalid phone format');
    }
    
    // Check for duplicate email/phone (excluding current lead)
    if (!empty($email)) {
        $check_query = "SELECT id FROM leads WHERE email = ? AND id != ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("si", $email, $lead_id);
        $check_stmt->execute();
        if ($check_stmt->get_result()->num_rows > 0) {
            json_response(false, 'Another lead with this email already exists');
        }
    }
    
    $data = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'source' => $source,
        'service_interested' => $service_interested,
        'status' => $status,
        'assigned_to' => $assigned_to > 0 ? $assigned_to : null,
        'notes' => $notes,
        'lead_value' => $lead_value
    ];
    
    $success = update_record('leads', $data, 'id = ?', [$lead_id]);
    
    if ($success) {
        // Log activity
        log_activity($_SESSION['user_id'], 'lead_updated', "Updated lead: $name", $lead_id);
        
        json_response(true, 'Lead updated successfully');
    } else {
        json_response(false, 'Failed to update lead');
    }
}

function deleteLead() {
    if (!has_role('manager')) {
        json_response(false, 'Permission denied');
    }
    
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        json_response(false, 'Invalid CSRF token');
    }
    
    $lead_id = (int) ($_POST['lead_id'] ?? 0);
    
    if ($lead_id <= 0) {
        json_response(false, 'Invalid lead ID');
    }
    
    // Get lead name for logging
    $lead = fetch_single("SELECT name FROM leads WHERE id = ?", [$lead_id], 'i');
    
    if (!$lead) {
        json_response(false, 'Lead not found');
    }
    
    $success = delete_record('leads', 'id = ?', [$lead_id]);
    
    if ($success) {
        // Log activity
        log_activity($_SESSION['user_id'], 'lead_deleted', "Deleted lead: {$lead['name']}", $lead_id);
        
        json_response(true, 'Lead deleted successfully');
    } else {
        json_response(false, 'Failed to delete lead');
    }
}

function getLead() {
    $lead_id = (int) ($_GET['lead_id'] ?? 0);
    
    if ($lead_id <= 0) {
        json_response(false, 'Invalid lead ID');
    }
    
    // Check if user has permission to view this lead
    $where_clause = 'l.id = ?';
    $params = [$lead_id];
    $types = 'i';
    
    if ($_SESSION['user_role'] === 'executive') {
        $where_clause .= ' AND l.assigned_to = ?';
        $params[] = $_SESSION['user_id'];
        $types .= 'i';
    }
    
    $query = "SELECT l.*, u.name as assigned_name, u.email as assigned_email 
              FROM leads l 
              LEFT JOIN users u ON l.assigned_to = u.id 
              WHERE $where_clause";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    $lead = $result->fetch_assoc();
    
    if (!$lead) {
        json_response(false, 'Lead not found');
    }
    
    json_response(true, 'Lead retrieved successfully', ['lead' => $lead]);
}

function updateLeadStatus() {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        json_response(false, 'Invalid CSRF token');
    }
    
    $lead_id = (int) ($_POST['lead_id'] ?? 0);
    $status = sanitize_input($_POST['status'] ?? '');
    $junk_reason = sanitize_input($_POST['junk_reason'] ?? '');
    
    if ($lead_id <= 0) {
        json_response(false, 'Invalid lead ID');
    }
    
    $allowed_statuses = ['cold', 'warm', 'hot', 'converted', 'junk'];
    if (!in_array($status, $allowed_statuses)) {
        json_response(false, 'Invalid status');
    }
    
    // Check if user has permission to update this lead
    if ($_SESSION['user_role'] === 'executive') {
        $check_query = "SELECT assigned_to, name FROM leads WHERE id = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("i", $lead_id);
        $check_stmt->execute();
        $result = $check_stmt->get_result()->fetch_assoc();
        
        if (!$result || $result['assigned_to'] != $_SESSION['user_id']) {
            json_response(false, 'Permission denied');
        }
        $lead_name = $result['name'];
    } else {
        $lead = fetch_single("SELECT name FROM leads WHERE id = ?", [$lead_id], 'i');
        $lead_name = $lead['name'];
    }
    
    $data = ['status' => $status];
    if ($status === 'junk' && !empty($junk_reason)) {
        $data['junk_reason'] = $junk_reason;
    }
    
    $success = update_record('leads', $data, 'id = ?', [$lead_id]);
    
    if ($success) {
        // Log activity
        log_activity($_SESSION['user_id'], 'status_updated', "Updated lead status to '$status': $lead_name", $lead_id);
        
        json_response(true, 'Lead status updated successfully');
    } else {
        json_response(false, 'Failed to update lead status');
    }
}

function assignLead() {
    if (!has_role('manager')) {
        json_response(false, 'Permission denied');
    }
    
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        json_response(false, 'Invalid CSRF token');
    }
    
    $lead_id = (int) ($_POST['lead_id'] ?? 0);
    $assigned_to = (int) ($_POST['assigned_to'] ?? 0);
    
    if ($lead_id <= 0) {
        json_response(false, 'Invalid lead ID');
    }
    
    // Get lead and user info
    $lead = fetch_single("SELECT name FROM leads WHERE id = ?", [$lead_id], 'i');
    if (!$lead) {
        json_response(false, 'Lead not found');
    }
    
    $user = null;
    if ($assigned_to > 0) {
        $user = fetch_single("SELECT name FROM users WHERE id = ? AND status = 'active'", [$assigned_to], 'i');
        if (!$user) {
            json_response(false, 'Invalid user selected');
        }
    }
    
    $success = update_record('leads', ['assigned_to' => $assigned_to > 0 ? $assigned_to : null], 'id = ?', [$lead_id]);
    
    if ($success) {
        $action_desc = $assigned_to > 0 ? "Assigned lead to {$user['name']}" : "Unassigned lead";
        log_activity($_SESSION['user_id'], 'lead_assigned', "$action_desc: {$lead['name']}", $lead_id);
        
        // Send notification to assigned user
        if ($assigned_to > 0 && $assigned_to != $_SESSION['user_id']) {
            send_notification($assigned_to, 'Lead Assigned', "Lead '{$lead['name']}' has been assigned to you", 'info');
        }
        
        json_response(true, 'Lead assignment updated successfully');
    } else {
        json_response(false, 'Failed to update lead assignment');
    }
}

function duplicateLead() {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        json_response(false, 'Invalid CSRF token');
    }
    
    $lead_id = (int) ($_POST['lead_id'] ?? 0);
    
    if ($lead_id <= 0) {
        json_response(false, 'Invalid lead ID');
    }
    
    // Get original lead
    $lead = fetch_single("SELECT * FROM leads WHERE id = ?", [$lead_id], 'i');
    
    if (!$lead) {
        json_response(false, 'Lead not found');
    }
    
    // Check permission
    if ($_SESSION['user_role'] === 'executive' && $lead['assigned_to'] != $_SESSION['user_id']) {
        json_response(false, 'Permission denied');
    }
    
    // Prepare data for duplication
    $data = [
        'name' => $lead['name'] . ' (Copy)',
        'email' => '', // Clear email to avoid duplicate
        'phone' => '', // Clear phone to avoid duplicate
        'company' => $lead['company'],
        'source' => $lead['source'],
        'service_interested' => $lead['service_interested'],
        'status' => 'cold',
        'assigned_to' => $lead['assigned_to'],
        'notes' => $lead['notes'],
        'lead_value' => $lead['lead_value']
    ];
    
    $new_lead_id = insert_record('leads', $data);
    
    if ($new_lead_id) {
        log_activity($_SESSION['user_id'], 'lead_duplicated', "Duplicated lead: {$lead['name']}", $new_lead_id);
        json_response(true, 'Lead duplicated successfully', ['lead_id' => $new_lead_id]);
    } else {
        json_response(false, 'Failed to duplicate lead');
    }
}

function exportLeads() {
    if (!has_role('manager')) {
        json_response(false, 'Permission denied');
    }
    
    $format = $_GET['format'] ?? 'csv';
    $status = $_GET['status'] ?? '';
    $source = $_GET['source'] ?? '';
    $assigned_to = (int) ($_GET['assigned_to'] ?? 0);
    
    // Build WHERE clause
    $where_conditions = [];
    $params = [];
    $types = '';
    
    if (!empty($status)) {
        $where_conditions[] = 'status = ?';
        $params[] = $status;
        $types .= 's';
    }
    
    if (!empty($source)) {
        $where_conditions[] = 'source = ?';
        $params[] = $source;
        $types .= 's';
    }
    
    if ($assigned_to > 0) {
        $where_conditions[] = 'assigned_to = ?';
        $params[] = $assigned_to;
        $types .= 'i';
    }
    
    $where_clause = '';
    if (!empty($where_conditions)) {
        $where_clause = 'WHERE ' . implode(' AND ', $where_conditions);
    }
    
    $query = "SELECT l.*, u.name as assigned_name 
              FROM leads l 
              LEFT JOIN users u ON l.assigned_to = u.id 
              $where_clause 
              ORDER BY l.created_at DESC";
    
    $stmt = $conn->prepare($query);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $leads = $result->fetch_all(MYSQLI_ASSOC);
    
    if ($format === 'csv') {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="leads_export_' . date('Y-m-d') . '.csv"');
        
        $output = fopen('php://output', 'w');
        
        // CSV headers
        fputcsv($output, [
            'ID', 'Name', 'Email', 'Phone', 'Company', 'Source', 
            'Service Interested', 'Status', 'Assigned To', 'Lead Value', 
            'Notes', 'Created At', 'Updated At'
        ]);
        
        // CSV data
        foreach ($leads as $lead) {
            fputcsv($output, [
                $lead['id'],
                $lead['name'],
                $lead['email'],
                $lead['phone'],
                $lead['company'],
                $lead['source'],
                $lead['service_interested'],
                $lead['status'],
                $lead['assigned_name'],
                $lead['lead_value'],
                $lead['notes'],
                $lead['created_at'],
                $lead['updated_at']
            ]);
        }
        
        fclose($output);
        exit;
    }
    
    json_response(false, 'Invalid export format');
}

// Helper function to add note (for future use)
function addNote() {
    // Implementation for adding notes to leads
    json_response(false, 'Feature not implemented yet');
}

function getNotes() {
    // Implementation for getting lead notes
    json_response(false, 'Feature not implemented yet');
}

function deleteNote() {
    // Implementation for deleting lead notes
    json_response(false, 'Feature not implemented yet');
}

function importLeads() {
    // Implementation for importing leads from CSV
    json_response(false, 'Feature not implemented yet');
}
?>