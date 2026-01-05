<?php
// Authentication Check Function
// Include this file at the top of all protected admin pages

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function checkAdminLogin() {
    // Prevent redirect loops - check if we're already on the login page
    $current_script = $_SERVER['SCRIPT_NAME'] ?? $_SERVER['PHP_SELF'] ?? '';
    $current_page = basename($current_script);
    $is_login_page = ($current_page === 'index.php' || $current_page === 'authenticate.php');
    
    // If we're on a login page, don't check authentication
    if ($is_login_page) {
        return;
    }
    
    // Check if user is logged in
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        // Build login URL - use relative path to avoid redirect loops
        $login_url = 'index.php';
        
        // If app_path is defined and we're not in a subdirectory, use absolute path
        if (isset($GLOBALS['app_path']) && !empty($GLOBALS['app_path'])) {
            $login_url = rtrim($GLOBALS['app_path'], '/') . '/index.php';
        } elseif (isset($app_path) && !empty($app_path)) {
            $login_url = rtrim($app_path, '/') . '/index.php';
        }
        
        // Prevent infinite redirects by checking if we're already redirecting
        if (!isset($_SESSION['redirecting_to_login'])) {
            $_SESSION['redirecting_to_login'] = true;
            header("Location: " . $login_url);
            exit;
        } else {
            // If we're already redirecting, clear the flag and show error
            unset($_SESSION['redirecting_to_login']);
            die("Authentication error: Please clear your browser cookies and try again.");
        }
    } else {
        // User is logged in, clear any redirect flag
        unset($_SESSION['redirecting_to_login']);
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

