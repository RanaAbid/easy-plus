<?php
session_start();
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = sanitizeInput($_POST['txt_title'] ?? '');
    $description = sanitizeInput($_POST['txt_description'] ?? '');
    $link_url = sanitizeInput($_POST['txt_link_url'] ?? '');
    $link_text = sanitizeInput($_POST['txt_link_text'] ?? 'Read More');
    $sort_order = intval($_POST['txt_sort_order'] ?? 0);
    $status = sanitizeInput($_POST['txt_status'] ?? 'active');
    $id = intval($_POST['id'] ?? 0);
    
    $icon = '';
    if (isset($_FILES['txt_icon']) && $_FILES['txt_icon']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_icon'], $root_path . '../assets/img/icon/', ['png', 'jpg', 'jpeg', 'webp']);
        if ($uploadResult['success']) {
            $icon = $uploadResult['filename'];
        }
    }
    
    if ($id > 0) {
        // Update existing
        if ($icon) {
            $query = "UPDATE features SET title=?, description=?, icon=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssssisi", $title, $description, $icon, $link_url, $link_text, $sort_order, $status, $id);
        } else {
            $query = "UPDATE features SET title=?, description=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "ssssisi", $title, $description, $link_url, $link_text, $sort_order, $status, $id);
        }
    } else {
        // Insert new
        $query = "INSERT INTO features (title, description, icon, link_url, link_text, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "sssssis", $title, $description, $icon, $link_url, $link_text, $sort_order, $status);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = $id > 0 ? 'Feature updated successfully!' : 'Feature created successfully!';
        header("Location: index.php");
    } else {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Error saving feature. Please try again.';
        header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
    }
    mysqli_stmt_close($stmt);
    exit;
}

header("Location: index.php");
exit;

