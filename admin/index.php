<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Tech Consultancy - Dashboard</title>
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
                    <a class="nav-link text-dark active bg-primary text-white rounded" href="#dashboard">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="#tables">
                        <i class="fas fa-table me-2"></i>Database Tables
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="#blogs">
                        <i class="fas fa-blog me-2"></i>Blogs
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="#categories">
                        <i class="fas fa-tags me-2"></i>Categories
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="#contacts">
                        <i class="fas fa-envelope me-2"></i>Contact Messages
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="#guides">
                        <i class="fas fa-download me-2"></i>Free Guide Requests
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="#jobs">
                        <i class="fas fa-briefcase me-2"></i>Job Applications
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent" style="margin-top: 70px;">
        <div class="container-fluid p-4">
            <!-- Dashboard Overview -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="fw-bold">Database Management</h2>
                        <button class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add New Table
                        </button>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title">Total Tables</h6>
                                    <h3 class="fw-bold">5</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-table fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title">Total Records</h6>
                                    <h3 class="fw-bold">18</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-database fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title">Total Size</h6>
                                    <h3 class="fw-bold">112 KB</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-hdd fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title">Active Tables</h6>
                                    <h3 class="fw-bold">5</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-check-circle fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Database Tables -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0 fw-bold">Database Tables Management</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Table Name <i class="fas fa-sort"></i></th>
                                            <th>Rows</th>
                                            <th>Type</th>
                                            <th>Collation</th>
                                            <th>Size</th>
                                            <th>Overhead</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>blogs</strong></td>
                                            <td><span class="badge bg-primary">3</span></td>
                                            <td>InnoDB</td>
                                            <td><small>utf8mb4_unicode_ci</small></td>
                                            <td>32.0 KiB</td>
                                            <td>-</td>
                                            <td class="table-actions">
                                                <button class="btn btn-sm btn-outline-primary me-1" title="Browse">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary me-1" title="Structure">
                                                    <i class="fas fa-cogs"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-info me-1" title="Search">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-success me-1" title="Insert">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-warning me-1" title="Empty">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Drop">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>blog_categories</strong></td>
                                            <td><span class="badge bg-primary">6</span></td>
                                            <td>InnoDB</td>
                                            <td><small>utf8mb4_unicode_ci</small></td>
                                            <td>48.0 KiB</td>
                                            <td>-</td>
                                            <td class="table-actions">
                                                <button class="btn btn-sm btn-outline-primary me-1" title="Browse">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary me-1" title="Structure">
                                                    <i class="fas fa-cogs"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-info me-1" title="Search">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-success me-1" title="Insert">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-warning me-1" title="Empty">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Drop">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>contact_messages</strong></td>
                                            <td><span class="badge bg-primary">5</span></td>
                                            <td>InnoDB</td>
                                            <td><small>utf8mb4_unicode_ci</small></td>
                                            <td>16.0 KiB</td>
                                            <td>-</td>
                                            <td class="table-actions">
                                                <button class="btn btn-sm btn-outline-primary me-1" title="Browse">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary me-1" title="Structure">
                                                    <i class="fas fa-cogs"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-info me-1" title="Search">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-success me-1" title="Insert">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-warning me-1" title="Empty">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Drop">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>free_guide_requests</strong></td>
                                            <td><span class="badge bg-primary">4</span></td>
                                            <td>InnoDB</td>
                                            <td><small>utf8mb4_unicode_ci</small></td>
                                            <td>16.0 KiB</td>
                                            <td>-</td>
                                            <td class="table-actions">
                                                <button class="btn btn-sm btn-outline-primary me-1" title="Browse">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary me-1" title="Structure">
                                                    <i class="fas fa-cogs"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-info me-1" title="Search">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-success me-1" title="Insert">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-warning me-1" title="Empty">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Drop">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>job_applications</strong></td>
                                            <td><span class="badge bg-secondary">-</span></td>
                                            <td>InnoDB</td>
                                            <td><small>utf8mb4_unicode_ci</small></td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td class="table-actions">
                                                <button class="btn btn-sm btn-outline-primary me-1" title="Browse">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary me-1" title="Structure">
                                                    <i class="fas fa-cogs"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-info me-1" title="Search">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-success me-1" title="Insert">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-warning me-1" title="Empty">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Drop">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0 fw-bold">Recent Database Activity</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">New blog entry added</h6>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                    <span class="badge bg-success">SUCCESS</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Contact message received</h6>
                                        <small class="text-muted">5 hours ago</small>
                                    </div>
                                    <span class="badge bg-info">INFO</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Free guide request processed</h6>
                                        <small class="text-muted">1 day ago</small>
                                    </div>
                                    <span class="badge bg-warning">PENDING</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2024 Global Tech Consultancy Service. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            if (sidebar.classList.contains('sidebar-collapsed')) {
                sidebar.classList.remove('sidebar-collapsed');
                mainContent.classList.remove('main-content-expanded');
            } else {
                sidebar.classList.add('sidebar-collapsed');
                mainContent.classList.add('main-content-expanded');
            }
        });

        // Add click handlers for table actions
        document.querySelectorAll('.table-actions button').forEach(button => {
            button.addEventListener('click', function() {
                const action = this.getAttribute('title');
                const row = this.closest('tr');
                const tableName = row.querySelector('td:first-child strong').textContent;
                
                alert(`${action} action for table: ${tableName}`);
            });
        });

        // Add click handlers for navigation
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                document.querySelectorAll('.nav-link').forEach(l => {
                    l.classList.remove('active', 'bg-primary', 'text-white');
                });
                
                // Add active class to clicked link
                this.classList.add('active', 'bg-primary', 'text-white');
            });
        });
    </script>
</body>
</html>