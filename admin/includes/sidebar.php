 <div class="sidebar-area" id="sidebar-area">
     <div class="logo position-relative">
         <a href="index.html" class="d-block text-decoration-none">
             <img src="<?= $app_path ?>assets/images/logo-icon.png" alt="logo-icon">
             <span class="logo-text fw-bold text-dark">Farol</span>
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
                 <a href="javascript:void(0);" class="menu-link menu-toggle active">
                     <i data-feather="grid" class="menu-icon tf-icons"></i>
                     <span class="title">Dashboard</span>
                     <span class="count">7</span>
                 </a>
                 <ul class="menu-sub">
                     <li class="menu-item">
                         <a href="index.html" class="menu-link">
                             eCommerce
                         </a>
                     </li>
                     <li class="menu-item">
                         <a href="analytics.html" class="menu-link">
                             Analytics
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="menu-title small text-uppercase">
                 <span class="menu-title-text">APPS</span>
             </li>
             <li class="menu-item">
                 <a href="chat.html" class="menu-link">
                     <i data-feather="message-square" class="menu-icon tf-icons"></i>
                     <span class="title">Chat</span>
                 </a>
             </li>
             <li class="menu-item">
                 <a href="to-do.html" class="menu-link">
                     <i data-feather="file-text" class="menu-icon tf-icons"></i>
                     <span class="title">To Do</span>
                 </a>
             </li>
         </ul>
     </aside>
     <div class="bg-white z-1 admin">
         <div class="d-flex align-items-center admin-info border-top">
             <div class="flex-shrink-0">
                 <a href="profile.html" class="d-block">
                     <img src="<?= $app_path ?>assets/images/admin.jpg" class="rounded-circle wh-54" alt="admin">
                 </a>
             </div>
             <div class="flex-grow-1 ms-3 info">
                 <a href="profile.html" class="d-block name">Adison Jeck</a>
                 <a href="logout.html">Log Out</a>
             </div>
         </div>
     </div>
 </div>