<?php
/**
 * Notifications AJAX Handler
 * Handles all notification-related AJAX operations
 */
require_once '../config/config.php';

// Check if user is logged in
if (!is_logged_in()) {
    json_response(false, 'Unauthorized access');
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'get_notifications':
        getNotifications();
        break;
        
    case 'mark_read':
        markNotificationRead();
        break;
        
    case 'mark_all_read':
        markAllNotificationsRead();
        break;
        
    case 'delete_notification':
        deleteNotification();
        break;
        
    case 'get_unread_count':
        getUnreadCount();
        break;
        
    case 'create_notification':
        createNotification();
        break;
        
    default:
        json_response(false, 'Invalid action');
}

/**
 * Get user notifications
 */
function getNotifications() {
    global $conn;
    $user_id = $_SESSION['user_id'];
    $page = (int) ($_GET['page'] ?? 1);
    $limit = (int) ($_GET['limit'] ?? 20);
    $unread_only = $_GET['unread_only'] ?? 'false';
    $type = $_GET['type'] ?? '';
    
    $offset = ($page - 1) * $limit;
    
    try {
        // Build WHERE clause
        $where_conditions = ['user_id = ?'];
        $params = [$user_id];
        $types = 'i';
        
        if ($unread_only === 'true') {
            $where_conditions[] = 'is_read = 0';
        }
        
        if (!empty($type)) {
            $where_conditions[] = 'type = ?';
            $params[] = $type;
            $types .= 's';
        }
        
        $where_clause = 'WHERE ' . implode(' AND ', $where_conditions);
        
        // Get total count
        $count_query = "SELECT COUNT(*) as total FROM notifications $where_clause";
        $count_stmt = $conn->prepare($count_query);
        $count_stmt->bind_param($types, ...$params);
        $count_stmt->execute();
        $total_records = $count_stmt->get_result()->fetch_assoc()['total'];
        
        // Get notifications
        $query = "SELECT * FROM notifications 
                  $where_clause 
                  ORDER BY created_at DESC 
                  LIMIT ? OFFSET ?";
        
        $params[] = $limit;
        $params[] = $offset;
        $types .= 'ii';
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
        $notifications = $result->fetch_all(MYSQLI_ASSOC);
        
        // Format notifications
        foreach ($notifications as &$notification) {
            $notification['time_ago'] = time_ago($notification['created_at']);
            $notification['formatted_date'] = format_datetime($notification['created_at']);
        }
        
        // Log activity
        log_activity($_SESSION['user_id'], 'notification_access', "Retrieved notifications (page: $page)");
        
        json_response(true, 'Notifications retrieved successfully', [
            'notifications' => $notifications,
            'total' => $total_records,
            'page' => $page,
            'limit' => $limit,
            'total_pages' => ceil($total_records / $limit)
        ]);
        
    } catch (Exception $e) {
        log_error("Get notifications error: " . $e->getMessage(), __FILE__, __LINE__);
        json_response(false, 'Failed to retrieve notifications');
    }
}

/**
 * Mark single notification as read
 */
function markNotificationRead() {
    global $conn;
    $notification_id = (int) ($_POST['notification_id'] ?? 0);
    $user_id = $_SESSION['user_id'];
    
    if ($notification_id <= 0) {
        json_response(false, 'Invalid notification ID');
    }
    
    try {
        $query = "UPDATE notifications SET is_read = 1, read_at = NOW() 
                  WHERE id = ? AND user_id = ? AND is_read = 0";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $notification_id, $user_id);
        
        if ($stmt->execute()) {
            $affected_rows = $stmt->affected_rows;
            if ($affected_rows > 0) {
                log_activity($user_id, 'notification_read', "Marked notification $notification_id as read");
                json_response(true, 'Notification marked as read');
            } else {
                json_response(false, 'Notification not found or already read');
            }
        } else {
            throw new Exception('Database update failed');
        }
        
    } catch (Exception $e) {
        log_error("Mark notification read error: " . $e->getMessage(), __FILE__, __LINE__);
        json_response(false, 'Failed to mark notification as read');
    }
}

/**
 * Mark all notifications as read
 */
function markAllNotificationsRead() {
    global $conn;
    $user_id = $_SESSION['user_id'];
    
    try {
        $query = "UPDATE notifications SET is_read = 1, read_at = NOW() 
                  WHERE user_id = ? AND is_read = 0";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        
        if ($stmt->execute()) {
            $affected_rows = $stmt->affected_rows;
            log_activity($user_id, 'notifications_read_all', "Marked $affected_rows notifications as read");
            json_response(true, "Marked $affected_rows notifications as read");
        } else {
            throw new Exception('Database update failed');
        }
        
    } catch (Exception $e) {
        log_error("Mark all notifications read error: " . $e->getMessage(), __FILE__, __LINE__);
        json_response(false, 'Failed to mark notifications as read');
    }
}

/**
 * Delete a notification
 */
function deleteNotification() {
    global $conn;
    $notification_id = (int) ($_POST['notification_id'] ?? 0);
    $user_id = $_SESSION['user_id'];
    
    if ($notification_id <= 0) {
        json_response(false, 'Invalid notification ID');
    }
    
    try {
        $query = "DELETE FROM notifications WHERE id = ? AND user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $notification_id, $user_id);
        
        if ($stmt->execute()) {
            $affected_rows = $stmt->affected_rows;
            if ($affected_rows > 0) {
                log_activity($user_id, 'notification_delete', "Deleted notification $notification_id");
                json_response(true, 'Notification deleted successfully');
            } else {
                json_response(false, 'Notification not found');
            }
        } else {
            throw new Exception('Database delete failed');
        }
        
    } catch (Exception $e) {
        log_error("Delete notification error: " . $e->getMessage(), __FILE__, __LINE__);
        json_response(false, 'Failed to delete notification');
    }
}

/**
 * Get unread notifications count
 */
function getUnreadCount() {
    global $conn;
    $user_id = $_SESSION['user_id'];
    
    try {
        $query = "SELECT COUNT(*) as count FROM notifications WHERE user_id = ? AND is_read = 0";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_assoc()['count'];
        
        json_response(true, 'Unread count retrieved successfully', [
            'unread_count' => (int) $count
        ]);
        
    } catch (Exception $e) {
        log_error("Get unread count error: " . $e->getMessage(), __FILE__, __LINE__);
        json_response(false, 'Failed to get unread count');
    }
}

/**
 * Create a new notification
 */
function createNotification() {
    global $conn;
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];
    
    // Check if user has permission to create notifications
    if (!in_array($user_role, ['admin', 'manager'])) {
        json_response(false, 'Access denied');
    }
    
    $target_user_id = (int) ($_POST['target_user_id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $type = $_POST['type'] ?? 'general';
    $priority = $_POST['priority'] ?? 'normal';
    $action_url = $_POST['action_url'] ?? '';
    
    // Validate required fields
    if ($target_user_id <= 0) {
        json_response(false, 'Target user ID is required');
    }
    
    if (empty($title)) {
        json_response(false, 'Title is required');
    }
    
    if (empty($message)) {
        json_response(false, 'Message is required');
    }
    
    // Validate type
    $allowed_types = ['general', 'lead', 'followup', 'quote', 'system', 'alert'];
    if (!in_array($type, $allowed_types)) {
        $type = 'general';
    }
    
    // Validate priority
    $allowed_priorities = ['low', 'normal', 'high', 'urgent'];
    if (!in_array($priority, $allowed_priorities)) {
        $priority = 'normal';
    }
    
    try {
        // Check if target user exists
        $user_check_query = "SELECT id FROM users WHERE id = ? AND status = 'active'";
        $user_check_stmt = $conn->prepare($user_check_query);
        $user_check_stmt->bind_param("i", $target_user_id);
        $user_check_stmt->execute();
        
        if ($user_check_stmt->get_result()->num_rows === 0) {
            json_response(false, 'Target user not found or inactive');
        }
        
        // Insert notification
        $query = "INSERT INTO notifications (user_id, title, message, type, priority, action_url, created_by, created_at) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isssssi", $target_user_id, $title, $message, $type, $priority, $action_url, $user_id);
        
        if ($stmt->execute()) {
            $notification_id = $conn->insert_id;
            log_activity($user_id, 'notification_create', "Created notification $notification_id for user $target_user_id");
            
            json_response(true, 'Notification created successfully', [
                'notification_id' => $notification_id
            ]);
        } else {
            throw new Exception('Failed to insert notification');
        }
        
    } catch (Exception $e) {
        log_error("Create notification error: " . $e->getMessage(), __FILE__, __LINE__);
        json_response(false, 'Failed to create notification');
    }
}

/**
 * Helper function to format time ago
 */
function time_ago($datetime) {
    $time = time() - strtotime($datetime);
    
    if ($time < 60) return 'just now';
    if ($time < 3600) return floor($time / 60) . ' minutes ago';
    if ($time < 86400) return floor($time / 3600) . ' hours ago';
    if ($time < 2592000) return floor($time / 86400) . ' days ago';
    if ($time < 31536000) return floor($time / 2592000) . ' months ago';
    
    return floor($time / 31536000) . ' years ago';
}

/**
 * Helper function to format datetime
 */
function format_datetime($datetime) {
    return date('M j, Y g:i A', strtotime($datetime));
}
?>