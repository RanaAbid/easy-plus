<?php
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $heading = sanitizeInput($_POST['txt_heading'] ?? '');
    $tagline = sanitizeInput($_POST['txt_tagline'] ?? '');
    $description = sanitizeInput($_POST['txt_description'] ?? '');
    $alt_text = sanitizeInput($_POST['txt_alt'] ?? '');
    $btn_title = sanitizeInput($_POST['txt_btn_title'] ?? '');
    $btn_url = sanitizeInput($_POST['txt_btn_url'] ?? '');
    $btn_title_2 = sanitizeInput($_POST['txt_btn_title_2'] ?? '');
    $btn_url_2 = sanitizeInput($_POST['txt_btn_url_2'] ?? '');
    $sort_order = intval($_POST['txt_sort_order'] ?? 0);
    $status = sanitizeInput($_POST['txt_status'] ?? 'active');
    $id = intval($_POST['id'] ?? 0);
    
    // Validation
    $errors = [];
    
    // Required field validation
    if (empty(trim($heading))) {
        $errors[] = 'Heading is required';
    }
    
    // For new sliders, images are required
    if ($id == 0) {
        if (empty($_FILES['txt_image_desktop']['name']) || $_FILES['txt_image_desktop']['error'] != UPLOAD_ERR_OK) {
            $errors[] = 'Desktop image is required for new sliders';
        }
        if (empty($_FILES['txt_image_mobile']['name']) || $_FILES['txt_image_mobile']['error'] != UPLOAD_ERR_OK) {
            $errors[] = 'Mobile image is required for new sliders';
        }
    }
    
    // If there are validation errors, redirect back with error message
    if (!empty($errors)) {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = implode('. ', $errors);
        header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
        exit;
    }
    
    $image_desktop = '';
    if (isset($_FILES['txt_image_desktop']) && $_FILES['txt_image_desktop']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_image_desktop'], $root_path . '../assets/img/hero/', ['png', 'jpg', 'jpeg', 'webp'], [
            'min_width' => 1920,
            'min_height' => 600,
            'aspect_ratio' => 16/9,
            'aspect_tolerance' => 0.2
        ]);
        if ($uploadResult['success']) {
            $image_desktop = $uploadResult['filename'];
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Desktop Image: ' . $uploadResult['message'];
            header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
            exit;
        }
    }
    
    $image_mobile = '';
    if (isset($_FILES['txt_image_mobile']) && $_FILES['txt_image_mobile']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_image_mobile'], $root_path . '../assets/img/hero/', ['png', 'jpg', 'jpeg', 'webp'], [
            'min_width' => 768,
            'min_height' => 1024
        ]);
        if ($uploadResult['success']) {
            $image_mobile = $uploadResult['filename'];
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Mobile Image: ' . $uploadResult['message'];
            header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
            exit;
        }
    }
    
    if ($id > 0) {
        // Get existing slider data
        $existingQuery = "SELECT image_desktop, image_mobile FROM hero_sliders WHERE id = ?";
        $existingStmt = mysqli_prepare($link, $existingQuery);
        mysqli_stmt_bind_param($existingStmt, "i", $id);
        mysqli_stmt_execute($existingStmt);
        $existingResult = mysqli_stmt_get_result($existingStmt);
        $existing = mysqli_fetch_assoc($existingResult);
        mysqli_stmt_close($existingStmt);
        
        // Use existing images if new ones not uploaded
        if (!$image_desktop && $existing) {
            $image_desktop = $existing['image_desktop'];
        }
        if (!$image_mobile && $existing) {
            $image_mobile = $existing['image_mobile'];
        }
        
        // Delete old images if new ones uploaded
        if ($image_desktop && $existing && $existing['image_desktop'] && $image_desktop != $existing['image_desktop']) {
            $oldPath = $root_path . '../assets/img/hero/' . $existing['image_desktop'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
        if ($image_mobile && $existing && $existing['image_mobile'] && $image_mobile != $existing['image_mobile']) {
            $oldPath = $root_path . '../assets/img/hero/' . $existing['image_mobile'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
        
        // Update existing
        $query = "UPDATE hero_sliders SET heading=?, tagline=?, description=?, image_desktop=?, image_mobile=?, alt_text=?, btn_title=?, btn_url=?, btn_title_2=?, btn_url_2=?, sort_order=?, status=? WHERE id=?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssssisi", $heading, $tagline, $description, $image_desktop, $image_mobile, $alt_text, $btn_title, $btn_url, $btn_title_2, $btn_url_2, $sort_order, $status, $id);
    } else {
        // Insert new
        $query = "INSERT INTO hero_sliders (heading, tagline, description, image_desktop, image_mobile, alt_text, btn_title, btn_url, btn_title_2, btn_url_2, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssssis", $heading, $tagline, $description, $image_desktop, $image_mobile, $alt_text, $btn_title, $btn_url, $btn_title_2, $btn_url_2, $sort_order, $status);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = $id > 0 ? 'Slider updated successfully!' : 'Slider created successfully!';
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Database error: ' . mysqli_error($link);
        header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
        exit;
    }
    mysqli_stmt_close($stmt);
}

header("Location: index.php");
exit;

