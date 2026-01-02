 <div class="sidebar-area" id="sidebar-area">
     <div class="logo position-relative">
         <a href="<?= $app_path ?>modules/dashboard/" class="d-block text-decoration-none">
             <img src="<?= $app_path ?>assets/images/easy-plus/96size.png" alt="logo-icon" style="width: 40px;">
             <span class="logo-text fw-bold text-dark">Easy Plus</span>
         </a>
         <button
             class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
             id="sidebar-burger-menu">
             <i data-feather="x"></i>
         </button>
     </div>
     <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
         <ul class="menu-inner">
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/dashboard/" class="menu-link">
                    <i data-feather="grid" class="menu-icon tf-icons"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">CMS For EASY PLUS</span>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/slider/" class="menu-link">
                    <i data-feather="image" class="menu-icon tf-icons"></i>
                    <span class="title">Hero Slider</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/features/" class="menu-link">
                    <i data-feather="star" class="menu-icon tf-icons"></i>
                    <span class="title">Features</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/services/" class="menu-link">
                    <i data-feather="briefcase" class="menu-icon tf-icons"></i>
                    <span class="title">Services</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/about/" class="menu-link">
                    <i data-feather="info" class="menu-icon tf-icons"></i>
                    <span class="title">About Section</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/process/" class="menu-link">
                    <i data-feather="layers" class="menu-icon tf-icons"></i>
                    <span class="title">Process/Team</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/skills/" class="menu-link">
                    <i data-feather="trending-up" class="menu-icon tf-icons"></i>
                    <span class="title">Skills/Progress</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/faq/" class="menu-link">
                    <i data-feather="help-circle" class="menu-icon tf-icons"></i>
                    <span class="title">FAQ</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/cta/" class="menu-link">
                    <i data-feather="phone-call" class="menu-icon tf-icons"></i>
                    <span class="title">CTA Section</span>
                </a>
            </li>
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">Content Management</span>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/contacts/" class="menu-link">
                    <i data-feather="mail" class="menu-icon tf-icons"></i>
                    <span class="title">Contact Inquiries</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/testimonials/" class="menu-link">
                    <i data-feather="message-square" class="menu-icon tf-icons"></i>
                    <span class="title">Testimonials</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/team/" class="menu-link">
                    <i data-feather="users" class="menu-icon tf-icons"></i>
                    <span class="title">Team Members</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/gallery/" class="menu-link">
                    <i data-feather="image" class="menu-icon tf-icons"></i>
                    <span class="title">Gallery</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/blog/" class="menu-link">
                    <i data-feather="file-text" class="menu-icon tf-icons"></i>
                    <span class="title">Blog/News</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/portfolio/" class="menu-link">
                    <i data-feather="briefcase" class="menu-icon tf-icons"></i>
                    <span class="title">Portfolio/Projects</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/service-details/" class="menu-link">
                    <i data-feather="file" class="menu-icon tf-icons"></i>
                    <span class="title">Service Details</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/pages/" class="menu-link">
                    <i data-feather="file-text" class="menu-icon tf-icons"></i>
                    <span class="title">Pages</span>
                </a>
            </li>
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">System</span>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/admin-users/" class="menu-link">
                    <i data-feather="user" class="menu-icon tf-icons"></i>
                    <span class="title">Admin Users</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/menu/" class="menu-link">
                    <i data-feather="menu" class="menu-icon tf-icons"></i>
                    <span class="title">Menu/Navigation</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= $app_path ?>modules/settings/" class="menu-link">
                    <i data-feather="settings" class="menu-icon tf-icons"></i>
                    <span class="title">Settings</span>
                </a>
            </li>
         </ul>
     </aside>
     <div class="bg-white z-1 admin">
         <div class="d-flex align-items-center admin-info border-top">
             <div class="flex-shrink-0">
                 <a href="<?= $app_path ?>modules/dashboard/" class="d-block">
                     <img src="<?= $app_path ?>assets/images/admin.jpg" class="rounded-circle wh-54" alt="admin">
                 </a>
             </div>
             <div class="flex-grow-1 ms-3 info">
                 <a href="<?= $app_path ?>modules/dashboard/" class="d-block name"><?= htmlspecialchars($adminUser['name'] ?? 'Admin') ?></a>
                 <div class="d-flex align-items-center gap-2 mt-1">
                     <a href="<?= str_replace('/admin/', '/', $app_path) ?>" target="_blank" class="text-primary small" title="View Website">
                         <i data-feather="external-link" style="width: 14px; height: 14px;"></i> Website
                     </a>
                     <span class="text-muted">|</span>
                     <a href="<?= $app_path ?>logout.php" class="text-danger small">Log Out</a>
                 </div>
             </div>
         </div>
     </div>
 </div>