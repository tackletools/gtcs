<?php
include 'components/header.php';
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
            --gradient-success: linear-gradient(135deg, #26de81 0%, #20bf6b 100%); /* Added for stat-icon.clients */
        }
    
    /* Hero Section */
        .hero-section {
            max-height: 60vh;
            min-height: 60vh;
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
            border-radius: 20px;
            padding: 0.3rem 0.8rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.75rem;
            font-weight: 500;
            margin-bottom: 0.8rem;
            animation: slideInDown 0.8s ease-out;
        }

        .hero-badge i {
            margin-right: 0.4rem;
            color: #fbbf24;
            font-size: 0.8rem;
        }
        
        .hero-title {
            font-size: clamp(1.5rem, 4vw, 2.2rem);
            font-weight: 700;
            color: white;
            margin-bottom: 0.6rem;
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
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 1.2rem;
            font-weight: 400;
            max-width: 90%;
            animation: slideInLeft 0.8s ease-out 0.4s both;
        }
        
        .hero-buttons {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
            animation: slideInUp 0.8s ease-out 0.6s both;
        }

        .btn-primary-hero {
            background: var(--gradient-secondary);
            border: none;
            padding: 0.5rem 1.2rem;
            font-weight: 600;
            border-radius: 20px;
            color: white;
            font-size: 0.8rem;
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
            font-size: 0.75rem;
        }

        .btn-secondary-hero {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            border-radius: 20px;
            color: white;
            font-size: 0.8rem;
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
            font-size: 0.75rem;
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
        }
        
        .hero-visual img {
            max-width: 100%;
            height: auto;
            max-height: 45vh;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
            border-radius: 15px;
            animation: float 3s ease-in-out infinite;
        }

        .floating-elements {
            position: absolute;
            top: 10%;
            right: 10%;
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
            top: 60%;
            left: 5%;
            animation-delay: -1s;
            background: rgba(99, 102, 241, 0.2);
        }

        .floating-elements:nth-child(3) {
            top: 20%;
            left: 15%;
            animation-delay: -2s;
            background: rgba(245, 158, 11, 0.2);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }

        @keyframes slideInDown {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes slideInLeft {
            from { transform: translateX(-30px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes slideInRight {
            from { transform: translateX(30px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes slideInUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        /* Responsive Design */
        @media (max-width: 991px) {
            .hero-section {
                min-height: 70vh;
                max-height: 70vh;
            }

            .hero-content {
                margin-bottom: 2rem;
            }

            .hero-visual img {
                max-height: 40vh;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                text-align: center;
                min-height: 65vh;
                max-height: 65vh;
                padding: 0.8rem 0;
            }

            .hero-content {
                margin-bottom: 1.5rem;
            }

            .hero-title {
                font-size: 1.6rem;
                margin-bottom: 0.5rem;
            }

            .hero-subtitle {
                font-size: 0.85rem;
                margin-bottom: 1rem;
                max-width: 100%;
            }

            .hero-buttons {
                justify-content: center;
                gap: 0.6rem;
                margin-bottom: 1rem;
            }

            .btn-primary-hero,
            .btn-secondary-hero {
                padding: 0.45rem 1rem;
                font-size: 0.75rem;
            }

            .hero-image {
                margin-top: 1rem;
            }

            .hero-visual img {
                max-height: 30vh;
                width: 90%;
                max-width: 400px;
            }

            .floating-elements {
                width: 25px;
                height: 25px;
            }

            .floating-elements i {
                font-size: 0.7rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                min-height: 55vh;
                max-height: 55vh;
                padding: 0.5rem 0;
            }

            .hero-content {
                margin-bottom: 1rem;
            }

            .hero-title {
                font-size: 1.4rem;
            }

            .hero-subtitle {
                font-size: 0.8rem;
                margin-bottom: 0.8rem;
            }

            .hero-buttons {
                gap: 0.5rem;
                margin-bottom: 0.8rem;
            }

            .btn-primary-hero,
            .btn-secondary-hero {
                padding: 0.4rem 0.8rem;
                font-size: 0.7rem;
            }

            .hero-image {
                margin-top: 0.5rem;
            }

            .hero-visual img {
                max-height: 25vh;
                width: 85%;
                max-width: 300px;
            }

            .floating-elements {
                width: 20px;
                height: 20px;
            }

            .floating-elements i {
                font-size: 0.6rem;
            }
        }

        @media (max-width: 480px) {
            .hero-section {
                min-height: 50vh;
                max-height: 50vh;
            }

            .hero-title {
                font-size: 1.3rem;
                line-height: 1.3;
            }

            .hero-subtitle {
                font-size: 0.75rem;
            }

            .hero-visual img {
                max-height: 20vh;
                width: 80%;
                max-width: 250px;
            }

            .floating-elements {
                display: none;
            }
        }
        
    /* Industries section */
        .industry-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: white;
            margin-bottom: 0.8rem;
        }
        
        .industry-card {
            transition: all 0.3s ease;
            border: none;
            background: white;
        }
        
        .industry-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* Feature cards (Why Choose GTCS) */
        .feature-card {
            background: white;
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: white;
            margin-bottom: 0.8rem; /* Added for consistency with industry-icon */
        }

        .feature-icon.innovation {
            background: var(--gradient-primary);
        }

        .feature-icon.quality {
            background: var(--gradient-secondary);
        }

        .feature-icon.support {
            background: var(--gradient-accent);
        }

        .feature-icon.security {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* About section */
        .about-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        .gradient-text {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Enhanced Stats Cards */
        .stats-container {
            background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(248,250,252,0.8) 100%);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.3);
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }

        .stats-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(99,102,241,0.1) 0%, rgba(124,58,237,0.05) 100%);
            z-index: 0;
        }

        .stats-grid {
            position: relative;
            z-index: 1;
        }

        .stat-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 12px;
            padding: 1rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255,255,255,0.6);
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(99,102,241,0.2);
            border-color: rgba(99,102,241,0.3);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 0.75rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
            transition: all 0.3s ease;
            position: relative;
        }

        .stat-icon::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 12px;
            background: inherit;
            filter: blur(6px);
            opacity: 0.3;
            z-index: -1;
        }

        .stat-card:hover .stat-icon {
            transform: rotateY(180deg);
        }

        .stat-icon.projects {
            background: var(--gradient-primary);
        }

        .stat-icon.clients {
            background: var(--gradient-success);
        }

        .stat-icon.experience {
            background: var(--gradient-secondary);
        }

        .stat-icon.support {
            background: var(--gradient-accent);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.25rem;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .stat-description {
            font-size: 0.7rem;
            color: #94a3b8;
            line-height: 1.4;
        }

        .stats-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .stats-title {
            font-size: 1.25rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.25rem;
        }

        .stats-subtitle {
            color: #64748b;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Floating particles effect */
        .floating-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: linear-gradient(45deg, #6366f1, #8b5cf6);
            border-radius: 50%;
            animation: float-particle 6s ease-in-out infinite; /* Renamed to avoid conflict */
            opacity: 0.6;
        }

        .floating-particle:nth-child(odd) {
            animation-duration: 8s;
            animation-delay: -2s;
        }

        .floating-particle:nth-child(even) {
            animation-duration: 10s;
            animation-delay: -4s;
        }

        @keyframes float-particle { /* Renamed to avoid conflict */
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .service-item {
            transition: all 0.3s ease;
            border-left-width: 3px !important;
        }

        .service-item:hover {
            border-left-width: 5px !important;
            transform: translateX(3px);
            background-color: rgba(255,255,255,0.8) !important;
        }

        .x-small {
            font-size: 0.75rem;
        }

        .mission-card {
            background: white;
            border-radius: 12px;
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
        }

        .mission-card:hover {
            border-left-width: 6px;
            transform: translateX(5px);
        }

        .vision-card {
            background: white;
            border-radius: 12px;
            border-left: 4px solid var(--secondary-color);
            transition: all 0.3s ease;
        }

        .vision-card:hover {
            border-left-width: 6px;
            transform: translateX(5px);
        }

        @media (max-width: 768px) {
            .section-title { /* Moved from original position to group media queries */
                font-size: 1.5rem;
            }
            .stat-number {
                font-size: 1.75rem;
            }
            .stat-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            .stats-container {
                padding: 0.75rem;
            }
            .stat-card {
                padding: 0.75rem;
            }
            .process-step:not(:last-child)::after { /* Moved from original position */
                display: none;
            }
            section { /* Moved from original position */
                padding: 2rem 0 !important;
            }
        }
        
        /* Companies Rating Section */
        .companies-rating-section {
            padding: 2rem 0;
            background: white;
            position: relative;
            overflow: hidden;
        }
        
        .companies-rating-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.02) 0%, rgba(118, 75, 162, 0.02) 100%);
            pointer-events: none;
        }
        
        .section-header {
            text-align: center;
            position: relative;
            /*margin-bottom: 1rem;*/
            z-index: 2;
        }
        
        .section-title {
            font-size: 1.5rem!important;
            font-weight: 600;
            /*margin-bottom: 0.4rem;*/
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-subtitle {
            color: #6b7280;
            font-size: 0.85rem;
            font-weight: 400;
        }
        
        .companies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            position: relative;
            z-index: 2;
        }
        
        .company-card {
            background: white;
            border-radius: 12px;
            padding: 1.2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .company-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .company-card:hover::before {
            left: 100%;
        }
        
        .company-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.15);
            border-color: var(--primary-color);
        }
        
        .company-logo {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            margin: 0 auto 0.8rem;
            overflow: hidden;
            background: var(--light-color);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
        }
        
        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .company-card:hover .company-logo img {
            transform: scale(1.05);
        }
        
        .company-logo.placeholder {
            background: var(--gradient-primary);
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .company-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.6rem;
            line-height: 1.3;
            position: relative;
            z-index: 2;
        }
        
        .company-rating {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.3rem;
            position: relative;
            z-index: 2;
        }
        
        .stars {
            display: flex;
            gap: 0.1rem;
        }
        
        .star {
            font-size: 0.9rem;
            color: #d1d5db;
            transition: color 0.2s ease;
        }
        
        .star.filled {
            color: #fbbf24;
        }
        
        .star.half-filled {
            background: linear-gradient(90deg, #fbbf24 50%, #d1d5db 50%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .rating-score {
            font-size: 0.75rem;
            font-weight: 500;
            color: #6b7280;
            margin-left: 0.3rem;
        }
        
        .trusted-badge {
            position: absolute;
            top: 0.6rem;
            right: 0.6rem;
            background: var(--gradient-primary);
            color: white;
            padding: 0.2rem 0.4rem;
            border-radius: 4px;
            font-size: 0.6rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s ease;
        }
        
        .company-card:hover .trusted-badge {
            opacity: 1;
            transform: scale(1);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .companies-rating-section {
                padding: 2rem 0;
            }
            
            .companies-grid {
                grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
                gap: 0.8rem;
            }
            
            .company-card {
                padding: 1rem;
            }
            
            .company-logo {
                width: 40px;
                height: 40px;
                margin-bottom: 0.6rem;
            }
            
            .company-name {
                font-size: 0.8rem;
                margin-bottom: 0.5rem;
            }
            
            .star {
                font-size: 0.8rem;
            }
            
            .rating-score {
                font-size: 0.7rem;
            }
            
            .section-title {
                font-size: 0.8rem;
            }
            
            .section-subtitle {
                font-size: 0.8rem;
            }
        }
        
        @media (max-width: 480px) {
            .companies-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.6rem;
            }
            
            .company-card {
                padding: 0.8rem;
            }
            
            .company-logo {
                width: 35px;
                height: 35px;
            }
            
            .company-name {
                font-size: 0.75rem;
            }
            
            .star {
                font-size: 0.75rem;
            }
        }
        
        /* Animation */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .company-card:nth-child(1) { animation-delay: 0.1s; }
        .company-card:nth-child(2) { animation-delay: 0.2s; }
        .company-card:nth-child(3) { animation-delay: 0.3s; }
        .company-card:nth-child(4) { animation-delay: 0.4s; }
        
         /* Case Studies Styles */
        .case-study-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        
        .case-study-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .case-study-overlay {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.9), rgba(118, 75, 162, 0.9));
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        
        .case-study-card:hover .case-study-overlay {
            opacity: 1;
        }
        
        .case-study-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
        
        /* Client Logo Styles - Not present in provided HTML, but keeping for completeness if needed */
        .client-logo {
            height: 60px;
            width: auto;
            max-width: 120px;
            object-fit: contain;
            transition: all 0.3s ease;
            filter: grayscale(100%) opacity(0.7);
        }
        
        .client-logo:hover {
            filter: grayscale(0%) opacity(1);
            transform: scale(1.05);
        }
        
        /* Section Title Gradient */
        .section-title-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Minimal spacing overrides */
        .py-custom {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }
        
        .mb-custom {
            margin-bottom: 1rem !important;
        }
        
        .mb-custom-sm {
            margin-bottom: 0.5rem !important;
        }
        
        /* Small font utilities */
        .fs-sm {
            font-size: 0.875rem !important;
        }
        
        .fs-xs {
            font-size: 0.75rem !important;
        }
        
        /*Testimonials Section*/
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .testimonial-accent::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Process Section */
        .process-section {
            padding: 2.5rem 0;
            background: white;
            position: relative;
        }
        
        .process-title {
            font-size: 1.6rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 0.4rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .process-subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 0.85rem;
            margin-bottom: 2rem;
            font-weight: 400;
        }
        
        .process-container {
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
        }
        
        .process-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            gap: 1rem;
        }
        
        .process-step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 2;
        }
        
        .step-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.8rem;
            font-size: 1.1rem;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }
        
        .step-number {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 20px;
            height: 20px;
            background: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 600;
            color: white;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.4);
        }
        
        .step-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.4rem;
            line-height: 1.3;
        }
        
        .step-description {
            font-size: 0.75rem;
            color: #6b7280;
            line-height: 1.4;
            margin-bottom: 0;
        }
        
        /* Arrow Connectors */
        .process-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
            color: var(--primary-color);
            font-size: 1.2rem;
            opacity: 0.7;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }
        
        /* Hover Effects */
        .process-step:hover .step-icon {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        }
        
        .process-step:hover .step-title {
            color: var(--primary-color);
        }
        
        /* Different gradient colors for each step */
        .process-step:nth-child(2) .step-icon {
            background: var(--gradient-secondary);
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
        }
        
        .process-step:nth-child(2):hover .step-icon {
            box-shadow: 0 8px 25px rgba(240, 147, 251, 0.4);
        }
        
        .process-step:nth-child(4) .step-icon {
            background: var(--gradient-accent);
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
        }
        
        .process-step:nth-child(4):hover .step-icon {
            box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
        }
        
        .process-step:nth-child(6) .step-icon {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        .process-step:nth-child(6):hover .step-icon {
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .process-steps {
                flex-wrap: wrap;
                gap: 1.5rem;
            }
            
            .process-step {
                flex: 1 1 45%;
                max-width: 45%;
            }
            
            .process-arrow {
                display: none;
            }
            
            .process-section {
                padding: 2rem 0;
            }
        }
        
        @media (max-width: 768px) {
            .process-steps {
                flex-direction: column;
                gap: 1.2rem;
            }
            
            .process-step {
                flex: none;
                max-width: 100%;
                width: 100%;
            }
            
            .step-icon {
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }
            
            .step-number {
                width: 18px;
                height: 18px;
                font-size: 0.65rem;
                top: -6px;
                right: -6px;
            }
            
            .process-title {
                font-size: 1.4rem;
            }
            
            .process-subtitle {
                font-size: 0.8rem;
            }
            
            .step-title {
                font-size: 0.85rem;
            }
            
            .step-description {
                font-size: 0.7rem;
            }
            
            .process-section {
                padding: 1.5rem 0;
            }
        }
        
        @media (max-width: 576px) {
            .process-section {
                padding: 1.2rem 0;
            }
            
            .process-title {
                font-size: 1.3rem;
            }
            
            .step-icon {
                width: 42px;
                height: 42px;
                font-size: 0.95rem;
            }
            
            .step-title {
                font-size: 0.8rem;
            }
            
            .step-description {
                font-size: 0.68rem;
            }
        }
        
        /* Animation for process steps */
        .process-step {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .process-step:nth-child(1) { animation-delay: 0.1s; }
        .process-step:nth-child(2) { animation-delay: 0.2s; }
        .process-step:nth-child(3) { animation-delay: 0.3s; }
        .process-step:nth-child(4) { animation-delay: 0.4s; }
        .process-step:nth-child(5) { animation-delay: 0.5s; }
        .process-step:nth-child(6) { animation-delay: 0.6s; }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container-fluid px-3">
            <div class="row align-items-center h-100">
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
                        <a href="./contact.php" class="btn-primary-hero">
                            Get Started <i class="ri-arrow-right-line"></i>
                        </a>
                        <!--<a href="#about" class="btn-secondary-hero">-->
                        <!--    <i class="ri-play-circle-line"></i> Watch Demo-->
                        <!--</a>-->
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
    
    <!-- Industries We Serve Section -->
    <section class="py-4 bg-light">
        <div class="container-fluid px-3">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title mb-2">Industries We Serve</h2>
                    <p class="text-muted mb-0 fs-6">Delivering cutting-edge technology solutions across diverse sectors</p>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: var(--gradient-primary);">
                            <i class="ri-health-book-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Healthcare</h6>
                        <small class="text-muted">Medical & Wellness</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: var(--gradient-secondary);">
                            <i class="ri-graduation-cap-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Education</h6>
                        <small class="text-muted">E-learning & EdTech</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: var(--gradient-accent);">
                            <i class="ri-shopping-cart-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">E-commerce</h6>
                        <small class="text-muted">Retail & Shopping</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <i class="ri-bank-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Finance</h6>
                        <small class="text-muted">Banking & FinTech</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);">
                            <i class="ri-car-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Automotive</h6>
                        <small class="text-muted">Transport & Logistics</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: linear-gradient(135deg, #26de81 0%, #20bf6b 100%);">
                            <i class="ri-restaurant-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Food & Beverage</h6>
                        <small class="text-muted">Hospitality & Tourism</small>
                    </div>
                </div>
            </div>
            
            <div class="row g-3 mt-2">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: linear-gradient(135deg, #a55eea 0%, #8854d0 100%);">
                            <i class="ri-home-smile-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Real Estate</h6>
                        <small class="text-muted">Property & Construction</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%);">
                            <i class="ri-gamepad-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Entertainment</h6>
                        <small class="text-muted">Gaming & Media</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%);">
                            <i class="ri-hammer-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Manufacturing</h6>
                        <small class="text-muted">Industry & Production</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);">
                            <i class="ri-government-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Government</h6>
                        <small class="text-muted">Public Services</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: linear-gradient(135deg, #00b894 0%, #00a085 100%);">
                            <i class="ri-leaf-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Agriculture</h6>
                        <small class="text-muted">Farming & AgriTech</small>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card industry-card h-100 p-3 text-center border-0 shadow-sm">
                        <div class="industry-icon mx-auto" style="background: linear-gradient(135deg, #636e72 0%, #2d3436 100%);">
                            <i class="ri-more-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Others</h6>
                        <small class="text-muted">Custom Solutions</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose GTCS Section -->
    <section class="py-4 px-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container-fluid px-3">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mb-2 fw-semibold" style="font-size: 1.8rem;">Why Choose GTCS?</h2>
                    <p class="text-white-50 mb-0 fs-6">Experience excellence in every project with our proven expertise</p>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="card feature-card h-100 p-3 border-0">
                        <div class="feature-icon" style="background: var(--gradient-secondary);">
                            <i class="ri-award-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-2 text-dark">Proven Expertise</h6>
                        <p class="text-muted mb-2 small">10+ years of industry experience with 500+ successful projects delivered across diverse domains.</p>
                        <div class="d-flex align-items-center small text-primary">
                            <i class="ri-check-line me-1"></i>
                            <span>Certified professionals</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card feature-card h-100 p-3 border-0">
                        <div class="feature-icon" style="background: var(--gradient-accent);">
                            <i class="ri-rocket-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-2 text-dark">Fast Delivery</h6>
                        <p class="text-muted mb-2 small">Agile development methodology ensuring 50% faster delivery without compromising quality.</p>
                        <div class="d-flex align-items-center small text-primary">
                            <i class="ri-check-line me-1"></i>
                            <span>Quick turnaround time</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card feature-card h-100 p-3 border-0">
                        <div class="feature-icon" style="background: var(--gradient-primary);">
                            <i class="ri-customer-service-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-2 text-dark">24/7 Support</h6>
                        <p class="text-muted mb-2 small">Round-the-clock technical support and maintenance services for uninterrupted operations.</p>
                        <div class="d-flex align-items-center small text-primary">
                            <i class="ri-check-line me-1"></i>
                            <span>Always available</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card feature-card h-100 p-3 border-0">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #26de81 0%, #20bf6b 100%);">
                            <i class="ri-money-dollar-circle-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-2 text-dark">Cost Effective</h6>
                        <p class="text-muted mb-2 small">Competitive pricing with transparent billing and no hidden costs for maximum ROI.</p>
                        <div class="d-flex align-items-center small text-primary">
                            <i class="ri-check-line me-1"></i>
                            <span>Budget-friendly solutions</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card feature-card h-100 p-3 border-0">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%);">
                            <i class="ri-lightbulb-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-2 text-dark">Innovation Focus</h6>
                        <p class="text-muted mb-2 small">Cutting-edge technologies and innovative solutions to keep you ahead of competition.</p>
                        <div class="d-flex align-items-center small text-primary">
                            <i class="ri-check-line me-1"></i>
                            <span>Latest tech stack</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card feature-card h-100 p-3 border-0">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #a55eea 0%, #8854d0 100%);">
                            <i class="ri-team-line"></i>
                        </div>
                        <h6 class="fw-semibold mb-2 text-dark">Expert Team</h6>
                        <p class="text-muted mb-2 small">Skilled developers, designers, and consultants dedicated to your project success.</p>
                        <div class="d-flex align-items-center small text-primary">
                            <i class="ri-check-line me-1"></i>
                            <span>Dedicated professionals</span>
                        </div>
                    </div>
                </div>
            </div>
            
             <!--Call to Action -->
            <div class="row justify-content-center mt-4">
                <div class="col-lg-6 text-center">
                    <div class="bg-white bg-opacity-10 backdrop-blur rounded-3 p-3">
                        <h6 class="text-white mb-2">Ready to Start Your Project?</h6>
                        <p class="text-white-50 small mb-3">Let's discuss how we can help transform your business with technology</p>
                     <div class="row justify-content-center text-center">
    <div class="col-12 col-md-auto mb-2 mb-md-0">
        <a href="./freeguide.php" class="btn btn-light btn-sm px-4 me-md-2 w-100 w-md-auto">Get Free Consultation</a>
    </div>
    <div class="col-12 col-md-auto">
        <a href="./about.php" class="btn btn-outline-light btn-sm px-4 w-100 w-md-auto">View Portfolio</a>
    </div>
</div>

                </div>
            </div>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="py-4 px-3 bg-white">
        <div class="container-fluid px-3">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title mb-2">Our Services</h2>
                    <p class="text-muted mb-0 fs-6">Comprehensive technology solutions tailored to your business needs</p>
                </div>
            </div>
            
            <div class="row g-3">
                <!-- Development Services -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon me-3" style="background: var(--gradient-primary);">
                                <i class="ri-code-s-slash-line"></i>
                            </div>
                            <h5 class="fw-semibold mb-0 text-dark">Development</h5>
                        </div>
                        <ul class="list-unstyled mb-3">
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Website Development</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Mobile App Development</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Game Development</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Custom Software</span>
                            </li>
                        </ul>
                        <a href="./webdevelopment.php" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
                    </div>
                </div>

                <!-- Design Services -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon me-3" style="background: var(--gradient-secondary);">
                                <i class="ri-pen-nib-line"></i>
                            </div>
                            <h5 class="fw-semibold mb-0 text-dark">Design & Creative</h5>
                        </div>
                        <ul class="list-unstyled mb-3">
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>UI/UX Design</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Multimedia Animation</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Brand Identity</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Graphic Design</span>
                            </li>
                        </ul>
                        <a href="./multimedia.php" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
                    </div>
                </div>

                <!-- Marketing Services -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon me-3" style="background: var(--gradient-accent);">
                                <i class="ri-line-chart-line"></i>
                            </div>
                            <h5 class="fw-semibold mb-0 text-dark">Digital Marketing</h5>
                        </div>
                        <ul class="list-unstyled mb-3">
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>SEO & SEM</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Social Media Marketing</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>E-commerce Solutions</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Content Marketing</span>
                            </li>
                        </ul>
                        <a href="./digitalmarketing.php" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
                    </div>
                </div>

                <!-- Security Services -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon me-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <i class="ri-shield-line"></i>
                            </div>
                            <h5 class="fw-semibold mb-0 text-dark">Security & Data</h5>
                        </div>
                        <ul class="list-unstyled mb-3">
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Cyber Security</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Database Management</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Cloud Solutions</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Data Analytics</span>
                            </li>
                        </ul>
                        <a href="./cybersecurity.php" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
                    </div>
                </div>

                <!-- Consultation Services -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon me-3" style="background: linear-gradient(135deg, #26de81 0%, #20bf6b 100%);">
                                <i class="ri-user-settings-line"></i>
                            </div>
                            <h5 class="fw-semibold mb-0 text-dark">Consultation</h5>
                        </div>
                        <ul class="list-unstyled mb-3">
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>IT Strategy Planning</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Digital Transformation</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Technology Audit</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Business Analysis</span>
                            </li>
                        </ul>
                        <a href="./freeguide.php" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
                    </div>
                </div>

                <!-- Support Services -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon me-3" style="background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%);">
                                <i class="ri-customer-service-2-line"></i>
                            </div>
                            <h5 class="fw-semibold mb-0 text-dark">Support & Maintenance</h5>
                        </div>
                        <ul class="list-unstyled mb-3">
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>24/7 Technical Support</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>System Maintenance</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Performance Optimization</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 small">
                                <i class="ri-check-line text-primary me-2"></i>
                                <span>Bug Fixes & Updates</span>
                            </li>
                        </ul>
                        <a href="./support.php" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Service Stats -->
            <div class="row justify-content-center mt-4">
                <div class="col-lg-10">
                    <div class="row g-3 text-center">
                        <div class="col-6 col-md-3">
                            <div class="p-3">
                                <h4 class="fw-bold text-primary mb-1">500+</h4>
                                <small class="text-muted">Projects Completed</small>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3">
                                <h4 class="fw-bold text-primary mb-1">98%</h4>
                                <small class="text-muted">Client Satisfaction</small>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3">
                                <h4 class="fw-bold text-primary mb-1">5+</h4>
                                <small class="text-muted">Years Experience</small>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3">
                                <h4 class="fw-bold text-primary mb-1">50+</h4>
                                <small class="text-muted">Expert Team</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About GTCS Section -->
    <section class="about-section py-4">
        <div class="container-fluid px-3">
            <!-- Section Header -->
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="h3 fw-bold gradient-text mb-2">About Global Tech Consultancy Services</h2>
                    <p class="text-muted mb-0 fs-6">Empowering businesses through innovative technology solutions</p>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row g-3 mb-4">
                <!-- Company Overview -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h4 class="fw-semibold text-dark mb-3">Who We Are</h4>
                            <p class="text-muted mb-3 fs-6">
                                Global Tech Consultancy Services (GTCS) is a leading technology consultancy firm dedicated to 
                                transforming businesses through cutting-edge digital solutions. Since our inception, we've been 
                                at the forefront of technological innovation, helping organizations navigate the digital landscape 
                                with confidence and success.
                            </p>
                            <p class="text-muted mb-3 fs-6">
                                Our team of expert developers, designers, and consultants work collaboratively to deliver 
                                comprehensive solutions that drive growth, efficiency, and competitive advantage for our clients 
                                across various industries.
                            </p>
                            
                            <!-- Mission & Vision Cards -->
                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <div class="mission-card p-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="ri-focus-2-line text-primary me-2 fs-5"></i>
                                            <h6 class="fw-semibold mb-0">Our Mission</h6>
                                        </div>
                                        <p class="text-muted mb-0 small">
                                            To empower businesses with innovative technology solutions that drive growth and success.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="vision-card p-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="ri-eye-line me-2 fs-5" style="color: var(--secondary-color);"></i>
                                            <h6 class="fw-semibold mb-0">Our Vision</h6>
                                        </div>
                                        <p class="text-muted mb-0 small">
                                            To be the global leader in technology consultancy, shaping the future of digital innovation.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Stats Section -->
                <div class="col-lg-4">
                    <div class="stats-container h-100 position-relative">
                        <!-- Floating particles -->
                        <div class="floating-particle" style="top: 20%; left: 15%;"></div>
                        <div class="floating-particle" style="top: 60%; right: 20%;"></div>
                        <div class="floating-particle" style="bottom: 30%; left: 25%;"></div>
                        
                        <div class="stats-header">
                            <h4 class="stats-title">Our Impact</h4>
                            <p class="stats-subtitle">Numbers that speak for themselves</p>
                        </div>
                        
                        <div class="stats-grid row g-2">
                            <div class="col-6">
                                <div class="stat-card animate-in">
                                    <div class="stat-icon projects">
                                        <i class="ri-service-line"></i>
                                    </div>
                                    <div class="stat-number" data-target="500">500</div>
                                    <div class="stat-label">Projects</div>
                                    <div class="stat-description">Successfully delivered</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-card animate-in">
                                    <div class="stat-icon clients">
                                        <i class="ri-user-heart-line"></i>
                                    </div>
                                    <div class="stat-number" data-target="50">50</div>
                                    <div class="stat-label">Clients</div>
                                    <div class="stat-description">Satisfied customers</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-card animate-in">
                                    <div class="stat-icon experience">
                                        <i class="ri-time-line"></i>
                                    </div>
                                    <div class="stat-number" data-target="5">5</div>
                                    <div class="stat-label">Years</div>
                                    <div class="stat-description">Of excellence</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-card animate-in">
                                    <div class="stat-icon support">
                                        <i class="ri-customer-service-line"></i>
                                    </div>
                                    <div class="stat-number">24/7</div>
                                    <div class="stat-label">Support</div>
                                    <div class="stat-description">Always available</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced About Content -->
            <div class="row g-3">
                <!-- Our Story & Values -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon innovation me-3">
                                    <i class="ri-building-line"></i>
                                </div>
                                <h4 class="fw-bold gradient-text mb-0">Our Story</h4>
                            </div>
                            <p class="text-muted mb-3 fs-6">
                                Founded with a vision to bridge the gap between technology and business success, GTCS has evolved 
                                into a trusted partner for organizations seeking digital transformation. We combine deep technical 
                                expertise with business acumen to deliver solutions that matter.
                            </p>
                            
                            <!-- Core Values Grid -->
                            <div class="row g-2 mt-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start p-2 rounded bg-light">
                                        <i class="ri-rocket-line text-primary me-2 mt-1"></i>
                                        <div>
                                            <h6 class="fw-semibold mb-1 small">Innovation</h6>
                                            <p class="text-muted mb-0 x-small">Pushing boundaries with cutting-edge solutions</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start p-2 rounded bg-light">
                                        <i class="ri-team-line text-success me-2 mt-1"></i>
                                        <div>
                                            <h6 class="fw-semibold mb-1 small">Collaboration</h6>
                                            <p class="text-muted mb-0 x-small">Working together for exceptional results</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start p-2 rounded bg-light">
                                        <i class="ri-medal-line text-warning me-2 mt-1"></i>
                                        <div>
                                            <h6 class="fw-semibold mb-1 small">Excellence</h6>
                                            <p class="text-muted mb-0 x-small">Delivering quality in every project</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start p-2 rounded bg-light">
                                        <i class="ri-customer-service-2-line text-info me-2 mt-1"></i>
                                        <div>
                                            <h6 class="fw-semibold mb-1 small">Client Focus</h6>
                                            <p class="text-muted mb-0 x-small">Your success is our priority</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- What We Do -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon quality me-3">
                                    <i class="ri-tools-line"></i>
                                </div>
                                <h4 class="fw-bold gradient-text mb-0">What We Do</h4>
                            </div>
                            <p class="text-muted mb-3 fs-6">
                                We specialize in comprehensive technology solutions that transform how businesses operate in the digital age.
                            </p>
                            
                            <!-- Services List -->
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="service-item p-2 rounded border-start border-3 border-primary bg-light bg-opacity-50">
                                        <h6 class="fw-semibold mb-1 small">Full-Stack Development</h6>
                                        <p class="text-muted mb-0 x-small">Web, mobile & enterprise applications</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="service-item p-2 rounded border-start border-3 border-success bg-light bg-opacity-50">
                                        <h6 class="fw-semibold mb-1 small">Digital Marketing</h6>
                                        <p class="text-muted mb-0 x-small">Strategic online presence & growth</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="service-item p-2 rounded border-start border-3 border-warning bg-light bg-opacity-50">
                                        <h6 class="fw-semibold mb-1 small">UI/UX Design</h6>
                                        <p class="text-muted mb-0 x-small">User-centered design experiences</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="service-item p-2 rounded border-start border-3 border-info bg-light bg-opacity-50">
                                        <h6 class="fw-semibold mb-1 small">Cybersecurity</h6>
                                        <p class="text-muted mb-0 x-small">Comprehensive security solutions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
     <!-- Companies Rating Section -->
    <section class="companies-rating-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Trusted by Leading Companies</h2>
                <p class="section-subtitle">Join thousands of satisfied clients who trust our expertise</p>
            </div>
            
            <div class="companies-grid">
                <!-- Company Card 1 -->
                <div class="company-card fade-in-up">
                    <div class="trusted-badge">Verified</div>
                    <div class="company-logo">
                        <img src="https://logo.clearbit.com/google.com" alt="Google" onerror="this.parentElement.innerHTML='<div class=\'placeholder\'>G</div>'">
                    </div>
                    <h3 class="company-name">Google Inc.</h3>
                    <div class="company-rating">
                        <div class="stars">
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                        </div>
                        <span class="rating-score">5.0</span>
                    </div>
                </div>
                
                <!-- Company Card 2 -->
                <div class="company-card fade-in-up">
                    <div class="trusted-badge">Partner</div>
                    <div class="company-logo">
                        <img src="https://logo.clearbit.com/ambitionbox.com" alt="AmbitionBox" onerror="this.parentElement.innerHTML='<div class=\'placeholder\'>AB</div>'">
                    </div>
                    <h3 class="company-name">AmbitionBox</h3>
                    <div class="company-rating">
                        <div class="stars">
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star half-filled"></i>
                        </div>
                        <span class="rating-score">4.7</span>
                    </div>
                </div>
                
                <!-- Company Card 3 -->
                <div class="company-card fade-in-up">
                    <div class="trusted-badge">Trusted</div>
                    <div class="company-logo">
                        <img src="https://logo.clearbit.com/glassdoor.com" alt="Glassdoor" onerror="this.parentElement.innerHTML='<div class=\'placeholder\'>GD</div>'">
                    </div>
                    <h3 class="company-name">Glassdoor</h3>
                    <div class="company-rating">
                        <div class="stars">
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                        </div>
                        <span class="rating-score">4.8</span>
                    </div>
                </div>
                
                <!-- Company Card 4 -->
                <div class="company-card fade-in-up">
                    <div class="trusted-badge">Client</div>
                    <div class="company-logo">
                        <img src="https://logo.clearbit.com/clutch.co" alt="Clutch" onerror="this.parentElement.innerHTML='<div class=\'placeholder\'>C</div>'">
                    </div>
                    <h3 class="company-name">Clutch</h3>
                    <div class="company-rating">
                        <div class="stars">
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star filled"></i>
                            <i class="ri-star-fill star half-filled"></i>
                        </div>
                        <span class="rating-score">4.9</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Case Studies Section -->
    <section class="py-custom px-3 bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center mb-custom">
                    <h2 class="h4 fw-bold section-title-gradient mb-2">Case Studies</h2>
                    <p class="text-muted fs-sm mb-0">Discover how we've helped businesses transform digitally</p>
                </div>
            </div>
            
            <div class="row g-3">
                <!-- Case Study 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card case-study-card border-0 h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 class="card-img-top" alt="E-commerce Platform" style="height: 180px; object-fit: cover;">
                            <div class="case-study-overlay">
                                <div class="case-study-icon">
                                    <i class="ri-shopping-cart-line text-white fs-5"></i>
                                </div>
                                <span class="text-white fs-sm fw-medium">View Case Study</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fs-6 fw-semibold mb-0">E-commerce Platform</h5>
                                <span class="badge bg-primary fs-xs">Web Development</span>
                            </div>
                            <p class="card-text text-muted fs-sm mb-2">Built a scalable e-commerce platform that increased client's revenue by 300% within 6 months.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted fs-xs">
                                    <i class="ri-time-line me-1"></i>3 months
                                </small>
                                <small class="text-success fw-medium fs-xs">
                                    <i class="ri-arrow-up-line me-1"></i>300% ROI
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Case Study 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card case-study-card border-0 h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 class="card-img-top" alt="Mobile Banking App" style="height: 180px; object-fit: cover;">
                            <div class="case-study-overlay">
                                <div class="case-study-icon">
                                    <i class="ri-smartphone-line text-white fs-5"></i>
                                </div>
                                <span class="text-white fs-sm fw-medium">View Case Study</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fs-6 fw-semibold mb-0">Mobile Banking App</h5>
                                <span class="badge bg-success fs-xs">App Development</span>
                            </div>
                            <p class="card-text text-muted fs-sm mb-2">Developed a secure mobile banking app with 1M+ downloads and 4.8-star rating.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted fs-xs">
                                    <i class="ri-time-line me-1"></i>6 months
                                </small>
                                <small class="text-success fw-medium fs-xs">
                                    <i class="ri-download-line me-1"></i>1M+ Downloads
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Case Study 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card case-study-card border-0 h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 class="card-img-top" alt="Digital Marketing Campaign" style="height: 180px; object-fit: cover;">
                            <div class="case-study-overlay">
                                <div class="case-study-icon">
                                    <i class="ri-line-chart-line text-white fs-5"></i>
                                </div>
                                <span class="text-white fs-sm fw-medium">View Case Study</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fs-6 fw-semibold mb-0">Digital Marketing Campaign</h5>
                                <span class="badge bg-warning fs-xs">Marketing</span>
                            </div>
                            <p class="card-text text-muted fs-sm mb-2">Launched a comprehensive digital marketing strategy that boosted brand awareness by 250%.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted fs-xs">
                                    <i class="ri-time-line me-1"></i>4 months
                                </small>
                                <small class="text-success fw-medium fs-xs">
                                    <i class="ri-eye-line me-1"></i>250% Reach
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Case Study 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card case-study-card border-0 h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 class="card-img-top" alt="SaaS Dashboard" style="height: 180px; object-fit: cover;">
                            <div class="case-study-overlay">
                                <div class="case-study-icon">
                                    <i class="ri-dashboard-line text-white fs-5"></i>
                                </div>
                                <span class="text-white fs-sm fw-medium">View Case Study</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fs-6 fw-semibold mb-0">SaaS Dashboard</h5>
                                <span class="badge bg-info fs-xs">UI/UX Design</span>
                            </div>
                            <p class="card-text text-muted fs-sm mb-2">Redesigned a complex SaaS dashboard improving user engagement by 180%.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted fs-xs">
                                    <i class="ri-time-line me-1"></i>2 months
                                </small>
                                <small class="text-success fw-medium fs-xs">
                                    <i class="ri-user-line me-1"></i>180% Engagement
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Case Study 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card case-study-card border-0 h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 class="card-img-top" alt="Gaming Platform" style="height: 180px; object-fit: cover;">
                            <div class="case-study-overlay">
                                <div class="case-study-icon">
                                    <i class="ri-gamepad-line text-white fs-5"></i>
                                </div>
                                <span class="text-white fs-sm fw-medium">View Case Study</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fs-6 fw-semibold mb-0">Gaming Platform</h5>
                                <span class="badge bg-danger fs-xs">Game Development</span>
                            </div>
                            <p class="card-text text-muted fs-sm mb-2">Created an interactive gaming platform with real-time multiplayer capabilities.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted fs-xs">
                                    <i class="ri-time-line me-1"></i>8 months
                                </small>
                                <small class="text-success fw-medium fs-xs">
                                    <i class="ri-group-line me-1"></i>50K Users
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Case Study 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card case-study-card border-0 h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                 class="card-img-top" alt="Cloud Infrastructure" style="height: 180px; object-fit: cover;">
                            <div class="case-study-overlay">
                                <div class="case-study-icon">
                                    <i class="ri-cloud-line text-white fs-5"></i>
                                </div>
                                <span class="text-white fs-sm fw-medium">View Case Study</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fs-6 fw-semibold mb-0">Cloud Infrastructure</h5>
                                <span class="badge bg-secondary fs-xs">Cloud Services</span>
                            </div>
                            <p class="card-text text-muted fs-sm mb-2">Migrated enterprise systems to cloud, reducing operational costs by 60%.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted fs-xs">
                                    <i class="ri-time-line me-1"></i>5 months
                                </small>
                                <small class="text-success fw-medium fs-xs">
                                    <i class="ri-arrow-down-line me-1"></i>60% Cost Reduction
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    

    <!-- Testimonials Section -->
     <section class="py-4 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="h4 fw-semibold gradient-text mb-1">Client Testimonials</h2>
                <p class="text-muted small mb-0">What our clients say about us</p>
            </div>
            
            <div class="row g-3">
                <!-- Testimonial 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 position-relative testimonial-accent">
                        <div class="card-body p-3">
                            <div class="text-primary opacity-25 fs-1 lh-1 mb-2">"</div>
                            <p class="card-text small text-muted fst-italic mb-3">
                                "GTCS delivered exceptional web development services. Their team understood our requirements perfectly and delivered beyond expectations."
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-semibold me-2 flex-shrink-0" style="width: 35px; height: 35px;">
                                    <small>SK</small>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 small fw-semibold">Sarah Johnson</h6>
                                    <small class="text-muted">CEO, TechStart</small>
                                    <div class="mt-1">
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 position-relative testimonial-accent">
                        <div class="card-body p-3">
                            <div class="text-primary opacity-25 fs-1 lh-1 mb-2">"</div>
                            <p class="card-text small text-muted fst-italic mb-3">
                                "Outstanding digital marketing results! Our online presence improved dramatically within just 3 months of working with GTCS."
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-semibold me-2 flex-shrink-0" style="width: 35px; height: 35px;">
                                    <small>MR</small>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 small fw-semibold">Mike Rodriguez</h6>
                                    <small class="text-muted">Founder, GrowthCorp</small>
                                    <div class="mt-1">
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 position-relative testimonial-accent">
                        <div class="card-body p-3">
                            <div class="text-primary opacity-25 fs-1 lh-1 mb-2">"</div>
                            <p class="card-text small text-muted fst-italic mb-3">
                                "Professional, reliable, and innovative. GTCS helped us modernize our entire digital infrastructure. Highly recommended!"
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-semibold me-2 flex-shrink-0" style="width: 35px; height: 35px;">
                                    <small>EP</small>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 small fw-semibold">Emily Parker</h6>
                                    <small class="text-muted">CTO, InnovateLab</small>
                                    <div class="mt-1">
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                        <i class="ri-star-fill text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Process Section -->
    <section class="process-section">
        <div class="container-fluid px-3">
            <h2 class="process-title">Our Process</h2>
            <p class="process-subtitle">Simple steps to transform your ideas into reality</p>
            
            <div class="process-container">
                <div class="process-steps">
                    <!-- Step 1 -->
                    <div class="process-step">
                        <div class="step-icon">
                            <div class="step-number">1</div>
                            <i class="ri-chat-3-line"></i>
                        </div>
                        <h4 class="step-title">Consultation</h4>
                        <p class="step-description">Free discovery call to understand your requirements and goals</p>
                    </div>
                    
                    <!-- Arrow 1 -->
                    <div class="process-arrow" style="left: 16.5%;">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="process-step">
                        <div class="step-icon">
                            <div class="step-number">2</div>
                            <i class="ri-file-text-line"></i>
                        </div>
                        <h4 class="step-title">Strategy</h4>
                        <p class="step-description">Detailed project planning and strategic roadmap creation</p>
                    </div>
                    
                    <!-- Arrow 2 -->
                    <div class="process-arrow" style="left: 33%;">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="process-step">
                        <div class="step-icon">
                            <div class="step-number">3</div>
                            <i class="ri-palette-line"></i>
                        </div>
                        <h4 class="step-title">Design</h4>
                        <p class="step-description">Creative design concepts and user experience optimization</p>
                    </div>
                    
                    <!-- Arrow 3 -->
                    <div class="process-arrow" style="left: 49.5%;">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="process-step">
                        <div class="step-icon">
                            <div class="step-number">4</div>
                            <i class="ri-code-s-slash-line"></i>
                        </div>
                        <h4 class="step-title">Development</h4>
                        <p class="step-description">Clean coding and robust solution implementation</p>
                    </div>
                    
                    <!-- Arrow 4 -->
                    <div class="process-arrow" style="left: 66%;">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                    
                    <!-- Step 5 -->
                    <div class="process-step">
                        <div class="step-icon">
                            <div class="step-number">5</div>
                            <i class="ri-bug-line"></i>
                        </div>
                        <h4 class="step-title">Testing</h4>
                        <p class="step-description">Comprehensive quality assurance and bug fixing</p>
                    </div>
                    
                    <!-- Arrow 5 -->
                    <div class="process-arrow" style="left: 82.5%;">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                    
                    <!-- Step 6 -->
                    <div class="process-step">
                        <div class="step-icon">
                            <div class="step-number">6</div>
                            <i class="ri-rocket-line"></i>
                        </div>
                        <h4 class="step-title">Launch</h4>
                        <p class="step-description">Successful deployment and ongoing support services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
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

        // Intersection Observer options for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        // Function to animate value for counters
        function animateValue(element, start, end, duration) {
            const startTime = performance.now();
            
            function update(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                const current = Math.floor(easeOutQuart * (end - start) + start);
                
                element.textContent = current + (element.textContent.includes('+') ? '+' : '');
                
                if (progress < 1) {
                    requestAnimationFrame(update);
                }
            }
            requestAnimationFrame(update);
        }

        // Main DOMContentLoaded listener
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Bootstrap Carousel
            const carousel = document.querySelector('#heroCarousel');
            const bsCarousel = new bootstrap.Carousel(carousel, {
                interval: 4000, // Original interval was 4000, changed to 5000 in JS, reverting to 4000
                ride: 'carousel'
            });

            // Pause carousel on hover
            carousel.addEventListener('mouseenter', () => {
                bsCarousel.pause();
            });

            carousel.addEventListener('mouseleave', () => {
                bsCarousel.cycle();
            });

            // Observer for general scroll animations (testimonial cards, process steps, industry/feature cards)
            const generalObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        generalObserver.unobserve(entry.target); // Stop observing once animated
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.testimonial-card, .process-step, .industry-card, .feature-card').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)'; // Initial translateY for animation
                el.style.transition = 'all 0.6s ease';
                generalObserver.observe(el);
            });

            // Observer for stats section animation and counter
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Animate stat numbers
                        const statNumbers = entry.target.querySelectorAll('.stat-number');
                        statNumbers.forEach((stat, index) => {
                            setTimeout(() => {
                                const target = parseInt(stat.getAttribute('data-target'));
                                if (!isNaN(target)) { // Ensure target is a valid number
                                    animateValue(stat, 0, target, 2000);
                                }
                            }, index * 200);
                        });

                        // Add stagger animation to stat cards
                        const statCards = entry.target.querySelectorAll('.stat-card');
                        statCards.forEach((card, index) => {
                            setTimeout(() => {
                                card.style.opacity = '1'; // Ensure opacity is set to 1
                                card.style.transform = 'translateY(0)'; // Ensure transform is reset
                            }, index * 150);
                        });
                        statsObserver.unobserve(entry.target); // Stop observing once animated
                    }
                });
            }, { threshold: 0.3, rootMargin: '0px 0px -50px 0px' }); // Specific options for stats

            const statsContainer = document.querySelector('.stats-container');
            if (statsContainer) {
                // Set initial styles for stat cards for animation
                statsContainer.querySelectorAll('.stat-card').forEach(card => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(30px)';
                    card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                });
                statsObserver.observe(statsContainer);
            }

            // Mobile menu improvements
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            
            if (navbarToggler && navbarCollapse) {
                document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
                    link.addEventListener('click', () => {
                        if (navbarCollapse.classList.contains('show')) {
                            navbarToggler.click();
                        }
                    });
                });
            }

            // Smooth reveal animation for sections
            const revealSections = document.querySelectorAll('section');
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        revealObserver.unobserve(entry.target); // Stop observing once revealed
                    }
                });
            }, { threshold: 0.15 });

            revealSections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(50px)';
                section.style.transition = 'all 0.8s ease';
                revealObserver.observe(section);
            });
        });

        // Add loading animation
        window.addEventListener('load', () => {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.3s ease';
            
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });

        // Add parallax effect to hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.carousel-item');
            
            parallaxElements.forEach(el => {
                const speed = 0.1; // Reduced speed for a more subtle effect
                el.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Enhanced hover effects for stat cards (ripple effect)
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                const ripple = document.createElement('div');
                ripple.classList.add('ripple-effect'); // Add a class for styling
                this.appendChild(ripple);
                
                // Position the ripple at the mouse cursor
                const rect = this.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;

                setTimeout(() => {
                    if (ripple.parentNode) {
                        ripple.parentNode.removeChild(ripple);
                    }
                }, 600);
            });
        });

        // Add CSS for ripple effect dynamically
        const rippleStyle = document.createElement('style');
        rippleStyle.textContent = `
            .ripple-effect {
                position: absolute;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(99, 102, 241, 0.1);
                transform: translate(-50%, -50%);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
                z-index: 2; /* Ensure ripple is above other content */
            }
        `;
        document.head.appendChild(rippleStyle);

        // Parallax effect for floating particles
        document.addEventListener('mousemove', (e) => {
            const particles = document.querySelectorAll('.floating-particle');
            const { clientX, clientY } = e;
            const { innerWidth, innerHeight } = window;
            
            particles.forEach((particle, index) => {
                const speed = (index + 1) * 0.01; // Reduced speed for subtlety
                const x = (clientX - innerWidth / 2) * speed;
                const y = (clientY - innerHeight / 2) * speed;
                
                particle.style.transform = `translate(${x}px, ${y}px)`;
            });
        });
    </script>

<?php
include 'components/footer.php';
?>
