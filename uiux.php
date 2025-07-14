<?php 
$current_page = 'uiux';  
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
        
        .hero-design {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }
        
        .hero-design::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="%23ffffff05" cx="200" cy="200" r="100"/><circle fill="%23ffffff03" cx="800" cy="400" r="150"/><circle fill="%23ffffff05" cx="400" cy="700" r="80"/></svg>');
            pointer-events: none;
        }
        
        .design-icon {
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
        
        .service-card-design {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .service-card-design:hover {
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
        
        .bg-design-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-design {
            background: var(--gradient-security);
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-design:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
            color: white;
        }
        
        .btn-outline-design {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-design:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }
        
        @media (max-width: 768px) {
            .section-spacing {
                padding: 1rem 0;
            }
            
            .hero-design {
                padding: 1.5rem 0;
            }
            
            .design-icon{
                margin-top: 25px;
            }
            
            .service-card-design {
                padding: 1rem;
                margin-bottom: 1rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-design">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-white">
                        <h1 class="display-6 fw-bold mb-2">UI/UX Design Services</h1>
                        <p class="lead mb-3 fs-6">Create exceptional user experiences with our comprehensive UI/UX design solutions. User-centered design that drives engagement and conversion.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="./contact.php"><button class="btn btn-design">Start Your Project</button></a>
                            <a href="./freeguide.php"><button class="btn btn-outline-light btn-sm">Free Design Consultation</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="design-icon mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="ri-palette-line"></i>
                    </div>
                    <h4 class="text-white mb-2">User-Centered Design</h4>
                    <p class="text-white-50 small">Research-driven designs that convert visitors into customers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Design Services -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Design Services</h2>
                    <p class="text-muted small">Complete UI/UX solutions for digital products</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-design">
                        <div class="design-icon">
                            <i class="ri-layout-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">UI Design</h5>
                        <p class="small text-muted mb-2">Beautiful, intuitive interfaces that enhance user interaction and brand identity.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Visual Design Systems</li>
                            <li><i class="ri-check-line"></i>Component Libraries</li>
                            <li><i class="ri-check-line"></i>Responsive Layouts</li>
                            <li><i class="ri-check-line"></i>Interactive Prototypes</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-design">
                        <div class="design-icon">
                            <i class="ri-user-heart-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">UX Research</h5>
                        <p class="small text-muted mb-2">Data-driven insights to understand user behavior and optimize user journeys.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>User Interviews</li>
                            <li><i class="ri-check-line"></i>Usability Testing</li>
                            <li><i class="ri-check-line"></i>Analytics Analysis</li>
                            <li><i class="ri-check-line"></i>Persona Development</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-design">
                        <div class="design-icon">
                            <i class="ri-smartphone-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Mobile App Design</h5>
                        <p class="small text-muted mb-2">Native and cross-platform mobile app interfaces optimized for touch interactions.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>iOS & Android Design</li>
                            <li><i class="ri-check-line"></i>Touch-Optimized UX</li>
                            <li><i class="ri-check-line"></i>App Store Guidelines</li>
                            <li><i class="ri-check-line"></i>Performance Optimization</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-design">
                        <div class="design-icon">
                            <i class="ri-global-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Web Design</h5>
                        <p class="small text-muted mb-2">Responsive websites that work seamlessly across all devices and browsers.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Responsive Design</li>
                            <li><i class="ri-check-line"></i>Landing Page Design</li>
                            <li><i class="ri-check-line"></i>E-commerce UX</li>
                            <li><i class="ri-check-line"></i>Cross-browser Testing</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-design">
                        <div class="design-icon">
                            <i class="ri-draft-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Wireframing & Prototyping</h5>
                        <p class="small text-muted mb-2">Interactive prototypes to validate concepts before development begins.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Low-Fi Wireframes</li>
                            <li><i class="ri-check-line"></i>High-Fi Prototypes</li>
                            <li><i class="ri-check-line"></i>User Flow Mapping</li>
                            <li><i class="ri-check-line"></i>Interaction Design</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-design">
                        <div class="design-icon">
                            <i class="ri-pencil-ruler-2-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Brand Identity</h5>
                        <p class="small text-muted mb-2">Cohesive brand systems that create memorable and consistent user experiences.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Logo Design</li>
                            <li><i class="ri-check-line"></i>Color Palettes</li>
                            <li><i class="ri-check-line"></i>Typography Systems</li>
                            <li><i class="ri-check-line"></i>Brand Guidelines</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Design Challenges -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Common Design Challenges</h3>
                    <p class="text-muted small mb-3">Understanding user pain points is key to effective design</p>
                    
                    <div class="challenge-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-user-unfollow-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Poor User Experience</h6>
                                <p class="small text-muted mb-0">Confusing navigation and unclear user flows that frustrate visitors.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="challenge-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-smartphone-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Mobile Responsiveness</h6>
                                <p class="small text-muted mb-0">Designs that don't work well on mobile devices and tablets.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="challenge-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-speed-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Slow Loading Times</h6>
                                <p class="small text-muted mb-0">Heavy designs that impact performance and user satisfaction.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="challenge-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-eye-close-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Accessibility Issues</h6>
                                <p class="small text-muted mb-0">Designs that exclude users with disabilities or impairments.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Our Design Solutions</h3>
                    <p class="text-muted small mb-3">User-centered approach that solves real problems</p>
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-user-star-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">User-Centered Design</h6>
                                <p class="small text-muted mb-0">Research-driven decisions based on real user needs.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-rocket-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Responsive Design</h6>
                                <p class="small text-muted mb-0">Seamless experience across all devices and screen sizes.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-rocket-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Performance Optimized</h6>
                                <p class="small text-muted mb-0">Fast-loading designs that don't compromise on quality.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-eye-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Accessibility First</h6>
                                <p class="small text-muted mb-0">Inclusive design that works for everyone.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-bar-chart-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Data-Driven Design</h6>
                                <p class="small text-muted mb-0">Decisions backed by analytics and user feedback.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="solution-feature">
                                <i class="ri-palette-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Brand Consistency</h6>
                                <p class="small text-muted mb-0">Cohesive visual identity across all touchpoints.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Design Stats -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">300+</h3>
                        <p class="small mb-0">Projects Completed</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">98%</h3>
                        <p class="small mb-0">Client Satisfaction</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">5+ Years</h3>
                        <p class="small mb-0">Design Experience</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">24h</h3>
                        <p class="small mb-0">Response Time</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Design Process -->
    <section class="section-spacing">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Design Process</h2>
                    <p class="text-muted small">Systematic approach to creating exceptional user experiences</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-2">Discovery</h6>
                        <p class="small text-muted">Understanding your business goals, users, and project requirements.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-2">Research</h6>
                        <p class="small text-muted">User research, competitor analysis, and market insights gathering.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-2">Design</h6>
                        <p class="small text-muted">Creating wireframes, prototypes, and high-fidelity designs.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-2">Testing</h6>
                        <p class="small text-muted">User testing, feedback collection, and design refinement.</p>
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
                    <h2 class="h4 fw-bold text-gradient mb-2">Design Packages</h2>
                    <p class="text-muted small">Choose the perfect design package for your project needs</p>
                </div>
            </div>
            <div class="row g-3 justify-content-center">
                <!-- Basic Package -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-design text-center position-relative">
                        <div class="design-icon mx-auto">
                            <i class="ri-pencil-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Basic Design</h5>
                        <div class="mb-3">
                            <span class="h4 fw-bold text-primary">$999</span>
                            <span class="text-muted small">/project</span>
                        </div>
                        <p class="small text-muted mb-3">Perfect for small businesses and startups</p>
                        <ul class="list-unstyled feature-list text-start mb-4">
                            <li><i class="ri-check-line"></i>3-5 Page Website Design</li>
                            <li><i class="ri-check-line"></i>Mobile Responsive</li>
                            <li><i class="ri-check-line"></i>2 Design Revisions</li>
                            <li><i class="ri-check-line"></i>Basic Wireframes</li>
                            <li><i class="ri-check-line"></i>Logo Design</li>
                            <li><i class="ri-check-line"></i>2 Week Delivery</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-design w-100">
                            Get Started
                        </button></a>
                    </div>
                </div>
                
                <!-- Professional Package -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-design text-center position-relative">
                        <div class="position-absolute top-0 start-50 translate-middle">
                            <span class="badge bg-primary">Most Popular</span>
                        </div>
                        <div class="design-icon mx-auto">
                            <i class="ri-layout-4-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Professional Design</h5>
                        <div class="mb-3">
                            <span class="h4 fw-bold text-primary">$2,499</span>
                            <span class="text-muted small">/project</span>
                        </div>
                        <p class="small text-muted mb-3">Ideal for growing businesses and e-commerce</p>
                        <ul class="list-unstyled feature-list text-start mb-4">
                            <li><i class="ri-check-line"></i>10-15 Page Website Design</li>
                            <li><i class="ri-check-line"></i>Advanced Interactions</li>
                            <li><i class="ri-check-line"></i>5 Design Revisions</li>
                            <li><i class="ri-check-line"></i>User Journey Mapping</li>
                            <li><i class="ri-check-line"></i>Brand Guidelines</li>
                            <li><i class="ri-check-line"></i>SEO Optimization</li>
                            <li><i class="ri-check-line"></i>3 Week Delivery</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-design w-100">
                            Get Started
                        </button></a>
                    </div>
                </div>
                
                <!-- Enterprise Package -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-design text-center position-relative">
                        <div class="design-icon mx-auto">
                            <i class="ri-dashboard-3-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Enterprise Design</h5>
                        <div class="mb-3">
                            <span class="h4 fw-bold text-primary">$4,999</span>
                            <span class="text-muted small">/project</span>
                        </div>
                        <p class="small text-muted mb-3">Complete solution for large organizations</p>
                        <ul class="list-unstyled feature-list text-start mb-4">
                            <li><i class="ri-check-line"></i>Unlimited Pages</li>
                            <li><i class="ri-check-line"></i>Custom Animations</li>
                            <li><i class="ri-check-line"></i>Unlimited Revisions</li>
                            <li><i class="ri-check-line"></i>User Research & Testing</li>
                            <li><i class="ri-check-line"></i>Complete Brand System</li>
                            <li><i class="ri-check-line"></i>Performance Optimization</li>
                            <li><i class="ri-check-line"></i>6 Week Delivery</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-design w-100">
                            Get Started
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
                    <h2 class="h4 fw-bold text-gradient mb-2">Industries We Design For</h2>
                    <p class="text-muted small">Tailored design solutions for various business sectors</p>
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
                        <i class="ri-bank-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Fintech</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-hospital-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Healthcare</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-graduation-cap-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">EdTech</p>
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
                        <i class="ri-building-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Real Estate</p>
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
                        <i class="ri-camera-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Media</p>
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
                        <i class="ri-plane-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Travel</p>
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
                        <i class="ri-seedling-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Sustainability</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
 include "components/footer.php";
?>