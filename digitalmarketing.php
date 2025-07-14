<?php 
$current_page = 'digitalmarketing';
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
            --gradient-marketing: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            --gradient-growth: linear-gradient(135deg, #00d2d3 0%, #54a0ff 100%);
        }
        .section-spacing {
            padding: 1.5rem 0;
        }
        
        .hero-marketing {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }
        
        .hero-marketing::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="%23ffffff05" cx="200" cy="200" r="100"/><circle fill="%23ffffff03" cx="800" cy="400" r="150"/><circle fill="%23ffffff05" cx="400" cy="700" r="80"/></svg>');
            pointer-events: none;
        }
        
        .marketing-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-marketing);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }
        
        .service-card-marketing {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .service-card-marketing:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }
        
        .strategy-card {
            background: linear-gradient(135deg, #ff6b6b20 0%, #ee5a2420 100%);
            border: 1px solid #ff6b6b30;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .strategy-card:hover {
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
        
        .bg-marketing-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-marketing {
            background: var(--gradient-marketing);
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-marketing:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
            color: white;
        }
        
        .btn-outline-marketing {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-marketing:hover {
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
            
            .hero-marketing {
                padding: 1.5rem 0;
            }
            
            .marketing-icon{
                margin-top: 25px;
            }
            
            .service-card-marketing {
                padding: 1rem;
                margin-bottom: 1rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-marketing">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-white">
                        <h1 class="display-6 fw-bold mb-2">Digital Marketing Services</h1>
                        <p class="lead mb-3 fs-6">Grow your business with our comprehensive digital marketing solutions. Data-driven strategies, creative campaigns, and measurable results.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="./contact.php"><button class="btn btn-marketing">Start Growing Today</button></a>
                            <a href="./freeguide.php"><button class="btn btn-outline-light btn-sm">Free Marketing Audit</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="marketing-icon mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="ri-rocket-line"></i>
                    </div>
                    <h4 class="text-white mb-2">360° Digital Solutions</h4>
                    <p class="text-white-50 small">Comprehensive marketing strategies that drive real results</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Marketing Services -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Marketing Services</h2>
                    <p class="text-muted small">Complete digital marketing solutions for your business growth</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-marketing">
                        <div class="marketing-icon">
                            <i class="ri-search-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Search Engine Optimization</h5>
                        <p class="small text-muted mb-2">Improve your website's visibility and ranking on search engines to drive organic traffic.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Keyword Research & Strategy</li>
                            <li><i class="ri-check-line"></i>On-Page SEO Optimization</li>
                            <li><i class="ri-check-line"></i>Technical SEO Audit</li>
                            <li><i class="ri-check-line"></i>Link Building & Outreach</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-marketing">
                        <div class="marketing-icon">
                            <i class="ri-advertisement-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Pay-Per-Click Advertising</h5>
                        <p class="small text-muted mb-2">Targeted advertising campaigns that deliver immediate results and maximize ROI.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Google Ads Management</li>
                            <li><i class="ri-check-line"></i>Facebook & Instagram Ads</li>
                            <li><i class="ri-check-line"></i>Campaign Optimization</li>
                            <li><i class="ri-check-line"></i>Conversion Tracking</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-marketing">
                        <div class="marketing-icon">
                            <i class="ri-user-heart-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Social Media Marketing</h5>
                        <p class="small text-muted mb-2">Build brand awareness and engage with your audience across all social platforms.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Content Strategy & Creation</li>
                            <li><i class="ri-check-line"></i>Social Media Management</li>
                            <li><i class="ri-check-line"></i>Influencer Partnerships</li>
                            <li><i class="ri-check-line"></i>Social Media Marketing</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-marketing">
                        <div class="marketing-icon">
                            <i class="ri-article-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Content Marketing</h5>
                        <p class="small text-muted mb-2">Create valuable, relevant content that attracts and retains your target audience.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Optimize Blogs & Article</li>
                            <li><i class="ri-check-line"></i>Video Content Creation</li>
                            <li><i class="ri-check-line"></i>Infographic Design</li>
                            <li><i class="ri-check-line"></i>Content Calendar Planning</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-marketing">
                        <div class="marketing-icon">
                            <i class="ri-mail-send-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Email Marketing</h5>
                        <p class="small text-muted mb-2">Build relationships and drive conversions with personalized email campaigns.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Email Campaign Design</li>
                            <li><i class="ri-check-line"></i>List Segmentation</li>
                            <li><i class="ri-check-line"></i>Automation Setup</li>
                            <li><i class="ri-check-line"></i>Performance Analytics</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-marketing">
                        <div class="marketing-icon">
                            <i class="ri-line-chart-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Analytics & Reporting</h5>
                        <p class="small text-muted mb-2">Track performance and optimize campaigns with comprehensive data analysis.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Google Analytics Setup</li>
                            <li><i class="ri-check-line"></i>Custom Dashboard Creation</li>
                            <li><i class="ri-check-line"></i>Google Search Console</li>
                            <li><i class="ri-check-line"></i>ROI Measurement</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marketing Strategies -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Digital Marketing Strategies</h3>
                    <p class="text-muted small mb-3">Proven approaches to accelerate your business growth</p>
                    
                    <div class="strategy-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-team-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Audience Targeting</h6>
                                <p class="small text-muted mb-0">Precise targeting to reach your ideal customers at the right time with the right message.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="strategy-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-lightbulb-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Creative Campaigns</h6>
                                <p class="small text-muted mb-0">Compelling creative content that captures attention and drives engagement.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="strategy-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-refresh-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Conversion Optimization</h6>
                                <p class="small text-muted mb-0">Continuous testing and optimization to maximize your marketing ROI.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="strategy-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-smartphone-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Multi-Channel Approach</h6>
                                <p class="small text-muted mb-0">Integrated campaigns across all digital channels for maximum reach and impact.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Why Choose Our Services</h3>
                    <p class="text-muted small mb-3">Benefits that set us apart from the competition</p>
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-bar-chart-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Data-Driven Results</h6>
                                <p class="small text-muted mb-0">Every decision backed by comprehensive analytics and insights.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-timer-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Fast Implementation</h6>
                                <p class="small text-muted mb-0">Quick campaign setup and launch to start seeing results sooner.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-team-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Expert Team</h6>
                                <p class="small text-muted mb-0">Certified professionals with years of marketing experience.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-customer-service-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">24/7 Support</h6>
                                <p class="small text-muted mb-0">Round-the-clock support to keep your campaigns running smoothly.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-shield-check-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Guaranteed ROI</h6>
                                <p class="small text-muted mb-0">Transparent reporting and measurable return on investment.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="benefit-feature">
                                <i class="ri-settings-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Custom Solutions</h6>
                                <p class="small text-muted mb-0">Tailored strategies that fit your unique business needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marketing Stats -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">300%</h3>
                        <p class="small mb-0">Average ROI Increase</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">1000+</h3>
                        <p class="small mb-0">Successful Campaigns</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">95%</h3>
                        <p class="small mb-0">Client Satisfaction</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">24/7</h3>
                        <p class="small mb-0">Campaign Monitoring</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marketing Process -->
    <section class="section-spacing">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Marketing Process</h2>
                    <p class="text-muted small">Strategic approach to digital marketing success</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-2">Research & Analysis</h6>
                        <p class="small text-muted">Deep dive into your market, competitors, and target audience to develop insights.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-2">Strategy Development</h6>
                        <p class="small text-muted">Create customized marketing strategies aligned with your business goals.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-2">Campaign Launch</h6>
                        <p class="small text-muted">Execute campaigns across multiple channels with precision and timing.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-2">Optimize & Scale</h6>
                        <p class="small text-muted">Continuous monitoring, testing, and optimization to maximize results.</p>
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
                    <h2 class="h4 fw-bold text-gradient mb-2">Digital Marketing Packages</h2>
                    <p class="text-muted small">Choose the perfect plan to grow your business</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Starter Package -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-marketing text-center h-100">
                        <div class="marketing-icon mx-auto">
                            <i class="ri-plant-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Starter Package</h5>
                        <div class="mb-3">
                            <h3 class="h4 fw-bold text-primary">$899<span class="small text-muted">/month</span></h3>
                            <p class="small text-muted">Perfect for small businesses starting their digital journey</p>
                        </div>
                        <ul class="list-unstyled feature-list text-start mb-4">
                            <li><i class="ri-check-line"></i>Basic SEO Optimization</li>
                            <li><i class="ri-check-line"></i>Social Media Management (2 platforms)</li>
                            <li><i class="ri-check-line"></i>Content Creation (4 posts/week)</li>
                            <li><i class="ri-check-line"></i>Monthly Performance Report</li>
                            <li><i class="ri-check-line"></i>Email Marketing Setup</li>
                            <li><i class="ri-check-line"></i>Basic Analytics Tracking</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-marketing w-100">Get Started</button></a>
                    </div>
                </div>
                
                <!-- Professional Package -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-marketing text-center h-100 position-relative">
                        <div class="position-absolute top-0 start-50 translate-middle">
                            <span class="badge bg-primary">Most Popular</span>
                        </div>
                        <div class="marketing-icon mx-auto">
                            <i class="ri-rocket-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Professional Package</h5>
                        <div class="mb-3">
                            <h3 class="h4 fw-bold text-primary">$1,799<span class="small text-muted">/month</span></h3>
                            <p class="small text-muted">Comprehensive marketing for growing businesses</p>
                        </div>
                        <ul class="list-unstyled feature-list text-start mb-4">
                            <li><i class="ri-check-line"></i>Advanced SEO & Technical Audit</li>
                            <li><i class="ri-check-line"></i>Multi-Platform Social Media</li>
                            <li><i class="ri-check-line"></i>PPC Campaign Management</li>
                            <li><i class="ri-check-line"></i>Content Marketing Strategy</li>
                            <li><i class="ri-check-line"></i>Email Automation Campaigns</li>
                            <li><i class="ri-check-line"></i>Bi-weekly Strategy Calls</li>
                            <li><i class="ri-check-line"></i>Custom Analytics Dashboard</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-marketing w-100">Choose Professional</button></a>
                    </div>
                </div>
                
                <!-- Enterprise Package -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-marketing text-center h-100">
                        <div class="marketing-icon mx-auto">
                            <i class="ri-trophy-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Enterprise Package</h5>
                        <div class="mb-3">
                            <h3 class="h4 fw-bold text-primary">$3,499<span class="small text-muted">/month</span></h3>
                            <p class="small text-muted">Full-scale marketing for established businesses</p>
                        </div>
                        <ul class="list-unstyled feature-list text-start mb-4">
                            <li><i class="ri-check-line"></i>Complete SEO & Content Strategy</li>
                            <li><i class="ri-check-line"></i>Advanced PPC & Display Ads</li>
                            <li><i class="ri-check-line"></i>Influencer Marketing Campaigns</li>
                            <li><i class="ri-check-line"></i>Video Content Production</li>
                            <li><i class="ri-check-line"></i>Marketing Automation</li>
                            <li><i class="ri-check-line"></i>Dedicated Account Manager</li>
                            <li><i class="ri-check-line"></i>Weekly Performance Reviews</li>
                            <li><i class="ri-check-line"></i>Custom Integrations</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-marketing w-100">Contact Sales</button></a>
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
                    <p class="text-muted small">Specialized marketing solutions for various business sectors</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-shopping-cart-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">E-commerce</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-heart-pulse-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Healthcare</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-home-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Real Estate</p>
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
                        <i class="ri-graduation-cap-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Education</p>
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
                        <i class="ri-bank-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Finance</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-shirt-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Fashion</p>
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
                        <i class="ri-plane-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Travel</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-code-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Technology</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-service-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Professional Services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
 include "components/footer.php";
?>