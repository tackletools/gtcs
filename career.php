<?php 
$current_page = 'career'; 
 include "components/header.php";
?>

<style>
        :root {
            --primary-color: #6366f1;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-color: #1f2937;
            --light-color: #f8fafc;
        }


        /* Career Page Specific Styles */
        .career-hero-section {
            /*margin-top: -50px;*/
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .career-hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,300 1000,1000 0,700"/></svg>');
            pointer-events: none;
        }

        .career-hero-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .career-hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .career-stats-row {
            display: flex;
            gap: 2rem;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
        }

        .career-stat {
            text-align: center;
        }

        .career-stat .stat-number {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
            color: #fbbf24;
        }

        .career-stat .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .career-cta-btn {
            background: var(--gradient-secondary);
            border: none;
            padding: .5rem .5rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .career-cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            color: white;
            
        }

        .floating-cards {
            position: relative;
            height: 400px;
        }

        .career-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 1.5rem;
            text-align: center;
            color: white;
            transition: all 0.3s ease;
            animation: float 3s ease-in-out infinite;
        }

        .career-card:hover {
            transform: translateY(-10px) scale(1.05);
            background: rgba(255, 255, 255, 0.2);
        }

        .career-card i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .career-card span {
            font-weight: 600;
        }

        .card-1 {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .card-2 {
            top: 10%;
            right: 20%;
            animation-delay: 0.5s;
        }

        .card-3 {
            bottom: 30%;
            left: 5%;
            animation-delay: 1s;
        }

        .card-4 {
            bottom: 20%;
            right: 10%;
            animation-delay: 1.5s;
        }

        /* Why Join Section */
        .why-join-section {
            padding: 4rem 0;
            background: var(--light-color);
        }

        .benefit-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .benefit-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .benefit-card h4 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .benefit-card p {
            color: #6b7280;
            line-height: 1.6;
        }

        /* Open Positions Section */
        .open-positions-section {
            padding: 3rem 0;
            background: white;
        }

        .job-filters {
            margin-bottom: 3rem;
            text-align: center;
        }

        .filter-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
            border: 2px solid #e5e7eb;
            background: white;
            color: #6b7280;
            border-radius: 50px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover,
        .filter-btn.active {
            border-color: var(--primary-color);
            background: var(--primary-color);
            color: white;
        }

        .job-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
            height: 100%;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .job-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .job-type {
            background: #dcfce7;
            color: #16a34a;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .job-location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .job-description {
            margin-bottom: 1.5rem;
        }

        .job-description p {
            color: #6b7280;
            line-height: 1.6;
        }

        .job-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .skill-tag {
            background: #f3f4f6;
            color: #374151;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .job-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .job-salary {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        .apply-btn {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .apply-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
        }

        /* Application Process Section */
        .application-process-section {
            padding: 3rem 0;
            background: var(--light-color);
        }

        .process-step {
            text-align: center;
            position: relative;
            padding: 2rem;
        }

        .step-number {
            position: absolute;
            top: 0;
            right: 2rem;
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .step-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: var(--primary-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .process-step h4 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .process-step p {
            color: #6b7280;
            line-height: 1.6;
        }

        /* CTA Section */
        .career-cta-section {
            padding: 2rem 0;
            background: var(--dark-color);
            color: white;
            text-align: center;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2.5rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .cta-buttons .btn {
            padding: 1rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(99, 102, 241, 0.4);
            color: white;
        }

        .btn-outline-primary {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        /* Animation utilities */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Job filtering */
        .job-item {
            transition: all 0.3s ease;
        }

        .job-item.hidden {
            display: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .career-hero-title {
                font-size: 2.5rem;
            }
            
            .career-stats-row {
                justify-content: center;
                gap: 1rem;
            }
            
            .floating-cards {
                height: 300px;
            }
            
            .career-card {
                padding: 1rem;
            }
            
            .card-1, .card-2 {
                top: 10%;
            }
            
            .card-3, .card-4 {
                bottom: 10%;
            }
            
            .job-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .job-footer {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .filter-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .filter-btn {
                width: 200px;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-buttons .btn {
                width: 250px;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .career-hero-section {
                padding: 4rem 0;
            }
            
            .why-join-section,
            .open-positions-section,
            .application-process-section,
            .career-cta-section {
                padding: 4rem 0;
            }
            
            .benefit-card,
            .job-card {
                padding: 1.5rem;
            }
            
            .process-step {
                padding: 1rem;
            }
            
            .step-number {
                position: static;
                margin: 0 auto 1rem;
            }
        }


</style>

<!-- Career Hero Section -->
<section class="career-hero-section">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-lg-8">
                <div class="career-hero-content fade-in">
                    <h1 class="career-hero-title">Join Our Team & Shape the Future</h1>
                    <p class="career-hero-subtitle">
                        Be part of a dynamic team that's revolutionizing the tech industry. 
                        We're looking for passionate individuals who want to make a real impact.
                    </p>
                    <div class="career-stats-row">
                        <div class="career-stat">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Team Members</span>
                        </div>
                        <div class="career-stat">
                            <span class="stat-number">15+</span>
                            <span class="stat-label">Open Positions</span>
                        </div>
                        <div class="career-stat">
                            <span class="stat-number">20+</span>
                            <span class="stat-label">Countries</span>
                        </div>
                    </div>
                    <a href="#open-positions" class="btn career-cta-btn">
                        <i class="ri-search-line"></i> View Open Positions
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="career-hero-image fade-in">
                    <div class="floating-cards">
                        <div class="career-card card-1">
                            <i class="ri-code-s-slash-line"></i>
                            <span>Development</span>
                        </div>
                        <div class="career-card card-2">
                            <i class="ri-line-chart-line"></i>
                            <span>Marketing</span>
                        </div>
                        <div class="career-card card-3">
                            <i class="ri-pen-nib-line"></i>
                            <span>Design</span>
                        </div>
                        <div class="career-card card-4">
                            <i class="ri-shield-check-line"></i>
                            <span>Security</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Join Us Section -->
<section class="why-join-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title fade-in">Why Choose GTCS?</h2>
                <p class="section-subtitle fade-in">
                    We offer more than just a job - we provide a platform for growth, innovation, and success.
                </p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card fade-in">
                    <div class="benefit-icon">
                        <i class="ri-rocket-line"></i>
                    </div>
                    <h4>Innovation First</h4>
                    <p>Work with cutting-edge technologies and be part of groundbreaking projects that shape the future.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card fade-in">
                    <div class="benefit-icon">
                        <i class="ri-team-line"></i>
                    </div>
                    <h4>Collaborative Culture</h4>
                    <p>Join a diverse, inclusive team where your ideas matter and collaboration drives success.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card fade-in">
                    <div class="benefit-icon">
                        <i class="ri-graduation-cap-line"></i>
                    </div>
                    <h4>Continuous Learning</h4>
                    <p>Access to training programs, workshops, and conferences to keep your skills sharp and current.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card fade-in">
                    <div class="benefit-icon">
                        <i class="ri-scales-line"></i>
                    </div>
                    <h4>Work-Life Balance</h4>
                    <p>Flexible working hours, remote work options, and wellness programs to maintain healthy balance.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card fade-in">
                    <div class="benefit-icon">
                        <i class="ri-trophy-line"></i>
                    </div>
                    <h4>Competitive Benefits</h4>
                    <p>Attractive salary packages, health insurance, performance bonuses, and stock options.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card fade-in">
                    <div class="benefit-icon">
                        <i class="ri-global-line"></i>
                    </div>
                    <h4>Global Impact</h4>
                    <p>Work on projects that reach millions of users worldwide and make a real difference.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Open Positions Section -->
<section class="open-positions-section" id="open-positions">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title fade-in">Open Positions</h2>
                <p class="section-subtitle fade-in">
                    Find your perfect role and start your journey with us today.
                </p>
            </div>
        </div>
        
        <!-- Job Filters -->
        <div class="job-filters fade-in">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">All Positions</button>
                <button class="filter-btn" data-filter="development">Development</button>
                <button class="filter-btn" data-filter="design">Design</button>
                <button class="filter-btn" data-filter="marketing">Marketing</button>
                <button class="filter-btn" data-filter="management">Management</button>
            </div>
        </div>

        <!-- Job Listings -->
        <div class="job-listings">
            <div class="row g-4">
                <!-- Job 1 -->
                <div class="col-lg-6 job-item" data-category="development">
                    <div class="job-card fade-in">
                        <div class="job-header">
                            <div class="job-title-section">
                                <h4 class="job-title">Senior Full Stack Developer</h4>
                                <span class="job-type text-dark">Full-time</span>
                            </div>
                            <div class="job-location">
                                <i class="ri-map-pin-line"></i>
                                <span>Remote / Delhi</span>
                            </div>
                        </div>
                        <div class="job-description">
                            <p>We're looking for an experienced full-stack developer to join our core development team. You'll work on exciting projects using modern technologies.</p>
                        </div>
                        <div class="job-skills">
                            <span class="skill-tag">React</span>
                            <span class="skill-tag">Node.js</span>
                            <span class="skill-tag">MongoDB</span>
                            <span class="skill-tag">AWS</span>
                        </div>
                        <div class="job-footer">
                            <div class="job-salary">
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>₹12-18 LPA</span>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyNowModal">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job 2 -->
                <div class="col-lg-6 job-item" data-category="design">
                    <div class="job-card fade-in">
                        <div class="job-header">
                            <div class="job-title-section">
                                <h4 class="job-title">UI/UX Designer</h4>
                                <span class="job-type">Full-time</span>
                            </div>
                            <div class="job-location">
                                <i class="ri-map-pin-line"></i>
                                <span>Delhi / Hybrid</span>
                            </div>
                        </div>
                        <div class="job-description">
                            <p>Join our design team to create beautiful, intuitive user experiences for our digital products and help shape the future of design.</p>
                        </div>
                        <div class="job-skills">
                            <span class="skill-tag">Figma</span>
                            <span class="skill-tag">Adobe XD</span>
                            <span class="skill-tag">Prototyping</span>
                            <span class="skill-tag">User Research</span>
                        </div>
                        <div class="job-footer">
                            <div class="job-salary">
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>₹8-12 LPA</span>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyNowModal">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job 3 -->
                <div class="col-lg-6 job-item" data-category="marketing">
                    <div class="job-card fade-in">
                        <div class="job-header">
                            <div class="job-title-section">
                                <h4 class="job-title">Digital Marketing Manager</h4>
                                <span class="job-type">Full-time</span>
                            </div>
                            <div class="job-location">
                                <i class="ri-map-pin-line"></i>
                                <span>Delhi</span>
                            </div>
                        </div>
                        <div class="job-description">
                            <p>Lead our digital marketing efforts and drive growth through innovative marketing strategies and data-driven campaigns.</p>
                        </div>
                        <div class="job-skills">
                            <span class="skill-tag">SEO/SEM</span>
                            <span class="skill-tag">Google Ads</span>
                            <span class="skill-tag">Analytics</span>
                            <span class="skill-tag">Social Media</span>
                        </div>
                        <div class="job-footer">
                            <div class="job-salary">
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>₹10-15 LPA</span>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyNowModal">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job 4 -->
                <div class="col-lg-6 job-item" data-category="development">
                    <div class="job-card fade-in">
                        <div class="job-header">
                            <div class="job-title-section">
                                <h4 class="job-title">Mobile App Developer</h4>
                                <span class="job-type">Full-time</span>
                            </div>
                            <div class="job-location">
                                <i class="ri-map-pin-line"></i>
                                <span>Remote</span>
                            </div>
                        </div>
                        <div class="job-description">
                            <p>Build amazing mobile applications that millions of users will love. Work with cutting-edge mobile technologies.</p>
                        </div>
                        <div class="job-skills">
                            <span class="skill-tag">React Native</span>
                            <span class="skill-tag">Flutter</span>
                            <span class="skill-tag">iOS</span>
                            <span class="skill-tag">Android</span>
                        </div>
                        <div class="job-footer">
                            <div class="job-salary">
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>₹8-14 LPA</span>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyNowModal">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job 5 -->
                <div class="col-lg-6 job-item" data-category="management">
                    <div class="job-card fade-in">
                        <div class="job-header">
                            <div class="job-title-section">
                                <h4 class="job-title">Project Manager</h4>
                                <span class="job-type">Full-time</span>
                            </div>
                            <div class="job-location">
                                <i class="ri-map-pin-line"></i>
                                <span>Delhi / Hybrid</span>
                            </div>
                        </div>
                        <div class="job-description">
                            <p>Lead cross-functional teams to deliver high-quality projects on time and within budget. Drive project success from conception to completion.</p>
                        </div>
                        <div class="job-skills">
                            <span class="skill-tag">Agile</span>
                            <span class="skill-tag">Scrum</span>
                            <span class="skill-tag">Jira</span>
                            <span class="skill-tag">Leadership</span>
                        </div>
                        <div class="job-footer">
                            <div class="job-salary">
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>₹15-22 LPA</span>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyNowModal">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job 6 -->
                <div class="col-lg-6 job-item" data-category="design">
                    <div class="job-card fade-in">
                        <div class="job-header">
                            <div class="job-title-section">
                                <h4 class="job-title">Graphic Designer</h4>
                                <span class="job-type">Part-time</span>
                            </div>
                            <div class="job-location">
                                <i class="ri-map-pin-line"></i>
                                <span>Remote</span>
                            </div>
                        </div>
                        <div class="job-description">
                            <p>Create stunning visual content for our brand, marketing campaigns, and digital products. Bring creativity to life.</p>
                        </div>
                        <div class="job-skills">
                            <span class="skill-tag">Photoshop</span>
                            <span class="skill-tag">Illustrator</span>
                            <span class="skill-tag">InDesign</span>
                            <span class="skill-tag">Branding</span>
                        </div>
                        <div class="job-footer">
                            <div class="job-salary">
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>₹4-7 LPA</span>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyNowModal">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Application Process Section -->
<section class="application-process-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title fade-in">Our Hiring Process</h2>
                <p class="section-subtitle fade-in">
                    Simple, transparent, and designed to help you succeed.
                </p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="process-step fade-in">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="ri-file-text-line"></i>
                    </div>
                    <h4>Apply Online</h4>
                    <p>Submit your application through our website with your resume and cover letter.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step fade-in">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="ri-phone-line"></i>
                    </div>
                    <h4>Initial Screening</h4>
                    <p>Quick phone call to discuss your background and the role requirements.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step fade-in">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="ri-code-line"></i>
                    </div>
                    <h4>Technical Interview</h4>
                    <p>Showcase your skills through technical questions and practical exercises.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step fade-in">
                    <div class="step-number">4</div>
                    <div class="step-icon">
                        <i class="ri-team-line"></i>
                    </div>
                    <h4>Final Interview</h4>
                    <p>Meet with the team and discuss how you'll contribute to our mission.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Join Us Section -->
<section class="py-5" style="background: white;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Why Join GTCS?</h2>
            <p class="section-subtitle">Discover what makes GTCS a great place to build your career</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="text-center p-4">
                    <div class="service-icon development mx-auto mb-3">
                        <i class="ri-rocket-line"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Growth Opportunities</h5>
                    <p class="text-muted">Continuous learning and development programs to help you advance your career.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="text-center p-4">
                    <div class="service-icon marketing mx-auto mb-3">
                        <i class="ri-team-line"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Collaborative Culture</h5>
                    <p class="text-muted">Work with talented professionals in a supportive and inclusive environment.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="text-center p-4">
                    <div class="service-icon design mx-auto mb-3">
                        <i class="ri-scales-line"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Work-Life Balance</h5>
                    <p class="text-muted">Flexible working hours and remote work options to maintain healthy work-life balance.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="text-center p-4">
                    <div class="service-icon security mx-auto mb-3">
                        <i class="ri-gift-line"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Competitive Benefits</h5>
                    <p class="text-muted">Comprehensive benefits package including health insurance, paid time off, and more.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="text-center p-4">
                    <div class="service-icon development mx-auto mb-3">
                        <i class="ri-lightbulb-line"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Innovation Focus</h5>
                    <p class="text-muted">Work on cutting-edge projects and contribute to innovative solutions.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="text-center p-4">
                    <div class="service-icon marketing mx-auto mb-3">
                        <i class="ri-trophy-line"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Recognition Programs</h5>
                    <p class="text-muted">Regular recognition and rewards for outstanding performance and achievements.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="career-cta-section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="cta-content fade-in">
                    <h2>Ready to Start Your Journey?</h2>
                    <p>Don't see a perfect match? Send us your resume anyway! We're always looking for exceptional talent.</p>
                    <div class="cta-buttons">
                        <a href="#open-positions" class="btn btn-primary">Browse Jobs</a>
                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#applyNowModal">Send Resume</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <!-- ======== Modal – Application Form ========= -->
  <div
    class="modal fade text-dark"
    id="applyNowModal"
    tabindex="-1"
    aria-labelledby="applyNowModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">

        <form
          action="submit_application.php"
          method="POST"
          enctype="multipart/form-data"
        >
          <!-- Modal header -->
          <div class="modal-header">
            <h5 class="modal-title" id="applyNowModalLabel">
              Apply for this Role
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- Full Name -->
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input
                id="name"
                name="name"
                type="text"
                class="form-control text-dark border"
                placeholder="Enter Your Name"
                required
              />
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input
                id="email"
                name="email"
                type="email"
                class="form-control text-dark border"
                placeholder="Enter Your Email"
                required
              />
            </div>

            <!-- Phone -->
           <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input
                id="phone"
                name="phone"
                type="number"
                class="form-control text-dark border no-spinner"
                placeholder="Enter Phone"
                required
            />
            </div>

            <style>
            /* Hide spinner in Chrome, Safari, Edge */
        input[type=number].no-spinner::-webkit-inner-spin-button,
        input[type=number].no-spinner::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Hide spinner in Firefox */
        input[type=number].no-spinner {
        -moz-appearance: textfield;
        }
        </style>


            <!-- Resume upload -->
            <div class="mb-3">
              <label for="resume" class="form-label">Upload Resume</label>
              <input
                id="resume"
                name="resume"
                type="file"
                class="form-control text-dark border"
                accept=".pdf,.doc,.docx"
                required
              />
              <small class="text-muted">PDF, DOC, or DOCX · Max 2 MB</small>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">
              Submit Application
            </button>
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>



<script>
        document.addEventListener('DOMContentLoaded', function() {
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

            document.querySelectorAll('.fade-in').forEach(el => {
                observer.observe(el);
            });

            // Job filtering
            const filterButtons = document.querySelectorAll('.filter-btn');
            const jobItems = document.querySelectorAll('.job-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const filterValue = this.getAttribute('data-filter');

                    // Filter jobs
                    jobItems.forEach(item => {
                        if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                            item.classList.remove('hidden');
                            item.style.display = 'block';
                        } else {
                            item.classList.add('hidden');
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // Apply button functionality
            document.querySelectorAll('.apply-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const jobTitle = this.closest('.job-card').querySelector('.job-title').textContent;
                    alert(`Thank you for your interest in the ${jobTitle} position! Please send your resume to careers@gtcs.com with the job title in the subject line.`);
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
        });

       
        document.addEventListener('DOMContentLoaded', function() {
            // Form submission handling
            const form = document.getElementById('careerForm');
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Basic form validation
                if (validateForm()) {
                    // Show success message
                    showSuccessMessage();
                    
                    // Here you would typically submit the form data to your server
                    // For now, we'll just simulate a successful submission
                    setTimeout(() => {
                        form.reset();
                    }, 2000);
                }
            });
            
            function validateForm() {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.style.borderColor = '#ef4444';
                        isValid = false;
                    } else {
                        field.style.borderColor = '#22c55e';
                    }
                });
                
                // Validate file upload
                const resume = document.getElementById('resume');
                if (resume.files.length > 0) {
                    const file = resume.files[0];
                    const maxSize = 5 * 1024 * 1024; // 5MB
                    const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                    
                    if (file.size > maxSize) {
                        alert('Resume file size should be less than 5MB');
                        resume.style.borderColor = '#ef4444';
                        isValid = false;
                    } else if (!allowedTypes.includes(file.type)) {
                        alert('Please upload a PDF or DOC file for your resume');
                        resume.style.borderColor = '#ef4444';
                        isValid = false;
                    } else {
                        resume.style.borderColor = '#22c55e';
                    }
                }
                
                return isValid;
            }
            
            function showSuccessMessage() {
                const successAlert = document.createElement('div');
                successAlert.className = 'alert alert-success position-fixed top-0 start-50 translate-middle-x mt-3';
                successAlert.style.zIndex = '9999';
                successAlert.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="ri-check-line me-2"></i>
                        <strong>Application Submitted Successfully!</strong> We'll get back to you within 24 hours.
                    </div>
                `;
                
                document.body.appendChild(successAlert);
                
                setTimeout(() => {
                    successAlert.remove();
                }, 5000);
            }
            
            // Real-time validation
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.hasAttribute('required') && !this.value.trim()) {
                        this.style.borderColor = '#ef4444';
                    } else {
                        this.style.borderColor = '#22c55e';
                    }
                });
            });
        });

</script>

<?php 
 include "components/footer.php";
?>