<?php 
$current_page = 'cybersecurity'; 
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
        
        .hero-cyber {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }
        
        .hero-cyber::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="%23ffffff05" cx="200" cy="200" r="100"/><circle fill="%23ffffff03" cx="800" cy="400" r="150"/><circle fill="%23ffffff05" cx="400" cy="700" r="80"/></svg>');
            pointer-events: none;
        }
        
        .cyber-icon {
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
        
        .service-card-cyber {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .service-card-cyber:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }
        
        .threat-card {
            background: linear-gradient(135deg, #ff6b6b20 0%, #ee5a2420 100%);
            border: 1px solid #ff6b6b30;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .threat-card:hover {
            background: linear-gradient(135deg, #ff6b6b30 0%, #ee5a2430 100%);
            transform: translateX(4px);
        }
        
        .protection-feature {
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
        
        .pricing-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .pricing-card.featured {
            border-color: var(--primary-color);
            transform: scale(1.02);
        }
        
        .pricing-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.15);
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
        
        .bg-cyber-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-cyber {
            background: var(--gradient-security);
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-cyber:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
            color: white;
        }
        
        .btn-outline-cyber {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-cyber:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }
        
        @media (max-width: 768px) {
            .section-spacing {
                padding: 1rem 0;
            }
            
            .hero-cyber {
                padding: 1.5rem 0;
            }
            
            .cyber-icon{
                margin-top: 25px;
            }
            
            .service-card-cyber {
                padding: 1rem;
                margin-bottom: 1rem;
            }
        }
        .industry-card {
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            background: white;
        }
        
        .industry-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-cyber">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-white">
                        <h1 class="display-6 fw-bold mb-2">Cyber Security Services</h1>
                        <p class="lead mb-3 fs-6">Protect your digital assets with our comprehensive cybersecurity solutions. Advanced threat detection, prevention, and incident response.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="./contact.php"><button class="btn btn-cyber">Get Protected Now</button></a>
                            <a href="./freeguide.php"><button class="btn btn-outline-light btn-sm">Free Security Audit</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="cyber-icon mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="ri-shield-check-line"></i>
                    </div>
                    <h4 class="text-white mb-2" style="text-decoration:none; color:white">24/7 Security Monitoring</h4>
                    <p class="text-white-50 small">Advanced AI-powered threat detection and response</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Services -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Security Services</h2>
                    <p class="text-muted small">Comprehensive protection for your digital infrastructure</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-cyber">
                        <div class="cyber-icon">
                            <i class="ri-shield-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Network Security</h5>
                        <p class="small text-muted mb-2">Firewall management, intrusion detection, and network monitoring to prevent unauthorized access.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Advanced Firewall Configuration</li>
                            <li><i class="ri-check-line"></i>Intrusion Detection Systems</li>
                            <li><i class="ri-check-line"></i>Network Traffic Analysis</li>
                            <li><i class="ri-check-line"></i>VPN Setup & Management</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-cyber">
                        <div class="cyber-icon">
                            <i class="ri-bug-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Vulnerability Assessment</h5>
                        <p class="small text-muted mb-2">Comprehensive security audits to identify and fix potential vulnerabilities in your systems.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Penetration Testing</li>
                            <li><i class="ri-check-line"></i>Code Security Review</li>
                            <li><i class="ri-check-line"></i>Infrastructure Scanning</li>
                            <li><i class="ri-check-line"></i>Compliance Assessment</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-cyber">
                        <div class="cyber-icon">
                            <i class="ri-eye-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Security Monitoring</h5>
                        <p class="small text-muted mb-2">24/7 monitoring and real-time threat detection with immediate incident response.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Real-time Monitoring</li>
                            <li><i class="ri-check-line"></i>Threat Intelligence</li>
                            <li><i class="ri-check-line"></i>Incident Response</li>
                            <li><i class="ri-check-line"></i>Security Analytics</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-cyber">
                        <div class="cyber-icon">
                            <i class="ri-database-2-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Data Protection</h5>
                        <p class="small text-muted mb-2">Advanced encryption, backup solutions, and data loss prevention strategies.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Data Encryption</li>
                            <li><i class="ri-check-line"></i>Backup & Recovery</li>
                            <li><i class="ri-check-line"></i>DLP Solutions</li>
                            <li><i class="ri-check-line"></i>Access Control</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-cyber">
                        <div class="cyber-icon">
                            <i class="ri-mail-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Email Security</h5>
                        <p class="small text-muted mb-2">Anti-phishing, spam filtering, and email encryption to secure communications.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Anti-Phishing Protection</li>
                            <li><i class="ri-check-line"></i>Email Encryption</li>
                            <li><i class="ri-check-line"></i>Spam Filtering</li>
                            <li><i class="ri-check-line"></i>Email Archiving</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-cyber">
                        <div class="cyber-icon">
                            <i class="ri-graduation-cap-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Security Training</h5>
                        <p class="small text-muted mb-2">Employee education and awareness programs to prevent social engineering attacks.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Security Awareness Training</li>
                            <li><i class="ri-check-line"></i>Phishing Simulation</li>
                            <li><i class="ri-check-line"></i>Policy Development</li>
                            <li><i class="ri-check-line"></i>Compliance Training</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Threat Landscape -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Common Cyber Threats</h3>
                    <p class="text-muted small mb-3">Understanding the threats is the first step to protection</p>
                    
                    <div class="threat-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-virus-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Malware & Ransomware</h6>
                                <p class="small text-muted mb-0">Malicious software designed to damage or gain unauthorized access to systems.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="threat-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-file-shield-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Phishing Attacks</h6>
                                <p class="small text-muted mb-0">Deceptive attempts to steal sensitive information through fake communications.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="threat-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-user-unfollow-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Insider Threats</h6>
                                <p class="small text-muted mb-0">Security risks from people within the organization who have authorized access.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="threat-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-server-line text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">DDoS Attacks</h6>
                                <p class="small text-muted mb-0">Overwhelming systems with traffic to make services unavailable to users.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Our Protection Features</h3>
                    <p class="text-muted small mb-3">Multi-layered security approach for comprehensive protection</p>
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="protection-feature">
                                <i class="ri-shield-check-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Real-time Protection</h6>
                                <p class="small text-muted mb-0">Continuous monitoring and instant threat response.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="protection-feature">
                                <i class="ri-ai-generate text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">AI-Powered Detection</h6>
                                <p class="small text-muted mb-0">Machine learning algorithms for advanced threat detection.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="protection-feature">
                                <i class="ri-cloud-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Cloud Security</h6>
                                <p class="small text-muted mb-0">Secure cloud infrastructure and data protection.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="protection-feature">
                                <i class="ri-smartphone-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Mobile Security</h6>
                                <p class="small text-muted mb-0">Comprehensive mobile device and app security.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="protection-feature">
                                <i class="ri-lock-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Zero Trust Architecture</h6>
                                <p class="small text-muted mb-0">Never trust, always verify security model.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="protection-feature">
                                <i class="ri-file-shield-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Compliance Ready</h6>
                                <p class="small text-muted mb-0">Meet industry standards and regulations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Stats -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">99.9%</h3>
                        <p class="small mb-0">Uptime Guarantee</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">24/7</h3>
                        <p class="small mb-0">Security Monitoring</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">500+</h3>
                        <p class="small mb-0">Protected Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">&lt;5min</h3>
                        <p class="small mb-0">Incident Response</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Process -->
    <section class="section-spacing">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Security Process</h2>
                    <p class="text-muted small">Systematic approach to cybersecurity implementation</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-2">Assessment</h6>
                        <p class="small text-muted">Comprehensive security audit and risk assessment of your infrastructure.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-2">Strategy</h6>
                        <p class="small text-muted">Custom security strategy development based on your specific needs.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-2">Implementation</h6>
                        <p class="small text-muted">Deploy security solutions with minimal disruption to operations.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-2">Monitoring</h6>
                        <p class="small text-muted">Continuous monitoring and regular updates to maintain security.</p>
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
                <h2 class="h4 fw-bold text-gradient mb-1">Security Packages</h2>
                <p class="text-muted small">Choose the right protection level for your business</p>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-4">
                <div class="pricing-card">
                    <h5 class="h6 fw-bold mb-2">Basic Protection</h5>
                    <div class="h3 fw-bold text-primary mb-2">$299<span class="small text-muted">/month</span></div>
                    <p class="small text-muted mb-3">Essential security for small businesses</p>
                    <ul class="list-unstyled feature-list mb-3">
                        <li><i class="ri-check-line"></i>Basic Firewall Management</li>
                        <li><i class="ri-check-line"></i>Email Security</li>
                        <li><i class="ri-check-line"></i>Anti-malware Protection</li>
                        <li><i class="ri-check-line"></i>Monthly Security Reports</li>
                        <li><i class="ri-check-line"></i>Business Hours Support</li>
                    </ul>
                    <a href="./contact.php" class="btn btn-outline-cyber w-100" style="text-decoration: none;">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pricing-card featured">
                    <div class="badge bg-primary mb-2 small">Most Popular</div>
                    <h5 class="h6 fw-bold mb-2">Advanced Security</h5>
                    <div class="h3 fw-bold text-primary mb-2">$599<span class="small text-muted">/month</span></div>
                    <p class="small text-muted mb-3">Comprehensive protection for growing businesses</p>
                    <ul class="list-unstyled feature-list mb-3">
                        <li><i class="ri-check-line"></i>Advanced Threat Detection</li>
                        <li><i class="ri-check-line"></i>24/7 Security Monitoring</li>
                        <li><i class="ri-check-line"></i>Vulnerability Scanning</li>
                        <li><i class="ri-check-line"></i>Incident Response</li>
                        <li><i class="ri-check-line"></i>Security Training</li>
                        <li><i class="ri-check-line"></i>Weekly Reports</li>
                    </ul>
                    <a href="./contact.php" class="btn btn-cyber w-100" style="text-decoration: none; color: white;">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pricing-card">
                    <h5 class="h6 fw-bold mb-2">Enterprise Shield</h5>
                    <div class="h3 fw-bold text-primary mb-2">$999<span class="small text-muted">/month</span></div>
                    <p class="small text-muted mb-3">Maximum security for large organizations</p>
                    <ul class="list-unstyled feature-list mb-3">
                        <li><i class="ri-check-line"></i>AI-Powered Threat Intelligence</li>
                        <li><i class="ri-check-line"></i>Zero Trust Architecture</li>
                        <li><i class="ri-check-line"></i>Penetration Testing</li>
                        <li><i class="ri-check-line"></i>Compliance Management</li>
                        <li><i class="ri-check-line"></i>Dedicated Security Team</li>
                        <li><i class="ri-check-line"></i>Real-time Reporting</li>
                    </ul>
                    <a href="./contact.php" class="btn btn-outline-cyber w-100" style="text-decoration: none;">Contact Sales</a>
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
                    <h2 class="h4 fw-bold text-gradient mb-2">Industries We Protect</h2>
                    <p class="text-muted small">Specialized security solutions for various sectors</p>
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
                        <i class="ri-government-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Government</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-shopping-cart-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Retail</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-building-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Corporate</p>
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
                        <i class="ri-restaurant-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Hospitality</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-truck-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Logistics</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-home-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Residential</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-ancient-gate-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Manufacturing</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-server-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Technology</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
 include "components/footer.php";
?>