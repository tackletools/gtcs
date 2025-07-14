<?php 
$current_page = 'joinfreelancer';
 include "components/header.php";
?>

<style>
    /* Additional styles specific to freelancer page */
    .freelancer-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 2rem 0 2rem;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .freelancer-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,300 1000,1000 0,700"/></svg>');
        pointer-events: none;
    }
    
    .benefits-section {
        padding: 3rem 0;
        background: var(--light-color);
    }
    
    .benefit-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        height: 100%;
    }
    
    .benefit-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }
    
    .benefit-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 1.5rem;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: white;
    }
    
    .registration-section {
        padding: 6rem 0;
        background: white;
    }
    
    .registration-form {
        background: #f8fafc;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        outline: none;
    }
    
    .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }
    
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        outline: none;
    }
    
    .checkbox-group {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .checkbox-item {
        display: flex;
        align-items: center;
        background: white;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
        cursor: pointer;
        min-width: 150px;
    }
    
    .checkbox-item:hover {
        border-color: var(--primary-color);
        background: rgba(99, 102, 241, 0.05);
    }
    
    .checkbox-item input[type="checkbox"] {
        margin-right: 0.5rem;
        transform: scale(1.2);
    }
    
    .submit-btn {
        background: var(--gradient-primary);
        border: none;
        padding: 1rem 3rem;
        border-radius: 50px;
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        cursor: pointer;
        width: 100%;
    }
    
    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
    }
    
    .requirements-section {
        padding: 6rem 0;
        background: var(--dark-color);
        color: white;
    }
    
    .requirement-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        backdrop-filter: blur(10px);
    }
    
    .requirement-icon {
        width: 40px;
        height: 40px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .stats-section {
        padding: 2rem 0;
        background: var(--gradient-primary);
        color: white;
        text-align: center;
    }
    
    /* .stat-item {
        margin-bottom: 2rem;
    } */
    
    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        display: block;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        font-size: 1.1rem;
        opacity: 0.9;
    }
    
    @media (max-width: 768px) {
        .freelancer-hero {
            padding: 6rem 0 4rem;
            text-align: center;
        }
        
        .registration-form {
            padding: 2rem;
        }
        
        .checkbox-group {
            flex-direction: column;
        }
        
        .checkbox-item {
            min-width: auto;
        }
    }

     .gradient-text-3 {
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

</style>

<!-- Freelancer Hero Section -->
<section class="freelancer-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Join Our Elite <span class="gradient-text-3">Freelancer</span> Network</h1>
                <p class="lead mb-4">
                    Become part of GTCS's exclusive freelancer community and work on cutting-edge projects 
                    with global clients. Turn your skills into a thriving career.
                </p>
                <div class="d-flex gap-3">
                    <button class="btn btn-light btn-lg px-4" data-bs-toggle="modal" data-bs-target="#joinModal">
                        <i class="ri-user-add-line me-2"></i>Join Now
                    </button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="text-center">
                    <i class="ri-team-line" style="font-size: 15rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="benefits-section" id="benefits">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 text-center">
                <h2 class="section-title">Why Choose GTCS?</h2>
                <p class="section-subtitle">Join thousands of successful freelancers who have transformed their careers with us</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="ri-money-dollar-circle-line"></i>
                    </div>
                    <h4>Competitive Rates</h4>
                    <p>Earn premium rates for your expertise. Our freelancers earn 30-50% more than industry average.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="ri-global-line"></i>
                    </div>
                    <h4>Global Projects</h4>
                    <p>Work with international clients on diverse projects that challenge and expand your skillset.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="ri-time-line"></i>
                    </div>
                    <h4>Flexible Schedule</h4>
                    <p>Choose your own hours and work from anywhere. Perfect work-life balance on your terms.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="ri-graduation-cap-line"></i>
                    </div>
                    <h4>Skill Development</h4>
                    <p>Access to exclusive training programs and certifications to enhance your professional growth.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="ri-shield-check-line"></i>
                    </div>
                    <h4>Secure Payments</h4>
                    <p>Guaranteed payment protection with our escrow system. Get paid on time, every time.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="ri-customer-service-2-line"></i>
                    </div>
                    <h4>24/7 Support</h4>
                    <p>Dedicated support team to help you succeed. We're here whenever you need assistance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Active Freelancers</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Projects Completed</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number">₹50L+</span>
                    <span class="stat-label">Total Earnings</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number">4.9★</span>
                    <span class="stat-label">Average Rating</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Requirements Section -->
<section class="requirements-section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">What We're Looking For</h2>
                <div class="requirement-item">
                    <div class="requirement-icon">
                        <i class="ri-code-s-slash-line"></i>
                    </div>
                    <div>
                        <h5>Technical Expertise</h5>
                        <p>Proven experience in your field with a strong portfolio of completed projects.</p>
                    </div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-icon">
                        <i class="ri-chat-3-line"></i>
                    </div>
                    <div>
                        <h5>Communication Skills</h5>
                        <p>Excellent English communication skills for effective client interaction.</p>
                    </div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-icon">
                        <i class="ri-time-line"></i>
                    </div>
                    <div>
                        <h5>Reliability</h5>
                        <p>Commitment to deadlines and delivering high-quality work consistently.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">In-Demand Skills</h2>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> Web Development</li>
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> Mobile App Development</li>
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> UI/UX Design</li>
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> Digital Marketing</li>
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> Data Science</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> Cybersecurity</li>
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> Game Development</li>
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> Content Writing</li>
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> Video Animation</li>
                            <li class="mb-2"><i class="ri-arrow-right-s-line text-primary"></i> Project Management</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Call to Action Section -->
<!-- <section class="py-5" style="background: var(--gradient-primary); color: white;">
    <div class="container text-center">
        <h2 class="mb-3">Ready to Start Your Freelancing Journey?</h2>
        <p class="lead mb-4">Join GTCS today and transform your skills into a successful career</p>
        <a href="#registration" class="btn btn-light btn-lg px-5">
            <i class="ri-rocket-2-line me-2"></i>Get Started Now
        </a>
    </div>
</section> -->

<script>
    // Form validation and enhancement
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.registration-form');
        const skillCheckboxes = document.querySelectorAll('input[name="skills[]"]');
        
        // Ensure at least one skill is selected
        form.addEventListener('submit', function(e) {
            const checkedSkills = Array.from(skillCheckboxes).filter(cb => cb.checked);
            if (checkedSkills.length === 0) {
                e.preventDefault();
                alert('Please select at least one skill.');
                return false;
            }
        });
        
        // File upload validation
        const resumeInput = document.querySelector('input[name="resume"]');
        resumeInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const fileSize = file.size / 1024 / 1024; // Convert to MB
                const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                
                if (fileSize > 5) {
                    alert('File size must be less than 5MB');
                    this.value = '';
                    return;
                }
                
                if (!allowedTypes.includes(file.type)) {
                    alert('Please upload a PDF, DOC, or DOCX file');
                    this.value = '';
                    return;
                }
            }
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
</script>

<!-- Join Freelancer Modal -->
<div class="modal fade" id="joinModal" tabindex="-1" aria-labelledby="joinModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title" id="joinModalLabel">Freelancer Quick Registration</h6>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-2 px-3">
        <form method="post" enctype="multipart/form-data" action="submit_freelancer.php">
          <!-- Name -->
          <div class="mb-2">
            <label class="form-label small mb-1">Name</label>
            <input type="text" class="form-control form-control-sm text-dark" name="name" required>
          </div>

          <!-- Email -->
          <div class="mb-2">
            <label class="form-label small mb-1">Email</label>
            <input type="email" class="form-control form-control-sm text-dark" name="email" required>
          </div>

          <!-- Phone -->
          <div class="mb-2">
            <label class="form-label small mb-1">Phone</label>
            <input type="tel" class="form-control form-control-sm text-dark" name="phone" pattern="[0-9]{10}" placeholder="10-digit number" required>
          </div>

          <!-- Skills -->
          <div class="mb-2">
            <label class="form-label small mb-1">Skills</label>
            <div class="d-flex flex-wrap gap-2">
              <!-- Group 1 -->
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="Web Development">
                <label class="form-check-label">Web Dev</label>
              </div>
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="Mobile App Development">
                <label class="form-check-label">App Dev</label>
              </div>
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="UI/UX Design">
                <label class="form-check-label">UI/UX</label>
              </div>
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="Graphic Design">
                <label class="form-check-label">Graphic Design</label>
              </div>
              <!-- Group 2 -->
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="Content Writing">
                <label class="form-check-label">Content</label>
              </div>
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="Digital Marketing">
                <label class="form-check-label">Marketing</label>
              </div>
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="SEO">
                <label class="form-check-label">SEO</label>
              </div>
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="Video Editing">
                <label class="form-check-label">Video Editing</label>
              </div>
              <!-- Group 3 -->
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="Data Science">
                <label class="form-check-label">Data Science</label>
              </div>
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="Cybersecurity">
                <label class="form-check-label">Cybersecurity</label>
              </div>
              <div class="form-check form-check-inline small">
                <input class="form-check-input" type="checkbox" name="skills[]" value="Project Management">
                <label class="form-check-label">Project Mgmt</label>
              </div>
              <div class="form-check form-check-inline small">
                <input class="form-check-input text-dark" type="checkbox" name="skills[]" value="Game Development">
                <label class="form-check-label">Game Dev</label>
              </div>
            </div>
          </div>

          <!-- Resume -->
          <div class="mb-2">
            <label class="form-label small mb-1">Resume</label>
            <input type="file" class="form-control form-control-sm text-dark" name="resume" accept=".pdf,.doc,.docx" required>
          </div>

          <!-- Submit -->
          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
 include "components/footer.php";
?>