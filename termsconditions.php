<?php 
$current_page = 'termsconditions';
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
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            background-color: var(--light-color);
        }
        
        /* Privacy Policy Hero Section */
        .privacy-hero {
            background: var(--gradient-primary);
            padding: 2rem 0 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .privacy-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,200 1000,1000 0,800"/></svg>');
            pointer-events: none;
        }
        
        .privacy-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }
        
        .privacy-hero h1 {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
            color:white;
        }
        
        .privacy-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }
        
</style>

<section class="privacy-hero">
            <div class="row mb-2">
            <div class="col-12 text-center privacy-hero-content">
                <h2 class="">Terms & Conditions</h2>
                <p class="">Please read these terms and conditions carefully before using our services</p>
                <div class="d-flex align-items-center justify-content-center">
                    <div class="badge bg-primary rounded-pill px-3 py-2">
                        <i class="ri-calendar-line me-2"></i>Last Updated: January 2025
                    </div>
                </div>
            </div>
        </div>
        </section>

<!-- Terms & Conditions Section -->
<section class="terms-section" style="padding: 2rem 0; background: var(--light-color);">
    <div class="container">
        <!-- Page Header -->
        

        <!-- Terms Content -->
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="terms-content bg-white rounded-4 shadow-lg p-5">
                    
                    <!-- Introduction -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-file-text-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Introduction</h2>
                        </div>
                        <p class="terms-text">
                            The Global Tech Consultancy Service website located at 
                            <strong>www.globaltechconsultancyservice.com</strong> is a copyrighted work belonging to Global Tech Consultancy Service. 
                            Certain features of the Site may be subject to additional guidelines, terms, or rules, which will be posted on the Site in connection with such features.
                        </p>
                        <p class="terms-text">
                            All such additional terms, guidelines, and rules are incorporated by reference into these Terms. 
                            These Terms of Use describe the legally binding terms and conditions that oversee your use of the site. 
                            By logging into the site, you are being compliant that these terms and you represent that you have the authority and capacity to enter into these Terms. 
                            <strong>You should be at least 18 years of age to access the site.</strong> If you disagree with the provisions of these terms, do not use this site.
                        </p>
                    </div>

                    <!-- Access to Site -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-key-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Access to the Site</h2>
                        </div>
                        <p class="terms-text">
                            <strong>Subject to these Terms:</strong> Company grants you a non-transferable, non-exclusive, revocable, 
                            limited license to access the Site solely for your own personal, noncommercial use.
                        </p>
                        
                        <h4 class="terms-subheading mt-4 mb-3">✔Certain Restrictions</h4>
                        <p class="terms-text">The rights approved to you in these Terms are subject to the following restrictions:</p>
                        <ul class="terms-list">
                            <li>You shall not sell, rent, lease, transfer, assign, distribute, host, or otherwise commercially exploit the Site</li>
                            <li>You shall not change, make derivative works of, disassemble, reverse compile or reverse engineer any part of the Site</li>
                            <li>You shall not access the Site in order to build a similar or competitive website</li>
                            <li>Except as expressly stated herein, no part of the Site may be copied, reproduced, distributed, republished, downloaded, displayed, posted or transmitted in any form or by any means</li>
                        </ul>
                        <p class="terms-text">
                            Unless otherwise indicated, any future release, update, or other addition to functionality of the Site shall be subject to these Terms. 
                            All copyright and other proprietary notices on the Site must be retained on all copies thereof.
                        </p>
                    </div>

                    <!-- Changes to Site -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-refresh-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Changes to the Site</h2>
                        </div>
                        <p class="terms-text">
                            Company reserves the right to change, suspend, or cease the Site with or without notice to you. 
                            You approved that Company will not be held liable to you or any third-party for any change, interruption, or termination of the Site or any part.
                        </p>
                        
                        <h4 class="terms-subheading mt-4 mb-3">✔No Support or Maintenance</h4>
                        <p class="terms-text">
                            You agree that Company will have no obligation to provide you with any support in connection with the Site.
                        </p>
                    </div>

                    <!-- Intellectual Property -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-copyright-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Intellectual Property</h2>
                        </div>
                        <p class="terms-text">
                            Excluding any User Content that you may provide, you are aware that all the intellectual property rights, 
                            including copyrights, patents, trademarks, and trade secrets, in the Site and its content are owned by Company or Company's suppliers. 
                            Note that these Terms and access to the Site do not give you any rights, title or interest in or to any intellectual property rights, 
                            except for the limited access rights expressed in Section 2.1. Company and its suppliers reserve all rights not granted in these Terms.
                        </p>
                    </div>

                    <!-- Third Party Links -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-external-link-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Third-Party Links & Ads; Other Users</h2>
                        </div>
                        
                        <h4 class="terms-subheading mb-3">✔Third-Party Links & Ads</h4>
                        <p class="terms-text">
                            The Site may contain links to third-party websites and services, and/or display advertisements for third-parties. 
                            Such Third-Party Links & Ads are not under the control of Company, and Company is not responsible for any Third-Party Links & Ads. 
                            Company provides access to these Third-Party Links & Ads only as a convenience to you, and does not review, approve, monitor, endorse, warrant, 
                            or make any representations with respect to Third-Party Links & Ads.
                        </p>
                        <p class="terms-text">
                            <strong>You use all Third-Party Links & Ads at your own risk,</strong> and should apply a suitable level of caution and discretion in doing so. 
                            When you click on any of the Third-Party Links & Ads, the applicable third party's terms and policies apply, 
                            including the third party's privacy and data gathering practices.
                        </p>

                        <h4 class="terms-subheading mt-4 mb-3">✔User Content and Conduct</h4>
                        <p class="terms-text">
                            Each user is solely responsible for any and all of its own User Content. Because we do not control User Content, 
                            you acknowledge and agree that we are not responsible for any User Content, whether provided by you or by others. 
                            You agree that Company will not be responsible for any loss or damage incurred as the result of any such interactions. 
                            If there is a dispute between you and any Site user, we are under no obligation to become involved.
                        </p>
                    </div>

                    <!-- Cookies -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-database-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Cookies and Web Beacons</h2>
                        </div>
                        <p class="terms-text">
                            Like any other website, <strong>www.globaltechconsultancyservice.com</strong> uses 'cookies'. 
                            These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. 
                            The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.
                        </p>
                    </div>

                    <!-- Disclaimers -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-alert-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Disclaimers</h2>
                        </div>
                        <div class="alert alert-warning" style="border-left: 4px solid #f59e0b;">
                            <p class="terms-text mb-3">
                                <strong>The site is provided on an "as-is" and "as available" basis,</strong> and company and our suppliers expressly disclaim 
                                any and all warranties and conditions of any kind, whether express, implied, or statutory, including all warranties or conditions of 
                                merchantability, fitness for a particular purpose, title, quiet enjoyment, accuracy, or non-infringement.
                            </p>
                            <p class="terms-text mb-3">
                                We and our suppliers make no guarantee that the site will meet your requirements, will be available on an uninterrupted, timely, secure, 
                                or error-free basis, or will be accurate, reliable, free of viruses or other harmful code, complete, legal, or safe.
                            </p>
                            <p class="terms-text mb-0">
                                <strong>If applicable law requires any warranties with respect to the site, all such warranties are limited in duration to ninety (90) days from the date of first use.</strong>
                            </p>
                        </div>
                        <p class="terms-text small text-muted">
                            Some jurisdictions do not allow the exclusion of implied warranties, so the above exclusion may not apply to you. 
                            Some jurisdictions do not allow limitations on how long an implied warranty lasts, so the above limitation may not apply to you.
                        </p>
                    </div>

                    <!-- Limitation of Liability -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-shield-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Limitation on Liability</h2>
                        </div>
                        <div class="alert alert-danger" style="border-left: 4px solid #ef4444;">
                            <p class="terms-text mb-3">
                                <strong>Global Tech Consultancy Service is not liable to you or any third-party for any kind of damages whatsoever</strong> 
                                including any lost profits, lost data, costs of procurement of substitute products, or any indirect, consequential, exemplary, 
                                incidental, special or punitive damages arising from or relating to these terms or your use of, or incapability to use the site 
                                even if company has been advised of the possibility of such damages.
                            </p>
                            <p class="terms-text mb-0">
                                Access to and use of the site is at your own discretion and risk, and you will be solely responsible for any damage to your device 
                                or computer system, or loss of data resulting therefrom. Some jurisdictions do not allow the limitation or exclusion of liability 
                                for incidental or consequential damages, so the above limitation or exclusion may not apply to you.
                            </p>
                        </div>
                    </div>

                    <!-- Term and Termination -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-time-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Term and Termination</h2>
                        </div>
                        <p class="terms-text">
                            Subject to this Section, these Terms will remain in full force and effect while you use the Site. 
                            We may suspend or terminate your rights to use the Site at any time for any reason at our sole discretion, 
                            including for any use of the Site in violation of these Terms.
                        </p>
                        <p class="terms-text">
                            Upon termination of your rights under these Terms, your Account and right to access and use the Site will terminate immediately. 
                            You understand that any termination of your Account may involve deletion of your User Content associated with your Account from our live databases. 
                            Company will not have any liability whatsoever to you for any termination of your rights under these Terms.
                        </p>
                    </div>

                    <!-- Copyright Policy -->
                    <div class="terms-section-block mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-copyright-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Copyright Policy</h2>
                        </div>
                        <p class="terms-text">
                            We respect intellectual property rights. If you believe content on our Site infringes your copyright, contact us with the following:
                        </p>
                        <ul class="terms-list">
                            <li>Your signature (physical or electronic)</li>
                            <li>Identification of the copyrighted work</li>
                            <li>Details of the infringing content and its location on our Site</li>
                            <li>Your contact details</li>
                        </ul>
                    </div>

                    <!-- Contact Information -->
                    <div class="terms-section-block">
                        <div class="d-flex align-items-center mb-3">
                            <div class="terms-icon me-3">
                                <i class="ri-contacts-line"></i>
                            </div>
                            <h2 class="terms-heading mb-0">Contact Information</h2>
                        </div>
                        <div class="contact-info-box bg-light rounded-3 p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mb-3"><i class="ri-map-pin-line me-2 text-primary"></i><span style="border-bottom: 3px solid var(--primary-color);">Address</span></h5>
                                    <p class="terms-text mb-0">
                                        Radhe Krishna Bhawan, 1st Floor,<br>
                                        in Front of CGR Complex, Block C2,<br>
                                        Near Arjan Garh Metro Station,<br>
                                        Delhi-110047
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 mb-md-3">
                                            <h5 class="mb-3"><i class="ri-mail-line me-2 text-primary"></i><span style="border-bottom: 3px solid var(--primary-color);">E-Mail</span></h5>
                                            <p class="terms-text mb-0">
                                            <a href="mailto:info@globaltechconsultancyservice.com" class="text-primary">
                                            info@globaltechconsultancyservice.com
                                            </a>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <h5 class="mb-3"><i class="ri-mail-line me-2 text-primary"></i><span style="border-bottom: 3px solid var(--primary-color);">Phone</span></h5>
                                            <p class="terms-text mb-0">
                                            +91 8920442794
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Copyright Notice -->
                    <div class="copyright-notice text-center mt-5 pt-4 border-top">
                        <p class="terms-text mb-0">
                            <strong>Copyright © Global Tech Consultancy Service. All rights reserved.</strong><br>
                            All trademarks, logos and service marks displayed on the Site are our property or the property of other third-parties. 
                            You are not permitted to use these Marks without our prior written consent or the consent of such third party which may own the Marks.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Styles -->
<style>
    .terms-section {
        min-height: 100vh;
    }
    
    .terms-content {
        position: relative;
    }
    
    .terms-section-block {
        border-bottom: 1px solid #e5e7eb;
        padding-bottom: 2rem;
    }
    
    .terms-section-block:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    
    .terms-icon {
        width: 40px;
        height: 40px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .terms-icon i {
        color: white;
        font-size: 1.2rem;
    }
    
    .terms-heading {
        color: var(--dark-color);
        font-size: 1.5rem;
        font-weight: 600;
        padding:4px;
        border-bottom: 3px solid var(--primary-color);
    }
    
    .terms-subheading {
        color: var(--primary-color);
        font-size: 1.2rem;
        font-weight: 600;
    }
    
    .terms-text {
        color: #6b7280;
        line-height: 1.7;
        margin-bottom: 1rem;
    }
    
    .terms-list {
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .terms-list li {
        color: #6b7280;
        margin-bottom: 0.5rem;
        line-height: 1.6;
    }
    
    .contact-info-box {
        border-left: 4px solid var(--primary-color);
    }
    
    .copyright-notice {
        background: rgba(99, 102, 241, 0.05);
        border-radius: 10px;
        padding: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .terms-content {
            padding: 2rem !important;
        }
        
        .terms-heading {
            font-size: 1.3rem;
        }
        
        .contact-info-box .col-md-6 {
            margin-bottom: 1.5rem;
        }
    }
</style>

<?php include 'components/footer.php'; ?>