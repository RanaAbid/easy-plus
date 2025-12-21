<?php
session_start();
include('includes/constants.php');
include($root_path . "includes/dbcode.php");

$error = '';
$username = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password';
    } else {
        // Check user in database
        $query = "SELECT * FROM admin_users WHERE (username = ? OR email = ?) AND status = 'active'";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        
        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_username'] = $user['username'];
            $_SESSION['admin_email'] = $user['email'];
            $_SESSION['admin_name'] = $user['full_name'] ?: $user['username'];
            $_SESSION['admin_role'] = $user['role'];
            
            // Update last login
            $updateQuery = "UPDATE admin_users SET last_login = NOW() WHERE id = ?";
            $updateStmt = mysqli_prepare($link, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "i", $user['id']);
            mysqli_stmt_execute($updateStmt);
            mysqli_stmt_close($updateStmt);
            
            // Redirect to dashboard
            header("Location: " . $app_path . "modules/dashboard/");
            exit;
        } else {
            $error = 'Invalid username or password';
        }
    }
}

// Redirect back to login with error
$redirect_url = $app_path . "index.php";
if ($error) {
    $redirect_url .= "?error=" . urlencode($error);
}
header("Location: " . $redirect_url);
exit;

