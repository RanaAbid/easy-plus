<?php
ob_start();
session_start();

include("constants.php");
include("auth.php");
include($root_path . "includes/dbcode.php");

// Check if user is logged in
checkAdminLogin();

$today         = date('m/d/Y h:i:s A', time());
$current_month = date("m y", strtotime($today));
$current_year  = date("Y", strtotime($today));

$adminUser = getAdminUser();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?=$app_path?>assets/css/remixicon.css">
    <link rel="stylesheet" href="<?=$app_path?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?=$app_path?>assets/css/sidebar-menu.css">
    <link rel="stylesheet" href="<?=$app_path?>assets/css/simplebar.css">
    <link rel="stylesheet" href="<?=$app_path?>assets/css/apexcharts.css">
    <link rel="stylesheet" href="<?=$app_path?>assets/css/prism.css">
    <link rel="stylesheet" href="<?=$app_path?>assets/css/rangeslider.css">
    <link rel="stylesheet" href="<?=$app_path?>assets/css/sweetalert.min.css">
    <link rel="stylesheet" href="<?=$app_path?>assets/css/quill.snow.css">
    <link rel="stylesheet" href="<?=$app_path?>assets/css/style.css">

    <link rel="icon" type="image/png" href="<?=$app_path?>assets/images/easy-plus/favicon/favicon.png">

    <title>Easy Plus - Admin Dashboard</title>
</head>

<body cz-shortcut-listen="true" data-new-gr-c-s-check-loaded="14.1266.0" data-gr-ext-installed="" data-theme="light" sidebar-dark-light-data-theme="sidebar-dark">

    <div class="preloader" id="preloader">
        <div class="preloader">
            <div class="waviy position-relative">
                <span class="d-inline-block">E</span>
                <span class="d-inline-block">A</span>
                <span class="d-inline-block">S</span>
                <span class="d-inline-block">Y</span>
                <span class="d-inline-block">P</span>
                <span class="d-inline-block">L</span>
                <span class="d-inline-block">U</span>
                <span class="d-inline-block">S</span>
            </div>
        </div>
    </div>

     <?php include("sidebar.php") ?>
      <div class="container-fluid">
        <div class="main-content d-flex flex-column">
             <?php include("navigation.php") ?>
            