<?php 
$current_page = 'database';         
 include "components/header.php";
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
            --gradient-security: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            --gradient-protection: linear-gradient(135deg, #00d2d3 0%, #54a0ff 100%);
        }
        .section-spacing {
            padding: 1.5rem 0;
        }
        
        .hero-database {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }
        
        .hero-database::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="%23ffffff05" cx="200" cy="200" r="100"/><circle fill="%23ffffff03" cx="800" cy="400" r="150"/><circle fill="%23ffffff05" cx="400" cy="700" r="80"/></svg>');
            pointer-events: none;
        }
        
        .database-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-security);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }
        
        .service-card-database {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .service-card-database:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }
        
        .challenge-card {
            background: linear-gradient(135deg, #ff6b6b20 0%, #ee5a2420 100%);
            border: 1px solid #ff6b6b30;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .challenge-card:hover {
            background: linear-gradient(135deg, #ff6b6b30 0%, #ee5a2430 100%);
            transform: translateX(4px);
        }
        
        .solution-feature {
            background: linear-gradient(135deg, #00d2d320 0%, #54a0ff20 100%);
            border: 1px solid #00d2d330;
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
        
        .bg-database-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-database {
            background: var(--gradient-security);
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-database:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
            color: white;
        }
        
        .btn-outline-database {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-database:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }
        
        .industry-card {
            background: white;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .industry-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.1);
        }
        
        @media (max-width: 768px) {
            .section-spacing {
                padding: 1rem 0;
            }
            
            .hero-database {
                padding: 1.5rem 0;
            }
            
            .database-icon{
                margin-top: 25px;
            }
            
            .service-card-database {
                padding: 1rem;
                margin-bottom: 1rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-database">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-white">
                        <h1 class="display-6 fw-bold mb-2">Database Services</h1>
                        <p class="lead mb-3 fs-6">Comprehensive database solutions for your business needs. Expert database design, optimization, migration, and management services.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="./contact.php"><button class="btn btn-database">Get Started Today</button></a>
                            <a href="./freeguide.php"><button class="btn btn-outline-light btn-sm">Free Consultation</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="database-icon mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="ri-database-2-line"></i>
                    </div>
                    <h4 class="text-white mb-2">24/7 Database Support</h4>
                    <p class="text-white-50 small">Expert database management and optimization</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Database Services -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Database Services</h2>
                    <p class="text-muted small">Comprehensive database solutions for modern businesses</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-database">
                        <div class="database-icon">
                            <i class="ri-database-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Database Design</h5>
                        <p class="small text-muted mb-2">Custom database architecture and schema design optimized for your specific business requirements.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Schema Design & Modeling</li>
                            <li><i class="ri-check-line"></i>Performance Optimization</li>
                            <li><i class="ri-check-line"></i>Scalability Planning</li>
                            <li><i class="ri-check-line"></i>Best Practices Implementation</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-database">
                        <div class="database-icon">
                            <i class="ri-settings-3-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Database Administration</h5>
                        <p class="small text-muted mb-2">Professional database administration services to ensure optimal performance and reliability.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Performance Monitoring</li>
                            <li><i class="ri-check-line"></i>Backup & Recovery</li>
                            <li><i class="ri-check-line"></i>User Management</li>
                            <li><i class="ri-check-line"></i>Security Configuration</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-database">
                        <div class="database-icon">
                            <i class="ri-exchange-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Database Migration</h5>
                        <p class="small text-muted mb-2">Seamless database migration services with minimal downtime and data integrity assurance.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Data Migration Planning</li>
                            <li><i class="ri-check-line"></i>Zero-Downtime Migration</li>
                            <li><i class="ri-check-line"></i>Data Validation</li>
                            <li><i class="ri-check-line"></i>Platform Compatibility</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-database">
                        <div class="database-icon">
                            <i class="ri-speed-up-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Performance Tuning</h5>
                        <p class="small text-muted mb-2">Optimize database performance with advanced tuning techniques and query optimization.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Query Optimization</li>
                            <li><i class="ri-check-line"></i>Index Management</li>
                            <li><i class="ri-check-line"></i>Resource Allocation</li>
                            <li><i class="ri-check-line"></i>Bottleneck Analysis</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-database">
                        <div class="database-icon">
                            <i class="ri-cloud-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Cloud Database</h5>
                        <p class="small text-muted mb-2">Cloud-native database solutions with scalability, reliability, and cost-effectiveness.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Cloud Migration</li>
                            <li><i class="ri-check-line"></i>Auto-scaling Configuration</li>
                            <li><i class="ri-check-line"></i>Multi-region Setup</li>
                            <li><i class="ri-check-line"></i>Cost Optimization</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-database">
                        <div class="database-icon">
                            <i class="ri-graduation-cap-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Training & Support</h5>
                        <p class="small text-muted mb-2">Comprehensive training programs and ongoing support for your database teams.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Team Training Programs</li>
                            <li><i class="ri-check-line"></i>Best Practices Workshops</li>
                            <li><i class="ri-check-line"></i>Documentation & Guides</li>
                            <li><i class="ri-check-line"></i>Ongoing Support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Database Challenges -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Common Database Challenges</h3>
                    <p class="text-muted small mb-3">Understanding challenges helps us provide better solutions</p>
                    
                    <div class="challenge-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-arrow-up-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Performance Issues</h6>
                                <p class="small text-muted mb-0">Slow queries, poor indexing, and inefficient database design affecting application performance.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="challenge-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-arrow-up-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Scalability Limitations</h6>
                                <p class="small text-muted mb-0">Inability to handle growing data volumes and increasing user loads efficiently.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="challenge-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-shield-cross-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Data Security Risks</h6>
                                <p class="small text-muted mb-0">Inadequate security measures leading to potential data breaches and compliance issues.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="challenge-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-error-warning-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Data Loss & Recovery</h6>
                                <p class="small text-muted mb-0">Inadequate backup strategies and disaster recovery plans putting business data at risk.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Our Solution Features</h3>
                    <p class="text-muted small mb-3">Advanced database solutions for modern challenges</p>
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-flashlight-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">High Performance</h6>
                                <p class="small text-muted mb-0">Optimized queries and efficient indexing for lightning-fast responses.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-bar-chart-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Auto-scaling</h6>
                                <p class="small text-muted mb-0">Automatic scaling based on demand to handle traffic spikes.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-shield-check-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Enterprise Security</h6>
                                <p class="small text-muted mb-0">Advanced security features with encryption and access controls.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-refresh-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Automated Backups</h6>
                                <p class="small text-muted mb-0">Continuous backups with point-in-time recovery capabilities.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-bar-chart-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Real-time Analytics</h6>
                                <p class="small text-muted mb-0">Built-in analytics and reporting for data-driven decisions.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-checkbox-circle-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Compliance Ready</h6>
                                <p class="small text-muted mb-0">Meet industry standards and regulatory requirements.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Database Stats -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">99.9%</h3>
                        <p class="small mb-0">Uptime Guarantee</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">24/7</h3>
                        <p class="small mb-0">Database Monitoring</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">300+</h3>
                        <p class="small mb-0">Successful Migrations</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">50%</h3>
                        <p class="small mb-0">Performance Improvement</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Database Process -->
    <section class="section-spacing">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Database Process</h2>
                    <p class="text-muted small">Systematic approach to database implementation and optimization</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-2">Analysis</h6>
                        <p class="small text-muted">Comprehensive analysis of your current database infrastructure and requirements.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-2">Design</h6>
                        <p class="small text-muted">Custom database design and architecture tailored to your specific needs.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-2">Implementation</h6>
                        <p class="small text-muted">Seamless implementation with minimal disruption to your business operations.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-2">Optimization</h6>
                        <p class="small text-muted">Continuous monitoring and optimization for peak performance and reliability.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Database Pricing Section -->
    <section class="section-spacing bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="h4 fw-bold text-gradient mb-2">Database Service Pricing</h2>
                <p class="text-muted small">Flexible pricing plans to match your database needs</p>
            </div>
        </div>
        <div class="row g-3">
            <!-- Starter Plan -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card-database text-center">
                    <div class="database-icon mx-auto">
                        <i class="ri-database-line"></i>
                    </div>
                    <h5 class="h6 fw-bold mb-2">Starter</h5>
                    <div class="mb-3">
                        <span class="h3 fw-bold text-primary">$299</span>
                        <span class="text-muted small">/month</span>
                    </div>
                    <p class="small text-muted mb-3">Perfect for small businesses and startups</p>
                    <ul class="list-unstyled feature-list text-start mb-3">
                        <li><i class="ri-check-line"></i>Up to 10GB Database Storage</li>
                        <li><i class="ri-check-line"></i>Basic Performance Monitoring</li>
                        <li><i class="ri-check-line"></i>Daily Automated Backups</li>
                        <li><i class="ri-check-line"></i>Email Support</li>
                        <li><i class="ri-check-line"></i>Basic Security Features</li>
                    </ul>
                    <a href="./contact.php"><button class="btn btn-outline-database w-100">Get Started</button></a>
                </div>
            </div>
            
            <!-- Professional Plan -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card-database text-center position-relative">
                    <div class="position-absolute top-0 start-50 translate-middle">
                        <span class="badge bg-primary">Most Popular</span>
                    </div>
                    <div class="database-icon mx-auto">
                        <i class="ri-settings-3-line"></i>
                    </div>
                    <h5 class="h6 fw-bold mb-2">Professional</h5>
                    <div class="mb-3">
                        <span class="h3 fw-bold text-primary">$699</span>
                        <span class="text-muted small">/month</span>
                    </div>
                    <p class="small text-muted mb-3">Ideal for growing businesses</p>
                    <ul class="list-unstyled feature-list text-start mb-3">
                        <li><i class="ri-check-line"></i>Up to 100GB Database Storage</li>
                        <li><i class="ri-check-line"></i>Advanced Performance Monitoring</li>
                        <li><i class="ri-check-line"></i>Real-time Backups</li>
                        <li><i class="ri-check-line"></i>24/7 Phone & Email Support</li>
                        <li><i class="ri-check-line"></i>Database Optimization</li>
                        <li><i class="ri-check-line"></i>Migration Assistance</li>
                    </ul>
                    <a href="./contact.php"><button class="btn btn-database w-100">
                        Get Started
                    </button></a>
                </div>
            </div>
            
            <!-- Enterprise Plan -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card-database text-center">
                    <div class="database-icon mx-auto">
                        <i class="ri-cloud-line"></i>
                    </div>
                    <h5 class="h6 fw-bold mb-2">Enterprise</h5>
                    <div class="mb-3">
                        <span class="h3 fw-bold text-primary">Custom</span>
                        <span class="text-muted small">/month</span>
                    </div>
                    <p class="small text-muted mb-3">For large organizations with complex needs</p>
                    <ul class="list-unstyled feature-list text-start mb-3">
                        <li><i class="ri-check-line"></i>Unlimited Database Storage</li>
                        <li><i class="ri-check-line"></i>Custom Performance Solutions</li>
                        <li><i class="ri-check-line"></i>Multi-region Backups</li>
                        <li><i class="ri-check-line"></i>Dedicated Support Team</li>
                        <li><i class="ri-check-line"></i>Advanced Security & Compliance</li>
                        <li><i class="ri-check-line"></i>Custom Integration</li>
                        <li><i class="ri-check-line"></i>SLA Guarantee</li>
                    </ul>
                    <a href="./contact.php"><button class="btn btn-outline-database w-100">
                        Contact Sales
                    </button></a>
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
                    <p class="text-muted small">Specialized database solutions for various sectors</p>
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
                        <p class="small fw-medium mb-0">E-commerce</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-building-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Enterprise</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-smartphone-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Mobile Apps</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-game-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Gaming</p>
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
                        <i class="ri-camera-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Media</p>
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
                        <i class="ri-global-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">SaaS</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
 include "components/footer.php";
?>