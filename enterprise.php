<?php
$current_page = 'enterprise';
 include "components/header.php";
?>

<style>
    /* Enterprise Page Specific Styles */
    .enterprise-hero {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 60px 0;
        position: relative;
        overflow: hidden;
    }

    .enterprise-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,300 1000,1000 0,700"/></svg>');
        pointer-events: none;
    }

    .enterprise-hero-content {
        position: relative;
        z-index: 2;
    }

    .enterprise-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .enterprise-hero p {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
        max-width: 600px;
    }

    .enterprise-stats {
        background: white;
        padding: 20px 0;
        border-top: 5px solid var(--primary-color);
    }

    .stat-card {
        text-align: center;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        margin-bottom: 2rem;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: var(--primary-color);
        display: block;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 1.1rem;
        color: #6b7280;
        font-weight: 500;
    }

    .solutions-grid {
        padding: 30px 0;
        background: #f8fafc;
    }

    .solution-card {
        background: white;
        border-radius: 20px;
        padding: 3rem 2rem;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .solution-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .solution-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        margin-bottom: 1.5rem;
    }

    .solution-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--dark-color);
    }

    .solution-description {
        color: #6b7280;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    .solution-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .solution-features li {
        padding: 0.5rem 0;
        position: relative;
        padding-left: 2rem;
        color: #374151;
    }

    .solution-features li:before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: bold;
        font-size: 1.2rem;
    }

    .enterprise-cta {
        background: var(--dark-color);
        color: white;
        padding: 100px 0;
        position: relative;
    }

    .enterprise-cta::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff05" points="0,0 1000,200 1000,1000 0,800"/></svg>');
        pointer-events: none;
    }

    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .cta-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: white;
    }

    .cta-description {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 2rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-button {
        background: var(--gradient-primary);
        color: white;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-block;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        color: white;
    }

    .process-section {
        padding: 30px 0;
        background: white;
    }

    .process-step {
        text-align: center;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .process-number {
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
        margin: 0 auto 1rem;
    }

    .process-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--dark-color);
    }

    .process-description {
        color: #6b7280;
        line-height: 1.6;
    }

    .testimonial-section {
        padding: 20px 0;
        background: #f8fafc;
    }

    .testimonial-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        position: relative;
    }

    .testimonial-quote {
        font-size: 1.1rem;
        color: #374151;
        line-height: 1.6;
        margin-bottom: 2rem;
        font-style: italic;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
    }

    .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        font-weight: 700;
        margin-right: 1rem;
    }

    .author-info h6 {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 0.25rem;
    }

    .author-info p {
        color: #6b7280;
        margin: 0;
        font-size: 0.9rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .enterprise-hero h1 {
            font-size: 2.5rem;
        }
        
        .enterprise-hero p {
            font-size: 1rem;
        }
        
        .solution-card {
            padding: 2rem 1.5rem;
        }
        
        .cta-title {
            font-size: 2rem;
        }
        
        .cta-description {
            font-size: 1rem;
        }
    }

    /* Animation classes */
    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }

    .fade-in-up.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<!-- Enterprise Hero Section -->
<section class="enterprise-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="enterprise-hero-content">
                    <h1 class="fade-in-up">Enterprise Solutions That Scale</h1>
                    <p class="fade-in-up">Transform your business with our comprehensive enterprise solutions. We deliver robust, scalable, and secure technology platforms that drive growth and innovation across your organization.</p>
                    <div class="fade-in-up">
                        <a href="#solutions" class="cta-button">Explore Solutions</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="enterprise-hero-image fade-in-up">
                    <img src="https://img.freepik.com/free-photo/standard-quality-control-concept-m_23-2150041861.jpg" alt="Enterprise Solutions" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="enterprise-stats">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card fade-in-up">
                    <span class="stat-number">500+</span>
                    <div class="stat-label">Enterprise Clients</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card fade-in-up">
                    <span class="stat-number">99.9%</span>
                    <div class="stat-label">Uptime Guarantee</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card fade-in-up">
                    <span class="stat-number">24/7</span>
                    <div class="stat-label">Support Available</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card fade-in-up">
                    <span class="stat-number">15+</span>
                    <div class="stat-label">Years Experience</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Solutions Grid Section -->
<section class="solutions-grid" id="solutions">
    <div class="container">
        <div class="row text-center mb-2">
            <div class="col-12">
                <h2 class="section-title fade-in-up">Our Enterprise Solutions</h2>
                <p class="section-subtitle fade-in-up">Comprehensive technology solutions designed for enterprise-scale operations</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="solution-card fade-in-up">
                    <div class="solution-icon" style="background: var(--gradient-primary);">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3 class="solution-title">Enterprise Resource Planning (ERP)</h3>
                    <p class="solution-description">Streamline your business processes with our comprehensive ERP solutions that integrate all departments and functions.</p>
                    <ul class="solution-features">
                        <li>Financial Management</li>
                        <li>Supply Chain Management</li>
                        <li>Human Resources</li>
                        <li>Customer Relationship Management</li>
                        <li>Business Intelligence</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="solution-card fade-in-up">
                    <div class="solution-icon" style="background: var(--gradient-secondary);">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h3 class="solution-title">Customer Relationship Management (CRM)</h3>
                    <p class="solution-description">Build stronger customer relationships with our advanced CRM platform that centralizes customer data and interactions.</p>
                    <ul class="solution-features">
                        <li>Lead Management</li>
                        <li>Sales Pipeline Tracking</li>
                        <li>Customer Service Portal</li>
                        <li>Marketing Automation</li>
                        <li>Analytics & Reporting</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="solution-card fade-in-up">
                    <div class="solution-icon" style="background: var(--gradient-accent);">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h3 class="solution-title">Cloud Infrastructure</h3>
                    <p class="solution-description">Migrate and optimize your IT infrastructure with our secure, scalable cloud solutions that reduce costs and increase flexibility.</p>
                    <ul class="solution-features">
                        <li>Cloud Migration</li>
                        <li>Multi-Cloud Management</li>
                        <li>DevOps Integration</li>
                        <li>Security & Compliance</li>
                        <li>24/7 Monitoring</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="solution-card fade-in-up">
                    <div class="solution-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="solution-title">Business Intelligence & Analytics</h3>
                    <p class="solution-description">Make data-driven decisions with our advanced analytics platform that provides real-time insights and predictive analytics.</p>
                    <ul class="solution-features">
                        <li>Data Visualization</li>
                        <li>Real-time Dashboards</li>
                        <li>Predictive Analytics</li>
                        <li>Custom Reporting</li>
                        <li>Data Integration</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="solution-card fade-in-up">
                    <div class="solution-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="solution-title">Enterprise Security</h3>
                    <p class="solution-description">Protect your business with comprehensive security solutions that safeguard your data, systems, and operations.</p>
                    <ul class="solution-features">
                        <li>Threat Detection</li>
                        <li>Identity Management</li>
                        <li>Data Encryption</li>
                        <li>Compliance Management</li>
                        <li>Security Auditing</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="solution-card fade-in-up">
                    <div class="solution-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3 class="solution-title">Process Automation</h3>
                    <p class="solution-description">Streamline operations and reduce manual work with our intelligent automation solutions that increase efficiency and accuracy.</p>
                    <ul class="solution-features">
                        <li>Workflow Automation</li>
                        <li>Document Processing</li>
                        <li>AI-Powered Insights</li>
                        <li>Integration Capabilities</li>
                        <li>Performance Monitoring</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title fade-in-up">Our Implementation Process</h2>
                <p class="section-subtitle fade-in-up">A proven methodology to ensure successful enterprise solution deployment</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="process-step fade-in-up">
                    <div class="process-number">1</div>
                    <h4 class="process-title">Discovery & Analysis</h4>
                    <p class="process-description">We analyze your current systems, identify pain points, and understand your business requirements to create a tailored solution strategy.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step fade-in-up">
                    <div class="process-number">2</div>
                    <h4 class="process-title">Solution Design</h4>
                    <p class="process-description">Our experts design a comprehensive solution architecture that aligns with your business goals and technical requirements.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step fade-in-up">
                    <div class="process-number">3</div>
                    <h4 class="process-title">Implementation</h4>
                    <p class="process-description">We deploy your solution with minimal disruption to your operations, ensuring seamless integration with existing systems.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step fade-in-up">
                    <div class="process-number">4</div>
                    <h4 class="process-title">Support & Optimization</h4>
                    <p class="process-description">Ongoing support, monitoring, and optimization to ensure your solution continues to deliver maximum value.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonial-section">
    <div class="container">
        <div class="row text-center mb-1">
            <div class="col-12">
                <h2 class="section-title fade-in-up">What Our Clients Say</h2>
                <p class="section-subtitle fade-in-up">Success stories from enterprise clients who transformed their business with our solutions</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="testimonial-card fade-in-up">
                    <p class="testimonial-quote">"GTCS transformed our operations with their ERP solution. We've seen a 40% increase in efficiency and significant cost savings across all departments."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">JD</div>
                        <div class="author-info">
                            <h6>John Doe</h6>
                            <p>CEO, Tech Corp</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="testimonial-card fade-in-up">
                    <p class="testimonial-quote">"The cloud migration was seamless, and the ongoing support has been exceptional. Our system performance has improved dramatically."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SM</div>
                        <div class="author-info">
                            <h6>Sarah Miller</h6>
                            <p>CTO, Global Industries</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="testimonial-card fade-in-up">
                    <p class="testimonial-quote">"Their business intelligence platform has revolutionized how we make decisions. The insights we get are invaluable for our strategic planning."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">RJ</div>
                        <div class="author-info">
                            <h6>Robert Johnson</h6>
                            <p>VP Strategy, Enterprise Solutions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="enterprise-cta mb-4">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title fade-in-up">Ready to Transform Your Enterprise?</h2>
            <p class="cta-description fade-in-up">Let's discuss how our enterprise solutions can drive your business forward. Get a free consultation with our experts.</p>
            <div class="fade-in-up">
                <a href="contact.php" class="cta-button">Get Free Consultation</a>
            </div>
        </div>
    </div>
</section>

<script>
// Scroll animations
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in-up').forEach(el => {
        observer.observe(el);
    });
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>

<?php 
 include "components/footer.php";
?>