<?php
$current_page = 'appdevelopment';
include 'components/header.php';
?>

    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #f59e0b;
            --accent-color: #06b6d4;
            --dark-color: #0f172a;
            --light-color: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-app: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            --gradient-development: linear-gradient(135deg, #667eea 0%, #4338ca 100%);
        }
        
        .section-spacing {
            padding: 1.5rem 0;
        }
        
        .hero-app {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }
        
        .hero-app::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="%23ffffff05" cx="200" cy="200" r="100"/><circle fill="%23ffffff03" cx="800" cy="400" r="150"/><circle fill="%23ffffff05" cx="400" cy="700" r="80"/></svg>');
            pointer-events: none;
        }
        
        .app-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-app);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }
        
        .service-card-app {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .service-card-app:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }
        
        .tech-card {
            background: linear-gradient(135deg, #ff6b6b20 0%, #4338ca20 100%);
            border: 1px solid #ff6b6b30;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .tech-card:hover {
            background: linear-gradient(135deg, #ff6b6b30 0%, #4338ca30 100%);
            transform: translateX(4px);
        }
        
        .feature-highlight {
            background: linear-gradient(135deg, #667eea20 0%, #764ba220 100%);
            border: 1px solid #667eea30;
            border-radius: 8px;
            padding: 0.8rem;
            margin-bottom: 0.6rem;
        }
        
        .stats-counter {
            background: var(--gradient-primary);
            color: white;
            border-radius: 12px;
            padding: 1.2rem;
            text-align: center;
            height: 100%;
        }
        
        .process-step {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border: 1px solid #e2e8f0;
            position: relative;
            height: 100%;
        }
        
        .step-number {
            width: 30px;
            height: 30px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 12px;
            margin: 0 auto 0.8rem;
        }
        
        .pricing-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .pricing-card.featured {
            border-color: var(--primary-color);
            transform: scale(1.02);
        }
        
        .pricing-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.15);
        }
        
        .feature-list li {
            font-size: 12px;
            padding: 0.2rem 0;
            color: #64748b;
        }
        
        .feature-list li i {
            color: var(--primary-color);
            margin-right: 0.4rem;
            font-size: 10px;
        }
        
        .bg-app-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-app {
            background: var(--gradient-app);
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-app:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
            color: white;
        }
        
        .btn-outline-app {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-app:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }
        
        .platform-card {
            transition: all 0.3s ease;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
        }
        
        .platform-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .platform-icon {
            width: 40px;
            height: 40px;
            background: var(--gradient-app);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            margin: 0 auto 0.5rem;
        }
        
        @media (max-width: 768px) {
            .section-spacing {
                padding: 1rem 0;
            }
            
            .hero-app {
                padding: 1.5rem 0;
            }
            
            .app-icon {
                margin-top: 25px;
            }
            
            .service-card-app {
                padding: 1rem;
                margin-bottom: 1rem;
            }
        }
        /* Additional Pricing Section Styles */

/* Button styles for pricing cards */
.btn-web {
    background: var(--gradient-primary);
    border: none;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.btn-web:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
    color: white;
}

.btn-outline-web {
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    background: transparent;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.btn-outline-web:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.3);
}

/* Enhanced pricing card styling */
.pricing-card {
    background: white;
    border-radius: 15px;
    padding: 2rem 1.5rem;
    border: 2px solid #e2e8f0;
    transition: all 0.3s ease;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.pricing-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.pricing-card:hover::before {
    transform: scaleX(1);
}

.pricing-card.featured {
    border-color: var(--primary-color);
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(99, 102, 241, 0.15);
}

.pricing-card.featured::before {
    transform: scaleX(1);
}

.pricing-card:hover {
    border-color: var(--primary-color);
    box-shadow: 0 15px 40px rgba(99, 102, 241, 0.2);
    transform: translateY(-5px);
}

.pricing-card.featured:hover {
    transform: scale(1.05) translateY(-5px);
}

/* Pricing badge styling */
.pricing-card .badge {
    position: absolute;
    top: -1px;
    right: 20px;
    background: var(--gradient-primary) !important;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0 0 10px 10px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

/* Price styling */
.pricing-card .h3 {
    color: var(--primary-color);
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.pricing-card .h3 .small {
    font-size: 1rem;
    color: #64748b;
    font-weight: 400;
}

/* Feature list enhancements */
.pricing-card .feature-list {
    margin-bottom: 2rem;
}

.pricing-card .feature-list li {
    font-size: 13px;
    padding: 0.5rem 0;
    color: #475569;
    border-bottom: 1px solid #f1f5f9;
}

.pricing-card .feature-list li:last-child {
    border-bottom: none;
}

.pricing-card .feature-list li i {
    color: var(--primary-color);
    margin-right: 0.5rem;
    font-size: 12px;
    font-weight: 600;
}

/* Industry cards styling */
.industry-card {
    background: white;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
    cursor: pointer;
    height: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.industry-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: var(--primary-color);
}

.industry-card i {
    transition: all 0.3s ease;
}

.industry-card:hover i {
    transform: scale(1.1);
    color: var(--primary-color) !important;
}

/* Responsive pricing adjustments */
@media (max-width: 768px) {
    .pricing-card {
        padding: 1.5rem 1rem;
        margin-bottom: 1.5rem;
    }
    
    .pricing-card.featured {
        transform: none;
        margin-bottom: 1.5rem;
    }
    
    .pricing-card.featured:hover {
        transform: translateY(-3px);
    }
    
    .pricing-card .h3 {
        font-size: 2rem;
    }
    
    .industry-card {
        height: 80px;
    }
}
/* Enhanced pricing card button styling - Remove anchor styles */
.pricing-card .btn-web a,
.pricing-card .btn-outline-web a {
    text-decoration: none !important;
    color: inherit !important;
    display: block;
    width: 100%;
    height: 100%;
}

.pricing-card .btn-web a:hover,
.pricing-card .btn-outline-web a:hover {
    text-decoration: none !important;
    color: inherit !important;
}

/* Better approach - Use anchors styled as buttons */
.pricing-card .btn-web,
.pricing-card .btn-outline-web {
    text-decoration: none !important;
    display: inline-block;
    width: 100%;
    text-align: center;
    cursor: pointer;
}

.pricing-card .btn-web:hover,
.pricing-card .btn-outline-web:hover {
    text-decoration: none !important;
}

/* Recommended HTML structure change:
   Instead of: <button class="btn btn-web w-100"><a href="./contact.php">Get Started</a></button>
   Use: <a href="./contact.php" class="btn btn-web w-100">Get Started</a>
*/

/* Remove all anchor styling from pricing section */
.pricing-card a {
    text-decoration: none !important;
    color: inherit !important;
}

.pricing-card a:hover,
.pricing-card a:focus,
.pricing-card a:active,
.pricing-card a:visited {
    text-decoration: none !important;
    color: inherit !important;
    outline: none !important;
}
    </style>

    <!-- Hero Section -->
    <section class="hero-app">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-white">
                        <h1 class="display-6 fw-bold mb-2">App Development Services</h1>
                        <p class="lead mb-3 fs-6">Create powerful mobile and desktop applications with native performance and seamless user experiences. From iOS to Android and cross-platform solutions.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="./contact.php"><button class="btn btn-app">Start Your App Project</button></a>
                            <a href="./freeguide.php"><button class="btn btn-outline-light btn-sm">Free App Consultation</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="app-icon mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="ri-smartphone-line"></i>
                    </div>
                    <h4 class="text-white mb-2">Native & Cross-Platform</h4>
                    <p class="text-white-50 small">High-performance apps for iOS, Android & Desktop</p>
                </div>
            </div>
        </div>
    </section>

    <!-- App Development Services -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our App Development Services</h2>
                    <p class="text-muted small">Complete mobile and desktop application solutions</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-app">
                        <div class="app-icon">
                            <i class="ri-apple-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">iOS App Development</h5>
                        <p class="small text-muted mb-2">Native iOS applications built with Swift and Objective-C for optimal performance and user experience.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Swift & Objective-C Development</li>
                            <li><i class="ri-check-line"></i>iOS UI/UX Design Guidelines</li>
                            <li><i class="ri-check-line"></i>App Store Optimization</li>
                            <li><i class="ri-check-line"></i>iPhone & iPad Compatibility</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-app">
                        <div class="app-icon">
                            <i class="ri-android-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Android App Development</h5>
                        <p class="small text-muted mb-2">High-performance Android applications using Kotlin and Java with Material Design principles.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Kotlin & Java Development</li>
                            <li><i class="ri-check-line"></i>Material Design Implementation</li>
                            <li><i class="ri-check-line"></i>Google Play Store Publishing</li>
                            <li><i class="ri-check-line"></i>Multi-Device Support</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-app">
                        <div class="app-icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Cross-Platform Apps</h5>
                        <p class="small text-muted mb-2">Single codebase applications using React Native and Flutter for multiple platforms.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>React Native Development</li>
                            <li><i class="ri-check-line"></i>Flutter Framework</li>
                            <li><i class="ri-check-line"></i>Code Reusability</li>
                            <li><i class="ri-check-line"></i>Faster Development Cycle</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-app">
                        <div class="app-icon">
                            <i class="ri-computer-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Desktop Applications</h5>
                        <p class="small text-muted mb-2">Cross-platform desktop applications for Windows, macOS, and Linux using modern frameworks.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Electron Applications</li>
                            <li><i class="ri-check-line"></i>Native Desktop Solutions</li>
                            <li><i class="ri-check-line"></i>Multi-Platform Support</li>
                            <li><i class="ri-check-line"></i>System Integration</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-app">
                        <div class="app-icon">
                            <i class="ri-cloud-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Progressive Web Apps</h5>
                        <p class="small text-muted mb-2">Web applications that work like native apps with offline functionality and push notifications.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Native App Experience</li>
                            <li><i class="ri-check-line"></i>Offline Functionality</li>
                            <li><i class="ri-check-line"></i>Push Notifications</li>
                            <li><i class="ri-check-line"></i>Cross-Platform Access</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-app">
                        <div class="app-icon">
                            <i class="ri-settings-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">App Maintenance & Support</h5>
                        <p class="small text-muted mb-2">Ongoing maintenance, updates, and technical support to keep your app running smoothly.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Regular Updates & Patches</li>
                            <li><i class="ri-check-line"></i>Performance Monitoring</li>
                            <li><i class="ri-check-line"></i>Bug Fixes & Improvements</li>
                            <li><i class="ri-check-line"></i>24/7 Technical Support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies We Use -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Technologies We Master</h3>
                    <p class="text-muted small mb-3">Cutting-edge frameworks and tools for modern app development</p>
                    
                    <div class="tech-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-smartphone-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Mobile Frameworks</h6>
                                <p class="small text-muted mb-0">React Native, Flutter, Ionic, Xamarin for cross-platform solutions.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tech-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-code-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Native Development</h6>
                                <p class="small text-muted mb-0">Swift, Objective-C for iOS; Kotlin, Java for Android development.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tech-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-server-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Backend Services</h6>
                                <p class="small text-muted mb-0">Firebase, AWS Amplify, Node.js APIs for robust backend solutions.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tech-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-database-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Database Solutions</h6>
                                <p class="small text-muted mb-0">SQLite, Realm, Firebase Firestore for efficient data management.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Why Choose Our App Development</h3>
                    <p class="text-muted small mb-3">Professional mobile app development with proven expertise</p>
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-speed-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">High Performance</h6>
                                <p class="small text-muted mb-0">Optimized apps with smooth performance and fast loading times.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-user-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">User-Centric Design</h6>
                                <p class="small text-muted mb-0">Intuitive interfaces designed for excellent user experience.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-shield-check-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Secure Architecture</h6>
                                <p class="small text-muted mb-0">Enterprise-grade security with data encryption and protection.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-speed-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Scalable Solutions</h6>
                                <p class="small text-muted mb-0">Apps built to handle growing user base and feature expansion.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-store-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">App Store Ready</h6>
                                <p class="small text-muted mb-0">Complete submission and approval process management.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-tools-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Ongoing Maintenance</h6>
                                <p class="small text-muted mb-0">Regular updates, bug fixes, and feature enhancements.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Development Stats -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">150+</h3>
                        <p class="small mb-0">Apps Developed</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">4.8★</h3>
                        <p class="small mb-0">Average App Rating</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">1M+</h3>
                        <p class="small mb-0">Total Downloads</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">95%</h3>
                        <p class="small mb-0">Client Retention</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- App Development Process -->
    <section class="section-spacing">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our App Development Process</h2>
                    <p class="text-muted small">Systematic approach to building successful mobile applications</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-2">Strategy & Planning</h6>
                        <p class="small text-muted">Market research, user personas, and technical feasibility analysis for your app idea.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-2">UI/UX Design</h6>
                        <p class="small text-muted">Wireframing, prototyping, and visual design creating intuitive user experiences.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-2">Development</h6>
                        <p class="small text-muted">Agile development with regular updates and testing throughout the build process.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-2">Launch & Support</h6>
                        <p class="small text-muted">App store submission, marketing support, and ongoing maintenance services.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Supported Platforms -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-2">Platforms We Support</h2>
                    <p class="text-muted small">Multi-platform app development for maximum reach</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="platform-card">
                        <div class="platform-icon">
                            <i class="ri-apple-line"></i>
                        </div>
                        <p class="small fw-medium mb-0">iOS</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="platform-card">
                        <div class="platform-icon">
                            <i class="ri-android-line"></i>
                        </div>
                        <p class="small fw-medium mb-0">Android</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="platform-card">
                        <div class="platform-icon">
                            <i class="ri-windows-line"></i>
                        </div>
                        <p class="small fw-medium mb-0">Windows</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="platform-card">
                        <div class="platform-icon">
                            <i class="ri-mac-line"></i>
                        </div>
                        <p class="small fw-medium mb-0">macOS</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="platform-card">
                        <div class="platform-icon">
                            <i class="ri-ubuntu-line"></i>
                        </div>
                        <p class="small fw-medium mb-0">Linux</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="platform-card">
                        <div class="platform-icon">
                            <i class="ri-global-line"></i>
                        </div>
                        <p class="small fw-medium mb-0">Web</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Pricing Plans -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">App Development Packages</h2>
                    <p class="text-muted small">Choose the perfect solution for your mobile app development needs</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="pricing-card">
                        <h5 class="h6 fw-bold mb-2">Starter App</h5>
                        <div class="h3 fw-bold text-primary mb-2">$2,499<span class="small text-muted">/project</span></div>
                        <p class="small text-muted mb-3">Perfect for small businesses and simple mobile apps</p>
                        <ul class="list-unstyled feature-list mb-3">
                            <li><i class="ri-check-line"></i>Up to 8 App Screens</li>
                            <li><i class="ri-check-line"></i>iOS & Android Compatible</li>
                            <li><i class="ri-check-line"></i>Basic UI/UX Design</li>
                            <li><i class="ri-check-line"></i>Push Notifications</li>
                            <li><i class="ri-check-line"></i>App Store Submission</li>
                            <li><i class="ri-check-line"></i>3 Months Free Support</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-web w-100">Get Started</button></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-card featured">
                        <div class="badge bg-primary mb-2 small">Most Popular</div>
                        <h5 class="h6 fw-bold mb-2">Business App</h5>
                        <div class="h3 fw-bold text-primary mb-2">$4,999<span class="small text-muted">/project</span></div>
                        <p class="small text-muted mb-3">Comprehensive solution for growing businesses</p>
                        <ul class="list-unstyled feature-list mb-3">
                            <li><i class="ri-check-line"></i>Up to 20 App Screens</li>
                            <li><i class="ri-check-line"></i>Custom UI/UX Design</li>
                            <li><i class="ri-check-line"></i>Backend Integration</li>
                            <li><i class="ri-check-line"></i>User Authentication</li>
                            <li><i class="ri-check-line"></i>Payment Gateway Integration</li>
                            <li><i class="ri-check-line"></i>Analytics Dashboard</li>
                            <li><i class="ri-check-line"></i>6 Months Support</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-web w-100">Get Started</button></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-card">
                        <h5 class="h6 fw-bold mb-2">Enterprise App</h5>
                        <div class="h3 fw-bold text-primary mb-2">$9,999<span class="small text-muted">/project</span></div>
                        <p class="small text-muted mb-3">Custom mobile applications for large organizations</p>
                        <ul class="list-unstyled feature-list mb-3">
                            <li><i class="ri-check-line"></i>Unlimited App Screens</li>
                            <li><i class="ri-check-line"></i>Advanced Custom Features</li>
                            <li><i class="ri-check-line"></i>API Development & Integration</li>
                            <li><i class="ri-check-line"></i>Database Architecture</li>
                            <li><i class="ri-check-line"></i>Performance Optimization</li>
                            <li><i class="ri-check-line"></i>Security Implementation</li>
                            <li><i class="ri-check-line"></i>12 Months Support</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-web w-100">Contact Sales</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Industries We Serve -->
    <section class="section-spacing">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-2">Industries We Serve</h2>
                    <p class="text-muted small">Custom web solutions for diverse business sectors</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-hospital-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Healthcare</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-bank-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Finance</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-graduation-cap-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Education</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-government-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Government</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-shopping-cart-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Retail</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-building-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Corporate</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-car-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Automotive</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-restaurant-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Hospitality</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-truck-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Logistics</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-home-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Residential</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-ancient-gate-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Manufacturing</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-server-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Technology</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include 'components/footer.php';
?>
