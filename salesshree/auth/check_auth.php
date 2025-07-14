<?php
/**
 * Authentication Check
 * Ensures user is logged in before accessing protected pages
 */

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include required files
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/functions.php';

// Check if user is logged in
if (!is_logged_in()) {
    // Store the current page URL for redirect after login
    if (!isset($_SESSION['redirect_after_login'])) {
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    }
    
    // Redirect to login page with message
    redirect_with_message('../login.php', 'Please login to access this page.', 'warning');
}

// Check if user account is still active
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_query = "SELECT status FROM users WHERE id = ? LIMIT 1";
    $user_result = fetch_single($user_query, [$user_id], 'i');
    
    if (!$user_result || $user_result['status'] !== 'active') {
        // User account is inactive, destroy session
        session_destroy();
        redirect_with_message('../login.php', 'Your account has been deactivated. Please contact administrator.', 'error');
    }
}

// Update last activity timestamp
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $update_activity = "UPDATE users SET last_activity = NOW() WHERE id = ?";
    $stmt = $conn->prepare($update_activity);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
}

// Function to check specific role permissions
function require_role($required_role) {
    if (!has_role($required_role)) {
        redirect_with_message('../index.php', 'You do not have permission to access this page.', 'error');
    }
}

// Set user data in global variables for easy access
$current_user_id = $_SESSION['user_id'];
$current_user_name = $_SESSION['user_name'];
$current_user_email = $_SESSION['user_email'];
$current_user_role = $_SESSION['user_role'];

// Log user activity if this is not an AJAX request
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
    $page_name = basename($_SERVER['PHP_SELF']);
    $activity_description = "Accessed page: $page_name";
    log_activity($current_user_id, 'page_access', $activity_description);
}
?>