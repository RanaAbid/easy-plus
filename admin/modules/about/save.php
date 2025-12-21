<?php
session_start();
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subtitle = sanitizeInput($_POST['txt_subtitle'] ?? '');
    $title = sanitizeInput($_POST['txt_title'] ?? '');
    $description = sanitizeInput($_POST['txt_description'] ?? '');
    $video_url = sanitizeInput($_POST['txt_video_url'] ?? '');
    $call_number = sanitizeInput($_POST['txt_call_number'] ?? '');
    $button_text = sanitizeInput($_POST['txt_button_text'] ?? 'About Us');
    $button_url = sanitizeInput($_POST['txt_button_url'] ?? '');
    $status = sanitizeInput($_POST['txt_status'] ?? 'active');
    $id = intval($_POST['id'] ?? 0);
    
    $image_1 = '';
    if (isset($_FILES['txt_image_1']) && $_FILES['txt_image_1']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_image_1'], $root_path . '../assets/img/about/', ['png', 'jpg', 'jpeg', 'webp']);
        if ($uploadResult['success']) {
            $image_1 = $uploadResult['filename'];
        }
    }
    
    $image_2 = '';
    if (isset($_FILES['txt_image_2']) && $_FILES['txt_image_2']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_image_2'], $root_path . '../assets/img/about/', ['png', 'jpg', 'jpeg', 'webp']);
        if ($uploadResult['success']) {
            $image_2 = $uploadResult['filename'];
        }
    }
    
    if ($id > 0) {
        // Update
        if ($image_1 && $image_2) {
            $query = "UPDATE about_section SET subtitle=?, title=?, description=?, image_1=?, image_2=?, video_url=?, call_number=?, button_text=?, button_url=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "ssssssssssi", $subtitle, $title, $description, $image_1, $image_2, $video_url, $call_number, $button_text, $button_url, $status, $id);
        } elseif ($image_1) {
            $query = "UPDATE about_section SET subtitle=?, title=?, description=?, image_1=?, video_url=?, call_number=?, button_text=?, button_url=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssssssssi", $subtitle, $title, $description, $image_1, $video_url, $call_number, $button_text, $button_url, $status, $id);
        } elseif ($image_2) {
            $query = "UPDATE about_section SET subtitle=?, title=?, description=?, image_2=?, video_url=?, call_number=?, button_text=?, button_url=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssssssssi", $subtitle, $title, $description, $image_2, $video_url, $call_number, $button_text, $button_url, $status, $id);
        } else {
            $query = "UPDATE about_section SET subtitle=?, title=?, description=?, video_url=?, call_number=?, button_text=?, button_url=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "ssssssssi", $subtitle, $title, $description, $video_url, $call_number, $button_text, $button_url, $status, $id);
        }
    } else {
        // Insert
        $query = "INSERT INTO about_section (subtitle, title, description, image_1, image_2, video_url, call_number, button_text, button_url, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $subtitle, $title, $description, $image_1, $image_2, $video_url, $call_number, $button_text, $button_url, $status);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = $id > 0 ? 'About section updated successfully!' : 'About section created successfully!';
        header("Location: index.php");
    } else {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Error saving about section. Please try again.';
        header("Location: edit.php" . ($id > 0 ? "?id=$id" : ""));
    }
    mysqli_stmt_close($stmt);
    exit;
}

header("Location: index.php");
exit;

