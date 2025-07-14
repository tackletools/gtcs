<?php
/**
 * Sales CRM - Main Dashboard Page
 * This is the main entry point for the CRM system
 * Includes header with sidebar and loads modules dynamically
 */

// Start session
session_start();
define('SITE_NAME', 'CRM Dashboard');
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include configuration and functions
require_once 'config/database.php';
require_once 'config/functions.php';

// Get user information
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_role = $_SESSION['user_role'];
$user_email = $_SESSION['user_email'];


// Database configuration
$host = "localhost";
$user = "u776627341_sales_crm"; // change as needed
$password = "GTCSsales40#@"; // change as needed
$database = "u776627341_sales_crm";

// Database connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get current module from URL parameter
$current_module = isset($_GET['module']) ? sanitize_input($_GET['module']) : 'dashboard';

// Log user activity
$ip_address = $_SERVER['REMOTE_ADDR'];
$stmt = $conn->prepare("INSERT INTO activity_logs (user_id, activity_type, description, ip_address) VALUES (?, ?, ?, ?)");
$activity_type = "page_access";
$description = "Accessed CRM dashboard";
$stmt->bind_param("isss", $user_id, $activity_type, $description, $ip_address);
$stmt->execute();
$stmt->close();

// Include header (which contains the complete HTML structure)
include 'includes/header.php';

// The content area will be loaded via AJAX, but we can include a default dashboard here
?>

<!-- This script will be executed after the page loads -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get module from URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const module = urlParams.get('module') || 'dashboard';
    
    // Update the loadModule function to include history management
    const originalLoadModule = window.loadModule;
    window.loadModule = function(module, data = {}) {
        originalLoadModule(module, data);
        
        // Update URL without page reload
        const url = new URL(window.location);
        url.searchParams.set('module', module);
        history.pushState({module: module}, '', url);
    };
    
    // Load the initial module
    setTimeout(() => {
        loadModule(module);
    }, 100);
});
</script>

<?php
// Include footer
include 'includes/footer.php';

// Close database connection
$conn->close();
?>