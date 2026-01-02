<?php
include("../../includes/header.php");
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Add Slider</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Add Slider</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Add Slider</h4>
            <a href="index.php" class="btn btn-dark fw-semibold text-white py-2 px-4 mt-2 me-2">
                <span class="py-sm-1 d-block">
                    <i data-feather="arrow-left" class="text-white"></i>
                    <span>Back</span>
                </span>
            </a>
        </div>

        <form action="save.php" method="post" enctype="multipart/form-data" id="sliderForm">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_heading" class="label">Heading</label>
                        <div class="form-group position-relative">
                            <textarea id="txt_heading" name="txt_heading" class="form-control ps-5 text-dark" placeholder="Some demo text ... " required></textarea>
                        </div>
                        <small class="text-muted fw-bold">
                            Max 3 words (e.g., TOP IT SUPPORT & MANAGEMENT)
                        </small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_tagline" class="label">Tag Line Heading</label>
                        <div class="form-group position-relative">
                            <textarea id="txt_tagline" name="txt_tagline" class="form-control ps-5 text-dark" placeholder="Some demo text ... "></textarea>
                        </div>
                        <small class="text-muted fw-bold">
                            Max 3 words (e.g., HIGHLY QUALIFIED ENGINEERS)
                        </small>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_description" class="label">Description</label>
                        <textarea id="txt_description" name="txt_description" class="form-control ps-5 text-dark" rows="3" placeholder="Enter description"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_image_desktop" class="label">Desktop/Laptop Slider Image</label>
                        <div class="form-control h-100 text-center position-relative p-4 p-lg-5" style="min-height: 200px;">
                            <div class="product-upload">
                                <label for="txt_image_desktop" class="file-upload mb-0" style="cursor: pointer;">
                                    <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                    <span class="d-block fw-semibold text-body">Drop files here or click to upload.</span>
                                </label>
                                <input id="txt_image_desktop" name="txt_image_desktop" type="file" accept="image/*" style="display: none;">
                            </div>
                            <div id="desktop_preview" class="mt-3" style="display: none;">
                                <img id="desktop_preview_img" src="" alt="Desktop Preview" style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid #ddd;">
                                <p class="mt-2 text-success"><i class="ri-checkbox-circle-line"></i> Image selected</p>
                            </div>
                            <small class="text-danger fw-bold d-block mt-2">
                                <strong>Required:</strong> Desktop image must be at least <strong>1920 × 600 px</strong> (16:9 aspect ratio recommended)
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_image_mobile" class="label">Small/Mobile Image</label>
                        <div class="form-control h-100 text-center position-relative p-4 p-lg-5" style="min-height: 200px;">
                            <div class="product-upload">
                                <label for="txt_image_mobile" class="file-upload mb-0" style="cursor: pointer;">
                                    <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                    <span class="d-block fw-semibold text-body">Drop files here or click to upload.</span>
                                </label>
                                <input id="txt_image_mobile" name="txt_image_mobile" type="file" accept="image/*" style="display: none;">
                            </div>
                            <div id="mobile_preview" class="mt-3" style="display: none;">
                                <img id="mobile_preview_img" src="" alt="Mobile Preview" style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid #ddd;">
                                <p class="mt-2 text-success"><i class="ri-checkbox-circle-line"></i> Image selected</p>
                            </div>
                            <small class="text-danger fw-bold d-block mt-2">
                                <strong>Required:</strong> Mobile image must be at least <strong>768 × 1024 px</strong> (portrait orientation)
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_alt" class="label">Slider Image Alt Tag</label>
                        <div class="form-group position-relative">
                            <input id="txt_alt" name="txt_alt" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter image alt text">
                        </div>
                        <small class="text-muted fw-bold">
                            Slider image alt text (e.g., IT Support Services Banner), Alt text required for SEO & accessibility
                        </small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_btn_title" class="label">Button 1 Title</label>
                        <div class="form-group position-relative">
                            <input id="txt_btn_title" name="txt_btn_title" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter button title">
                        </div>
                        <small class="text-muted fw-bold">
                            Use only two words for the button title
                        </small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_btn_url" class="label">Button 1 URL</label>
                        <div class="form-group position-relative">
                            <input id="txt_btn_url" name="txt_btn_url" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter button URL">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_btn_title_2" class="label">Button 2 Title (Optional)</label>
                        <div class="form-group position-relative">
                            <input id="txt_btn_title_2" name="txt_btn_title_2" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter button title">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_btn_url_2" class="label">Button 2 URL (Optional)</label>
                        <div class="form-group position-relative">
                            <input id="txt_btn_url_2" name="txt_btn_url_2" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter button URL">
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
    // Image preview for desktop image
    const desktopInput = document.getElementById('txt_image_desktop');
    const desktopPreview = document.getElementById('desktop_preview');
    const desktopPreviewImg = document.getElementById('desktop_preview_img');
    
    if (desktopInput && desktopPreview && desktopPreviewImg) {
        desktopInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file type
                if (!file.type.match('image.*')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid File',
                        text: 'Please select an image file.',
                        timer: 2000,
                        toast: true,
                        position: 'top-end'
                    });
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(event) {
                    desktopPreviewImg.src = event.target.result;
                    desktopPreview.style.display = 'block';
                };
                reader.onerror = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to load image preview.',
                        timer: 2000,
                        toast: true,
                        position: 'top-end'
                    });
                };
                reader.readAsDataURL(file);
            } else {
                desktopPreview.style.display = 'none';
            }
        });
    }
    
    // Image preview for mobile image
    const mobileInput = document.getElementById('txt_image_mobile');
    const mobilePreview = document.getElementById('mobile_preview');
    const mobilePreviewImg = document.getElementById('mobile_preview_img');
    
    if (mobileInput && mobilePreview && mobilePreviewImg) {
        mobileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file type
                if (!file.type.match('image.*')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid File',
                        text: 'Please select an image file.',
                        timer: 2000,
                        toast: true,
                        position: 'top-end'
                    });
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(event) {
                    mobilePreviewImg.src = event.target.result;
                    mobilePreview.style.display = 'block';
                };
                reader.onerror = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to load image preview.',
                        timer: 2000,
                        toast: true,
                        position: 'top-end'
                    });
                };
                reader.readAsDataURL(file);
            } else {
                mobilePreview.style.display = 'none';
            }
        });
    }
    
    // Click to trigger file input - Desktop
    const desktopLabel = document.querySelector('label[for="txt_image_desktop"]');
    if (desktopLabel && desktopInput) {
        desktopLabel.addEventListener('click', function(e) {
            e.preventDefault();
            desktopInput.click();
        });
    }
    
    // Click to trigger file input - Mobile
    const mobileLabel = document.querySelector('label[for="txt_image_mobile"]');
    if (mobileLabel && mobileInput) {
        mobileLabel.addEventListener('click', function(e) {
            e.preventDefault();
            mobileInput.click();
        });
    }
    
    // Drag and drop support
    const desktopUploadArea = desktopInput?.closest('.form-control');
    const mobileUploadArea = mobileInput?.closest('.form-control');
    
    if (desktopUploadArea && desktopInput) {
        desktopUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            desktopUploadArea.style.borderColor = '#10b981';
        });
        
        desktopUploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            desktopUploadArea.style.borderColor = '';
        });
        
        desktopUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            desktopUploadArea.style.borderColor = '';
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                desktopInput.files = files;
                desktopInput.dispatchEvent(new Event('change'));
            }
        });
    }
    
    if (mobileUploadArea && mobileInput) {
        mobileUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            mobileUploadArea.style.borderColor = '#10b981';
        });
        
        mobileUploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            mobileUploadArea.style.borderColor = '';
        });
        
        mobileUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            mobileUploadArea.style.borderColor = '';
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                mobileInput.files = files;
                mobileInput.dispatchEvent(new Event('change'));
            }
        });
    }
});
</script>

<?php include("../../includes/footer.php"); ?>
