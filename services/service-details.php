 <?php 
 include('../includes/header.php');
 include('../includes/dbcode.php');
 include('../includes/functions.php');
 
 // Get service slug from URL (support both slug and id for backward compatibility)
 $serviceSlug = isset($_GET['slug']) ? sanitizeInput($_GET['slug']) : '';
 $serviceId = isset($_GET['id']) ? intval($_GET['id']) : 0;
 $service = null;
 
 // Check if slug column exists
 $slugColumnExists = false;
 $checkSlugQuery = "SHOW COLUMNS FROM services LIKE 'slug'";
 $checkResult = mysqli_query($link, $checkSlugQuery);
 if ($checkResult && mysqli_num_rows($checkResult) > 0) {
     $slugColumnExists = true;
 }
 
 if (!empty($serviceSlug) && $slugColumnExists && function_exists('getServiceBySlug')) {
     $service = getServiceBySlug($link, $serviceSlug);
 } elseif ($serviceId > 0) {
     // Backward compatibility: if ID is provided, get by ID
     $service = getServiceById($link, $serviceId);
     // Only redirect to slug if slug column exists and service has slug
     if ($service && $slugColumnExists && !empty($service['slug'])) {
         // Redirect to slug-based URL
         header("Location: " . $app_path . "services/" . $service['slug']);
         exit;
     }
 }
 
 // If no service found, redirect to services page
 if (!$service) {
     header("Location: " . $app_path . "services/");
     exit;
 }
 
// Get all services for sidebar
$allServices = getServices($link, 'active');

// Service-specific content and image mapping
$serviceContent = [
    'Accounting & Bookkeeping' => [
        'image' => '1.jpeg',
        'features' => [
            'Systematic & Audit-Ready Records',
            'Clear Financial Reporting',
            // 'Scalable Accounting Setup',
            'Compliance-Focused Approach',
            'Monthly Bookkeeping & Reconciliation',
            // 'Complete Accounting System Setup'
        ],
        'support_title' => 'How We Support Your Business',
        'support_content' => 'We act as your extended finance team, handling day-to-day accounting tasks while ensuring long-term financial accuracy and compliance. Our approach focuses on transparency, consistency and systemisation, so your books remain audit-ready at all times.<br><br>You gain access to structured reports that clearly show income trends, expense control, profitability and cash position — enabling smarter and faster business decisions.',
        'target_title' => 'Who This Service Is For',
        'target_content' => 'This service is ideal for businesses that want:',
        'target_list' => [
            'Organised and professional accounting records',
            'Reliable financial reporting for management decisions',
            'Reduced risk during audits and tax assessments',
            'A dependable accounting system without in-house overhead'
        ]
    ],
    'VAT & Corporate Tax' => [
        'image' => '2.jpeg',
        'features' => [
            'VAT Registration & Deregistration',
            'Timely VAT Return Filing',
            'Corporate Tax Compliance',
            // 'FTA Portal Assistance',
            'Tax Audit Preparation',
            // 'Penalty Settlement Guidance'
        ],
        'support_title' => 'How We Support Your Business',
        'support_content' => 'We help businesses meet all VAT and corporate tax requirements with accurate documentation, timely filing and proper record maintenance. Our service reduces compliance risks and ensures your submissions are aligned with FTA rules.<br><br>Corporate Tax is new in the UAE — we make it easy to understand by preparing clear reports and ensuring all requirements are fully met, helping you avoid confusion and penalties.',
        'target_title' => 'Who This Service Is For',
        'target_content' => 'This service is ideal for businesses that need:',
        'target_list' => [
            'Expert VAT compliance and filing support',
            'Corporate tax registration and return filing',
            'Guidance through FTA audits and assessments',
            'Proper documentation for tax compliance'
        ]
    ],
    'Business Setup & Licensing' => [
        'image' => '3.jpeg',
        'features' => [
            'New License Registration',
            'Activity Selection & Modification',
            'Trade Name Reservation',
            'License Renewal Services',
            // 'MOA Amendments & Updates',
            // 'Bank Account Opening Guidance'
        ],
        'support_title' => 'How We Support Your Business',
        'support_content' => 'We support clients with licenses, renewals and updates. Our process covers all steps required for maintaining your legal status with RAK DED and related government departments.<br><br>Whether you\'re starting a new project or updating an existing one, we take care of all formalities including establishment card updates, ownership transfers, tenancy contract assistance, and municipality approvals — so you can focus on growth.',
        'target_title' => 'Who This Service Is For',
        'target_content' => 'This service is ideal for:',
        'target_list' => [
            'New businesses starting operations in the UAE',
            'Existing businesses needing license renewals',
            'Companies requiring activity modifications',
            'Businesses seeking professional setup guidance'
        ]
    ],
    'Visa & Immigration' => [
        'image' => '4.jpeg',
        'features' => [
            'Investor & Partner Visas',
            'Family Visa Processing',
            'Entry Permits & Status Changes',
            'Visa Renewals & Updates',
            // 'Emirates ID & Medical Typing',
            // 'ICP File & E-Channel Support'
        ],
        'support_title' => 'How We Support Your Business',
        'support_content' => 'We help individuals and businesses manage visa applications with accurate documents and timely processing. Our team guides you at every step, making sure each requirement is completed correctly and on time.<br><br>From initial entry permits to family visa processing, visa renewals, Emirates ID typing, and mobile number updates in ICP — we provide reliable assistance throughout the entire immigration process.',
        'target_title' => 'Who This Service Is For',
        'target_content' => 'This service is ideal for:',
        'target_list' => [
            'Investors and business partners needing visas',
            'Families requiring residency permits',
            'Businesses managing employee visas',
            'Individuals needing visa renewal or status changes'
        ]
    ],
    'Typing & Document Services' => [
        'image' => '5.jpeg',
        'features' => [
            'Government Form Typing',
            'Visa & Labour Applications',
            'Municipality Documentation',
            'NOCs & Letters',
            // 'Power of Attorney Typing',
            // 'Translation Services'
        ],
        'support_title' => 'How We Support Your Business',
        'support_content' => 'We prepare government forms and documents for immigration, labour, municipality and business needs with accuracy and attention to detail. Our typing services ensure all documents meet government requirements.<br><br>From visa forms and labour applications to municipality forms, NOCs, letters, agreements, and English–Arabic translation — we provide comprehensive document preparation support along with printing and photocopy services.',
        'target_title' => 'Who This Service Is For',
        'target_content' => 'This service is ideal for:',
        'target_list' => [
            'Businesses needing government document preparation',
            'Individuals requiring official form typing',
            'Companies needing translation services',
            'Anyone seeking reliable document processing'
        ]
    ],
    'Municipality & Labour Services' => [
        'image' => '6.jpeg',
        'features' => [
            'Tenancy Contract Assistance',
            'Establishment Labour File',
            'Work Permit Typing',
            // 'Labour Quota Requests',
            // 'Occupation Change Requests',
            'Municipality Updates & Compliance'
        ],
        'support_title' => 'How We Support Your Business',
        'support_content' => 'We assist with labour approvals, work permits, establishment setups and municipality-related documentation. Our services ensure your business meets all local labour and municipal requirements.<br><br>From setting up establishment labour files to processing work permits, managing labour quotas, handling occupation changes, and ensuring municipality compliance — we provide comprehensive support for all local regulatory requirements.',
        'target_title' => 'Who This Service Is For',
        'target_content' => 'This service is ideal for:',
        'target_list' => [
            'Businesses setting up labour files',
            'Companies needing work permit processing',
            'Establishments requiring municipality approvals',
            'Businesses managing labour and municipal compliance'
        ]
    ],
    'PRO & Government Services' => [
        'image' => '1.jpeg',
        'features' => [
            'Document Clearance',
            'Approvals & NOCs',
            'Government Follow-Up',
            'MOHRE & ICA Coordination',
            // 'Payment Assistance',
            // 'Appointment Scheduling'
        ],
        'support_title' => 'How We Support Your Business',
        'support_content' => 'We follow up on applications, coordinate with authorities and ensure that your documents move forward without delays. Our PRO services save you time and ensure smooth government interactions.<br><br>From document clearance and approvals to coordinating with MOHRE, ICA, and Municipality departments, we handle payment assistance and appointment scheduling — providing fast and reliable government liaison support for all your administrative needs.',
        'target_title' => 'Who This Service Is For',
        'target_content' => 'This service is ideal for:',
        'target_list' => [
            'Businesses needing government document processing',
            'Companies requiring PRO coordination services',
            'Establishments seeking approval assistance',
            'Anyone needing reliable government liaison support'
        ]
    ]
];

// Get service-specific content or use defaults
$serviceTitle = $service['title'];
$content = isset($serviceContent[$serviceTitle]) ? $serviceContent[$serviceTitle] : [
    'image' => '1.jpeg',
    'features' => [
        'Professional Service Delivery',
        'Compliance-Focused Approach',
        'Expert Guidance & Support',
        'Timely Processing'
    ],
    'support_title' => 'How We Support Your Business',
    'support_content' => 'We provide professional, reliable services tailored to your business needs. Our team ensures accuracy, compliance and timely completion of all requirements.',
    'target_title' => 'Who This Service Is For',
    'target_content' => 'This service is ideal for businesses that want:',
    'target_list' => [
        'Professional and reliable service delivery',
        'Expert guidance and support',
        'Compliance with all requirements',
        'Timely and efficient processing'
    ]
];

// Determine image based on service mapping or fallback to service ID
if (!empty($content['image'])) {
    $serviceImage = $content['image'];
} else {
    $serviceImageIndex = (($service['id'] - 1) % 6) + 1;
    $serviceImage = $serviceImageIndex . '.jpeg';
}
?>
<div class="breadcumb-wrapper" data-bg-src="<?= $app_path ?>assets/img/breadcumb/breadcumb-bg.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title text-capitalize"><?= htmlspecialchars($service['title']) ?></h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="<?= $app_path ?>">Home</a></li>
                    <li><a href="<?= $app_path ?>services/">Services</a></li>
                    <li class="text-capitalize"><?= htmlspecialchars($service['title']) ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row flex-row-reverse">
           <div class="col-lg-8">
               <h2 class="h4"><?= htmlspecialchars($service['title']) ?></h2>
               <?php if ($service['description']): ?>
               <div class="service-description">
                   <?= $service['description'] ?>
               </div>
               <?php endif; ?>
                <div class="row gx-0 mb-4 pb-2 pt-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="col-xl-6"><img src="<?= $app_path ?>assets/img/service/<?= htmlspecialchars($serviceImage) ?>" alt="<?= htmlspecialchars($service['title']) ?>" class="w-100"></div>
                    <div class="col-xl-6">
                        <div class="service-list-box">
                            <h3 class="h5 title">Service Features</h3>
                            <div class="list-style3">
                                <ul>
                                    <?php foreach ($content['features'] as $feature): ?>
                                    <li><i class="fal fa-check-circle"></i><?= htmlspecialchars($feature) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="h5"><?= htmlspecialchars($content['support_title']) ?></h3>
                <p><?= $content['support_content'] ?></p>

                <h3 class="h5"><?= htmlspecialchars($content['target_title']) ?></h3>
                <p><?= htmlspecialchars($content['target_content']) ?></p>
                <div class="list-style3">
                    <ul>
                        <?php foreach ($content['target_list'] as $item): ?>
                        <li><i class="fal fa-check-circle"></i><?= htmlspecialchars($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
             <div class="col-lg-4">
                 <aside class="service-sidebar">
                    <div class="widget widget_categories">
                        <h3 class="widget_title">All Services</h3>
                        <ul>
                            <?php if (!empty($allServices)): ?>
                                <?php foreach ($allServices as $sidebarService): 
                                    // Use slug if available and slug column exists, otherwise fallback to ID
                                    if ($slugColumnExists && !empty($sidebarService['slug'])) {
                                        $sidebarUrl = $sidebarService['link_url'] ?: ($app_path . 'services/' . $sidebarService['slug']);
                                    } else {
                                        $sidebarUrl = $sidebarService['link_url'] ?: ($app_path . 'services/service-details.php?id=' . $sidebarService['id']);
                                    }
                                    $isActive = ($sidebarService['id'] == $service['id']) ? 'class="active"' : '';
                                ?>
                                <li><a href="<?= htmlspecialchars($sidebarUrl) ?>" <?= $isActive ?>><?= htmlspecialchars(strtoupper($sidebarService['title'])) ?></a></li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a href="<?= $app_path ?>services/">View All Services</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                     <div class="widget">
                         <h3 class="widget_title">Working Hours</h3>
                         <div class="widget-workhours">
                             <ul>
                                 <li><i class="fal fa-clock"></i>Sun – Thu: 9am – 1pm & 5pm – 9pm</li>
                                 <li><i class="fal fa-clock"></i>Friday: 9am – 12pm</li>
                                 <li><span class="text-theme"><i class="fal fa-clock"></i>Saturday: Closed</span></li>
                                 <!--<li><i class="fal fa-clock"></i>Mon – Fri 1.00 – 2:00 pm</li>-->
                                 <!--<li><i class="fal fa-clock"></i>Saturday 8.00 – 12:00 pm</li>-->
                                 <!--<li><span class="text-theme"><i class="fal fa-clock"></i>Sunday closed</span></li>-->
                             </ul>
                         </div>
                     </div>
                     <div class="quote-box" data-bg-src="<?= $app_path ?>assets/img/widget/quote-box.jpg">
                         <h3 class="quote-box__title">Have Any Query?</h3><a href="<?= $app_path ?>contact-us" class="vs-btn">Get A Quote<i class="far fa-arrow-right"></i></a>
                     </div>
                 </aside>
             </div>
         </div>
     </div>
 </section>
 <?php include('../includes/footer.php'); ?>