<?php
$current_page = 'gamedevelopment';
include 'components/header.php';
?>
    
    <style>
        :root {
            --primary-color: #8b5cf6;
            --primary-dark: #7c3aed;
            --secondary-color: #f59e0b;
            --accent-color: #06b6d4;
            --dark-color: #0f172a;
            --light-color: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #8b5cf6 0%, #3b82f6 100%);
            --gradient-gaming: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            --gradient-development: linear-gradient(135deg, #00d2d3 0%, #54a0ff 100%);
        }
        .section-spacing {
            padding: 1.5rem 0;
        }
        
        .hero-game {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }
        
        .hero-game::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff05" points="200,200 300,150 400,200 350,300 250,300"/><polygon fill="%23ffffff03" points="700,300 850,250 900,400 750,450 650,400"/><circle fill="%23ffffff05" cx="150" cy="600" r="60"/></svg>');
            pointer-events: none;
        }
        
        .game-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-gaming);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }
        
        .service-card-game {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .service-card-game:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }
        
        .genre-card {
            background: linear-gradient(135deg, #8b5cf620 0%, #3b82f620 100%);
            border: 1px solid #8b5cf630;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .genre-card:hover {
            background: linear-gradient(135deg, #8b5cf630 0%, #3b82f630 100%);
            transform: translateX(4px);
        }
        
        .platform-feature {
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
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.15);
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
        
        .bg-game-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-game {
            background: var(--gradient-gaming);
            border: none;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-game:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
            color: white;
        }
        
        .btn-outline-game {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-game:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }

        .industry-card {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .industry-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.15);
            border-color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            .section-spacing {
                padding: 1rem 0;
            }
            
            .hero-game {
                padding: 1.5rem 0;
            }
            
            .game-icon{
                margin-top: 25px;
            }
            
            .service-card-game {
                padding: 1rem;
                margin-bottom: 1rem;
            }
        }
        /* Pricing section button anchor styles */
.pricing-card .btn a {
    text-decoration: none;
    color: inherit;
    display: block;
    width: 100%;
    height: 100%;
}

.pricing-card .btn a:hover {
    text-decoration: none;
    color: inherit;
}

.pricing-card .btn a:focus {
    text-decoration: none;
    color: inherit;
}

.pricing-card .btn a:active {
    text-decoration: none;
    color: inherit;
}

.pricing-card .btn a:visited {
    text-decoration: none;
    color: inherit;
}

/* Ensure buttons maintain their styling */
.pricing-card .btn-outline-game a {
    color: var(--primary-color);
}

.pricing-card .btn-outline-game:hover a {
    color: white;
}

.pricing-card .btn-game a {
    color: white;
}

.pricing-card .btn-game:hover a {
    color: white;
}
    </style>

    <!-- Hero Section -->
    <section class="hero-game">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-white">
                        <h1 class="display-6 fw-bold mb-2">Game Development Services</h1>
                        <p class="lead mb-3 fs-6">Bring your gaming vision to life with our comprehensive game development solutions. From concept to deployment across all platforms.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="./contact.php"><button class="btn btn-game">Start Your Game</button></a>
                            <a href="./freeguide.php"><button class="btn btn-outline-light btn-sm">Free Consultation</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="game-icon mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="ri-gamepad-line"></i>
                    </div>
                    <h4 class="text-white mb-2">Full-Stack Game Development</h4>
                    <p class="text-white-50 small">Unity, Unreal Engine, and custom solutions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Game Development Services -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Game Development Services</h2>
                    <p class="text-muted small">End-to-end game development for all platforms</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-game">
                        <div class="game-icon">
                            <i class="ri-smartphone-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Mobile Game Development</h5>
                        <p class="small text-muted mb-2">iOS and Android games with engaging gameplay and monetization strategies.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Native iOS & Android Development</li>
                            <li><i class="ri-check-line"></i>Cross-platform Solutions</li>
                            <li><i class="ri-check-line"></i>In-app Purchase Integration</li>
                            <li><i class="ri-check-line"></i>Social Features & Leaderboards</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-game">
                        <div class="game-icon">
                            <i class="ri-computer-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">PC & Console Games</h5>
                        <p class="small text-muted mb-2">High-quality games for Steam, PlayStation, Xbox, and Nintendo Switch platforms.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Steam Integration</li>
                            <li><i class="ri-check-line"></i>Console Certification</li>
                            <li><i class="ri-check-line"></i>Multi-platform Deployment</li>
                            <li><i class="ri-check-line"></i>Achievement Systems</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-game">
                        <div class="game-icon">
                            <i class="ri-global-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Web & Browser Games</h5>
                        <p class="small text-muted mb-2">HTML5 and WebGL games that run seamlessly in web browsers.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>HTML5 & WebGL Technology</li>
                            <li><i class="ri-check-line"></i>Progressive Web Apps</li>
                            <li><i class="ri-check-line"></i>Social Media Integration</li>
                            <li><i class="ri-check-line"></i>Real-time Multiplayer</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-game">
                        <div class="game-icon">
                            <i class="ri-rocket-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">VR/AR Games</h5>
                        <p class="small text-muted mb-2">Immersive virtual and augmented reality gaming experiences.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>Oculus & HTC Vive Support</li>
                            <li><i class="ri-check-line"></i>ARKit & ARCore Integration</li>
                            <li><i class="ri-check-line"></i>Spatial Audio Implementation</li>
                            <li><i class="ri-check-line"></i>Hand Tracking & Gestures</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-game">
                        <div class="game-icon">
                            <i class="ri-palette-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Game Art & Design</h5>
                        <p class="small text-muted mb-2">2D/3D art assets, character design, and UI/UX for games.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>2D & 3D Asset Creation</li>
                            <li><i class="ri-check-line"></i>Character & Environment Design</li>
                            <li><i class="ri-check-line"></i>Animation & Rigging</li>
                            <li><i class="ri-check-line"></i>UI/UX Design</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-game">
                        <div class="game-icon">
                            <i class="ri-rocket-line"></i>
                        </div>
                        <h5 class="h6 fw-bold mb-2">Game Publishing & Marketing</h5>
                        <p class="small text-muted mb-2">App store optimization, marketing campaigns, and community management.</p>
                        <ul class="list-unstyled feature-list">
                            <li><i class="ri-check-line"></i>App Store Optimization</li>
                            <li><i class="ri-check-line"></i>Marketing Campaign Management</li>
                            <li><i class="ri-check-line"></i>Community Building</li>
                            <li><i class="ri-check-line"></i>Analytics & Performance Tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Game Genres -->
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Game Genres We Excel In</h3>
                    <p class="text-muted small mb-3">Expertise across diverse gaming categories</p>
                    
                    <div class="genre-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-sword-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Action & Adventure</h6>
                                <p class="small text-muted mb-0">Fast-paced games with engaging combat systems and storytelling.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="genre-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-brain-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Puzzle & Strategy</h6>
                                <p class="small text-muted mb-0">Mind-bending puzzles and strategic gameplay mechanics.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="genre-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-team-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Multiplayer & Social</h6>
                                <p class="small text-muted mb-0">Connected gaming experiences with social features.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="genre-card">
                        <div class="d-flex align-items-start">
                            <i class="ri-car-line text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 small">Racing & Sports</h6>
                                <p class="small text-muted mb-0">High-performance racing and realistic sports simulations.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h3 class="h4 fw-bold mb-2">Platform Capabilities</h3>
                    <p class="text-muted small mb-3">Multi-platform development expertise</p>
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="platform-feature">
                                <i class="ri-apple-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">iOS Development</h6>
                                <p class="small text-muted mb-0">Native iOS games with App Store optimization.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="platform-feature">
                                <i class="ri-android-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Android Development</h6>
                                <p class="small text-muted mb-0">Google Play Store ready Android games.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="platform-feature">
                                <i class="ri-steam-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Steam Platform</h6>
                                <p class="small text-muted mb-0">PC games with Steam Workshop integration.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="platform-feature">
                                <i class="ri-xbox-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Console Gaming</h6>
                                <p class="small text-muted mb-0">PlayStation, Xbox, and Nintendo Switch.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="platform-feature">
                                <i class="ri-cloud-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Cloud Gaming</h6>
                                <p class="small text-muted mb-0">Cloud-based gaming solutions and streaming.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="platform-feature">
                                <i class="ri-settings-3-line text-primary mb-1"></i>
                                <h6 class="fw-bold small mb-1">Custom Engines</h6>
                                <p class="small text-muted mb-0">Tailored game engines for specific needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Game Development Stats -->
    <section class="section-spacing bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">150+</h3>
                        <p class="small mb-0">Games Developed</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-counter">
                        <h3 class="h2 fw-bold mb-1">50M+</h3>
                        <p class="small mb-0">Total Downloads</p>
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
                        <h3 class="h2 fw-bold mb-1">4.8★</h3>
                        <p class="small mb-0">Average Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Development Process -->
    <section class="section-spacing">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h2 class="h4 fw-bold text-gradient mb-1">Our Development Process</h2>
                    <p class="text-muted small">From concept to launch - structured game development</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-2">Concept & Design</h6>
                        <p class="small text-muted">Game concept development, mechanics design, and technical planning.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-2">Prototyping</h6>
                        <p class="small text-muted">Create playable prototypes to validate core gameplay mechanics.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-2">Development</h6>
                        <p class="small text-muted">Full game development with regular builds and milestone reviews.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-2">Launch & Support</h6>
                        <p class="small text-muted">Game deployment, marketing support, and post-launch updates.</p>
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
                    <h2 class="h4 fw-bold text-gradient mb-1">Development Packages</h2>
                    <p class="text-muted small">Choose the right development approach for your game</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="pricing-card">
                        <h5 class="h6 fw-bold mb-2">Indie Game</h5>
                        <div class="h3 fw-bold text-primary mb-2">$5K<span class="small text-muted">+</span></div>
                        <p class="small text-muted mb-3">Perfect for small indie game projects</p>
                        <ul class="list-unstyled feature-list mb-3">
                            <li><i class="ri-check-line"></i>Simple 2D Game Development</li>
                            <li><i class="ri-check-line"></i>Single Platform (Mobile/PC)</li>
                            <li><i class="ri-check-line"></i>Basic Art & Animation</li>
                            <li><i class="ri-check-line"></i>Sound Effects & Music</li>
                            <li><i class="ri-check-line"></i>App Store Submission</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-game w-100">Get Started</button></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-card featured">
                        <div class="badge bg-primary mb-2 small">Most Popular</div>
                        <h5 class="h6 fw-bold mb-2">Professional Game</h5>
                        <div class="h3 fw-bold text-primary mb-2">$25K<span class="small text-muted">+</span></div>
                        <p class="small text-muted mb-3">Comprehensive game development solution</p>
                        <ul class="list-unstyled feature-list mb-3">
                            <li><i class="ri-check-line"></i>Advanced 2D/3D Development</li>
                            <li><i class="ri-check-line"></i>Multi-platform Release</li>
                            <li><i class="ri-check-line"></i>Professional Art & Animation</li>
                            <li><i class="ri-check-line"></i>Multiplayer Features</li>
                            <li><i class="ri-check-line"></i>Marketing Support</li>
                            <li><i class="ri-check-line"></i>Post-launch Updates</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-game w-100">Get Started</button></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-card">
                        <h5 class="h6 fw-bold mb-2">AAA Production</h5>
                        <div class="h3 fw-bold text-primary mb-2">$100K<span class="small text-muted">+</span></div>
                        <p class="small text-muted mb-3">Enterprise-level game development</p>
                        <ul class="list-unstyled feature-list mb-3">
                            <li><i class="ri-check-line"></i>High-end 3D Game Development</li>
                            <li><i class="ri-check-line"></i>All Major Platforms</li>
                            <li><i class="ri-check-line"></i>Premium Art & Cinematics</li>
                            <li><i class="ri-check-line"></i>Advanced Multiplayer Systems</li>
                            <li><i class="ri-check-line"></i>Full Marketing Campaign</li>
                            <li><i class="ri-check-line"></i>Dedicated Support Team</li>
                        </ul>
                        <a href="./contact.php"><button class="btn btn-outline-game w-100">Contact Sales</button></a>
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
include 'components/footer.php';
?>