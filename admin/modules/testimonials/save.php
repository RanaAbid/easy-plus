<?php
session_start();
include("../../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../../includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_name = sanitizeInput($_POST['txt_client_name'] ?? '');
    $client_position = sanitizeInput($_POST['txt_client_position'] ?? '');
    $client_company = sanitizeInput($_POST['txt_client_company'] ?? '');
    $rating = intval($_POST['txt_rating'] ?? 5);
    $testimonial = sanitizeInput($_POST['txt_testimonial'] ?? '');
    $sort_order = intval($_POST['txt_sort_order'] ?? 0);
    $status = sanitizeInput($_POST['txt_status'] ?? 'active');
    $id = intval($_POST['id'] ?? 0);
    
    $client_image = '';
    if (isset($_FILES['txt_client_image']) && $_FILES['txt_client_image']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_client_image'], $root_path . '../assets/img/testimonial/', ['png', 'jpg', 'jpeg', 'webp'], [
            'width' => 200,
            'height' => 200
        ]);
        if ($uploadResult['success']) {
            $client_image = $uploadResult['filename'];
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Client Image: ' . $uploadResult['message'];
            header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
            exit;
        }
    }
    
    if ($id > 0) {
        // Update existing
        if ($client_image) {
            // Get old image to delete
            $old_query = "SELECT client_image FROM testimonials WHERE id = ?";
            $old_stmt = mysqli_prepare($link, $old_query);
            mysqli_stmt_bind_param($old_stmt, "i", $id);
            mysqli_stmt_execute($old_stmt);
            $old_result = mysqli_stmt_get_result($old_stmt);
            $old_data = mysqli_fetch_assoc($old_result);
            mysqli_stmt_close($old_stmt);
            
            if ($old_data && $old_data['client_image']) {
                deleteImage($root_path . '../assets/img/testimonial/' . $old_data['client_image']);
            }
            
            $query = "UPDATE testimonials SET client_name=?, client_position=?, client_company=?, rating=?, testimonial=?, client_image=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssisissi", $client_name, $client_position, $client_company, $rating, $testimonial, $client_image, $sort_order, $status, $id);
        } else {
            $query = "UPDATE testimonials SET client_name=?, client_position=?, client_company=?, rating=?, testimonial=?, sort_order=?, status=? WHERE id=?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssisisi", $client_name, $client_position, $client_company, $rating, $testimonial, $sort_order, $status, $id);
        }
    } else {
        // Insert new
        $query = "INSERT INTO testimonials (client_name, client_position, client_company, rating, testimonial, client_image, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "sssisiss", $client_name, $client_position, $client_company, $rating, $testimonial, $client_image, $sort_order, $status);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = $id > 0 ? 'Testimonial updated successfully!' : 'Testimonial created successfully!';
        header("Location: index.php");
    } else {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Error saving testimonial. Please try again.';
        header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
    }
    mysqli_stmt_close($stmt);
    exit;
}

header("Location: index.php");
exit;

