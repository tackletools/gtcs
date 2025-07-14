<?php
$current_page = 'devopsservices';
 include "components/header.php";
?>

<style>
    /* DevOps Services Specific Styles */
    .devops-hero-section {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 80px 0;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .devops-hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle cx="200" cy="200" r="100" fill="%23ffffff08"/><circle cx="800" cy="300" r="150" fill="%23ffffff05"/><circle cx="400" cy="700" r="80" fill="%23ffffff08"/></svg>');
        pointer-events: none;
    }
    
    .devops-services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .devops-service-card {
        background: white;
        border-radius: 15px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .devops-service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
    }
    
    .devops-service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .devops-icon {
        width: 70px;
        height: 70px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        margin-bottom: 1.5rem;
        background: var(--gradient-primary);
    }
    
    .devops-stats-section {
        background: #f8fafc;
        padding: 10px 0;
    }
    
    .devops-stat-card {
        text-align: center;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }
    
    .devops-stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: var(--primary-color);
        display: block;
        margin-bottom: 0.5rem;
    }
    
 .devops-process-section {
    padding: 20px 0;
    background-color: #fff;
}

.devops-process-horizontal {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    gap: 2rem;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 20px;
    position: relative;
}

.devops-process-step {
    min-width: 240px;
    background: #f9f9f9;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    padding: 2rem 1.5rem;
    text-align: center;
    position: relative;
}

.devops-process-number {
    width: 50px;
    height: 50px;
    background: var(--primary-color, #007bff);
    color: #fff;
    font-weight: bold;
    font-size: 1.2rem;
    border-radius: 50%;
    margin: 0 auto 1rem auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.arrow {
    font-size: 2rem;
    color: var(--primary-color, #007bff);
    flex-shrink: 0;
}

@media (max-width: 768px) {
    .devops-process-horizontal {
        flex-direction: column;
        align-items: flex-start;
    }

    .arrow {
        transform: rotate(90deg);
        align-self: center;
    }
}

    .devops-tools-section {
        background: var(--dark-color);
        padding: 20px 0;
        color: white;
    }
    
    .devops-tools-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .devops-tool-card {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .devops-tool-card:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-5px);
    }
    
    .devops-tool-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--accent-color);
    }
    
    .devops-benefits-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 20px 0;
        color: white;
    }
    
    .devops-benefit-card {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    
    
    
    
    
    
    .devops-cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(99, 102, 241, 0.4);
        color: white;
    }
    
    .devops-cta-button
    
    .devops-cta-button.secondary:hover {
        background: var(--primary-color);
        color: white;
    }
    
    @media (max-width: 768px) {
        .devops-hero-section {
            padding: 60px 0;
        }
        
        .devops-services-grid {
            grid-template-columns: 1fr;
        }
        
        .devops-process-timeline::before {
            left: 2rem;
        }
        
        .devops-process-item {
            flex-direction: column !important;
            text-align: center;
        }
        
        .devops-process-item:nth-child(even) {
            flex-direction: column !important;
        }
        
        .devops-process-number {
            left: 2rem;
            position: relative;
            margin-bottom: 1rem;
        }
        
        .devops-process-content {
            margin: 0;
        }
        
        .devops-tools-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }
        
        
    }
</style>

<!-- Hero Section -->
<section class="devops-hero-section">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Enterprise DevOps Services</h1>
                <p class="lead mb-4">Accelerate your digital transformation with our comprehensive DevOps solutions. We streamline development, deployment, and operations to deliver faster, more reliable software releases.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="freeguide.php" class="btn btn-light btn-lg">Explore Services</a>
                    <a href="contact.php" class="btn btn-outline-light btn-lg">Get Consultation</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <i class="fas fa-cogs" style="font-size: 15rem; opacity: 0.1;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DevOps Services Section -->
<section id="services" class="py-5">
    <div class="container-fluid">
        <div class="text-center mb-5">
            <h2 class="section-title">Our DevOps Services</h2>
            <p class="section-subtitle">Comprehensive solutions to optimize your development lifecycle</p>
        </div>
        
        <div class="devops-services-grid">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="devops-service-card">
                        <div class="devops-icon">
                            <i class="fas fa-infinity"></i>
                        </div>
                        <h4>CI/CD Pipeline</h4>
                        <p>Automate your development workflow with robust continuous integration and deployment pipelines that ensure faster, more reliable releases.</p>
                        <ul class="list-unstyled mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Automated Testing</li>
                            <li><i class="fas fa-check text-success me-2"></i>Code Quality Gates</li>
                            <li><i class="fas fa-check text-success me-2"></i>Deployment Automation</li>
                            <li><i class="fas fa-check text-success me-2"></i>Rollback Strategies</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="devops-service-card">
                        <div class="devops-icon">
                            <i class="fas fa-cloud"></i>
                        </div>
                        <h4>Cloud Migration</h4>
                        <p>Seamlessly migrate your applications to the cloud with our expert guidance and proven methodologies for AWS, Azure, and GCP.</p>
                        <ul class="list-unstyled mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Cloud Strategy</li>
                            <li><i class="fas fa-check text-success me-2"></i>Migration Planning</li>
                            <li><i class="fas fa-check text-success me-2"></i>Security Compliance</li>
                            <li><i class="fas fa-check text-success me-2"></i>Cost Optimization</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="devops-service-card">
                        <div class="devops-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h4>Container Orchestration</h4>
                        <p>Deploy and manage containerized applications at scale using Kubernetes, Docker, and modern orchestration platforms.</p>
                        <ul class="list-unstyled mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Kubernetes Management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Docker Optimization</li>
                            <li><i class="fas fa-check text-success me-2"></i>Service Mesh</li>
                            <li><i class="fas fa-check text-success me-2"></i>Auto-scaling</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="devops-service-card">
                        <div class="devops-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Monitoring & Observability</h4>
                        <p>Gain complete visibility into your systems with advanced monitoring, logging, and alerting solutions.</p>
                        <ul class="list-unstyled mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Real-time Monitoring</li>
                            <li><i class="fas fa-check text-success me-2"></i>Log Management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Performance Metrics</li>
                            <li><i class="fas fa-check text-success me-2"></i>Incident Response</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="devops-service-card">
                        <div class="devops-icon">
                            <i class="fas fa-code-branch"></i>
                        </div>
                        <h4>Infrastructure as Code</h4>
                        <p>Manage your infrastructure through code with tools like Terraform, Ansible, and CloudFormation for consistent, repeatable deployments.</p>
                        <ul class="list-unstyled mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Terraform Automation</li>
                            <li><i class="fas fa-check text-success me-2"></i>Ansible Playbooks</li>
                            <li><i class="fas fa-check text-success me-2"></i>Configuration Management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Version Control</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="devops-service-card">
                        <div class="devops-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Security & Compliance</h4>
                        <p>Integrate security into your DevOps pipeline with DevSecOps practices, ensuring compliance and protecting your applications.</p>
                        <ul class="list-unstyled mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Security Scanning</li>
                            <li><i class="fas fa-check text-success me-2"></i>Vulnerability Assessment</li>
                            <li><i class="fas fa-check text-success me-2"></i>Compliance Monitoring</li>
                            <li><i class="fas fa-check text-success me-2"></i>Access Management</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="devops-stats-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="devops-stat-card">
                    <span class="devops-stat-number">500+</span>
                    <h5>Projects Delivered</h5>
                    <p>Successfully implemented DevOps solutions</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="devops-stat-card">
                    <span class="devops-stat-number">80%</span>
                    <h5>Deployment Speed</h5>
                    <p>Faster deployment cycles achieved</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="devops-stat-card">
                    <span class="devops-stat-number">99.9%</span>
                    <h5>Uptime Guarantee</h5>
                    <p>System availability and reliability</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="devops-stat-card">
                    <span class="devops-stat-number">24/7</span>
                    <h5>Support Available</h5>
                    <p>Round-the-clock monitoring and support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DevOps Process Section -->
<section class="devops-process-section">
  <div class="container-fluid">
    <div class="text-center mb-5">
      <h2 class="section-title">Our DevOps Process</h2>
      <p class="section-subtitle">A proven methodology for successful DevOps implementation</p>
    </div>

    <div class="devops-process-horizontal">
      <div class="devops-process-step">
        <div class="devops-process-number">1</div>
        <div class="devops-process-content">
          <h4>Assessment & Planning</h4>
          <p>We analyze your current infrastructure, identify bottlenecks, and create a tailored DevOps strategy.</p>
        </div>
      </div>

      <div class="arrow">→</div>

      <div class="devops-process-step">
        <div class="devops-process-number">2</div>
        <div class="devops-process-content">
          <h4>Tool Selection & Setup</h4>
          <p>Select the right tools for automation, monitoring, and collaboration tailored to your stack.</p>
        </div>
      </div>

      <div class="arrow">→</div>

      <div class="devops-process-step">
        <div class="devops-process-number">3</div>
        <div class="devops-process-content">
          <h4>CI/CD Implementation</h4>
          <p>Implement CI/CD pipelines for seamless build, test, and deployment automation.</p>
        </div>
      </div>

      <div class="arrow">→</div>

      <div class="devops-process-step">
        <div class="devops-process-number">4</div>
        <div class="devops-process-content">
          <h4>Monitoring & Optimization</h4>
          <p>Set up monitoring and optimize continuously for performance, security, and scalability.</p>
        </div>
      </div>

      <div class="arrow">→</div>

      <div class="devops-process-step">
        <div class="devops-process-number">5</div>
        <div class="devops-process-content">
          <h4>Training & Support</h4>
          <p>Provide expert training and long-term support for DevOps maturity and success.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- DevOps Tools Section -->
<section class="devops-tools-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-white">DevOps Tools & Technologies</h2>
            <p class="section-subtitle text-white-50">We work with industry-leading tools and platforms</p>
        </div>
        
        <div class="devops-tools-grid">
            <div class="row">
                <div class="col-md-3">
                    <div class="devops-tool-card">
                        <div class="devops-tool-icon">
                            <i class="fab fa-jenkins"></i>
                        </div>
                        <h5>Jenkins</h5>
                        <p>Automation Server</p>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="devops-tool-card">
                        <div class="devops-tool-icon">
                            <i class="fab fa-docker"></i>
                        </div>
                        <h5>Docker</h5>
                        <p>Containerization</p>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="devops-tool-card">
                        <div class="devops-tool-icon">
                            <i class="fas fa-dharmachakra"></i>
                        </div>
                        <h5>Kubernetes</h5>
                        <p>Orchestration</p>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="devops-tool-card">
                        <div class="devops-tool-icon">
                            <i class="fab fa-aws"></i>
                        </div>
                        <h5>AWS</h5>
                        <p>Cloud Platform</p>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="devops-tool-card">
                        <div class="devops-tool-icon">
                            <i class="fab fa-git-alt"></i>
                        </div>
                        <h5>Git</h5>
                        <p>Version Control</p>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="devops-tool-card">
                        <div class="devops-tool-icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <h5>Terraform</h5>
                        <p>Infrastructure as Code</p>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="devops-tool-card">
                        <div class="devops-tool-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h5>Ansible</h5>
                        <p>Configuration Management</p>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="devops-tool-card">
                        <div class="devops-tool-icon">
                            <i class="fas fa-chart-area"></i>
                        </div>
                        <h5>Grafana</h5>
                        <p>Monitoring &amp; Visualization</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="devops-benefits-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class=" text-white">Benefits of Our DevOps Services</h2>
            <p class="section-subtitle text-white-50">Transform your development and operations with proven results</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="devops-benefit-card">
                    <i class="fas fa-rocket fa-2x mb-3"></i>
                    <h4>Faster Time to Market</h4>
                    <p>Reduce deployment cycles from weeks to hours with automated pipelines and streamlined processes.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="devops-benefit-card">
                    <i class="fas fa-bug fa-2x mb-3"></i>
                    <h4>Higher Quality Software</h4>
                    <p>Catch issues early with automated testing and continuous integration, reducing bugs in production.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="devops-benefit-card">
                    <i class="fas fa-dollar-sign fa-2x mb-3"></i>
                    <h4>Cost Optimization</h4>
                    <p>Reduce operational costs through automation, efficient resource utilization, and optimized workflows.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="devops-benefit-card">
                    <i class="fas fa-users fa-2x mb-3"></i>
                    <h4>Enhanced Collaboration</h4>
                    <p>Break down silos between development and operations teams with improved communication and shared goals.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="devops-benefit-card">
                    <i class="fas fa-expand-arrows-alt fa-2x mb-3"></i>
                    <h4>Improved Scalability</h4>
                    <p>Handle increased workloads seamlessly with cloud-native architectures and automated scaling.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="devops-benefit-card">
                    <i class="fas fa-shield-alt fa-2x mb-3"></i>
                    <h4>Enhanced Security</h4>
                    <p>Integrate security practices throughout the development lifecycle with DevSecOps methodologies.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Back to Top Button -->
<button class="back-to-top" id="backToTop">
    <i class="fas fa-arrow-up"></i>
</button>



<?php 
 include "components/footer.php";
?>
