<?php
include("../../includes/header.php");
include("../../includes/functions.php");

// Handle status toggle and delete
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $id = intval($_POST['id'] ?? 0);
    
    if ($_POST['action'] == 'toggle_status' && $id > 0) {
        $query = "SELECT status FROM gallery WHERE id = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $item = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        
        $new_status = ($item['status'] == 'active') ? 'inactive' : 'active';
        
        $query = "UPDATE gallery SET status=? WHERE id=?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "si", $new_status, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_message'] = 'Gallery item status changed successfully!';
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Error changing gallery item status';
        }
        mysqli_stmt_close($stmt);
        header("Location: index.php");
        exit;
    }
}

// Check for success/error from save.php
if (isset($_GET['success'])) {
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_message'] = 'Gallery item saved successfully!';
}
if (isset($_GET['error'])) {
    $_SESSION['alert_type'] = 'error';
    $_SESSION['alert_message'] = 'Error saving gallery item. Please try again.';
}
if (isset($_GET['deleted'])) {
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_message'] = 'Gallery item deleted successfully!';
}

$gallery = [];
$query = "SELECT * FROM gallery ORDER BY sort_order ASC, id DESC";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $gallery[] = $row;
}
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Gallery Module</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Gallery Module</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Manage Gallery</h4>
            <a href="create.php" class="border-0 btn btn-custom py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                <span class="py-sm-1 d-block">
                    <i class="ri-add-line text-white"></i>
                    <span>Add New Item</span>
                </span>
            </a>
        </div>

        <div class="row">
            <?php if (empty($gallery)): ?>
            <div class="col-12 text-center py-5">
                <p>No gallery items found. <a href="create.php">Add your first gallery item</a></p>
            </div>
            <?php else: ?>
            <?php foreach ($gallery as $index => $item): ?>
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="position-relative">
                        <?php if ($item['image']): ?>
                        <?php $imgUrl = str_replace('/admin/', '/', $app_path) . 'assets/img/gallery/' . htmlspecialchars($item['image']); ?>
                        <img src="<?= $imgUrl ?>" alt="<?= htmlspecialchars($item['title'] ?: 'Gallery Image') ?>" class="card-img-top" style="height: 200px; object-fit: cover;" onerror="this.src='<?= $app_path ?>assets/images/placeholder.jpg'">
                        <?php else: ?>
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="ri-image-line fs-1 text-muted"></i>
                        </div>
                        <?php endif; ?>
                        <span class="position-absolute top-0 end-0 m-2 bg-<?= $item['status'] == 'active' ? 'success' : 'danger' ?> bg-opacity-75 text-white px-2 py-1 rounded">
                            <?= ucfirst($item['status']) ?>
                        </span>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"><?= htmlspecialchars($item['title'] ?: 'Untitled') ?></h6>
                        <?php if ($item['category']): ?>
                        <p class="text-muted small mb-2"><i class="ri-folder-line"></i> <?= htmlspecialchars($item['category']) ?></p>
                        <?php endif; ?>
                        <div class="d-flex gap-2 justify-content-end">
                            <form method="post" action="index.php" style="display: inline;" class="status-toggle-form">
                                <input type="hidden" name="action" value="toggle_status">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" 
                                        class="btn btn-sm btn-<?= $item['status'] == 'active' ? 'success' : 'secondary' ?>" 
                                        title="Toggle Status"
                                        data-status="<?= $item['status'] ?>"
                                        data-item-name="this item">
                                    <i data-feather="<?= $item['status'] == 'active' ? 'check-circle' : 'x-circle' ?>"></i>
                                </button>
                            </form>
                            <a href="edit.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-primary" title="Edit">
                                <i data-feather="edit-3"></i>
                            </a>
                            <a href="delete.php?id=<?= $item['id'] ?>" 
                               class="btn btn-sm btn-danger delete-link" 
                               title="Delete"
                               data-item-name="this item">
                                <i data-feather="trash-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include("../../includes/sweetalert-common.php"); ?>
<?php include("../../includes/footer.php"); ?>

