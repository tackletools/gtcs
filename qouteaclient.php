<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Tech - Quotation Generator</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-bg: #f8fafc;
            --card-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-card: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--gradient-primary);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 10px 0;
        }

        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-header {
            background: var(--gradient-card);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .form-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .form-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .form-body {
            padding: 3rem;
        }

        .section-title {
            color: var(--secondary-color);
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--light-bg);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary-color);
        }

        .form-control, .form-select {
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafbfc;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
            background: white;
            transform: translateY(-1px);
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .tech-stack-section {
            background: var(--light-bg);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            border: 1px solid #e2e8f0;
        }

        .tech-options {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .tech-checkbox {
            position: relative;
        }

        .tech-checkbox input[type="checkbox"] {
            display: none;
        }

        .tech-label {
            display: inline-block;
            background: white;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
            user-select: none;
        }

        .tech-checkbox input[type="checkbox"]:checked + .tech-label {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .payment-options {
            background: #f0f7ff;
            border-radius: 15px;
            padding: 2rem;
            margin-top: 1.5rem;
            border: 1px solid #bfdbfe;
        }

        .payment-option {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .payment-option:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.1);
        }

        .payment-option.selected {
            border-color: var(--primary-color);
            background: #f0f7ff;
            box-shadow: 0 0 0 0.125rem rgba(37, 99, 235, 0.25);
        }

        .payment-option input[type="radio"] {
            margin-right: 0.75rem;
            transform: scale(1.2);
        }

        .btn-primary {
            background: var(--gradient-card);
            border: none;
            border-radius: 12px;
            padding: 1rem 3rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.3);
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
        }

        .custom-tech-input {
            margin-top: 1rem;
            display: none;
        }

        .show-custom {
            display: block !important;
        }

        .installment-details {
            margin-top: 1rem;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 8px;
            border-left: 4px solid var(--primary-color);
            display: none;
        }

        .installment-details.show {
            display: block;
        }

        .floating-label {
            position: relative;
        }

        .floating-label .form-control {
            padding-top: 1.5rem;
        }

        .floating-label .form-label {
            position: absolute;
            top: 1rem;
            left: 1.25rem;
            transition: all 0.3s ease;
            pointer-events: none;
            background: transparent;
            z-index: 5;
        }

        .floating-label .form-control:focus + .form-label,
        .floating-label .form-control:not(:placeholder-shown) + .form-label {
            top: 0.25rem;
            font-size: 0.75rem;
            color: var(--primary-color);
            background: white;
            padding: 0 0.25rem;
        }

        .digital-marketing-section {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            border: 1px solid #fbbf24;
        }

        .marketing-service {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .marketing-service:hover {
            border-color: var(--warning-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.2);
        }

        .price-tag {
            background: var(--primary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .form-body {
                padding: 2rem 1.5rem;
            }
            
            .tech-options {
                justify-content: center;
            }
            
            .form-header h2 {
                font-size: 2rem;
            }
        }

        .project-content-preview {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
            border-left: 4px solid var(--primary-color);
            display: none;
        }

        .project-content-preview.show {
            display: block;
        }

        .feature-preview {
            color: #4b5563;
            font-size: 0.9rem;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="form-container">
                    <div class="form-header">
                        <h2><i class="fas fa-file-invoice"></i> Global Tech Quotation Generator</h2>
                        <p>Create professional quotations in minutes with our advanced form system</p>
                    </div>
                    
                    <div class="form-body">
                        <form action="quotation.php" method="POST" id="quotationForm">
                            <!-- Client Information Section -->
                            <div class="mb-5">
                                <h4 class="section-title"><i class="fas fa-user-circle me-2"></i>Client Information</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="text" class="form-control" id="clientName" name="client_name" placeholder=" " required>
                                            <label class="form-label" for="clientName">Client Name *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="tel" class="form-control" id="clientPhone" name="client_phone" placeholder=" " required>
                                            <label class="form-label" for="clientPhone">Phone Number *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="email" class="form-control" id="clientEmail" name="client_email" placeholder=" ">
                                            <label class="form-label" for="clientEmail">Email Address (Optional)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="text" class="form-control" id="projectCode" name="project_code" placeholder=" ">
                                            <label class="form-label" for="projectCode">Project Code (Auto-generated if empty)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Project Details Section -->
                            <div class="mb-5">
                                <h4 class="section-title"><i class="fas fa-project-diagram me-2"></i>Project Details</h4>
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label" for="projectName">Project Name/Title *</label>
                                        <input type="text" class="form-control" id="projectName" name="project_name" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="timeline">Timeline *</label>
                                        <select class="form-select" id="timeline" name="timeline" required>
                                            <option value="">Select Timeline</option>
                                            <option value="1-2 weeks">1-2 weeks</option>
                                            <option value="2-3 weeks">2-3 weeks</option>
                                            <option value="3-4 weeks">3-4 weeks</option>
                                            <option value="4-5 weeks">4-5 weeks</option>
                                            <option value="6-8 weeks">6-8 weeks</option>
                                            <option value="8-10 weeks">8-10 weeks</option>
                                            <option value="1-2 months">1-2 months</option>
                                            <option value="2-3 months">2-3 months</option>
                                            <option value="3-4 months">3-4 months</option>
                                            <option value="4-6 months">4-6 months</option>
                                            <option value="6+ months">6+ months</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="projectType">Project Type *</label>
                                        <select class="form-select" id="projectType" name="project_type" required>
                                            <option value="">Select Project Type</option>
                                            <option value="ngo_website">NGO Website</option>
                                            <option value="ecommerce">E-commerce Website</option>
                                            <option value="multivendor_ecommerce">Multi-vendor E-commerce</option>
                                            <option value="informational_website">Informational Website</option>
                                            <option value="booking_portal">Booking Portal</option>
                                            <option value="_membership">HealthCare Membership Website</option>
                                            <option value="cab_tour_booking">Cab & Tour Booking System</option> <!-- ✅ New option -->
                                            <option value="used_car_platform">Used Car Selling Platform</option>
                                            <option value="crm_system">CRM System</option>
                                            <option value="erp_system">ERP System</option>
                                            <option value="flutter_app">Flutter Mobile App</option>
                                            <option value="native_app">Native Mobile App</option>
                                            <option value="web_application">Custom Web Application</option>
                                            <option value="digital_marketing">Digital Marketing Services</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="projectCost">Project Cost (₹) *</label>
                                        <input type="number" class="form-control" id="projectCost" name="project_cost" min="1000" step="500" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="projectCost">Project Discount (%) *</label>
                                        <input type="number" class="form-control" id="offerpercent" name="offerpercent" required>
                                    </div>
                                </div>

                                <!-- Project Content Preview -->
                                <div id="projectContentPreview" class="project-content-preview">
                                    <h6 class="text-primary mb-2">Project Overview Preview:</h6>
                                    <div id="featurePreview" class="feature-preview"></div>
                                </div>
                            </div>

                            <!-- Technology Stack Section -->
                            <div class="tech-stack-section">
                                <h4 class="section-title"><i class="fas fa-code me-2"></i>Technology Stack</h4>
                                <p class="text-muted mb-3">Select the technologies to be used in this project:</p>
                            
                                <div class="tech-options">
                            
                                    <!-- Frontend Technologies -->
                                    <h5 class="text-primary-emphasis border-left border-primary fw-bold mb-2">Frontend</h5><br>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="html5" name="technologies[]" value="HTML5">
                                        <label class="tech-label" for="html5"><i class="fab fa-html5 me-1"></i> HTML5</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="css3" name="technologies[]" value="CSS3">
                                        <label class="tech-label" for="css3"><i class="fab fa-css3-alt me-1"></i> CSS3</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="bootstrap" name="technologies[]" value="Bootstrap 5">
                                        <label class="tech-label" for="bootstrap"><i class="fab fa-bootstrap me-1"></i> Bootstrap 5</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="tailwind" name="technologies[]" value="Tailwind CSS">
                                        <label class="tech-label" for="tailwind">🎨 Tailwind CSS</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="javascript" name="technologies[]" value="JavaScript">
                                        <label class="tech-label" for="javascript"><i class="fab fa-js me-1"></i> JavaScript</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="react" name="technologies[]" value="React.js">
                                        <label class="tech-label" for="react"><i class="fab fa-react me-1"></i> React.js</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="reactnative" name="technologies[]" value="React Native">
                                        <label class="tech-label" for="reactnative"><i class="fab fa-react me-1"></i> React Native</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="dart" name="technologies[]" value="Dart">
                                        <label class="tech-label" for="dart"><i class="fas fa-code me-1"></i> Dart (Flutter Language)</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="flutter-firebase" name="technologies[]" value="Firebase for Flutter">
                                        <label class="tech-label" for="flutter-firebase"><i class="fas fa-fire me-1"></i> Firebase for Flutter</label>
                                    </div>
                                    <h5 class="text-primary-emphasis border-left border-primary fw-bold mb-2">WordPress FrontEnd</h5><br>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="elementor" name="technologies[]" value="Elementor">
                                        <label class="tech-label" for="elementor"><i class="fas fa-paint-brush me-1"></i> Elementor</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="wp-wpbakery" name="technologies[]" value="WPBakery">
                                        <label class="tech-label" for="wp-wpbakery"><i class="fas fa-paint-roller me-1"></i> WPBakery</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="wp-divi" name="technologies[]" value="Divi Builder">
                                        <label class="tech-label" for="wp-divi"><i class="fas fa-vector-square me-1"></i> Divi Builder</label>
                                    </div>
                            
                                    <!-- Backend Technologies -->
                                    <h5 class="mt-3 text-primary-emphasis border-left border-primary fw-bold mb-2">Backend</h5>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="nodejs" name="technologies[]" value="Node.js">
                                        <label class="tech-label" for="nodejs"><i class="fab fa-node-js me-1"></i> Node.js</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="php" name="technologies[]" value="PHP">
                                        <label class="tech-label" for="php"><i class="fab fa-php me-1"></i> PHP</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="mysql" name="technologies[]" value="MySQL">
                                        <label class="tech-label" for="mysql"><i class="fas fa-database me-1"></i> MySQL</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="mongodb" name="technologies[]" value="MongoDB">
                                        <label class="tech-label" for="mongodb"><i class="fas fa-leaf me-1"></i> MongoDB</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="flutter" name="technologies[]" value="Flutter">
                                        <label class="tech-label" for="flutter">📱 Flutter</label>
                                    </div>
                                    <h5 class="text-primary-emphasis border-left border-primary fw-bold mb-2">WordPress Backend</h5><br>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="wp-woocommerce" name="technologies[]" value="WooCommerce">
                                        <label class="tech-label" for="wp-woocommerce"><i class="fab fa-wordpress me-1"></i> WooCommerce</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="wp-rest-api" name="technologies[]" value="WordPress REST API">
                                        <label class="tech-label" for="wp-rest-api"><i class="fas fa-code me-1"></i> WordPress REST API</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="wp-acf" name="technologies[]" value="ACF (Advanced Custom Fields)">
                                        <label class="tech-label" for="wp-acf"><i class="fas fa-cogs me-1"></i> ACF (Advanced Custom Fields)</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="flutter-sqlite" name="technologies[]" value="SQLite (Flutter)">
                                        <label class="tech-label" for="flutter-sqlite"><i class="fas fa-database me-1"></i> SQLite (Flutter Local DB)</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="flutter-api-backend" name="technologies[]" value="Node.js / Laravel Backend">
                                        <label class="tech-label" for="flutter-api-backend"><i class="fas fa-server me-1"></i> Node.js / Laravel API Backend</label>
                                    </div>
                            
                                    <!-- Other Tools -->
                                    <h5 class="mt-3 text-primary-emphasis border-left border-primary fw-bold mb-2">Other Tools & Plugins</h5>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="seo" name="technologies[]" value="SEO Optimization">
                                        <label class="tech-label" for="seo"><i class="fas fa-search me-1"></i> SEO Optimization</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="firebase" name="technologies[]" value="Firebase">
                                        <label class="tech-label" for="firebase"><i class="fas fa-bolt me-1"></i> Firebase</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="payment-gateway" name="technologies[]" value="Payment Gateway Integration">
                                        <label class="tech-label" for="payment-gateway"><i class="fas fa-credit-card me-1"></i> Payment Gateway Integration</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="google-maps" name="technologies[]" value="Google Maps API">
                                        <label class="tech-label" for="google-maps"><i class="fas fa-map-marker-alt me-1"></i> Google Maps API</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="jwt" name="technologies[]" value="JWT">
                                        <label class="tech-label" for="jwt"><i class="fas fa-user-lock me-1"></i> JWT</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="restful-api" name="technologies[]" value="RESTful API">
                                        <label class="tech-label" for="restful-api"><i class="fas fa-project-diagram me-1"></i> RESTful API</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="flutter-push-notif" name="technologies[]" value="Push Notifications (FCM)">
                                        <label class="tech-label" for="flutter-push-notif"><i class="fas fa-bell me-1"></i> Push Notifications (FCM)</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="flutter-restapi" name="technologies[]" value="REST API (Flutter)">
                                        <label class="tech-label" for="flutter-restapi"><i class="fas fa-project-diagram me-1"></i> REST API Integration</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="flutter-graphql" name="technologies[]" value="GraphQL (Flutter)">
                                        <label class="tech-label" for="flutter-graphql"><i class="fas fa-code-branch me-1"></i> GraphQL (Flutter)</label>
                                    </div>
                                    <h5 class="text-primary-emphasis border-left border-primary fw-bold mb-2">WordPress Plugins</h5><br>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="yoast-seo" name="technologies[]" value="Yoast SEO">
                                        <label class="tech-label" for="yoast-seo"><i class="fas fa-search me-1"></i> Yoast SEO</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="contact-form-7" name="technologies[]" value="Contact Form 7">
                                        <label class="tech-label" for="contact-form-7"><i class="far fa-envelope me-1"></i> Contact Form 7</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="wpml" name="technologies[]" value="WPML">
                                        <label class="tech-label" for="wpml"><i class="fas fa-globe me-1"></i> WPML (Multilingual)</label>
                                    </div>
                                    <div class="tech-checkbox">
                                        <input type="checkbox" id="wordfence" name="technologies[]" value="Wordfence Security">
                                        <label class="tech-label" for="wordfence"><i class="fas fa-shield-alt me-1"></i> Wordfence Security</label>
                                    </div>
                                    
                            
                                    <!-- Other / Custom -->
                                    <div class="tech-checkbox mt-3">
                                        <input type="checkbox" id="customTech" name="technologies[]" value="custom">
                                        <label class="tech-label" for="customTech"><i class="fas fa-plus me-1"></i> Other</label>
                                    </div>
                                </div>
                            
                                <div class="custom-tech-input mt-3" id="customTechInput" style="display:none;">
                                    <label class="form-label" for="customTechnologies">Custom Technologies (comma-separated)</label>
                                    <input type="text" class="form-control" id="customTechnologies" name="custom_technologies" placeholder="e.g., Laravel, Vue.js, PostgreSQL">
                                </div>
                            </div>


                            <!-- Digital Marketing Section -->
                            <div class="digital-marketing-section">
                                <h4 class="section-title"><i class="fas fa-bullhorn me-2"></i>Digital Marketing Services (Optional)</h4>
                                <p class="text-muted mb-3">Select additional digital marketing services for your project:</p>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="marketing-service">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="graphicDesign" name="marketing_services[]" value="graphic_design">
                                                <label class="form-check-label" for="graphicDesign">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong><i class="fas fa-palette me-2"></i>Graphic Design</strong>
                                                            <small class="d-block text-muted">30 posts/month</small>
                                                        </div>
                                                        <div class="input-group" style="max-width: 150px;">
                                                            <span class="input-group-text">₹</span>
                                                            <input type="number" class="form-control" name="marketing_prices[graphic_design]" value="5000" min="0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="marketing-service">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="socialMedia" name="marketing_services[]" value="social_media">
                                                <label class="form-check-label" for="socialMedia">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong><i class="fas fa-hashtag me-2"></i>Social Media Management</strong>
                                                            <small class="d-block text-muted">Account setup & management</small>
                                                        </div>
                                                        <div class="input-group" style="max-width: 150px;">
                                                            <span class="input-group-text">₹</span>
                                                            <input type="number" class="form-control" name="marketing_prices[social_media]" value="5000" min="0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="marketing-service">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="seoService" name="marketing_services[]" value="seo">
                                                <label class="form-check-label" for="seoService">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong><i class="fas fa-search me-2"></i>SEO Implementation</strong>
                                                            <small class="d-block text-muted">On-page SEO setup</small>
                                                        </div>
                                                         <div class="input-group" style="max-width: 150px;">
                                                            <span class="input-group-text">₹</span>
                                                            <input type="number" class="form-control" name="marketing_prices[seo]" value="5000" min="0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="marketing-service">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="adsManagement" name="marketing_services[]" value="ads_management">
                                                <label class="form-check-label" for="adsManagement">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong><i class="fas fa-ad me-2"></i>Ads Management</strong>
                                                            <small class="d-block text-muted">Google & Meta Ads</small>
                                                        </div>
                                                         <div class="input-group" style="max-width: 150px;">
                                                            <span class="input-group-text">₹</span>
                                                            <input type="number" class="form-control" name="marketing_prices[ads_management]" value="10000" min="0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Structure Section -->
                            <div class="payment-options">
                                <h4 class="section-title"><i class="fas fa-credit-card me-2"></i>Payment Structure</h4>
                                <p class="text-muted mb-3">Choose your preferred payment method:</p>
                                
                                <div class="payment-option" onclick="selectPayment('milestone')">
                                    <input type="radio" id="milestone" name="payment_method" value="milestone" required>
                                    <label for="milestone">
                                        <strong><i class="fas fa-flag-checkered me-2"></i>Milestone-based Payment</strong>
                                        <div class="mt-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select class="form-select form-select-sm" name="milestone_1_percent">
                                                        <option value="20">20%</option>
                                                        <option value="30">30%</option>
                                                        <option value="40">40%</option>
                                                        <option value="50">50%</option>
                                                        <option value="60">60%</option>
                                                    </select>
                                                    <small class="text-muted">At Initiation</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select form-select-sm" name="milestone_2_percent">
                                                        <option value="20">20%</option>
                                                        <option value="30">30%</option>
                                                        <option value="40">40%</option>
                                                        <option value="50">50%</option>
                                                        <option value="60">60%</option>
                                                    </select>
                                                    <small class="text-muted">UI Completion</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select form-select-sm" name="milestone_3_percent">
                                                        <option value="20">20%</option>
                                                        <option value="30">30%</option>
                                                        <option value="40">40%</option>
                                                        <option value="50">50%</option>
                                                        <option value="60">60%</option>
                                                    </select>
                                                    <small class="text-muted">Final Deployment</small>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="payment-option" onclick="selectPayment('installment')">
                                    <input type="radio" id="installment" name="payment_method" value="installment">
                                    <label for="installment">
                                        <strong><i class="fas fa-calendar-alt me-2"></i>Installment Payment</strong>
                                        <div class="mt-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-select form-select-sm" name="advance_percent">
                                                        <option value="20">20%</option>
                                                        <option value="30">30%</option>
                                                        <option value="40">40%</option>
                                                        <option value="50">50%</option>
                                                        <option value="60">60%</option>
                                                    </select>
                                                    <small class="text-muted">Advance Payment</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-select form-select-sm" name="installment_duration">
                                                        <option value="3">3 months</option>
                                                        <option value="6">6 months</option>
                                                        <option value="12">12 months</option>
                                                    </select>
                                                    <small class="text-muted">Remaining Duration</small>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-file-contract me-2"></i>Generate Quotation
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Project content data
        const projectContent = {
            'ngo_website': {
                title: 'NGO Website',
                description: 'A comprehensive website solution for non-profit organizations with donation management, volunteer registration, and event coordination features.',
                features: [
                    'Responsive homepage with mission statement',
                    'About us and team member profiles',
                    'Donation system with payment gateway',
                    'Volunteer registration and management',
                    'Event calendar and registration',
                    'News and blog section',
                    'Contact forms and location maps',
                    'Gallery for photos and videos',
                    'Newsletter subscription system',
                    'Social media integration'
                ]
            },
            '_membership': {
                title: ' Healthcare Membership Website',
                description: 'A specialized healthcare membership platform designed to offer users easy access to healthcare services, wellness programs, and medical consultations with integrated membership management and appointment scheduling.',
                features: [
                    'User registration and membership management',
                    'Subscription plans and renewals',
                    'Online appointment booking with doctors and wellness experts',
                    'Telemedicine and video consultation support',
                    'Health records management and personal health dashboard',
                    'Payment gateway integration for membership fees and services',
                    'Notifications and reminders via email and SMS',
                    'Blog and health tips section',
                    'Admin panel for managing members, subscriptions, and services',
                    'Analytics and reporting on member engagement and service usage'
                ]
            },

            'ecommerce': {
                title: 'E-commerce Website',
                description: 'Complete online store with product catalog, shopping cart, secure checkout, and comprehensive admin panel for inventory and order management.',
                features: [
                    'Modern responsive product catalog',
                    'Advanced search and filtering',
                    'Shopping cart and wishlist',
                    'Secure checkout with multiple payment options',
                    'User registration and profile management',
                    'Order tracking and history',
                    'Product reviews and ratings',
                    'Coupon and discount system',
                    'Shipping integration and tracking',
                    'Admin panel for complete store management'
                ]
            },
            'multivendor_ecommerce': {
                title: 'Multi-vendor E-commerce Platform',
                description: 'Advanced marketplace platform allowing multiple vendors to sell products with comprehensive vendor management, commission system, and separate vendor dashboards.',
                features: [
                    'Multi-vendor marketplace structure',
                    'Vendor registration and approval system',
                    'Individual vendor storefronts',
                    'Commission and payout management',
                    'Vendor dashboard for product and order management',
                    'Customer reviews for vendors and products',
                    'Advanced search across all vendors',
                    'Dispute resolution system',
                    'Multi-vendor shipping coordination',
                    'Comprehensive admin control panel'
                ]
            },
            'informational_website': {
                title: 'Informational Website',
                description: 'Professional business website designed to showcase your company, services, and expertise with modern design and optimal user experience.',
                features: [
                    'Professional homepage design',
                    'About us and company history',
                    'Services and portfolio showcase',
                    'Team member profiles',
                    'Client testimonials and case studies',
                    'Blog and news section',
                    'Contact forms and business information',
                    'SEO optimized content structure',
                    'Social media integration',
                    'Mobile-responsive design'
                ]
            },
            'booking_portal': {
                title: 'Booking Portal',
                description: 'Comprehensive booking system for appointments, services, or events with calendar integration, payment processing, and automated notifications.',
                features: [
                    'Real-time availability calendar',
                    'Online booking and scheduling',
                    'Service/resource management',
                    'Customer registration and profiles',
                    'Automated confirmation emails/SMS',
                    'Payment integration for deposits',
                    'Booking modification and cancellation',
                    'Staff scheduling and management',
                    'Reporting and analytics dashboard',
                    'Mobile-friendly booking interface'
                ]
            },
            'digital_marketing': {
                title: 'Digital Marketing Services',
                description: 'The project offers results-driven digital marketing services tailored to help businesses grow their online presence and drive more conversions. From setting up and managing targeted Google Ads and Meta (Facebook/Instagram) Ad campaigns to optimizing content, SEO, and performance tracking, the services cover all essential aspects of modern online marketing. Designed for businesses aiming to improve visibility, reach their ideal audience, and achieve measurable ROI.',
                features: [
                    'Google Ads campaign setup and optimization',
                    'Meta Ads (Facebook & Instagram) campaign management',
                    'Keyword research and targeting strategy',
                    'Ad copywriting and creative design',
                    'Audience targeting and retargeting',
                    'Conversion tracking setup (Google Analytics, Meta Pixel)',
                    'Performance monitoring and A/B testing',
                    'Weekly and monthly performance reports',
                    'Landing page analysis and suggestions',
                    'Budget planning and bid strategy'
                ]
            },
            'cab_tour_booking': { // ✅ New entry
                title: 'Cab & Tour Booking System',
                description: 'Dynamic platform for booking Sedans, SUVs, Innova, Tempo Travellers, Armania, and more. Includes tour package listings, location-based fare calculation, booking management, and multilingual support.',
                features: [
                    'Cab types: Sedan, SUV, Innova, Tempo Traveller, Armania',
                    'Supports local, outstation, one-way & round trips',
                    'Tour package listing and booking',
                    'Pickup/drop location with map integration',
                    'Real-time cab availability and fare calculation',
                    'User login, booking history & management',
                    'Driver/vendor assignment and tracking',
                    'Secure payment with wallet/deposit options',
                    'Multilingual and responsive interface',
                    'Automated SMS/email updates'
                ]
            },
            'crm_system': {
                title: 'CRM System',
                description: 'Customer Relationship Management system to track leads, manage customer interactions, sales pipeline, and improve business relationships.',
                features: [
                    'Lead capture and management',
                    'Customer database and profiles',
                    'Sales pipeline tracking',
                    'Task and follow-up management',
                    'Email integration and templates',
                    'Contact history and interaction logs',
                    'Sales reporting and analytics',
                    'Team collaboration tools',
                    'Custom fields and data organization',
                    'Mobile access and notifications'
                ]
            },
            'erp_system': {
                title: 'ERP System',
                description: 'Enterprise Resource Planning system integrating various business processes including inventory, accounting, HR, and operations management.',
                features: [
                    'Inventory and stock management',
                    'Financial accounting and reporting',
                    'Human resources management',
                    'Purchase and supplier management',
                    'Sales and customer management',
                    'Production planning and control',
                    'Multi-location support',
                    'Role-based access control',
                    'Comprehensive reporting dashboard',
                    'Data import/export capabilities'
                ]
            },
            'flutter_app': {
                title: 'Flutter Mobile App',
                description: 'Cross-platform mobile application built with Flutter, providing native performance on both iOS and Android with a single codebase.',
                features: [
                    'Cross-platform compatibility (iOS & Android)',
                    'Native performance and smooth animations',
                    'User authentication and profiles',
                    'Push notifications integration',
                    'Offline functionality and data sync',
                    'In-app purchases (if required)',
                    'Social media integration',
                    'Analytics and crash reporting',
                    'App store optimization',
                    'Backend API integration'
                ]
            },
            'native_app': {
                title: 'Native Mobile App',
                description: 'Platform-specific mobile application developed natively for optimal performance, utilizing platform-specific features and design guidelines.',
                features: [
                    'Platform-optimized performance',
                    'Native UI/UX design patterns',
                    'Advanced device feature integration',
                    'Enhanced security implementations',
                    'Platform-specific animations',
                    'Deep system integration',
                    'Optimized battery and memory usage',
                    'App store guidelines compliance',
                    'Native push notifications',
                    'Platform-specific testing'
                ]
            },
            'web_application': {
                title: 'Custom Web Application',
                description: 'Tailored web application solution designed to meet specific business requirements with custom functionality and user workflows.',
                features: [
                    'Custom business logic implementation',
                    'User role and permission management',
                    'Interactive dashboard and reporting',
                    'Data visualization and analytics',
                    'API integration and development',
                    'Automated workflow processes',
                    'Document management system',
                    'Real-time notifications',
                    'Scalable architecture design',
                    'Third-party service integration'
                ]
            }
            'used_car_platform': {
                title: 'Used Car Selling Platform',
                description: 'A complete online solution for buying and selling used cars, featuring car listings, seller and buyer management, inspection scheduling, and secure payment systems.',
                features: [
                    'User registration for buyers and sellers',
                    'Advanced car listing with photos, videos, and specifications',
                    'Search and filter by brand, price, model, year, etc.',
                    'Car comparison tool',
                    'Car valuation calculator',
                    'Test drive and inspection scheduling',
                    'Admin panel to manage listings, users, and transactions',
                    'Secure payment and escrow integration',
                    'Ownership transfer assistance workflow',
                    'SMS/email notifications and alerts',
                    'Mobile-friendly and responsive design'
                ]
            }
        };

        // Update project content preview when project type changes
        document.getElementById('projectType').addEventListener('change', function() {
            const selectedType = this.value;
            const preview = document.getElementById('projectContentPreview');
            const featurePreview = document.getElementById('featurePreview');
            
            if (selectedType && projectContent[selectedType]) {
                const content = projectContent[selectedType];
                featurePreview.innerHTML = `
                    <h6 class="text-primary mb-2">${content.title}</h6>
                    <p class="mb-3">${content.description}</p>
                    <h6 class="text-secondary mb-2">Key Features:</h6>
                    <ul class="mb-0">
                        ${content.features.map(feature => `<li>${feature}</li>`).join('')}
                    </ul>
                `;
                preview.classList.add('show');
            } else {
                preview.classList.remove('show');
            }
        });

        // Custom technology input toggle
        document.getElementById('customTech').addEventListener('change', function() {
            const customInput = document.getElementById('customTechInput');
            if (this.checked) {
                customInput.classList.add('show-custom');
            } else {
                customInput.classList.remove('show-custom');
                document.getElementById('customTechnologies').value = '';
            }
        });

        // Payment method selection
        function selectPayment(method) {
            // Remove selected class from all payment options
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Add selected class to clicked option
            event.currentTarget.classList.add('selected');
            
            // Check the radio button
            document.getElementById(method).checked = true;
            
            // Show/hide installment details
            const installmentDetails = document.querySelectorAll('.installment-details');
            installmentDetails.forEach(detail => {
                detail.classList.remove('show');
            });
            
            if (method === 'installment') {
                const installmentDetail = document.querySelector('.installment-details');
                if (installmentDetail) {
                    installmentDetail.classList.add('show');
                }
            }
        }

        // Form validation and submission
        document.getElementById('quotationForm').addEventListener('submit', function(e) {
            // Basic validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            // Check if at least one technology is selected
            const technologies = this.querySelectorAll('input[name="technologies[]"]:checked');
            if (technologies.length === 0) {
                alert('Please select at least one technology for the project.');
                e.preventDefault();
                return false;
            }
            
            // Check payment method selection
            const paymentMethod = this.querySelector('input[name="payment_method"]:checked');
            if (!paymentMethod) {
                alert('Please select a payment method.');
                e.preventDefault();
                return false;
            }
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
                return false;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Generating Quotation...';
            submitBtn.disabled = true;
            
            // Re-enable button after 3 seconds (in case of slow response)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });

        // Auto-generate project code if empty
        document.getElementById('clientName').addEventListener('blur', function() {
            const projectCodeField = document.getElementById('projectCode');
            if (!projectCodeField.value.trim() && this.value.trim()) {
                const initials = this.value.trim().split(' ')
                    .map(word => word.charAt(0).toUpperCase())
                    .join('');
                const date = new Date();
                const dateStr = date.getDate().toString().padStart(2, '0') + 
                              (date.getMonth() + 1).toString().padStart(2, '0');
                projectCodeField.value = `${initials}-${dateStr}`;
            }
        });

        // Floating label animation fix
        document.querySelectorAll('.floating-label .form-control').forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value) {
                    this.classList.add('has-value');
                } else {
                    this.classList.remove('has-value');
                }
            });
        });

        // Add smooth scroll to sections
        window.addEventListener('load', function() {
            // Add animation classes
            const sections = document.querySelectorAll('.tech-stack-section, .payment-options, .digital-marketing-section');
            sections.forEach((section, index) => {
                setTimeout(() => {
                    section.style.opacity = '1';
                    section.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });

        // Initialize sections with animation
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.tech-stack-section, .payment-options, .digital-marketing-section');
            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'all 0.5s ease';
            });
        });
    </script>
</body>
</html>