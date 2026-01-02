<?php
session_start();
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitizeInput($_POST['txt_name'] ?? '');
    $position = sanitizeInput($_POST['txt_position'] ?? '');
    $bio = sanitizeInput($_POST['txt_bio'] ?? '');
    $email = sanitizeInput($_POST['txt_email'] ?? '');
    $phone = sanitizeInput($_POST['txt_phone'] ?? '');
    $facebook_url = sanitizeInput($_POST['txt_facebook_url'] ?? '');
    $twitter_url = sanitizeInput($_POST['txt_twitter_url'] ?? '');
    $linkedin_url = sanitizeInput($_POST['txt_linkedin_url'] ?? '');
    $instagram_url = sanitizeInput($_POST['txt_instagram_url'] ?? '');
    $sort_order = intval($_POST['txt_sort_order'] ?? 0);
    $status = sanitizeInput($_POST['txt_status'] ?? 'active');
    $id = intval($_POST['id'] ?? 0);
    
    $image = '';
    if (isset($_FILES['txt_image']) && $_FILES['txt_image']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_image'], $root_path . '../assets/img/team/', ['png', 'jpg', 'jpeg', 'webp'], [
            'width' => 400,
            'height' => 400
        ]);
        if ($uploadResult['success']) {
            $image = $uploadResult['filename'];
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Profile Image: ' . $uploadResult['message'];
            header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
            exit;
        }
    }
    
    if ($id > 0) {
        // Update existing
        if ($image) {
            // Get old image to delete
            $old_query = "SELECT image FROM team_members WHERE id = ?";
            $old_stmt = mysqli_prepare($link, $old_query);
            mysqli_stmt_bind_param($old_stmt, "i", $id);
            mysqli_stmt_execute($old_stmt);
            $old_result = mysqli_stmt_get_result($old_stmt);
            $old_data = mysqli_fetch_assoc($old_result);
            mysqli_stmt_close($old_stmt);
            
            if ($old_data && $old_data['image']) {
                deleteImage($root_path . '../assets/img/team/' . $old_data['image']);
            }
            
            $query = "UPDATE team_members SET name=?, position=?, bio=?, email=?, phone=?, image=?, facebook_url=?, twitter_url=?, linkedin_url=?, instagram_url=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "ssssssssssisi", $name, $position, $bio, $email, $phone, $image, $facebook_url, $twitter_url, $linkedin_url, $instagram_url, $sort_order, $status, $id);
        } else {
            $query = "UPDATE team_members SET name=?, position=?, bio=?, email=?, phone=?, facebook_url=?, twitter_url=?, linkedin_url=?, instagram_url=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssssssssisi", $name, $position, $bio, $email, $phone, $facebook_url, $twitter_url, $linkedin_url, $instagram_url, $sort_order, $status, $id);
        }
    } else {
        // Insert new
        $query = "INSERT INTO team_members (name, position, bio, email, phone, image, facebook_url, twitter_url, linkedin_url, instagram_url, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssssis", $name, $position, $bio, $email, $phone, $image, $facebook_url, $twitter_url, $linkedin_url, $instagram_url, $sort_order, $status);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = $id > 0 ? 'Team member updated successfully!' : 'Team member created successfully!';
        header("Location: index.php");
    } else {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Error saving team member. Please try again.';
        header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
    }
    mysqli_stmt_close($stmt);
    exit;
}

header("Location: index.php");
exit;

