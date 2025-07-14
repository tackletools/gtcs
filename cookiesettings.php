<?php
$current_page = 'cookiesettings';
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
            background: var(--light-color);
        }

        /* Page Header */
        .page-header {
            background: var(--gradient-primary);
            color: white;
            padding: 2rem 0 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,300 1000,1000 0,700"/></svg>');
            pointer-events: none;
        }

        .page-header-content {
            position: relative;
            z-index: 2;
        }

        .page-title {
            /*font-size: clamp(2.5rem, 5vw, 4rem);*/
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .page-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            font-weight: 300;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Breadcrumb */
        .breadcrumb-section {
            background: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            font-size: 0.9rem;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--primary-dark);
        }

        .breadcrumb-item.active {
            color: #6b7280;
        }

        /* Main Content */
        .main-content {
            padding: 4rem 0;
            background: white;
        }

        .content-wrapper {
            max-width: 100%;
            margin: 0 auto;
        }

        .policy-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .section-heading {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid var(--primary-color);
            display: inline-block;
        }

        .section-subheading {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark-color);
            margin: 2rem 0 1rem 0;
            position: relative;
            padding-left: 1rem;
        }

        .section-subheading::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 20px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .policy-text {
            color: #4b5563;
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .policy-list {
            margin: 1rem 0;
            padding-left: 0;
            list-style: none;
        }

        .policy-list li {
            position: relative;
            padding: 0.75rem 0 0.75rem 2rem;
            color: #4b5563;
            border-left: 2px solid rgba(99, 102, 241, 0.1);
            margin-bottom: 0.5rem;
            background: rgba(99, 102, 241, 0.02);
            border-radius: 0 8px 8px 0;
            transition: all 0.3s ease;
        }

        .policy-list li:hover {
            background: rgba(99, 102, 241, 0.05);
            border-left-color: var(--primary-color);
        }

        .policy-list li::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            background: var(--primary-color);
            border-radius: 50%;
        }

        /* Cookie Types Cards */
        .cookie-types {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .cookie-type-card {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(99, 102, 241, 0.02) 100%);
            border: 1px solid rgba(99, 102, 241, 0.1);
            border-radius: 15px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .cookie-type-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(99, 102, 241, 0.1);
            border-color: var(--primary-color);
        }

        .cookie-type-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .cookie-type-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .cookie-type-desc {
            color: #6b7280;
            font-size: 0.95rem;
        }

        /* Contact Section */
        .contact-highlight {
            background: var(--gradient-primary);
            color: white;
            padding: 3rem;
            border-radius: 20px;
            text-align: center;
            margin-top: 3rem;
        }

        .contact-highlight h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .contact-highlight p {
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .contact-btn {
            background: white;
            color: var(--primary-color);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.3);
            color: var(--primary-color);
        }

        /* Last Updated */
        .last-updated {
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary-dark);
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-header {
                padding: 4rem 0 2rem;
            }

            .policy-card {
                padding: 2rem;
                margin: 1rem;
            }

            .cookie-types {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .contact-highlight {
                padding: 2rem;
                margin: 2rem 1rem 1rem;
            }
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
    </style>
</head>
<body>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="page-header-content">
                <h2 class="page-title fade-in">Cookie Policy</h2>
                <p class="page-subtitle fade-in">Learn how we use cookies to enhance your browsing experience</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <div class="content-wrapper">
                
                <!-- Last Updated Notice -->
                <div class="last-updated fade-in">
                    <i class="ri-calendar-line me-2"></i>
                    Last Updated: <?php echo date('F j, Y'); ?>
                </div>

                <!-- What Are Cookies -->
                <div class="policy-card fade-in">
                    <h2 class="section-heading">What Are Cookies?</h2>
                    <p class="policy-text">
                        Cookies are small data files stored on your device to help enhance your browsing experience and maintain security. These tiny files contain information that helps our website remember your preferences and provide you with a personalized experience during your visit.
                    </p>
                </div>

                <!-- How We Use Cookies -->
                <div class="policy-card fade-in">
                    <h2 class="section-heading">How We Use Cookies?</h2>
                    <p class="policy-text">
                        When you first visit our website, you will be prompted to accept or decline cookies. We respect your choice and provide you with full control over your cookie preferences.
                    </p>
                    
                    <h3 class="section-subheading">Types of Cookies We Use:</h3>
                    <div class="cookie-types">
                        <div class="cookie-type-card">
                            <div class="cookie-type-icon">
                                <i class="ri-time-line"></i>
                            </div>
                            <h4 class="cookie-type-title">Session Cookies</h4>
                            <p class="cookie-type-desc">These temporary cookies are automatically deleted when you close your browser session. They help maintain your login status and shopping cart contents.</p>
                        </div>
                        <div class="cookie-type-card">
                            <div class="cookie-type-icon">
                                <i class="ri-save-line"></i>
                            </div>
                            <h4 class="cookie-type-title">Persistent Cookies</h4>
                            <p class="cookie-type-desc">These cookies remain on your device until you manually remove them or they expire. They remember your preferences for future visits.</p>
                        </div>
                    </div>
                </div>

                <!-- Data Collected -->
                <div class="policy-card fade-in">
                    <h2 class="section-heading">Data Collected via Cookies</h2>
                    <p class="policy-text">
                        The information we collect through cookies helps us improve your experience on our website. This includes:
                    </p>
                    <ul class="policy-list">
                        <li>Login and session information to keep you signed in securely</li>
                        <li>Display and language preferences for a customized experience</li>
                        <li>Navigation history to understand how you use our website</li>
                        <li>Browser and device metadata for compatibility and security</li>
                        <li>Anonymous analytics and location data to improve our services</li>
                    </ul>
                </div>

                <!-- Disabling Cookies -->
                <div class="policy-card fade-in">
                    <h2 class="section-heading">Disabling Cookies</h2>
                    <p class="policy-text">
                        You have the right to control how cookies are used on your device. You may disable cookies through your browser settings at any time. However, please note that disabling cookies may affect website functionality and performance.
                    </p>
                    <p class="policy-text">
                        <strong>Important:</strong> Some features of our website may not work properly if cookies are disabled, including login functionality, personalized content, and shopping cart features.
                    </p>
                </div>

                <!-- Data Security -->
                <div class="policy-card fade-in">
                    <h2 class="section-heading">Data Security</h2>
                    <p class="policy-text">
                        We implement appropriate technical and organizational security measures to protect your data collected through cookies. This includes encryption, secure transmission protocols, and regular security audits. However, due to the inherent nature of the internet, we cannot guarantee complete security against all possible threats.
                    </p>
                </div>

                <!-- Business Transfers -->
                <div class="policy-card fade-in">
                    <h2 class="section-heading">Business Transfers</h2>
                    <p class="policy-text">
                        In the event of a merger, acquisition, restructuring, or sale of GTCS, your data collected through cookies may be transferred as part of the business assets. We will notify you of any such transfer and ensure that your data continues to be protected under this policy.
                    </p>
                </div>

                <!-- Third-Party Links -->
                <div class="policy-card fade-in">
                    <h2 class="section-heading">Third-Party Links</h2>
                    <p class="policy-text">
                        Our website may include links to third-party websites that have their own cookie policies. We are not liable for their content, cookie practices, or privacy policies. Please refer to their respective privacy and cookie policies before interacting with their services.
                    </p>
                </div>

                <!-- Acceptance of Terms -->
                <div class="policy-card fade-in">
                    <h2 class="section-heading">Acceptance of Terms</h2>
                    <p class="policy-text">
                        By using our website and accepting cookies, you agree to the terms outlined in this Cookie Policy. If you disagree with any part of this policy, please stop using our website or adjust your cookie settings accordingly.
                    </p>
                    <p class="policy-text">
                        We reserve the right to modify this Cookie Policy at any time to reflect changes in our practices or legal requirements. Your continued use of the website after such updates constitutes acceptance of the revised terms.
                    </p>
                </div>

                <!-- Contact Section -->
                <div class="contact-highlight fade-in">
                    <h3><i class="ri-customer-service-2-line me-2"></i>How to Contact Us</h3>
                    <p>If you have any questions or concerns regarding our cookie practices or this Cookie Policy, please feel free to contact us.</p>
                    <a href="contact.php" class="contact-btn">
                        <i class="ri-mail-line me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Animation Script -->
    <script>
        // Fade in animation on scroll
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

        // Observe all elements with fade-in class
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Add initial animation to first elements
        setTimeout(() => {
            document.querySelectorAll('.fade-in').forEach((el, index) => {
                if (index < 2) {
                    el.classList.add('visible');
                }
            });
        }, 100);
    </script>
</body>
</html>

<?php
include "components/footer.php";
?>