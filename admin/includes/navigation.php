<header class="header-area bg-white mb-4 rounded-bottom-10" id="header-area">
    <div class="row align-items-center">
        <div class="col-lg-4 col-sm-6 col-md-4">
            <div class="left-header-content">
                <ul
                    class="d-flex align-items-center ps-0 mb-0 list-unstyled justify-content-center justify-content-sm-start">
                    <li>
                        <button class="header-burger-menu bg-transparent p-0 border-0"
                            id="header-burger-menu">
                            <i data-feather="menu"></i>
                        </button>
                    </li>
                    <li class="d-none d-lg-block ms-3">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i data-feather="zap" class="me-1" style="width: 14px; height: 14px;"></i> Quick Links
                            </button>
                            <ul class="dropdown-menu">
                                <li><h6 class="dropdown-header">Content</h6></li>
                                <li><a class="dropdown-item" href="<?= $app_path ?>modules/slider/"><i data-feather="image" style="width: 14px; height: 14px;" class="me-2"></i> Hero Slider</a></li>
                                <li><a class="dropdown-item" href="<?= $app_path ?>modules/services/"><i data-feather="briefcase" style="width: 14px; height: 14px;" class="me-2"></i> Services</a></li>
                                <li><a class="dropdown-item" href="<?= $app_path ?>modules/testimonials/"><i data-feather="message-square" style="width: 14px; height: 14px;" class="me-2"></i> Testimonials</a></li>
                                <li><a class="dropdown-item" href="<?= $app_path ?>modules/team/"><i data-feather="users" style="width: 14px; height: 14px;" class="me-2"></i> Team</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><h6 class="dropdown-header">Management</h6></li>
                                <li><a class="dropdown-item" href="<?= $app_path ?>modules/contacts/"><i data-feather="mail" style="width: 14px; height: 14px;" class="me-2"></i> Contact Inquiries</a></li>
                                <li><a class="dropdown-item" href="<?= $app_path ?>modules/gallery/"><i data-feather="image" style="width: 14px; height: 14px;" class="me-2"></i> Gallery</a></li>
                                <li><a class="dropdown-item" href="<?= $app_path ?>modules/settings/"><i data-feather="settings" style="width: 14px; height: 14px;" class="me-2"></i> Settings</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8 col-sm-6 col-md-8">
            <div class="right-header-content mt-2 mt-sm-0">
                <ul
                    class="d-flex align-items-center justify-content-center justify-content-sm-end ps-0 mb-0 list-unstyled">

                    <li class="header-right-item d-none d-md-block">
                        <div class="today-date">
                            <span id="digitalDate">
                                <?php
                                // Display current date in format: Day, dd Month yyyy
                                echo date('l, d F Y');
                                ?>
                            </span>
                            <i data-feather="calendar"></i>
                        </div>
                    </li>

                    <li class="header-right-item">
                        <div class="dropdown admin-profile">
                            <div class="d-xxl-flex align-items-center bg-transparent border-0 text-start p-0 cursor"
                                data-bs-toggle="dropdown">
                                <div class="flex-shrink-0">
                                    <img class="rounded-circle wh-54" src="<?= $app_path ?>assets/images/admin.jpg"
                                        alt="admin">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-none d-xxl-block">
                                            <span class="degeneration"><?= htmlspecialchars(ucfirst($adminUser['role'] ?? 'Admin')) ?></span>
                                            <div class="d-flex align-content-center">
                                                <h3><?= htmlspecialchars($adminUser['name'] ?? 'Admin') ?></h3>
                                                <div class="down">
                                                    <i data-feather="chevron-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="dropdown-menu border-0 bg-white w-100 admin-link">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-body"
                                        href="<?= $app_path ?>modules/dashboard/">
                                        <i data-feather="user"></i>
                                        <span class="ms-2">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-body"
                                        href="<?= $app_path ?>modules/dashboard/">
                                        <i data-feather="home"></i>
                                        <span class="ms-2">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-body"
                                        href="<?= $app_path ?>modules/settings/">
                                        <i data-feather="settings"></i>
                                        <span class="ms-2">Settings</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-body"
                                        href="<?= str_replace('/admin/', '/', $app_path) ?>" target="_blank">
                                        <i data-feather="external-link"></i>
                                        <span class="ms-2">View Website</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-danger"
                                        href="<?= $app_path ?>logout.php">
                                        <i data-feather="log-out"></i>
                                        <span class="ms-2">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>