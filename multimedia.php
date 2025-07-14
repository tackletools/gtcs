<?php 
$current_page = 'multimedia';
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
            --gradient-multimedia: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            --gradient-creative: linear-gradient(135deg, #00d2d3 0%, #54a0ff 100%);
        }
        .section-spacing {
            padding: 1.5rem 0;
        }
        
        .hero-multimedia {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }
        
        .hero-multimedia::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="%23ffffff05" cx="200" cy="200" r="100"/><circle fill="%23ffffff03" cx="800" cy="400" r="150"/><circle fill="%23ffffff05" cx="400" cy="700" r="80"/></svg>');
            pointer-events: none;
        }
        
        .multimedia-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-multimedia);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }
        
        .service-card-multimedia {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .service-card-multimedia:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }
        
        .media-card {
            background: linear-gradient(135deg, #ff6b6b20 0%, #ee5a2420 100%);
            border: 1px solid #ff6b6b30;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .media-card:hover {
            background: linear-gradient(135deg, #ff6b6b30 0%, #ee5a2430 100%);
            transform: translateX(4px);
        }
        
        .creative-feature {
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
        
        .bg-multimedia-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-multimedia {
            background: var(--gradient-multimedia);
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-multimedia:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
            color: white;
        }
        
        .btn-outline-multimedia {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-multimedia:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }
        
        .industry-card {
            background: white;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .industry-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
        }
        
        @media (max-width: 768px) {
            .section-spacing {
                padding: 1rem 0;
            }
            
            .hero-multimedia {
                padding: 1.5rem 0;
            }
            
            .multimedia-icon{
                margin-top: 25px;
            }
            
            .service-card-multimedia {
                padding: 1rem;
                margin-bottom: 1rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-multimedia">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-white">
                        <h1 class="display-6 fw-bold mb-2">Multimedia Services</h1>
                        <p class="lead mb-3 fs-6">Transform your ideas into stunning visual experiences with our comprehensive multimedia solutions. Creative design, video production, and digital content creation.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="./contact.php"><button class="btn btn-multimedia">Start Your Project</button></a>
                            <a href="./freeguide.php"><button class="btn btn-outline-light btn-sm">Free Consultation</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="multimedia-icon mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="ri-play-circle-line"></i>
                    </div>
                    <h4 class="text-white mb-2">Creative Excellence</h4>
                    <p class="text-white-50 small">Professional multimedia solutions for all your needs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Multimedia Services -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Multimedia Services</h2>
                    <p class="text-muted small">Creative solutions for digital and traditional media</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-multimedia">
                        <div class="multimedia-icon">
                            <i class="ri-video-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Video Production</h5>
                        <p class="small text-muted mb-2">Professional video creation from concept to final cut, including corporate videos, commercials, and documentaries.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Corporate Video Production</li>
                            <li><i class="ri-check-line"></i>Commercial & Advertisement</li>
                            <li><i class="ri-check-line"></i>Documentary Filming</li>
                            <li><i class="ri-check-line"></i>Event Coverage</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-multimedia">
                        <div class="multimedia-icon">
                            <i class="ri-image-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Graphic Design</h5>
                        <p class="small text-muted mb-2">Creative visual design solutions for branding, marketing materials, and digital assets.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Brand Identity Design</li>
                            <li><i class="ri-check-line"></i>Marketing Materials</li>
                            <li><i class="ri-check-line"></i>Digital Graphics</li>
                            <li><i class="ri-check-line"></i>Print Design</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-multimedia">
                        <div class="multimedia-icon">
                            <i class="ri-music-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Audio Production</h5>
                        <p class="small text-muted mb-2">Professional audio recording, editing, and mixing for various multimedia projects.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Voice Over Recording</li>
                            <li><i class="ri-check-line"></i>Sound Design</li>
                            <li><i class="ri-check-line"></i>Music Production</li>
                            <li><i class="ri-check-line"></i>Podcast Creation</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-multimedia">
                        <div class="multimedia-icon">
                            <i class="ri-camera-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Photography</h5>
                        <p class="small text-muted mb-2">Professional photography services for commercial, corporate, and creative projects.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Commercial Photography</li>
                            <li><i class="ri-check-line"></i>Product Photography</li>
                            <li><i class="ri-check-line"></i>Portrait & Headshots</li>
                            <li><i class="ri-check-line"></i>Event Photography</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-multimedia">
                        <div class="multimedia-icon">
                            <i class="ri-movie-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Animation & Motion Graphics</h5>
                        <p class="small text-muted mb-2">Dynamic animations and motion graphics for engaging visual storytelling.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>2D & 3D Animation</li>
                            <li><i class="ri-check-line"></i>Motion Graphics</li>
                            <li><i class="ri-check-line"></i>Explainer Videos</li>
                            <li><i class="ri-check-line"></i>Character Animation</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-multimedia">
                        <div class="multimedia-icon">
                            <i class="ri-global-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Interactive Media</h5>
                        <p class="small text-muted mb-2">Interactive multimedia experiences including web content, presentations, and digital installations.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Interactive Presentations</li>
                            <li><i class="ri-check-line"></i>Web Multimedia</li>
                            <li><i class="ri-check-line"></i>Digital Installations</li>
                            <li><i class="ri-check-line"></i>Virtual Reality Content</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Types -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Content We Create</h3>
                    <p class="text-muted small mb-3">Diverse multimedia content for various platforms and purposes</p>
                    
                    <div class="media-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-tv-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Promotional Videos</h6>
                                <p class="small text-muted mb-0">Engaging promotional content for marketing campaigns and brand awareness.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="media-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-book-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Educational Content</h6>
                                <p class="small text-muted mb-0">Instructional videos, e-learning modules, and training materials.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="media-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-presentation-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Corporate Presentations</h6>
                                <p class="small text-muted mb-0">Professional presentations with multimedia elements for business communication.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="media-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-share-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Social Media Content</h6>
                                <p class="small text-muted mb-0">Platform-optimized content for social media marketing and engagement.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Our Creative Features</h3>
                    <p class="text-muted small mb-3">Advanced tools and techniques for exceptional multimedia production</p>
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="creative-feature">
                                <i class="ri-4k-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">4K Quality</h6>
                                <p class="small text-muted mb-0">Ultra-high definition video and image production.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="creative-feature">
                                <i class="ri-palette-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Color Grading</h6>
                                <p class="small text-muted mb-0">Professional color correction and grading services.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="creative-feature">
                                <i class="ri-sound-module-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Audio Engineering</h6>
                                <p class="small text-muted mb-0">High-quality audio mixing and mastering.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="creative-feature">
                                <i class="ri-flashlight-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Visual Effects</h6>
                                <p class="small text-muted mb-0">Advanced VFX and post-production effects.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="creative-feature">
                                <i class="ri-smartphone-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Mobile Optimization</h6>
                                <p class="small text-muted mb-0">Content optimized for mobile viewing and engagement.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="creative-feature">
                                <i class="ri-time-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Fast Turnaround</h6>
                                <p class="small text-muted mb-0">Quick delivery without compromising quality.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Multimedia Stats -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">500+</h3>
                        <p class="small mb-0">Projects Completed</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">48hrs</h3>
                        <p class="small mb-0">Average Turnaround</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">200+</h3>
                        <p class="small mb-0">Happy Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">5★</h3>
                        <p class="small mb-0">Average Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Creative Process -->
    <section class="section-spacing">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Creative Process</h2>
                    <p class="text-muted small">From concept to final delivery in four simple steps</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-2">Discovery</h6>
                        <p class="small text-muted">Understanding your vision, goals, and target audience for the project.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-2">Planning</h6>
                        <p class="small text-muted">Detailed project planning, storyboarding, and timeline development.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-2">Production</h6>
                        <p class="small text-muted">Professional execution using state-of-the-art equipment and techniques.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-2">Delivery</h6>
                        <p class="small text-muted">Final review, revisions, and delivery in your preferred format.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Pricing Section -->
    <section class="section-spacing">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="h4 fw-bold mb-2 text-gradient">Multimedia Service Packages</h2>
                <p class="text-muted small">Choose the perfect package for your creative needs</p>
            </div>
        </div>
        <div class="row g-4">
            <!-- Basic Package -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card-multimedia h-100">
                    <div class="multimedia-icon">
                        <i class="ri-play-line"></i>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="h6 fw-bold mb-0">Basic Package</h5>
                        <span class="badge bg-secondary small">Starter</span>
                    </div>
                    <div class="mb-3">
                        <h3 class="h4 fw-bold text-primary mb-1">$499</h3>
                        <p class="small text-muted">Starting from</p>
                    </div>
                    <ul class="list-unstyled feature-list mb-3">
                        <li><i class="ri-check-line"></i>1 Video Project (Up to 2 minutes)</li>
                        <li><i class="ri-check-line"></i>Basic Graphics Package</li>
                        <li><i class="ri-check-line"></i>Standard Audio Editing</li>
                        <li><i class="ri-check-line"></i>2 Revisions Included</li>
                        <li><i class="ri-check-line"></i>48-Hour Turnaround</li>
                        <li><i class="ri-check-line"></i>HD Quality Output</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="./contact.php"><button class="btn btn-outline-multimedia w-100">
                            Get Started
                        </button></a>
                    </div>
                </div>
            </div>
            
            <!-- Professional Package -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card-multimedia h-100 position-relative">
                    <div class="position-absolute top-0 start-50 translate-middle">
                        <span class="badge bg-primary small">Most Popular</span>
                    </div>
                    <div class="multimedia-icon">
                        <i class="ri-movie-line"></i>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="h6 fw-bold mb-0">Professional Package</h5>
                        <span class="badge bg-primary small">Pro</span>
                    </div>
                    <div class="mb-3">
                        <h3 class="h4 fw-bold text-primary mb-1">$999</h3>
                        <p class="small text-muted">Starting from</p>
                    </div>
                    <ul class="list-unstyled feature-list mb-3">
                        <li><i class="ri-check-line"></i>Up to 3 Video Projects (5 minutes each)</li>
                        <li><i class="ri-check-line"></i>Advanced Graphics & Animation</li>
                        <li><i class="ri-check-line"></i>Professional Audio Production</li>
                        <li><i class="ri-check-line"></i>Photography Session Included</li>
                        <li><i class="ri-check-line"></i>Unlimited Revisions</li>
                        <li><i class="ri-check-line"></i>4K Quality Output</li>
                        <li><i class="ri-check-line"></i>Color Grading & VFX</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="./contact.php"><button class="btn btn-multimedia w-100">
                            Choose Pro
                        </button></a>
                    </div>
                </div>
            </div>
            
            <!-- Enterprise Package -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card-multimedia h-100">
                    <div class="multimedia-icon">
                        <i class="ri-global-line"></i>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="h6 fw-bold mb-0">Enterprise Package</h5>
                        <span class="badge bg-warning small">Premium</span>
                    </div>
                    <div class="mb-3">
                        <h3 class="h4 fw-bold text-primary mb-1">$1999</h3>
                        <p class="small text-muted">Starting from</p>
                    </div>
                    <ul class="list-unstyled feature-list mb-3">
                        <li><i class="ri-check-line"></i>Unlimited Video Projects</li>
                        <li><i class="ri-check-line"></i>Complete Brand Package</li>
                        <li><i class="ri-check-line"></i>Studio-Quality Audio</li>
                        <li><i class="ri-check-line"></i>Professional Photography</li>
                        <li><i class="ri-check-line"></i>Interactive Media Content</li>
                        <li><i class="ri-check-line"></i>24/7 Support</li>
                        <li><i class="ri-check-line"></i>Dedicated Project Manager</li>
                        <li><i class="ri-check-line"></i>Rush Delivery Available</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="./contact.php"><button class="btn btn-outline-multimedia w-100">
                            Contact Sales
                        </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Industries We Serve -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-2">Industries We Serve</h2>
                    <p class="text-muted small">Creative multimedia solutions across diverse sectors</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-tv-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Entertainment</p>
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
                        <i class="ri-building-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Corporate</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-hospital-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Healthcare</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-shopping-cart-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">E-commerce</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-restaurant-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Food & Beverage</p>
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
                        <i class="ri-home-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Real Estate</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-shirt-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Fashion</p>
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
                        <i class="ri-service-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Services</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="industry-card p-3 rounded">
                        <i class="ri-briefcase-line h4 text-primary mb-2"></i>
                        <p class="small fw-medium mb-0">Professional</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
 include "components/footer.php";
?>