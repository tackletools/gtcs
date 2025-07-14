<?php
$current_page = 'businessanalytics';
 include "components/header.php";
?>
    
    <style>
        /* Custom styles for Business Analytics page */
        .analytics-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 55vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .analytics-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,200 1000,1000 0,800"/></svg>');
            pointer-events: none;
        }
        
        .analytics-hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1rem;
            display: inline-block;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            color: white;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffd700;
            display: block;
            margin-bottom: 0.5rem;
        }
        
        .analytics-section {
            padding: 2rem 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            color: #6b7280;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .service-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #f1f5f9;
            position: relative;
            overflow: hidden;
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .service-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 1.8rem;
        }
        
        .service-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1e293b;
        }
        
        .service-description {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
        }
        
        .feature-list li {
            padding: 0.5rem 0;
            position: relative;
            padding-left: 1.5rem;
            color: #475569;
        }
        
        .feature-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #10b981;
            font-weight: bold;
        }
        
        .process-timeline {
            position: relative;
            padding: 1rem 0;
        }
        
        .timeline-item {
            display: flex;
            align-items: center;
            margin-bottom: 3rem;
            position: relative;
        }
        
        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }
        
        .timeline-content {
            flex: 1;
            padding: 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin: 0 2rem;
        }
        
        .timeline-number {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            flex-shrink: 0;
        }
        
        .timeline-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1e293b;
        }
        
        .timeline-description {
            color: #64748b;
            line-height: 1.6;
        }
        
        .tech-stack {
            background: #f8fafc;
            /*padding: 2rem 0;*/
        }
        
        .tech-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .tech-item {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .tech-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .tech-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }
        
        .cta-section {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            padding: 4rem 0;
            color: white;
            text-align: center;
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
            color: white;
        }
        
        .btn-secondary-custom {
            background: transparent;
            border: 2px solid white;
            padding: 1rem 2rem;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-secondary-custom:hover {
            background: white;
            color: #1e293b;
        }
        
        @media (max-width: 768px) {
            .analytics-hero {
                min-height: 60vh;
                text-align: center;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .service-grid {
                grid-template-columns: 1fr;
            }
            
            .timeline-item {
                flex-direction: column !important;
            }
            
            .timeline-content {
                margin: 1rem 0;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="analytics-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="analytics-hero-content">
                        <div class="hero-badge">
                            <i class="fas fa-chart-line me-2"></i>
                            Enterprise Analytics Solutions
                        </div>
                        <h1 class="hero-title">Transform Your Business with Advanced Analytics</h1>
                        <p class="hero-subtitle">
                            Unlock the power of your data with our comprehensive business analytics and intelligence solutions. 
                            Make data-driven decisions, predict trends, and drive growth with cutting-edge analytics technology.
                        </p>
                        <div class="mt-4">
                            <a href="#services" class="btn btn-primary-custom me-3">
                                <i class="fas fa-rocket me-2"></i>Get Started
                            </a>
                            <a href="contact.php" class="btn btn-secondary-custom">
                                <i class="fas fa-phone me-2"></i>Schedule Demo
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <span class="stat-number">500+</span>
                            <div class="stat-label">Projects Delivered</div>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">98%</span>
                            <div class="stat-label">Client Satisfaction</div>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">24/7</span>
                            <div class="stat-label">Support Available</div>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">15+</span>
                            <div class="stat-label">Years Experience</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="analytics-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Analytics Services</h2>
                <p class="section-subtitle">
                    Comprehensive business analytics solutions tailored to your enterprise needs
                </p>
            </div>
            
            <div class="service-grid">
            
               <div class="row">
        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3 class="service-title">Business Intelligence</h3>
                <p class="service-description">
                    Transform raw data into actionable insights with our comprehensive BI solutions. 
                    Create interactive dashboards and reports that drive strategic decision-making.
                </p>
                <ul class="feature-list">
                    <li>Interactive Dashboards</li>
                    <li>Real-time Reporting</li>
                    <li>Data Visualization</li>
                    <li>KPI Monitoring</li>
                    <li>Executive Reporting</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <h3 class="service-title">Predictive Analytics</h3>
                <p class="service-description">
                    Leverage machine learning and AI to forecast trends, identify opportunities, 
                    and mitigate risks before they impact your business.
                </p>
                <ul class="feature-list">
                    <li>Demand Forecasting</li>
                    <li>Risk Assessment</li>
                    <li>Customer Behavior Analysis</li>
                    <li>Market Trend Prediction</li>
                    <li>Inventory Optimization</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3 class="service-title">Data Warehousing</h3>
                <p class="service-description">
                    Build scalable data warehouses that consolidate information from multiple sources, 
                    ensuring data quality and accessibility across your organization.
                </p>
                <ul class="feature-list">
                    <li>Data Integration</li>
                    <li>ETL Processes</li>
                    <li>Data Quality Management</li>
                    <li>Cloud Data Solutions</li>
                    <li>Data Governance</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="service-title">Customer Analytics</h3>
                <p class="service-description">
                    Understand your customers better with advanced analytics that reveal behavior patterns, 
                    preferences, and lifetime value insights.
                </p>
                <ul class="feature-list">
                    <li>Customer Segmentation</li>
                    <li>Churn Analysis</li>
                    <li>Lifetime Value Modeling</li>
                    <li>Personalization Engine</li>
                    <li>Campaign Optimization</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="service-title">Operational Analytics</h3>
                <p class="service-description">
                    Optimize your operations with real-time analytics that monitor performance, 
                    identify bottlenecks, and streamline processes.
                </p>
                <ul class="feature-list">
                    <li>Process Optimization</li>
                    <li>Performance Monitoring</li>
                    <li>Supply Chain Analytics</li>
                    <li>Quality Control</li>
                    <li>Resource Allocation</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h3 class="service-title">Financial Analytics</h3>
                <p class="service-description">
                    Gain financial insights with advanced analytics that help you manage budgets, 
                    forecast revenue, and optimize profitability.
                </p>
                <ul class="feature-list">
                    <li>Revenue Forecasting</li>
                    <li>Budget Planning</li>
                    <li>Profitability Analysis</li>
                    <li>Cost Optimization</li>
                    <li>Financial Reporting</li>
                </ul>
            </div>
        </div>
    </div>
            </div>
        </div>
    </section>

    <!-- Process Timeline -->
    <section class="analytics-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Analytics Process</h2>
                <p class="section-subtitle">
                    A systematic approach to deliver maximum value from your data
                </p>
            </div>
            
            <div class="process-timeline">
                <div class="timeline-item">
                    <div class="timeline-number">1</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Discovery & Assessment</h3>
                        <p class="timeline-description">
                            We start by understanding your business objectives, current data landscape, 
                            and analytics requirements. Our team conducts a comprehensive assessment 
                            to identify opportunities and challenges.
                        </p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-number">2</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Data Strategy & Architecture</h3>
                        <p class="timeline-description">
                            We design a robust data architecture that aligns with your business goals. 
                            This includes data modeling, integration strategies, and technology stack selection 
                            to ensure scalability and performance.
                        </p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-number">3</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Implementation & Development</h3>
                        <p class="timeline-description">
                            Our expert team implements the analytics solution using industry best practices. 
                            We build dashboards, reports, and analytics models while ensuring data quality 
                            and security throughout the process.
                        </p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-number">4</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Training & Deployment</h3>
                        <p class="timeline-description">
                            We provide comprehensive training to your team and ensure smooth deployment. 
                            Our support includes user adoption strategies and change management to maximize 
                            the value of your analytics investment.
                        </p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-number">5</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Optimization & Support</h3>
                        <p class="timeline-description">
                            We continuously monitor and optimize your analytics solutions for peak performance. 
                            Our ongoing support ensures your system evolves with your business needs and 
                            leverages new analytics capabilities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology Stack -->
    <section class="tech-stack mb-5">
        <div class="containe-fluid">
            <div class="section-header">
                <h2 class="section-title">Our Technology Stack</h2>
                <p class="section-subtitle">
                    Cutting-edge tools and platforms for enterprise-grade analytics solutions
                </p>
            </div>
            
            <div class="tech-grid">
                <div class="tech-item">
                    <div class="tech-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Power BI</h4>
                    <p>Microsoft's business analytics solution</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <h4>Tableau</h4>
                    <p>Leading data visualization platform</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">
                        <i class="fab fa-python"></i>
                    </div>
                    <h4>Python</h4>
                    <p>Advanced analytics and ML</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h4>SQL Server</h4>
                    <p>Enterprise database solutions</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">
                        <i class="fab fa-aws"></i>
                    </div>
                    <h4>AWS</h4>
                    <p>Cloud analytics services</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h4>Machine Learning</h4>
                    <p>AI-powered insights</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h4>Azure</h4>
                    <p>Microsoft cloud platform</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h4>Qlik Sense</h4>
                    <p>Self-service analytics</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section mb-4">
        <div class="container">
            <h2 class="cta-title">Ready to Transform Your Business?</h2>
            <p class="cta-subtitle">
                Let's discuss how our business analytics solutions can drive your success
            </p>
            <div class="cta-buttons">
                <a href="contact.php" class="btn-primary-custom">
                    <i class="fas fa-rocket me-2"></i>Start Your Project
                </a>
                <a href="contact.php" class="btn-secondary-custom">
                    <i class="fas fa-calendar me-2"></i>Schedule Consultation
                </a>
            </div>
        </div>
    </section>
   
    <!-- Custom JavaScript -->
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Intersection Observer for animations
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

        // Observe all service cards and timeline items
        document.querySelectorAll('.service-card, .timeline-item, .tech-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });

        // Back to top button
        const backToTopBtn = document.querySelector('.back-to-top');
        if (backToTopBtn) {
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.add('visible');
                } else {
                    backToTopBtn.classList.remove('visible');
                }
            });
        }
    </script>


<?php 
 include "components/footer.php";
?>