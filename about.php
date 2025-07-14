<?php 
$current_page = 'about'; 
 include "components/header.php";
?>

    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #1e40af;
            --secondary-color: #1e293b;
            --accent-color: #f59e0b;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f8fafc;
            --border-color: #e5e7eb;
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 120px 0 80px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.1"><circle cx="30" cy="30" r="4"/></g></svg>');
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2vw, 1.3rem);
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .hero-cta {
            background: white;
            color: var(--primary-color);
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .hero-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            color: var(--primary-color);
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Section Styling */
        .section {
            padding: 20px 0;
        }

        .section-alt {
            background: var(--bg-light);
        }

        .section-title {
            /*font-size: clamp(2rem, 4vw, 3rem);*/
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-dark);
            text-align: center;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-light);
            text-align: center;
            margin-bottom: 3rem;
        }

        /* Stats Section */
        .impact-section {
    background: linear-gradient(135deg, #4a6cf7, #6a80ff);
    padding: 60px 0;
}

.impact-header {
    margin-bottom: 2rem;
}

.impact-title {
    font-size: 2rem;
    font-weight: 700;
    color: #ffffff;
}

.impact-subtitle {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.8);
    max-width: 500px;
    margin: 0 auto;
}

.impact-stat-item {
    background: rgba(255, 255, 255, 0.05);
    padding: 30px 20px;
    border-radius: 12px;
    backdrop-filter: blur(4px);
    transition: transform 0.3s ease;
    height: 100%;
}

.impact-stat-item:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.08);
}

.impact-stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #ffffff;
    display: block;
    margin-bottom: 0.5rem;
}
.impact-stat-live {
    font-size: 2rem;
    font-weight: 700;
    color: #ffffff;
    display: block;
    margin-bottom: 0.5rem;
}

.impact-stat-label {
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.85);
}

        /* Card Styling */
        .card-modern {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow);
            border: none;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .card-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        .card-modern:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .card-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .card-icon.primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        }

        .card-icon.secondary {
            background: linear-gradient(135deg, var(--accent-color), #f97316);
        }

        .card-icon.tertiary {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .card-icon.quaternary {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .card-description {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .card-list {
            list-style: none;
            padding: 0;
        }

        .card-list li {
            color: var(--text-light);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .card-list li::before {
            content: '✓';
            color: var(--primary-color);
            font-weight: bold;
            margin-right: 0.5rem;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        /* Why Choose Us */
        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 1.5rem;
            flex-shrink: 0;
        }

        .feature-content h5 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .feature-content p {
            color: var(--text-light);
            margin: 0;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--secondary-color), #334155);
            color: white;
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .btn-outline-light {
            border: 2px solid white;
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            margin: 0.5rem;
        }

        .btn-outline-light:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .footer-link {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--primary-color);
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        /* Back to Top */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .slide-in-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease;
        }

        .slide-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .slide-in-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease;
        }

        .slide-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                padding: 100px 0 60px;
                text-align: center;
            }

            .section {
                padding: 20px 0;
            }

            .stats-container {
                padding: 40px 20px;
                margin: 20px 0;
            }

            .card-modern {
                padding: 1.5rem;
                margin-bottom: 2rem;
            }

            .feature-item {
                flex-direction: column;
                text-align: center;
            }

            .feature-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .navbar-nav {
                text-align: center;
                padding: 1rem 0;
            }

            .social-icons {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .card-modern {
                padding: 1rem;
            }

            .stats-container {
                padding: 30px 15px;
            }

            .back-to-top {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
            }
        }
    </style>

    <section class="banner-image">
        <img src="assets/about.png" alt="About Banner" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
    </section>

    <!-- Hero Section -->
    <!--<section class="hero-section">-->
    <!--    <div class="container">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-lg-8 fade-in">-->
    <!--                <div class="hero-content">-->
    <!--                    <h1 class="hero-title">About Global Tech Consultancy Service</h1>-->
    <!--                    <p class="hero-subtitle">-->
    <!--                        We are a leading technology consulting firm dedicated to transforming businesses through innovative IT solutions and strategic digital transformation.-->
    <!--                    </p>-->
    <!--                    <a href="#our-story" class="hero-cta">-->
    <!--                        Learn Our Story <i class="ri-arrow-down-line ms-2"></i>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 fade-in">-->
    <!--                <div class="hero-image text-center">-->
    <!--                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="About Us" class="img-fluid">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- Our Story Section -->
    <section id="our-story" class="section our-story-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center fade-in">
                    <h2 class="section-title">Our Story</h2>
                    <p class="section-subtitle">Building tomorrow's technology solutions today</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 slide-in-left">
                    <div class="story-content pe-lg-4">
                        <h3 class="mb-4 fw-bold">Empowering Businesses Through Technology</h3>
                        <p class="mb-4">
                            Founded with a vision to bridge the gap between cutting-edge technology and business success, Global Tech Consultancy Service has been at the forefront of digital transformation for businesses across industries.
                        </p>
                        <p class="mb-4">
                            Our journey began with a simple belief: that every business, regardless of size, deserves access to world-class technology solutions that can drive growth, efficiency, and innovation.
                        </p>
                        <p>
                            Today, we stand as a trusted partner to businesses worldwide, delivering comprehensive IT solutions that not only meet current needs but also prepare organizations for future challenges.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 slide-in-right">
                    <div class="story-image text-center">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Our Story" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="impact-section text-white">
    <div class="container">
        <div class="impact-header text-center mb-4 fade-in">
            <h2 class="impact-title">Our Impact in Numbers</h2>
            <p class="impact-subtitle">Delivering excellence across global markets</p>
        </div>
        <div class="row g-4 text-center impact-stats">
            <div class="col-lg-3 col-md-6">
                <div class="impact-stat-item fade-in">
                    <span class="impact-stat-number">500+</span>
                    <span class="impact-stat-label">Projects Completed</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="impact-stat-item fade-in">
                    <span class="impact-stat-number">200+</span>
                    <span class="impact-stat-label">Happy Clients</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="impact-stat-item fade-in">
                    <span class="impact-stat-number">50+</span>
                    <span class="impact-stat-label">Expert Developers</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="impact-stat-item fade-in">
                    <span class="impact-stat-live">24/7</span>
                    <span class="impact-stat-label">Support Available</span>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Mission & Vision Section -->
    <section class="section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card-modern fade-in">
                        <div class="card-icon primary">
                            <i class="ri-team-line"></i>
                        </div>
                        <h3 class="card-title">Our Mission</h3>
                        <p class="card-description">
                            To empower businesses with innovative technology solutions that drive growth, enhance efficiency, and create sustainable competitive advantages in the digital age.
                        </p>
                        <ul class="card-list">
                            <li>Delivering cutting-edge technology solutions</li>
                            <li>Fostering long-term client relationships</li>
                            <li>Promoting digital transformation</li>
                            <li>Ensuring measurable business impact</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-modern fade-in">
                        <div class="card-icon secondary">
                            <i class="ri-eye-line"></i>
                        </div>
                        <h3 class="card-title">Our Vision</h3>
                        <p class="card-description">
                            To be the global leader in technology consulting, recognized for our innovation, expertise, and commitment to transforming businesses through technology.
                        </p>
                        <ul class="card-list">
                            <li>Leading digital transformation initiatives</li>
                            <li>Setting industry standards for excellence</li>
                            <li>Building a sustainable tech ecosystem</li>
                            <li>Creating lasting value for stakeholders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-2 fade-in">
                    <h2 class="section-title">Our Core Values</h2>
                    <p class="section-subtitle">The principles that guide everything we do</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card-modern text-center fade-in">
                        <div class="card-icon primary mx-auto">
                            <i class="ri-lightbulb-line"></i>
                        </div>
                        <h4 class="card-title">Innovation</h4>
                        <p class="card-description">
                            We continuously explore new technologies and methodologies to deliver cutting-edge solutions that keep our clients ahead of the curve.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card-modern text-center fade-in">
                        <div class="card-icon secondary mx-auto">
                            <i class="ri-trophy-line"></i>
                        </div>
                        <h4 class="card-title">Excellence</h4>
                        <p class="card-description">
                            We maintain the highest standards in everything we do, from code quality to client service, ensuring exceptional results every time.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card-modern text-center fade-in">
                        <div class="card-icon tertiary mx-auto">
                            <i class="ri-team-line"></i>
                        </div>
                        <h4 class="card-title">Collaboration</h4>
                        <p class="card-description">
                            We believe in the power of teamwork, both within our organization and with our clients, to achieve remarkable outcomes.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card-modern text-center fade-in">
                        <div class="card-icon quaternary mx-auto">
                            <i class="ri-shield-check-line"></i>
                        </div>
                        <h4 class="card-title">Integrity</h4>
                        <p class="card-description">
                            We operate with complete transparency and honesty, building trust through reliable actions and ethical business practices.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card-modern text-center fade-in">
                        <div class="card-icon primary mx-auto">
                            <i class="ri-customer-service-2-line"></i>
                        </div>
                        <h4 class="card-title">Client Focus</h4>
                        <p class="card-description">
                            Our clients' success is our priority. We listen, understand, and deliver solutions that truly address their unique challenges.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card-modern text-center fade-in">
                        <div class="card-icon secondary mx-auto">
                            <i class="ri-rocket-line"></i>
                        </div>
                        <h4 class="card-title">Agility</h4>
                        <p class="card-description">
                            We adapt quickly to changing market conditions and client needs, ensuring flexibility and responsiveness in our approach.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
<!-- Why Choose Us Section -->
<section class="why-choose-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-4 fade-in">
                <h3 class="section-title mt-4">Why Choose Global Tech Consultancy?</h3>
                <p class="section-subtitle">What sets us apart in the competitive technology landscape</p>
            </div>
        </div>

        <div class="row align-items-stretch mb-2">
            <!-- Features Column -->
            <div class="col-lg-6 d-flex">
                <div class="why-choose-content d-flex flex-column justify-content-between w-100">
                    <div class="feature-item fade-in d-flex">
                        <div class="feature-icon me-3">
                            <i class="ri-user-star-line"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Expert Team</h5>
                            <p>Our team comprises seasoned professionals with deep expertise across various technologies and industries.</p>
                        </div>
                    </div>
                    <div class="feature-item fade-in d-flex">
                        <div class="feature-icon me-3">
                            <i class="ri-time-line"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Proven Track Record</h5>
                            <p>Years of successful project delivery across diverse sectors with measurable business impact.</p>
                        </div>
                    </div>
                    <div class="feature-item fade-in d-flex">
                        <div class="feature-icon me-3">
                            <i class="ri-settings-3-line"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Custom Solutions</h5>
                            <p>We don't believe in one-size-fits-all. Every solution is tailored to your specific business needs.</p>
                        </div>
                    </div>
                    <div class="feature-item fade-in d-flex">
                        <div class="feature-icon me-3">
                            <i class="ri-24-hours-line"></i>
                        </div>
                        <div class="feature-content">
                            <h5>24/7 Support</h5>
                            <p>Round-the-clock support ensures your systems are always running smoothly and efficiently.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="col-lg-6">
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Why Choose Us" class="img-fluid rounded-4 shadow-lg h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- CTA Section -->
    <section class="cta-section mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center fade-in">
                    <h2 class="section-title text-white mb-4">Ready to Transform Your Business?</h2>
                    <p class="section-subtitle text-white mb-4 opacity-75">
                        Let's discuss how our expertise can help you achieve your technology goals and drive business growth.
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <!-- Filled Button -->
                        <a href="./contact.php" style="
                            background: white;
                            color: #4a3aff;
                            padding: 1rem 2rem;
                            min-width: 220px;
                            text-align: center;
                            border: none;
                            border-radius: 50px;
                            font-weight: 600;
                            text-decoration: none;
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            transition: all 0.3s ease;
                            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                        " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 15px 35px rgba(0, 0, 0, 0.3)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 10px 25px rgba(0, 0, 0, 0.2)'">
                            Get in Touch <i class="ri-arrow-right-line ms-2"></i>
                        </a>
                    
                        <!-- Outlined Button -->
                        <a href="./freeguide.php" style="
                            background: transparent;
                            color: white;
                            padding: 1rem 2rem;
                            min-width: 220px;
                            text-align: center;
                            border: 2px solid white;
                            border-radius: 50px;
                            font-weight: 600;
                            text-decoration: none;
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            transition: all 0.3s ease;
                        " onmouseover="this.style.background='white'; this.style.color='#4a3aff'" onmouseout="this.style.background='transparent'; this.style.color='white'">
                            Free Consultation <i class="ri-phone-line ms-2"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="ri-arrow-up-line"></i>
    </button>

    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    
    <script>
        // Back to top functionality
        const backToTopBtn = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });
        
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navHeight = document.querySelector('.navbar').offsetHeight;
                    const targetPosition = target.offsetTop - navHeight - 20;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all elements with animation classes
        document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right').forEach(el => {
            observer.observe(el);
        });

        // Navbar background on scroll
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
            }
        });

       function animateCounters() {
  const counters = document.querySelectorAll('.impact-stat-number');

  counters.forEach(counter => {
    // Extract numeric part only (e.g. 500 from "500+" or 24 from "24/7")
    const rawText = counter.textContent.trim();
    const numericMatch = rawText.match(/\d+/); 
    if (!numericMatch) return;

    const target = parseInt(numericMatch[0], 10);
    let current = 0;
    const increment = Math.max(1, Math.floor(target / 200));
    const suffix = rawText.replace(/\d+/g, ''); // e.g. "+" or "/7" or ""

    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        counter.textContent = target + suffix;
        clearInterval(timer);
      } else {
        counter.textContent = current + suffix;
      }
    }, 10);
  });
}

// Trigger counter animation when stats section is visible
const statsObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      animateCounters();
      statsObserver.unobserve(entry.target);
    }
  });
});

const statsSection = document.querySelector('.impact-section');
if (statsSection) {
  statsObserver.observe(statsSection);
}


        // Add loading animation
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });

        // Parallax effect for hero section
        // window.addEventListener('scroll', () => {
        //     const scrolled = window.pageYOffset;
        //     const parallax = document.querySelector('.hero-section');
        //     const speed = scrolled * 0.5;
            
        //     if (parallax) {
        //         parallax.style.transform = `translateY(${speed}px)`;
        //     }
        // });

        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.hero-section');
            
            if (parallax) {
                const heroHeight = parallax.offsetHeight;
                if (scrolled < heroHeight) {
                    // const speed = scrolled * 0.2; // kam speed
                    parallax.style.transform = `translateY(${speed}px)`;
                } else {
                    parallax.style.transform = 'translateY(0px)'; // Reset
                }
            }
        });

        // Mobile menu close on link click
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            });
        });
    </script>


<?php 
 include "components/footer.php";
?>