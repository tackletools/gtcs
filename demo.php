<?php
include 'components/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Section - Global Tech Consultancy</title>
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
            line-height: 1.4;
            overflow-x: hidden;
            font-size: 16px;
        }

        /* Hero Section */
        .hero-section {
            height: 60vh;
            min-height: 500px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 1rem 0;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            pointer-events: none;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 60%;
            height: 150%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.3; }
            50% { transform: scale(1.1) rotate(180deg); opacity: 0.1; }
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 0.4rem 0.8rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 1rem;
            animation: slideInDown 0.8s ease-out;
        }

        .hero-badge i {
            margin-right: 0.4rem;
            color: #fbbf24;
            font-size: 0.9rem;
        }
        
        .hero-title {
            font-size: clamp(1.8rem, 4vw, 3rem);
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            line-height: 1.2;
            animation: slideInLeft 0.8s ease-out 0.2s both;
        }

        .hero-title .highlight {
            background: var(--gradient-secondary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-subtitle {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 1.5rem;
            font-weight: 400;
            max-width: 90%;
            line-height: 1.5;
            animation: slideInLeft 0.8s ease-out 0.4s both;
        }
        
        .hero-buttons {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
            animation: slideInUp 0.8s ease-out 0.8s both;
        }

        .btn-primary-hero {
            background: var(--gradient-secondary);
            border: none;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            border-radius: 25px;
            color: white;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-primary-hero:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
            color: white;
        }

        .btn-primary-hero i {
            margin-left: 0.4rem;
            font-size: 0.8rem;
        }

        .btn-secondary-hero {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            border-radius: 25px;
            color: white;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-secondary-hero:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
            color: white;
        }

        .btn-secondary-hero i {
            margin-right: 0.4rem;
            font-size: 0.8rem;
        }
        
        .hero-image {
            position: relative;
            z-index: 2;
            text-align: center;
            animation: slideInRight 0.8s ease-out 0.4s both;
        }

        .hero-visual {
            position: relative;
            display: inline-block;
            max-width: 100%;
        }
        
        .hero-visual img {
            width: 100%;
            height: auto;
            max-height: 35vh;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
            border-radius: 12px;
            animation: float 3s ease-in-out infinite;
            object-fit: cover;
        }

        .floating-elements {
            position: absolute;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 2s ease-in-out infinite reverse;
        }

        .floating-elements i {
            color: white;
            font-size: 1rem;
        }

        .floating-elements:nth-child(2) {
            top: 10%;
            right: 10%;
        }

        .floating-elements:nth-child(3) {
            top: 60%;
            left: 5%;
            animation-delay: -1s;
            background: rgba(99, 102, 241, 0.2);
        }

        .floating-elements:nth-child(4) {
            top: 20%;
            left: 15%;
            animation-delay: -2s;
            background: rgba(245, 158, 11, 0.2);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(3deg); }
        }

        @keyframes slideInDown {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes slideInLeft {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes slideInRight {
            from { transform: translateX(20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes slideInUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: clamp(1.6rem, 4vw, 2.5rem);
            }
            .hero-subtitle {
                font-size: clamp(0.85rem, 2vw, 1rem);
            }
        }

        @media (max-width: 992px) {
            .hero-section {
                min-height: 450px;
                padding: 0.8rem 0;
            }
            .hero-title {
                font-size: clamp(1.5rem, 4vw, 2.2rem);
                margin-bottom: 0.8rem;
            }
            .hero-subtitle {
                font-size: clamp(0.8rem, 2vw, 0.95rem);
                margin-bottom: 1.2rem;
                max-width: 95%;
            }
            .hero-visual img {
                max-height: 30vh;
            }
            .floating-elements {
                width: 35px;
                height: 35px;
            }
            .floating-elements i {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                text-align: center;
                min-height: 400px;
                padding: 0.6rem 0;
            }
            .hero-badge {
                padding: 0.3rem 0.6rem;
                font-size: 0.75rem;
                margin-bottom: 0.8rem;
            }
            .hero-title {
                font-size: clamp(1.3rem, 5vw, 1.8rem);
                margin-bottom: 0.6rem;
            }
            .hero-subtitle {
                font-size: clamp(0.75rem, 2.5vw, 0.85rem);
                margin-bottom: 1rem;
                max-width: 100%;
            }
            .hero-buttons {
                justify-content: center;
                gap: 0.6rem;
                flex-direction: column;
                align-items: center;
            }
            .btn-primary-hero,
            .btn-secondary-hero {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
                width: 100%;
                max-width: 200px;
                justify-content: center;
            }
            .hero-image {
                margin-top: 1rem;
                order: -1;
            }
            .hero-visual {
                max-width: 280px;
                margin: 0 auto;
            }
            .hero-visual img {
                max-height: 25vh;
            }
            .floating-elements {
                width: 30px;
                height: 30px;
            }
            .floating-elements i {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                min-height: 350px;
                padding: 0.5rem 0;
            }
            .container-fluid {
                padding: 0 0.8rem;
            }
            .hero-badge {
                padding: 0.25rem 0.5rem;
                font-size: 0.7rem;
                margin-bottom: 0.6rem;
            }
            .hero-title {
                font-size: clamp(1.1rem, 6vw, 1.5rem);
                margin-bottom: 0.5rem;
            }
            .hero-subtitle {
                font-size: clamp(0.7rem, 3vw, 0.8rem);
                margin-bottom: 0.8rem;
                line-height: 1.4;
            }
            .btn-primary-hero,
            .btn-secondary-hero {
                padding: 0.45rem 0.8rem;
                font-size: 0.75rem;
                border-radius: 20px;
                max-width: 180px;
            }
            .hero-visual {
                max-width: 240px;
            }
            .hero-visual img {
                max-height: 20vh;
                border-radius: 10px;
            }
            .floating-elements {
                width: 25px;
                height: 25px;
            }
            .floating-elements i {
                font-size: 0.7rem;
            }
        }

        @media (max-width: 480px) {
            .hero-section {
                min-height: 320px;
                padding: 0.4rem 0;
            }
            .container-fluid {
                padding: 0 0.6rem;
            }
            .hero-title {
                font-size: clamp(1rem, 7vw, 1.3rem);
            }
            .hero-subtitle {
                font-size: clamp(0.65rem, 3.5vw, 0.75rem);
            }
            .btn-primary-hero,
            .btn-secondary-hero {
                padding: 0.4rem 0.7rem;
                font-size: 0.7rem;
                max-width: 160px;
            }
            .hero-visual {
                max-width: 200px;
            }
            .hero-visual img {
                max-height: 18vh;
            }
            .floating-elements {
                width: 20px;
                height: 20px;
            }
            .floating-elements i {
                font-size: 0.6rem;
            }
        }

        /* Extra small screens */
        @media (max-width: 360px) {
            .hero-section {
                min-height: 300px;
            }
            .hero-title {
                font-size: clamp(0.9rem, 8vw, 1.2rem);
            }
            .hero-subtitle {
                font-size: clamp(0.6rem, 4vw, 0.7rem);
            }
            .hero-visual {
                max-width: 180px;
            }
            .hero-visual img {
                max-height: 15vh;
            }
        }

        /* Landscape mobile optimization */
        @media (max-height: 500px) and (orientation: landscape) {
            .hero-section {
                height: 90vh;
                min-height: 300px;
                padding: 0.5rem 0;
            }
            .hero-title {
                font-size: clamp(1.2rem, 4vh, 1.6rem);
                margin-bottom: 0.4rem;
            }
            .hero-subtitle {
                font-size: clamp(0.7rem, 2vh, 0.85rem);
                margin-bottom: 0.8rem;
            }
            .hero-visual img {
                max-height: 25vh;
            }
        }

        /* Ultra-wide screens */
        @media (min-width: 1400px) {
            .hero-title {
                font-size: clamp(2.5rem, 3vw, 3.2rem);
            }
            .hero-subtitle {
                font-size: clamp(1rem, 1.5vw, 1.2rem);
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container-fluid px-2">
            <div class="row align-items-center h-100 g-3">
                <div class="col-lg-6 hero-content">
                    <div class="hero-badge">
                        <i class="ri-star-fill"></i>
                        Trusted by 500+ Global Clients
                    </div>
                    
                    <h1 class="hero-title">
                        Transform Your Business with 
                        <span class="highlight">Expert Tech Solutions</span>
                    </h1>
                    
                    <p class="hero-subtitle">
                        From custom software development to digital marketing, we deliver cutting-edge technology solutions that drive growth and innovation for your business.
                    </p>
                    
                    <div class="hero-buttons">
                        <a href="#services" class="btn-primary-hero">
                            Get Started <i class="ri-arrow-right-line"></i>
                        </a>
                        <a href="#about" class="btn-secondary-hero">
                            <i class="ri-play-circle-line"></i> Watch Demo
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-6 hero-image">
                    <div class="hero-visual">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Technology Solutions">
                        
                        <div class="floating-elements">
                            <i class="ri-code-s-slash-line"></i>
                        </div>
                        <div class="floating-elements">
                            <i class="ri-smartphone-line"></i>
                        </div>
                        <div class="floating-elements">
                            <i class="ri-rocket-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
include 'components/footer.php';
?>
