<?php
/**
 * Common Functions File
 * Contains utility functions used throughout the CRM system
 */

require_once 'database.php';

// Sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Validate email address
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Validate phone number (Indian format)
function validate_phone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    return preg_match('/^[6-9]\d{9}$/', $phone);
}

// Generate secure password hash
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Verify password
function verify_password($password, $hash) {
    return password_verify($password, $hash);
}

// Generate random string
function generate_random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Format currency (Indian Rupees)
function format_currency($amount) {
    return '₹' . number_format($amount, 2);
}

// Format date for display
function format_date($date, $format = 'd-m-Y') {
    if (empty($date) || $date == '0000-00-00') {
        return '-';
    }
    return date($format, strtotime($date));
}

// Format datetime for display
function format_datetime($datetime, $format = 'd-m-Y H:i') {
    if (empty($datetime) || $datetime == '0000-00-00 00:00:00') {
        return '-';
    }
    return date($format, strtotime($datetime));
}

// Time ago function
function time_ago($datetime) {
    $time = time() - strtotime($datetime);
    
    if ($time < 60) return 'just now';
    if ($time < 3600) return floor($time/60) . ' min ago';
    if ($time < 86400) return floor($time/3600) . ' hrs ago';
    if ($time < 2592000) return floor($time/86400) . ' days ago';
    if ($time < 31536000) return floor($time/2592000) . ' months ago';
    
    return floor($time/31536000) . ' years ago';
}

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Check user role
function has_role($required_role) {
    if (!is_logged_in()) {
        return false;
    }
    
    $user_role = $_SESSION['user_role'];
    
    switch ($required_role) {
        case 'admin':
            return $user_role === 'admin';
        case 'manager':
            return in_array($user_role, ['admin', 'manager']);
        case 'executive':
            return in_array($user_role, ['admin', 'manager', 'executive']);
        default:
            return false;
    }
}

// Redirect with message
function redirect_with_message($url, $message, $type = 'info') {
    $_SESSION['flash_message'] = $message;
    $_SESSION['flash_type'] = $type;
    header("Location: $url");
    exit();
}

// Get and clear flash message
function get_flash_message() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        $type = $_SESSION['flash_type'] ?? 'info';
        unset($_SESSION['flash_message'], $_SESSION['flash_type']);
        return ['message' => $message, 'type' => $type];
    }
    return null;
}

// Log activity
function log_activity($user_id, $activity_type, $description, $lead_id = null) {
    global $conn;
    
    $ip_address = $_SERVER['REMOTE_ADDR'];
    
    $query = "INSERT INTO activity_logs (user_id, user_agent, activity_type, description, ip_address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iisss", $user_id, $lead_id, $activity_type, $description, $ip_address);
    
    return $stmt->execute();
}

// Send notification to user
function send_notification($user_id, $title, $message, $type = 'info', $action_url = null) {
    global $conn;
    
    $query = "INSERT INTO notifications (user_id, title, message, type, action_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issss", $user_id, $title, $message, $type, $action_url);
    
    return $stmt->execute();
}

// Get user notifications
function get_user_notifications($user_id, $limit = 10, $unread_only = false) {
    global $conn;
    
    $where = "user_id = ?";
    $types = "i";
    $params = [$user_id];
    
    if ($unread_only) {
        $where .= " AND is_read = 0";
    }
    
    $query = "SELECT * FROM notifications WHERE $where ORDER BY created_at DESC LIMIT $limit";
    $stmt = $conn->prepare($query);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Mark notification as read
function mark_notification_read($notification_id, $user_id) {
    global $conn;
    
    $query = "UPDATE notifications SET is_read = 1 WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $notification_id, $user_id);
    
    return $stmt->execute();
}

// Get unread notifications count
function get_unread_notifications_count($user_id) {
    global $conn;
    
    $query = "SELECT COUNT(*) as count FROM notifications WHERE user_id = ? AND is_read = 0";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    return $row['count'];
}

// Insert record function
function insert_record($table, $data) {
    global $conn;
    
    $columns = implode(', ', array_keys($data));
    $placeholders = str_repeat('?,', count($data) - 1) . '?';
    $values = array_values($data);
    
    $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $conn->prepare($query);
    
    // Determine types
    $types = '';
    foreach ($values as $value) {
        if (is_int($value)) {
            $types .= 'i';
        } elseif (is_float($value)) {
            $types .= 'd';
        } else {
            $types .= 's';
        }
    }
    
    $stmt->bind_param($types, ...$values);
    
    if ($stmt->execute()) {
        return $conn->insert_id;
    }
    return false;
}

// Update record function
function update_record($table, $data, $where, $where_params = []) {
    global $conn;
    
    $set_clause = '';
    foreach (array_keys($data) as $column) {
        $set_clause .= "$column = ?, ";
    }
    $set_clause = rtrim($set_clause, ', ');
    
    $query = "UPDATE $table SET $set_clause WHERE $where";
    $stmt = $conn->prepare($query);
    
    $values = array_merge(array_values($data), $where_params);
    
    // Determine types
    $types = '';
    foreach ($values as $value) {
        if (is_int($value)) {
            $types .= 'i';
        } elseif (is_float($value)) {
            $types .= 'd';
        } else {
            $types .= 's';
        }
    }
    
    $stmt->bind_param($types, ...$values);
    
    return $stmt->execute();
}

// Delete record function
function delete_record($table, $where, $where_params = []) {
    global $conn;
    
    $query = "DELETE FROM $table WHERE $where";
    $stmt = $conn->prepare($query);
    
    if (!empty($where_params)) {
        // Determine types
        $types = '';
        foreach ($where_params as $value) {
            if (is_int($value)) {
                $types .= 'i';
            } elseif (is_float($value)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }
        
        $stmt->bind_param($types, ...$where_params);
    }
    
    return $stmt->execute();
}

// Fetch single record
function fetch_single($query, $params = [], $types = '') {
    global $conn;
    
    $stmt = $conn->prepare($query);
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_assoc();
}

// Fetch multiple records
function fetch_multiple($query, $params = [], $types = '') {
    global $conn;
    
    $stmt = $conn->prepare($query);
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get settings value
function get_setting($type, $key) {
    $query = "SELECT setting_value FROM settings WHERE setting_type = ? AND setting_key = ? AND is_active = 1";
    $result = fetch_single($query, [$type, $key], 'ss');
    
    return $result ? $result['setting_value'] : null;
}

// Update or insert setting
function set_setting($type, $key, $value) {
    global $conn;
    
    // Check if setting exists
    $existing = fetch_single(
        "SELECT id FROM settings WHERE setting_type = ? AND setting_key = ?",
        [$type, $key],
        'ss'
    );
    
    if ($existing) {
        return update_record(
            'settings',
            ['setting_value' => $value],
            'setting_type = ? AND setting_key = ?',
            [$type, $key]
        );
    } else {
        return insert_record('settings', [
            'setting_type' => $type,
            'setting_key' => $key,
            'setting_value' => $value
        ]);
    }
}

// Generate quote number
function generate_quote_number() {
    $prefix = 'QT';
    $date = date('Ymd');
    
    // Get last quote number for today
    $query = "SELECT quote_number FROM quotations WHERE quote_number LIKE ? ORDER BY id DESC LIMIT 1";
    $pattern = $prefix . $date . '%';
    $result = fetch_single($query, [$pattern], 's');
    
    if ($result) {
        $last_number = substr($result['quote_number'], -4);
        $new_number = str_pad((int)$last_number + 1, 4, '0', STR_PAD_LEFT);
    } else {
        $new_number = '0001';
    }
    
    return $prefix . $date . $new_number;
}

// Upload file function
function upload_file($file, $upload_dir, $allowed_types = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx']) {
    if (!isset($file['error']) || is_array($file['error'])) {
        return ['success' => false, 'error' => 'Invalid file parameters'];
    }
    
    switch ($file['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            return ['success' => false, 'error' => 'No file sent'];
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            return ['success' => false, 'error' => 'File too large'];
        default:
            return ['success' => false, 'error' => 'Unknown upload error'];
    }
    
    // Check file size (max 5MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        return ['success' => false, 'error' => 'File too large (max 5MB)'];
    }
    
    // Check file type
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_types)) {
        return ['success' => false, 'error' => 'Invalid file type'];
    }
    
    // Generate unique filename
    $filename = uniqid() . '_' . time() . '.' . $file_extension;
    $filepath = $upload_dir . '/' . $filename;
    
    // Create directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    
    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        return [
            'success' => true,
            'filename' => $filename,
            'filepath' => $filepath,
            'size' => $file['size'],
            'type' => $file_extension
        ];
    }
    
    return ['success' => false, 'error' => 'Failed to move uploaded file'];
}

// Get lead status badge
function get_status_badge($status) {
    $badges = [
        'cold' => 'bg-secondary',
        'warm' => 'bg-warning',
        'hot' => 'bg-danger',
        'converted' => 'bg-success',
        'junk' => 'bg-dark'
    ];
    
    $class = $badges[$status] ?? 'bg-secondary';
    return "<span class='badge $class'>" . ucfirst($status) . "</span>";
}

// Get follow-up status badge
function get_followup_status_badge($status) {
    $badges = [
        'pending' => 'bg-warning',
        'completed' => 'bg-success',
        'missed' => 'bg-danger'
    ];
    
    $class = $badges[$status] ?? 'bg-secondary';
    return "<span class='badge $class'>" . ucfirst($status) . "</span>";
}

// Get quotation status badge
function get_quotation_status_badge($status) {
    $badges = [
        'draft' => 'bg-secondary',
        'sent' => 'bg-info',
        'accepted' => 'bg-success',
        'rejected' => 'bg-danger',
        'expired' => 'bg-dark'
    ];
    
    $class = $badges[$status] ?? 'bg-secondary';
    return "<span class='badge $class'>" . ucfirst($status) . "</span>";
}

// Check if quote is expired
function is_quote_expired($sent_date, $validity_days) {
    if (empty($sent_date)) {
        return false;
    }
    
    $expiry_date = date('Y-m-d', strtotime($sent_date . " + $validity_days days"));
    return date('Y-m-d') > $expiry_date;
}

// Get dashboard stats
function get_dashboard_stats($user_id = null, $user_role = null) {
    global $conn;
    
    $stats = [];
    
    // Build WHERE clause based on user role
    $where_clause = '';
    $params = [];
    $types = '';
    
    if ($user_role === 'executive') {
        $where_clause = 'WHERE assigned_to = ?';
        $params[] = $user_id;
        $types .= 'i';
    }
    
    // Total leads
    $query = "SELECT COUNT(*) as count FROM leads $where_clause";
    $result = fetch_single($query, $params, $types);
    $stats['total_leads'] = $result['count'];
    
    // Hot leads
    $hot_where = $where_clause ? $where_clause . " AND status = 'hot'" : "WHERE status = 'hot'";
    $query = "SELECT COUNT(*) as count FROM leads $hot_where";
    $result = fetch_single($query, $params, $types);
    $stats['hot_leads'] = $result['count'];
    
    // Converted leads
    $converted_where = $where_clause ? $where_clause . " AND status = 'converted'" : "WHERE status = 'converted'";
    $query = "SELECT COUNT(*) as count FROM leads $converted_where";
    $result = fetch_single($query, $params, $types);
    $stats['converted_leads'] = $result['count'];
    
    // Pending follow-ups
    $followup_query = "SELECT COUNT(*) as count FROM followups f 
                       JOIN leads l ON f.lead_id = l.id 
                       WHERE f.status = 'pending' AND f.followup_date <= CURDATE()";
    
    if ($user_role === 'executive') {
        $followup_query .= " AND l.assigned_to = ?";
    }
    
    $result = fetch_single($followup_query, $params, $types);
    $stats['pending_followups'] = $result['count'];
    
    return $stats;
}

// Security functions
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// JSON response function
function json_response($success, $message = '', $data = []) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit();
}

// Error logging function
function log_error($message, $file = '', $line = '') {
    $log_message = date('Y-m-d H:i:s') . " - Error: $message";
    if ($file) {
        $log_message .= " in $file";
    }
    if ($line) {
        $log_message .= " on line $line";
    }
    $log_message .= "\n";
    
    error_log($log_message, 3, 'logs/error.log');
}

// Clean old notifications (run via cron)
function clean_old_notifications($days = 30) {
    global $conn;
    
    $query = "DELETE FROM notifications WHERE created_at < DATE_SUB(NOW(), INTERVAL ? DAY)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $days);
    
    return $stmt->execute();
}

// Clean old activity logs (run via cron)
function clean_old_activity_logs($days = 90) {
    global $conn;
    
    $query = "DELETE FROM activity_logs WHERE created_at < DATE_SUB(NOW(), INTERVAL ? DAY)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $days);
    
    return $stmt->execute();
}
?>