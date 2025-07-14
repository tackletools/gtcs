
<?php 
$current_page = 'contact';
include "components/header.php";
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        line-height: 1.6;
        color: #333;
        background: #ffffff;
    }

    /* Simple Hero Section - Fixed */
    .hero-section {
        margin: -150px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 120px 0 80px 0;
        text-align: center;
        position: relative;
    }

    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .hero-section p {
        font-size: 1.3rem;
        color: rgba(255,255,255,0.9);
        margin: 0 auto;
        max-width: 600px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    /* Card Styles */
    .card-modern {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(44, 95, 139, 0.1);
        border: none;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(44, 95, 139, 0.15);
    }

    .card-header-modern {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border: none;
    }

    .card-body-modern {
        padding: 40px;
    }

    /* Contact Info Styles */
    .contact-info-item {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        padding: 20px;
        background: rgba(102, 126, 234, 0.05);
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .contact-info-item:hover {
        background: rgba(102, 126, 234, 0.1);
        transform: translateX(5px);
    }

    .contact-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        font-size: 24px;
        color: white;
    }

    .contact-icon.address {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .contact-icon.phone {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .contact-icon.email {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .contact-icon.hours {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    .contact-info-content h5 {
        color: #2C5F8B;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .contact-info-content p {
        color: #6C757D;
        margin: 0;
        line-height: 1.5;
    }

    /* Form Styles */
    .form-modern .form-label {
        font-weight: 600;
        color: #2C5F8B;
        margin-bottom: 8px;
    }

    .form-modern .form-control,
    .form-modern .form-select {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: #fafafa;
    }

    .form-modern .form-control:focus,
    .form-modern .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        background: white;
    }

    .btn-send {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        padding: 15px 40px;
        font-weight: 600;
        font-size: 18px;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-send:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.3);
        color: white;
    }

    /* Success/Error Messages */
    .success-message {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .error-message {
        background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
        color: white;
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    /* Main Content */
    .main-content {
        position: relative;
        z-index: 10;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            padding: 80px 0 60px 0;
        }
        
        .hero-section h1 {
            font-size: 2.5rem;
        }
        
        .hero-section p {
            font-size: 1.1rem;
            padding: 0 20px;
        }
        
        .card-body-modern {
            padding: 25px;
        }
        
        .contact-info-item {
            flex-direction: column;
            text-align: center;
        }
        
        .contact-icon {
            margin-right: 0;
            margin-bottom: 15px;
        }
    }

    @media (max-width: 576px) {
        .hero-section h1 {
            font-size: 2rem;
        }
        
        .hero-section p {
            font-size: 1rem;
        }
    }
</style>

<?php
/* ---------- CONTACT‑FORM BACKEND ---------- */

ini_set('display_errors', 1);          // remove or set to 0 in production
error_reporting(E_ALL);

/* 1.  DB credentials */
$host     = "localhost";
$username = "u776627341_gtcscurrent";
$password = "Amit@Gusain@2000";        // ✔️ store in env / config file later
$database = "u776627341_gtcs_website";

/* 2.  Initialise alert variables so they exist even on first load */
$success_message = '';
$error_message   = '';

/* 3.  Only run when the form posts */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /* 3a.  Collect and sanitise */
    $name             = htmlspecialchars(trim($_POST['name']          ?? ''));
    $email            = htmlspecialchars(trim($_POST['email']         ?? ''));
    $phone            = htmlspecialchars(trim($_POST['phone']         ?? ''));
    $company          = htmlspecialchars(trim($_POST['company']       ?? ''));
    $designation      = htmlspecialchars(trim($_POST['designation']   ?? ''));
    $hear_about       = htmlspecialchars(trim($_POST['hear_about']    ?? ''));
    $service_required = htmlspecialchars(trim($_POST['service_required'] ?? ''));
    $budget           = htmlspecialchars(trim($_POST['budget']        ?? ''));
    $message          = htmlspecialchars(trim($_POST['message']       ?? ''));

    /* 3b.  Basic server‑side validation (required fields only) */
    if ($name && $email && $service_required && $message) {

        /* 4.  Connect DB */
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            $error_message = "Database connection failed.";
        } else {
            $stmt = $conn->prepare(
                "INSERT INTO contact_messages
                 (name, email, phone, company, designation, hear_about,
                  service_required, budget, message)
                 VALUES (?,?,?,?,?,?,?,?,?)"
            );
            $stmt->bind_param(
                "sssssssss",
                $name, $email, $phone, $company, $designation,
                $hear_about, $service_required, $budget, $message
            );

            if ($stmt->execute()) {
                $success_message = "Thank you! Your message has been received.";
                $_POST = [];                   // clear sticky values
            } else {
                $error_message = "Something went wrong. Please try again.";
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        $error_message = "Please fill in all required fields.";
    }
}
/* ---------- /CONTACT‑FORM BACKEND ---------- */
?>


<!-- Banner Image Section -->
<section class="banner-image mb-3">
    <img src="assets/contact.png" alt="Contact Banner" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
</section>

<!-- Main Contact Section -->
<section class="py-5 main-content">
    <div class="container">
        <div class="row g-4">
            <!-- Contact Information Card -->
            <div class="col-lg-6">
                <div class="card-modern h-100">
                    <div class="card-header-modern text-center">
                        <h3 class="mb-0">
                            <i class="fas fa-headset me-2"></i>
                            Get In Touch
                        </h3>
                    </div>
                    <div class="card-body-modern">
                        <div class="contact-info-item">
                            <div class="contact-icon address">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Our Address</h5>
                                <p>Radhe Krishan Bhawan, 1st Floor, In Front CGR Complex,<br/> Block C2, Bandh Road, Near Arjan Metro Station, India,<br/> South Delhi, Delhi,110047</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-icon phone">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Phone Numbers</h5>
                                <p>+91 8920442794<br>+91 8187948451</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-icon email">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Email Address</h5>
                                <p>info@globaltechconsultancyservice.com</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-icon hours">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Working Hours</h5>
                                <p>Mon - Fri: 10:00 AM - 7:00 PM<br>Sat - Sun: 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Card -->
            <div class="col-lg-6">
                <div class="card-modern h-100">
                    <div class="card-header-modern text-center">
                        <h3 class="mb-0">
                            <i class="fas fa-paper-plane me-2"></i>
                            Send Us a Message
                        </h3>
                    </div>
                    <div class="card-body-modern">
                        <?php if (!empty($success_message)): ?>
                            <div class="success-message">
                                <i class="fas fa-check-circle me-2"></i>
                                <?php echo $success_message; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($error_message)): ?>
                            <div class="error-message">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" action="" class="form-modern">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="fas fa-user me-1"></i>Full Name *
                                    </label>
                                    <input type="text" class="form-control text-dark" name="name" placeholder="Enter your full name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="fas fa-envelope me-1"></i>Email Address *
                                    </label>
                                    <input type="email" class="form-control text-dark" name="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                                </div>
<div class="col-md-6">
    <label class="form-label">
        <i class="fas fa-phone me-1"></i>Phone Number
    </label>
    <input type="number" 
           class="form-control text-dark no-spinner" 
           name="phone" 
           placeholder="Enter phone number with country code" 
           inputmode="numeric" 
           oninput="this.value = this.value.replace(/[^0-9]/g, '')"
           value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" 
           required>
    <small class="form-text text-muted">Enter numbers only (with country code, e.g., 919876543210)</small>
</div>

<style>
/* Hide number input spinner buttons */
input[type=number].no-spinner::-webkit-inner-spin-button, 
input[type=number].no-spinner::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number].no-spinner {
    -moz-appearance: textfield; /* Firefox */
}
</style>

                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="fas fa-building me-1"></i>Company Name
                                    </label>
                                    <input type="text" class="form-control text-dark" name="company" placeholder="Enter your company name" value="<?php echo isset($_POST['company']) ? htmlspecialchars($_POST['company']) : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="fas fa-briefcase me-1"></i>Designation
                                    </label>
                                    <input type="text" class="form-control text-dark" name="designation" placeholder="Enter your designation" value="<?php echo isset($_POST['designation']) ? htmlspecialchars($_POST['designation']) : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="fas fa-bullhorn me-1"></i>How did you hear about us?
                                    </label>
                                    <select class="form-select" name="hear_about">
                                        <option value="">Select an option</option>
                                        <option value="google" <?php echo (isset($_POST['hear_about']) && $_POST['hear_about'] == 'google') ? 'selected' : ''; ?>>Google Search</option>
                                        <option value="social_media" <?php echo (isset($_POST['hear_about']) && $_POST['hear_about'] == 'social_media') ? 'selected' : ''; ?>>Social Media</option>
                                        <option value="referral" <?php echo (isset($_POST['hear_about']) && $_POST['hear_about'] == 'referral') ? 'selected' : ''; ?>>Friend/Colleague Referral</option>
                                        <option value="advertisement" <?php echo (isset($_POST['hear_about']) && $_POST['hear_about'] == 'advertisement') ? 'selected' : ''; ?>>Advertisement</option>
                                        <option value="website" <?php echo (isset($_POST['hear_about']) && $_POST['hear_about'] == 'website') ? 'selected' : ''; ?>>Company Website</option>
                                        <option value="event" <?php echo (isset($_POST['hear_about']) && $_POST['hear_about'] == 'event') ? 'selected' : ''; ?>>Trade Show/Event</option>
                                        <option value="email" <?php echo (isset($_POST['hear_about']) && $_POST['hear_about'] == 'email') ? 'selected' : ''; ?>>Email Marketing</option>
                                        <option value="other" <?php echo (isset($_POST['hear_about']) && $_POST['hear_about'] == 'other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="fas fa-cogs me-1"></i>Service Required *
                                    </label>
                                    <select class="form-select" name="service_required" required>
                                        <option value="">Choose a service</option>
                                        <option value="website_development" <?php echo (isset($_POST['service_required']) && $_POST['service_required'] == 'website_development') ? 'selected' : ''; ?>>Website Development</option>
                                        <option value="app_development" <?php echo (isset($_POST['service_required']) && $_POST['service_required'] == 'app_development') ? 'selected' : ''; ?>>Apps Development</option>
                                        <option value="game_development" <?php echo (isset($_POST['service_required']) && $_POST['service_required'] == 'game_development') ? 'selected' : ''; ?>>Game Development</option>
                                        <option value="digital_marketing" <?php echo (isset($_POST['service_required']) && $_POST['service_required'] == 'digital_marketing') ? 'selected' : ''; ?>>Digital Marketing</option>
                                        <option value="ecommerce" <?php echo (isset($_POST['service_required']) && $_POST['service_required'] == 'ecommerce') ? 'selected' : ''; ?>>Ecommerce</option>
                                        <option value="ui_ux_design" <?php echo (isset($_POST['service_required']) && $_POST['service_required'] == 'ui_ux_design') ? 'selected' : ''; ?>>UI/UX design</option>
                                        <option value="multimedia_animation" <?php echo (isset($_POST['service_required']) && $_POST['service_required'] == 'multimedia_animation') ? 'selected' : ''; ?>>Multimedia Animation</option>
                                        <option value="databases" <?php echo (isset($_POST['service_required']) && $_POST['service_required'] == 'databases') ? 'selected' : ''; ?>>Databases</option>
                                        <option value="cyber_security" <?php echo (isset($_POST['service_required']) && $_POST['service_required'] == 'cyber_security') ? 'selected' : ''; ?>>Cyber Security</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="fas fa-rupee-sign me-1"></i>Project Budget
                                    </label>
                                    <select class="form-select" name="budget">
                                        <option value="">Select budget range</option>
                                        <option value="under_50k" <?php echo (isset($_POST['budget']) && $_POST['budget'] == 'under_50k') ? 'selected' : ''; ?>>Under ₹50 Thousand</option>
                                        <option value="50k_1l" <?php echo (isset($_POST['budget']) && $_POST['budget'] == '50k_1l') ? 'selected' : ''; ?>>₹50 Thousand - ₹1 Lakh</option>
                                        <option value="1l_1.5l" <?php echo (isset($_POST['budget']) && $_POST['budget'] == '1l_1.5l') ? 'selected' : ''; ?>>₹1 Lakh - ₹1.5 Lakh</option>
                                        <option value="1.5l_2l" <?php echo (isset($_POST['budget']) && $_POST['budget'] == '1.5l_2l') ? 'selected' : ''; ?>>₹1.5 Lakh - ₹2 Lakh</option>
                                        <option value="2.5l_5l" <?php echo (isset($_POST['budget']) && $_POST['budget'] == '2.5l_5l') ? 'selected' : ''; ?>>₹2.5 Lakh - ₹5 Lakh</option>
                                        <option value="above_5l" <?php echo (isset($_POST['budget']) && $_POST['budget'] == 'above_5l') ? 'selected' : ''; ?>>Above ₹5 Lakh</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">
                                        <i class="fas fa-comment me-1"></i>Your Message *
                                    </label>
                                    <textarea class="form-control text-dark" name="message" rows="4" placeholder="Tell us more about your requirements and how we can help you..." required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-send">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
include "components/footer.php";
?>
