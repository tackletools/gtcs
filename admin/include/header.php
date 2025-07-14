<?php
// You can add PHP session management and authentication here
session_start();

// Define current page for active navigation
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Global Tech Consultancy - Dashboard'; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gradient-sidebar {
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .sidebar-transition {
            transition: all 0.3s ease;
        }
        
        .logo-circle {
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #667eea;
        }
        
        .table-actions .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
        
        .sidebar-width {
            width: 280px;
        }
        
        .sidebar-collapsed {
            width: 0;
            overflow: hidden;
        }
        
        .main-content-expanded {
            margin-left: 0;
        }
        
        .main-content {
            margin-left: 280px;
            transition: margin-left 0.3s ease;
        }
        
        .footer-expanded {
            margin-left: 0;
        }
        
        .footer {
            margin-left: 280px;
            transition: margin-left 0.3s ease;
        }
        
        .nav-link.active {
            background-color: #0d6efd !important;
            color: white !important;
        }
        
        .content-wrapper {
            min-height: calc(100vh - 140px);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg gradient-header text-white fixed-top">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-light me-3" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="logo-circle me-3">
                    <i class="fas fa-code"></i>
                </div>
                <h4 class="mb-0 fw-bold">Global Tech Consultancy</h4>
            </div>
            <div class="d-flex align-items-center">
                <span class="me-3">Admin Panel</span>
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar-width gradient-sidebar position-fixed h-100 sidebar-transition" id="sidebar" style="top: 70px; z-index: 999;">
        <div class="p-3">
            <h6 class="text-muted fw-bold mb-3">NAVIGATION</h6>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark <?php echo ($current_page == 'index' || $current_page == 'dashboard') ? 'active' : ''; ?>" href="index.php">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark <?php echo $current_page == 'tables' ? 'active' : ''; ?>" href="tables.php">
                        <i class="fas fa-table me-2"></i>Database Tables
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark <?php echo $current_page == 'blogs' ? 'active' : ''; ?>" href="blogs.php">
                        <i class="fas fa-blog me-2"></i>Blogs
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark <?php echo $current_page == 'categories' ? 'active' : ''; ?>" href="categories.php">
                        <i class="fas fa-tags me-2"></i>Categories
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark <?php echo $current_page == 'contacts' ? 'active' : ''; ?>" href="contacts.php">
                        <i class="fas fa-envelope me-2"></i>Contact Messages
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark <?php echo $current_page == 'guides' ? 'active' : ''; ?>" href="guides.php">
                        <i class="fas fa-download me-2"></i>Free Guide Requests
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark <?php echo $current_page == 'jobs' ? 'active' : ''; ?>" href="jobs.php">
                        <i class="fas fa-briefcase me-2"></i>Job Applications
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content content-wrapper" id="mainContent" style="margin-top: 70px;">
        <div class="container-fluid p-4">