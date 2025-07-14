<?php
/**
 * Login Handler
 * Handles user authentication with improved security and error handling
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

// Redirect if already logged in
if (is_logged_in()) {
    header("Location: ../index.php");
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validate CSRF token
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        redirect_with_message('../login.php', 'Invalid request. Please try again.', 'error');
    }

    // Get and sanitize input
    $email = sanitize_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember_me = isset($_POST['remember_me']);

    // Validate input
    if (empty($email) || empty($password)) {
        redirect_with_message('../login.php', 'Please fill in all required fields.', 'error');
    }

    if (!validate_email($email)) {
        redirect_with_message('../login.php', 'Please enter a valid email address.', 'error');
    }

    // Check for rate limiting (based on IP)
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $rate_limit_query = "SELECT COUNT(*) as attempts FROM activity_logs 
                        WHERE ip_address = ? AND activity_type = 'login_failed' 
                        AND created_at > DATE_SUB(NOW(), INTERVAL 15 MINUTE)";
    $rate_result = fetch_single($rate_limit_query, [$ip_address], 's');

    if ($rate_result && $rate_result['attempts'] >= 5) {
        log_activity(null, 'login_blocked', "Login blocked due to too many failed attempts from IP: $ip_address");
        redirect_with_message('../login.php', 'Too many failed login attempts. Please try again after 15 minutes.', 'error');
    }

    // Fetch user from database (matches your table columns)
    $user_query = "SELECT id, name, email, phone, password, role, status, profile_image, created_at, updated_at, last_activity, online_status FROM users WHERE email = ? LIMIT 1";
    $user = fetch_single($user_query, [$email], 's');

    if (!$user) {
        log_activity(null, 'login_failed', "Failed login attempt for non-existent email: $email from IP: $ip_address");
        redirect_with_message('../login.php', 'Invalid email or password.', 'error');
    }

    // Check if user account is active
    if ($user['status'] !== 'active') {
        log_activity($user['id'], 'login_failed', "Login attempt on inactive account: $email from IP: $ip_address");
        redirect_with_message('../login.php', 'Your account is inactive. Please contact administrator.', 'error');
    }

    // Verify password
    if (!verify_password($password, $user['password'])) {
        log_activity($user['id'], 'login_failed', "Failed login attempt for user: $email from IP: $ip_address");
        redirect_with_message('../login.php', 'Invalid email or password.', 'error');
    }

    // Successful login — update online_status & last_activity
    update_record('users', 
        [
            'online_status' => 'online',
            'last_activity' => date('Y-m-d H:i:s')
        ], 
        'id = ?', 
        [$user['id']]
    );

    // Set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role'];
    $_SESSION['login_time'] = time();

    // Log successful login
    log_activity($user['id'], 'login_success', "User logged in successfully from IP: $ip_address");

    // Send welcome notification
    send_notification($user['id'], 'Welcome Back!', 'You have successfully logged in to your account.', 'success');

    // Determine redirect URL
    $redirect_url = '../index.php';
    if (isset($_SESSION['redirect_after_login'])) {
        $redirect_url = $_SESSION['redirect_after_login'];
        unset($_SESSION['redirect_after_login']);
    }

    // Redirect with success message
    redirect_with_message($redirect_url, 'Welcome back, ' . $user['name'] . '!', 'success');

} else {
    // If not POST request, redirect to login page
    header("Location: ../login.php");
    exit();
}
?>