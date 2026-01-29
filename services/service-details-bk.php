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
                    <?= nl2br($service['description']) ?>
                </div>
                <?php endif; ?>
                 <div class="row gx-0 mb-4 pb-2 pt-3 wow fadeInUp" data-wow-delay="0.2s">
                     <div class="col-xl-6"><img src="<?= $app_path ?>assets/img/service/sr-d-1-2.jpg" alt="project image" class="w-100"></div>
                     <div class="col-xl-6">
                         <div class="service-list-box">
                             <h3 class="h5 title">Service Features</h3>
                             <div class="list-style3">
                                 <ul>
                                     <li><i class="fal fa-check-circle"></i>Systematic & Audit-Ready Records</li>
                                     <li><i class="fal fa-check-circle"></i>Clear Financial Reporting</li>
                                     <li><i class="fal fa-check-circle"></i>Scalable Accounting Setup</li>
                                     <li><i class="fal fa-check-circle"></i>Compliance-Focused Approach</li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <h3 class="h5">How We Support Your Business</h3>
                 <p>We act as your extended finance team, handling day-to-day accounting tasks while ensuring long-term financial accuracy and compliance. Our approach focuses on transparency, consistency and systemisation, so your books remain audit-ready at all times.<br>

                     You gain access to structured reports that clearly show income trends, expense control, profitability and cash position — enabling smarter and faster business decisions.</p>

                 <h3 class="h5">Who This Service Is For</h3>
                 <p>This service is ideal for businesses that want:
                 <div class="list-style3">
                     <ul>
                         <li><i class="fal fa-check-circle"></i>Organised and professional accounting records</li>
                         <li><i class="fal fa-check-circle"></i>Reliable financial reporting for management decisions</li>
                         <li><i class="fal fa-check-circle"></i>Reduced risk during audits and tax assessments</li>
                         <li><i class="fal fa-check-circle"></i>A dependable accounting system without in-house overhead</li>
                     </ul>
                 </div>
                 </p>
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
                                 <li><i class="fal fa-clock"></i>Mon – Fri 1.00 – 2:00 pm</li>
                                 <li><i class="fal fa-clock"></i>Saturday 8.00 – 12:00 pm</li>
                                 <li><span class="text-theme"><i class="fal fa-clock"></i>Sunday closed</span></li>
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