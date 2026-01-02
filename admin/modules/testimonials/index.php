<?php
include("../../includes/header.php");
include("../../includes/functions.php");

// Handle status toggle and delete
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $id = intval($_POST['id'] ?? 0);
    
    if ($_POST['action'] == 'toggle_status' && $id > 0) {
        $query = "SELECT status FROM testimonials WHERE id = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $testimonial = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        
        $new_status = ($testimonial['status'] == 'active') ? 'inactive' : 'active';
        
        $query = "UPDATE testimonials SET status=? WHERE id=?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "si", $new_status, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_message'] = 'Testimonial status changed successfully!';
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Error changing testimonial status';
        }
        mysqli_stmt_close($stmt);
        header("Location: index.php");
        exit;
    }
}

// Check for success/error from save.php
if (isset($_GET['success'])) {
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_message'] = 'Testimonial saved successfully!';
}
if (isset($_GET['error'])) {
    $_SESSION['alert_type'] = 'error';
    $_SESSION['alert_message'] = 'Error saving testimonial. Please try again.';
}
if (isset($_GET['deleted'])) {
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_message'] = 'Testimonial deleted successfully!';
}

$testimonials = [];
$query = "SELECT * FROM testimonials ORDER BY sort_order ASC, id DESC";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $testimonials[] = $row;
}
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Testimonials Module</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Testimonials Module</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Manage Testimonials</h4>
            <a href="create.php" class="border-0 btn btn-custom py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                <span class="py-sm-1 d-block">
                    <i class="ri-add-line text-white"></i>
                    <span>Add New Testimonial</span>
                </span>
            </a>
        </div>

        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Sr No.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Position/Company</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Testimonial</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($testimonials)): ?>
                        <tr>
                            <td colspan="8" class="text-center">No testimonials found. <a href="create.php">Add your first testimonial</a></td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($testimonials as $index => $testimonial): ?>
                        <tr class="text-center">
                            <td><?= $index + 1 ?></td>
                            <td>
                                <?php if ($testimonial['client_image']): ?>
                                <?php $imgUrl = str_replace('/admin/', '/', $app_path) . 'assets/img/testimonial/' . htmlspecialchars($testimonial['client_image']); ?>
                                <img src="<?= $imgUrl ?>" alt="Client" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
                                <span class="text-muted" style="display: none;">No image</span>
                                <?php else: ?>
                                <span class="text-muted">No image</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($testimonial['client_name']) ?></td>
                            <td><?= htmlspecialchars($testimonial['client_position'] ?: 'N/A') ?><br><small class="text-muted"><?= htmlspecialchars($testimonial['client_company'] ?: '') ?></small></td>
                            <td>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="ri-star-<?= $i <= $testimonial['rating'] ? 'fill' : 'line' ?> text-warning"></i>
                                <?php endfor; ?>
                            </td>
                            <td><?= htmlspecialchars(substr($testimonial['testimonial'], 0, 80)) ?>...</td>
                            <td>
                                <span class="bg-<?= $testimonial['status'] == 'active' ? 'success' : 'danger' ?> bg-opacity-10 text-<?= $testimonial['status'] == 'active' ? 'success' : 'danger' ?> fs-13 fw-semibold py-1 px-2 rounded-1">
                                    <?= ucfirst($testimonial['status']) ?>
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <form method="post" action="index.php" style="display: inline;" class="status-toggle-form">
                                        <input type="hidden" name="action" value="toggle_status">
                                        <input type="hidden" name="id" value="<?= $testimonial['id'] ?>">
                                        <button type="submit" 
                                                class="btn btn-sm btn-<?= $testimonial['status'] == 'active' ? 'success' : 'secondary' ?>" 
                                                title="Toggle Status"
                                                data-status="<?= $testimonial['status'] ?>"
                                                data-item-name="this testimonial">
                                            <i data-feather="<?= $testimonial['status'] == 'active' ? 'check-circle' : 'x-circle' ?>"></i>
                                        </button>
                                    </form>
                                    <a href="edit.php?id=<?= $testimonial['id'] ?>" class="btn btn-sm btn-primary" title="Edit">
                                        <i data-feather="edit-3"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $testimonial['id'] ?>" 
                                       class="btn btn-sm btn-danger delete-link" 
                                       title="Delete"
                                       data-item-name="this testimonial">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("../../includes/sweetalert-common.php"); ?>
<?php include("../../includes/footer.php"); ?>

