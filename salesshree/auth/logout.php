<?php
/**
 * Logout Handler
 * Handles user logout and session cleanup
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include required files
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/functions.php';

// Log logout activity if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'] ?? 'Unknown';
    
    // Log the logout activity
    log_activity($user_id, 'logout', 'User logged out');
    
    // Update user's last activity and set online status to offline
    $update_query = "UPDATE users SET last_activity = NOW(), online_status = 'offline' WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
}

// Clear all session variables
$_SESSION = array();

// Delete the session cookie if it exists
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Destroy the session
session_destroy();

// Start a new session for the flash message
session_start();

// Redirect to login page with success message
redirect_with_message('../login.php', 'You have been successfully logged out.', 'success');
?>