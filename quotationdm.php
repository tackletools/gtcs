<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Tech Consultancy - Digital Marketing Quotation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #e91e63;
            --secondary-color: #ad1457;
            --accent-color: #f06292;
            --success-color: #4caf50;
            --warning-color: #ff9800;
            --info-color: #2196f3;
            --light-bg: #fdf2f8;
            --card-shadow: 0 15px 35px rgba(233, 30, 99, 0.1);
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-marketing: linear-gradient(135deg, #e91e63, #ad1457);
            --gradient-card: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--gradient-primary);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 10px 0;
        }

        .form-container {
            background: white;
            border-radius: 25px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .form-header {
            background: var(--gradient-marketing);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="marketing-pattern" width="50" height="50" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="40" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="40" cy="10" r="1.5" fill="rgba(255,255,255,0.08)"/></pattern></defs><rect width="100" height="100" fill="url(%23marketing-pattern)"/></svg>');
            opacity: 0.4;
        }

        .form-header h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .form-header p {
            font-size: 1.3rem;
            opacity: 0.95;
            position: relative;
            z-index: 2;
            font-weight: 300;
        }

        .marketing-icons {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 8rem;
            opacity: 0.1;
            z-index: 1;
        }

        .form-body {
            padding: 3.5rem;
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 2rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid var(--light-bg);
            position: relative;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--gradient-marketing);
            border-radius: 2px;
        }

        .form-control, .form-select {
            border-radius: 15px;
            border: 2px solid #e8e8e8;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: #fafafa;
            font-weight: 500;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.3rem rgba(233, 30, 99, 0.15);
            background: white;
            transform: translateY(-2px);
        }

        .form-label {
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .service-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            border: 3px solid transparent;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gradient-marketing);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .service-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(233, 30, 99, 0.2);
        }

        .service-card:hover::before {
            opacity: 0.03;
        }

        .service-card.selected {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 100%);
            box-shadow: 0 15px 30px rgba(233, 30, 99, 0.25);
        }

        .service-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .service-icon {
            background: var(--gradient-marketing);
            color: white;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            font-size: 1.5rem;
            margin-right: 1rem;
            box-shadow: 0 8px 20px rgba(233, 30, 99, 0.3);
        }

        .service-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
        }

        .service-description {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .service-features {
            list-style: none;
            padding: 0;
            position: relative;
            z-index: 2;
        }

        .service-features li {
            padding: 0.5rem 0;
            color: #2d3748;
            font-weight: 500;
        }

        .service-features li::before {
            content: '✓';
            color: var(--success-color);
            font-weight: bold;
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        .price-section {
            background: var(--light-bg);
            border-radius: 15px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            border-left: 5px solid var(--primary-color);
            position: relative;
            z-index: 2;
        }

        .price-input-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .price-label {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.1rem;
            min-width: 80px;
        }

        .duration-section {
            background: #e3f2fd;
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            border: 2px solid var(--info-color);
        }

        .duration-option {
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .duration-option:hover {
            border-color: var(--info-color);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(33, 150, 243, 0.15);
        }

        .duration-option.selected {
            border-color: var(--info-color);
            background: #e3f2fd;
            box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
        }

        .btn-primary {
            background: var(--gradient-marketing);
            border: none;
            border-radius: 15px;
            padding: 1.25rem 4rem;
            font-weight: 700;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 25px rgba(233, 30, 99, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(233, 30, 99, 0.4);
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
        }

        .floating-label {
            position: relative;
        }

        .floating-label .form-control {
            padding-top: 1.75rem;
        }

        .floating-label .form-label {
            position: absolute;
            top: 1.25rem;
            left: 1.5rem;
            transition: all 0.3s ease;
            pointer-events: none;
            background: transparent;
            z-index: 5;
            text-transform: none;
            letter-spacing: normal;
        }

        .floating-label .form-control:focus + .form-label,
        .floating-label .form-control:not(:placeholder-shown) + .form-label {
            top: 0.4rem;
            font-size: 0.8rem;
            color: var(--primary-color);
            background: white;
            padding: 0 0.5rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .budget-range {
            background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
            border-radius: 20px;
            padding: 2rem;
            margin: 2rem 0;
            border: 2px solid var(--warning-color);
        }

        .budget-option {
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 1.25rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .budget-option:hover {
            border-color: var(--warning-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 152, 0, 0.2);
        }

        .budget-option.selected {
            border-color: var(--warning-color);
            background: #fff3e0;
        }

        @media (max-width: 768px) {
            .form-body {
                padding: 2.5rem 1.5rem;
            }
            
            .form-header h1 {
                font-size: 2.2rem;
            }
            
            .form-header p {
                font-size: 1.1rem;
            }
            
            .service-card {
                padding: 2rem;
            }
        }

        .total-preview {
            background: var(--gradient-marketing);
            color: white;
            border-radius: 20px;
            padding: 2rem;
            margin: 2rem 0;
            text-align: center;
            position: sticky;
            top: 20px;
            z-index: 100;
        }

        .total-amount {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 1rem 0;
        }

        .service-checkbox {
            transform: scale(1.3);
            margin-right: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="form-container">
                    <div class="form-header">
                        <div class="marketing-icons">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h1><i class="fas fa-rocket me-3"></i>Digital Marketing</h1>
                        <p>Boost Your Online Presence with Global Tech Consultancy</p>
                    </div>
                    
                    <div class="form-body">
                        <form action="digitalmarketingqoutation.php" method="POST" id="marketingForm">
                            
                            <!-- Client Information Section -->
                            <div class="mb-5">
                                <h4 class="section-title"><i class="fas fa-user-tie me-2"></i>Client Information</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="text" class="form-control" id="clientName" name="client_name" placeholder=" " required>
                                            <label class="form-label" for="clientName">Business/Client Name *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="tel" class="form-control" id="clientPhone" name="client_phone" placeholder=" " required>
                                            <label class="form-label" for="clientPhone">Contact Number *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="email" class="form-control" id="clientEmail" name="client_email" placeholder=" " required>
                                            <label class="form-label" for="clientEmail">Email Address *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="url" class="form-control" id="website" name="website" placeholder=" ">
                                            <label class="form-label" for="website">Current Website (Optional)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="businessType">Business Type/Industry *</label>
                                        <select class="form-select" id="businessType" name="business_type" required>
                                            <option value="">Select Your Industry</option>
                                            <option value="retail">Retail & E-commerce</option>
                                            <option value="healthcare">Healthcare & Medical</option>
                                            <option value="education">Education & Training</option>
                                            <option value="real_estate">Real Estate</option>
                                            <option value="restaurants">Restaurants & Food Service</option>
                                            <option value="technology">Technology & Software</option>
                                            <option value="finance">Finance & Insurance</option>
                                            <option value="automotive">Automotive</option>
                                            <option value="beauty">Beauty & Wellness</option>
                                            <option value="fitness">Fitness & Sports</option>
                                            <option value="travel">Travel & Tourism</option>
                                            <option value="manufacturing">Manufacturing</option>
                                            <option value="legal">Legal Services</option>
                                            <option value="nonprofit">Non-Profit Organization</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Marketing Goals Section -->
                            <div class="mb-5">
                                <h4 class="section-title"><i class="fas fa-target me-2"></i>Marketing Goals</h4>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="primaryGoal">Primary Marketing Goal *</label>
                                        <select class="form-select" id="primaryGoal" name="primary_goal" required>
                                            <option value="">Select Primary Goal</option>
                                            <option value="brand_awareness">Increase Brand Awareness</option>
                                            <option value="lead_generation">Generate More Leads</option>
                                            <option value="sales_conversion">Boost Sales & Conversions</option>
                                            <option value="website_traffic">Drive Website Traffic</option>
                                            <option value="social_engagement">Improve Social Media Engagement</option>
                                            <option value="online_presence">Establish Online Presence</option>
                                            <option value="customer_retention">Improve Customer Retention</option>
                                            <option value="local_visibility">Increase Local Visibility</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="text" class="form-control" id="targetAudience" name="target_audience" placeholder=" ">
                                            <label class="form-label" for="targetAudience">Target Audience (Age, Location, etc.)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="floating-label">
                                            <input type="text" class="form-control" id="competitors" name="competitors" placeholder=" ">
                                            <label class="form-label" for="competitors">Main Competitors (Optional)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Digital Marketing Services Section -->
                            <div class="mb-5">
                                <h4 class="section-title"><i class="fas fa-chart-line me-2"></i>Digital Marketing Services</h4>
                                <p class="text-muted mb-4">Select the services you need to achieve your marketing goals:</p>
                                
                                <!-- Google Ads Service -->
                                <div class="service-card" data-service="google_ads">
                                    <div class="service-header">
                                        <div class="service-icon">
                                            <i class="fab fa-google"></i>
                                        </div>
                                        <div>
                                            <h5 class="service-title">Google Ads Management</h5>
                                            <input type="checkbox" class="service-checkbox" name="services[]" value="google_ads" id="googleAds">
                                        </div>
                                    </div>
                                    <p class="service-description">
                                        Drive targeted traffic with strategic Google Ads campaigns designed to maximize your ROI and reach customers actively searching for your products or services.
                                    </p>
                                    <ul class="service-features">
                                        <li>Complete Google Ads account setup and optimization</li>
                                        <li>Keyword research and competitive analysis</li>
                                        <li>Ad copywriting and A/B testing</li>
                                        <li>Landing page optimization recommendations</li>
                                        <li>Conversion tracking and analytics setup</li>
                                        <li>Monthly performance reports and optimization</li>
                                        <li>Budget management and bid strategy</li>
                                    </ul>
                                    <div class="price-section">
                                        <div class="price-input-group">
                                            <span class="price-label">Price:</span>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="service_prices[google_ads]" value="15000" min="1000" step="1000">
                                                <span class="input-group-text">/month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Meta Ads Service -->
                                <div class="service-card" data-service="meta_ads">
                                    <div class="service-header">
                                        <div class="service-icon">
                                            <i class="fab fa-facebook"></i>
                                        </div>
                                        <div>
                                            <h5 class="service-title">Meta Ads (Facebook & Instagram)</h5>
                                            <input type="checkbox" class="service-checkbox" name="services[]" value="meta_ads" id="metaAds">
                                        </div>
                                    </div>
                                    <p class="service-description">
                                        Engage your audience on the world's largest social platforms with visually compelling ads and precise targeting to build brand awareness and drive conversions.
                                    </p>
                                    <ul class="service-features">
                                        <li>Facebook and Instagram Business account setup</li>
                                        <li>Custom audience creation and lookalike audiences</li>
                                        <li>Creative ad design and copywriting</li>
                                        <li>Video and carousel ad campaigns</li>
                                        <li>Retargeting campaigns for website visitors</li>
                                        <li>Meta Pixel installation and tracking</li>
                                        <li>Detailed audience insights and reporting</li>
                                    </ul>
                                    <div class="price-section">
                                        <div class="price-input-group">
                                            <span class="price-label">Price:</span>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="service_prices[meta_ads]" value="12000" min="1000" step="1000">
                                                <span class="input-group-text">/month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SEO Service -->
                                <div class="service-card" data-service="seo">
                                    <div class="service-header">
                                        <div class="service-icon">
                                            <i class="fas fa-search"></i>
                                        </div>
                                        <div>
                                            <h5 class="service-title">Search Engine Optimization (SEO)</h5>
                                            <input type="checkbox" class="service-checkbox" name="services[]" value="seo" id="seoService">
                                        </div>
                                    </div>
                                    <p class="service-description">
                                        Improve your organic search rankings and drive long-term traffic with comprehensive SEO strategies that help your business get found by potential customers.
                                    </p>
                                    <ul class="service-features">
                                        <li>Complete website SEO audit and analysis</li>
                                        <li>Keyword research and strategy development</li>
                                        <li>On-page optimization (title tags, meta descriptions, content)</li>
                                        <li>Technical SEO improvements</li>
                                        <li>Local SEO optimization (Google My Business)</li>
                                        <li>Content optimization and creation guidance</li>
                                        <li>Monthly ranking reports and recommendations</li>
                                    </ul>
                                    <div class="price-section">
                                        <div class="price-input-group">
                                            <span class="price-label">Price:</span>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="service_prices[seo]" value="10000" min="1000" step="1000">
                                                <span class="input-group-text">/month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Media Management -->
                                <div class="service-card" data-service="social_media">
                                    <div class="service-header">
                                        <div class="service-icon">
                                            <i class="fas fa-hashtag"></i>
                                        </div>
                                        <div>
                                            <h5 class="service-title">Social Media Management</h5>
                                            <input type="checkbox" class="service-checkbox" name="services[]" value="social_media" id="socialMedia">
                                        </div>
                                    </div>
                                    <p class="service-description">
                                        Build a strong social media presence with consistent, engaging content that connects with your audience and builds brand loyalty across all major platforms.
                                    </p>
                                    <ul class="service-features">
                                        <li>Social media strategy development</li>
                                        <li>Content calendar creation and management</li>
                                        <li>Daily posting across Instagram, Facebook, LinkedIn</li>
                                        <li>Community management and engagement</li>
                                        <li>Hashtag research and optimization</li>
                                        <li>Social media analytics and reporting</li>
                                        <li>Brand consistency across all platforms</li>
                                    </ul>
                                    <div class="price-section">
                                        <div class="price-input-group">
                                            <span class="price-label">Price:</span>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="service_prices[social_media]" value="8000" min="1000" step="1000">
                                                <span class="input-group-text">/month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Content Creation -->
                                <div class="service-card" data-service="content_creation">
                                    <div class="service-header">
                                        <div class="service-icon">
                                            <i class="fas fa-pen-fancy"></i>
                                        </div>
                                        <div>
                                            <h5 class="service-title">Content Creation & Design</h5>
                                            <input type="checkbox" class="service-checkbox" name="services[]" value="content_creation" id="contentCreation">
                                        </div>
                                    </div>
                                    <p class="service-description">
                                        Professional graphic design and content creation to make your brand stand out with high-quality visuals and compelling messaging.
                                    </p>
                                    <ul class="service-features">
                                        <li>Custom graphic design for social media posts</li>
                                        <li>Logo design and brand identity creation</li>
                                        <li>Marketing materials (brochures, flyers, banners)</li>
                                        <li>Website graphics and web design elements</li>
                                        <li>Video editing and motion graphics</li>
                                        <li>Photography editing and enhancement</li>
                                        <li>Brand guideline development</li>
                                    </ul>
                                    <div class="price-section">
                                        <div class="price-input-group">
                                            <span class="price-label">Price:</span>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="service_prices[content_creation]" value="12000" min="1000" step="1000">
                                                <span class="input-group-text">/month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Marketing -->
                                <div class="service-card" data-service="email_marketing">
                                    <div class="service-header">
                                        <div class="service-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div>
                                            <h5 class="service-title">Email Marketing</h5>
                                            <input type="checkbox" class="service-checkbox" name="services[]" value="email_marketing" id="emailMarketing">
                                        </div>
                                    </div>
                                    <p class="service-description">
                                        Stay connected with your customers through strategic email campaigns that nurture leads, increase sales, and build lasting relationships.
                                    </p>
                                    <ul class="service-features">
                                        <li>Email marketing platform setup and integration</li>
                                        <li>Email list building and segmentation</li>
                                        <li>Automated email sequences and drip campaigns</li>
                                        <li>Newsletter design and template creation</li>
                                        <li>A/B testing for subject lines and content</li>
                                        <li>Email performance analytics and optimization</li>
                                        <li>Compliance with email marketing regulations</li>
                                    </ul>
                                    <div class="price-section">
                                        <div class="price-input-group">
                                            <span class="price-label">Price:</span>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="service_prices[email_marketing]" value="6000" min="3000" step="1000">
                                                <span class="input-group-text">/month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Website Development -->
                                <div class="service-card" data-service="website_development">
                                    <div class="service-header">
                                        <div class="service-icon">
                                            <i class="fas fa-globe"></i>
                                        </div>
                                        <div>
                                            <h5 class="service-title">Website Development & Design</h5>
                                            <input type="checkbox" class="service-checkbox" name="services[]" value="website_development" id="websiteDevelopment">
                                        </div>
                                    </div>
                                    <p class="service-description">
                                        Create a professional, mobile-responsive website that converts visitors into customers with modern design and seamless user experience.
                                    </p>
                                    <ul class="service-features">
                                        <li>Custom website design and development</li>
                                        <li>Mobile-responsive and cross-browser compatible</li>
                                        <li>Content Management System (CMS) integration</li>
                                        <li>E-commerce functionality (if needed)</li>
                                        <li>SEO-optimized structure and coding</li>
                                        <li>SSL certificate and security implementation</li>
                                        <li>Website hosting and maintenance support</li>
                                    </ul>
                                    <div class="price-section">
                                        <div class="price-input-group">
                                            <span class="price-label">Price:</span>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="service_prices[website_development]" value="25000" min="15000" step="5000">
                                                <span class="input-group-text">/one-time</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Analytics & Reporting -->
                                <div class="service-card" data-service="analytics_reporting">
                                    <div class="service-header">
                                        <div class="service-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                        <div>
                                            <h5 class="service-title">Analytics & Reporting</h5>
                                            <input type="checkbox" class="service-checkbox" name="services[]" value="analytics_reporting" id="analyticsReporting">
                                        </div>
                                    </div>
                                    <p class="service-description">
                                        Track, measure, and optimize your marketing performance with comprehensive analytics and detailed reporting to make data-driven decisions.
                                    </p>
                                    <ul class="service-features">
                                        <li>Google Analytics setup and configuration</li>
                                        <li>Goal tracking and conversion measurement</li>
                                        <li>Custom dashboard creation</li>
                                        <li>Monthly performance reports</li>
                                        <li>ROI analysis and recommendations</li>
                                        <li>Competitor analysis and benchmarking</li>
                                        <li>Marketing attribution modeling</li>
                                    </ul>
                                    <div class="price-section">
                                        <div class="price-input-group">
                                            <span class="price-label">Price:</span>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="service_prices[analytics_reporting]" value="5000" min="2000" step="1000">
                                                <span class="input-group-text">/month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         <!-- Project Duration Section -->
                        <div class="mb-5">
                            <h4 class="section-title"><i class="fas fa-clock me-2"></i>Project Duration</h4>
                            <div class="duration-section">
                                <div class="duration-option" data-duration="1">
                                    <input type="radio" name="duration" value="1" id="duration1" class="form-check-input me-2">
                                    <label for="duration1">
                                        <strong>1 Month</strong> - Trial Package
                                        <br><small class="text-muted">Best for short-term experiments or evaluation</small>
                                    </label>
                                </div>
                                <div class="duration-option" data-duration="2">
                                    <input type="radio" name="duration" value="2" id="duration2" class="form-check-input me-2">
                                    <label for="duration2">
                                        <strong>2 Months</strong> - Starter Package
                                        <br><small class="text-muted">Good for short campaigns or temporary boosts</small>
                                    </label>
                                </div>
                                <div class="duration-option" data-duration="3">
                                    <input type="radio" name="duration" value="3" id="duration3" class="form-check-input me-2">
                                    <label for="duration3">
                                        <strong>3 Months</strong> - Quick Start Package
                                        <br><small class="text-muted">Perfect for testing and initial results</small>
                                    </label>
                                </div>
                                <div class="duration-option" data-duration="6">
                                    <input type="radio" name="duration" value="6" id="duration6" class="form-check-input me-2" checked>
                                    <label for="duration6">
                                        <strong>6 Months</strong> - Growth Package (Recommended)
                                        <br><small class="text-muted">Ideal for sustainable growth and optimization</small>
                                    </label>
                                </div>
                                <div class="duration-option" data-duration="12">
                                    <input type="radio" name="duration" value="12" id="duration12" class="form-check-input me-2">
                                    <label for="duration12">
                                        <strong>12 Months</strong> - Premium Package (15% Discount)
                                        <br><small class="text-muted">Maximum results with long-term commitment savings</small>
                                    </label>
                                </div>
                            </div>
                        </div>


                            <!-- Budget Range Section -->
                            <div class="mb-5">
                                <h4 class="section-title"><i class="fas fa-rupee-sign me-2"></i>Monthly Marketing Budget</h4>
                                <div class="budget-range">
                                    <div class="budget-option" data-budget="10000-25000">
                                        <input type="radio" name="budget_range" value="10000-25000" id="budget1" class="form-check-input me-2">
                                        <label for="budget1">
                                            <strong>₹10,000 - ₹25,000</strong> - Starter Package
                                            <br><small class="text-muted">Basic digital marketing essentials</small>
                                        </label>
                                    </div>
                                    <div class="budget-option" data-budget="25000-50000">
                                        <input type="radio" name="budget_range" value="25000-50000" id="budget2" class="form-check-input me-2">
                                        <label for="budget2">
                                            <strong>₹25,000 - ₹50,000</strong> - Professional Package
                                            <br><small class="text-muted">Comprehensive marketing with multiple channels</small>
                                        </label>
                                    </div>
                                    <div class="budget-option" data-budget="50000-100000">
                                        <input type="radio" name="budget_range" value="50000-100000" id="budget3" class="form-check-input me-2">
                                        <label for="budget3">
                                            <strong>₹50,000 - ₹1,00,000</strong> - Premium Package
                                            <br><small class="text-muted">Advanced marketing strategies and premium support</small>
                                        </label>
                                    </div>
                                    <div class="budget-option" data-budget="100000+">
                                        <input type="radio" name="budget_range" value="100000+" id="budget4" class="form-check-input me-2">
                                        <label for="budget4">
                                            <strong>₹1,00,000+</strong> - Enterprise Package
                                            <br><small class="text-muted">Custom solutions with dedicated account management</small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Requirements -->
                            <div class="mb-5">
                                <h4 class="section-title"><i class="fas fa-comment-dots me-2"></i>Additional Requirements</h4>
                                <div class="floating-label">
                                    <textarea class="form-control" id="additionalRequirements" name="additional_requirements" rows="4" placeholder=" "></textarea>
                                    <label class="form-label" for="additionalRequirements">Special Requirements or Questions</label>
                                </div>
                            </div>

                            <!-- Total Preview -->
                            <div class="total-preview">
                                <h4><i class="fas fa-calculator me-2"></i>Quote Preview</h4>
                                <div class="total-amount" id="totalAmount">₹0</div>
                                <div id="selectedServices"></div>
                                <p class="mb-0">*Final quote will be provided after consultation</p>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Get My Custom Quote
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thank You Modal -->
    <div class="modal fade" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: var(--gradient-marketing); color: white;">
                    <h5 class="modal-title" id="thankYouModalLabel">
                        <i class="fas fa-check-circle me-2"></i>Quote Request Submitted Successfully!
                    </h5>
                </div>
                <div class="modal-body text-center p-5">
                    <div class="mb-4">
                        <i class="fas fa-rocket" style="font-size: 4rem; color: var(--primary-color);"></i>
                    </div>
                    <h3 class="mb-4">Thank You for Your Interest!</h3>
                    <p class="lead mb-4">
                        Your digital marketing quotation request has been received. Our team will review your requirements and get back to you within 24 hours with a detailed proposal.
                    </p>
                    <div class="row text-start">
                        <div class="col-md-6">
                            <h5><i class="fas fa-clock me-2 text-primary"></i>What's Next?</h5>
                            <ul class="list-unstyled">
                                <li>✓ Review your requirements</li>
                                <li>✓ Prepare customized strategy</li>
                                <li>✓ Schedule consultation call</li>
                                <li>✓ Provide detailed quotation</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-phone me-2 text-primary"></i>Contact Info</h5>
                            <p class="mb-2"><strong>Phone:</strong> +91 9876543210</p>
                            <p class="mb-2"><strong>Email:</strong> info@globaltechconsultancy.com</p>
                            <p class="mb-2"><strong>Website:</strong> www.globaltechconsultancy.com</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.reload()">
                        <i class="fas fa-plus me-2"></i>Submit Another Quote
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Service selection functionality
        document.addEventListener('DOMContentLoaded', function() {
            const serviceCards = document.querySelectorAll('.service-card');
            const serviceCheckboxes = document.querySelectorAll('.service-checkbox');
            const durationOptions = document.querySelectorAll('.duration-option');
            const budgetOptions = document.querySelectorAll('.budget-option');
            const form = document.getElementById('marketingForm');

            // Service card selection
            serviceCards.forEach(card => {
                const checkbox = card.querySelector('.service-checkbox');
                
                card.addEventListener('click', function(e) {
                    if (e.target.type !== 'checkbox' && e.target.type !== 'number') {
                        checkbox.checked = !checkbox.checked;
                        updateServiceCard(card, checkbox.checked);
                        updateTotal();
                    }
                });

                checkbox.addEventListener('change', function() {
                    updateServiceCard(card, this.checked);
                    updateTotal();
                });
            });

            // Duration selection
            durationOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const radio = this.querySelector('input[type="radio"]');
                    radio.checked = true;
                    updateDurationSelection();
                    updateTotal();
                });
            });

            // Budget selection
            budgetOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const radio = this.querySelector('input[type="radio"]');
                    radio.checked = true;
                    updateBudgetSelection();
                });
            });

            // Price input changes
            document.querySelectorAll('input[name^="service_prices"]').forEach(input => {
                input.addEventListener('input', updateTotal);
            });

            function updateServiceCard(card, selected) {
                if (selected) {
                    card.classList.add('selected');
                } else {
                    card.classList.remove('selected');
                }
            }

            function updateDurationSelection() {
                durationOptions.forEach(option => {
                    option.classList.remove('selected');
                });
                const selectedDuration = document.querySelector('input[name="duration"]:checked');
                if (selectedDuration) {
                    selectedDuration.closest('.duration-option').classList.add('selected');
                }
            }

            function updateBudgetSelection() {
                budgetOptions.forEach(option => {
                    option.classList.remove('selected');
                });
                const selectedBudget = document.querySelector('input[name="budget_range"]:checked');
                if (selectedBudget) {
                    selectedBudget.closest('.budget-option').classList.add('selected');
                }
            }

            function updateTotal() {
                let total = 0;
                let selectedServices = [];
                
                serviceCheckboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const serviceCard = checkbox.closest('.service-card');
                        const priceInput = serviceCard.querySelector('input[name^="service_prices"]');
                        const price = parseInt(priceInput.value) || 0;
                        total += price;
                        
                        const serviceName = serviceCard.querySelector('.service-title').textContent;
                        selectedServices.push(`${serviceName}: ₹${price.toLocaleString()}`);
                    }
                });

                // Apply duration discount
                const selectedDuration = document.querySelector('input[name="duration"]:checked');
                if (selectedDuration && selectedDuration.value === '12') {
                    total = total * 0.85; // 15% discount for 12 months
                }

                document.getElementById('totalAmount').textContent = `₹${total.toLocaleString()}`;
                
                const servicesDiv = document.getElementById('selectedServices');
                if (selectedServices.length > 0) {
                    servicesDiv.innerHTML = '<div class="mt-3"><strong>Selected Services:</strong><br>' + selectedServices.join('<br>') + '</div>';
                } else {
                    servicesDiv.innerHTML = '<div class="mt-3"><em>No services selected</em></div>';
                }
            }

            

            // Initialize
            updateDurationSelection();
            updateTotal();
        });

        // Floating label functionality
        document.querySelectorAll('.floating-label .form-control, .floating-label .form-select').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
            
            // Check if field has value on load
            if (input.value) {
                input.parentElement.classList.add('focused');
            }
        });
    </script>
</body>
</html>