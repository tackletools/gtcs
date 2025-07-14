<?php
$current_page = 'retaildevelopment';
 include "components/header.php";
?>

<style>
    .retail-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 80px 0;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .retail-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,300 1000,1000 0,700"/></svg>');
        pointer-events: none;
    }
    
    .retail-hero-content {
        position: relative;
        z-index: 2;
    }
    
    .retail-stats {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 30px;
        margin-top: 40px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .stat-item {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #fff;
        display: block;
        margin-bottom: 5px;
    }
    
    .stat-label {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.8);
    }
    
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 4px;
    }
    
    .service-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0;
        height: 100%;
    }
    
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }
    
    .service-icon {
        width: 70px;
        height: 70px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        margin-bottom: 20px;
        background: var(--gradient-primary);
    }
    
    .service-title {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #1a1a1a;
    }
    
    .service-description {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    .service-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .service-features li {
        padding: 5px 0;
        color: #555;
        position: relative;
        padding-left: 25px;
    }
    
    .service-features li:before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: bold;
    }
    
    .tech-stack {
        background: #f8fafc;
        padding: 60px 0;
    }
    
    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }
    
    .tech-item {
        background: white;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .tech-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .tech-icon {
        font-size: 2.5rem;
        margin-bottom: 10px;
        color: var(--primary-color);
    }
    
    .tech-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: #333;
    }
    
    .process-section {
        padding: 30px 0;
        background: white;
    }
    
    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }
    
    .process-step {
        text-align: center;
        padding: 30px 20px;
        position: relative;
    }
    
    .step-number {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--gradient-primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 auto 20px;
    }
    
    .step-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #1a1a1a;
    }
    
    .step-description {
        color: #666;
        line-height: 1.6;
    }
    
    .cta-section {
        background: var(--gradient-primary);
        padding: 30px 0;
        color: white;
        text-align: center;
    }
    
    .cta-button {
        background: white;
        color: var(--primary-color);
        padding: 15px 40px;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        margin-top: 20px;
        transition: all 0.3s ease;
    }
    
    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        color: var(--primary-color);
    }
    
    .portfolio-section {
        padding: 30px 0;
        background: #f8fafc;
    }
    
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }
    
    .portfolio-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .portfolio-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }
    
    .portfolio-image {
        height: 200px;
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
    }
    
    .portfolio-content {
        padding: 25px;
    }
    
    .portfolio-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #1a1a1a;
    }
    
    .portfolio-description {
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    
    .portfolio-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    
    .portfolio-tag {
        background: #e8f0ff;
        color: var(--primary-color);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    @media (max-width: 768px) {
        .retail-hero {
            padding: 60px 0;
        }
        
        .services-grid,
        .tech-grid,
        .process-steps,
        .portfolio-grid {
            grid-template-columns: 1fr;
        }
        
        .retail-stats {
            padding: 20px;
        }
        
        .service-card {
            padding: 20px;
        }
    }
</style>

<!-- Hero Section -->
<section class="retail-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="retail-hero-content">
                    <h1 class="mb-3">Retail Development Solutions</h1>
                    <p class="lead mb-4">Transform your retail business with cutting-edge e-commerce platforms, POS systems, and omnichannel solutions that drive sales and enhance customer experience.</p>
                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <span class="badge bg-light text-dark px-3 py-2">E-Commerce Development</span>
                        <span class="badge bg-light text-dark px-3 py-2">POS Systems</span>
                        <span class="badge bg-light text-dark px-3 py-2">Inventory Management</span>
                        <span class="badge bg-light text-dark px-3 py-2">Customer Analytics</span>
                    </div>
                    <a href="contact.php" class="btn btn-light btn-lg px-4"> <i class="fas fa-phone me-2"></i>Get Free Consultation</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="retail-stats">
                    <div class="row">
                        <div class="col-4">
                            <div class="stat-item">
                                <span class="stat-number">500+</span>
                                <span class="stat-label">Retail Projects</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <span class="stat-number">98%</span>
                                <span class="stat-label">Client Satisfaction</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-3">
    <div class="container">
        <div class="text-center mb-3">
            <h2 class="section-title">Our Retail Development Services</h2>
            <p class="section-subtitle">Comprehensive retail solutions to boost your business growth</p>
        </div>
        
        <div class="services-grid">
            <div class="row">
        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3 class="service-title">E-Commerce Development</h3>
                <p class="service-description">Build powerful online stores with advanced features and seamless user experience.</p>
                <ul class="service-features">
                    <li>Custom E-Commerce Platforms</li>
                    <li>Mobile-Responsive Design</li>
                    <li>Payment Gateway Integration</li>
                    <li>Multi-vendor Support</li>
                    <li>Advanced Search & Filtering</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cash-register"></i>
                </div>
                <h3 class="service-title">POS Systems</h3>
                <p class="service-description">Modern point-of-sale solutions for seamless in-store transactions and inventory management.</p>
                <ul class="service-features">
                    <li>Cloud-Based POS</li>
                    <li>Inventory Tracking</li>
                    <li>Sales Analytics</li>
                    <li>Staff Management</li>
                    <li>Multi-Location Support</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-warehouse"></i>
                </div>
                <h3 class="service-title">Inventory Management</h3>
                <p class="service-description">Streamline your inventory with real-time tracking and automated reordering systems.</p>
                <ul class="service-features">
                    <li>Real-Time Stock Tracking</li>
                    <li>Automated Reordering</li>
                    <li>Barcode Scanning</li>
                    <li>Supplier Management</li>
                    <li>Demand Forecasting</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="service-title">Customer Analytics</h3>
                <p class="service-description">Gain valuable insights into customer behavior and preferences to drive sales.</p>
                <ul class="service-features">
                    <li>Customer Segmentation</li>
                    <li>Purchase Analytics</li>
                    <li>Loyalty Programs</li>
                    <li>Personalized Recommendations</li>
                    <li>Marketing Automation</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="service-title">Mobile Apps</h3>
                <p class="service-description">Engage customers with feature-rich mobile applications for iOS and Android.</p>
                <ul class="service-features">
                    <li>Native Mobile Apps</li>
                    <li>Push Notifications</li>
                    <li>In-App Purchases</li>
                    <li>Offline Functionality</li>
                    <li>Social Media Integration</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="service-title">Business Intelligence</h3>
                <p class="service-description">Make data-driven decisions with comprehensive business intelligence solutions.</p>
                <ul class="service-features">
                    <li>Sales Dashboards</li>
                    <li>Performance Metrics</li>
                    <li>Trend Analysis</li>
                    <li>Custom Reports</li>
                    <li>Predictive Analytics</li>
                </ul>
            </div>
        </div>
    </div>
        </div>
    </div>
</section>

<!-- Technology Stack -->
<section class="tech-stack">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Technology Stack</h2>
            <p class="section-subtitle">We use cutting-edge technologies to build robust retail solutions</p>
        </div>
        
        <div class="tech-grid">
            <div class="tech-item">
                <div class="tech-icon">
                    <i class="fab fa-react"></i>
                </div>
                <div class="tech-name">React.js</div>
            </div>
            <div class="tech-item">
                <div class="tech-icon">
                    <i class="fab fa-node-js"></i>
                </div>
                <div class="tech-name">Node.js</div>
            </div>
            <div class="tech-item">
                <div class="tech-icon">
                    <i class="fab fa-python"></i>
                </div>
                <div class="tech-name">Python</div>
            </div>
            <div class="tech-item">
                <div class="tech-icon">
                    <i class="fab fa-shopify"></i>
                </div>
                <div class="tech-name">Shopify</div>
            </div>
            <div class="tech-item">
                <div class="tech-icon">
                    <i class="fab fa-magento"></i>
                </div>
                <div class="tech-name">Magento</div>
            </div>
            <div class="tech-item">
                <div class="tech-icon">
                    <i class="fab fa-wordpress"></i>
                </div>
                <div class="tech-name">WooCommerce</div>
            </div>
            <div class="tech-item">
                <div class="tech-icon">
                    <i class="fab fa-aws"></i>
                </div>
                <div class="tech-name">AWS</div>
            </div>
            <div class="tech-item">
                <div class="tech-icon">
                    <i class="fas fa-database"></i>
                </div>
                <div class="tech-name">MongoDB</div>
            </div>
        </div>
    </div>
</section>

<!-- Development Process -->
<section class="process-section">
    <div class="container">
        <div class="text-center mb-3">
            <h2 class="section-title">Our Development Process</h2>
            <p class="section-subtitle">A proven methodology that ensures project success</p>
        </div>
        
        <div class="process-steps">
            <div class="process-step">
                <div class="step-number">1</div>
                <h3 class="step-title">Discovery & Planning</h3>
                <p class="step-description">We analyze your business requirements and create a comprehensive project roadmap.</p>
            </div>
            <div class="process-step">
                <div class="step-number">2</div>
                <h3 class="step-title">Design & Prototyping</h3>
                <p class="step-description">Create user-friendly designs and interactive prototypes for your approval.</p>
            </div>
            <div class="process-step">
                <div class="step-number">3</div>
                <h3 class="step-title">Development & Testing</h3>
                <p class="step-description">Build your solution using agile methodology with continuous testing and feedback.</p>
            </div>
            <div class="process-step">
                <div class="step-number">4</div>
                <h3 class="step-title">Launch & Support</h3>
                <p class="step-description">Deploy your solution and provide ongoing support and maintenance.</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Success Stories</h2>
            <p class="section-subtitle">Explore our recent retail development projects</p>
        </div>
        
        <div class="portfolio-grid">
            <div class="portfolio-card">
                <div class="portfolio-image">
                    <img src="https://img.freepik.com/premium-psd/fashion-landing-page-template-with-photo_23-2148961985.jpg" class="img-fluid">
                </div>
                <div class="portfolio-content">
                    <h3 class="portfolio-title">Fashion E-Commerce Platform</h3>
                    <p class="portfolio-description">A comprehensive online fashion store with advanced filtering, wishlist, and social sharing features.</p>
                    <div class="portfolio-tags">
                        <span class="portfolio-tag">React.js</span>
                        <span class="portfolio-tag">Node.js</span>
                        <span class="portfolio-tag">MongoDB</span>
                        <span class="portfolio-tag">Stripe</span>
                    </div>
                </div>
            </div>
            
            <div class="portfolio-card">
                <div class="portfolio-image">
                    <img src="https://img.freepik.com/free-psd/restaurant-landing-page-template_23-2148466849.jpg" class="img-fluid">
                </div>
                <div class="portfolio-content">
                    <h3 class="portfolio-title">Restaurant POS System</h3>
                    <p class="portfolio-description">Modern point-of-sale system with order management, inventory tracking, and analytics dashboard.</p>
                    <div class="portfolio-tags">
                        <span class="portfolio-tag">Vue.js</span>
                        <span class="portfolio-tag">Python</span>
                        <span class="portfolio-tag">PostgreSQL</span>
                        <span class="portfolio-tag">AWS</span>
                    </div>
                </div>
            </div>
            
            <div class="portfolio-card">
                <div class="portfolio-image">
                    <img src="https://img.freepik.com/free-vector/online-grocery-store-app-template_23-2150089553.jpg" class="img-fluid">
                </div>
                <div class="portfolio-content">
                    <h3 class="portfolio-title">Grocery Mobile App</h3>
                    <p class="portfolio-description">Feature-rich mobile app for grocery shopping with real-time delivery tracking and payment integration.</p>
                    <div class="portfolio-tags">
                        <span class="portfolio-tag">React Native</span>
                        <span class="portfolio-tag">Firebase</span>
                        <span class="portfolio-tag">Payment Gateway</span>
                        <span class="portfolio-tag">GPS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section mb-4">
    <div class="container-fluid">
        <div class="text-center">
            <h2 class="mb-3">Ready to Transform Your Retail Business?</h2>
            <p class="lead mb-4">Let's discuss how we can help you build the perfect retail solution for your business needs.</p>
            <a href="contact.php" class="cta-button">Start Your Project Today</a>
        </div>
    </div>
</section>

<script>
// Smooth scrolling for internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Animate cards on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe all cards
document.querySelectorAll('.service-card, .portfolio-card, .process-step').forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'all 0.5s ease';
    observer.observe(card);
});
</script>

<?php 
 include "components/footer.php";
?>