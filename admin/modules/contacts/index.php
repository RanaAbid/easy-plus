<?php
include("../../includes/header.php");
include("../../includes/functions.php");

// Handle status update and delete
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $id = intval($_POST['id'] ?? 0);
    
    if ($_POST['action'] == 'update_status' && $id > 0) {
        $status = sanitizeInput($_POST['status'] ?? 'new');
        $query = "UPDATE contact_inquiries SET status=? WHERE id=?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "si", $status, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_message'] = 'Inquiry status updated successfully!';
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Error updating inquiry status';
        }
        mysqli_stmt_close($stmt);
        header("Location: index.php");
        exit;
    }
}

// Check for success/error messages
if (isset($_GET['deleted'])) {
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_message'] = 'Inquiry deleted successfully!';
}

// Get filter parameters
$status_filter = $_GET['status'] ?? 'all';
$search = $_GET['search'] ?? '';

// Build query
$where = [];
$params = [];
$types = '';

if ($status_filter != 'all') {
    $where[] = "status = ?";
    $params[] = $status_filter;
    $types .= 's';
}

if ($search) {
    $where[] = "(name LIKE ? OR email LIKE ? OR subject LIKE ? OR message LIKE ?)";
    $search_param = "%$search%";
    $params[] = $search_param;
    $params[] = $search_param;
    $params[] = $search_param;
    $params[] = $search_param;
    $types .= 'ssss';
}

$where_clause = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';

$query = "SELECT * FROM contact_inquiries $where_clause ORDER BY created_at DESC";
$inquiries = [];

if (!empty($params)) {
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, $types, ...$params);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $result = mysqli_query($link, $query);
}

while ($row = mysqli_fetch_assoc($result)) {
    $inquiries[] = $row;
}

if (!empty($params)) {
    mysqli_stmt_close($stmt);
}

// Get counts
$counts_query = "SELECT status, COUNT(*) as count FROM contact_inquiries GROUP BY status";
$counts_result = mysqli_query($link, $counts_query);
$status_counts = ['new' => 0, 'read' => 0, 'replied' => 0, 'archived' => 0];
while ($row = mysqli_fetch_assoc($counts_result)) {
    $status_counts[$row['status']] = $row['count'];
}
$total_count = array_sum($status_counts);
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Contact Inquiries</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Contact Inquiries</span>
        </li>
    </ul>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-white border-0 rounded-10">
            <div class="card-body text-center">
                <h5 class="text-muted">Total</h5>
                <h3 class="mb-0"><?= $total_count ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-white border-0 rounded-10">
            <div class="card-body text-center">
                <h5 class="text-muted">New</h5>
                <h3 class="mb-0 text-primary"><?= $status_counts['new'] ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-white border-0 rounded-10">
            <div class="card-body text-center">
                <h5 class="text-muted">Read</h5>
                <h3 class="mb-0 text-info"><?= $status_counts['read'] ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-white border-0 rounded-10">
            <div class="card-body text-center">
                <h5 class="text-muted">Replied</h5>
                <h3 class="mb-0 text-success"><?= $status_counts['replied'] ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Manage Inquiries</h4>
        </div>

        <!-- Filters -->
        <div class="row mb-4">
            <div class="col-md-6">
                <form method="get" action="index.php" class="d-flex gap-2">
                    <select name="status" class="form-control">
                        <option value="all" <?= $status_filter == 'all' ? 'selected' : '' ?>>All Status</option>
                        <option value="new" <?= $status_filter == 'new' ? 'selected' : '' ?>>New</option>
                        <option value="read" <?= $status_filter == 'read' ? 'selected' : '' ?>>Read</option>
                        <option value="replied" <?= $status_filter == 'replied' ? 'selected' : '' ?>>Replied</option>
                        <option value="archived" <?= $status_filter == 'archived' ? 'selected' : '' ?>>Archived</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
            <div class="col-md-6">
                <form method="get" action="index.php" class="d-flex gap-2">
                    <input type="hidden" name="status" value="<?= htmlspecialchars($status_filter) ?>">
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Sr No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($inquiries)): ?>
                        <tr>
                            <td colspan="8" class="text-center">No inquiries found.</td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($inquiries as $index => $inquiry): ?>
                        <tr class="text-center">
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($inquiry['name']) ?></td>
                            <td><a href="mailto:<?= htmlspecialchars($inquiry['email']) ?>"><?= htmlspecialchars($inquiry['email']) ?></a></td>
                            <td><?= htmlspecialchars($inquiry['phone'] ?: 'N/A') ?></td>
                            <td><?= htmlspecialchars($inquiry['subject'] ?: 'N/A') ?></td>
                            <td>
                                <span class="bg-<?= $inquiry['status'] == 'new' ? 'primary' : ($inquiry['status'] == 'read' ? 'info' : ($inquiry['status'] == 'replied' ? 'success' : 'secondary')) ?> bg-opacity-10 text-<?= $inquiry['status'] == 'new' ? 'primary' : ($inquiry['status'] == 'read' ? 'info' : ($inquiry['status'] == 'replied' ? 'success' : 'secondary')) ?> fs-13 fw-semibold py-1 px-2 rounded-1">
                                    <?= ucfirst($inquiry['status']) ?>
                                </span>
                            </td>
                            <td><?= date('M d, Y H:i', strtotime($inquiry['created_at'])) ?></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="view.php?id=<?= $inquiry['id'] ?>" class="btn btn-sm btn-info" title="View">
                                        <i data-feather="eye"></i>
                                    </a>
                                    <form method="post" action="index.php" style="display: inline;">
                                        <input type="hidden" name="action" value="update_status">
                                        <input type="hidden" name="id" value="<?= $inquiry['id'] ?>">
                                        <select name="status" class="form-control form-control-sm" onchange="this.form.submit()" style="width: auto; display: inline-block;">
                                            <option value="new" <?= $inquiry['status'] == 'new' ? 'selected' : '' ?>>New</option>
                                            <option value="read" <?= $inquiry['status'] == 'read' ? 'selected' : '' ?>>Read</option>
                                            <option value="replied" <?= $inquiry['status'] == 'replied' ? 'selected' : '' ?>>Replied</option>
                                            <option value="archived" <?= $inquiry['status'] == 'archived' ? 'selected' : '' ?>>Archived</option>
                                        </select>
                                    </form>
                                    <a href="delete.php?id=<?= $inquiry['id'] ?>" 
                                       class="btn btn-sm btn-danger delete-link" 
                                       title="Delete"
                                       data-item-name="this inquiry">
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

