<?php
include("../../includes/header.php");
include("../../includes/functions.php");

// Check for success/error from save.php
if (isset($_GET['success'])) {
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_message'] = 'About section saved successfully!';
}
if (isset($_GET['error'])) {
    $_SESSION['alert_type'] = 'error';
    $_SESSION['alert_message'] = 'Error saving about section. Please try again.';
}

$about = getAboutSection($link);
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">About Section</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">About Section</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Manage About Section</h4>
            <a href="edit.php<?= $about ? '?id=' . $about['id'] : '' ?>" class="border-0 btn btn-custom py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                <span class="py-sm-1 d-block">
                    <i class="ri-edit-line text-white"></i>
                    <span><?= $about ? 'Edit' : 'Create' ?> About Section</span>
                </span>
            </a>
        </div>

        <?php if ($about): ?>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Subtitle:</strong> <?= htmlspecialchars($about['subtitle']) ?>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Title:</strong> <?= htmlspecialchars($about['title']) ?>
            </div>
            <div class="col-12 mb-3">
                <strong>Description:</strong> <?= htmlspecialchars($about['description']) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?php if ($about['image_1']): ?>
                <img src="<?= $app_path ?>../assets/img/about/<?= htmlspecialchars($about['image_1']) ?>" alt="Image 1" style="max-width: 200px;">
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <?php if ($about['image_2']): ?>
                <img src="<?= $app_path ?>../assets/img/about/<?= htmlspecialchars($about['image_2']) ?>" alt="Image 2" style="max-width: 200px;">
                <?php endif; ?>
            </div>
            <div class="col-12">
                <strong>Status:</strong> 
                <span class="badge bg-<?= $about['status'] == 'active' ? 'success' : 'danger' ?>">
                    <?= ucfirst($about['status']) ?>
                </span>
            </div>
        </div>
        <?php else: ?>
        <div class="alert alert-info">
            No about section found. <a href="edit.php">Create one now</a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php include("../../includes/sweetalert-common.php"); ?>
<?php include("../../includes/footer.php"); ?>

