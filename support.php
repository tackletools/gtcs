<?php
$current_page = 'support';
include 'components/header.php'; 
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = htmlspecialchars(trim($_POST['name']));
    $email    = htmlspecialchars(trim($_POST['email']));
    $phone    = htmlspecialchars(trim($_POST['phone']));
    $subject  = htmlspecialchars(trim($_POST['subject']));
    $priority = htmlspecialchars(trim($_POST['priority']));
    $category = htmlspecialchars(trim($_POST['category']));
    $message  = htmlspecialchars(trim($_POST['message']));

    $conn = new mysqli("localhost", "u776627341_gtcscurrent", "Amit@Gusain@2000", "u776627341_gtcs_website");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $stmt = $conn->prepare("INSERT INTO support_requests (name, email, phone, subject, priority, category, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $phone, $subject, $priority, $category, $message);

    if ($stmt->execute()) {
        $success = "Support request submitted successfully.";
    } else {
        $error = "Something went wrong. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Support Hero Section -->
<section class="support-section" style="min-height: 150px; padding: 0; margin: 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="support-content text-white">
                    <h1 class="support-title fade-in">Get the Support You Need</h1>
                    <p class="support-subtitle fade-in">
                        Our dedicated support team is here to help you succeed. Find answers, get assistance, and connect with our experts.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="./contact.php" class="btn btn-light support-btn fade-in">
                            <i class="ri-customer-service-2-line me-2"></i>Contact Support
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="support-icon text-center">
                    <i class="ri-customer-service-line" style="font-size: 10rem; color: rgba(255,255,255,0.2);"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Support Options Section -->
<section class="services-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title fade-in">How Can We Help You?</h2>
            <p class="section-subtitle fade-in">Choose the support option that works best for you</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-card fade-in text-center">
                    <div class="service-icon development mx-auto">
                        <i class="ri-chat-3-line"></i>
                    </div>
                    <h4 class="service-title">Live Chat Support</h4>
                    <p class="service-description">Get instant help from our support team through live chat. Available 24/7 for your convenience.</p>
                    <button class="btn btn-primary">Start Chat</button>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card fade-in text-center">
                    <div class="service-icon marketing mx-auto">
                        <i class="ri-mail-line"></i>
                    </div>
                    <h4 class="service-title">Email Support</h4>
                    <p class="service-description">Send us detailed queries and we'll respond within 24 hours with comprehensive solutions.</p>
                    <a href="mailto:info@globaltechconsultancyservice.com" class="btn btn-primary">Send Email</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card fade-in text-center">
                    <div class="service-icon design mx-auto">
                        <i class="ri-phone-line"></i>
                    </div>
                    <h4 class="service-title">Phone Support</h4>
                    <p class="service-description">Speak directly with our technical experts for immediate assistance and personalized guidance.</p>
                    <a href="tel:+91 8920442794" class="btn btn-primary">Call Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="about-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title fade-in">Frequently Asked Questions</h2>
            <p class="section-subtitle fade-in">Find quick answers to common questions</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item fade-in" style="border: none; margin-bottom: 1rem; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; font-weight: 600;">
                                How long does it take to develop a website?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background: white; padding: 2rem;">
                                The development timeline depends on the complexity and features required. A basic website typically takes 2-4 weeks, while complex applications can take 2-6 months. We provide detailed timelines during the consultation phase.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item fade-in" style="border: none; margin-bottom: 1rem; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" style="background: #f8fafc; color: #0f172a; border: none; font-weight: 600;">
                                Do you provide ongoing maintenance and support?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background: white; padding: 2rem;">
                                Yes, we offer comprehensive maintenance packages that include regular updates, security patches, backups, and technical support. Our maintenance plans are tailored to your specific needs and budget.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item fade-in" style="border: none; margin-bottom: 1rem; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" style="background: #f8fafc; color: #0f172a; border: none; font-weight: 600;">
                                What technologies do you work with?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background: white; padding: 2rem;">
                                We work with a wide range of technologies including HTML/CSS, JavaScript, React, PHP, Python, Node.js, MySQL, MongoDB, and various cloud platforms. We choose the best technology stack based on your project requirements.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item fade-in" style="border: none; margin-bottom: 1rem; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" style="background: #f8fafc; color: #0f172a; border: none; font-weight: 600;">
                                How do you ensure project security?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background: white; padding: 2rem;">
                                Security is our top priority. We implement industry-standard security practices including SSL certificates, data encryption, secure coding practices, regular security audits, and compliance with data protection regulations.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item fade-in" style="border: none; margin-bottom: 1rem; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" style="background: #f8fafc; color: #0f172a; border: none; font-weight: 600;">
                                What are your payment terms?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="background: white; padding: 2rem;">
                                We typically work with a 50% upfront payment and 50% upon project completion. For larger projects, we can arrange milestone-based payments. We accept various payment methods including bank transfers, UPI, and online payments.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Support Section -->
<section id="contact-support" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-form">
                    <h3 class="text-white mb-4">Submit a Support Request</h3>
                        <form method="POST" action="">
    <div class="row">
        <div class="col-md-6 mb-3">
            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
        </div>
        <div class="col-md-6 mb-3">
            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
        </div>
    </div>
    <div class="mb-3">
        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Your Phone" required>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
    </div>
    <div class="mb-3">
        <select class="form-control" name="priority" required>
            <option class="bg-secondary" value="">Select Priority Level</option>
            <option class="bg-secondary" value="low">Low</option>
            <option class="bg-secondary" value="medium">Medium</option>
            <option class="bg-secondary" value="high">High</option>
            <option class="bg-secondary" value="urgent">Urgent</option>
        </select>
    </div>
    <div class="mb-3">
        <select class="form-control" name="category" required>
            <option class="bg-secondary" value="">Select Category</option>
            <option class="bg-secondary" value="technical">Technical Issue</option>
            <option class="bg-secondary" value="billing">Billing Question</option>
            <option class="bg-secondary" value="general">General Inquiry</option>
            <option class="bg-secondary" value="feature">Feature Request</option>
        </select>
    </div>
    <div class="mb-4">
        <textarea class="form-control" name="message" rows="5" placeholder="Describe your issue in detail..." required></textarea>
    </div>
    <button type="submit" class="btn hero-cta w-100">
        <i class="ri-send-plane-line me-2"></i>Submit Request
    </button>
</form>

                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="contact-info">
                    <h3 class="text-white mb-4">Get in Touch</h3>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div>
                            <h5 class="text-white mb-1">Phone Support</h5>
                            <p class="text-light mb-0">+91 8920442794</p>
                            <small class="text-light opacity-75">Mon - Fri, 10:00 AM - 7:00 PM IST</small>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="ri-mail-line"></i>
                        </div>
                        <div>
                            <h5 class="text-white mb-1">Email Support</h5>
                            <p class="text-light mb-0">info@globaltechconsultancyservice.com</p>
                            <small class="text-light opacity-75">We respond within 24 hours</small>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="ri-chat-3-line"></i>
                        </div>
                        <div>
                            <h5 class="text-white mb-1">Live Chat</h5>
                            <p class="text-light mb-0">Available 24/7</p>
                            <small class="text-light opacity-75">Instant support for urgent issues</small>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <div>
                            <h5 class="text-white mb-1">Office Address</h5>
                            <p class="text-light mb-0"> Radhe Krishan Bhawan, 1st Floor, In Fornt CGR Complex Block C2 Near Arjan Metro Station,</p>
                            <small class="text-light opacity-75">Delhi, India - 110047</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Support Stats Section -->
<section class="services-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="about-stats">
                    <span class="stat-number counter">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="about-stats">
                    <span class="stat-number counter">< 2</span>
                    <span class="stat-label">Hours Response Time</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="about-stats">
                    <span class="stat-number counter">98%</span>
                    <span class="stat-label">Customer Satisfaction</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="about-stats">
                    <span class="stat-number counter">500+</span>
                    <span class="stat-label">Issues Resolved Monthly</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Fade in animation
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

// Observe all fade-in elements
document.querySelectorAll('.fade-in').forEach(el => {
    observer.observe(el);
});

// Back to top button
const backToTop = document.querySelector('.back-to-top');
if (backToTop) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    });
}
</script>

<?php include 'components/footer.php'; ?>