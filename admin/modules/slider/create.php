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


        <form action="save.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_heading" class="label">Heading</label>
                        <div class="form-group position-relative">
                            <textarea id="txt_heading" name="txt_heading" class="form-control ps-5 text-dark" placeholder="Some demo text ... "></textarea>
                        </div>
                        <small class="text-muted">Use &lt;strong&gt; tag for bold text</small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_tagline" class="label">Tag Line Heading</label>
                        <div class="form-group position-relative">
                            <textarea id="txt_tagline" name="txt_tagline" class="form-control ps-5 text-dark" placeholder="Some demo text ... "></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="form-group mb-4">
                        <label for="txt_image_desktop" class="label">laptop/ Desktop Slider Image</label>
                        <div class="form-control h-100 text-center position-relative p-4 p-lg-5">
                            <div class="product-upload">
                                <label for="txt_image_desktop" class="file-upload mb-0">
                                    <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                    <span class="d-block fw-semibold text-body">Drop files here or click to upload.</span>
                                </label>
                                <input id="txt_image_desktop" name="txt_image_desktop" type="file" accept="image/*">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_image_mobile" class="label">Small/Mobile Image</label>
                        <div class="form-control h-100 text-center position-relative p-4 p-lg-5">
                            <div class="product-upload">
                                <label for="txt_image_mobile" class="file-upload mb-0">
                                    <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                    <span class="d-block fw-semibold text-body">Drop files here or click to upload.</span>
                                </label>
                                <input id="txt_image_mobile" name="txt_image_mobile" type="file" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_alt" class="label">Slider Image Alt Tag</label>
                        <div class="form-group position-relative">
                            <input id="txt_alt" name="txt_alt" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter image alt text">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group  mb-4">
                        <label for="txt_btn_title" class="label">Button Title</label>
                        <div class="form-group position-relative">
                            <input id="txt_btn_title" name="txt_btn_title" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter Name">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group  mb-4">
                        <label for="txt_btn_url" class="label">Button Url</label>
                        <div class="form-group position-relative">
                            <input id="txt_btn_url" name="txt_btn_url" type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter Name">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-end">
                    <button class="border-0 btn btn-custom py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                        <span class="py-sm-1 d-block">
                            <span>Save</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php
include("../../includes/footer.php");

?>