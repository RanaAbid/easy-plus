<?php
// Common SweetAlert JavaScript for all admin modules
// Include this file before closing body tag in module index pages
?>
<script>
// SweetAlert notifications - Common for all modules
document.addEventListener('DOMContentLoaded', function() {
    <?php if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])): ?>
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
    
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
        timer: 3000,
        showConfirmButton: false,
        toast: true,
        position: 'top-end'
    });
    
    <?php 
    unset($_SESSION['alert_type']);
    unset($_SESSION['alert_message']);
    unset($_SESSION['alert_status']);
    ?>
    <?php endif; ?>
    
    // Status toggle with confirmation - Common handler
    document.querySelectorAll('.status-toggle-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = form.querySelector('button[type="submit"]');
            const currentStatus = button.getAttribute('data-status');
            const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
            const statusText = newStatus === 'active' ? 'activate' : 'deactivate';
            const itemName = button.getAttribute('data-item-name') || 'this item';
            
            Swal.fire({
                title: 'Change Status?',
                text: `Are you sure you want to ${statusText} ${itemName}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, ' + statusText + ' it!',
                cancelButtonText: 'Cancel',
                confirmButtonColor: newStatus === 'active' ? '#10b981' : '#6b7280'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
    
    // Delete confirmation with SweetAlert - Common handler
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const itemName = form.getAttribute('data-item-name') || 'this item';
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You won't be able to revert this! ${itemName} will be permanently deleted.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleting...',
                        text: 'Please wait',
                        icon: 'info',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    form.submit();
                }
            });
        });
    });
    
    // Initialize Feather icons after page load
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
    
    // Delete link confirmation
    document.querySelectorAll('.delete-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const itemName = link.getAttribute('data-item-name') || 'this item';
            const href = link.getAttribute('href');
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You won't be able to revert this! ${itemName} will be permanently deleted.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        });
    });
});
</script>

