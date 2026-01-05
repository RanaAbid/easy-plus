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
    
    // Check if slug column exists first
    $slugColumnExists = false;
    $checkSlugQuery = "SHOW COLUMNS FROM services LIKE 'slug'";
    $checkResult = mysqli_query($link, $checkSlugQuery);
    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        $slugColumnExists = true;
    }
    
    // Always generate slug from title if slug column exists
    $slug = '';
    if ($slugColumnExists && !empty($title)) {
        if (function_exists('generateUniqueSlug')) {
            $slug = generateUniqueSlug($link, $title, $id);
        } else {
            // Fallback slug generation if function doesn't exist
            $baseSlug = strtolower(trim($title));
            $baseSlug = preg_replace('/[^a-z0-9]+/', '-', $baseSlug);
            $baseSlug = trim($baseSlug, '-');
            $slug = $baseSlug;
            
            // Ensure uniqueness
            $counter = 1;
            while (true) {
                $checkQuery = "SELECT id FROM services WHERE slug = ?";
                $params = [$slug];
                $types = "s";
                if ($id > 0) {
                    $checkQuery .= " AND id != ?";
                    $params[] = $id;
                    $types .= "i";
                }
                $checkStmt = mysqli_prepare($link, $checkQuery);
                mysqli_stmt_bind_param($checkStmt, $types, ...$params);
                mysqli_stmt_execute($checkStmt);
                $checkResult = mysqli_stmt_get_result($checkStmt);
                if (mysqli_num_rows($checkResult) == 0) {
                    mysqli_stmt_close($checkStmt);
                    break;
                }
                mysqli_stmt_close($checkStmt);
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }
        }
    }
    
    $icon = '';
    if (isset($_FILES['txt_icon']) && $_FILES['txt_icon']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_icon'], $root_path . '../assets/img/icon/', ['png', 'jpg', 'jpeg', 'webp'], [
            'width' => 64,
            'height' => 64
        ]);
        if ($uploadResult['success']) {
            $icon = $uploadResult['filename'];
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Icon Image: ' . $uploadResult['message'];
            header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
            exit;
        }
    }
    
    $background_image = '';
    if (isset($_FILES['txt_background_image']) && $_FILES['txt_background_image']['error'] == UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['txt_background_image'], $root_path . '../assets/img/bg/', ['png', 'jpg', 'jpeg', 'webp'], [
            'min_width' => 1920,
            'min_height' => 600
        ]);
        if ($uploadResult['success']) {
            $background_image = $uploadResult['filename'];
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Background Image: ' . $uploadResult['message'];
            header("Location: " . ($id > 0 ? "edit.php?id=$id" : "create.php"));
            exit;
        }
    }
    
    if ($id > 0) {
        // Update existing
        if ($slugColumnExists) {
            // With slug column
            if ($icon && $background_image) {
                $query = "UPDATE services SET title=?, slug=?, description=?, icon=?, background_image=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
                $stmt = mysqli_prepare($link, $query);
                mysqli_stmt_bind_param($stmt, "sssssssisi", $title, $slug, $description, $icon, $background_image, $link_url, $link_text, $sort_order, $status, $id);
            } elseif ($icon) {
                $query = "UPDATE services SET title=?, slug=?, description=?, icon=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
                $stmt = mysqli_prepare($link, $query);
                mysqli_stmt_bind_param($stmt, "ssssssisi", $title, $slug, $description, $icon, $link_url, $link_text, $sort_order, $status, $id);
            } elseif ($background_image) {
                $query = "UPDATE services SET title=?, slug=?, description=?, background_image=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
                $stmt = mysqli_prepare($link, $query);
                mysqli_stmt_bind_param($stmt, "ssssssisi", $title, $slug, $description, $background_image, $link_url, $link_text, $sort_order, $status, $id);
            } else {
                $query = "UPDATE services SET title=?, slug=?, description=?, link_url=?, link_text=?, sort_order=?, status=? WHERE id=?";
                $stmt = mysqli_prepare($link, $query);
                mysqli_stmt_bind_param($stmt, "sssssisi", $title, $slug, $description, $link_url, $link_text, $sort_order, $status, $id);
            }
        } else {
            // Without slug column (backward compatibility)
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
        }
    } else {
        // Insert new
        if ($slugColumnExists) {
            $query = "INSERT INTO services (title, slug, description, icon, background_image, link_url, link_text, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "sssssssis", $title, $slug, $description, $icon, $background_image, $link_url, $link_text, $sort_order, $status);
        } else {
            $query = "INSERT INTO services (title, description, icon, background_image, link_url, link_text, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, "ssssssis", $title, $description, $icon, $background_image, $link_url, $link_text, $sort_order, $status);
        }
    }
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = $id > 0 ? 'Service updated successfully!' : 'Service created successfully!';
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

