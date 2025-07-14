<?php
/**
 * Main Configuration File
 * Contains all system configurations and constants
 */

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone setting
date_default_timezone_set('Asia/Kolkata');

// Application Configuration
define('APP_NAME', 'Sales CRM');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost/sales_crm');
define('BASE_PATH', __DIR__ . '/..');

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'u776627341_sales_crm');
define('DB_USER', 'u776627341_sales_crm');
define('DB_PASS', 'GTCSsales40#@');
define('DB_CHARSET', 'utf8mb4');



// File Upload Configuration
define('UPLOAD_DIR', BASE_PATH . '/assets/uploads');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_IMAGE_TYPES', ['jpg', 'jpeg', 'png', 'gif']);
define('ALLOWED_DOCUMENT_TYPES', ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt']);

// Security Configuration
define('SALT', 'your_random_salt_here_change_this');
define('SESSION_LIFETIME', 3600); // 1 hour
define('CSRF_TOKEN_LIFETIME', 3600); // 1 hour

// Email Configuration (for future implementation)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your_email@gmail.com');
define('SMTP_PASSWORD', 'your_password');
define('FROM_EMAIL', 'noreply@yourcompany.com');
define('FROM_NAME', 'Sales CRM');

// Pagination Configuration
define('RECORDS_PER_PAGE', 25);
define('MAX_PAGINATION_LINKS', 10);

// System Settings
define('DEFAULT_CURRENCY', 'INR');
define('DEFAULT_DATE_FORMAT', 'd-m-Y');
define('DEFAULT_DATETIME_FORMAT', 'd-m-Y H:i');
define('DEFAULT_TIMEZONE', 'Asia/Kolkata');

// Lead Sources
define('LEAD_SOURCES', [
    'Website',
    'Social Media',
    'Referral',
    'Cold Call',
    'Email Campaign',
    'Advertisement',
    'Trade Show',
    'Partner',
    'Other'
]);

// Services Offered
define('SERVICES', [
    'Web Development',
    'Mobile App Development',
    'Digital Marketing',
    'SEO Services',
    'E-commerce Development',
    'Software Development',
    'UI/UX Design',
    'Business Consulting',
    'Cloud Services',
    'Other'
]);

// Lead Statuses
define('LEAD_STATUSES', [
    'cold' => 'Cold',
    'warm' => 'Warm',
    'hot' => 'Hot',
    'converted' => 'Converted',
    'junk' => 'Junk'
]);

// Contact Types for Follow-ups
define('CONTACT_TYPES', [
    'call' => 'Phone Call',
    'email' => 'Email',
    'meeting' => 'Meeting',
    'whatsapp' => 'WhatsApp',
    'sms' => 'SMS',
    'other' => 'Other'
]);

// Quotation Statuses
define('QUOTATION_STATUSES', [
    'draft' => 'Draft',
    'sent' => 'Sent',
    'accepted' => 'Accepted',
    'rejected' => 'Rejected',
    'expired' => 'Expired'
]);

// User Roles
define('USER_ROLES', [
    'admin' => 'Administrator',
    'manager' => 'Manager',
    'executive' => 'Sales Executive'
]);

// Activity Types for Logging
define('ACTIVITY_TYPES', [
    'login' => 'User Login',
    'logout' => 'User Logout',
    'lead_created' => 'Lead Created',
    'lead_updated' => 'Lead Updated',
    'lead_deleted' => 'Lead Deleted',
    'lead_assigned' => 'Lead Assigned',
    'followup_created' => 'Follow-up Created',
    'followup_updated' => 'Follow-up Updated',
    'quotation_created' => 'Quotation Created',
    'quotation_sent' => 'Quotation Sent',
    'user_created' => 'User Created',
    'settings_updated' => 'Settings Updated'
]);

// Notification Types
define('NOTIFICATION_TYPES', [
    'info' => 'Information',
    'success' => 'Success',
    'warning' => 'Warning',
    'danger' => 'Error'
]);

// Include required files
require_once 'database.php';
require_once 'functions.php';

// Auto-clean old records (run randomly)
if (rand(1, 100) == 1) {
    clean_old_notifications(30);
    clean_old_activity_logs(90);
}

// Function to check if installation is required
function installation_required() {
    global $conn;
    
    if (!$conn) {
        return true;
    }
    
    // Check if users table exists and has admin user
    $result = $conn->query("SHOW TABLES LIKE 'users'");
    if ($result->num_rows == 0) {
        return true;
    }
    
    $result = $conn->query("SELECT COUNT(*) as count FROM users WHERE role = 'admin'");
    $row = $result->fetch_assoc();
    
    return $row['count'] == 0;
}

// Function to get application settings
function get_app_settings() {
    static $settings = null;
    
    if ($settings === null) {
        $settings = [];
        $query = "SELECT setting_type, setting_key, setting_value FROM settings WHERE is_active = 1";
        $result = fetch_multiple($query);
        
        foreach ($result as $row) {
            $settings[$row['setting_type']][$row['setting_key']] = $row['setting_value'];
        }
    }
    
    return $settings;
}

// Function to get company info
function get_company_info() {
    $settings = get_app_settings();
    return $settings['company'] ?? [
        'name' => 'Your Company Name',
        'email' => 'info@yourcompany.com',
        'phone' => '+91 9999999999',
        'address' => 'Your Company Address'
    ];
}

// Function to check system requirements
function check_system_requirements() {
    $requirements = [
        'PHP Version >= 7.4' => version_compare(PHP_VERSION, '7.4.0', '>='),
        'MySQLi Extension' => extension_loaded('mysqli'),
        'GD Extension' => extension_loaded('gd'),
        'JSON Extension' => extension_loaded('json'),
        'Session Support' => function_exists('session_start'),
        'File Upload Support' => ini_get('file_uploads'),
        'Uploads Directory Writable' => is_writable(dirname(UPLOAD_DIR))
    ];
    
    return $requirements;
}

// Set default headers for security
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// // Session security
// ini_set('session.cookie_httponly', 1);
// ini_set('session.use_only_cookies', 1);
// ini_set('session.cookie_secure', 0); // Set to 1 for HTTPS

// Session timeout check
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > SESSION_LIFETIME)) {
    session_unset();
    session_destroy();
    session_start();
}
$_SESSION['last_activity'] = time();
?>