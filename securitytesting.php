<?php
$current_page = 'securitytesting';
include "components/header.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Testing Services | Application & Infrastructure Security</title>
    
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #f59e0b;
            --accent-color: #06b6d4;
            --dark-color: #0f172a;
            --light-color: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-security: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.4;
            overflow-x: hidden;
            font-size: 13px;
        }
        
        .page-hero {
            background: var(--gradient-security);
            color: white;
            padding: 2rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .page-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,200 1000,1000 0,800"/></svg>');
            pointer-events: none;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 1rem;
        }
        
        .hero-breadcrumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 0.3rem 0.8rem;
            font-size: 0.75rem;
            display: inline-block;
        }
        
        .section-compact {
            padding: 2rem 0;
        }
        
        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: var(--dark-color);
        }
        
        .section-subtitle {
            font-size: 0.8rem;
            color: #6b7280;
            margin-bottom: 1.5rem;
        }
        
        .card-compact {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            padding: 1.2rem;
            background: white;
        }
        
        .card-compact:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        
        .service-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: white;
            margin-bottom: 0.8rem;
        }
        
        .service-icon.security {
            background: var(--gradient-security);
        }
        
        .service-icon.penetration {
            background: var(--gradient-primary);
        }
        
        .service-icon.vulnerability {
            background: var(--gradient-secondary);
        }
        
        .service-icon.compliance {
            background: var(--gradient-accent);
        }
        
        .service-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }
        
        .service-description {
            font-size: 0.8rem;
            color: #6b7280;
            margin-bottom: 0.8rem;
        }
        
        .service-list {
            list-style: none;
            padding: 0;
        }
        
        .service-list li {
            padding: 0.2rem 0;
            color: #6b7280;
            position: relative;
            padding-left: 1rem;
            font-size: 0.75rem;
        }
        
        .service-list li:before {
            content: '•';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: bold;
        }
        
        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        
        .feature-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-security);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.8rem;
            font-size: 1.2rem;
            color: white;
        }
        
        .feature-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }
        
        .feature-description {
            font-size: 0.75rem;
            color: #6b7280;
        }
        
        .process-step {
            background: white;
            border-radius: 10px;
            padding: 1.2rem;
            text-align: center;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 1rem;
        }
        
        .step-number {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 30px;
            background: var(--gradient-security);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
        }
        
        .step-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            margin-top: 0.5rem;
        }
        
        .step-description {
            font-size: 0.75rem;
            color: #6b7280;
        }
        
        .stats-card {
            background: var(--gradient-security);
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            color: white;
            margin-bottom: 1rem;
        }
        
        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            display: block;
            margin-bottom: 0.3rem;
        }
        
        .stat-label {
            font-size: 0.8rem;
            opacity: 0.9;
        }
        
        .cta-section {
            background: var(--gradient-primary);
            color: white;
            padding: 2rem 0;
            text-align: center;
        }
        
        .cta-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .cta-subtitle {
            font-size: 0.85rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }
        
        .btn-cta {
            background: white;
            color: var(--primary-color);
            border: none;
            padding: 0.6rem 1.8rem;
            font-weight: 500;
            border-radius: 25px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            color: var(--primary-color);
        }
        
        .tech-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        
        .tech-badge {
            background: var(--light-color);
            color: var(--dark-color);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 500;
            border: 1px solid #e5e7eb;
        }
        
        .methodology-card {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 4px solid var(--primary-color);
        }
        
        .methodology-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }
        
        .methodology-description {
            font-size: 0.8rem;
            color: #6b7280;
            margin-bottom: 0.8rem;
        }
        
        .methodology-features {
            list-style: none;
            padding: 0;
        }
        
        .methodology-features li {
            padding: 0.2rem 0;
            color: #6b7280;
            position: relative;
            padding-left: 1rem;
            font-size: 0.75rem;
        }
        
        .methodology-features li:before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: bold;
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 1.5rem;
            }
            
            .section-compact {
                padding: 1.5rem 0;
            }
            
            .card-compact {
                margin-bottom: 1rem;
            }
            
            .process-step {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <div class="hero-breadcrumb">
                            <i class="ri-home-line"></i> Home > Solutions > Security Testing
                        </div>
                        <h1 class="hero-title">Security Testing Services</h1>
                        <p class="hero-subtitle">Comprehensive security testing services to identify vulnerabilities in your applications and infrastructure, ensuring robust protection against cyber threats.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="hero-image">
                        <i class="ri-shield-check-line" style="font-size: 6rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="section-compact bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-title">Our Security Testing Services</h2>
                    <p class="section-subtitle">Comprehensive security assessment solutions to protect your digital assets</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card-compact">
                        <div class="service-icon security">
                            <i class="ri-shield-line"></i>
                        </div>
                        <h5 class="service-title">Application Security Testing</h5>
                        <p class="service-description">Identify vulnerabilities in web and mobile applications</p>
                        <ul class="service-list">
                            <li>OWASP Top 10 Testing</li>
                            <li>SQL Injection Testing</li>
                            <li>XSS Vulnerability Testing</li>
                            <li>Authentication Testing</li>
                            <li>Authorization Testing</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card-compact">
                        <div class="service-icon penetration">
                            <i class="ri-sword-line"></i>
                        </div>
                        <h5 class="service-title">Penetration Testing</h5>
                        <p class="service-description">Simulate real-world attacks to test your defenses</p>
                        <ul class="service-list">
                            <li>Network Penetration Testing</li>
                            <li>Web App Penetration Testing</li>
                            <li>Mobile App Penetration Testing</li>
                            <li>Social Engineering Testing</li>
                            <li>Wireless Security Testing</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card-compact">
                        <div class="service-icon vulnerability">
                            <i class="ri-search-eye-line"></i>
                        </div>
                        <h5 class="service-title">Vulnerability Assessment</h5>
                        <p class="service-description">Systematic identification of security weaknesses</p>
                        <ul class="service-list">
                            <li>Automated Vulnerability Scanning</li>
                            <li>Manual Security Testing</li>
                            <li>Risk Assessment & Prioritization</li>
                            <li>Compliance Gap Analysis</li>
                            <li>Remediation Recommendations</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card-compact">
                        <div class="service-icon compliance">
                            <i class="ri-file-shield-line"></i>
                        </div>
                        <h5 class="service-title">Compliance Testing</h5>
                        <p class="service-description">Ensure adherence to security standards and regulations</p>
                        <ul class="service-list">
                            <li>PCI DSS Compliance Testing</li>
                            <li>GDPR Compliance Assessment</li>
                            <li>ISO 27001 Gap Analysis</li>
                            <li>HIPAA Security Testing</li>
                            <li>SOC 2 Compliance Testing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Testing Process -->
    <section class="section-compact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-title">Our Security Testing Process</h2>
                    <p class="section-subtitle">A systematic approach to identifying and mitigating security risks</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="step-title">Planning & Scoping</h6>
                        <p class="step-description">Define testing objectives, scope, and methodologies</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="step-title">Reconnaissance</h6>
                        <p class="step-description">Gather information about the target systems</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="step-title">Scanning & Enumeration</h6>
                        <p class="step-description">Identify live systems, open ports, and services</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="step-title">Vulnerability Analysis</h6>
                        <p class="step-description">Analyze and prioritize discovered vulnerabilities</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="process-step">
                        <div class="step-number">5</div>
                        <h6 class="step-title">Exploitation</h6>
                        <p class="step-description">Test exploitability of identified vulnerabilities</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="process-step">
                        <div class="step-number">6</div>
                        <h6 class="step-title">Reporting</h6>
                        <p class="step-description">Detailed report with findings and recommendations</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features -->
    <section class="section-compact bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-title">Why Choose Our Security Testing</h2>
                    <p class="section-subtitle">Advanced security testing capabilities to protect your business</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ri-team-line"></i>
                        </div>
                        <h6 class="feature-title">Expert Security Team</h6>
                        <p class="feature-description">Certified security professionals with extensive experience</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ri-tools-line"></i>
                        </div>
                        <h6 class="feature-title">Advanced Tools</h6>
                        <p class="feature-description">Industry-leading security testing tools and frameworks</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ri-file-text-line"></i>
                        </div>
                        <h6 class="feature-title">Detailed Reporting</h6>
                        <p class="feature-description">Comprehensive reports with actionable recommendations</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ri-refresh-line"></i>
                        </div>
                        <h6 class="feature-title">Continuous Support</h6>
                        <p class="feature-description">Ongoing support for remediation and re-testing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testing Methodologies -->
    <section class="section-compact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-title">Our Testing Methodologies</h2>
                    <p class="section-subtitle">Following industry-standard frameworks and best practices</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="methodology-card">
                        <h5 class="methodology-title">OWASP Testing Framework</h5>
                        <p class="methodology-description">Comprehensive web application security testing based on OWASP guidelines</p>
                        <ul class="methodology-features">
                            <li>Information Gathering</li>
                            <li>Configuration & Deploy Management</li>
                            <li>Identity Management Testing</li>
                            <li>Authentication & Session Management</li>
                            <li>Authorization & Input Validation</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="methodology-card">
                        <h5 class="methodology-title">NIST Cybersecurity Framework</h5>
                        <p class="methodology-description">Risk-based approach to managing cybersecurity risks</p>
                        <ul class="methodology-features">
                            <li>Identify Security Risks</li>
                            <li>Protect Critical Assets</li>
                            <li>Detect Security Events</li>
                            <li>Respond to Incidents</li>
                            <li>Recover from Attacks</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Testing Statistics -->
    <section class="section-compact bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-title">Security Testing Impact</h2>
                    <p class="section-subtitle">Proven results in improving security posture</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Security Assessments</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <span class="stat-number">95%</span>
                        <span class="stat-label">Vulnerabilities Identified</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Security Monitoring</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Client Satisfaction</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology Stack -->
    <section class="section-compact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-title">Security Testing Tools & Technologies</h2>
                    <p class="section-subtitle">Industry-leading tools for comprehensive security testing</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-compact">
                        <h5 class="service-title">Vulnerability Scanning Tools</h5>
                        <div class="tech-stack">
                            <span class="tech-badge">Nessus</span>
                            <span class="tech-badge">OpenVAS</span>
                            <span class="tech-badge">Qualys</span>
                            <span class="tech-badge">Rapid7</span>
                            <span class="tech-badge">Acunetix</span>
                            <span class="tech-badge">Burp Suite</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-compact">
                        <h5 class="service-title">Penetration Testing Tools</h5>
                        <div class="tech-stack">
                            <span class="tech-badge">Metasploit</span>
                            <span class="tech-badge">Kali Linux</span>
                            <span class="tech-badge">Nmap</span>
                            <span class="tech-badge">Wireshark</span>
                            <span class="tech-badge">OWASP ZAP</span>
                            <span class="tech-badge">Nikto</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="cta-title">Secure Your Applications Today</h2>
                    <p class="cta-subtitle">Get a comprehensive security assessment and protect your business from cyber threats</p>
                    <a href="./contact.php" class="btn-cta">Get Security Assessment</a>
                </div>
            </div>
        </div>
    </section>

</body>
</html>


<?php
include "components/footer.php";
?>