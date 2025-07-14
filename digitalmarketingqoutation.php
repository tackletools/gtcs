<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit();
}

// Get form data
$client_name = $_POST['client_name'] ?? '';
$client_phone = $_POST['client_phone'] ?? '';
$client_email = $_POST['client_email'] ?? '';
$website = $_POST['website'] ?? '';
$business_type = $_POST['business_type'] ?? '';
$primary_goal = $_POST['primary_goal'] ?? '';
$target_audience = $_POST['target_audience'] ?? '';
$competitors = $_POST['competitors'] ?? '';
$services = $_POST['services'] ?? [];
$service_prices = $_POST['service_prices'] ?? [];
$duration = $_POST['duration'] ?? 6;
$budget_range = $_POST['budget_range'] ?? '';
$additional_requirements = $_POST['additional_requirements'] ?? '';

// Business type descriptions
$business_descriptions = [
    'retail' => 'Retail & E-commerce businesses thrive on customer engagement and online visibility. Our strategies focus on driving traffic, increasing conversions, and building brand loyalty through targeted digital campaigns.',
    'healthcare' => 'Healthcare services require trust-building and local visibility. We specialize in HIPAA-compliant marketing strategies that connect you with patients while maintaining professional credibility.',
    'education' => 'Educational institutions need to attract students and build reputation. Our approach combines content marketing, social engagement, and targeted advertising to showcase your programs effectively.',
    'real_estate' => 'Real estate success depends on local market dominance and lead generation. We focus on location-based marketing, virtual tours promotion, and nurturing potential buyers and sellers.',
    'restaurants' => 'Food service businesses need visual appeal and local engagement. Our strategies emphasize mouth-watering content, local SEO, and social media engagement to drive foot traffic.',
    'technology' => 'Technology companies require thought leadership and B2B lead generation. We focus on content marketing, LinkedIn strategies, and demonstrating technical expertise to attract clients.',
    'finance' => 'Financial services demand trust and compliance. Our marketing strategies emphasize credibility, educational content, and targeted campaigns while maintaining regulatory compliance.',
    'automotive' => 'Automotive businesses need local visibility and service showcase. We focus on local SEO, review management, and highlighting your expertise in automotive services.',
    'beauty' => 'Beauty and wellness brands thrive on visual content and social proof. Our strategies emphasize Instagram marketing, influencer collaborations, and showcasing transformations.',
    'fitness' => 'Fitness businesses need motivation and community building. We focus on inspiring content, local engagement, and showcasing success stories to attract new members.',
    'travel' => 'Travel and tourism require inspirational marketing and seasonal campaigns. We create compelling visual content and targeted campaigns to inspire wanderlust and drive bookings.',
    'manufacturing' => 'Manufacturing companies need B2B lead generation and industry expertise showcase. Our strategies focus on LinkedIn marketing, technical content, and building industry authority.',
    'legal' => 'Legal services require trust-building and expertise demonstration. We focus on content marketing, local SEO, and establishing thought leadership in your practice areas.',
    'nonprofit' => 'Non-profit organizations need community engagement and donor cultivation. Our strategies emphasize storytelling, social impact showcase, and building emotional connections.',
    'other' => 'Every business is unique, and we tailor our digital marketing strategies to meet your specific industry needs and target audience requirements.'
];

// Primary goal descriptions
$goal_descriptions = [
    'brand_awareness' => 'Building brand recognition through consistent messaging, visual identity, and strategic content placement across multiple digital channels to establish market presence.',
    'lead_generation' => 'Creating systematic processes to attract, capture, and nurture potential customers through targeted campaigns, landing pages, and conversion optimization.',
    'sales_conversion' => 'Optimizing the customer journey from awareness to purchase through strategic funnel development, retargeting campaigns, and conversion rate optimization.',
    'website_traffic' => 'Driving qualified visitors to your website through SEO, content marketing, paid advertising, and social media strategies that attract your ideal customers.',
    'social_engagement' => 'Building active communities around your brand through compelling content, interactive campaigns, and consistent engagement across social media platforms.',
    'online_presence' => 'Establishing a comprehensive digital footprint through website development, social media setup, local listings, and consistent brand representation online.',
    'customer_retention' => 'Developing long-term relationships with existing customers through email marketing, loyalty programs, and personalized communication strategies.',
    'local_visibility' => 'Dominating local search results and community engagement through Google My Business optimization, local SEO, and community-focused marketing campaigns.'
];

// Service descriptions
$service_descriptions = [
    'google_ads' => [
        'title' => 'Google Ads Management',
        'description' => 'Comprehensive Google Ads management designed to maximize your return on investment through strategic campaign optimization, keyword targeting, and continuous performance monitoring.',
        'benefits' => [
            'Immediate visibility in Google search results',
            'Targeted reach to customers actively searching for your services',
            'Measurable ROI with detailed conversion tracking',
            'Budget control with optimized bidding strategies',
            'Continuous optimization based on performance data'
        ]
    ],
    'meta_ads' => [
        'title' => 'Meta Ads (Facebook & Instagram)',
        'description' => 'Strategic social media advertising across Facebook and Instagram platforms to build brand awareness, engage your audience, and drive conversions through visually compelling campaigns.',
        'benefits' => [
            'Access to 3+ billion active users across platforms',
            'Advanced targeting based on demographics, interests, and behaviors',
            'Visual storytelling through images and video content',
            'Retargeting capabilities to re-engage website visitors',
            'Social proof through likes, shares, and comments'
        ]
    ],
    'seo' => [
        'title' => 'Search Engine Optimization (SEO)',
        'description' => 'Long-term organic growth strategy focused on improving your website\'s search engine rankings, driving qualified traffic, and establishing online authority in your industry.',
        'benefits' => [
            'Sustainable long-term traffic growth',
            'Higher credibility and trust with potential customers',
            'Cost-effective compared to paid advertising',
            'Local visibility for location-based businesses',
            'Improved website user experience and performance'
        ]
    ],
    'social_media' => [
        'title' => 'Social Media Management',
        'description' => 'Comprehensive social media strategy and management to build brand awareness, engage with your audience, and create a consistent online presence across all major platforms.',
        'benefits' => [
            'Consistent brand presence across multiple platforms',
            'Daily engagement with your target audience',
            'Community building and customer loyalty development',
            'Increased website traffic through social referrals',
            'Brand personality development and storytelling'
        ]
    ],
    'content_creation' => [
        'title' => 'Content Creation & Design',
        'description' => 'Professional graphic design and content creation services to ensure your brand stands out with high-quality visuals, compelling messaging, and consistent brand identity.',
        'benefits' => [
            'Professional brand image and credibility',
            'Consistent visual identity across all marketing materials',
            'Higher engagement rates with quality content',
            'Stand out from competitors with unique designs',
            'Scalable content library for ongoing marketing needs'
        ]
    ],
    'email_marketing' => [
        'title' => 'Email Marketing',
        'description' => 'Strategic email marketing campaigns designed to nurture leads, retain customers, and drive repeat business through personalized, targeted communication.',
        'benefits' => [
            'Direct communication channel with your audience',
            'High ROI with personalized messaging',
            'Automated nurturing sequences for lead conversion',
            'Customer retention and loyalty building',
            'Detailed analytics and performance tracking'
        ]
    ],
    'website_development' => [
        'title' => 'Website Development & Design',
        'description' => 'Custom website development focused on user experience, mobile responsiveness, and conversion optimization to turn visitors into customers.',
        'benefits' => [
            '24/7 online presence and credibility',
            'Mobile-responsive design for all devices',
            'Search engine optimized structure',
            'Lead generation and conversion focused',
            'Professional representation of your business'
        ]
    ],
    'analytics_reporting' => [
        'title' => 'Analytics & Reporting',
        'description' => 'Comprehensive tracking, analysis, and reporting of all marketing activities to provide actionable insights and data-driven optimization recommendations.',
        'benefits' => [
            'Data-driven decision making',
            'Clear ROI measurement and tracking',
            'Performance optimization opportunities',
            'Competitive analysis and benchmarking',
            'Transparent reporting and accountability'
        ]
    ]
];

// Calculate total
$monthly_total = 0;
$one_time_total = 0;

foreach ($services as $service) {
    if (isset($service_prices[$service])) {
        if ($service === 'website_development') {
            $one_time_total += (int)$service_prices[$service];
        } else {
            $monthly_total += (int)$service_prices[$service];
        }
    }
}

// Apply duration discount
$discount = 0;
if ($duration == 12) {
    $discount = 0.15; // 15% discount for 12 months
}

$discounted_monthly = $monthly_total * (1 - $discount);
$total_project_cost = ($discounted_monthly * $duration) + $one_time_total;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Quotation - <?php echo htmlspecialchars($client_name); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            body { 
                font-size: 10px !important; 
                line-height: 1.2 !important; 
                margin: 0 !important;
                padding: 0 !important;
            }
            
            .container, .container-fluid { 
                max-width: 100% !important; 
                margin: 0 !important; 
                padding: 5px !important; 
            }
            
            .page-break { 
                page-break-before: always; 
            }
            
            .no-print { 
                display: none !important; 
            }
            
            .print-header {
                display: block !important;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
                color: white !important;
                padding: 15px !important;
                margin: 0 0 15px 0 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .print-logo {
                width: 200px !important;
                height: auto !important;
                background-color: #fff !important;
                border-radius: 15px !important;
                padding: 8px !important;
                margin-bottom: 8px !important;
            }
            
            .card { 
                border: 1px solid #ddd !important; 
                margin-bottom: 10px !important; 
                page-break-inside: avoid !important;
            }
            
            .card-header { 
                background-color: #f8f9fa !important; 
                border-bottom: 1px solid #ddd !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            h1 { font-size: 16px !important; margin: 5px 0 !important; }
            h2 { font-size: 14px !important; margin: 5px 0 !important; }
            h3 { font-size: 12px !important; margin: 5px 0 !important; }
            h4 { font-size: 11px !important; margin: 3px 0 !important; }
            h5 { font-size: 10px !important; margin: 3px 0 !important; }
            h6 { font-size: 9px !important; margin: 3px 0 !important; }
            
            .lead { font-size: 11px !important; }
            .display-4 { font-size: 18px !important; }
            .btn { padding: 3px 6px !important; font-size: 8px !important; }
            .table { font-size: 9px !important; }
            .badge { font-size: 8px !important; }
            .text-muted { color: #666 !important; }
            .border-start { border-left: 2px solid #0d6efd !important; }
            .service-card { margin-bottom: 8px !important; page-break-inside: avoid !important; }
            .benefit-item { margin-bottom: 2px !important; }
            
            .quotation-number {
                background: rgba(255,255,255,0.2) !important;
                padding: 5px 10px !important;
                border-radius: 15px !important;
                display: inline-block !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .pricing-summary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
                color: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .total-amount {
                font-size: 18px !important;
                font-weight: bold !important;
                margin: 8px 0 !important;
            }
            
            .footer-section {
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .service-icon {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
                color: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .goal-description {
                background: #f8f9fa !important;
                border-left: 3px solid #667eea !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .payment-info {
                background: #f8f9fa !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .validity-note {
                background: #fff3cd !important;
                border: 1px solid #ffeaa7 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            /* Remove excessive gaps */
            .mb-1, .my-1 { margin-bottom: 0.15rem !important; }
            .mb-2, .my-2 { margin-bottom: 0.3rem !important; }
            .mb-3, .my-3 { margin-bottom: 0.5rem !important; }
            .mb-4, .my-4 { margin-bottom: 0.7rem !important; }
            .mb-5, .my-5 { margin-bottom: 1rem !important; }
            
            .mt-1, .my-1 { margin-top: 0.15rem !important; }
            .mt-2, .my-2 { margin-top: 0.3rem !important; }
            .mt-3, .my-3 { margin-top: 0.5rem !important; }
            .mt-4, .my-4 { margin-top: 0.7rem !important; }
            .mt-5, .my-5 { margin-top: 1rem !important; }
            
            .p-1 { padding: 0.15rem !important; }
            .p-2 { padding: 0.3rem !important; }
            .p-3 { padding: 0.5rem !important; }
            .p-4 { padding: 0.7rem !important; }
            .p-5 { padding: 1rem !important; }
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .header-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .print-header {
            display: none;
        }

        .company-logo {
            width: 250px;
            height: auto;
            margin-bottom: 1rem;
            padding: 10px;
            background-color: #fff;
            border-radius: 20px;
        }

        .quotation-number {
            background: rgba(255,255,255,0.2);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            display: inline-block;
        }

        .service-card {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            background: #fff;
        }

        .service-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .benefit-item {
            padding: 0.5rem 0;
            border-bottom: 1px solid #f8f9fa;
        }

        .benefit-item:last-child {
            border-bottom: none;
        }

        .pricing-summary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 2rem;
        }

        .total-amount {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 1rem 0;
        }

        .discount-badge {
            background: #28a745;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.875rem;
        }

        .section-divider {
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            margin: 2rem 0;
        }

        .client-info-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: none;
            border-radius: 15px;
        }

        .goal-description {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }

        @media screen {
            .container {
                max-width: 1200px;
            }
        }

        .social-links a {
            color: #6c757d;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        
        .social-links a:hover {
            color: #0d6efd;
        }
        
        .feature-list li {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }
        
        .feature-list li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #28a745;
            font-weight: bold;
        }
        
        .section-title {
            color: #0d6efd;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e9ecef;
        }
        
        .payment-info {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .upi-details p {
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        
        .validity-note {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 1rem;
            margin-top: 1rem;
        }
        
        .footer-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 2rem 0 1rem 0;
            margin-top: 3rem;
        }
        
        .footer-section h5 {
            color: #0d6efd;
            margin-bottom: 1rem;
        }
        
        .footer-section a {
            color: #0d6efd;
            text-decoration: none;
        }
        
        .footer-section a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Print Header - Only visible in print -->
    <div class="print-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <img src="https://test.globaltechconsultancyservice.com/assets/logo.png" alt="Global Tech Logo" class="print-logo">
                <h1 class="mb-1">Digital Marketing Quotation</h1>
                <p class="mb-0">Comprehensive Digital Marketing Strategy Proposal</p>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="quotation-number">
                    <strong>Quote #DM-<?php echo date('Y').'-'.str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT); ?></strong>
                </div>
                <p class="mb-0 mt-1"><?php echo date('F j, Y'); ?></p>
            </div>
        </div>
    </div>

    <!-- Screen Header - Hidden in print -->
    <div class="header-section no-print">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="company-logo">
                        <img src="https://test.globaltechconsultancyservice.com/assets/logo.png" alt="Global Tech Logo" class="company-logo">
                    </div>
                    <h1 class="display-4 mb-2">Digital Marketing Quotation</h1>
                    <p class="lead mb-0">Comprehensive Digital Marketing Strategy Proposal</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="quotation-number">
                        <strong>Quote #DM-<?php echo date('Y').'-'.str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT); ?></strong>
                    </div>
                    <p class="mb-0 mt-2"><?php echo date('F j, Y'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Client Information Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card client-info-card">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-user-tie me-2 text-primary"></i>
                            Client Information
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-primary mb-3"><?php echo htmlspecialchars($client_name); ?></h4>
                                <div class="mb-2">
                                    <i class="fas fa-phone me-2 text-muted"></i>
                                    <strong>Phone:</strong> <?php echo htmlspecialchars($client_phone); ?>
                                </div>
                                <div class="mb-2">
                                    <i class="fas fa-envelope me-2 text-muted"></i>
                                    <strong>Email:</strong> <?php echo htmlspecialchars($client_email); ?>
                                </div>
                                <?php if ($website): ?>
                                <div class="mb-2">
                                    <i class="fas fa-globe me-2 text-muted"></i>
                                    <strong>Website:</strong> 
                                    <a href="<?php echo htmlspecialchars($website); ?>" target="_blank">
                                        <?php echo htmlspecialchars($website); ?>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h5 class="text-primary">Business Industry</h5>
                                    <span class="badge bg-primary fs-6 mb-2">
                                        <?php echo ucwords(str_replace('_', ' ', $business_type)); ?>
                                    </span>
                                    <?php if (isset($business_descriptions[$business_type])): ?>
                                    <p class="text-muted small">
                                        <?php echo $business_descriptions[$business_type]; ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Marketing Goals Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-bullseye me-2 text-primary"></i>
                            Marketing Objectives & Strategy
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-primary mb-3">Primary Marketing Goal</h5>
                                <div class="goal-description">
                                    <h6 class="mb-2"><?php echo ucwords(str_replace('_', ' ', $primary_goal)); ?></h6>
                                    <?php if (isset($goal_descriptions[$primary_goal])): ?>
                                    <p class="mb-0 small">
                                        <?php echo $goal_descriptions[$primary_goal]; ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?php if ($target_audience): ?>
                                <div class="mb-3">
                                    <h6 class="text-primary">Target Audience</h6>
                                    <p class="mb-0"><?php echo htmlspecialchars($target_audience); ?></p>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($competitors): ?>
                                <div class="mb-3">
                                    <h6 class="text-primary">Identified Competitors</h6>
                                    <p class="mb-0"><?php echo htmlspecialchars($competitors); ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="section-divider">

        <!-- Selected Services Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="text-center mb-4">
                    <i class="fas fa-cogs me-2 text-primary"></i>
                    Recommended Digital Marketing Services
                </h2>
                <p class="text-center text-muted mb-5">Tailored solutions designed to achieve your marketing objectives</p>
                
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service): ?>
                        <?php if (isset($service_descriptions[$service])): ?>
                        <div class="service-card">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center">
                                    <div class="service-icon">
                                        <?php
                                        $icons = [
                                            'google_ads' => 'fab fa-google',
                                            'meta_ads' => 'fab fa-facebook',
                                            'seo' => 'fas fa-search',
                                            'social_media' => 'fas fa-hashtag',
                                            'content_creation' => 'fas fa-pen-fancy',
                                            'email_marketing' => 'fas fa-envelope',
                                            'website_development' => 'fas fa-globe',
                                            'analytics_reporting' => 'fas fa-chart-bar'
                                        ];
                                        echo '<i class="' . ($icons[$service] ?? 'fas fa-star') . '"></i>';
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h4 class="text-primary mb-2">
                                        <?php echo $service_descriptions[$service]['title']; ?>
                                    </h4>
                                    <p class="text-muted mb-3">
                                        <?php echo $service_descriptions[$service]['description']; ?>
                                    </p>
                                    <div class="benefits-section">
                                        <h6 class="text-secondary mb-2">Key Benefits:</h6>
                                        <ul class="list-unstyled">
                                            <?php foreach ($service_descriptions[$service]['benefits'] as $benefit): ?>
                                            <li class="benefit-item">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                <?php echo $benefit; ?>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="pricing-info">
                                        <?php if ($service === 'website_development'): ?>
                                            <div class="price-tag">
                                                <span class="badge bg-warning text-dark fs-6">One-time</span>
                                                <h5 class="text-primary mt-2 mb-0">
                                                    ₹<?php echo number_format($service_prices[$service]); ?>
                                                </h5>
                                            </div>
                                        <?php else: ?>
                                            <div class="price-tag">
                                                <span class="badge bg-success fs-6">Monthly</span>
                                                <h5 class="text-primary mt-2 mb-0">
                                                    ₹<?php echo number_format($service_prices[$service]); ?>/mo
                                                </h5>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!--<hr class="section-divider">-->

        <!-- Pricing Summary Section -->
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-8">
                <div class="pricing-summary text-center">
                    <h3 class="mb-2">
                        <i class="fas fa-calculator me-2"></i>
                        Investment Summary
                    </h3>
                    
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <h6 class="text-light">Monthly Services</h6>
                                <div class="fs-4 fw-bold">₹<?php echo number_format($monthly_total); ?></div>
                                <small class="text-light opacity-75">per month</small>
                            </div>
                        </div>
                        
                        <?php if ($one_time_total > 0): ?>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <h6 class="text-light">One-time Setup</h6>
                                <div class="fs-4 fw-bold">₹<?php echo number_format($one_time_total); ?></div>
                                <small class="text-light opacity-75">website development</small>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <h6 class="text-light">Project Duration</h6>
                                <div class="fs-4 fw-bold"><?php echo $duration; ?> Months</div>
                                <?php if ($discount > 0): ?>
                                <span class="discount-badge">
                                    <?php echo ($discount * 100); ?>% Discount Applied
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($discount > 0): ?>
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-8">
                            <div class="bg-light bg-opacity-25 p-3 rounded">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Monthly Total (before discount):</span>
                                    <span>₹<?php echo number_format($monthly_total); ?></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Monthly Total (after <?php echo ($discount * 100); ?>% discount):</span>
                                    <span class="fw-bold">₹<?php echo number_format($discounted_monthly); ?></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center text-success">
                                    <span>Total Savings:</span>
                                    <span class="fw-bold">₹<?php echo number_format(($monthly_total - $discounted_monthly) * $duration); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <hr class="my-4 bg-light opacity-50">
                    
                    <div class="total-amount">
                        <div class="fs-1 fw-bold mb-2">₹<?php echo number_format($total_project_cost); ?></div>
                        <div class="fs-6 text-light opacity-75">Total Project Investment</div>
                        <?php if ($budget_range): ?>
                        <div class="mt-3">
                            <small class="text-light">
                                <i class="fas fa-info-circle me-1"></i>
                                Client Budget Range: <?php echo htmlspecialchars($budget_range); ?>
                            </small>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Requirements Section -->
        <?php if ($additional_requirements): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-clipboard-list me-2 text-primary"></i>
                            Additional Requirements & Notes
                        </h4>
                    </div>
                    <div class="card-body">
                        <p class="mb-0"><?php echo nl2br(htmlspecialchars($additional_requirements)); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
<hr class="section-divider">

        <!-- Payment Information Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg-light">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-credit-card me-2 text-primary"></i>
                            Payment Information
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="payment-info">
                            <h6 class="text-primary mb-3">Payment Terms</h6>
                            <ul class="feature-list">
                                <li>50% advance payment required to start the project</li>
                                <li>Remaining 50% payable after 30 days of project initiation</li>
                                <li>Monthly services billed in advance</li>
                                <li>GST applicable as per government regulations</li>
                            </ul>
                            
                            <div class="upi-details mt-4">
                                <div class="col-md-6 upi-details">
                                      <h5 class="text-success mb-3">
                                            <i class="fas fa-mobile-alt me-2"></i>
                                            UPI Payment Details
                                        </h5>
                                    <p><strong><i class="fas fa-at me-2"></i>UPI ID:</strong> 7668176004@ybl</p>
                                    <p><strong><i class="fas fa-phone me-2"></i>UPI Number:</strong> 7668176004</p>
                                </div>
                                <div class="col-md-6 upi-details">
                                    <p class="text-success"><strong>Preferred Payment Method</strong></p>
                                    <h5><i class="fas fa-university me-2"></i>Bank Details</h5>
                                        <ul class="list-unstyled ms-4">
                                        <li><strong>Account Number:</strong> 2754000100153886</li>
                                        <li><strong>IFSC Code:</strong> PUNB0275400</li>
                                        <li><strong>Bank Name:</strong> Punjab National Bank</li>
                                        <li><strong>Account Holder:</strong> Prashant Kumar</li>
                                </div>
                                <p><strong>Reference:</strong> Quote #DM-<?php echo date('Y').'-'.str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg-light">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-handshake me-2 text-primary"></i>
                            Terms & Conditions
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list small">
                            <li>All services are subject to our standard terms and conditions</li>
                            <li>Campaign performance depends on various market factors</li>
                            <li>Client cooperation required for content and access provisions</li>
                            <li>Monthly reports will be provided for all ongoing services</li>
                            <li>Contract can be terminated with 30 days written notice</li>
                            <li>Refund policy applies as per our service agreement</li>
                        </ul>
                        
                        <div class="validity-note mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock text-warning me-2"></i>
                                <strong>Quote Validity</strong>
                            </div>
                            <p class="mb-0 small">This quotation is valid for 30 days from the date of issue. Prices may vary after this period based on market conditions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row mb-5 no-print">
            <div class="col-12 text-center">
                <button onclick="window.print()" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-print me-2"></i>
                    Print Quotation
                </button>
                <button onclick="window.history.back()" class="btn btn-outline-secondary btn-lg">
                    <i class="fas fa-arrow-left me-2"></i>
                    Back to Form
                </button>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h5>Contact Information</h5>
                    <h5><i class="fas fa-building me-2"></i>Global Tech Consultancy Service</h5>
                        <p><i class="fas fa-map-marker-alt me-2"></i>
                            Radhe Krishna Bhawan, 1st Floor, In front of CGR Complex Block C-2,<br>
                            Near Arjan Garh Metro Station, Delhi – 110047
                        </p>
                        <p><i class="fas fa-phone me-2"></i>+91 89020442794</p>
                        <p><i class="fas fa-envelope me-2"></i>
                            <a href="mailto:info@globaltechservice.in">info@globaltechconsultancyservice.com</a>
                        </p>
                        <p><i class="fas fa-globe me-2"></i>
                            <a href="https://www.globaltechconsultancyservice.com" target="_blank">www.globaltechconsultancyservice.com</a>
                        </p>
                </div>
                
                <div class="col-md-4">
                    <h5>Connect With Us</h5>
                    <div class="social-links mb-3">
                        <a href="#" class="me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                    <p class="small text-muted">
                        Follow us on social media for the latest updates on digital marketing trends and strategies.
                    </p>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0 small text-muted">
                        © <?php echo date('Y'); ?> Global Tech Consultancy Services. All rights reserved. | 
                        <a href="#" class="text-muted">Privacy Policy</a> | 
                        <a href="#" class="text-muted">Terms of Service</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Print functionality
        window.addEventListener('load', function() {
            // Auto-focus print button for better UX
            const printBtn = document.querySelector('button[onclick="window.print()"]');
            if (printBtn) {
                printBtn.focus();
            }
        });

        // Enhanced print styling
        window.addEventListener('beforeprint', function() {
            document.body.classList.add('printing');
        });

        window.addEventListener('afterprint', function() {
            document.body.classList.remove('printing');
        });
    </script>
</body>
</html>