<?php
// Frontend Helper Functions

// Simple sanitize function for input
function sanitizeInput($data) {
    if (is_array($data)) {
        return array_map('sanitizeInput', $data);
    }
    $data = trim($data);
    // Remove slashes if magic quotes are on (though they shouldn't be in modern PHP)
    if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
        $data = stripslashes($data);
    }
    return $data;
}

// Get all active sliders
function getSliders($link, $status = 'active') {
    $query = "SELECT * FROM hero_sliders WHERE status = ? ORDER BY sort_order ASC, id ASC";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $status);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $sliders = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $sliders[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $sliders;
}

// Get all active features
function getFeatures($link, $status = 'active') {
    $query = "SELECT * FROM features WHERE status = ? ORDER BY sort_order ASC, id ASC LIMIT 3";
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

// Get all active services (no limit for services page)
function getServices($link, $status = 'active', $limit = null) {
    if ($limit) {
        $query = "SELECT * FROM services WHERE status = ? ORDER BY sort_order ASC, id ASC LIMIT ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "si", $status, $limit);
    } else {
        $query = "SELECT * FROM services WHERE status = ? ORDER BY sort_order ASC, id ASC";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "s", $status);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $services = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $services;
}

// Get a single service by ID
function getServiceById($link, $id) {
    $query = "SELECT * FROM services WHERE id = ? AND status = 'active'";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $service = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $service;
}

// Get a single service by slug
function getServiceBySlug($link, $slug) {
    // Check if slug column exists first
    $checkQuery = "SHOW COLUMNS FROM services LIKE 'slug'";
    $checkResult = mysqli_query($link, $checkQuery);
    if (!$checkResult || mysqli_num_rows($checkResult) == 0) {
        return null; // Slug column doesn't exist
    }
    
    $query = "SELECT * FROM services WHERE slug = ? AND status = 'active'";
    $stmt = mysqli_prepare($link, $query);
    if (!$stmt) {
        return null;
    }
    mysqli_stmt_bind_param($stmt, "s", $slug);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $service = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $service;
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

// Get about section
function getAboutSection($link) {
    $query = "SELECT * FROM about_section WHERE status = 'active' LIMIT 1";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_assoc($result);
}

// Get all active process items
function getProcessItems($link, $status = 'active', $limit = null) {
    if ($limit) {
        $query = "SELECT * FROM process_items WHERE status = ? ORDER BY sort_order ASC, id ASC LIMIT ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "si", $status, $limit);
    } else {
        $query = "SELECT * FROM process_items WHERE status = ? ORDER BY sort_order ASC, id ASC";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "s", $status);
    }
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
    $query = "SELECT * FROM skills WHERE status = ? ORDER BY sort_order ASC, id ASC LIMIT 3";
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

// Get all active team members
function getTeamMembers($link, $status = 'active', $limit = null) {
    if ($limit) {
        $query = "SELECT * FROM team_members WHERE status = ? ORDER BY sort_order ASC, id ASC LIMIT ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "si", $status, $limit);
    } else {
        $query = "SELECT * FROM team_members WHERE status = ? ORDER BY sort_order ASC, id ASC";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "s", $status);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $members = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $members[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $members;
}

// Get all active clients
function getClients($link, $status = 'active', $limit = null) {
    if ($limit) {
        $query = "SELECT * FROM clients WHERE status = ? ORDER BY sort_order ASC, id ASC LIMIT ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "si", $status, $limit);
    } else {
        $query = "SELECT * FROM clients WHERE status = ? ORDER BY sort_order ASC, id ASC";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "s", $status);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $clients = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $clients[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $clients;
}

