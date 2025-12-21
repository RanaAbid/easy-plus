<?php
include("../../includes/header.php");
include("../../includes/functions.php");

// Handle inline edit/delete/status toggle
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $id = intval($_POST['id'] ?? 0);
    
    if ($_POST['action'] == 'toggle_status' && $id > 0) {
        // Get current status
        $query = "SELECT status FROM hero_sliders WHERE id = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $slider = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        
        $new_status = ($slider['status'] == 'active') ? 'inactive' : 'active';
        
        $query = "UPDATE hero_sliders SET status=? WHERE id=?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "si", $new_status, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_message'] = 'Slider status changed to ' . ucfirst($new_status) . ' successfully!';
            $_SESSION['alert_status'] = $new_status;
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Error changing slider status';
        }
        mysqli_stmt_close($stmt);
        header("Location: index.php");
        exit;
    }
    
    if ($_POST['action'] == 'update' && $id > 0) {
        $heading = sanitizeInput($_POST['heading'] ?? '');
        $tagline = sanitizeInput($_POST['tagline'] ?? '');
        $description = sanitizeInput($_POST['description'] ?? '');
        $alt_text = sanitizeInput($_POST['alt_text'] ?? '');
        $btn_title = sanitizeInput($_POST['btn_title'] ?? '');
        $btn_url = sanitizeInput($_POST['btn_url'] ?? '');
        $btn_title_2 = sanitizeInput($_POST['btn_title_2'] ?? '');
        $btn_url_2 = sanitizeInput($_POST['btn_url_2'] ?? '');
        $sort_order = intval($_POST['sort_order'] ?? 0);
        $status = sanitizeInput($_POST['status'] ?? 'active');
        
        // Get old status to check if it changed
        $oldQuery = "SELECT status FROM hero_sliders WHERE id = ?";
        $oldStmt = mysqli_prepare($link, $oldQuery);
        mysqli_stmt_bind_param($oldStmt, "i", $id);
        mysqli_stmt_execute($oldStmt);
        $oldResult = mysqli_stmt_get_result($oldStmt);
        $oldSlider = mysqli_fetch_assoc($oldResult);
        mysqli_stmt_close($oldStmt);
        
        $query = "UPDATE hero_sliders SET heading=?, tagline=?, description=?, alt_text=?, btn_title=?, btn_url=?, btn_title_2=?, btn_url_2=?, sort_order=?, status=? WHERE id=?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssisi", $heading, $tagline, $description, $alt_text, $btn_title, $btn_url, $btn_title_2, $btn_url_2, $sort_order, $status, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_message'] = 'Slider updated successfully!';
            if ($oldSlider && $oldSlider['status'] != $status) {
                $_SESSION['alert_status'] = $status;
            }
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Error updating slider';
        }
        mysqli_stmt_close($stmt);
        header("Location: index.php");
        exit;
    }
    
    if ($_POST['action'] == 'delete' && $id > 0) {
        // Get slider to delete images
        $query = "SELECT image_desktop, image_mobile FROM hero_sliders WHERE id = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $slider = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        
        // Delete from database
        $query = "DELETE FROM hero_sliders WHERE id = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        // Delete image files
        if ($slider) {
            if ($slider['image_desktop']) {
                $imgPath = $root_path . '../assets/img/hero/' . $slider['image_desktop'];
                if (file_exists($imgPath)) unlink($imgPath);
            }
            if ($slider['image_mobile']) {
                $imgPath = $root_path . '../assets/img/hero/' . $slider['image_mobile'];
                if (file_exists($imgPath)) unlink($imgPath);
            }
        }
        
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = 'Slider deleted successfully!';
        header("Location: index.php");
        exit;
    }
}

$sliders = getSliders($link, 'all');
$edit_id = isset($_GET['edit']) ? intval($_GET['edit']) : 0;
$edit_slider = null;

if ($edit_id > 0) {
    $edit_slider = getSliderById($link, $edit_id);
}

// Check for success/error from save.php
if (isset($_GET['success'])) {
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_message'] = 'Slider saved successfully!';
}
if (isset($_GET['error'])) {
    $_SESSION['alert_type'] = 'error';
    $_SESSION['alert_message'] = 'Error saving slider. Please try again.';
}
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Slider Module</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Slider Module</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Manage Sliders</h4>
            <a href="create.php" class="border-0 btn btn-custom py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                <span class="py-sm-1 d-block">
                    <i class="ri-add-line text-white"></i>
                    <span>Add New Slider</span>
                </span>
            </a>
        </div>

        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Sr No.</th>
                            <th scope="col">Image Preview</th>
                            <th scope="col">Heading</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($sliders)): ?>
                        <tr>
                            <td colspan="5" class="text-center">No sliders found. <a href="create.php">Add your first slider</a></td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($sliders as $index => $slider): ?>
                        <tr class="text-center" id="slider-row-<?= $slider['id'] ?>">
                            <?php if ($edit_id == $slider['id']): ?>
                            <!-- Edit Mode -->
                            <td colspan="5">
                                <form method="post" action="index.php" class="text-start">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="id" value="<?= $slider['id'] ?>">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Heading</label>
                                            <textarea name="heading" class="form-control" rows="2" required><?= htmlspecialchars($slider['heading']) ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Tagline</label>
                                            <textarea name="tagline" class="form-control" rows="2"><?= htmlspecialchars($slider['tagline']) ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($slider['description']) ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Button 1 Title</label>
                                            <input type="text" name="btn_title" class="form-control" value="<?= htmlspecialchars($slider['btn_title']) ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Button 1 URL</label>
                                            <input type="text" name="btn_url" class="form-control" value="<?= htmlspecialchars($slider['btn_url']) ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Button 2 Title</label>
                                            <input type="text" name="btn_title_2" class="form-control" value="<?= htmlspecialchars($slider['btn_title_2']) ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Button 2 URL</label>
                                            <input type="text" name="btn_url_2" class="form-control" value="<?= htmlspecialchars($slider['btn_url_2']) ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Alt Text</label>
                                            <input type="text" name="alt_text" class="form-control" value="<?= htmlspecialchars($slider['alt_text']) ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Sort Order</label>
                                            <input type="number" name="sort_order" class="form-control" value="<?= $slider['sort_order'] ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="active" <?= $slider['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                                <option value="inactive" <?= $slider['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 text-end">
                                            <a href="index.php" class="btn btn-secondary me-2">Cancel</a>
                                            <button type="submit" class="btn btn-custom text-white">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <?php else: ?>
                            <!-- View Mode -->
                            <td><?= $index + 1 ?></td>
                            <td>
                                <?php if ($slider['image_desktop']): ?>
                                <?php 
                                // Fix image path - remove admin from path
                                $imageUrl = str_replace('/admin/', '/', $app_path) . 'assets/img/hero/' . htmlspecialchars($slider['image_desktop']);
                                ?>
                                <img src="<?= $imageUrl ?>" 
                                     alt="Slider" 
                                     style="width: 100px; height: 50px; object-fit: cover; border-radius: 4px;"
                                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'50\'%3E%3Crect fill=\'%23ddd\' width=\'100\' height=\'50\'/%3E%3Ctext fill=\'%23999\' x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\'%3ENo Image%3C/text%3E%3C/svg%3E'">
                                <?php else: ?>
                                <span class="text-muted">No image</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars(substr($slider['heading'], 0, 50)) ?><?= strlen($slider['heading']) > 50 ? '...' : '' ?></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <span class="bg-<?= $slider['status'] == 'active' ? 'success' : 'danger' ?> bg-opacity-10 text-<?= $slider['status'] == 'active' ? 'success' : 'danger' ?> fs-13 fw-semibold py-1 px-2 rounded-1">
                                        <?= ucfirst($slider['status']) ?>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <form method="post" action="index.php" style="display: inline;" class="status-toggle-form">
                                        <input type="hidden" name="action" value="toggle_status">
                                        <input type="hidden" name="id" value="<?= $slider['id'] ?>">
                                        <button type="submit" 
                                                class="btn btn-sm btn-<?= $slider['status'] == 'active' ? 'success' : 'secondary' ?>" 
                                                title="Toggle Status"
                                                data-status="<?= $slider['status'] ?>"
                                                data-item-name="this slider">
                                            <i data-feather="<?= $slider['status'] == 'active' ? 'check-circle' : 'x-circle' ?>"></i>
                                        </button>
                                    </form>
                                    <a href="index.php?edit=<?= $slider['id'] ?>" class="btn btn-sm btn-primary" title="Edit">
                                        <i data-feather="edit-3"></i>
                                    </a>
                                    <form method="post" action="index.php" style="display: inline;" class="delete-form" data-item-name="this slider">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $slider['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <?php endif; ?>
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
