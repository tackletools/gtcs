<?php 
$current_page = 'privacypolicy';
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
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            background-color: var(--light-color);
        }
        
        /* Privacy Policy Hero Section */
        .privacy-hero {
            background: var(--gradient-primary);
            padding: 2rem 0 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .privacy-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,200 1000,1000 0,800"/></svg>');
            pointer-events: none;
        }
        
        .privacy-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }
        
        .privacy-hero h1 {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .privacy-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Privacy Content Section */
        .privacy-content {
            padding: 4rem 0;
            background: white;
        }
        
        .privacy-container {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .privacy-card {
            background: white;
            
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 2rem;
        }
        
   
    
    .privacy-card:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
        
        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .section-icon {
            width: 40px;
            height: 40px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.2rem;
            color:white;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
            padding: 10px;
        }
        
        .privacy-text {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        
        .privacy-list {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }
        
        .privacy-list li {
            padding: 0.5rem 0;
            padding-left: 2rem;
            position: relative;
            color: #64748b;
            line-height: 1.7;
        }
        
        .privacy-list li::before {
            content: '•';
            position: absolute;
            left: 0.5rem;
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .highlight-box {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(167, 139, 250, 0.1) 100%);
            border-left: 4px solid var(--primary-color);
            padding: 1.5rem;
            border-radius: 10px;
            margin: 2rem 0;
        }
        
        .highlight-box h4 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .contact-section {
            background: var(--gradient-primary);
            color: white;
            text-align: center;
            padding: 4rem 0;
            margin-top: 3rem;
        }
        
        .contact-section h3 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .contact-section p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }
        
        .contact-btn {
            background: white;
            color: var(--primary-color);
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .contact-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.3);
            color: var(--primary-color);
        }
        
        /* Breadcrumb */
        .breadcrumb-section {
            background: rgba(99, 102, 241, 0.1);
            padding: 1rem 0;
        }
        
        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }
        
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .breadcrumb-item.active {
            color: #64748b;
        }
        
        /* Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .privacy-card {
                padding: 2rem;
            }
            
            .section-header {
                flex-direction: column;
                text-align: center;
            }
            
            .section-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="privacy-hero">
        <div class="container">
            <div class="privacy-hero-content">
                <h2>Privacy Policy</h2>
                <p>Your privacy is our priority. Learn how we collect, use, and protect your information when you interact with our services.</p>
            </div>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="privacy-content" style="">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="privacy-container bg-white rounded-4 shadow-lg p-5">
            
            <!-- Introduction -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-shield-check-line"></i>
                    </div>
                    <h2 class="section-title">Our Commitment to Privacy</h2>
                </div>
                <p class="privacy-text">
                    We provide our services with the aim of respecting your privacy and protecting your personal information. Making you feel comfortable and protected when you use our platform or services is our most important asset in our relationship with you.
                </p>
                <p class="privacy-text">
                    This policy outlines the information we collect, the purpose for which we collect it, how we use and share this information, our data security measures, and our cancellation and refund policies.
                </p>
            </div>

            <!-- Information We Collect -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-information-line"></i>
                    </div>
                    <h2 class="section-title">Information We Collect</h2>
                </div>
                <p class="privacy-text">
                    We collect only the information necessary to provide you with access to and full functionality of our website. Most areas of our website can be browsed without disclosing personal information. However, to access specific features or services, you may be asked to provide certain details voluntarily, such as:
                </p>
                <ul class="privacy-list">
                    <li>Name</li>
                    <li>Email address</li>
                    <li>Company name</li>
                    <li>Contact number</li>
                </ul>
                <div class="highlight-box">
                    <h4>Important Note</h4>
                    <p>Providing this information is entirely optional and based on your consent. Global Tech Consultancy Service does not verify the authenticity of the information you submit.</p>
                </div>
            </div>

            <!-- Data Collected Automatically -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-database-2-line"></i>
                    </div>
                    <h2 class="section-title">Data Collected Automatically</h2>
                </div>
                <p class="privacy-text">
                    When you use our website, we may automatically collect certain technical and usage-related information, including but not limited to:
                </p>
                <ul class="privacy-list">
                    <li>IP address</li>
                    <li>Browser type and version</li>
                    <li>Date and time of visit</li>
                    <li>Pages visited and time spent</li>
                    <li>Device information and operating system</li>
                    <li>Referral source and user navigation behavior</li>
                </ul>
            </div>

            <!-- Data You Provide Directly -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-user-settings-line"></i>
                    </div>
                    <h2 class="section-title">Data You Provide Directly</h2>
                </div>
                <p class="privacy-text">
                    When you submit a contact form, request a callback, or apply for a job, you may be required to provide:
                </p>
                <ul class="privacy-list">
                    <li>Name</li>
                    <li>Contact details (email and phone)</li>
                    <li>Location</li>
                    <li>Additional information related to your inquiry or job application</li>
                </ul>
                <p class="privacy-text">
                    We may also receive your information from third parties, such as referral sources or job portals.
                </p>
            </div>

            <!-- Data Collected Indirectly -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-links-line"></i>
                    </div>
                    <h2 class="section-title">Data Collected Indirectly</h2>
                </div>
                <p class="privacy-text">We may obtain personal information when you:</p>
                <ul class="privacy-list">
                    <li>Interact with our social media pages</li>
                    <li>Use third-party authentication services (e.g., Google, LinkedIn) to sign in or inquire</li>
                </ul>
            </div>

            <!-- Use of Your Information -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-settings-3-line"></i>
                    </div>
                    <h2 class="section-title">Use of Your Information</h2>
                </div>
                <p class="privacy-text">
                    We process your data strictly within permissible legal and ethical boundaries:
                </p>
                <ul class="privacy-list">
                    <li><strong>With your consent:</strong> We use cookies and other tracking tools to analyze user behavior and preferences, send relevant communications, and improve services.</li>
                    <li><strong>For legitimate business purposes:</strong> To respond to inquiries, provide consultations, personalize communication, and enhance website security and fraud prevention.</li>
                    <li><strong>To meet legal obligations:</strong> If required by law or regulatory authorities, we may disclose personal data in compliance with legal processes.</li>
                </ul>
            </div>

            <!-- Purpose of Data Use -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-links-line"></i>

                    </div>
                    <h2 class="section-title">Purpose of Data Use</h2>
                </div>
                <p class="privacy-text">We may use your data for the following purposes:</p>
                <ul class="privacy-list">
                    <li>To respond to product or service inquiries and provide updates</li>
                    <li>During business transitions, such as mergers or acquisitions</li>
                    <li>To coordinate global business functions in compliance with local laws</li>
                    <li>For inclusion in testimonials, references, audits, or certifications</li>
                    <li>To comply with applicable laws and regulations</li>
                    <li>To protect our legal rights and interests</li>
                </ul>
            </div>

            <!-- Third Party Privacy -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-shield-user-line"></i>
                    </div>
                    <h2 class="section-title">Third Party Privacy</h2>
                </div>
                <div class="highlight-box">
                    <h4>Our Guarantee</h4>
                    <p>We ensure not to share any information provided by you with any third party.</p>
                </div>
            </div>

            <!-- Data Security -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-shield-keyhole-line"></i>
                    </div>
                    <h2 class="section-title">Data Security Assurance</h2>
                </div>
                <p class="privacy-text">
                    Securing your data is our first priority. We are well known for keeping our client's important data safe and secure. In our system we never store any credit card information. We have trained our staff very well to safeguard your data.
                </p>
            </div>

            <!-- Cancellation and Refund Policy -->
            <div class="privacy-card fade-in">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="ri-refresh-line"></i>
                    </div>
                    <h2 class="section-title">Cancellation and Refund Policy</h2>
                </div>
                <p class="privacy-text">
                    In terms of cancelling the service, your data will be retained for 6 months in our system. No charge is involved during this period. You can work on the same data if you want to activate your account during this period. But when this period is over you have to purchase the service again to activate the account.
                </p>
                <p class="privacy-text">
                    If you are not satisfied with our services, within 15 days from the purchase date, we will refund the money (exclusive tax) you have paid us for the remaining period of your subscription.
                </p>
            </div>
        </div>
        </div>
        </div>
        </div>
            
    </section>

    <!-- Contact Section -->
    <section class="contact-section mb-4">
        <div class="container">
            <h3>Have Questions About Our Privacy Policy?</h3>
            <p>In case of any query or grievances regarding the policy or safety of your data, you may contact us anytime.</p>
            <a href="contact.php" class="contact-btn">
                <i class="ri-customer-service-2-line"></i>
                Contact Us
            </a>
        </div>
    </section>
    
    <!-- Animation Script -->
    <script>
        // Fade in animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
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
