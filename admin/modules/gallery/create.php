<?php
include("../../includes/header.php");
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Add Gallery Item</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Add Gallery Item</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Add Gallery Item</h4>
            <a href="index.php" class="btn btn-dark fw-semibold text-white py-2 px-4 mt-2 me-2">
                <span class="py-sm-1 d-block">
                    <i data-feather="arrow-left" class="text-white"></i>
                    <span>Back</span>
                </span>
            </a>
        </div>

        <form action="save.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_title" class="label">Title</label>
                        <input id="txt_title" name="txt_title" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter title">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_category" class="label">Category</label>
                        <input id="txt_category" name="txt_category" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter category">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_description" class="label">Description</label>
                        <textarea id="txt_description" name="txt_description" class="form-control ps-5 text-dark" rows="3" placeholder="Enter description"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_image" class="label">Image *</label>
                        <div class="form-control h-100 text-center position-relative p-4 p-lg-5" style="min-height: 300px;">
                            <div class="product-upload">
                                <label for="txt_image" class="file-upload mb-0" style="cursor: pointer;">
                                    <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                    <span class="d-block fw-semibold text-body">Drop files here or click to upload.</span>
                                </label>
                                <input id="txt_image" name="txt_image" type="file" accept="image/*" style="display: none;" required>
                            </div>
                            <div id="image_preview" class="mt-3" style="display: none;">
                                <img id="image_preview_img" src="" alt="Image Preview" style="max-width: 100%; max-height: 250px; border-radius: 8px; border: 2px solid #ddd;">
                                <p class="mt-2 text-success"><i class="ri-checkbox-circle-line"></i> Image selected</p>
                            </div>
                            <small class="text-danger fw-bold d-block mt-2"><strong>Required:</strong> Image must be at least <strong>800 × 600 px</strong> (larger recommended)</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_sort_order" class="label">Sort Order</label>
                        <input id="txt_sort_order" name="txt_sort_order" type="number" class="form-control text-dark ps-5 h-58" value="0" min="0">
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_status" class="label">Status</label>
                        <select id="txt_status" name="txt_status" class="form-control text-dark ps-5 h-58">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 text-end">
                    <button type="submit" class="border-0 btn btn-custom py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                        <span class="py-sm-1 d-block">
                            <span>Save</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('txt_image');
    const imagePreview = document.getElementById('image_preview');
    const imagePreviewImg = document.getElementById('image_preview_img');
    
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
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        });
    }
    
    const imageLabel = document.querySelector('label[for="txt_image"]');
    if (imageLabel && imageInput) {
        imageLabel.addEventListener('click', function(e) {
            e.preventDefault();
            imageInput.click();
        });
    }
});
</script>

<?php include("../../includes/footer.php"); ?>

