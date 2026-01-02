
            <div class="flex-grow-1"></div>

            <footer class="footer-area bg-white text-center rounded-top-10">
                <p class="fs-14">© <span class="text-primary">Easy Plus Admin</span> is Proudly Owned by <a href="https://www.fiverr.com/vintagetech?source=gig_cards&referrer_gig_slug=set-up-and-optimize-your-osticket-helpdesk-system&ref_ctx_id=97ad2eebfe674249b06516be8e19690c&imp_id=ee7d7e61-a7e9-404f-a78d-da3d2de14d8a" target="_blank" class="text-decoration-none">Vintage Tech</a></p>
            </footer>

        </div>
    </div>
    <script src="<?=$app_path?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=$app_path?>assets/js/sidebar-menu.js"></script>
    <script src="<?=$app_path?>assets/js/custom/sidebar-guards.js"></script>
    <script src="<?=$app_path?>assets/js/dragdrop.js"></script>
    <script src="<?=$app_path?>assets/js/rangeslider.min.js"></script>
    <script src="<?=$app_path?>assets/js/sweetalert.js"></script>
    <script src="<?=$app_path?>assets/js/quill.min.js"></script>
    <script src="<?=$app_path?>assets/js/data-table.js"></script>
    <script src="<?=$app_path?>assets/js/prism.js"></script>
    <script src="<?=$app_path?>assets/js/clipboard.min.js"></script>
    <script src="<?=$app_path?>assets/js/feather.min.js"></script>
    <script src="<?=$app_path?>assets/js/simplebar.min.js"></script>
    <script src="<?=$app_path?>assets/js/apexcharts.min.js"></script>
    <script src="<?=$app_path?>assets/js/custom/project-management.js"></script>
    <script src="<?=$app_path?>assets/js/custom/custom.js"></script>
    
    <script>
    // Global Toaster/Alert Handler - Works across all admin pages
    document.addEventListener('DOMContentLoaded', function() {
        // Check for session alerts (if sweetalert-common.php is not included)
        <?php if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])): ?>
        <?php if (!defined('SWEETALERT_INCLUDED')): ?>
        const alertType = '<?= $_SESSION['alert_type'] ?>';
        const alertMessage = '<?= addslashes($_SESSION['alert_message']) ?>';
        const alertStatus = '<?= $_SESSION['alert_status'] ?? '' ?>';
        
        let icon = 'success';
        let title = 'Success!';
        let text = alertMessage;
        
        if (alertType === 'error') {
            icon = 'error';
            title = 'Error!';
        } else if (alertType === 'success') {
            if (alertStatus === 'active') {
                icon = 'success';
                title = 'Activated!';
                text = alertMessage || 'Item has been activated successfully!';
            } else if (alertStatus === 'inactive') {
                icon = 'info';
                title = 'Deactivated!';
                text = alertMessage || 'Item has been deactivated successfully!';
            }
        }
        
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: icon,
                title: title,
                text: text,
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        }
        
        <?php 
        unset($_SESSION['alert_type']);
        unset($_SESSION['alert_message']);
        unset($_SESSION['alert_status']);
        ?>
        <?php endif; ?>
        <?php endif; ?>
        
        // Highlight active menu item based on current URL
        const currentPath = window.location.pathname;
        const menuLinks = document.querySelectorAll('#layout-menu .menu-link');
        
        menuLinks.forEach(function(link) {
            const href = link.getAttribute('href');
            if (href && currentPath.includes(href.replace('<?= $app_path ?>', ''))) {
                link.classList.add('active');
                const menuItem = link.closest('.menu-item');
                if (menuItem) {
                    menuItem.classList.add('active');
                }
            }
        });
        
        // Initialize feather icons for dynamically added elements
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
        
        // Global error handler for AJAX requests
        if (typeof jQuery !== 'undefined') {
            jQuery(document).ajaxError(function(event, jqXHR, ajaxSettings, thrownError) {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Request Error',
                        text: 'An error occurred while processing your request. Please try again.',
                        timer: 3000,
                        toast: true,
                        position: 'top-end'
                    });
                }
            });
        }
    });
    </script>
</body>

</html>