<footer class="footer-wrapper footer-layout1" data-bg-src="<?= $app_path ?>assets/img/shape/bg-footer-1-1.jpg">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm footer-info_group">
                    <div class="footer-info">
                        <div class="footer-info_icon"><i class="fal fa-map-marker-alt"></i></div>
                        <div class="media-body"><span class="footer-info_label">Office Address</span>
                            <div class="footer-info_link"><?php echo $footer_contact['address']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm footer-info_group">
                    <div class="footer-info">
                        <div class="footer-info_icon"><i class="fal fa-clock"></i></div>
                        <div class="media-body"><span class="footer-info_label">Working Hours</span>
                            <div class="footer-info_link"><?php echo $footer_contact['working_hours']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm footer-info_group">
                    <div class="footer-info">
                        <div class="footer-info_icon"><i class="fal fa-phone-volume"></i></div>
                        <div class="media-body"><span class="footer-info_label">Contact Us</span>
                            <div class="footer-info_link"><a href="mailto:<?php echo $footer_contact['email']; ?>"><?php echo $footer_contact['email']; ?></a><br><a href="tel:<?php echo $footer_contact['phone']; ?>">Phone: <?php echo $footer_contact['phone']; ?></a><br><a href="tel:<?php echo $footer_contact['landline']; ?>">Landline: <?php echo $footer_contact['landline']; ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-lg-4 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">About Us</h3>
                        <div class="vs-widget-about">
                            <p class="footer-text">Licensed UAE accounting and business support firm providing reliable bookkeeping, tax, visa, and government documentation services with accuracy and professionalism.</p>
                            <div class="footer-social">
                                <?php if (!empty($social_media['facebook'])): ?>
                                <a href="<?= htmlspecialchars($social_media['facebook']) ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($social_media['instagram'])): ?>
                                <a href="<?= htmlspecialchars($social_media['instagram']) ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($social_media['linkedin'])): ?>
                                <a href="<?= htmlspecialchars($social_media['linkedin']) ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="<?= $app_path ?>">Home</a></li>
                                <li><a href="<?= $app_path ?>services/">Services</a></li>
                                <li><a href="<?= $app_path ?>about-us/">About Us</a></li>
                                <li><a href="<?= $app_path ?>contact-us/">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Services</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <?php 
                                // Ensure database connection and functions are available
                                if (!isset($link)) {
                                    if (file_exists(__DIR__ . '/dbcode.php')) {
                                        include(__DIR__ . '/dbcode.php');
                                    }
                                }
                                if (!function_exists('getServices')) {
                                    if (file_exists(__DIR__ . '/functions.php')) {
                                        include(__DIR__ . '/functions.php');
                                    }
                                }
                                
                                // Get services for footer (max 5)
                                $footerServices = [];
                                if (function_exists('getServices') && isset($link) && $link) {
                                    try {
                                        $footerServices = getServices($link, 'active', 5);
                                    } catch (Exception $e) {
                                        // Silently fail and show fallback
                                        $footerServices = [];
                                    } catch (Error $e) {
                                        // Handle fatal errors
                                        $footerServices = [];
                                    }
                                }
                                
                                if (!empty($footerServices)):
                                    foreach ($footerServices as $footerService):
                                        // Always use slug if available
                                        if (!empty($footerService['slug'])) {
                                            $serviceUrl = $footerService['link_url'] ?: ($app_path . 'services/' . $footerService['slug']);
                                        } else {
                                            // Fallback to ID only if slug doesn't exist
                                            $serviceUrl = $footerService['link_url'] ?: ($app_path . 'service-details.php?id=' . $footerService['id']);
                                        }
                                ?>
                                <li><a href="<?= htmlspecialchars($serviceUrl) ?>"><?= htmlspecialchars($footerService['title']) ?></a></li>
                                <?php 
                                    endforeach;
                                else:
                                ?>
                                <li><a href="<?= $app_path ?>services/">View All Services</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Office Maps</h3>
                        <div class="footer-map">
                            <iframe title="office location map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3591.8548289188157!2d55.96524047540189!3d25.80836297732263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjXCsDQ4JzMwLjEiTiA1NcKwNTgnMDQuMSJF!5e0!3m2!1sen!2s!4v1769096041021!5m2!1sen!2s" width="200" height="180" style="border:0;" allowfullscreen="" loading="lazy" decoding="async" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> <?php echo date('Y'); ?> <a class="text-white" href="<?= $app_path ?>">Easy Plus</a>. All rights reserved by <a class="text-white" href="https://www.fiverr.com/vintagetech?source=gig_cards&referrer_gig_slug=set-up-and-optimize-your-osticket-helpdesk-system&ref_ctx_id=97ad2eebfe674249b06516be8e19690c&imp_id=ee7d7e61-a7e9-404f-a78d-da3d2de14d8a" target="_blank">Vintage Tech</a>.</p>
        </div>
    </div>
</footer><a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>
<script src="<?= $app_path ?>assets/js/vendor/jquery-3.6.0.min.js"></script>
<script>
// Mobile Menu Fix - Ensure navigation works and closes properly
jQuery(document).ready(function($) {
    var $menuWrapper = $('.vs-menu-wrapper');
    var $menuArea = $('.vs-menu-area');
    
    // Function to close menu
    function closeMobileMenu() {
        $menuWrapper.removeClass('vs-body-visible');
        $('body').css('overflow', '');
        $('html').css('overflow', '');
    }
    
    // Function to open menu
    function openMobileMenu() {
        $menuWrapper.addClass('vs-body-visible');
        $('body').css('overflow', 'hidden');
        $('html').css('overflow', 'hidden');
    }
    
    // Initialize mobile menu plugin first, but exclude close button from its handlers
    if ($menuWrapper.length > 0 && typeof $.fn.vsmobilemenu === 'function') {
        $menuWrapper.vsmobilemenu({
            menuToggleBtn: '.vs-menu-toggle:not(.mobile-menu-close):not([data-action="close-menu"])'
        });
    }
    
    // Immediately bind close button handler before plugin can interfere
    $('.mobile-menu-close, [data-action="close-menu"]').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        closeMobileMenu();
        return false;
    });
    
    // Also bind after a delay to override any plugin handlers
    setTimeout(function() {
        // Unbind any existing handlers from close button
        $('.mobile-menu-close, [data-action="close-menu"]').off('click.vsmobilemenu');
        
        // Bind our close handler with highest priority
        $('.mobile-menu-close, [data-action="close-menu"]').on('click.mobileclose', function(e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            closeMobileMenu();
            return false;
        });
    }, 300);
    
    // Handle toggle button in header (hamburger icon) - exclude close button
    $(document).on('click', '.sticky-wrapper .vs-menu-toggle:not(.mobile-menu-close):not([data-action="close-menu"]), .header .vs-menu-toggle:not(.mobile-menu-close):not([data-action="close-menu"])', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        if ($menuWrapper.hasClass('vs-body-visible')) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
        return false;
    });
    
    // Handle close button - Multiple selectors to ensure it works
    $(document).on('click', '.mobile-menu-close', function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        closeMobileMenu();
        return false;
    });
    
    $(document).on('click', '[data-action="close-menu"]', function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        closeMobileMenu();
        return false;
    });
    
    // Handle close button by checking if it's inside menu area
    $(document).on('click', '.vs-menu-area button.vs-menu-toggle', function(e) {
        if ($(this).hasClass('mobile-menu-close') || $(this).attr('data-action') === 'close-menu') {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            closeMobileMenu();
            return false;
        }
    });
    
    // Also handle clicks on the icon inside the close button
    $(document).on('click', '.mobile-menu-close i, [data-action="close-menu"] i', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).closest('button').trigger('click');
        closeMobileMenu();
        return false;
    });
    
    // Close menu when clicking on the dark overlay (outside menu area)
    $menuWrapper.on('click', function(e) {
        // Only close if clicking directly on the wrapper, not on menu area
        if ($(e.target).hasClass('vs-menu-wrapper') || $(e.target).is('.vs-menu-wrapper')) {
            closeMobileMenu();
        }
    });
    
    // Prevent menu area clicks from closing menu (except close button)
    $menuArea.on('click', function(e) {
        // Don't stop propagation for close button
        if (!$(e.target).closest('.vs-menu-toggle').length) {
            e.stopPropagation();
        }
    });
    
    // Close menu when clicking on a navigation link
    $(document).on('click', '.vs-mobile-menu a', function(e) {
        // Allow link to work normally, then close menu
        setTimeout(function() {
            closeMobileMenu();
        }, 100);
    });
    
    // Close menu on window resize to desktop
    $(window).on('resize', function() {
        if ($(window).width() > 991) {
            closeMobileMenu();
        }
    });
    
    // Close menu on ESC key press
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' || e.keyCode === 27) {
            closeMobileMenu();
        }
    });
});
</script>
<script src="<?= $app_path ?>assets/js/app.min.js" defer></script>
<script src="<?= $app_path ?>assets/js/layerslider.utils.js" defer></script>
<script src="<?= $app_path ?>assets/js/layerslider.transitions.js" defer></script>
<script src="<?= $app_path ?>assets/js/layerslider.kreaturamedia.jquery.js" defer></script>
<script src="<?= $app_path ?>assets/js/main.js" defer></script>
<script src="<?= $app_path ?>assets/js/hero-observer.js" defer></script>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</body>

</html>