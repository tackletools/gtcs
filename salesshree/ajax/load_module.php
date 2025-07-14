<?php
/**
 * AJAX Module Loader
 * Loads different modules dynamically via AJAX
 */
require_once '../config/config.php';

// Check if user is logged in
if (!is_logged_in()) {
    json_response(false, 'Unauthorized access');
}

// Get module name from request
$module = $_POST['module'] ?? '';

// Validate module name
$allowed_modules = [
    'dashboard',
    'leads',
    'add-lead',
    'edit-lead',
    'view-lead',
    'junk-leads',
    'followups',
    'add-followup',
    'quotations',
    'create-quote',
    'view-quote',
    'reports',
    'users',
    'profile',
    'settings',
    'notifications'
];

if (!in_array($module, $allowed_modules)) {
    json_response(false, 'Invalid module');
}

// Check user permissions for specific modules
$user_role = $_SESSION['user_role'] ?? 'user';
$restricted_modules = [
    'users' => ['admin', 'manager'],
    'settings' => ['admin'],
    'reports' => ['admin', 'manager']
];

if (isset($restricted_modules[$module]) && !in_array($user_role, $restricted_modules[$module])) {
    json_response(false, 'Access denied');
}

// ✅ REMOVED: Don't set HTML content-type when returning JSON
// header('Content-Type: text/html; charset=utf-8');

// Start output buffering
ob_start();

try {
    // Load the appropriate module
    switch ($module) {
        case 'dashboard':
            if (file_exists('../modules/dashboard/dashboard.php')) {
                include '../modules/dashboard/dashboard.php';
            } else {
                throw new Exception('Dashboard module not found');
            }
            break;
            
        case 'leads':
            if (file_exists('../modules/leads/leads.php')) {
                include '../modules/leads/leads.php';
            } else {
                throw new Exception('Leads module not found');
            }
            break;
            
        case 'add-lead':
            if (file_exists('../modules/leads/add_lead.php')) {
                include '../modules/leads/add_lead.php';
            } else {
                throw new Exception('Add lead module not found');
            }
            break;
            
        case 'edit-lead':
            $lead_id = $_GET['id'] ?? $_POST['id'] ?? 0;
            if (!$lead_id) {
                throw new Exception('Lead ID is required');
            }
            if (file_exists('../modules/leads/edit_lead.php')) {
                include '../modules/leads/edit_lead.php';
            } else {
                throw new Exception('Edit lead module not found');
            }
            break;
            
        case 'view-lead':
            $lead_id = $_GET['id'] ?? $_POST['id'] ?? 0;
            if (!$lead_id) {
                throw new Exception('Lead ID is required');
            }
            if (file_exists('../modules/leads/view_lead.php')) {
                include '../modules/leads/view_lead.php';
            } else {
                throw new Exception('View lead module not found');
            }
            break;
            
        case 'junk-leads':
            if (file_exists('../modules/leads/junk_leads.php')) {
                include '../modules/leads/junk_leads.php';
            } else {
                throw new Exception('Junk leads module not found');
            }
            break;
            
        case 'followups':
            if (file_exists('../modules/followups/followups.php')) {
                include '../modules/followups/followups.php';
            } else {
                throw new Exception('Followups module not found');
            }
            break;
            
        case 'add-followup':
            $lead_id = $_GET['lead_id'] ?? $_POST['lead_id'] ?? 0;
            if (!$lead_id) {
                throw new Exception('Lead ID is required');
            }
            if (file_exists('../modules/followups/add_followup.php')) {
                include '../modules/followups/add_followup.php';
            } else {
                throw new Exception('Add followup module not found');
            }
            break;
            
        case 'quotations':
            if (file_exists('../modules/quotations/quotations.php')) {
                include '../modules/quotations/quotations.php';
            } else {
                throw new Exception('Quotations module not found');
            }
            break;
            
        case 'create-quote':
            $lead_id = $_GET['lead_id'] ?? $_POST['lead_id'] ?? 0;
            if (!$lead_id) {
                throw new Exception('Lead ID is required');
            }
            if (file_exists('../modules/quotations/create_quote.php')) {
                include '../modules/quotations/create_quote.php';
            } else {
                throw new Exception('Create quote module not found');
            }
            break;
            
        case 'view-quote':
            $quote_id = $_GET['id'] ?? $_POST['id'] ?? 0;
            if (!$quote_id) {
                throw new Exception('Quote ID is required');
            }
            if (file_exists('../modules/quotations/view_quote.php')) {
                include '../modules/quotations/view_quote.php';
            } else {
                throw new Exception('View quote module not found');
            }
            break;
            
        case 'reports':
            if (file_exists('../modules/reports/reports.php')) {
                include '../modules/reports/reports.php';
            } else {
                throw new Exception('Reports module not found');
            }
            break;
            
        case 'users':
            if (file_exists('../modules/users/users.php')) {
                include '../modules/users/users.php';
            } else {
                throw new Exception('Users module not found');
            }
            break;
            
        case 'profile':
            if (file_exists('../modules/users/profile.php')) {
                include '../modules/users/profile.php';
            } else {
                throw new Exception('Profile module not found');
            }
            break;
            
        case 'settings':
            if (file_exists('../modules/users/settings.php')) {
                include '../modules/users/settings.php';
            } else {
                throw new Exception('Settings module not found');
            }
            break;
            
        case 'notifications':
            if (file_exists('../modules/notifications/notifications.php')) {
                include '../modules/notifications/notifications.php';
            } else {
                throw new Exception('Notifications module not found');
            }
            break;
            
        default:
            throw new Exception('Module not found');
    }
    
    // Get the content
    $content = ob_get_clean();
    
    // Log activity
    if (function_exists('log_activity')) {
        log_activity($_SESSION['user_id'], 'module_access', "Accessed module: $module");
    }
    
    // ✅ Set JSON content-type before returning JSON
    header('Content-Type: application/json; charset=utf-8');
    
    // Return success response with content
    echo json_encode([
        'success' => true,
        'content' => $content,
        'module' => $module,
        'timestamp' => time()
    ]);
    
} catch (Exception $e) {
    // Clear any output
    ob_end_clean();
    
    // Log error
    if (function_exists('log_error')) {
        log_error("Module loading error: " . $e->getMessage(), __FILE__, __LINE__);
    }
    
    // Return error response
    json_response(false, $e->getMessage());
}
?>