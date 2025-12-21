<?php
include("../../includes/header.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);
$slider = null;

if ($id > 0) {
    $slider = getSliderById($link, $id);
}

if (!$slider) {
    header("Location: index.php");
    exit;
}
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Edit Slider</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?= $app_path ?>modules/dashboard/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Edit Slider</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Edit Slider</h4>
            <a href="index.php" class="btn btn-dark fw-semibold text-white py-2 px-4 mt-2 me-2">
                <span class="py-sm-1 d-block">
                    <i data-feather="arrow-left" class="text-white"></i>
                    <span>Back</span>
                </span>
            </a>
        </div>

        <form action="save.php" method="post" enctype="multipart/form-data" id="sliderForm">
            <input type="hidden" name="id" value="<?= $slider['id'] ?>">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_heading" class="label">Heading</label>
                        <div class="form-group position-relative">
                            <textarea id="txt_heading" name="txt_heading" class="form-control ps-5 text-dark" placeholder="Some demo text ... " required><?= htmlspecialchars($slider['heading']) ?></textarea>
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
                            <textarea id="txt_tagline" name="txt_tagline" class="form-control ps-5 text-dark" placeholder="Some demo text ... "><?= htmlspecialchars($slider['tagline']) ?></textarea>
                        </div>
                        <small class="text-muted fw-bold">
                            Max 3 words (e.g., HIGHLY QUALIFIED ENGINEERS)
                        </small>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_description" class="label">Description</label>
                        <textarea id="txt_description" name="txt_description" class="form-control ps-5 text-dark" rows="3" placeholder="Enter description"><?= htmlspecialchars($slider['description']) ?></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_image_desktop" class="label">Desktop/Laptop Slider Image</label>
                        <?php if ($slider['image_desktop']): ?>
                        <div class="mb-3">
                            <p class="text-muted small">Current Image:</p>
                            <?php 
                            $desktopImageUrl = str_replace('/admin/', '/', $app_path) . 'assets/img/hero/' . htmlspecialchars($slider['image_desktop']);
                            ?>
                            <img src="<?= $desktopImageUrl ?>" 
                                 alt="Current desktop" 
                                 id="current_desktop_img"
                                 style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid #ddd;"
                                 onerror="this.style.display='none'; document.getElementById('current_desktop_note').style.display='block';">
                            <p id="current_desktop_note" class="text-danger small" style="display: none;">Image not found</p>
                        </div>
                        <?php endif; ?>
                        <div class="form-control h-100 text-center position-relative p-4 p-lg-5" style="min-height: 200px;">
                            <div class="product-upload">
                                <label for="txt_image_desktop" class="file-upload mb-0" style="cursor: pointer;">
                                    <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                    <span class="d-block fw-semibold text-body"><?= $slider['image_desktop'] ? 'Change image' : 'Drop files here or click to upload.' ?></span>
                                </label>
                                <input id="txt_image_desktop" name="txt_image_desktop" type="file" accept="image/*" style="display: none;">
                            </div>
                            <div id="desktop_preview" class="mt-3" style="display: none;">
                                <p class="text-info small">New image preview:</p>
                                <img id="desktop_preview_img" src="" alt="Desktop Preview" style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid #ddd;">
                                <p class="mt-2 text-success"><i class="ri-checkbox-circle-line"></i> New image selected</p>
                            </div>
                            <small class="text-muted fw-bold d-block mt-2">
                                Desktop & laptop image: 1900 × 850 px (WebP format for optimization)
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_image_mobile" class="label">Small/Mobile Image</label>
                        <?php if ($slider['image_mobile']): ?>
                        <div class="mb-3">
                            <p class="text-muted small">Current Image:</p>
                            <?php 
                            $mobileImageUrl = str_replace('/admin/', '/', $app_path) . 'assets/img/hero/' . htmlspecialchars($slider['image_mobile']);
                            ?>
                            <img src="<?= $mobileImageUrl ?>" 
                                 alt="Current mobile" 
                                 id="current_mobile_img"
                                 style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid #ddd;"
                                 onerror="this.style.display='none'; document.getElementById('current_mobile_note').style.display='block';">
                            <p id="current_mobile_note" class="text-danger small" style="display: none;">Image not found</p>
                        </div>
                        <?php endif; ?>
                        <div class="form-control h-100 text-center position-relative p-4 p-lg-5" style="min-height: 200px;">
                            <div class="product-upload">
                                <label for="txt_image_mobile" class="file-upload mb-0" style="cursor: pointer;">
                                    <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                    <span class="d-block fw-semibold text-body"><?= $slider['image_mobile'] ? 'Change image' : 'Drop files here or click to upload.' ?></span>
                                </label>
                                <input id="txt_image_mobile" name="txt_image_mobile" type="file" accept="image/*" style="display: none;">
                            </div>
                            <div id="mobile_preview" class="mt-3" style="display: none;">
                                <p class="text-info small">New image preview:</p>
                                <img id="mobile_preview_img" src="" alt="Mobile Preview" style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid #ddd;">
                                <p class="mt-2 text-success"><i class="ri-checkbox-circle-line"></i> New image selected</p>
                            </div>
                            <small class="text-muted fw-bold d-block mt-2">
                                Mobile & small screen image: 430 × 380 px (WebP format for optimization)
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_alt" class="label">Slider Image Alt Tag</label>
                        <div class="form-group position-relative">
                            <input id="txt_alt" name="txt_alt" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter image alt text" value="<?= htmlspecialchars($slider['alt_text']) ?>">
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
                            <input id="txt_btn_title" name="txt_btn_title" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter button title" value="<?= htmlspecialchars($slider['btn_title']) ?>">
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
                            <input id="txt_btn_url" name="txt_btn_url" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter button URL" value="<?= htmlspecialchars($slider['btn_url']) ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_btn_title_2" class="label">Button 2 Title (Optional)</label>
                        <div class="form-group position-relative">
                            <input id="txt_btn_title_2" name="txt_btn_title_2" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter button title" value="<?= htmlspecialchars($slider['btn_title_2']) ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_btn_url_2" class="label">Button 2 URL (Optional)</label>
                        <div class="form-group position-relative">
                            <input id="txt_btn_url_2" name="txt_btn_url_2" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter button URL" value="<?= htmlspecialchars($slider['btn_url_2']) ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_sort_order" class="label">Sort Order</label>
                        <input id="txt_sort_order" name="txt_sort_order" type="number" class="form-control text-dark ps-5 h-58" value="<?= $slider['sort_order'] ?>" min="0">
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_status" class="label">Status</label>
                        <select id="txt_status" name="txt_status" class="form-control text-dark ps-5 h-58">
                            <option value="active" <?= $slider['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= $slider['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
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
    // Image preview for desktop image
    const desktopInput = document.getElementById('txt_image_desktop');
    const desktopPreview = document.getElementById('desktop_preview');
    const desktopPreviewImg = document.getElementById('desktop_preview_img');
    const currentDesktopImg = document.getElementById('current_desktop_img');
    
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
                    // Hide current image when new one is selected
                    if (currentDesktopImg) {
                        currentDesktopImg.style.display = 'none';
                    }
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
    const currentMobileImg = document.getElementById('current_mobile_img');
    
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
                    // Hide current image when new one is selected
                    if (currentMobileImg) {
                        currentMobileImg.style.display = 'none';
                    }
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
            desktopUploadArea.style.backgroundColor = '#f0fdf4';
        });
        
        desktopUploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            desktopUploadArea.style.borderColor = '';
            desktopUploadArea.style.backgroundColor = '';
        });
        
        desktopUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            desktopUploadArea.style.borderColor = '';
            desktopUploadArea.style.backgroundColor = '';
            const files = e.dataTransfer.files;
            if (files.length > 0 && files[0].type.match('image.*')) {
                desktopInput.files = files;
                desktopInput.dispatchEvent(new Event('change', { bubbles: true }));
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File',
                    text: 'Please drop an image file.',
                    timer: 2000,
                    toast: true,
                    position: 'top-end'
                });
            }
        });
    }
    
    if (mobileUploadArea && mobileInput) {
        mobileUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            mobileUploadArea.style.borderColor = '#10b981';
            mobileUploadArea.style.backgroundColor = '#f0fdf4';
        });
        
        mobileUploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            mobileUploadArea.style.borderColor = '';
            mobileUploadArea.style.backgroundColor = '';
        });
        
        mobileUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            mobileUploadArea.style.borderColor = '';
            mobileUploadArea.style.backgroundColor = '';
            const files = e.dataTransfer.files;
            if (files.length > 0 && files[0].type.match('image.*')) {
                mobileInput.files = files;
                mobileInput.dispatchEvent(new Event('change', { bubbles: true }));
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File',
                    text: 'Please drop an image file.',
                    timer: 2000,
                    toast: true,
                    position: 'top-end'
                });
            }
        });
    }
});
</script>

<?php include("../../includes/footer.php"); ?>

