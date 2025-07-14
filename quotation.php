<?php
session_start();

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.php');
    exit();
}

// Get form data
$client_name = $_POST['client_name'] ?? '';
$client_phone = $_POST['client_phone'] ?? '';
$client_email = $_POST['client_email'] ?? '';
$project_code = $_POST['project_code'] ?? '';
$project_name = $_POST['project_name'] ?? '';
$timeline = $_POST['timeline'] ?? '';
$project_type = $_POST['project_type'] ?? '';
$project_cost = $_POST['project_cost'] ?? 0;
$technologies = $_POST['technologies'] ?? [];
$custom_technologies = $_POST['custom_technologies'] ?? '';
$marketing_services = $_POST['marketing_services'] ?? [];
$payment_method = $_POST['payment_method'] ?? '';

// Payment method details
$milestone_1_percent = $_POST['milestone_1_percent'] ?? 30;
$milestone_2_percent = $_POST['milestone_2_percent'] ?? 40;
$milestone_3_percent = $_POST['milestone_3_percent'] ?? 30;
$advance_percent = $_POST['advance_percent'] ?? 30;
$installment_duration = $_POST['installment_duration'] ?? 3;

// Auto-generate project code if empty
if (empty($project_code)) {
    $initials = '';
    $name_parts = explode(' ', $client_name);
    foreach ($name_parts as $part) {
        $initials .= strtoupper(substr($part, 0, 1));
    }
    $project_code = $initials . '-' . date('dm');
}

// Project content definitions
$project_content = [
    'ngo_website' => [
        'title' => 'NGO Website',
        'description' => 'The' .$project_name.' is a purpose-driven web solution designed specifically for non-governmental and charitable organizations. It facilitates transparent and efficient communication with stakeholders through a rich suite of features including a dynamic homepage for mission highlights, dedicated pages for organizational background and team introductions, and an intuitive donation system integrated with multiple payment gateways. The platform empowers NGOs to mobilize support with volunteer registration modules, event scheduling tools, and real-time updates via blogs and news sections. Enhanced with multimedia galleries and social media integration, the '.$project_name.' helps NGOs build trust, engage communities, and drive positive change. A comprehensive website solution for non-profit organizations with donation management, volunteer registration, and event coordination features.',
        'features' => [
            'Responsive homepage with mission statement',
            'About us and team member profiles',
            'Donation system with payment gateway',
            'Volunteer registration and management',
            'Event calendar and registration',
            'News and blog section',
            'Contact forms and location maps',
            'Gallery for photos and videos',
            'Newsletter subscription system',
            'Social media integration'
        ],
        'screens' => ['Homepage', 'About Us', 'Donation Page', 'Volunteer Registration', 'Events Calendar', 'News/Blog', 'Contact Page', 'Gallery', 'Admin Dashboard']
    ],
    'ecommerce' => [
        'title' => 'E-commerce Website',
        'description' => 'The '. $project_name. ' is a state-of-the-art digital storefront designed for businesses aiming to establish or expand their online retail operations. It provides a seamless shopping experience through a responsive product catalog, advanced filtering options, and secure multi-payment gateway integration. Customers can create accounts, manage wishlists, track orders, and leave reviews, while administrators benefit from a robust backend to handle inventory, pricing, promotions, and customer engagement. The '.$project_name.' is optimized for performance, scalability, and search engine visibility, making it an ideal solution for sustainable online sales growth. Complete online store with product catalog, shopping cart, secure checkout, and comprehensive admin panel for inventory and order management.',
        'features' => [
            'Modern responsive product catalog',
            'Advanced search and filtering',
            'Shopping cart and wishlist',
            'Secure checkout with multiple payment options',
            'User registration and profile management',
            'Order tracking and history',
            'Product reviews and ratings',
            'Coupon and discount system',
            'Shipping integration and tracking',
            'Admin panel for complete store management'
        ],
        'screens' => ['Homepage', 'Product Catalog', 'Product Details', 'Shopping Cart', 'Checkout', 'User Dashboard', 'Order History', 'Admin Panel', 'Inventory Management']
    ],
    'multivendor_ecommerce' => [
        'title' => 'Multi-vendor E-commerce Platform',
        'description' => 'The '. $project_name.' is a comprehensive marketplace platform that enables multiple independent vendors to register, manage products, and conduct sales on a unified portal. It includes capabilities for vendor onboarding, individual storefronts, order management, commission settings, and secure payout processes. Customers benefit from a wide selection of products across vendors with consolidated checkout, while administrators maintain control through advanced monitoring, analytics, and dispute resolution tools. Designed for scalability and high traffic volumes, the '.$project_name.' is the perfect foundation for building a thriving digital marketplace ecosystem. Advanced marketplace platform allowing multiple vendors to sell products with comprehensive vendor management, commission system, and separate vendor dashboards.',
        'features' => [
            'Multi-vendor marketplace structure',
            'Vendor registration and approval system',
            'Individual vendor storefronts',
            'Commission and payout management',
            'Vendor dashboard for product and order management',
            'Customer reviews for vendors and products',
            'Advanced search across all vendors',
            'Dispute resolution system',
            'Multi-vendor shipping coordination',
            'Comprehensive admin control panel'
        ],
        'screens' => ['Marketplace Homepage', 'Vendor Storefronts', 'Vendor Dashboard', 'Commission Management', 'Customer Panel', 'Admin Control Panel', 'Dispute Resolution', 'Payout System']
    ],
    '_membership' => [
        'title' => 'Arogya Healthcare Membership Website',
        'description' => 'The ' . $project_name . ' is a cutting-edge healthcare membership platform crafted to deliver an all-encompassing digital healthcare experience. Designed to seamlessly connect patients with healthcare providers, it offers a wide array of features including multi-tier membership plans tailored for individual and family needs, comprehensive user profiles capturing detailed medical history, and an advanced appointment booking system that supports scheduling, rescheduling, and cancellations with real-time availability checks. The platform integrates telemedicine capabilities for secure video consultations, enabling patients to access quality care remotely. With personalized health dashboards, medication reminders, wellness program enrollments, and health tracking tools, ' . $project_name . ' empowers users to actively manage their health journey. Robust payment gateway integration supports secure and hassle-free subscription payments, service fees, and in-app purchases. Automated notifications via email, SMS, and push alerts keep members informed about appointments, renewals, and health tips. On the administrative side, healthcare providers can efficiently manage members, doctors, appointment calendars, services, and generate detailed analytics and reports to improve service delivery. Enhanced security protocols ensure confidentiality and compliance with healthcare regulations, making ' . $project_name . ' a trusted and reliable solution for modern healthcare organizations aiming to enhance patient engagement and streamline operations.',
        
        'features' => [
            'User registration and membership management with tiered plans',
            'Detailed member profiles with medical history and preferences',
            'Advanced appointment booking, rescheduling, and cancellation',
            'Telemedicine support with secure video consultations',
            'Personalized health dashboards and wellness tracking',
            'Medication and appointment reminders via email, SMS, and push notifications',
            'Subscription management and secure payment gateway integration',
            'Wellness program enrollment and tracking',
            'Health resources including blogs, articles, and video tutorials',
            'Admin panel for managing members, healthcare providers, appointments, and billing',
            'Comprehensive analytics and reporting for service optimization',
            'Role-based access control and HIPAA-compliant security measures'
        ],
        
        'screens' => [
            'Landing Page with Membership Overview and Benefits',
            'User Registration and Profile Setup',
            'Membership Plans and Subscription Management',
            'Comprehensive Member Dashboard with Health Metrics',
            'Appointment Scheduling Calendar with Doctor Availability',
            'Doctor and Wellness Expert Profiles with Reviews',
            'Telemedicine Video Consultation Interface',
            'Medication and Appointment Reminder Center',
            'Wellness Programs and Events Enrollment',
            'Health Education Resources (Blogs, Videos, FAQs)',
            'Payment and Billing History',
            'Notification Center for Alerts and Updates',
            'Admin Dashboard for User, Appointment, and Content Management',
            'Analytics and Reports for Membership and Service Usage',
            'Role-Based Access Control Settings',
            'Security and Compliance Settings',
            'Customer Support Chat and Helpdesk',
            'Feedback and Review System'
        ],
    
        'apis' => [
            'User Authentication API (register, login, logout, password reset)',
            'Membership Management API (subscribe, renew, upgrade, cancel plans)',
            'Profile API (view and update member medical history and preferences)',
            'Appointment Booking API (create, reschedule, cancel appointments)',
            'Doctor and Wellness Expert Directory API (search, filter, reviews)',
            'Telemedicine API (initiate and manage video consultations)',
            'Payment Gateway API (process subscription and service payments)',
            'Notification API (send email, SMS, and push notifications)',
            'Health Data API (upload, retrieve, and manage health records)',
            'Wellness Program API (enroll, track progress, manage events)',
            'Admin Management API (manage users, roles, content, and settings)',
            'Analytics API (fetch reports on membership and service usage)',
            'Feedback and Review API (submit and retrieve feedback and ratings)',
            'Customer Support API (manage tickets, live chat sessions)'
        ]
    ],
    'digital_marketing' => [
        'title' => 'Digital Marketing Services',
        'description' => 'The ' . $project_name . ' offers results-driven digital marketing services tailored to help businesses grow their online presence and drive more conversions. From setting up and managing targeted Google Ads and Meta (Facebook/Instagram) Ad campaigns to optimizing content, SEO, and performance tracking, our services cover all essential aspects of modern online marketing. Designed for businesses aiming to improve visibility, reach their ideal audience, and achieve measurable ROI.',
    
        'features' => [
            'Google Ads campaign setup and optimization',
            'Meta Ads (Facebook & Instagram) campaign management',
            'Keyword research and targeting strategy',
            'Ad copywriting and creative design',
            'Audience targeting and retargeting',
            'Conversion tracking setup (Google Analytics, Meta Pixel)',
            'Performance monitoring and A/B testing',
            'Weekly and monthly performance reports',
            'Landing page analysis and suggestions',
            'Budget planning and bid strategy'
        ],
    
        'screens' => [
            'Client Dashboard Overview (optional)',
            'Campaign Request Form or Onboarding Page',
            'Ad Preview and Approval Page',
            'Monthly Report Delivery Interface',
            'Contact/Support Request Form'
        ]
    ],


    'informational_website' => [
        'title' => 'Informational Website',
        'description' => 'The '. $project_name .' serves as a professional digital presence tailored for businesses, consultants, or professionals who need to showcase their brand, services, and credentials. The platform features a visually appealing layout with dedicated sections for about us, services, team, portfolio, testimonials, and contact information. Built for SEO and mobile responsiveness, the '.$project_name.' not only increases visibility but also enhances credibility and customer engagement. Ideal for brand storytelling and lead generation, this solution aligns with modern design standards and user experience principles. Professional business website designed to showcase your company, services, and expertise with modern design and optimal user experience.',
        'features' => [
            'Professional homepage design',
            'About us and company history',
            'Services and portfolio showcase',
            'Team member profiles',
            'Client testimonials and case studies',
            'Blog and news section',
            'Contact forms and business information',
            'SEO optimized content structure',
            'Social media integration',
            'Mobile-responsive design'
        ],
        'screens' => ['Homepage', 'About Us', 'Services', 'Portfolio', 'Team', 'Testimonials', 'Blog', 'Contact', 'Admin Panel']
    ],
    'used_car_platform' => [
    'title' => 'Used Car Selling Platform',
    
    'description' => 'The ' . $project_name . ' is a comprehensive used car marketplace and dealership management platform offering everything needed to sell, manage, and market used cars online. It enables individuals and dealers to list vehicles with detailed information, while buyers can search, compare, and schedule test drives. In addition to the core listing and transaction system, the platform includes a custom-built CRM to manage leads, customer interactions, service bookings, and follow-ups. Integrated digital marketing tools help businesses run Google and Meta ad campaigns, manage SEO, track ROI, and generate leads. Admin, client, and CRM-specific panels offer a seamless and centralized experience for sales, support, and business intelligence. ' . $project_name . ' is built for dealerships, aggregators, and car resellers looking for an all-in-one online ecosystem to scale operations and grow revenue.',

    'features' => [
        'User registration for buyers, sellers, and dealers',
        'Comprehensive car listing with images, videos, and technical specifications',
        'Advanced search and filtering (brand, model, price, year, fuel, etc.)',
        'Vehicle comparison tool for buyers',
        'Car valuation and pricing engine',
        'Test drive and vehicle inspection scheduling',
        'Ownership transfer management and document uploads',
        'Secure payment gateway with escrow options',
        'Real-time chat and messaging between buyers and sellers',
        'Email, SMS, and push notifications',
        'Mobile-friendly responsive design',
        'Admin dashboard for managing users, listings, payments, and analytics',
        'Client panel for individual dealers to manage listings and leads',
        '📊 **Custom CRM Module** for managing leads, calls, messages, and follow-ups',
        'Lead tagging, funnel stages, and activity tracking in CRM',
        'Sales rep dashboards, task management, and automated reminders',
        '📢 **Integrated Digital Marketing Services** dashboard (Google Ads, Meta Ads)',
        'Landing page builder and ad campaign manager',
        'SEO tools and analytics integration',
        'Marketing performance and ROI reporting',
        'Multi-location dealer and branch management',
        'Custom domain and branding support'
    ],

    'screens' => [
        'Homepage with Featured Listings and Advanced Search',
        'User Registration and Login (Buyer / Seller / Dealer)',
        'Car Listing Creation with Image & Video Upload',
        'Car Details Page with Specs, Gallery, Seller Info',
        'Search Results Page with Sorting and Filtering',
        'Compare Cars Side-by-Side View',
        'Schedule Test Drive / Inspection Page',
        'Payment Page with Transaction Summary and Gateway',
        'Buyer Dashboard (Saved Cars, Messages, Bookings)',
        'Seller/Dealer Dashboard (Listings, Leads, Promotions)',
        'Admin Panel (Listings, Transactions, Users, Reports)',
        '📈 CRM Dashboard (Leads, Activities, Follow-ups)',
        'Lead Detail Page with Timeline and Communication Logs',
        'Marketing Dashboard (Campaign Setup, Budget, Ads)',
        'Analytics & Conversion Reports Page',
        'Ownership Transfer & Document Upload Center',
        'Support Chat Interface and Helpdesk Portal',
        'Notification & Alert Center (Inbox, SMS, Email Logs)',
        'Multi-Branch Management Interface',
        'Landing Page Designer for Campaigns'
    ],

    'apis' => [
        'User Authentication API (register, login, logout, password reset)',
        'Car Listing API (create, edit, delete, fetch listings)',
        'Search & Filter API (by price, brand, location, etc.)',
        'Car Comparison API',
        'Valuation API (suggest car price based on specs)',
        'Inspection/Test Drive Scheduling API',
        'Payment API (process transactions securely)',
        'Ownership Transfer API (upload docs, track status)',
        'Chat API (buyer-seller messaging)',
        'Notification API (email/SMS/push alerts)',
        'User Dashboard API (listing stats, activity logs)',
        'Admin Management API (users, cars, transactions)',
        'CRM API (leads, activities, follow-ups, sales reps)',
        'Marketing API (ads campaign setup, reporting)',
        'Analytics API (views, leads, conversions)',
        'Feedback and Rating API',
        'Support Ticket API (open, track, respond)'
    ]
],
     'booking_portal' => [
        'title' => 'Booking Portal',
        'description' => 'The ' . $project_name . ' is an integrated online booking system tailored for industries such as travel, hospitality, logistics, and professional services. It supports real-time calendar availability, easy appointment scheduling, service selection, customer profile management, and automated notifications via email and SMS. With secure payment integration and flexible booking modification options, it enhances operational efficiency and customer experience. It includes advanced modules for flight ticket booking, train ticket booking, cab and tempo booking, hotel reservations, and even goods loading services. The backend features staff management, analytics, and reporting tools, making ' . $project_name . ' a robust, all-in-one solution for businesses needing end-to-end service booking capabilities.',
        
        'features' => [
            'Real-time availability calendar',
            'Multi-service booking (Flight, Train, Cab, Hotel, Tempo, Loading)',
            'Online scheduling and reservation',
            'Service/resource and route management',
            'Customer registration and profile system',
            'Automated confirmation emails/SMS',
            'Integrated payment gateway with deposit handling',
            'Booking update and cancellation support',
            'Staff scheduling and workforce management',
            'Detailed analytics and performance reports',
            'Responsive and mobile-optimized interface'
        ],
        
        'screens' => [
            'Dashboard Overview',
            'Booking Calendar',
            'Service Selection (Flight, Train, Cab, Hotel, Tempo, Loading)',
            'Search & Filters for Routes and Availability',
            'Customer Registration & Login',
            'Payment Gateway Integration',
            'Booking Summary & Confirmation',
            'Staff Assignment & Scheduling',
            'Admin Control Panel',
            'Reports & Analytics'
        ],
        
        'apis' => [
            'Flight Booking API (search, book, cancel, status)',
            'Train Booking API (IRCTC or similar integration)',
            'Cab & Tempo Booking API (zone-based and hourly booking)',
            'Hotel Booking API (search, book, manage stay)',
            'Loading Services API (goods category, pickup/drop location)',
            'User Authentication API (register/login/logout)',
            'Booking Management API (create, update, cancel bookings)',
            'Payment API (initiate transaction, verify status)',
            'SMS/Email Notification API',
            'Reports & Analytics API'
        ]
    ],
    'cab_tour_booking' => [
    'title' => 'Cab & Tour Booking System',
    'description' => 'The ' . $project_name . ' Cab & Tour Booking System is a comprehensive solution for booking a variety of vehicles including Sedan, SUV, Innova, Tempo Travellers, Armania, and more. It supports local, outstation, and one-way bookings, as well as curated tour packages. Users can select pickup/drop locations, schedule rides, view fare estimates, and make secure payments. Admin and vendors can manage bookings, fleet availability, route pricing, and track vehicle status. Integrated notifications and multilingual support enhance the customer experience and operational efficiency.',
    
    'features' => [
        'Multi-type cab booking (Sedan, SUV, Innova, Tempo Traveller, Armania, etc.)',
        'Local, outstation, and one-way trip support',
        'Tour package booking with itinerary and fare details',
        'Live fare calculation and vehicle availability check',
        'Pickup and drop location selection with map integration',
        'Customer registration, login, and booking history',
        'Real-time driver/vendor assignment and status tracking',
        'Secure online payment and wallet integration',
        'Multilingual interface support',
        'Booking modification and cancellation options',
        'Admin/vendor dashboard for fleet & booking management',
        'Automated SMS/Email notifications for bookings and status updates'
    ],
    
    'screens' => [
        'Home & Search Interface',
        'Vehicle Type Selection (Sedan, SUV, etc.)',
        'Tour Package Listings & Details',
        'Live Fare Estimation',
        'Pickup/Drop Map & Address Input',
        'Customer Login/Register',
        'Booking Summary & Payment',
        'My Rides/Bookings History',
        'Driver/Vendor Assignment Panel',
        'Admin Panel for Pricing & Fleet Management',
        'Reports & Performance Analytics'
    ],
    
    'apis' => [
        'Cab Booking API (create, update, cancel, status)',
        'Tour Package API (list, details, book)',
        'Vehicle Type & Availability API',
        'Location & Distance Calculation API',
        'User Authentication API (register, login, logout)',
        'Driver/Vendor Assignment API',
        'Fare Calculation API',
        'Payment Gateway API (initiate, verify, refund)',
        'SMS/Email Notification API',
        'Ride & Booking Analytics API'
    ]
],

    'crm_system' => [
        'title' => 'CRM System',
        'description' => 'The '. $project_name.' is an all-in-one Customer Relationship Management platform designed to streamline and enhance interactions between a business and its customers. It allows detailed lead tracking, customer segmentation, sales funnel visualization, and automated follow-ups. Equipped with communication logging, team collaboration, reporting dashboards, and customizable workflows, the '.$project_name.' empowers businesses to foster relationships, increase retention, and optimize sales operations. Customer Relationship Management system to track leads, manage customer interactions, sales pipeline, and improve business relationships.',
        'features' => [
            'Lead capture and management',
            'Customer database and profiles',
            'Sales pipeline tracking',
            'Task and follow-up management',
            'Email integration and templates',
            'Contact history and interaction logs',
            'Sales reporting and analytics',
            'Team collaboration tools',
            'Custom fields and data organization',
            'Mobile access and notifications'
        ],
        'screens' => ['Dashboard', 'Leads Management', 'Customer Profiles', 'Sales Pipeline', 'Task Management', 'Email Integration', 'Reports', 'Team Collaboration', 'Settings']
    ],
    'erp_system' => [
        'title' => 'ERP System',
        'description' => 'The '. $project_name.'  is an Enterprise Resource Planning solution that centralizes and automates core business processes including finance, human resources, inventory, procurement, sales, and production. It offers a unified dashboard for data-driven decision-making, role-based access for secure operations, and integration capabilities with external systems. The '.$project_name.' improves operational transparency, reduces manual workload, and helps businesses scale efficiently with complete control over every departmental function. Enterprise Resource Planning system integrating various business processes including inventory, accounting, HR, and operations management.',
        'features' => [
            'Inventory and stock management',
            'Financial accounting and reporting',
            'Human resources management',
            'Purchase and supplier management',
            'Sales and customer management',
            'Production planning and control',
            'Multi-location support',
            'Role-based access control',
            'Comprehensive reporting dashboard',
            'Data import/export capabilities'
        ],
        'screens' => ['Main Dashboard', 'Inventory Management', 'Accounting Module', 'HR Management', 'Purchase Orders', 'Sales Management', 'Production Planning', 'Reports & Analytics']
    ],
    'flutter_app' => [
    'title' => 'Flutter eCommerce Grocery App',
    'description' => 'The '.$project_name.' is a robust and intuitive grocery delivery mobile application developed using Flutter. It ensures high-performance, cross-platform compatibility for both iOS and Android devices using a single codebase. Designed for fast-paced on-demand services like Blinkit, the app integrates real-time inventory management, secure payments, GPS-based delivery tracking, and smart search capabilities. With features such as user profiles, instant push notifications, cart and checkout flow, and multi-language support, '.$project_name.' offers an ideal mobile-first experience for modern grocery commerce.',
    
    'features' => [
        'Cross-platform support (iOS & Android)',
        'Real-time product inventory sync',
        'User registration, login, and profile management',
        'Smart search and product filtering',
        'Shopping cart with item quantity control',
        'Secure checkout with multiple payment gateways (UPI, cards, wallets)',
        'Live order tracking with Google Maps integration',
        'Push notifications for order updates and promotions',
        'Order history and invoice downloads',
        'Wishlist and save for later',
        'Coupon code and discount system',
        'Multi-vendor/store support (if applicable)',
        'Multilingual support & RTL readiness',
        'Dark mode and responsive UI design',
        'Ratings and reviews for products',
        'Subscription-based purchase model (optional)',
        'Offline access for browsing and cart saving',
        'Admin push control (e.g., banner promotions)',
        'Customer support/chatbot integration',
        'Analytics, crash reporting, and performance monitoring'
    ],
    
    'screens' => [
        'Splash Screen',
        'Onboarding Screens',
        'Login / Registration (Email, OTP, Social)',
        'Home Screen with Banners & Categories',
        'Product Listing & Filter Page',
        'Product Details Page',
        'Cart Screen',
        'Checkout & Payment Screen',
        'Order Summary and Success Page',
        'My Orders and Invoice View',
        'User Profile & Settings',
        'Address Book & Delivery Location Picker',
        'Live Order Tracking with Map',
        'Offers & Coupons Page',
        'Search Page with Suggestions',
        'Notifications Center',
        'Help & Support / Chat',
        'Rating & Review Submission',
        'Subscription Management (if needed)'
    ],

    'apis' => [
        'User Authentication API (register, login, logout, forgot/reset password)',
        'Product Catalog API (categories, subcategories, featured, search)',
        'Product Details API (stock, description, ratings, related items)',
        'Cart API (add, update, delete items)',
        'Checkout & Order Placement API',
        'Order Tracking API (real-time status, delivery ETA)',
        'Address Management API (add, update, remove delivery address)',
        'Payment Gateway API (initiate, verify, refund)',
        'Coupon/Promo Code API (validate, apply)',
        'Push Notification API (send alerts, order updates)',
        'Wishlist API (add/remove favorites)',
        'Review & Rating API (submit, fetch user/product reviews)',
        'Subscription API (subscribe, renew, cancel)',
        'Customer Support API (submit ticket, chat history)',
        'Vendor/Store API (fetch nearest store, store details)',
        'Analytics & Reports API (user behavior, order trends)',
        'Referral & Rewards API (generate referral code, track rewards)',
        'Language & Localization API',
        'Delivery Boy API (location update, order pickup/drop, OTP verification)',
        'Admin Dashboard API (for banners, promotions, user management)'
    ]
],
    'native_app' => [
        'title' => 'Native Mobile App',
        'description' => "The ". $project_name." is a high-performance mobile application developed using platform-specific technologies—Java/Kotlin for Android and Swift/Objective-C for iOS. It leverages the full potential of native device capabilities such as camera, sensors, GPS, and push notifications. This application ensures seamless UI/UX experiences tailored to each platform's standards, resulting in optimal speed, responsiveness, and user satisfaction. Ideal for applications requiring intensive processing or deep integration with system-level APIs. Platform-specific mobile application developed natively for optimal performance, utilizing platform-specific features and design guidelines.",
        'features' => [
            'Platform-optimized performance',
            'Native UI/UX design patterns',
            'Advanced device feature integration',
            'Enhanced security implementations',
            'Platform-specific animations',
            'Deep system integration',
            'Optimized battery and memory usage',
            'App store guidelines compliance',
            'Native push notifications',
            'Platform-specific testing'
        ],
        'screens' => ['Launch Screen', 'Onboarding', 'Authentication', 'Main Interface', 'Feature Modules', 'User Settings', 'Notifications Center', 'Help/Support']
    ],
    'web_application' => [
        'title' => 'Custom Web Application',
        'description' => 'The '.$project_name.' is a tailor-made software solution built to digitize and optimize specific business workflows. It encompasses custom modules for user roles, data entry, automated processes, and interactive dashboards. Designed for scalability and modular integration, the '.$project_name.' facilitates seamless collaboration, operational oversight, and improved productivity. From startups to enterprises, it adapts flexibly to unique business logic and industry requirements. Tailored web application solution designed to meet specific business requirements with custom functionality and user workflows.',
        'features' => [
            'Custom business logic implementation',
            'User role and permission management',
            'Interactive dashboard and reporting',
            'Data visualization and analytics',
            'API integration and development',
            'Automated workflow processes',
            'Document management system',
            'Real-time notifications',
            'Scalable architecture design',
            'Third-party service integration'
        ],
        'screens' => ['Dashboard', 'User Management', 'Data Entry Forms', 'Reports & Analytics', 'Document Management', 'Workflow Management', 'Settings & Configuration', 'API Integration Panel']
    ]
];

$marketing_prices = $_POST['marketing_prices'] ?? [];

$marketing_pricing = [
    'graphic_design' => [
        'name' => 'Graphic Design (30 posts/month)',
        'price' => isset($marketing_prices['graphic_design']) ? (float)$marketing_prices['graphic_design'] : 0,
        'type' => 'monthly'
    ],
    'social_media' => [
        'name' => 'Social Media Management',
        'price' => isset($marketing_prices['social_media']) ? (float)$marketing_prices['social_media'] : 0,
        'type' => 'monthly'
    ],
    'seo' => [
        'name' => 'SEO Implementation',
        'price' => isset($marketing_prices['seo']) ? (float)$marketing_prices['seo'] : 0,
        'type' => 'monthly' // changed from one-time to monthly
    ],
    'ads_management' => [
        'name' => 'Ads Management (Google & Meta)',
        'price' => isset($marketing_prices['ads_management']) ? (float)$marketing_prices['ads_management'] : 0,
        'type' => 'monthly'
    ]
];


// Calculate costs
$marketing_one_time = 0;
$marketing_monthly = 0;

foreach ($marketing_services as $service) {
    if (isset($marketing_pricing[$service])) {
        if ($marketing_pricing[$service]['type'] === 'one-time') {
            $marketing_one_time += $marketing_pricing[$service]['price'];
        } else {
            $marketing_monthly += $marketing_pricing[$service]['price'];
        }
    }
}


$total_one_time = $project_cost + $marketing_monthly;
$total_monthly = $marketing_monthly;

// Get current project content
$current_project = $project_content[$project_type] ?? null;

$frontend_techs = [
    'HTML5', 'CSS3', 'Bootstrap 5', 'Tailwind CSS', 'JavaScript', 'React.js', 'React Native', 'Dart',
    'Firebase for Flutter', 'Elementor', 'WPBakery', 'Divi Builder'
];

$backend_techs = [
    'Node.js', 'PHP', 'MySQL', 'MongoDB', 'Flutter', 'WooCommerce', 'WordPress REST API',
    'ACF (Advanced Custom Fields)', 'SQLite (Flutter)', 'Node.js / Laravel Backend'
];

$other_techs = [
    'SEO Optimization', 'Firebase', 'Payment Gateway Integration', 'Google Maps API', 'JWT',
    'RESTful API', 'Push Notifications (FCM)', 'REST API (Flutter)', 'GraphQL (Flutter)',
    'Yoast SEO', 'Contact Form 7', 'WPML', 'Wordfence Security'
];


$selected_techs = $technologies ?? [];
$custom_techs = [];

if (!empty($custom_technologies) && in_array('custom', $selected_techs)) {
    $custom_techs = array_map('trim', explode(',', $custom_technologies));
}

$frontend_selected = array_intersect($selected_techs, $frontend_techs);
$backend_selected = array_intersect($selected_techs, $backend_techs);
$other_selected = array_intersect($selected_techs, $other_techs);

$tech_descriptions = [
    // Frontend
    'React.js' => 'React.js for building dynamic and component-based user interfaces',
    'React Native' => 'React Native for cross-platform mobile app development',
    'Tailwind CSS' => 'Tailwind CSS for utility-first and consistent styling',
    'Bootstrap 5' => 'Bootstrap 5 for responsive design and reusable UI components',
    'HTML5' => 'HTML5 for structuring semantic and accessible content',
    'CSS3' => 'CSS3 for styling and responsive layout control',
    'JavaScript' => 'JavaScript for interactivity and dynamic front-end behavior',
    'Elementor' => 'Elementor for drag-and-drop visual WordPress page design',
    'WPBakery' => 'WPBakery for flexible and intuitive WordPress page building',
    'Divi Builder' => 'Divi Builder for creating visually stunning WordPress layouts without coding',

    // Backend
    'Node.js' => 'Node.js with Express.js for scalable and efficient server-side logic',
    'PHP' => 'PHP for server-side scripting and API handling',
    'MySQL' => 'MySQL as a relational database for structured data management',
    'MongoDB' => 'MongoDB as a NoSQL database for flexible document storage',
    'Flutter' => 'Flutter for building cross-platform applications with a single codebase',
    'WooCommerce' => 'WooCommerce for integrating powerful e-commerce capabilities into WordPress',
    'WordPress REST API' => 'WordPress REST API for custom integrations and headless CMS development',
    'ACF (Advanced Custom Fields)' => 'ACF for managing and displaying custom fields in WordPress backends',
    
    // WordPress Core
    'WordPress' => 'WordPress for content management and quick deployment of dynamic websites',

    // Other
    'SEO Optimization' => 'SEO Optimization to improve search engine rankings',
    'Firebase' => 'Firebase for real-time database and push notifications',
    'Payment Gateway Integration' => 'Payment Gateway Integration for secure transactions',
    'Google Maps API' => 'Google Maps API for location-based services',
    'JWT' => 'JWT for secure authentication',
    'RESTful API' => 'RESTful API architecture for structured and scalable communication',
    'Firebase' => 'Firebase for real-time database and push notifications',
    'Payment Gateway Integration' => 'Payment Gateway Integration for secure transactions',
    'Google Maps API' => 'Google Maps API for location-based services',
    'JWT' => 'JWT for secure authentication',
    'RESTful API' => 'RESTful API architecture for structured and scalable communication',
    'Yoast SEO' => 'Yoast SEO for improving on-page SEO and readability in WordPress',
    'Contact Form 7' => 'Contact Form 7 for building and managing contact forms easily in WordPress',
    'WPML' => 'WPML for making WordPress websites multilingual',
    'Wordfence Security' => 'Wordfence Security for advanced firewall and malware scanning in WordPress',
    
    'Dart' => 'Dart language used with Flutter for cross-platform mobile apps',
    'Firebase for Flutter' => 'Firebase integration for real-time data and auth in Flutter',
    'SQLite (Flutter)' => 'SQLite for local database storage in Flutter apps',
    'Node.js / Laravel Backend' => 'API backend built in Node.js or Laravel for mobile/web integration',
    'Push Notifications (FCM)' => 'Firebase Cloud Messaging for push notifications',
    'REST API (Flutter)' => 'REST API calls integration in Flutter apps',
    'GraphQL (Flutter)' => 'GraphQL APIs used with Flutter for flexible data fetching'
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Tech - Quotation for <?php echo htmlspecialchars($client_name); ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-bg: #f8fafc;
            --dark-text: #1f2937;
            --card-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.3;
            color: var(--dark-text);
            background: #ffffff;
            padding: 0;
        }

        .container {
            margin: 0 auto;
            padding: 10px;
        }

        .section {
            margin-bottom: 3rem;
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
            border: 1px solid #e5e7eb;
        }

        .header-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .header-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .header-section .lead {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            border-bottom: 3px solid var(--light-bg);
            padding-bottom: 0.5rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--primary-color);
        }

        .section-title .icon {
            margin-right: 0.75rem;
            font-size: 1.5rem;
            color: var(--primary-color);

        }
        .icon {
            margin-right: 8px;
            color: var(--primary-color);
        }

        .module-item {
            background: var(--light-bg);
            border-radius: 12px;
            padding: 1.5rem;
            height: 100%;
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
        }

        .module-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.1);
        }

        .module-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            padding: 0.4rem 0;
            position: relative;
            padding-left: 1.5rem;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .feature-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--success-color);
            font-weight: bold;
        }
        
        .tech-list {
            list-style: none;
            padding: 0;
        }

        .tech-list li {
            padding: 0.4rem 0;
            position: relative;
            padding-left: 1.5rem;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        .tech-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: bold;
        }

        .tech-item {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            margin: 0.3rem;
            font-weight: 600;
            font-size: 0.875rem;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .timeline-box {
            background: var(--light-bg);
            border-radius: 12px;
            padding: 2rem;
            border-left: 4px solid var(--warning-color);
        }

        .timeline-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .timeline-phase {
            font-weight: 600;
            color: var(--primary-color);
            flex: 1;
        }

        .timeline-duration {
            background: var(--warning-color);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .timeline-box ul {
            margin-left: 1rem;
            margin-bottom: 1.5rem;
        }

        .timeline-box li {
            margin-bottom: 0.3rem;
            color: #6b7280;
        }

        .highlight {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            border-radius:8px;
            border: 1px solid #fbbf24;
            padding: 1.5rem;
            color: #92400e;
        }

        .cost-summary {
            background: linear-gradient(135deg, var(--light-bg), #ffffff);
            border-radius: 12px;
            padding: 1.2rem;
            border: 2px solid var(--primary-color);
        }

        .cost-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .cost-row:last-child {
            border-bottom: none;
            font-weight: 550;
            font-size: 1rem;
            color: var(--primary-color);
            background: var(--light-bg);
            padding: 1.5rem;
            margin: 1rem -2rem -2rem -2rem;
            border-radius: 0 0 12px 12px;
        }

        .cost-label {
            font-weight: 600;
        }

        .cost-value {
            font-weight: 550;
            color: var(--primary-color);
        }

        .payment-breakdown {
            background: var(--light-bg);
            border-radius: 12px;
            padding: 1.2rem;
            margin-top: 1.5rem;
        }

        .milestone-item {
            background: white;
            padding: 1.2rem;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-left: 4px solid var(--success-color);
        }

        .milestone-title {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .milestone-amount {
            font-size: 1rem;
            font-weight: 600;
            color: var(--success-color);
        }

        .marketing-service-item {
            background: white;
            border-radius: 8px;
            padding: 1.2rem;
            margin-bottom: 0.75rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-left: 4px solid var(--accent-color);
        }

        .service-name {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .service-price {
            font-weight: 550;
            color: var(--success-color);
        }

        .company-logo {
            width: 250px;
            height: auto;
            margin-bottom: 1rem;
            padding:10px;
            background-color: #fff;
            border-radius: 20px;
        }

        .company-info {
            background: var(--light-bg);
            border-radius: 12px;
            padding: 2rem;
            border-left: 4px solid var(--primary-color);
        }

        .payment-info {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            border-radius: 12px;
            padding: 2rem;
            border: 2px solid var(--success-color);
            margin-top: 2rem;
        }

        .upi-details {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-left: 3px solid var(--primary-color);
        }

        .footer-section {
            background: linear-gradient(135deg, var(--dark-text), #374151);
            color: white;
            margin-top: 3rem;
            border-radius: 12px;
            padding: 2rem;
        }

        .footer-section h5 {
            color: #ffffff;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .footer-section p, .footer-section a {
            color: #d1d5db;
            margin-bottom: 0.5rem;
        }

        .footer-section a:hover {
            color: #ffffff;
            text-decoration: none;
        }

        .btn-download {
            background: linear-gradient(135deg, var(--success-color), #059669);
            border: none;
            color: white;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-download:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
            color: white;
        }

        .validity-note {
            background: #fef3c7;
            border: 1px solid #fbbf24;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 2rem;
            color: #92400e;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .section {
                padding: 1.5rem;
            }
            
            .header-section h1 {
                font-size: 2rem;
            }
            
            .cost-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }

        @media print {
      .btn-print {
        display: none;
      }
      
      body {
        padding: 0;
        background-color: white;
      }
      
      .container {
        max-width: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
      }
      
      .section {
        margin-bottom: 10px;
        page-break-inside: avoid;
        break-inside: avoid;
      }
    }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="section header-section">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="https://test.globaltechconsultancyservice.com/assets/logo.png" alt="Global Tech Logo" class="company-logo">
                </div>
                <div class="col-md-9">
                    <h1><i class="fas fa-file-contract"></i> Project Quotation</h1>
                    <p class="lead">Professional Technology Solutions & Digital Marketing Services</p>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Quotation ID:</strong> <?php echo htmlspecialchars($project_code); ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Date:</strong> <?php echo date('F d, Y'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Client Information -->
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-user-circle"></i></span>
                Client Information
            </h2>
            <div class="row">
                <div class="col-md-6">
                    <p><strong><i class="fas fa-user me-2 icon"></i>Client Name:</strong> <?php echo htmlspecialchars($client_name); ?></p>
                    <p><strong><i class="fas fa-phone me-2 icon"></i>Phone:</strong> <?php echo htmlspecialchars($client_phone); ?></p>
                </div>
                <div class="col-md-6">
                    <?php if (!empty($client_email)): ?>
                    <p><strong><i class="fas fa-envelope me-2 icon"></i>Email:</strong> <?php echo htmlspecialchars($client_email); ?></p>
                    <?php endif; ?>
                    <p><strong><i class="fas fa-code me-2 icon"></i>Project Code:</strong> <?php echo htmlspecialchars($project_code); ?></p>
                </div>
            </div>
        </div>

        <!-- Project Overview -->
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-project-diagram"></i></span>
                Project Overview
            </h2>
            <div class="row">
                <div class="col-md-8">
                    <h4 class="text-primary mb-3"><?php echo htmlspecialchars($project_name); ?></h4>
                    <?php if ($current_project): ?>
                    <p class="mb-3"><?php echo $current_project['description']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <div class="highlight">
                        <h6><i class="fas fa-clock me-2"></i>Timeline</h6>
                        <p class="mb-0 fw-bold"><?php echo htmlspecialchars($timeline); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Features & Modules -->
        <?php if ($current_project): ?>
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-list-check"></i></span>
                Project Features & Modules
            </h2>
            
            <div class="row mb-4">
                <?php foreach ($current_project['screens'] as $index => $screen): ?>
                <div class="col-md-4 mb-3">
                    <div class="module-item">
                        <div class="module-title">
                            <i class="fas fa-desktop me-2"></i>
                            <?php echo htmlspecialchars($screen); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <h5 class="text-primary mb-3">Key Features Included:</h5>
            <div class="row">
                <div class="col-md-6">
                    <ul class="feature-list">
                        <?php 
                        $half = ceil(count($current_project['features']) / 2);
                        for ($i = 0; $i < $half; $i++): 
                        ?>
                        <li><?php echo $current_project['features'][$i]; ?></li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="feature-list">
                        <?php for ($i = $half; $i < count($current_project['features']); $i++): ?>
                        <li><?php echo $current_project['features'][$i]; ?></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Technology Stack -->
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-code"></i></span>
                Technology Stack
            </h2>
            <p class="mb-3">The following technologies will be used for this project:</p>
            <div class="mb-3">
                <?php foreach ($technologies as $tech): ?>
                    <?php if ($tech !== 'custom'): ?>
                    <span class="tech-item"><?php echo htmlspecialchars($tech); ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
                
                <?php if (!empty($custom_technologies) && in_array('custom', $technologies)): ?>
                    <?php 
                    $custom_techs = explode(',', $custom_technologies);
                    foreach ($custom_techs as $custom_tech): 
                    ?>
                    <span class="tech-item"><?php echo htmlspecialchars(trim($custom_tech)); ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="row">
    <!-- Frontend -->
    <div class="col-md-6">
        <h5><i class="fas fa-desktop icon"></i> Frontend</h5>
        <ul class="tech-list">
            <?php foreach ($frontend_techs as $tech): ?>
                <?php if (in_array($tech, $selected_techs)): ?>
                    <li><?= $tech_descriptions[$tech] ?? htmlspecialchars($tech) ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (empty($frontend_selected)): ?>
                <li>Standard web technologies for UI development</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Backend -->
    <div class="col-md-6">
        <h5><i class="fas fa-server icon"></i> Backend</h5>
        <ul class="tech-list">
            <?php foreach ($backend_techs as $tech): ?>
                <?php if (in_array($tech, $selected_techs)): ?>
                    <li><?= $tech_descriptions[$tech] ?? htmlspecialchars($tech) ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (empty($backend_selected)): ?>
                <li>Server-side technologies for backend services and database operations</li>
            <?php endif; ?>
            <li><?= $tech_descriptions['RESTful API'] ?></li>
            <li><?= $tech_descriptions['JWT'] ?></li>
        </ul>
    </div>
</div>

<!-- Other Technologies -->
<div class="row mt-4">
    <div class="col-md-12">
        <h5><i class="fas fa-tools icon"></i> Other Technologies</h5>
        <ul class="tech-list">
            <?php foreach ($other_techs as $tech): ?>
                <?php if (in_array($tech, $selected_techs)): ?>
                    <li><?= $tech_descriptions[$tech] ?? htmlspecialchars($tech) ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($custom_techs as $custom): ?>
                <li><?= htmlspecialchars($custom) ?> (custom-defined technology)</li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


            <?php if (!empty($current_project['apis']) && is_array($current_project['apis'])): ?>
                   <div class="row mt-4">
                    <div class="col-12">
                        <h5><i class="fas fa-plug icon"></i> APIs Used</h5>
                        <ul class="tech-list">
                            <?php foreach ($current_project['apis'] as $api): ?>
                                <li><?php echo htmlspecialchars($api); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    </div>
            <?php endif; ?>
            <div class="row mt-3">
                <div class="col-md-4">
                    <h5><i class="fas fa-shield-alt icon"></i> Security Features</h5>
                    <ul class="tech-list">
                        <li>Secure user authentication</li>
                        <li>Data encryption for sensitive information</li>
                        <li>Role-based access controls</li>
                        <li>Input validation and sanitization</li>
                        <li>Regular security updates</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5><i class="fas fa-rocket icon"></i> Performance Optimization</h5>
                    <ul class="tech-list">
                        <li>Efficient API calls and data fetching</li>
                        <li>Content caching strategies</li>
                        <li>Lazy loading for media content</li>
                        <li>Offline functionality for key features</li>
                        <li>Optimized database queries</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5><i class="fas fa-cloud icon"></i> Cloud Integration</h5>
                    <ul class="tech-list">
                        <li>Cloud-based file storage (e.g. object storage)</li>
                        <li>Push notification services</li>
                        <li>Video streaming capabilities</li>
                        <li>Automated backups</li>
                        <li>Scalable hosting infrastructure</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Development Timeline -->
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-calendar-alt"></i></span>
                🧭 Development Timeline
            </h2>
            <div class="timeline-box">
                <h5 class="text-primary mb-4">Estimated Project Duration: <?php echo htmlspecialchars($timeline); ?></h5>

                <?php
                switch ($timeline):
                    case '1-2 weeks':
                ?>
                <!-- Phase 1 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-lightbulb me-2"></i> Phase 1: Planning & Design</div>
                    <div class="timeline-duration">Days 1-2</div>
                </div>
                <ul>
                    <li>Quick requirement gathering</li>
                    <li>Basic wireframe and layout plan</li>
                    <li>Database & content structure overview</li>
                </ul>
                
                <!-- Phase 2 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-code me-2"></i> Phase 2: Frontend Development</div>
                    <div class="timeline-duration">Days 3-5</div>
                </div>
                <ul>
                    <li>Core page design & responsiveness</li>
                    <li>Form and UI elements integration</li>
                </ul>
                
                <!-- Phase 3 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-server me-2"></i> Phase 3: Backend Integration</div>
                    <div class="timeline-duration">Days 6-8</div>
                </div>
                <ul>
                    <li>Basic database & logic setup</li>
                    <li>Admin access & content management</li>
                </ul>
                
                <!-- Phase 4 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-check-circle me-2"></i> Phase 4: Testing & Delivery</div>
                    <div class="timeline-duration">Days 9-10</div>
                </div>
                <ul>
                    <li>Quick testing & adjustments</li>
                    <li>SEO basics and deployment</li>
                </ul>
                
                <?php
                break;
                case '2-3 weeks':
                ?>
                <!-- Phase 1 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-lightbulb me-2"></i> Phase 1: Planning & Design</div>
                    <div class="timeline-duration">Week 1</div>
                </div>
                <ul>
                    <li>Requirement gathering & UI design</li>
                    <li>Basic schema and content layout</li>
                </ul>
                
                <!-- Phase 2 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-code me-2"></i> Phase 2: Frontend Development</div>
                    <div class="timeline-duration">Week 2</div>
                </div>
                <ul>
                    <li>Page development & form integration</li>
                    <li>Mobile responsiveness and media</li>
                </ul>
                
                <!-- Phase 3 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-server me-2"></i> Phase 3: Backend Development</div>
                    <div class="timeline-duration">Mid-Week 2</div>
                </div>
                <ul>
                    <li>API/database setup</li>
                    <li>Admin dashboard setup</li>
                </ul>
                
                <!-- Phase 4 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-check-circle me-2"></i> Phase 4: Final Touches</div>
                    <div class="timeline-duration">Week 3</div>
                </div>
                <ul>
                    <li>Final testing & bug fixes</li>
                    <li>Launch and training material</li>
                </ul>
                
                <?php
                break;
                case '3-4 weeks':
                ?>
                <!-- Phase 1 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-lightbulb me-2"></i> Phase 1: Planning & Design</div>
                    <div class="timeline-duration">Week 1</div>
                </div>
                <ul>
                    <li>Requirement gathering & analysis</li>
                    <li>Wireframes and UI/UX design</li>
                    <li>Database schema and content planning</li>
                </ul>

                <!-- Phase 2 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-code me-2"></i> Phase 2: Frontend Development</div>
                    <div class="timeline-duration">Week 2</div>
                </div>
                <ul>
                    <li>Responsive layout and page setup</li>
                    <li>Component integration and form validation</li>
                    <li>Media and interactive elements</li>
                </ul>

                <!-- Phase 3 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-server me-2"></i> Phase 3: Backend & CMS Integration</div>
                    <div class="timeline-duration">Week 3</div>
                </div>
                <ul>
                    <li>Database setup & API development</li>
                    <li>Admin panel and CMS configuration</li>
                    <li>Secure form handling and data management</li>
                </ul>

                <!-- Phase 4 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-check-circle me-2"></i> Phase 4: Testing & Launch</div>
                    <div class="timeline-duration">Week 4</div>
                </div>
                <ul>
                    <li>Testing (device/browser), bug fixing</li>
                    <li>SEO, optimization, and analytics setup</li>
                    <li>Final deployment and basic training</li>
                </ul>

                <?php
                break;
                case '4-5 weeks':
                ?>
                <!-- Slightly more buffer than 3-4 weeks -->
                <!-- Repeat similar structure with adjusted durations or combine some tasks across 2 weeks -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-lightbulb me-2"></i> Phase 1: Planning & Design</div>
                    <div class="timeline-duration">Week 1</div>
                </div>
                <ul>
                    <li>Advanced requirement gathering and workflows</li>
                    <li>UI/UX design mockups</li>
                    <li>Database and architecture blueprint</li>
                </ul>

                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-code me-2"></i> Phase 2: Frontend Development</div>
                    <div class="timeline-duration">Week 2–3</div>
                </div>
                <ul>
                    <li>All user-facing pages</li>
                    <li>Frontend logic, transitions, and effects</li>
                </ul>

                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-server me-2"></i> Phase 3: Backend & Integration</div>
                    <div class="timeline-duration">Week 4</div>
                </div>
                <ul>
                    <li>API setup, CMS integration, admin logic</li>
                    <li>User authentication and data storage</li>
                </ul>

                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-check-circle me-2"></i> Phase 4: QA & Deployment</div>
                    <div class="timeline-duration">Week 5</div>
                </div>
                <ul>
                    <li>Bug testing, optimization</li>
                    <li>SEO, analytics, deployment, and training</li>
                </ul>

                <?php
                break;
                case '6-8 weeks':
                ?>
                <!-- 6-8 Weeks Timeline -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-lightbulb me-2"></i> Phase 1: Discovery & Design</div>
                    <div class="timeline-duration">Week 1–2</div>
                </div>
                <ul>
                    <li>In-depth consultation & planning</li>
                    <li>High-fidelity UI/UX designs</li>
                    <li>Workflow diagrams & content mapping</li>
                </ul>
                
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-code me-2"></i> Phase 2: Frontend Development</div>
                    <div class="timeline-duration">Week 3–4</div>
                </div>
                <ul>
                    <li>Complete UI with animations</li>
                    <li>Responsive web design & accessibility</li>
                    <li>UI testing and refinements</li>
                </ul>
                
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-server me-2"></i> Phase 3: Backend Development</div>
                    <div class="timeline-duration">Week 5–6</div>
                </div>
                <ul>
                    <li>Complex backend logic & role management</li>
                    <li>Advanced CMS or admin panel</li>
                    <li>3rd-party integration (e.g., payments, APIs)</li>
                </ul>
                
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-check-circle me-2"></i> Phase 4: QA, UAT & Launch</div>
                    <div class="timeline-duration">Week 7–8</div>
                </div>
                <ul>
                    <li>Thorough testing across devices & environments</li>
                    <li>User Acceptance Testing (UAT)</li>
                    <li>Final SEO, deployment, and handover</li>
                </ul>
                
                <?php
                break;
                case '8-10 weeks':
                ?>
                <!-- 8-10 Weeks Timeline -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-lightbulb me-2"></i> Phase 1: Research & Blueprinting</div>
                    <div class="timeline-duration">Week 1–2</div>
                </div>
                <ul>
                    <li>Competitor analysis & goal alignment</li>
                    <li>Design systems & user journeys</li>
                    <li>Data model planning & asset listing</li>
                </ul>
                
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-code me-2"></i> Phase 2: Frontend Engineering</div>
                    <div class="timeline-duration">Week 3–5</div>
                </div>
                <ul>
                    <li>Modular & scalable frontend build</li>
                    <li>Accessibility & performance optimization</li>
                    <li>Cross-browser/device testing</li>
                </ul>
                
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-server me-2"></i> Phase 3: Backend & DevOps</div>
                    <div class="timeline-duration">Week 6–8</div>
                </div>
                <ul>
                    <li>Custom APIs, workflows & integrations</li>
                    <li>Cloud/server configuration, CI/CD setup</li>
                    <li>Advanced user roles, analytics integration</li>
                </ul>
                
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-check-circle me-2"></i> Phase 4: QA, Training & Launch</div>
                    <div class="timeline-duration">Week 9–10</div>
                </div>
                <ul>
                    <li>Regression testing & staging deployment</li>
                    <li>Admin training & documentation</li>
                    <li>Live launch & support period</li>
                </ul>
                
                <?php
                 break;
                 case '1-2 months':
                ?>
            <!-- Phase 1 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-search me-2"></i> Phase 1: Requirement Gathering & Planning</div>
                <div class="timeline-duration">Week 1–2</div>
            </div>
            <ul>
                <li>Client discussions and goal definition</li>
                <li>Initial wireframes and technical planning</li>
            </ul>

            <!-- Phase 2 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-drafting-compass me-2"></i> Phase 2: Design & Development</div>
                <div class="timeline-duration">Week 3–6</div>
            </div>
            <ul>
                <li>UI/UX design and core module development</li>
                <li>Initial content and media integration</li>
            </ul>

            <!-- Phase 3 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-cogs me-2"></i> Phase 3: Testing & Launch</div>
                <div class="timeline-duration">Week 7–8</div>
            </div>
            <ul>
                <li>Basic testing, bug fixes, and deployment</li>
                <li>Training or walkthrough with stakeholders</li>
            </ul>
        <?php
        break;

        case '2-3 months':
        ?>
            <!-- Phase 1 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-search me-2"></i> Phase 1: Research & Planning</div>
                <div class="timeline-duration">Month 1</div>
            </div>
            <ul>
                <li>Requirement documentation, sitemap & wireframes</li>
                <li>Tech stack finalization</li>
            </ul>

            <!-- Phase 2 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-drafting-compass me-2"></i> Phase 2: UI/UX & Core Development</div>
                <div class="timeline-duration">Month 2</div>
            </div>
            <ul>
                <li>Responsive design and modular coding</li>
                <li>Feature development and CMS integration</li>
            </ul>

            <!-- Phase 3 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-cogs me-2"></i> Phase 3: QA, Review & Go Live</div>
                <div class="timeline-duration">Month 3</div>
            </div>
            <ul>
                <li>Testing, client feedback loop</li>
                <li>Final deployment and post-launch support</li>
            </ul>
        <?php
        break;

        case '3-4 months':
        ?>
            <!-- Phase 1 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-search me-2"></i> Phase 1: Discovery & Architecture</div>
                <div class="timeline-duration">Month 1</div>
            </div>
            <ul>
                <li>Detailed project planning and user stories</li>
                <li>Database design and UI concepts</li>
            </ul>

            <!-- Phase 2 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-drafting-compass me-2"></i> Phase 2: Full UI/UX & Development</div>
                <div class="timeline-duration">Month 2</div>
            </div>
            <ul>
                <li>Complete frontend design and backend setup</li>
                <li>Integration of APIs and services</li>
            </ul>

            <!-- Phase 3 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-cogs me-2"></i> Phase 3: Testing & Feedback</div>
                <div class="timeline-duration">Month 3</div>
            </div>
            <ul>
                <li>Internal QA & stakeholder reviews</li>
                <li>Bug fixes and enhancements</li>
            </ul>

            <!-- Phase 4 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-rocket me-2"></i> Phase 4: Launch & Support</div>
                <div class="timeline-duration">Month 4</div>
            </div>
            <ul>
                <li>Final deployment and launch strategy</li>
                <li>Monitoring and post-launch support</li>
            </ul>
        <?php
        break;

        case '4-6 months':
        ?>
            <!-- Phase 1 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-search me-2"></i> Phase 1: Product Discovery & Blueprinting</div>
                <div class="timeline-duration">Month 1</div>
            </div>
            <ul>
                <li>Requirement workshops, personas, and project charter</li>
                <li>Prototyping and user flow validation</li>
            </ul>

            <!-- Phase 2 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-drafting-compass me-2"></i> Phase 2: Design & Pre-Development</div>
                <div class="timeline-duration">Month 2</div>
            </div>
            <ul>
                <li>Final UI/UX, animations, branding assets</li>
                <li>Component libraries and design systems</li>
            </ul>

            <!-- Phase 3 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-code me-2"></i> Phase 3: Development Sprints</div>
                <div class="timeline-duration">Month 3–5</div>
            </div>
            <ul>
                <li>Agile sprint cycles with demo releases</li>
                <li>Complex integrations, admin roles, notifications</li>
                <li>Mid-project review and adjustments</li>
            </ul>

            <!-- Phase 4 -->
            <div class="timeline-row">
                <div class="timeline-phase"><i class="fas fa-cogs me-2"></i> Phase 4: Optimization & Pre-launch QA</div>
                <div class="timeline-duration">Month 6</div>
            </div>
            <ul>
                <li>End-to-end testing, stress testing, and security audits</li>
                <li>Documentation, deployment strategy, and stakeholder training</li>
            </ul>
        <?php
        break;
        case '6+ months':
        ?>
                <!-- Phase 1 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-lightbulb me-2"></i> Phase 1: Strategic Planning</div>
                    <div class="timeline-duration">Months 1–2</div>
                </div>
                <ul>
                    <li>Vision alignment, roadmapping, market research</li>
                    <li>Risk assessment and compliance analysis</li>
                </ul>
                
                <!-- Phase 2 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-pencil-alt me-2"></i> Phase 2: Detailed Design & Prototyping</div>
                    <div class="timeline-duration">Months 3–4</div>
                </div>
                <ul>
                    <li>Brand identity, style guide, and user testing of prototypes</li>
                    <li>Feedback cycles and feature planning</li>
                </ul>
                
                <!-- Phase 3 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-layer-group me-2"></i> Phase 3: Full-cycle Development</div>
                    <div class="timeline-duration">Months 5–9</div>
                </div>
                <ul>
                    <li>Modular architecture, microservices, scalable components</li>
                    <li>Version control, staging environments, team collaboration</li>
                </ul>
                
                <!-- Phase 4 -->
                <div class="timeline-row">
                    <div class="timeline-phase"><i class="fas fa-rocket me-2"></i> Phase 4: Staging, UAT & Go Live</div>
                    <div class="timeline-duration">Months 10+</div>
                </div>
                <ul>
                    <li>Client UAT, content population, and CMS training</li>
                    <li>Launch preparation, marketing support, SLA onboarding</li>
                </ul>
                <?php break; ?>
                <?php default: ?>
                <p>No timeline selected. Please choose an option on the previous page.</p>
                <?php endswitch; ?>

            </div>
        </div>


        <!-- Digital Marketing Services -->
        <?php if (!empty($marketing_services)): ?>
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-bullhorn"></i></span>
                Digital Marketing Services(Optional)
            </h2>
            <p class="mb-3">Additional marketing services can be included in this quotation:</p>
            
            <?php foreach ($marketing_services as $service): ?>
                <?php if (isset($marketing_pricing[$service])): ?>
                <div class="marketing-service-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="service-name">
                                <i class="fas fa-check-circle me-2 text-success"></i>
                                <?php echo $marketing_pricing[$service]['name']; ?>
                            </div>
                        </div>
                        <div class="service-price">
                            ₹<?php echo number_format($marketing_pricing[$service]['price']); ?>
                            <?php echo $marketing_pricing[$service]['type'] === 'monthly' ? '/month' : ' (one-time)'; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php
        // Assume this is within a POST submission page or handles POST elsewhere
        $offerpercent = isset($_POST['offerpercent']) ? (float) $_POST['offerpercent'] : 0;
        
        // Calculate discounted cost
        $discount_amount = ($total_one_time * $offerpercent) / 100;
        $discounted_total = $total_one_time - $discount_amount;
        ?>

        <!-- Cost Summary -->
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-calculator"></i></span>
                Cost Summary
            </h2>
            <div class="cost-summary">
                <div class="cost-row">
                    <div class="cost-label">
                        <i class="fas fa-laptop-code me-2"></i>
                        <?php echo $current_project['title'] ?? 'Project Development'; ?>
                    </div>
                    <div class="cost-value">₹<?php echo number_format($project_cost); ?></div>
                </div>
                
                <?php if ($marketing_one_time > 0): ?>
                <div class="cost-row">
                    <div class="cost-label">
                        <i class="fas fa-bullhorn me-2"></i>
                        Marketing Services (One-time)
                    </div>
                    <div class="cost-value">₹<?php echo number_format($marketing_one_time); ?></div>
                </div>
                <?php endif; ?>
                
                <?php if ($marketing_monthly > 0): ?>
                <div class="cost-row">
                    <div class="cost-label">
                        <i class="fas fa-calendar me-2"></i>
                        Monthly Marketing Services(Optional)
                    </div>
                    <div class="cost-value">₹<?php echo number_format($marketing_monthly); ?>/month</div>
                </div>
                <?php endif; ?>
        
                <div class="cost-row">
                    <div class="cost-label">
                        <i class="fas fa-rupee-sign me-2"></i>
                        Total One-time Cost
                    </div>
                    <div class="cost-value">
                        <del class="text-muted">₹<?php echo number_format($total_one_time); ?></del><br>
                        <strong class="text-success">₹<?php echo number_format($discounted_total); ?> (<?php echo $offerpercent; ?>% Off)</strong>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Payment Structure -->
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-credit-card"></i></span>
                Payment Structure
            </h2>
            
            <div class="payment-breakdown">
                <?php if ($payment_method === 'milestone'): ?>
                <h5 class="text-primary mb-3">
                    <i class="fas fa-flag-checkered me-2"></i>
                    Milestone-based Payment
                </h5>
                
                <div class="milestone-item">
                    <div class="milestone-title">
                        <i class="fas fa-play me-2"></i>
                        Milestone 1: Project Initiation
                    </div>
                    <div class="milestone-amount">
                        ₹<?php echo number_format(($discounted_total * $milestone_1_percent) / 100); ?> 
                        (<?php echo $milestone_1_percent; ?>% of total cost)
                    </div>
                    <small class="text-muted">Due upon project confirmation and contract signing</small>
                </div>
                
                <div class="milestone-item">
                    <div class="milestone-title">
                        <i class="fas fa-palette me-2"></i>
                        Milestone 2: UI/UX Completion
                    </div>
                    <div class="milestone-amount">
                        ₹<?php echo number_format(($discounted_total * $milestone_2_percent) / 100); ?> 
                        (<?php echo $milestone_2_percent; ?>% of total cost)
                    </div>
                    <small class="text-muted">Due upon completion and approval of design phase</small>
                </div>
                
                <div class="milestone-item">
                    <div class="milestone-title">
                        <i class="fas fa-rocket me-2"></i>
                        Milestone 3: Final Deployment
                    </div>
                    <div class="milestone-amount">
                        ₹<?php echo number_format(($discounted_total * $milestone_3_percent) / 100); ?> 
                        (<?php echo $milestone_3_percent; ?>% of total cost)
                    </div>
                    <small class="text-muted">Due upon project completion and successful deployment</small>
                </div>
                
                <?php else: ?>
                <h5 class="text-primary mb-3">
                    <i class="fas fa-calendar-alt me-2"></i>
                    Installment Payment Plan
                </h5>
                
                <div class="milestone-item">
                    <div class="milestone-title">
                        <i class="fas fa-credit-card me-2"></i>
                        Advance Payment
                    </div>
                    <div class="milestone-amount">
                        ₹<?php echo number_format(($discounted_total * $advance_percent) / 100); ?> 
                        (<?php echo $advance_percent; ?>% of total cost)
                    </div>
                    <small class="text-muted">Due upon project confirmation</small>
                </div>
                
                <div class="milestone-item">
                    <div class="milestone-title">
                        <i class="fas fa-calendar me-2"></i>
                        Monthly Installments
                    </div>
                    <div class="milestone-amount">
                        ₹<?php 
                        $remaining = $discounted_total - (($discounted_total * $advance_percent) / 100);
                        echo number_format($remaining / $installment_duration); 
                        ?>/month
                    </div>
                    <small class="text-muted">For <?php echo $installment_duration; ?> months after project initiation</small>
                </div>
                <?php endif; ?>
                
                <?php if ($marketing_monthly > 0): ?>
                <div class="milestone-item" style="border-left-color: var(--accent-color);">
                    <div class="milestone-title">
                        <i class="fas fa-bullhorn me-2"></i>
                        Monthly Marketing Services (If applicable)
                    </div>
                    <div class="milestone-amount">
                        ₹<?php echo number_format($marketing_monthly); ?>/month
                    </div>
                    <small class="text-muted">Ongoing monthly charges for selected marketing services</small>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Payment Information -->
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-university"></i></span>
                Payment Information
            </h2>
            
            <div class="payment-info">
                <h5 class="text-success mb-3">
                    <i class="fas fa-mobile-alt me-2"></i>
                    UPI Payment Details
                </h5>
                <div class="row">
                    <div class="col-md-6 upi-details">
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
                </div>
            </div>
            
            <div class="validity-note">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Note:</strong> This quotation is valid for 30 days from the date of issue. All payments should be made to the above UPI details only.
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">🔗 Communication and Support</h2>
            <div class="row">
                <div class="col-md-6">
                <h5><i class="fas fa-comments icon"></i> During Development</h5>
                <ul>
                    <li>Weekly progress updates via email</li>
                    <li>Bi-weekly demo sessions</li>
                    <li>Dedicated project management tool access</li>
                    <li>Responsive communication channel</li>
                    <li>Regular milestone approvals</li>
                </ul>
                </div>
                <div class="col-md-6">
                <h5><i class="fas fa-headset icon"></i> Post-Launch Support</h5>
                <ul>
                    <li><strong>3 months</strong> of free technical support</li>
                    <li>Bug fixes and minor adjustments</li>
                    <li>Performance monitoring</li>
                    <li>Security updates</li>
                    <li>Knowledge transfer and documentation</li>
                </ul>
                </div>
            </div>
        </div>

        <!-- Terms & Conditions -->
        <div class="section">
            <h2 class="section-title">
                <span class="icon"><i class="fas fa-file-contract"></i></span>
                Terms & Conditions
            </h2>
            <div class="row">
                <div class="col-md-6">
                    <ul class="feature-list">
                        <li>All payments must be made as per the agreed schedule</li>
                        <li>Project timeline may vary based on client feedback and revisions</li>
                        <li>Source code will be provided upon full payment completion</li>
                        <li>Free support for 30 days post-deployment</li>
                        <li>Domain and hosting charges are separate (if required)</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="feature-list">
                        <li>Client must provide all required content and assets</li>
                        <li>Additional features beyond scope will be charged separately</li>
                        <li>Regular backups and security updates included for 1 year</li>
                        <li>Training session included for admin panel usage</li>
                        <li>Payment delays may result in project suspension</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Footer Section -->
        <div class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h5><i class="fas fa-building me-2"></i>Global Tech Consultancy Service</h5>
                        <p><i class="fas fa-map-marker-alt me-2"></i>
                            Radhe Krishna Bhawan, 1st Floor, In front of CGR Complex Block C-2,<br>
                            Near Arjan Garh Metro Station, Delhi – 110047
                        </p>
                        <p><i class="fas fa-phone me-2"></i>+91 89020442794</p>
                        <p><i class="fas fa-envelope me-2"></i>
                            <a href="mailto:info@globaltechservice.in">info@globaltechservice.in</a>
                        </p>
                        <p><i class="fas fa-globe me-2"></i>
                            <a href="https://www.globaltechservice.in" target="_blank">www.globaltechservice.in</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5><i class="fas fa-clock me-2"></i>Business Hours</h5>
                        <p>Monday - Saturday<br>9:00 AM - 6:00 PM</p>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center my-4">
                        <div class="p-3 px-4 text-center border border-warning rounded bg-warning-subtle" style="max-width: 600px;">
                            <p class="mb-0" style="color: #856404; font-weight: 500;">
                                <i class="fas fa-handshake me-2"></i>
                                Thank you for choosing <strong>Global Tech Consultancy Service</strong>
                            </p>
                        </div>
                    </div>

                </div>
                <hr style="border-color: #6b7280; margin: 2rem 0 1rem 0;">
                <div class="text-center">
                    <p>&copy; <?php echo date('Y'); ?> Global Tech Consultancy Service. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>