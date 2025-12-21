<?php
session_start();
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    // Get feature to delete icon
    $query = "SELECT icon FROM features WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $feature = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    // Delete from database
    $query = "DELETE FROM features WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    // Delete icon file if exists
    if ($feature && $feature['icon']) {
        $iconPath = $root_path . '../assets/img/icon/' . $feature['icon'];
        deleteImage($iconPath);
    }
}

$_SESSION['alert_type'] = 'success';
$_SESSION['alert_message'] = 'Feature deleted successfully!';
header("Location: index.php");
exit;

