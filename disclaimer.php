<?php
$current_page = 'disclaimer';
include 'components/header.php';
?>

<style>
    .disclaimer-container {
        max-width: 100%;
        margin: 2rem auto;
        padding: 0 1rem;
        min-height: calc(100vh - 200px);
    }
    
    .disclaimer-content {
        background: white;
        border-radius: 12px;
        padding: 2.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }
    
    .disclaimer-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 1rem;
        text-align: center;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .disclaimer-subtitle {
        text-align: center;
        color: #6b7280;
        font-size: 1rem;
        margin-bottom: 2.5rem;
    }
    
    .disclaimer-section {
        margin-bottom: 2rem;
    }
    
    .disclaimer-section h3 {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 0.5rem;
    }
    
    .disclaimer-section p {
        color: #4b5563;
        line-height: 1.7;
        margin-bottom: 1rem;
        font-size: 0.95rem;
    }
    
    .disclaimer-section ul {
        color: #4b5563;
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .disclaimer-section li {
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        line-height: 1.6;
    }
    
    .highlight-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 1.5rem;
        margin: 1.5rem 0;
        border-left: 4px solid var(--primary-color);
    }
    
    .contact-info {
        background: var(--gradient-primary);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
        margin-top: 2rem;
    }
    
    .contact-info h4 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .contact-info p {
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0.5rem;
    }
    
    .contact-info a {
        color: white;
        text-decoration: none;
        font-weight: 500;
    }
    
    .contact-info a:hover {
        text-decoration: underline;
    }
    
    @media (max-width: 768px) {
        .disclaimer-container {
            margin: 1rem auto;
            padding: 0 0.5rem;
        }
        
        .disclaimer-content {
            padding: 1.5rem;
        }
        
        .disclaimer-title {
            font-size: 1.8rem;
        }
        
        .disclaimer-section h3 {
            font-size: 1.1rem;
        }
        
        .contact-info {
            padding: 1.5rem;
        }
    }
</style>

<div class="disclaimer-container">
    <div class="disclaimer-content">
        <h1 class="disclaimer-title">Disclaimer</h1>
        <p class="disclaimer-subtitle">Important Information About Our Services and Website</p>
        
        <div class="disclaimer-section">
            <h3>1. General Information</h3>
            <p>The information contained in this website is for general information purposes only. While we endeavor to keep the information up to date and correct, Global Tech Consultancy Service makes no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose.</p>
        </div>
        
        <div class="disclaimer-section">
            <h3>2. Professional Services</h3>
            <p>The content on this website does not constitute professional advice. Our technology consulting, software development, and IT services are provided based on specific client requirements and project scope. Results may vary depending on various factors including but not limited to:</p>
            <ul>
                <li>Client's existing technology infrastructure</li>
                <li>Project complexity and requirements</li>
                <li>Timeline and budget constraints</li>
                <li>Market conditions and technological changes</li>
                <li>Third-party integrations and dependencies</li>
            </ul>
        </div>
        
        <div class="disclaimer-section">
            <h3>3. Website Content</h3>
            <p>Any reliance you place on such information is therefore strictly at your own risk. In no event will Global Tech Consultancy Service be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</p>
        </div>
        
        <div class="highlight-box">
            <strong>Important Note:</strong> Through this website, you are able to link to other websites which are not under the control of Global Tech Consultancy Service. We have no control over the nature, content, and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.
        </div>
        
        <div class="disclaimer-section">
            <h3>4. Service Limitations</h3>
            <p>While we strive to provide the highest quality technology solutions, we cannot guarantee:</p>
            <ul>
                <li>100% uptime for all digital services and applications</li>
                <li>Compatibility with all third-party systems and platforms</li>
                <li>Specific business outcomes or return on investment</li>
                <li>Complete security against all potential cyber threats</li>
                <li>Permanent solutions without need for updates or maintenance</li>
            </ul>
        </div>
        
        <div class="disclaimer-section">
            <h3>5. Third-Party Services</h3>
            <p>Our services may integrate with or rely on third-party platforms, APIs, and services. We are not responsible for the performance, availability, or policies of these third-party services. Changes to third-party services may affect the functionality of our solutions.</p>
        </div>
        
        <div class="disclaimer-section">
            <h3>6. Technology Changes</h3>
            <p>The technology industry is rapidly evolving. Information, recommendations, and solutions provided may become outdated due to technological advancements, platform updates, or changes in industry standards. We recommend regular consultations to ensure your technology solutions remain current and effective.</p>
        </div>
        
        <div class="disclaimer-section">
            <h3>7. Client Responsibilities</h3>
            <p>Clients are responsible for:</p>
            <ul>
                <li>Providing accurate and complete project requirements</li>
                <li>Timely feedback and approvals during project development</li>
                <li>Regular backups of their data and systems</li>
                <li>Compliance with applicable laws and regulations</li>
                <li>Maintaining appropriate security measures</li>
            </ul>
        </div>
        
        <div class="disclaimer-section">
            <h3>8. Intellectual Property</h3>
            <p>All content on this website, including text, graphics, logos, images, and software, is the property of Global Tech Consultancy Service or its licensors and is protected by copyright and other intellectual property laws. Custom solutions developed for clients will be subject to specific intellectual property agreements outlined in individual contracts.</p>
        </div>
        
        <div class="disclaimer-section">
            <h3>9. Limitation of Liability</h3>
            <p>To the fullest extent permitted by law, Global Tech Consultancy Service shall not be liable for any direct, indirect, incidental, special, consequential, or punitive damages arising out of or relating to your use of our services or website, even if we have been advised of the possibility of such damages.</p>
        </div>
        
        <div class="disclaimer-section">
            <h3>10. Updates and Modifications</h3>
            <p>We reserve the right to modify this disclaimer at any time. Any changes will be effective immediately upon posting on this website. Your continued use of our services after any such changes constitutes your acceptance of the new disclaimer.</p>
        </div>
        
        <div class="contact-info">
            <h4>Questions About This Disclaimer?</h4>
            <p>If you have any questions about this disclaimer or our services, please contact us:</p>
            <p><strong>Email:</strong> <a href="mailto:info@globaltechconsultancyservice.com">info@globaltechconsultancyservice.com</a></p>
            <p><strong>Phone:</strong> <a href="tel:+918187948451">+91-81879 48451</a></p>
            <p><strong>Address:</strong> Radhe Krishna Bhawan, 1st Floor, Delhi, India</p>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>