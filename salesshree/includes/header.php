<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get user info from session
$user_name = $_SESSION['user_name'] ?? 'User';
$user_role = $_SESSION['user_role'] ?? 'executive';
$user_email = $_SESSION['user_email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales CRM - Dashboard</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">
    
    <style>
        /* Custom CSS for modern look */
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #6366f1;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --sidebar-width: 300px;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f1f5f9;
        }
        
        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }
        
        .sidebar.hide {
            transform: translateX(-100%);
        }
        
        .sidebar-brand {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-nav {
            padding: 1rem 0;
        }
        
        .nav-item {
            margin: 0.2rem 0.5rem;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 0.8rem 1rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: #fff;
            color: var(--secondary-color);
            transform: translateX(5px);
        }
        
        .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }
        
        .main-content.expanded {
            margin-left: 0;
        }
        
        /* Top Navigation */
        .top-nav {
            background: white;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .content-area {
            padding: 2rem 1.5rem;
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .content-area {
                padding: 1rem;
            }
        }
        
        /* Loader Styles */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        
        .loader {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Offcanvas for mobile */
        .offcanvas-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
        }
        
        .offcanvas-body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 0;
        }
    </style>
</head>
<body>
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader"></div>
    </div>

    <!-- Sidebar for Desktop -->
    <div class="sidebar d-none d-md-block" id="sidebar">
        <div class="sidebar-brand">
            <h4 class="mb-0">
                <i class="bi bi-graph-up me-2"></i>
                Sales CRM
            </h4>
            <small class="text-light opacity-75">Manage your leads efficiently</small>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="loadModule('dashboard')">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadModule('leads')">
                        <i class="bi bi-people"></i>
                        Leads Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadModule('followups')">
                        <i class="bi bi-calendar-check"></i>
                        Follow-ups
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadModule('quotations')">
                        <i class="bi bi-file-text"></i>
                        Quotations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadModule('junk-leads')">
                        <i class="bi bi-trash"></i>
                        Junk Leads
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadModule('reports')">
                        <i class="bi bi-graph-up"></i>
                        Reports & Analytics
                    </a>
                </li>
                
                <?php if($user_role == 'admin' || $user_role == 'manager'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadModule('users')">
                        <i class="bi bi-person-gear"></i>
                        User Management
                    </a>
                </li>
                <?php endif; ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadModule('profile')">
                        <i class="bi bi-person-circle"></i>
                        My Profile
                    </a>
                </li>
                
                <?php if($user_role == 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadModule('settings')">
                        <i class="bi bi-gear"></i>
                        Settings
                    </a>
                </li>
                <?php endif; ?>
                
                <li class="nav-item mt-3">
                    <a class="nav-link text-outline-danger" href="auth/logout.php">
                        <i class="bi bi-power"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Mobile Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">
                <i class="bi bi-graph-up me-2"></i>
                Sales CRM
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="sidebar-nav">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="loadModule('dashboard'); closeMobileSidebar();">
                            <i class="bi bi-speedometer2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="loadModule('leads'); closeMobileSidebar();">
                            <i class="bi bi-people"></i>
                            Leads Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="loadModule('followups'); closeMobileSidebar();">
                            <i class="bi bi-calendar-check"></i>
                            Follow-ups
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="loadModule('quotations'); closeMobileSidebar();">
                            <i class="bi bi-file-text"></i>
                            Quotations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="loadModule('junk-leads'); closeMobileSidebar();">
                            <i class="bi bi-trash"></i>
                            Junk Leads
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="loadModule('reports'); closeMobileSidebar();">
                            <i class="bi bi-graph-up"></i>
                            Reports & Analytics
                        </a>
                    </li>
                    
                    <?php if($user_role == 'admin' || $user_role == 'manager'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="loadModule('users'); closeMobileSidebar();">
                            <i class="bi bi-person-gear"></i>
                            User Management
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="loadModule('profile'); closeMobileSidebar();">
                            <i class="bi bi-person-circle"></i>
                            My Profile
                        </a>
                    </li>
                    
                    <?php if($user_role == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="loadModule('settings'); closeMobileSidebar();">
                            <i class="bi bi-gear"></i>
                            Settings
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <li class="nav-item mt-3">
                        <a class="nav-link text-danger" href="auth/logout.php">
                            <i class="bi bi-power"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content" id="mainContent">
        <!-- Top Navigation -->
        <nav class="top-nav d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <!-- Mobile Menu Toggle -->
                <button class="btn btn-outline-primary d-md-none me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                    <i class="bi bi-list"></i>
                </button>
                
                <!-- Desktop Sidebar Toggle -->
                <button class="btn btn-outline-primary d-none d-md-block me-3" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                
                <h5 class="mb-0" id="pageTitle">Dashboard</h5>
            </div>
            
            <div class="d-flex align-items-center">
                <!-- Notifications -->
                <div class="dropdown me-3">
                    <button class="btn btn-outline-secondary position-relative" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><h6 class="dropdown-header">Notifications</h6></li>
                        <li><a class="dropdown-item" href="#"><small>3 follow-ups due today</small></a></li>
                        <li><a class="dropdown-item" href="#"><small>New lead assigned</small></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center" href="#">View All</a></li>
                    </ul>
                </div>
                
                <!-- User Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-2"></i>
                        <span class="d-none d-sm-inline"><?php echo htmlspecialchars($user_name); ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><h6 class="dropdown-header"><?php echo htmlspecialchars($user_email); ?></h6></li>
                        <li><span class="dropdown-item-text"><small>Role: <?php echo ucfirst($user_role); ?></small></span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="loadModule('profile')"><i class="bi bi-person me-2"></i>My Profile</a></li>
                        <li><a class="dropdown-item" href="auth/logout.php"><i class="bi bi-power me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Dynamic Content Area -->
        <div class="content-area" id="contentArea">
            <!-- Content will be loaded here via AJAX -->
        </div>
    </div>

    <script>
        // Close mobile sidebar function
        function closeMobileSidebar() {
            const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('mobileSidebar'));
            if (offcanvas) {
                offcanvas.hide();
            }
        }
        
        // Toggle desktop sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('hide');
            mainContent.classList.toggle('expanded');
        }
        
        // Update active nav item
        function updateActiveNav(module) {
            // Remove active class from all nav links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active class to current module link
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('onclick') && link.getAttribute('onclick').includes(module)) {
                    link.classList.add('active');
                }
            });
            
            // Update page title
            const titles = {
                'dashboard': 'Dashboard',
                'leads': 'Leads Management',
                'followups': 'Follow-ups',
                'quotations': 'Quotations',
                'junk-leads': 'Junk Leads',
                'reports': 'Reports & Analytics',
                'users': 'User Management',
                'profile': 'My Profile',
                'settings': 'Settings'
            };
            
            document.getElementById('pageTitle').textContent = titles[module] || 'Dashboard';
        }
    </script>