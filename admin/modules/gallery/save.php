<?php
session_start();
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = sanitizeInput($_POST['txt_title'] ?? '');
    $description = sanitizeInput($_POST['txt_description'] ?? '');
    $category = sanitizeInput($_POST['txt_category'] ?? '');
    $sort_order = intval($_POST['txt_sort_order'] ?? 0);
    $status = sanitizeInput($_POST['txt_status'] ?? 'active');
    $id = intval($_POST['id'] ?? 0);
    
    $image = '';
    if (isset($_FILES['txt_image']) && $_FILES['txt_image']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_image'], $root_path . '../assets/img/gallery/', ['png', 'jpg', 'jpeg', 'webp'], [
            'min_width' => 800,
            'min_height' => 600
        ]);
        if ($uploadResult['success']) {
            $image = $uploadResult['filename'];
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Gallery Image: ' . $uploadResult['message'];
            header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
            exit;
        }
    }
    
    if ($id > 0) {
        // Update existing
        if ($image) {
            // Get old image to delete
            $old_query = "SELECT image FROM gallery WHERE id = ?";
            $old_stmt = mysqli_prepare($link, $old_query);
            mysqli_stmt_bind_param($old_stmt, "i", $id);
            mysqli_stmt_execute($old_stmt);
            $old_result = mysqli_stmt_get_result($old_stmt);
            $old_data = mysqli_fetch_assoc($old_result);
            mysqli_stmt_close($old_stmt);
            
            if ($old_data && $old_data['image']) {
                deleteImage($root_path . '../assets/img/gallery/' . $old_data['image']);
            }
            
            $query = "UPDATE gallery SET title=?, description=?, category=?, image=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "ssssisi", $title, $description, $category, $image, $sort_order, $status, $id);
        } else {
            $query = "UPDATE gallery SET title=?, description=?, category=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssisi", $title, $description, $category, $sort_order, $status, $id);
        }
    } else {
        // Insert new
        if (!$image) {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Please upload an image.';
            header("Location: create.php");
            exit;
        }
        $query = "INSERT INTO gallery (title, description, category, image, sort_order, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssssis", $title, $description, $category, $image, $sort_order, $status);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = $id > 0 ? 'Gallery item updated successfully!' : 'Gallery item created successfully!';
        header("Location: index.php");
    } else {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Error saving gallery item. Please try again.';
        header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
    }
    mysqli_stmt_close($stmt);
    exit;
}

header("Location: index.php");
exit;

