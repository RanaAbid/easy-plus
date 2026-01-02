<?php
include("../../includes/header.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);
$testimonial = null;

if ($id > 0) {
    $query = "SELECT * FROM testimonials WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $testimonial = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

if (!$testimonial) {
    header("Location: index.php");
    exit;
}
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Edit Testimonial</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Edit Testimonial</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Edit Testimonial</h4>
            <a href="index.php" class="btn btn-dark fw-semibold text-white py-2 px-4 mt-2 me-2">
                <span class="py-sm-1 d-block">
                    <i data-feather="arrow-left" class="text-white"></i>
                    <span>Back</span>
                </span>
            </a>
        </div>

        <form action="save.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $testimonial['id'] ?>">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_client_name" class="label">Client Name *</label>
                        <input id="txt_client_name" name="txt_client_name" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter client name" value="<?= htmlspecialchars($testimonial['client_name']) ?>" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_client_position" class="label">Position</label>
                        <input id="txt_client_position" name="txt_client_position" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter position" value="<?= htmlspecialchars($testimonial['client_position']) ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_client_company" class="label">Company</label>
                        <input id="txt_client_company" name="txt_client_company" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter company name" value="<?= htmlspecialchars($testimonial['client_company']) ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_rating" class="label">Rating (1-5) *</label>
                        <select id="txt_rating" name="txt_rating" class="form-control text-dark ps-5 h-58" required>
                            <?php for ($i = 5; $i >= 1; $i--): ?>
                            <option value="<?= $i ?>" <?= $testimonial['rating'] == $i ? 'selected' : '' ?>><?= $i ?> Star<?= $i > 1 ? 's' : '' ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_testimonial" class="label">Testimonial *</label>
                        <textarea id="txt_testimonial" name="txt_testimonial" class="form-control ps-5 text-dark" rows="5" placeholder="Enter testimonial text" required><?= htmlspecialchars($testimonial['testimonial']) ?></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_client_image" class="label">Client Image</label>
                        <?php if ($testimonial['client_image']): ?>
                        <div class="mb-2" id="current_image_container">
                            <?php $imgUrl = str_replace('/admin/', '/', $app_path) . 'assets/img/testimonial/' . htmlspecialchars($testimonial['client_image']); ?>
                            <img src="<?= $imgUrl ?>" alt="Current image" id="current_image_img" style="max-width: 150px; max-height: 150px; border-radius: 50%;" onerror="this.style.display='none';">
                            <p class="text-muted small">Current image</p>
                        </div>
                        <?php endif; ?>
                        <div class="form-control h-100 text-center position-relative p-4 p-lg-5" style="min-height: 200px;">
                            <div class="product-upload">
                                <label for="txt_client_image" class="file-upload mb-0" style="cursor: pointer;">
                                    <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                    <span class="d-block fw-semibold text-body"><?= $testimonial['client_image'] ? 'Change image' : 'Drop files here or click to upload.' ?></span>
                                </label>
                                <input id="txt_client_image" name="txt_client_image" type="file" accept="image/*" style="display: none;">
                            </div>
                            <div id="image_preview" class="mt-3" style="display: none;">
                                <p class="text-info small">New image preview:</p>
                                <img id="image_preview_img" src="" alt="Image Preview" style="max-width: 100%; max-height: 150px; border-radius: 8px; border: 2px solid #ddd;">
                                <p class="mt-2 text-success"><i class="ri-checkbox-circle-line"></i> New image selected</p>
                            </div>
                            <small class="text-danger fw-bold d-block mt-2"><strong>Required:</strong> Image must be exactly <strong>200 × 200 px</strong> (Square image)</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_sort_order" class="label">Sort Order</label>
                        <input id="txt_sort_order" name="txt_sort_order" type="number" class="form-control text-dark ps-5 h-58" value="<?= $testimonial['sort_order'] ?>" min="0">
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>
                    <div class="form-group mb-4">
                        <label for="txt_status" class="label">Status</label>
                        <select id="txt_status" name="txt_status" class="form-control text-dark ps-5 h-58">
                            <option value="active" <?= $testimonial['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= $testimonial['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
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
    const imageInput = document.getElementById('txt_client_image');
    const imagePreview = document.getElementById('image_preview');
    const imagePreviewImg = document.getElementById('image_preview_img');
    const currentImageContainer = document.getElementById('current_image_container');
    
    if (imageInput && imagePreview && imagePreviewImg) {
        imageInput.addEventListener('change', function(e) {
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
                    imagePreviewImg.src = event.target.result;
                    imagePreview.style.display = 'block';
                    if (currentImageContainer) {
                        currentImageContainer.style.display = 'none';
                    }
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        });
    }
    
    const imageLabel = document.querySelector('label[for="txt_client_image"]');
    if (imageLabel && imageInput) {
        imageLabel.addEventListener('click', function(e) {
            e.preventDefault();
            imageInput.click();
        });
    }
});
</script>

<?php include("../../includes/footer.php"); ?>

