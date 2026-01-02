<?php
session_start();
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    $query = "SELECT client_image FROM testimonials WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $testimonial = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    $query = "DELETE FROM testimonials WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    if ($testimonial && $testimonial['client_image']) {
        deleteImage($root_path . '../assets/img/testimonial/' . $testimonial['client_image']);
    }
}

$_SESSION['alert_type'] = 'success';
$_SESSION['alert_message'] = 'Testimonial deleted successfully!';
header("Location: index.php");
exit;

