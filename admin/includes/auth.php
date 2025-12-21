<?php
// Authentication Check Function
// Include this file at the top of all protected admin pages

if (!isset($_SESSION)) {
    session_start();
}

function checkAdminLogin() {
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: " . $app_path . "index.php");
        exit;
    }
}

function isAdminLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function getAdminUser() {
    if (isAdminLoggedIn()) {
        return [
            'id' => $_SESSION['admin_id'] ?? null,
            'username' => $_SESSION['admin_username'] ?? null,
            'email' => $_SESSION['admin_email'] ?? null,
            'name' => $_SESSION['admin_name'] ?? null,
            'role' => $_SESSION['admin_role'] ?? 'admin'
        ];
    }
    return null;
}

function requireAdminRole($requiredRole = 'admin') {
    checkAdminLogin();
    $user = getAdminUser();
    if ($user && $user['role'] !== $requiredRole && $user['role'] !== 'admin') {
        header("Location: " . $app_path . "modules/dashboard/?error=insufficient_permissions");
        exit;
    }
}

