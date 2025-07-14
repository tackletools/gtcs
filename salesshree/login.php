<?php
/**
 * Login Page - Root Level
 * Enhanced login form with security features
 */

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include required files
require_once 'config/database.php';
require_once 'config/functions.php';

// Check for remember me cookie
if (isset($_COOKIE['remember_token']) && !is_logged_in()) {
    $remember_token = $_COOKIE['remember_token'];
    $remember_hash = hash('sha256', $remember_token);
    
    $user_query = "SELECT id, name, email, role, status FROM users 
                   WHERE remember_token = ? AND status = 'active' LIMIT 1";
    $user = fetch_single($user_query, [$remember_hash], 's');
    
    if ($user) {
        // Auto-login user
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['login_time'] = time();
        
        // Update last login
        update_record('users', 
            ['last_login' => date('Y-m-d H:i:s'), 'online_status' => 'online'], 
            'id = ?', 
            [$user['id']]
        );
        
        // Log auto-login
        log_activity($user['id'], 'auto_login', 'User auto-logged in via remember me token');
        
        header("Location: index.php");
        exit();
    } else {
        // Invalid remember token, clear cookie
        setcookie('remember_token', '', time() - 3600, '/');
    }
}

// Redirect if already logged in
if (is_logged_in()) {
    header("Location: index.php");
    exit();
}

// Get flash messages
$flash_message = get_flash_message();

// Generate CSRF token
$csrf_token = generate_csrf_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sales CRM</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link href="assets/css/custom.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            overflow: hidden;
        }
        
        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .login-form {
            padding: 2rem;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .input-group-text {
            background: transparent;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }
        
        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }
        
        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .forgot-password:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        
        .loading {
            display: none;
        }
        
        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }
        
        @media (max-width: 768px) {
            .login-container {
                margin: 1rem;
                border-radius: 15px;
            }
            
            .login-header {
                padding: 1.5rem;
            }
            
            .login-form {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="login-container">
                    <div class="login-header">
                        <h2 class="mb-1">
                            <i class="fas fa-chart-line me-2"></i>
                            Sales CRM
                        </h2>
                        <p class="mb-0 opacity-75">Welcome back! Please sign in to your account.</p>
                    </div>
                    
                    <div class="login-form">
                        <?php if ($flash_message): ?>
                            <div class="alert alert-<?= $flash_message['type'] === 'error' ? 'danger' : $flash_message['type'] ?> alert-dismissible fade show" role="alert">
                                <i class="fas fa-<?= $flash_message['type'] === 'error' ? 'exclamation-triangle' : ($flash_message['type'] === 'success' ? 'check-circle' : 'info-circle') ?> me-2"></i>
                                <?= htmlspecialchars($flash_message['message']) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        
                        <form action="auth/login.php" method="POST" id="loginForm">
                            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           placeholder="Enter your email" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Enter your password" required>
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
                                    <label class="form-check-label" for="remember_me">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="forgot-password">Forgot password?</a>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-login text-white">
                                    <span class="login-text">
                                        <i class="fas fa-sign-in-alt me-2"></i>
                                        Sign In
                                    </span>
                                    <span class="loading">
                                        <i class="fas fa-spinner fa-spin me-2"></i>
                                        Signing in...
                                    </span>
                                </button>
                            </div>
                        </form>
                        
                        <div class="text-center mt-4">
                            <p class="text-muted mb-0">
                                <i class="fas fa-shield-alt me-1"></i>
                                Your data is secure with us
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Form submission handling
        document.getElementById('loginForm').addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            const loginText = submitBtn.querySelector('.login-text');
            const loading = submitBtn.querySelector('.loading');
            
            loginText.style.display = 'none';
            loading.style.display = 'inline';
            submitBtn.disabled = true;
        });
        
        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
        
        // Focus on email field on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });
    </script>
</body>
</html>