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
             <li class="menu-item open">
                 <a href="javascript:void(0);" class="menu-link  active">
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
                 <a href="<?= $app_path ?>logout.php" class="text-danger">Log Out</a>
             </div>
         </div>
     </div>
 </div>