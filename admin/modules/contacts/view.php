<?php
include("../../includes/header.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);
$inquiry = null;

if ($id > 0) {
    $query = "SELECT * FROM contact_inquiries WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $inquiry = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    // Mark as read if status is new
    if ($inquiry && $inquiry['status'] == 'new') {
        $update_query = "UPDATE contact_inquiries SET status = 'read' WHERE id = ?";
        $update_stmt = mysqli_prepare($link, $update_query);
        mysqli_stmt_bind_param($update_stmt, "i", $id);
        mysqli_stmt_execute($update_stmt);
        mysqli_stmt_close($update_stmt);
        $inquiry['status'] = 'read';
    }
}

if (!$inquiry) {
    header("Location: index.php");
    exit;
}
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">View Inquiry</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">View Inquiry</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Inquiry Details</h4>
            <a href="index.php" class="btn btn-dark fw-semibold text-white py-2 px-4 mt-2 me-2">
                <span class="py-sm-1 d-block">
                    <i data-feather="arrow-left" class="text-white"></i>
                    <span>Back</span>
                </span>
            </a>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="fw-semibold text-muted">Name:</label>
                <p class="fs-16"><?= htmlspecialchars($inquiry['name']) ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold text-muted">Email:</label>
                <p class="fs-16"><a href="mailto:<?= htmlspecialchars($inquiry['email']) ?>"><?= htmlspecialchars($inquiry['email']) ?></a></p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold text-muted">Phone:</label>
                <p class="fs-16"><?= htmlspecialchars($inquiry['phone'] ?: 'N/A') ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold text-muted">Subject:</label>
                <p class="fs-16"><?= htmlspecialchars($inquiry['subject'] ?: 'N/A') ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold text-muted">Status:</label>
                <p class="fs-16">
                    <span class="bg-<?= $inquiry['status'] == 'new' ? 'primary' : ($inquiry['status'] == 'read' ? 'info' : ($inquiry['status'] == 'replied' ? 'success' : 'secondary')) ?> bg-opacity-10 text-<?= $inquiry['status'] == 'new' ? 'primary' : ($inquiry['status'] == 'read' ? 'info' : ($inquiry['status'] == 'replied' ? 'success' : 'secondary')) ?> fs-13 fw-semibold py-1 px-2 rounded-1">
                        <?= ucfirst($inquiry['status']) ?>
                    </span>
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold text-muted">Date:</label>
                <p class="fs-16"><?= date('F d, Y h:i A', strtotime($inquiry['created_at'])) ?></p>
            </div>
            <div class="col-12 mb-3">
                <label class="fw-semibold text-muted">Message:</label>
                <div class="p-3 bg-light rounded">
                    <p class="mb-0"><?= nl2br(htmlspecialchars($inquiry['message'])) ?></p>
                </div>
            </div>
            <?php if ($inquiry['ip_address']): ?>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold text-muted">IP Address:</label>
                <p class="fs-16"><?= htmlspecialchars($inquiry['ip_address']) ?></p>
            </div>
            <?php endif; ?>
        </div>

        <div class="mt-4">
            <form method="post" action="index.php" class="d-inline">
                <input type="hidden" name="action" value="update_status">
                <input type="hidden" name="id" value="<?= $inquiry['id'] ?>">
                <label class="fw-semibold me-2">Update Status:</label>
                <select name="status" class="form-control d-inline-block" style="width: auto;" onchange="this.form.submit()">
                    <option value="new" <?= $inquiry['status'] == 'new' ? 'selected' : '' ?>>New</option>
                    <option value="read" <?= $inquiry['status'] == 'read' ? 'selected' : '' ?>>Read</option>
                    <option value="replied" <?= $inquiry['status'] == 'replied' ? 'selected' : '' ?>>Replied</option>
                    <option value="archived" <?= $inquiry['status'] == 'archived' ? 'selected' : '' ?>>Archived</option>
                </select>
            </form>
            <a href="mailto:<?= htmlspecialchars($inquiry['email']) ?>?subject=Re: <?= urlencode($inquiry['subject'] ?: 'Inquiry') ?>" class="btn btn-primary ms-3">
                <i data-feather="mail"></i> Reply via Email
            </a>
        </div>
    </div>
</div>

<?php include("../../includes/footer.php"); ?>

