<?php
include("../../includes/header.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);
$about = null;

if ($id > 0) {
    $query = "SELECT * FROM about_section WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $about = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}
?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18"><?= $about ? 'Edit' : 'Create' ?> About Section</h3>
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
        <form action="save.php" method="post" enctype="multipart/form-data">
            <?php if ($about): ?><input type="hidden" name="id" value="<?= $about['id'] ?>"><?php endif; ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_subtitle" class="label">Subtitle</label>
                        <input id="txt_subtitle" name="txt_subtitle" type="text" class="form-control text-dark ps-5 h-58" value="<?= $about ? htmlspecialchars($about['subtitle']) : '' ?>" placeholder="Enter subtitle">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_title" class="label">Title</label>
                        <input id="txt_title" name="txt_title" type="text" class="form-control text-dark ps-5 h-58" value="<?= $about ? htmlspecialchars($about['title']) : '' ?>" placeholder="Enter title" required>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label for="txt_description" class="label">Description</label>
                        <textarea id="txt_description" name="txt_description" class="form-control ps-5 text-dark" rows="5" required><?= $about ? htmlspecialchars($about['description']) : '' ?></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_image_1" class="label">Image 1</label>
                        <?php if ($about && $about['image_1']): ?>
                        <div class="mb-2">
                            <img src="<?= $app_path ?>../assets/img/about/<?= htmlspecialchars($about['image_1']) ?>" alt="Current" style="max-width: 200px;">
                        </div>
                        <?php endif; ?>
                        <input id="txt_image_1" name="txt_image_1" type="file" accept="image/*" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_image_2" class="label">Image 2</label>
                        <?php if ($about && $about['image_2']): ?>
                        <div class="mb-2">
                            <img src="<?= $app_path ?>../assets/img/about/<?= htmlspecialchars($about['image_2']) ?>" alt="Current" style="max-width: 200px;">
                        </div>
                        <?php endif; ?>
                        <input id="txt_image_2" name="txt_image_2" type="file" accept="image/*" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_video_url" class="label">Video URL (Optional)</label>
                        <input id="txt_video_url" name="txt_video_url" type="text" class="form-control text-dark ps-5 h-58" value="<?= $about ? htmlspecialchars($about['video_url']) : '' ?>" placeholder="YouTube video URL">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_call_number" class="label">Phone Number</label>
                        <input id="txt_call_number" name="txt_call_number" type="text" class="form-control text-dark ps-5 h-58" value="<?= $about ? htmlspecialchars($about['call_number']) : '' ?>" placeholder="+(666) 888 0000">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_button_text" class="label">Button Text</label>
                        <input id="txt_button_text" name="txt_button_text" type="text" class="form-control text-dark ps-5 h-58" value="<?= $about ? htmlspecialchars($about['button_text']) : 'About Us' ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_button_url" class="label">Button URL</label>
                        <input id="txt_button_url" name="txt_button_url" type="text" class="form-control text-dark ps-5 h-58" value="<?= $about ? htmlspecialchars($about['button_url']) : '' ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="txt_status" class="label">Status</label>
                        <select id="txt_status" name="txt_status" class="form-control text-dark ps-5 h-58">
                            <option value="active" <?= $about && $about['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= $about && $about['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 text-end">
                    <button type="submit" class="border-0 btn btn-custom py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                        <span class="py-sm-1 d-block">
                            <span><?= $about ? 'Update' : 'Save' ?></span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include("../../includes/footer.php"); ?>

