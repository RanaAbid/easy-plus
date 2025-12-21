<?php
include("../../includes/header.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);
$feature = null;

if ($id > 0) {
    $query = "SELECT * FROM features WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $feature = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

if (!$feature) {
    header("Location: index.php");
    exit;
}
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Edit Feature</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Edit Feature</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Edit Feature</h4>
            <a href="index.php" class="btn btn-dark fw-semibold text-white py-2 px-4 mt-2 me-2">
                <span class="py-sm-1 d-block">
                    <i data-feather="arrow-left" class="text-white"></i>
                    <span>Back</span>
                </span>
            </a>
        </div>

        <form action="save.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $feature['id'] ?>">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_title" class="label">Title</label>
                        <input id="txt_title" name="txt_title" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter feature title" value="<?= htmlspecialchars($feature['title']) ?>" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_icon" class="label">Icon Image</label>
                        <?php if ($feature['icon']): ?>
                        <div class="mb-2" id="current_icon_container">
                            <?php $iconUrl = str_replace('/admin/', '/', $app_path) . 'assets/img/icon/' . htmlspecialchars($feature['icon']); ?>
                            <img src="<?= $iconUrl ?>" alt="Current icon" id="current_icon_img" style="max-width: 64px; max-height: 64px;" onerror="this.style.display='none';">
                            <p class="text-muted small">Current icon</p>
                        </div>
                        <?php endif; ?>
                        <div class="form-control h-100 text-center position-relative p-4 p-lg-5" style="min-height: 200px;">
                            <div class="product-upload">
                                <label for="txt_icon" class="file-upload mb-0" style="cursor: pointer;">
                                    <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                    <span class="d-block fw-semibold text-body"><?= $feature['icon'] ? 'Change icon' : 'Drop files here or click to upload.' ?></span>
                                </label>
                                <input id="txt_icon" name="txt_icon" type="file" accept="image/*" style="display: none;">
                            </div>
                            <div id="icon_preview" class="mt-3" style="display: none;">
                                <p class="text-info small">New icon preview:</p>
                                <img id="icon_preview_img" src="" alt="Icon Preview" style="max-width: 100%; max-height: 150px; border-radius: 8px; border: 2px solid #ddd;">
                                <p class="mt-2 text-success"><i class="ri-checkbox-circle-line"></i> New icon selected</p>
                            </div>
                            <small class="text-muted fw-bold d-block mt-2">Icon image: Recommended 64 × 64 px (PNG format)</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_description" class="label">Description</label>
                        <textarea id="txt_description" name="txt_description" class="form-control ps-5 text-dark" rows="4" placeholder="Enter feature description" required><?= htmlspecialchars($feature['description']) ?></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_link_url" class="label">Link URL</label>
                        <input id="txt_link_url" name="txt_link_url" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter link URL (optional)" value="<?= htmlspecialchars($feature['link_url']) ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_link_text" class="label">Link Text</label>
                        <input id="txt_link_text" name="txt_link_text" type="text" class="form-control text-dark ps-5 h-58" placeholder="Read More" value="<?= htmlspecialchars($feature['link_text']) ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_sort_order" class="label">Sort Order</label>
                        <input id="txt_sort_order" name="txt_sort_order" type="number" class="form-control text-dark ps-5 h-58" value="<?= $feature['sort_order'] ?>" min="0">
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_status" class="label">Status</label>
                        <select id="txt_status" name="txt_status" class="form-control text-dark ps-5 h-58">
                            <option value="active" <?= $feature['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= $feature['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 text-end">
                    <button type="submit" class="border-0 btn btn-custom py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                        <span class="py-sm-1 d-block">
                            <span>Update</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconInput = document.getElementById('txt_icon');
    const iconPreview = document.getElementById('icon_preview');
    const iconPreviewImg = document.getElementById('icon_preview_img');
    const currentIconContainer = document.getElementById('current_icon_container');
    
    if (iconInput && iconPreview && iconPreviewImg) {
        iconInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (!file.type.match('image.*')) {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid File',
                            text: 'Please select an image file.',
                            timer: 2000,
                            toast: true,
                            position: 'top-end'
                        });
                    }
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(event) {
                    iconPreviewImg.src = event.target.result;
                    iconPreview.style.display = 'block';
                    if (currentIconContainer) {
                        currentIconContainer.style.display = 'none';
                    }
                };
                reader.onerror = function() {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to load image preview.',
                            timer: 2000,
                            toast: true,
                            position: 'top-end'
                        });
                    }
                };
                reader.readAsDataURL(file);
            } else {
                iconPreview.style.display = 'none';
            }
        });
    }
    
    const iconLabel = document.querySelector('label[for="txt_icon"]');
    if (iconLabel && iconInput) {
        iconLabel.addEventListener('click', function(e) {
            e.preventDefault();
            iconInput.click();
        });
    }
});
</script>

<?php include("../../includes/footer.php"); ?>

