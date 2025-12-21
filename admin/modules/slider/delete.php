<?php
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
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
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        }
        if ($slider['image_mobile']) {
            $imgPath = $root_path . '../assets/img/hero/' . $slider['image_mobile'];
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        }
    }
    
    $_SESSION['success_message'] = 'Slider deleted successfully';
} else {
    $_SESSION['error_message'] = 'Invalid slider ID';
}

header("Location: index.php");
exit;

