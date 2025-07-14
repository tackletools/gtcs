<?php 
$current_page = 'ecommerce';
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
        
        .hero-ecommerce {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }
        
        .hero-ecommerce::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="%23ffffff05" cx="200" cy="200" r="100"/><circle fill="%23ffffff03" cx="800" cy="400" r="150"/><circle fill="%23ffffff05" cx="400" cy="700" r="80"/></svg>');
            pointer-events: none;
        }
        
        .ecommerce-icon {
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
        
        .service-card-ecommerce {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .service-card-ecommerce:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }
        
        .feature-card {
            background: linear-gradient(135deg, #ff6b6b20 0%, #ee5a2420 100%);
            border: 1px solid #ff6b6b30;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            background: linear-gradient(135deg, #ff6b6b30 0%, #ee5a2430 100%);
            transform: translateX(4px);
        }
        
        .benefit-feature {
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
        
        .bg-ecommerce-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-ecommerce {
            background: var(--gradient-security);
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-ecommerce:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
            color: white;
        }
        
        .btn-outline-ecommerce {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-ecommerce:hover {
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
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
        }
        
        @media (max-width: 768px) {
            .section-spacing {
                padding: 1rem 0;
            }
            
            .hero-ecommerce {
                padding: 1.5rem 0;
            }
            
            .ecommerce-icon{
                margin-top: 25px;
            }
            
            .service-card-ecommerce {
                padding: 1rem;
                margin-bottom: 1rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-ecommerce">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-white">
                        <h1 class="display-6 fw-bold mb-2">E-commerce Solutions</h1>
                        <p class="lead mb-3 fs-6">Build, manage, and scale your online business with our comprehensive e-commerce platform. From store setup to advanced analytics.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="./contact.php"><button class="btn btn-ecommerce">Start Your Store</button></a>
                            <a href="./freeguide.php"><button class="btn btn-outline-light btn-sm">Free Demo</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="ecommerce-icon mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="ri-shopping-cart-line"></i>
                    </div>
                    <h4 class="text-white mb-2">Complete E-commerce Platform</h4>
                    <p class="text-white-50 small">Everything you need to sell online successfully</p>
                </div>
            </div>
        </div>
    </section>

    <!-- E-commerce Services -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our E-commerce Services</h2>
                    <p class="text-muted small">Comprehensive solutions for your online business</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-ecommerce">
                        <div class="ecommerce-icon">
                            <i class="ri-store-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Store Development</h5>
                        <p class="small text-muted mb-2">Custom e-commerce website design and development with modern features and responsive design.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Custom Store Design</li>
                            <li><i class="ri-check-line"></i>Mobile Responsive</li>
                            <li><i class="ri-check-line"></i>SEO Optimized</li>
                            <li><i class="ri-check-line"></i>Fast Loading Speed</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-ecommerce">
                        <div class="ecommerce-icon">
                            <i class="ri-store-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Payment Integration</h5>
                        <p class="small text-muted mb-2">Secure payment gateway integration with multiple payment options for seamless transactions.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Multiple Payment Gateways</li>
                            <li><i class="ri-check-line"></i>Secure Transactions</li>
                            <li><i class="ri-check-line"></i>Recurring Payments</li>
                            <li><i class="ri-check-line"></i>Currency Support</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-ecommerce">
                        <div class="ecommerce-icon">
                            <i class="ri-truck-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Inventory Management</h5>
                        <p class="small text-muted mb-2">Advanced inventory tracking, stock management, and automated reorder systems.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Real-time Stock Tracking</li>
                            <li><i class="ri-check-line"></i>Automated Reorders</li>
                            <li><i class="ri-check-line"></i>Multi-location Support</li>
                            <li><i class="ri-check-line"></i>Barcode Integration</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-ecommerce">
                        <div class="ecommerce-icon">
                            <i class="ri-line-chart-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Analytics & Reporting</h5>
                        <p class="small text-muted mb-2">Comprehensive analytics dashboard with detailed insights and performance metrics.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Sales Analytics</li>
                            <li><i class="ri-check-line"></i>Customer Insights</li>
                            <li><i class="ri-check-line"></i>Traffic Analysis</li>
                            <li><i class="ri-check-line"></i>Custom Reports</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-ecommerce">
                        <div class="ecommerce-icon">
                            <i class="ri-customer-service-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Customer Support</h5>
                        <p class="small text-muted mb-2">Integrated customer support tools including live chat, helpdesk, and ticket management.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Live Chat Integration</li>
                            <li><i class="ri-check-line"></i>Help Desk System</li>
                            <li><i class="ri-check-line"></i>Ticket Management</li>
                            <li><i class="ri-check-line"></i>Knowledge Base</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-ecommerce">
                        <div class="ecommerce-icon">
                            <i class="ri-megaphone-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Marketing Tools</h5>
                        <p class="small text-muted mb-2">Built-in marketing automation, email campaigns, and promotional tools to boost sales.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Email Marketing</li>
                            <li><i class="ri-check-line"></i>Discount Coupons</li>
                            <li><i class="ri-check-line"></i>Social Media Integration</li>
                            <li><i class="ri-check-line"></i>Affiliate Programs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- E-commerce Features -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Key E-commerce Features</h3>
                    <p class="text-muted small mb-3">Essential features for successful online selling</p>
                    
                    <div class="feature-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-shopping-bag-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Product Catalog</h6>
                                <p class="small text-muted mb-0">Unlimited products with variants, categories, and detailed descriptions.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-shopping-cart-2-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Shopping Cart</h6>
                                <p class="small text-muted mb-0">Advanced cart functionality with save for later and wishlist features.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-user-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">User Management</h6>
                                <p class="small text-muted mb-0">Customer accounts, order history, and personalized experiences.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-search-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Advanced Search</h6>
                                <p class="small text-muted mb-0">Smart search with filters, auto-complete, and product recommendations.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Platform Benefits</h3>
                    <p class="text-muted small mb-3">Why choose our e-commerce solution</p>
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-rocket-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Quick Setup</h6>
                                <p class="small text-muted mb-0">Get your store online in just a few hours.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-shield-check-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Secure Platform</h6>
                                <p class="small text-muted mb-0">SSL encryption and PCI compliance included.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-smartphone-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Mobile Optimized</h6>
                                <p class="small text-muted mb-0">Fully responsive design for all devices.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-bar-chart-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">SEO Ready</h6>
                                <p class="small text-muted mb-0">Built-in SEO tools for better visibility.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-global-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Multi-language</h6>
                                <p class="small text-muted mb-0">Support for multiple languages and currencies.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-tools-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Easy Management</h6>
                                <p class="small text-muted mb-0">Intuitive admin panel for easy store management.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- E-commerce Stats -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">10K+</h3>
                        <p class="small mb-0">Online Stores</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">99.9%</h3>
                        <p class="small mb-0">Uptime Guarantee</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">24/7</h3>
                        <p class="small mb-0">Technical Support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">50+</h3>
                        <p class="small mb-0">Payment Methods</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Development Process -->
    <section class="section-spacing">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Development Process</h2>
                    <p class="text-muted small">From concept to launch - a streamlined approach</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-2">Discovery</h6>
                        <p class="small text-muted">Understanding your business requirements and target audience.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-2">Design</h6>
                        <p class="small text-muted">Creating wireframes and designing user-friendly interfaces.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-2">Development</h6>
                        <p class="small text-muted">Building your e-commerce platform with latest technologies.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-2">Launch</h6>
                        <p class="small text-muted">Testing, deployment, and ongoing support for your store.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Pricing Section -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-2">E-commerce Pricing Plans</h2>
                    <p class="text-muted small">Choose the perfect plan for your online business</p>
                </div>
            </div>
            <div class="row g-3 justify-content-center">
                <!-- Starter Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-ecommerce text-center">
                        <div class="ecommerce-icon mx-auto">
                            <i class="ri-rocket-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Starter</h5>
                        <div class="mb-3">
                            <span class="h3 fw-bold text-primary">$49</span>
                            <span class="small text-muted">/month</span>
                        </div>
                        <p class="small text-muted mb-3">Perfect for small businesses getting started online</p>
                        <ul class="list-unstyled feature-list text-start mb-4">
                            <li><i class="ri-check-line"></i>Up to 100 Products</li>
                            <li><i class="ri-check-line"></i>5GB Storage</li>
                            <li><i class="ri-check-line"></i>SSL Certificate</li>
                            <li><i class="ri-check-line"></i>Mobile Responsive</li>
                            <li><i class="ri-check-line"></i>Basic Analytics</li>
                            <li><i class="ri-check-line"></i>Email Support</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-ecommerce w-100">
                            Get Started
                        </button></a>
                    </div>
                </div>
                
                <!-- Professional Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-ecommerce text-center position-relative">
                        <div class="position-absolute top-0 end-0 bg-primary text-white px-2 py-1 rounded-start" style="font-size: 10px;">
                            POPULAR
                        </div>
                        <div class="ecommerce-icon mx-auto">
                            <i class="ri-store-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Professional</h5>
                        <div class="mb-3">
                            <span class="h3 fw-bold text-primary">$99</span>
                            <span class="small text-muted">/month</span>
                        </div>
                        <p class="small text-muted mb-3">Ideal for growing businesses with advanced features</p>
                        <ul class="list-unstyled feature-list text-start mb-4">
                            <li><i class="ri-check-line"></i>Up to 1000 Products</li>
                            <li><i class="ri-check-line"></i>50GB Storage</li>
                            <li><i class="ri-check-line"></i>Advanced Analytics</li>
                            <li><i class="ri-check-line"></i>Multi-payment Gateway</li>
                            <li><i class="ri-check-line"></i>Inventory Management</li>
                            <li><i class="ri-check-line"></i>24/7 Support</li>
                            <li><i class="ri-check-line"></i>Marketing Tools</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-ecommerce w-100">
                            Choose Plan
                        </button></a>
                    </div>
                </div>
                
                <!-- Enterprise Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-ecommerce text-center">
                        <div class="ecommerce-icon mx-auto">
                            <i class="ri-building-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Enterprise</h5>
                        <div class="mb-3">
                            <span class="h3 fw-bold text-primary">$199</span>
                            <span class="small text-muted">/month</span>
                        </div>
                        <p class="small text-muted mb-3">Complete solution for large-scale businesses</p>
                        <ul class="list-unstyled feature-list text-start mb-4">
                            <li><i class="ri-check-line"></i>Unlimited Products</li>
                            <li><i class="ri-check-line"></i>500GB Storage</li>
                            <li><i class="ri-check-line"></i>Custom Integrations</li>
                            <li><i class="ri-check-line"></i>Multi-store Management</li>
                            <li><i class="ri-check-line"></i>Advanced Security</li>
                            <li><i class="ri-check-line"></i>Priority Support</li>
                            <li><i class="ri-check-line"></i>White-label Solution</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-ecommerce w-100">
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
                    <p class="text-muted small">E-commerce solutions for various business sectors</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-shirt-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Fashion</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-smartphone-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Electronics</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-book-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Books</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-home-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Home & Garden</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-heart-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Health & Beauty</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-football-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Sports</p>
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
                        <i class="ri-gift-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Gifts</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-restaurant-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Food & Beverage</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-gamepad-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Gaming</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-paint-brush-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Art & Crafts</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-briefcase-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Business</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
 include "components/footer.php";
?>