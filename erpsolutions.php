<?php
$current_page = 'erpsolutions';
include 'components/header.php';
?>

<style>
    .gradient-bg-1 { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .gradient-bg-2 { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .gradient-bg-3 { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
    .gradient-bg-4 { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
    .gradient-bg-5 { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
    .gradient-bg-6 { background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); }
    .gradient-bg-7 { background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); }
    .gradient-bg-8 { background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%); }
    .gradient-bg-9 { background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%); }
    .gradient-bg-10 { background: linear-gradient(135deg, #d299c2 0%, #fef9d7 100%); }
    
    .shiv-hero-section { min-height: 350px; padding:0;margin:0; }
    .section-padding { padding: 2rem 0; }
    .feature-icon { width: 60px; height: 60px; font-size: 1.5rem; }
    .dashboard-img { height: 200px; object-fit: cover; transition: transform 0.3s ease; }
    .dashboard-img:hover { transform: scale(1.05); }
    .text-gradient { background: linear-gradient(45deg, #43e97b, #38f9d7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .highlight-box { border-left: 4px solid #43e97b; background: linear-gradient(45deg, rgba(67, 233, 123, 0.1), rgba(56, 249, 215, 0.1)); }
    .integration-icon { width: 80px; height: 80px; font-size: 2rem; }
</style>

<!-- Hero Section -->
<section class="shiv-hero-section gradient-bg-1 d-flex align-items-center text-white">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">
                    Unify Your Business with 
                    <span class="text-gradient">Complete ERP Solutions</span>
                </h1>
                <p class="lead mb-4">
                    Integrate all your business processes into one powerful platform. From finance to inventory, HR to manufacturing - manage everything seamlessly.
                </p>
                <div class="d-flex flex-column flex-md-row gap-3">
                    <a href="#" onclick="window.location='freeguide.php'" class="btn btn-light btn-lg px-4">
    <i class="fas fa-rocket me-2"></i>Start Free Trial
</a>
<a href="#" onclick="window.location='contact.php'" class="btn btn-outline-light btn-lg px-4">
    <i class="fas fa-play me-2"></i>Get in Touch
</a>

                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="enterprise-hero-image fade-in-up">
                    <img src="https://img.freepik.com/free-vector/erp-infographic_23-2149371098.jpg" alt="Enterprise Solutions" style="height:250px;"class="img-fluid rounded-3">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Highlighted Solution Section -->
<section class="section-padding bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="highlight-box p-4 rounded-3 mb-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h3 class="fw-bold text-primary mb-3">
                                <i class="fas fa-lightbulb me-2"></i>
                                One Platform, Endless Possibilities
                            </h3>
                            <p class="lead mb-3">
                                Our ERP solutions eliminate data silos and streamline operations by connecting every aspect of your business into a single, unified system.
                            </p>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Real-time data synchronization</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Automated workflow management</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Centralized reporting & analytics</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Seamless integration capabilities</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center">
                            <div class="integration-icon gradient-bg-4 rounded-circle d-flex align-items-center justify-content-center mx-auto">
                                <i class="fas fa-cogs text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular ERP Systems Section -->
<section class="section-padding">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Leading ERP Platforms</h2>
            <p class="text-muted">Discover powerful ERP systems that transform business operations</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="SAP ERP Dashboard">
                    <div class="card-body">
                        <h5 class="card-title">SAP ERP</h5>
                        <p class="card-text text-muted small">Comprehensive enterprise resource planning with advanced analytics and global scalability.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Large Enterprises</small>
                            <a href="https://www.sap.com" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="Oracle ERP Dashboard">
                    <div class="card-body">
                        <h5 class="card-title">Oracle ERP Cloud</h5>
                        <p class="card-text text-muted small">Cloud-based ERP with AI-powered insights and comprehensive financial management.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Mid to Large Business</small>
                            <a href="https://www.oracle.com/erp/" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="Microsoft Dynamics 365">
                    <div class="card-body">
                        <h5 class="card-title">Microsoft Dynamics 365</h5>
                        <p class="card-text text-muted small">Integrated business applications combining ERP and CRM with Office 365 integration.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Microsoft Ecosystem</small>
                            <a href="https://dynamics.microsoft.com" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="NetSuite ERP">
                    <div class="card-body">
                        <h5 class="card-title">NetSuite ERP</h5>
                        <p class="card-text text-muted small">Cloud-native ERP with built-in business intelligence and e-commerce capabilities.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Growing Companies</small>
                            <a href="https://www.netsuite.com" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="Workday ERP">
                    <div class="card-body">
                        <h5 class="card-title">Workday</h5>
                        <p class="card-text text-muted small">Human capital management and financial management in a unified cloud platform.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: HR & Finance Focus</small>
                            <a href="https://www.workday.com" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=300&fit=crop" 
                         class="card-img-top dashboard-img" alt="Odoo ERP">
                    <div class="card-body">
                        <h5 class="card-title">Odoo ERP</h5>
                        <p class="card-text text-muted small">Open-source ERP suite with modular applications for all business needs.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success">Best for: Small to Medium Business</small>
                            <a href="https://www.odoo.com" target="_blank" class="btn btn-sm btn-outline-primary">
                                Visit <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ERP Modules Section -->
<section class="section-padding bg-light">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Complete Business Management Modules</h2>
            <p class="text-muted">Manage every aspect of your business from a single integrated platform</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-2 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-calculator text-white"></i>
                        </div>
                        <h5 class="card-title">Financial Management</h5>
                        <p class="card-text text-muted">Comprehensive accounting, budgeting, and financial reporting with real-time insights.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-3 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-boxes text-white"></i>
                        </div>
                        <h5 class="card-title">Inventory Management</h5>
                        <p class="card-text text-muted">Track stock levels, manage warehouses, and optimize supply chain operations.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-4 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-users-cog text-white"></i>
                        </div>
                        <h5 class="card-title">Human Resources</h5>
                        <p class="card-text text-muted">Employee management, payroll processing, and performance tracking in one place.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-5 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-industry text-white"></i>
                        </div>
                        <h5 class="card-title">Manufacturing</h5>
                        <p class="card-text text-muted">Production planning, quality control, and manufacturing resource optimization.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-6 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-truck text-white"></i>
                        </div>
                        <h5 class="card-title">Supply Chain</h5>
                        <p class="card-text text-muted">Procurement, vendor management, and logistics coordination across operations.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon gradient-bg-7 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-chart-pie text-white"></i>
                        </div>
                        <h5 class="card-title">Business Intelligence</h5>
                        <p class="card-text text-muted">Advanced analytics, custom dashboards, and data-driven decision making tools.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Integration Benefits Section -->
<section class="section-padding">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Why Choose Integrated ERP Solutions?</h2>
            <p class="text-muted">Experience the power of unified business management</p>
        </div>
        
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="highlight-box p-4 rounded-3">
                    <h4 class="fw-bold text-primary mb-3">
                        <i class="fas fa-sync-alt me-2"></i>
                        Seamless Data Flow
                    </h4>
                    <p class="mb-3">
                        Eliminate manual data entry and reduce errors with automatic synchronization across all business functions. When a sale is made, inventory adjusts, accounting updates, and reporting reflects changes instantly.
                    </p>
                    <div class="row g-2">
                        <div class="col-6">
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>Real-time updates
                            </small>
                        </div>
                        <div class="col-6">
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>Data accuracy
                            </small>
                        </div>
                        <div class="col-6">
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>Reduced errors
                            </small>
                        </div>
                        <div class="col-6">
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>Time savings
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="highlight-box p-4 rounded-3">
                    <h4 class="fw-bold text-primary mb-3">
                        <i class="fas fa-eye me-2"></i>
                        Complete Visibility
                    </h4>
                    <p class="mb-3">
                        Get a 360-degree view of your business operations with centralized dashboards and comprehensive reporting. Make informed decisions with access to real-time data from all departments.
                    </p>
                    <div class="row g-2">
                        <div class="col-6">
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>Unified dashboard
                            </small>
                        </div>
                        <div class="col-6">
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>Custom reports
                            </small>
                        </div>
                        <div class="col-6">
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>KPI tracking
                            </small>
                        </div>
                        <div class="col-6">
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>Performance metrics
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section-padding gradient-bg-9 text-white">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 class="fw-bold">ERP Impact on Business Efficiency</h2>
            <p class="opacity-75">Measurable improvements with integrated ERP systems</p>
        </div>
        
        <div class="row g-4 text-center">
            <div class="col-lg-3 col-md-6">
                <div class="card bg-transparent border-light">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-white">53%</h3>
                        <p class="text-white-50">Operational Efficiency</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-transparent border-light">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-white">95%</h3>
                        <p class="text-white-50">Data Accuracy</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-transparent border-light">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-white">68%</h3>
                        <p class="text-white-50">Cost Reduction</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-transparent border-light">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-white">45%</h3>
                        <p class="text-white-50">Faster Decision Making</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Implementation Process -->
<section class="section-padding bg-light">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 class="fw-bold">ERP Implementation Journey</h2>
            <p class="text-muted">Structured approach to successful ERP deployment</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                            <strong>1</strong>
                        </div>
                        <h5 class="card-title">Discovery</h5>
                        <p class="card-text text-muted small">Analyze current processes and define ERP requirements</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                            <strong>2</strong>
                        </div>
                        <h5 class="card-title">Configuration</h5>
                        <p class="card-text text-muted small">Customize ERP modules to match business workflows</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                            <strong>3</strong>
                        </div>
                        <h5 class="card-title">Integration</h5>
                        <p class="card-text text-muted small">Connect existing systems and migrate data securely</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                            <strong>4</strong>
                        </div>
                        <h5 class="card-title">Go-Live</h5>
                        <p class="card-text text-muted small">Deploy system with comprehensive training and support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding gradient-bg-10">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Ready to Unify Your Business Operations?</h2>
                <p class="lead mb-4">Transform your business with comprehensive ERP solutions that connect every department and streamline all processes.</p>
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                    <button class="btn btn-dark btn-lg px-4" href="#" onclick="window.location='freeguide.php'">
                        <i class="fas fa-rocket me-2"></i>Start Free Trial
                    </button>
                    <button class="btn btn-outline-dark btn-lg px-4" href="#" onclick="window.location='contact.php'">
                        <i class="fas fa-phone me-2"></i>Get Consultation
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Add smooth scrolling and basic interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add click handlers for CTA buttons
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.textContent.includes('Trial') || this.textContent.includes('Demo') || this.textContent.includes('Consultation')) {
                e.preventDefault();
                console.log('ERP CTA clicked:', this.textContent.trim());
                // Add your form/demo logic here
            }
        });
    });
    
    // Add hover effects to cards
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Add animation to highlight boxes
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease-out';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.highlight-box').forEach(box => {
        observer.observe(box);
    });
});

// Add CSS animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);
</script>

<?php include 'components/footer.php'; ?>