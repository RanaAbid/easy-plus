<?php
// Helper Functions for Admin Panel

// Get all active sliders
function getSliders($link, $status = 'active') {
    if ($status == 'all') {
        $query = "SELECT * FROM hero_sliders ORDER BY sort_order ASC, id ASC";
        $result = mysqli_query($link, $query);
    } else {
        $query = "SELECT * FROM hero_sliders WHERE status = ? ORDER BY sort_order ASC, id ASC";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "s", $status);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
    }
    $sliders = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $sliders[] = $row;
    }
    return $sliders;
}

// Get single slider by ID
function getSliderById($link, $id) {
    $query = "SELECT * FROM hero_sliders WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $slider = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $slider;
}

// Get all active features
function getFeatures($link, $status = 'active') {
    $query = "SELECT * FROM features WHERE status = ? ORDER BY sort_order ASC, id ASC";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $status);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $features = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $features[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $features;
}

// Get all active services
function getServices($link, $status = 'active') {
    $query = "SELECT * FROM services WHERE status = ? ORDER BY sort_order ASC, id ASC";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $status);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $services = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $services;
}

// Get about section
function getAboutSection($link) {
    $query = "SELECT * FROM about_section WHERE status = 'active' LIMIT 1";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_assoc($result);
}

// Get all active process items
function getProcessItems($link, $status = 'active') {
    $query = "SELECT * FROM process_items WHERE status = ? ORDER BY sort_order ASC, id ASC";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $status);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $items;
}

// Get all active skills
function getSkills($link, $status = 'active') {
    $query = "SELECT * FROM skills WHERE status = ? ORDER BY sort_order ASC, id ASC";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $status);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $skills = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $skills[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $skills;
}

// Get FAQ section
function getFAQSection($link) {
    $query = "SELECT * FROM faq_section WHERE status = 'active' LIMIT 1";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_assoc($result);
}

// Get all active FAQ items
function getFAQItems($link, $status = 'active') {
    $query = "SELECT * FROM faq_items WHERE status = ? ORDER BY sort_order ASC, id ASC";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $status);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $items;
}

// Get CTA section
function getCTASection($link) {
    $query = "SELECT * FROM cta_section WHERE status = 'active' LIMIT 1";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_assoc($result);
}

// Get setting value
function getSetting($link, $key, $default = '') {
    $query = "SELECT setting_value FROM settings WHERE setting_key = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $key);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $row ? $row['setting_value'] : $default;
}

// Upload image helper with dimension validation
function uploadImage($file, $uploadDir, $allowedTypes = ['jpg', 'jpeg', 'png', 'webp', 'gif'], $dimensions = null) {
    if (!isset($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'No file uploaded or upload error'];
    }
    
    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    if (!in_array($fileExt, $allowedTypes)) {
        return ['success' => false, 'message' => 'Invalid file type. Allowed: ' . implode(', ', $allowedTypes)];
    }
    
    if ($fileSize > 5000000) { // 5MB max
        return ['success' => false, 'message' => 'File size exceeds 5MB'];
    }
    
    // Validate image dimensions if specified
    if ($dimensions !== null) {
        $imageInfo = @getimagesize($fileTmp);
        if ($imageInfo === false) {
            return ['success' => false, 'message' => 'Invalid image file'];
        }
        
        $width = $imageInfo[0];
        $height = $imageInfo[1];
        
        // Check minimum dimensions
        if (isset($dimensions['min_width']) && $width < $dimensions['min_width']) {
            return ['success' => false, 'message' => "Image width must be at least {$dimensions['min_width']}px. Current: {$width}px"];
        }
        if (isset($dimensions['min_height']) && $height < $dimensions['min_height']) {
            return ['success' => false, 'message' => "Image height must be at least {$dimensions['min_height']}px. Current: {$height}px"];
        }
        
        // Check maximum dimensions
        if (isset($dimensions['max_width']) && $width > $dimensions['max_width']) {
            return ['success' => false, 'message' => "Image width must be at most {$dimensions['max_width']}px. Current: {$width}px"];
        }
        if (isset($dimensions['max_height']) && $height > $dimensions['max_height']) {
            return ['success' => false, 'message' => "Image height must be at most {$dimensions['max_height']}px. Current: {$height}px"];
        }
        
        // Check exact dimensions
        if (isset($dimensions['width']) && $width != $dimensions['width']) {
            return ['success' => false, 'message' => "Image width must be exactly {$dimensions['width']}px. Current: {$width}px"];
        }
        if (isset($dimensions['height']) && $height != $dimensions['height']) {
            return ['success' => false, 'message' => "Image height must be exactly {$dimensions['height']}px. Current: {$height}px"];
        }
        
        // Check aspect ratio
        if (isset($dimensions['aspect_ratio'])) {
            $ratio = $width / $height;
            $targetRatio = $dimensions['aspect_ratio'];
            $tolerance = isset($dimensions['aspect_tolerance']) ? $dimensions['aspect_tolerance'] : 0.1;
            
            if (abs($ratio - $targetRatio) > $tolerance) {
                return ['success' => false, 'message' => "Image aspect ratio must be approximately " . number_format($targetRatio, 2) . ". Current: " . number_format($ratio, 2)];
            }
        }
        
        // Return dimensions in response
        $dimensions['actual_width'] = $width;
        $dimensions['actual_height'] = $height;
    }
    
    $newFileName = uniqid() . '_' . time() . '.' . $fileExt;
    $uploadPath = $uploadDir . $newFileName;
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    if (move_uploaded_file($fileTmp, $uploadPath)) {
        $result = ['success' => true, 'filename' => $newFileName, 'path' => $uploadPath];
        if ($dimensions !== null && isset($dimensions['actual_width'])) {
            $result['width'] = $dimensions['actual_width'];
            $result['height'] = $dimensions['actual_height'];
        }
        return $result;
    }
    
    return ['success' => false, 'message' => 'Failed to upload file'];
}

// Delete image helper
function deleteImage($filePath) {
    if (file_exists($filePath) && is_file($filePath)) {
        return unlink($filePath);
    }
    return false;
}

// Sanitize input for database storage (removes slashes, trims, but doesn't HTML encode)
function sanitizeInput($data) {
    if (is_array($data)) {
        return array_map('sanitizeInput', $data);
    }
    $data = trim($data);
    // Remove slashes if magic quotes are on (though they shouldn't be in modern PHP)
    if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
        $data = stripslashes($data);
    }
    // Don't use htmlspecialchars here - we'll escape on output
    // Prepared statements will handle SQL injection protection
    return $data;
}

// Get image URL (fixes path for admin panel)
function getImageUrl($app_path, $imagePath) {
    // Remove /admin/ from path to get correct URL
    $baseUrl = str_replace('/admin/', '/', $app_path);
    return $baseUrl . $imagePath;
}

// Generate slug from text
function generateSlug($text) {
    // Convert to lowercase
    $text = strtolower(trim($text));
    // Replace spaces and special characters with hyphens
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    // Remove leading/trailing hyphens
    $text = trim($text, '-');
    return $text;
}

// Generate unique slug for services
function generateUniqueSlug($link, $title, $excludeId = 0) {
    $baseSlug = generateSlug($title);
    $slug = $baseSlug;
    $counter = 1;
    
    // Ensure uniqueness
    while (true) {
        $query = "SELECT id FROM services WHERE slug = ?";
        $params = [$slug];
        $types = "s";
        
        if ($excludeId > 0) {
            $query .= " AND id != ?";
            $params[] = $excludeId;
            $types .= "i";
        }
        
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, $types, ...$params);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($result) == 0) {
            mysqli_stmt_close($stmt);
            break;
        }
        
        mysqli_stmt_close($stmt);
        $slug = $baseSlug . '-' . $counter;
        $counter++;
    }
    
    return $slug;
}

