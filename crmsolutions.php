<?php
$current_page = 'crmsolutions';
include 'components/header.php';
?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .gradient-bg-1 { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .gradient-bg-2 { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .gradient-bg-3 { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .gradient-bg-4 { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
        .gradient-bg-5 { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
        .gradient-bg-6 { background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); }
        .gradient-bg-7 { background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); }
        .gradient-bg-8 { background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%); }
        .headingly{
             background: linear-gradient(135deg, #4facfe 75%, #00f2fe 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .shiv-hero-section { min-height: 350px; }
        .section-padding { padding: 3rem 0; }
        .feature-icon { width: 60px; height: 60px; font-size: 1.5rem; }
        .dashboard-img { height: 200px; object-fit: cover; transition: transform 0.3s ease; }
        .dashboard-img:hover { transform: scale(1.05); }
        .text-gradient { background: linear-gradient(45deg, #f093fb, #f5576c); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .chart-container { position: relative; height: 300px; margin-bottom: 2rem; }
        .analytics-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .metric-card { transition: all 0.3s ease; }
        .metric-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    </style>

<!-- Hero Section -->
<section class="shiv-hero-section gradient-bg-1 d-flex align-items-center text-white">
    <div class="container-fluid px-2">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-4 fw-bold mb-3">
                    Transform Your Business with 
                    <span class="text-gradient">Smart CRM Solutions</span>
                </h1>
                <p class="lead mb-4">
                    Streamline customer relationships, boost sales performance, and drive growth with cutting-edge CRM platforms designed for modern businesses.
                </p>
                <div class="d-flex flex-column flex-md-row gap-3">
                    <a href="./freeguide.php"><button class="btn btn-light btn-lg px-4">
                        <i class="fas fa-rocket me-2"></i>Start Free Trial
                    </button></a>
                    <a href="./contact.php"><button class="btn btn-outline-light btn-lg px-4">
                        <i class="fas fa-play me-2"></i>Get in Touch
                    </button></a>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="enterprise-hero-image fade-in-up">
                    <img src="https://img.freepik.com/free-vector/isometric-crm-illustration_52683-83950.jpg" alt="Enterprise Solutions" style="height:250px;"class="img-fluid rounded-3">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How Our CRM Solution Works -->
<section class="section-padding">
    <div class="container-fluid">
        <div class="text-center mb-5">
            <h2 class="fw-bold headingly">How Our CRM Solution Transforms Your Business</h2>
            <p class="text-muted">Discover the power of intelligent customer relationship management</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="feature-icon gradient-bg-2 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <h5 class="card-title text-center">Lead Tracking Excellence</h5>
                        <p class="card-text text-muted">
                            Our CRM captures every lead from multiple sources - website forms, social media, email campaigns, and phone calls. 
                            Track lead behavior, score prospects automatically, and never miss a follow-up opportunity. 
                            With real-time notifications and automated workflows, you'll convert more leads into customers.
                        </p>
                        <ul class="list-unstyled small text-muted">
                            <li><i class="fas fa-check text-success me-2"></i>Multi-channel lead capture</li>
                            <li><i class="fas fa-check text-success me-2"></i>Automated lead scoring</li>
                            <li><i class="fas fa-check text-success me-2"></i>Real-time notifications</li>
                            <li><i class="fas fa-check text-success me-2"></i>Lead journey mapping</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="feature-icon gradient-bg-3 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-chart-line text-white"></i>
                        </div>
                        <h5 class="card-title text-center">Sales Management Mastery</h5>
                        <p class="card-text text-muted">
                            Streamline your entire sales process with visual pipeline management, automated follow-ups, and intelligent deal forecasting. 
                            Track sales activities, manage team performance, and accelerate deal closure with data-driven insights and customizable workflows.
                        </p>
                        <ul class="list-unstyled small text-muted">
                            <li><i class="fas fa-check text-success me-2"></i>Visual sales pipeline</li>
                            <li><i class="fas fa-check text-success me-2"></i>Automated task management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Deal forecasting</li>
                            <li><i class="fas fa-check text-success me-2"></i>Performance tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="feature-icon gradient-bg-4 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-chart-bar text-white"></i>
                        </div>
                        <h5 class="card-title text-center">Advanced Analytics & Insights</h5>
                        <p class="card-text text-muted">
                            Make informed decisions with comprehensive analytics dashboards, custom reports, and predictive insights. 
                            Monitor key metrics, identify trends, and optimize your sales strategy with actionable business intelligence that drives growth.
                        </p>
                        <ul class="list-unstyled small text-muted">
                            <li><i class="fas fa-check text-success me-2"></i>Real-time dashboards</li>
                            <li><i class="fas fa-check text-success me-2"></i>Custom reporting</li>
                            <li><i class="fas fa-check text-success me-2"></i>Predictive analytics</li>
                            <li><i class="fas fa-check text-success me-2"></i>Performance metrics</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Analytics Dashboard Section -->
<section class="section-padding bg-light">
    <div class="container-fluid px-2">
        <div class="text-center mb-5">
            <h2 class="fw-bold headingly">Real-Time Analytics Dashboard</h2>
            <p class="text-muted">Monitor your business performance with interactive charts and insights</p>
        </div>
        
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="card metric-card border-0 shadow-sm analytics-card text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-2x mb-3"></i>
                        <h3 class="fw-bold">1,247</h3>
                        <p class="mb-0">Active Leads</p>
                        <small class="opacity-75">+12% this month</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card metric-card border-0 shadow-sm gradient-bg-2 text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-handshake fa-2x mb-3"></i>
                        <h3 class="fw-bold">89</h3>
                        <p class="mb-0">Deals Closed</p>
                        <small class="opacity-75">+23% this month</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card metric-card border-0 shadow-sm gradient-bg-3 text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-dollar-sign fa-2x mb-3"></i>
                        <h3 class="fw-bold">$245K</h3>
                        <p class="mb-0">Revenue</p>
                        <small class="opacity-75">+31% this month</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card metric-card border-0 shadow-sm gradient-bg-4 text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-percentage fa-2x mb-3"></i>
                        <h3 class="fw-bold">68%</h3>
                        <p class="mb-0">Conversion Rate</p>
                        <small class="opacity-75">+5% this month</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-line text-primary me-2"></i>Sales Performance
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-funnel-dollar text-success me-2"></i>Lead Conversion Funnel
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="funnelChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular CRM Dashboards Section -->
<section class="section-padding">
    <div class="container-fluid px-2">
        <div class="text-center mb-5">
            <h2 class="fw-bold headingly">Popular CRM Dashboards</h2>
            <p class="text-muted">Explore leading CRM platforms and their powerful features</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="Salesforce Dashboard">
                    <div class="card-body">
                        <h5 class="card-title">Salesforce CRM</h5>
                        <p class="card-text text-muted small">Industry-leading CRM for sales automation, lead management, and customer insights.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Enterprise Sales</small>
                            <a href="https://www.salesforce.com" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="HubSpot Dashboard">
                    <div class="card-body">
                        <h5 class="card-title">HubSpot CRM</h5>
                        <p class="card-text text-muted small">Free CRM with marketing automation, sales pipeline, and customer service tools.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Small Business</small>
                            <a href="https://www.hubspot.com" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="Pipedrive Dashboard">
                    <div class="card-body">
                        <h5 class="card-title">Pipedrive CRM</h5>
                        <p class="card-text text-muted small">Visual sales pipeline management with activity-based selling methodology.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Sales Teams</small>
                            <a href="https://www.pipedrive.com" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="Zoho Dashboard">
                    <div class="card-body">
                        <h5 class="card-title">Zoho CRM</h5>
                        <p class="card-text text-muted small">Comprehensive CRM with AI-powered sales insights and workflow automation.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Mid-Market</small>
                            <a href="https://www.zoho.com/crm/" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="Microsoft Dynamics">
                    <div class="card-body">
                        <h5 class="card-title">Microsoft Dynamics</h5>
                        <p class="card-text text-muted small">Integrated CRM solution with Office 365 and advanced business intelligence.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Enterprise</small>
                            <a href="https://dynamics.microsoft.com" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="Freshsales Dashboard">
                    <div class="card-body">
                        <h5 class="card-title">Freshsales CRM</h5>
                        <p class="card-text text-muted small">User-friendly CRM with built-in phone, email, and advanced reporting features.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Growing Teams</small>
                            <a href="https://www.freshworks.com/crm/" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CRM Benefits Section -->
<section class="section-padding bg-light">
    <div class="container-fluid px-2">
        <div class="text-center mb-5">
            <h2 class="fw-bold headingly">Why Your Business Needs a CRM System</h2>
            <p class="text-muted">Discover how CRM solutions revolutionize business operations</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-2 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-chart-line text-white"></i>
                        </div>
                        <h5 class="card-title">Sales Management</h5>
                        <p class="card-text text-muted">Track leads, manage pipeline, automate follow-ups, and close deals faster with intelligent sales insights.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-3 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <h5 class="card-title">Lead Tracking</h5>
                        <p class="card-text text-muted">Monitor lead sources, track customer journeys, and optimize conversion rates with advanced analytics.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-4 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-building text-white"></i>
                        </div>
                        <h5 class="card-title">Business Management</h5>
                        <p class="card-text text-muted">Centralize customer data, automate workflows, and improve team collaboration across departments.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-5 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-bullhorn text-white"></i>
                        </div>
                        <h5 class="card-title">Marketing Automation</h5>
                        <p class="card-text text-muted">Create targeted campaigns, nurture leads automatically, and measure marketing ROI effectively.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-6 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-headset text-white"></i>
                        </div>
                        <h5 class="card-title">Customer Support</h5>
                        <p class="card-text text-muted">Provide exceptional service with ticketing systems, knowledge bases, and customer satisfaction tracking.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-7 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-chart-bar text-white"></i>
                        </div>
                        <h5 class="card-title">Analytics & Reporting</h5>
                        <p class="card-text text-muted">Make data-driven decisions with comprehensive dashboards, custom reports, and business intelligence.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section-padding gradient-bg-1 text-white">
    <div class="container-fluid px-2">
        <div class="text-center mb-5">
            <h2 class="fw-bold">CRM Impact on Business Performance</h2>
            <p class="opacity-75">Statistics show the transformative power of CRM systems</p>
        </div>
        
        <div class="row g-4 text-center">
            <div class="col-lg-3 col-md-6">
                <div class="card bg-transparent border-light">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-white">41%</h3>
                        <p class="text-white-50">Sales Revenue Increase</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-transparent border-light">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-white">47%</h3>
                        <p class="text-white-50">Customer Retention</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-transparent border-light">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-white">27%</h3>
                        <p class="text-white-50">Lead Conversion Rate</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-transparent border-light">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-white">300%</h3>
                        <p class="text-white-50">ROI on CRM Investment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Implementation Process -->
<section class="section-padding">
    <div class="container-fluid px-2">
        <div class="text-center mb-5">
            <h2 class="fw-bold headingly">CRM Implementation Process</h2>
            <p class="text-muted">Simple steps to get your CRM up and running</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                            <strong>1</strong>
                        </div>
                        <h5 class="card-title">Analysis</h5>
                        <p class="card-text text-muted small">Assess current processes and identify requirements</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                            <strong>2</strong>
                        </div>
                        <h5 class="card-title">Setup</h5>
                        <p class="card-text text-muted small">Configure CRM system to match your workflow</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                            <strong>3</strong>
                        </div>
                        <h5 class="card-title">Migration</h5>
                        <p class="card-text text-muted small">Import existing data and integrate with tools</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                            <strong>4</strong>
                        </div>
                        <h5 class="card-title">Training</h5>
                        <p class="card-text text-muted small">Train team and provide ongoing support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding gradient-bg-8">
    <div class="container-fluid px-2">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Ready to Transform Your Business?</h2>
                <p class="lead mb-4">Join thousands of companies using CRM to boost sales and improve customer relationships.</p>
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                    <a href="./freeguide.php"><button class="btn btn-dark btn-lg px-4">
                        <i class="fas fa-rocket me-2"></i>Start Free Trial
                    </button></a>
                    <a href="./contact.php"><button class="btn btn-outline-dark btn-lg px-4">
                        <i class="fas fa-phone me-2"></i>Schedule Demo
                    </button></a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Sales Performance Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Sales Revenue ($K)',
                data: [65, 78, 90, 81, 96, 115],
                borderColor: '#667eea',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Lead Conversion Funnel Chart
    const funnelCtx = document.getElementById('funnelChart').getContext('2d');
    new Chart(funnelCtx, {
        type: 'doughnut',
        data: {
            labels: ['Leads', 'Qualified', 'Proposal', 'Closed'],
            datasets: [{
                data: [1247, 847, 456, 289],
                backgroundColor: ['#f093fb', '#4facfe', '#43e97b', '#fa709a']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

<?php 
include "components/footer.php";
?>