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
    
    $background_image = '';
    if (isset($_FILES['txt_background_image']) && $_FILES['txt_background_image']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_background_image'], $root_path . '../assets/img/bg/', ['png', 'jpg', 'jpeg', 'webp']);
        if ($uploadResult['success']) {
            $background_image = $uploadResult['filename'];
        }
    }
    
    if ($id > 0) {
        // Update existing
        if ($icon && $background_image) {
            $query = "UPDATE services SET title=?, description=?, icon=?, background_image=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "ssssssisi", $title, $description, $icon, $background_image, $link_url, $link_text, $sort_order, $status, $id);
        } elseif ($icon) {
            $query = "UPDATE services SET title=?, description=?, icon=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssssisi", $title, $description, $icon, $link_url, $link_text, $sort_order, $status, $id);
        } elseif ($background_image) {
            $query = "UPDATE services SET title=?, description=?, background_image=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssssisi", $title, $description, $background_image, $link_url, $link_text, $sort_order, $status, $id);
        } else {
            $query = "UPDATE services SET title=?, description=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "ssssisi", $title, $description, $link_url, $link_text, $sort_order, $status, $id);
        }
    } else {
        // Insert new
        $query = "INSERT INTO services (title, description, icon, background_image, link_url, link_text, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssssssis", $title, $description, $icon, $background_image, $link_url, $link_text, $sort_order, $status);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = $id > 0 ? 'Service updated successfully!' : 'Service created successfully!';
        header("Location: index.php");
    } else {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Error saving service. Please try again.';
        header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
    }
    mysqli_stmt_close($stmt);
    exit;
}

header("Location: index.php");
exit;

