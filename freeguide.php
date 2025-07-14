<?php
$current_page = 'freeguide';
 include 'components/header.php'; 
?>

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 2px 4px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 8px 10px -3px rgba(0, 0, 0, 0.1);
            --border-radius: 6px;
            --transition: all 0.2s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 13px;
            line-height: 1.4;
            color: var(--dark-color);
            background: var(--light-color);
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 0.75rem;
        }

        .section {
            padding: 1.5rem 0;
        }

        /* Hero Section */
        .hero-section {
            background: var(--primary-gradient);
            height: 90vh;
            display: flex;
            align-items: center;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a"><stop offset="0" stop-color="%23ffffff" stop-opacity=".1"/><stop offset="1" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="200" cy="200" r="180" fill="url(%23a)"/><circle cx="800" cy="400" r="120" fill="url(%23a)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            align-items: stretch;
            position: relative;
            z-index: 2;
            height: 100%;
        }

        .hero-text {
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            padding: 1rem 0;
        }

        .hero-title {
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: clamp(0.8rem, 1.5vw, 1rem);
            opacity: 0.9;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            backdrop-filter: blur(10px);
            transition: var(--transition);
        }

        .feature-item:hover {
            transform: translateY(-1px);
            background: rgba(255, 255, 255, 0.15);
        }

        .feature-icon {
            width: 1.5rem;
            height: 1.5rem;
            background: var(--accent-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            color: white;
            flex-shrink: 0;
        }

        .feature-text {
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Form Section */
        .form-container {
            animation: slideInRight 0.6s ease-out;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            padding: 1rem 0;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            padding: 1rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
            max-height: 70vh;
            overflow-y: auto;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--secondary-gradient);
        }

        .form-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .form-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.25rem;
        }

        .form-subtitle {
            color: var(--text-muted);
            font-size: 0.7rem;
        }

        .form-group {
            margin-bottom: 0.75rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.25rem;
            font-weight: 500;
            color: var(--dark-color);
            font-size: 0.7rem;
        }

        .form-input {
            width: 100%;
            padding: 0.4rem 0.6rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 0.75rem;
            transition: var(--transition);
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.1);
        }

        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(110px, 1fr));
            gap: 0.4rem;
            margin-top: 0.4rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.4rem;
            background: var(--light-color);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.7rem;
        }

        .checkbox-item:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .checkbox-item input[type="checkbox"] {
            width: 0.9rem;
            height: 0.9rem;
            accent-color: #667eea;
        }

        .submit-btn {
            width: 100%;
            padding: 0.6rem;
            background: var(--secondary-gradient);
            border: none;
            border-radius: var(--border-radius);
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
            box-shadow: var(--shadow-md);
        }

        .submit-btn:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-lg);
        }

        .form-disclaimer {
            text-align: center;
            font-size: 0.6rem;
            color: var(--text-muted);
            margin-top: 0.6rem;
            line-height: 1.3;
        }

        /* Preview Section */
        .preview-section {
            background: white;
            padding: 2rem 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: clamp(1.25rem, 3vw, 1.75rem);
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            font-size: 0.8rem;
            color: var(--text-muted);
            max-width: 500px;
            margin: 0 auto;
        }

        .preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .preview-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 1.25rem;
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .preview-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent-gradient);
            transform: scaleX(0);
            transition: var(--transition);
        }

        .preview-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .preview-card:hover::before {
            transform: scaleX(1);
        }

        .preview-icon {
            width: 2.5rem;
            height: 2.5rem;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.75rem;
            font-size: 1rem;
            color: white;
        }

        .preview-card h3 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .preview-card p {
            color: var(--text-muted);
            line-height: 1.4;
            font-size: 0.75rem;
        }

        /* Testimonials Section */
        .testimonials-section {
            background: var(--dark-gradient);
            color: white;
            padding: 2rem 0;
        }

        .testimonials-section .section-title {
            color: white;
            -webkit-text-fill-color: white;
        }

        .testimonials-section .section-subtitle {
            color: rgba(255, 255, 255, 0.8);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .testimonial-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            padding: 1.25rem;
            backdrop-filter: blur(10px);
            transition: var(--transition);
        }

        .testimonial-card:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.15);
        }

        .testimonial-content {
            margin-bottom: 1rem;
        }

        .testimonial-text {
            font-style: italic;
            line-height: 1.4;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.75rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .author-avatar {
            width: 2rem;
            height: 2rem;
            background: var(--accent-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            color: white;
        }

        .author-info h4 {
            font-weight: 500;
            margin-bottom: 0.125rem;
            font-size: 0.8rem;
        }

        .author-info span {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.7rem;
        }

        /* Animations */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                height: auto;
                min-height: 100vh;
            }
            
            .hero-content {
                grid-template-columns: 1fr;
                gap: 1rem;
                height: auto;
            }
            
            .hero-text {
                text-align: center;
                height: auto;
                padding: 1rem 0;
            }
            
            .form-container {
                height: auto;
                padding: 1rem 0;
            }
            
            .form-card {
                max-height: none;
                overflow-y: visible;
            }
            
            .section {
                padding: 1rem 0;
            }
            
            .form-card {
                padding: 1rem;
            }
            
            .feature-grid {
                grid-template-columns: 1fr;
            }
            
            .checkbox-grid {
                grid-template-columns: 1fr;
            }
            
            .preview-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 0.5rem;
            }
            
            .hero-section {
                min-height: 90vh;
                padding: 0.75rem 0;
            }
            
            .form-card {
                padding: 0.75rem;
            }
            
            .feature-item {
                padding: 0.375rem;
            }
            
            .feature-icon {
                width: 1.25rem;
                height: 1.25rem;
                font-size: 0.65rem;
            }
            
            .feature-text {
                font-size: 0.65rem;
            }
            
            .preview-card,
            .testimonial-card {
                padding: 1rem;
            }
            
            .section {
                padding: 0.75rem 0;
            }
            
            .preview-icon {
                width: 2rem;
                height: 2rem;
                font-size: 0.85rem;
            }
        }

        /* Ultra-compact for very small screens */
        @media (max-width: 360px) {
            body {
                font-size: 12px;
            }
            
            .container {
                padding: 0 0.25rem;
            }
            
            .hero-title {
                font-size: 1.25rem;
            }
            
            .hero-subtitle {
                font-size: 0.7rem;
            }
            
            .form-title {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.1rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">Free Tech Consultation Guide</h1>
                    <p class="hero-subtitle">
                        Transform your business with our comprehensive digital transformation guide. 
                        Get expert insights, implementation strategies, and real-world case studies.
                    </p>
                    <div class="feature-grid">
                        <div class="feature-item">
                            <div class="feature-icon">📚</div>
                            <div class="feature-text">50+ Pages Guide</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🎯</div>
                            <div class="feature-text">Step-by-Step</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">💼</div>
                            <div class="feature-text">Case Studies</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🤝</div>
                            <div class="feature-text">Free Consultation</div>
                        </div>
                    </div>
                </div>
                <div class="form-container">
                    <div class="form-card">
                        <div class="form-header">
                            <h2 class="form-title">Get Your Free Guide</h2>
                            <p class="form-subtitle">Fill out the form below to receive instant access</p>
                        </div>
                        <form id="guideForm">
    <div class="col-md-12">
      <div class="form-group mb-3">
        <label for="fullName" class="form-label">Full Name *</label>
        <input type="text" id="fullName" name="fullName" class="form-input form-control text-dark" required>
      </div>
    </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="email" class="form-label">Email Address *</label>
        <input type="email" id="email" name="email" class="form-input form-control text-dark" required>
      </div>
    </div>
    <div class="col-md-6">
  <div class="form-group mb-3">
    <label for="phone" class="form-label">Phone Number *</label>
    <input type="tel" id="phone" name="phone" class="form-input form-control text-dark" pattern="[0-9]{10}" placeholder="Enter 10-digit phone number" required>
  </div>
  </div>
</div>


  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="company" class="form-label">Company Name</label>
        <input type="text" id="company" name="company" class="form-input form-control text-dark">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="industry" class="form-label">Industry</label>
        <select id="industry" name="industry" class="form-input form-select">
          <option value="">Select your industry</option>
          <option value="technology">Technology</option>
          <option value="healthcare">Healthcare</option>
          <option value="finance">Finance</option>
          <option value="retail">Retail</option>
          <option value="manufacturing">Manufacturing</option>
          <option value="education">Education</option>
          <option value="other">Other</option>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group mb-3">
    <label class="form-label">Areas of Interest</label>
    <div class="checkbox-grid">
      <label class="checkbox-item">
        <input type="checkbox" name="interests[]" value="web-development">
        Web Development
      </label>
      <label class="checkbox-item">
        <input type="checkbox" name="interests[]" value="mobile-apps">
        Mobile Apps
      </label>
      <label class="checkbox-item">
        <input type="checkbox" name="interests[]" value="digital-marketing">
        Digital Marketing
      </label>
      <label class="checkbox-item">
        <input type="checkbox" name="interests[]" value="cybersecurity">
        Cybersecurity
      </label>
      <label class="checkbox-item">
        <input type="checkbox" name="interests[]" value="cloud-solutions">
        Cloud Solutions
      </label>
      <label class="checkbox-item">
        <input type="checkbox" name="interests[]" value="data-analytics">
        Data Analytics
      </label>
    </div>
  </div>

  <button type="submit" class="submit-btn btn btn-primary d-flex align-items-center gap-2">
    <span>📥</span>
    Download Free Guide
  </button>

  <p class="form-disclaimer mt-3">
    By downloading this guide, you agree to receive occasional emails from GTCS. 
    We respect your privacy and you can unsubscribe at any time.
  </p>
</form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Section -->
    <section class="preview-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">What's Inside the Guide</h2>
                <p class="section-subtitle">
                    A comprehensive resource designed to help you navigate the complexities of digital transformation
                </p>
            </div>
            <div class="preview-grid">
                <div class="preview-card">
                    <div class="preview-icon">🏗️</div>
                    <h3>Digital Foundation</h3>
                    <p>Understanding the basics of digital transformation and how it impacts modern business operations.</p>
                </div>
                <div class="preview-card">
                    <div class="preview-icon">⚙️</div>
                    <h3>Technology Stack</h3>
                    <p>Choosing the right technologies and tools for your specific business needs and budget.</p>
                </div>
                <div class="preview-card">
                    <div class="preview-icon">📈</div>
                    <h3>Implementation Strategy</h3>
                    <p>Step-by-step approach to implementing digital solutions without disrupting operations.</p>
                </div>
                <div class="preview-card">
                    <div class="preview-icon">🛡️</div>
                    <h3>Security & Compliance</h3>
                    <p>Ensuring your digital infrastructure is secure and meets industry standards.</p>
                </div>
                <div class="preview-card">
                    <div class="preview-icon">👥</div>
                    <h3>Team Training</h3>
                    <p>Preparing your team for digital transformation and maximizing technology adoption.</p>
                </div>
                <div class="preview-card">
                    <div class="preview-icon">🏆</div>
                    <h3>Success Stories</h3>
                    <p>Real case studies from businesses that successfully transformed their operations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">What Our Clients Say</h2>
                <p class="section-subtitle">
                    Hear from businesses that have successfully transformed with our guidance
                </p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p class="testimonial-text">
                            "This guide provided invaluable insights that helped us streamline our entire digital transformation process. The step-by-step approach made implementation seamless."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">👩</div>
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <span>CEO, TechStart Inc.</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p class="testimonial-text">
                            "The structured approach made it easy to implement changes without disrupting our existing operations. We saw immediate improvements in efficiency."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">👨</div>
                        <div class="author-info">
                            <h4>Michael Chen</h4>
                            <span>CTO, InnovateNow</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p class="testimonial-text">
                            "Excellent resource! The security chapter alone saved us thousands in potential vulnerabilities. The real-world examples were particularly helpful."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">👩</div>
                        <div class="author-info">
                            <h4>Emily Rodriguez</h4>
                            <span>IT Director, SecureBase</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Form submission handler
        document.getElementById('guideForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            // Simple validation
            if (!data.fullName || !data.email) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(data.email)) {
                alert('Please enter a valid email address.');
                return;
            }
            
            // Simulate form submission
            const submitBtn = document.querySelector('.submit-btn');
            const originalHTML = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<span>⏳</span> Processing...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('Thank you! Your free guide has been sent to your email address.');
                this.reset();
                submitBtn.innerHTML = originalHTML;
                submitBtn.disabled = false;
            }, 2000);
        });

        // Add intersection observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        // Observe all cards for animation
        document.querySelectorAll('.preview-card, .testimonial-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(15px)';
            card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            observer.observe(card);
        });
    </script>
    
    <script>
document.getElementById("guideForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch("submit_guide.php", {
        method: "POST",
        body: formData,
    })
    .then(res => res.text())
    .then(msg => {
        alert(msg); // Or display in the UI
        form.reset();
    })
    .catch(() => alert("Something went wrong. Please try again."));
});
</script>


<?php
 include 'components/footer.php'; 
?>