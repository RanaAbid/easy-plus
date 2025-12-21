<?php
// Frontend Helper Functions

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

// Get all active services
function getServices($link, $status = 'active') {
    $query = "SELECT * FROM services WHERE status = ? ORDER BY sort_order ASC, id ASC LIMIT 6";
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
    $query = "SELECT * FROM process_items WHERE status = ? ORDER BY sort_order ASC, id ASC LIMIT 4";
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

