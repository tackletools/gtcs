<?php 
$current_page = 'webdevelopment';
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
        
        .hero-web {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }
        
        .hero-web::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="%23ffffff05" cx="200" cy="200" r="100"/><circle fill="%23ffffff03" cx="800" cy="400" r="150"/><circle fill="%23ffffff05" cx="400" cy="700" r="80"/></svg>');
            pointer-events: none;
        }
        
        .web-icon {
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
        
        .service-card-web {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .service-card-web:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }
        
        .tech-card {
            background: linear-gradient(135deg, #ff6b6b20 0%, #ee5a2420 100%);
            border: 1px solid #ff6b6b30;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .tech-card:hover {
            background: linear-gradient(135deg, #ff6b6b30 0%, #ee5a2430 100%);
            transform: translateX(4px);
        }
        
        .feature-highlight {
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
        
        .bg-web-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-web {
            background: var(--gradient-security);
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-web:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
            color: white;
        }
        
        .btn-outline-web {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-web:hover {
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
            
            .hero-web {
                padding: 1.5rem 0;
            }
            
            .web-icon{
                margin-top: 25px;
            }
            
            .service-card-web {
                padding: 1rem;
                margin-bottom: 1rem;
            }
        }
        /* Pricing Section Styles */
.pricing-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    height: 100%;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.pricing-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    border-color: var(--primary-color);
}

.pricing-card.featured {
    border: 2px solid var(--primary-color);
    transform: scale(1.05);
    box-shadow: 0 8px 25px rgba(99, 102, 241, 0.2);
}

.pricing-card.featured::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.pricing-card .badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pricing-card h5 {
    color: var(--dark-color);
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.pricing-card .h3 {
    color: var(--primary-color);
    font-size: 2rem;
    margin-bottom: 1rem;
}

.pricing-card .h3 span {
    font-size: 0.9rem;
    color: #64748b;
    font-weight: 400;
}

.pricing-card p {
    color: #64748b;
    margin-bottom: 1.5rem;
    line-height: 1.5;
}

.pricing-card .feature-list {
    margin-bottom: 1.5rem;
}

.pricing-card .feature-list li {
    padding: 0.4rem 0;
    font-size: 0.85rem;
    color: #475569;
    display: flex;
    align-items: center;
}

.pricing-card .feature-list li i {
    color: var(--primary-color);
    margin-right: 0.5rem;
    font-size: 0.9rem;
    width: 16px;
    flex-shrink: 0;
}

.pricing-card .btn {
    font-size: 0.9rem;
    padding: 0.7rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pricing-card .btn-web {
    background: var(--gradient-primary);
    border: none;
    color: white;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
}

.pricing-card .btn-web:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
    color: white;
}

.pricing-card .btn-outline-web {
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    background: transparent;
}

.pricing-card .btn-outline-web:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
}

/* Featured card special styling */
.pricing-card.featured .h3 {
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.pricing-card.featured h5 {
    color: var(--primary-color);
    font-weight: 700;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .pricing-card {
        padding: 1.2rem;
        margin-bottom: 1.5rem;
    }
    
    .pricing-card.featured {
        transform: scale(1);
        margin-bottom: 1.5rem;
    }
    
    .pricing-card .h3 {
        font-size: 1.75rem;
    }
    
    .pricing-card .badge {
        position: static;
        display: inline-block;
        margin-bottom: 1rem;
    }
}
.pricing-card .btn a {
    text-decoration: none !important;
    color: inherit !important;
    display: block;
    width: 100%;
    height: 100%;
}

.pricing-card .btn-web a {
    color: white !important;
}

.pricing-card .btn-web:hover a {
    color: white !important;
}

.pricing-card .btn-outline-web a {
    color: var(--primary-color) !important;
}

.pricing-card .btn-outline-web:hover a {
    color: white !important;
}
    </style>

    <!-- Hero Section -->
    <section class="hero-web">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-white">
                        <h1 class="display-6 fw-bold mb-2">Web Development Services</h1>
                        <p class="lead mb-3 fs-6">Build powerful, scalable web applications with cutting-edge technologies. Custom solutions for modern businesses.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="./contact.php"><button class="btn btn-web">Start Your Project</button></a>
                            <a href="./freeguide.php"><button class="btn btn-outline-light btn-sm">Free Consultation</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="web-icon mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="ri-code-s-slash-line"></i>
                    </div>
                    <h4 class="text-white mb-2">Modern Web Solutions</h4>
                    <p class="text-white-50 small">Responsive, fast, and user-friendly applications</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Web Development Services -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Development Services</h2>
                    <p class="text-muted small">Comprehensive web solutions for every business need</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-web">
                        <div class="web-icon">
                            <i class="ri-smartphone-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Responsive Web Design</h5>
                        <p class="small text-muted mb-2">Mobile-first, responsive websites that work perfectly on all devices and screen sizes.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Mobile-First Design</li>
                            <li><i class="ri-check-line"></i>Cross-Browser Compatibility</li>
                            <li><i class="ri-check-line"></i>Touch-Friendly Interfaces</li>
                            <li><i class="ri-check-line"></i>Performance Optimized</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-web">
                        <div class="web-icon">
                            <i class="ri-shopping-cart-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">E-commerce Solutions</h5>
                        <p class="small text-muted mb-2">Feature-rich online stores with secure payment gateways and inventory management.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Shopping Cart Integration</li>
                            <li><i class="ri-check-line"></i>Payment Gateway Setup</li>
                            <li><i class="ri-check-line"></i>Inventory Management</li>
                            <li><i class="ri-check-line"></i>Order Processing</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-web">
                        <div class="web-icon">
                            <i class="ri-apps-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Web Applications</h5>
                        <p class="small text-muted mb-2">Custom web applications built with modern frameworks and scalable architecture.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Custom Functionality</li>
                            <li><i class="ri-check-line"></i>Database Integration</li>
                            <li><i class="ri-check-line"></i>User Authentication</li>
                            <li><i class="ri-check-line"></i>API Development</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-web">
                        <div class="web-icon">
                            <i class="ri-file-text-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Content Management</h5>
                        <p class="small text-muted mb-2">User-friendly CMS solutions for easy content updates and website management.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>WordPress Development</li>
                            <li><i class="ri-check-line"></i>Custom CMS Solutions</li>
                            <li><i class="ri-check-line"></i>Content Migration</li>
                            <li><i class="ri-check-line"></i>SEO Optimization</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-web">
                        <div class="web-icon">
                            <i class="ri-cloud-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Cloud Integration</h5>
                        <p class="small text-muted mb-2">Cloud-based solutions for scalability, reliability, and performance optimization.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>AWS/Azure Integration</li>
                            <li><i class="ri-check-line"></i>Auto-scaling Solutions</li>
                            <li><i class="ri-check-line"></i>CDN Implementation</li>
                            <li><i class="ri-check-line"></i>Cloud Storage Setup</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-web">
                        <div class="web-icon">
                            <i class="ri-tools-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Maintenance & Support</h5>
                        <p class="small text-muted mb-2">Ongoing website maintenance, updates, and technical support to keep your site running smoothly.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Regular Updates</li>
                            <li><i class="ri-check-line"></i>Security Monitoring</li>
                            <li><i class="ri-check-line"></i>Performance Optimization</li>
                            <li><i class="ri-check-line"></i>24/7 Support</li>
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
                    <p class="text-muted small mb-3">Cutting-edge tools and frameworks for modern web development</p>
                    
                    <div class="tech-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-reactjs-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Frontend Technologies</h6>
                                <p class="small text-muted mb-0">React, Vue.js, Angular, HTML5, CSS3, JavaScript ES6+, TypeScript</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tech-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-server-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Backend Technologies</h6>
                                <p class="small text-muted mb-0">Node.js, Python, PHP, Java, .NET, Ruby on Rails</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tech-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-database-2-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Database Systems</h6>
                                <p class="small text-muted mb-0">MySQL, PostgreSQL, MongoDB, Redis, Firebase</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tech-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-git-branch-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">DevOps & Deployment</h6>
                                <p class="small text-muted mb-0">Docker, Kubernetes, AWS, Azure, CI/CD, Git</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Why Choose Our Development</h3>
                    <p class="text-muted small mb-3">Key advantages of our web development approach</p>
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-speed-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Fast Loading</h6>
                                <p class="small text-muted mb-0">Optimized for speed and performance across all devices.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-search-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">SEO Friendly</h6>
                                <p class="small text-muted mb-0">Built with search engine optimization best practices.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-shield-check-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Secure Code</h6>
                                <p class="small text-muted mb-0">Following security best practices and standards.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-expand-left-right-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Scalable Architecture</h6>
                                <p class="small text-muted mb-0">Built to grow with your business needs.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-palette-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Modern Design</h6>
                                <p class="small text-muted mb-0">Contemporary UI/UX that engages users.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-highlight">
                                <i class="ri-customer-service-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Ongoing Support</h6>
                                <p class="small text-muted mb-0">Continuous maintenance and support services.</p>
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
                        <h3 class="h2 fw-bold mb-1">5+</h3>
                        <p class="small mb-0">Years Experience</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">2 Weeks</h3>
                        <p class="small mb-0">Average Delivery</p>
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
                    <p class="text-muted small">Structured approach to web development projects</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-2">Discovery</h6>
                        <p class="small text-muted">Understanding your requirements, goals, and target audience.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-2">Planning</h6>
                        <p class="small text-muted">Creating wireframes, architecture, and project timeline.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-2">Development</h6>
                        <p class="small text-muted">Coding, testing, and implementing your web solution.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-2">Launch</h6>
                        <p class="small text-muted">Deployment, testing, and ongoing support and maintenance.</p>
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
                    <h2 class="h4 fw-bold text-gradient mb-1">Development Packages</h2>
                    <p class="text-muted small">Choose the perfect solution for your web development needs</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="pricing-card">
                        <h5 class="h6 fw-bold mb-2">Starter Website</h5>
                        <div class="h3 fw-bold text-primary mb-2">$1,299<span class="small text-muted">/project</span></div>
                        <p class="small text-muted mb-3">Perfect for small businesses and personal websites</p>
                        <ul class="list-unstyled feature-list mb-3">
                            <li><i class="ri-check-line"></i>Up to 5 Custom Pages</li>
                            <li><i class="ri-check-line"></i>Responsive Design</li>
                            <li><i class="ri-check-line"></i>Basic SEO Setup</li>
                            <li><i class="ri-check-line"></i>Contact Form Integration</li>
                            <li><i class="ri-check-line"></i>3 Months Free Support</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-web w-100">Get Started</button></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-card featured">
                        <div class="badge bg-primary mb-2 small">Most Popular</div>
                        <h5 class="h6 fw-bold mb-2">Business Website</h5>
                        <div class="h3 fw-bold text-primary mb-2">$2,999<span class="small text-muted">/project</span></div>
                        <p class="small text-muted mb-3">Comprehensive solution for growing businesses</p>
                        <ul class="list-unstyled feature-list mb-3">
                            <li><i class="ri-check-line"></i>Up to 15 Custom Pages</li>
                            <li><i class="ri-check-line"></i>Advanced Responsive Design</li>
                            <li><i class="ri-check-line"></i>CMS Integration</li>
                            <li><i class="ri-check-line"></i>E-commerce Functionality</li>
                            <li><i class="ri-check-line"></i>SEO Optimization</li>
                            <li><i class="ri-check-line"></i>6 Months Support</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-web w-100">Get Started</button></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-card">
                        <h5 class="h6 fw-bold mb-2">Enterprise Solution</h5>
                        <div class="h3 fw-bold text-primary mb-2">$5,999<span class="small text-muted">/project</span></div>
                        <p class="small text-muted mb-3">Custom web applications for large organizations</p>
                        <ul class="list-unstyled feature-list mb-3">
                            <li><i class="ri-check-line"></i>Unlimited Custom Pages</li>
                            <li><i class="ri-check-line"></i>Custom Web Applications</li>
                            <li><i class="ri-check-line"></i>API Development</li>
                            <li><i class="ri-check-line"></i>Database Design</li>
                            <li><i class="ri-check-line"></i>Performance Optimization</li>
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
                    <p class="text-muted small">Tailored web solutions for various business sectors</p>
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
                        <i class="ri-shopping-cart-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">E-commerce</p>
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
                        <i class="ri-building-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Real Estate</p>
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
                        <i class="ri-briefcase-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Consulting</p>
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
                        <i class="ri-community-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Non-Profit</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-movie-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Entertainment</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-pulse-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Fitness</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
 include "components/footer.php";
?>