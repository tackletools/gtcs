<?php 
$current_page = 'referralprogram';
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
            --success-color: #10b981;
            --warning-color: #f59e0b;
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
            font-size: 14px;
            color: var(--dark-color);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 3px;
        }

        /* Hero Section */
        .hero-section {
            background: var(--gradient-primary);
            padding: 0 0;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,300 1000,1000 0,700"/></svg>');
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }

        .hero-title {
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            font-weight: 600;
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }

        .hero-subtitle {
            font-size: 0.95rem;
            opacity: 0.9;
            margin-bottom: 0.2rem;
            font-weight: 300;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 1.5rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        /* How It Works Section */
        .how-works-section {
            padding: 2rem 0;
            background: white;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 0.4rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }

        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .step-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f1f5f9;
            text-align: center;
            position: relative;
        }

        .step-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .step-number {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 30px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            color: white;
        }

        .step-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            margin: 1rem auto 1rem;
        }

        .step-icon.share {
            background: var(--gradient-primary);
        }

        .step-icon.join {
            background: var(--gradient-secondary);
        }

        .step-icon.earn {
            background: var(--gradient-accent);
        }

        .step-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.6rem;
            color: var(--dark-color);
        }

        .step-description {
            font-size: 0.8rem;
            color: #6b7280;
            line-height: 1.5;
        }

        /* Rewards Section */
        .rewards-section {
            padding: 2rem 0;
            background: var(--light-color);
        }

        .rewards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.2rem;
            margin-top: 1.5rem;
        }

        .reward-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f1f5f9;
        }

        .reward-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .reward-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .reward-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: white;
            margin-right: 0.8rem;
        }

        .reward-icon.cash {
            background: var(--success-color);
        }

        .reward-icon.discount {
            background: var(--warning-color);
        }

        .reward-icon.bonus {
            background: var(--primary-color);
        }

        .reward-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .reward-amount {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .reward-description {
            font-size: 0.8rem;
            color: #6b7280;
            line-height: 1.5;
        }

        /* CTA Section */
        .cta-section {
            padding: 2rem 0;
            background: var(--gradient-primary);
            text-align: center;
            color: white;
        }

        .cta-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 0.6rem;
        }

        .cta-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 1.2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 0.8rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary-custom {
            background: white;
            color: var(--primary-color);
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            color: var(--primary-color);
        }

        .btn-secondary-custom {
            background: transparent;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-secondary-custom:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
            color: white;
        }

        /* Terms Section */
        .terms-section {
            padding: 2rem 0;
            background: white;
        }

        .terms-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .terms-list {
            list-style: none;
            padding: 0;
        }

        .terms-list li {
            padding: 0.4rem 0;
            color: #6b7280;
            position: relative;
            padding-left: 1.2rem;
            font-size: 0.8rem;
            line-height: 1.6;
        }

        .terms-list li:before {
            content: '•';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: bold;
        }

        /* FAQ Section */
        .faq-section {
            padding: 2rem 0;
            background: var(--light-color);
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            border-radius: 8px;
            margin-bottom: 0.8rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .faq-question {
            padding: 1rem 1.2rem;
            cursor: pointer;
            display: flex;
            justify-content: between;
            align-items: center;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: #f8fafc;
        }

        .faq-question i {
            margin-left: auto;
            transition: transform 0.3s ease;
            font-size: 0.8rem;
        }

        .faq-answer {
            padding: 0 1.2rem 1rem;
            font-size: 0.8rem;
            color: #6b7280;
            line-height: 1.6;
            display: none;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-stats {
                gap: 1rem;
            }

            .stat-number {
                font-size: 1.4rem;
            }

            .steps-container {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .rewards-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-primary-custom,
            .btn-secondary-custom {
                width: 200px;
                justify-content: center;
            }

            .hero-section,
            .how-works-section,
            .rewards-section,
            .cta-section,
            .terms-section,
            .faq-section {
                padding: 1.5rem 0;
            }
        }

        @media (max-width: 480px) {
            .hero-stats {
                flex-direction: column;
                gap: 0.8rem;
            }

            .step-card,
            .reward-card {
                padding: 1.2rem;
            }

            .section-title {
                font-size: 1.3rem;
            }
        }

        /* Animation utilities */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <!-- Hero Section -->
    <section class="referral-section text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem; margin: 0;">
    <div class="container py-0">
        <div class="referral-content text-center">
            <h1 class="referral-title">Earn With Every Referral</h1>
            <p class="referral-subtitle">
                Join our referral program and earn amazing rewards by sharing GTCS with your network. The more you refer, the more you earn!
            </p>

            <div class="referral-stats d-flex justify-content-center gap-4 flex-wrap mt-2">
                <div class="referral-stat-item text-center">
                    <span class="referral-stat-number d-block">₹5,000</span>
                    <span class="referral-stat-label">Per Referral</span>
                </div>
                <div class="referral-stat-item text-center">
                    <span class="referral-stat-number d-block">500+</span>
                    <span class="referral-stat-label">Active Referrers</span>
                </div>
                <div class="referral-stat-item text-center">
                    <span class="referral-stat-number d-block">₹2M+</span>
                    <span class="referral-stat-label">Paid Out</span>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- How It Works Section -->
    <section class="how-works-section">
        <div class="container">
            <h2 class="section-title">How It Works</h2>
            <p class="section-subtitle">Start earning in just three simple steps</p>
            
            <div class="steps-container">
                <div class="step-card fade-in">
                    <div class="step-number">1</div>
                    <div class="step-icon share">
                        <i class="ri-share-line"></i>
                    </div>
                    <h3 class="step-title">Share Your Link</h3>
                    <p class="step-description">Get your unique referral link and share it with friends, colleagues, and your network through social media, email, or direct messaging.</p>
                </div>
                
                <div class="step-card fade-in">
                    <div class="step-number">2</div>
                    <div class="step-icon join">
                        <i class="ri-user-add-line"></i>
                    </div>
                    <h3 class="step-title">They Join & Purchase</h3>
                    <p class="step-description">When someone clicks your link and purchases any of our services worth ₹10,000 or more, you qualify for a referral reward.</p>
                </div>
                
                <div class="step-card fade-in">
                    <div class="step-number">3</div>
                    <div class="step-icon earn">
                        <i class="ri-money-dollar-circle-line"></i>
                    </div>
                    <h3 class="step-title">Earn Rewards</h3>
                    <p class="step-description">Receive your reward within 7 days of successful project completion. Track all your referrals and earnings in your dashboard.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rewards Section -->
    <section class="rewards-section">
        <div class="container">
            <h2 class="section-title">Reward Structure</h2>
            <p class="section-subtitle">Generous rewards for every successful referral</p>
            
            <div class="rewards-grid">
                <div class="reward-card fade-in">
                    <div class="reward-header">
                        <div class="reward-icon cash">
                            <i class="ri-rocket-line"></i>
                        </div>
                        <div class="reward-title">Cash Rewards</div>
                    </div>
                    <div class="reward-amount">₹5,000</div>
                    <p class="reward-description">Earn ₹5,000 for every successful referral where the client purchases services worth ₹10,000 or more. No upper limit on earnings!</p>
                </div>
                
                <div class="reward-card fade-in">
                    <div class="reward-header">
                        <div class="reward-icon discount">
                            <i class="ri-coupon-line"></i>
                        </div>
                        <div class="reward-title">Discount Vouchers</div>
                    </div>
                    <div class="reward-amount">20% OFF</div>
                    <p class="reward-description">Get 20% discount vouchers for your own future projects. Stackable with other offers and valid for 12 months.</p>
                </div>
                
                <div class="reward-card fade-in">
                    <div class="reward-header">
                        <div class="reward-icon bonus">
                            <i class="ri-gift-line"></i>
                        </div>
                        <div class="reward-title">Milestone Bonuses</div>
                    </div>
                    <div class="reward-amount">₹25,000</div>
                    <p class="reward-description">Earn bonus rewards at milestones: ₹10,000 at 5 referrals, ₹25,000 at 10 referrals, and special rewards for top performers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Ready to Start Earning?</h2>
            <p class="cta-subtitle">Join thousands of satisfied referrers and start earning today</p>
            
            <div class="cta-buttons">
                <!--<a href="#" class="btn-primary-custom">-->
                <!--    <i class="ri-rocket-line"></i>-->
                <!--    Start Referring Now-->
                <!--</a>-->
                <a href="./contact.php" class="btn-secondary-custom">
                    <i class="ri-phone-line"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    <!-- Terms Section -->
    <section class="terms-section">
        <div class="container">
            <div class="terms-content">
                <h2 class="section-title">Terms & Conditions</h2>
                <p class="section-subtitle">Please read our referral program terms carefully</p>
                
                <ul class="terms-list">
                    <li>Referral rewards are paid only after successful project completion and payment from the referred client.</li>
                    <li>Minimum project value of ₹10,000 required to qualify for referral rewards.</li>
                    <li>Self-referrals or fake referrals will result in immediate program termination.</li>
                    <li>Rewards are processed within 7 business days of project completion.</li>
                    <li>Referred clients must be new to GTCS and not have any prior business relationship with us.</li>
                    <li>Referral links are valid for 90 days from the date of first click.</li>
                    <li>GTCS reserves the right to modify or terminate the referral program at any time.</li>
                    <li>Disputes regarding referrals will be resolved at GTCS's sole discretion.</li>
                    <li>Tax implications of referral earnings are the responsibility of the referrer.</li>
                    <li>Multiple referrals from the same IP address may be subject to verification.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Get answers to common questions about our referral program</p>
            
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do I get my referral link?</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                    <div class="faq-answer">
                        Simply contact us or fill out the referral form, and we'll provide you with a unique tracking link that you can share with your network.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>When do I get paid?</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                    <div class="faq-answer">
                        Referral rewards are processed within 7 business days after the referred client's project is completed and payment is received.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Is there a limit to how much I can earn?</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                    <div class="faq-answer">
                        No, there's no upper limit! You can refer as many clients as you want and earn ₹5,000 for each successful referral, plus milestone bonuses.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What services qualify for referral rewards?</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                    <div class="faq-answer">
                        All our services qualify as long as the project value is ₹10,000 or more. This includes web development, app development, digital marketing, UI/UX design, and more.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Can I track my referrals?</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                    <div class="faq-answer">
                        Yes, we provide a dashboard where you can track all your referrals, their status, and your earnings in real-time.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What payment methods do you use for rewards?</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                    <div class="faq-answer">
                        We offer multiple payment options including bank transfer, UPI, digital wallets, or discount vouchers for future services.
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script>
        // FAQ Accordion
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const faqItem = question.parentElement;
                const isActive = faqItem.classList.contains('active');
                
                // Close all FAQ items
                document.querySelectorAll('.faq-item').forEach(item => {
                    item.classList.remove('active');
                });
                
                // Toggle current item
                if (!isActive) {
                    faqItem.classList.add('active');
                }
            });
        });

        // Fade in animation on scroll
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