<?php
ob_start();
session_start();
include("config.php"); 
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EasyPlus - Home</title>
    <meta name="author" content="vecuro">
    <meta name="description" content="TechBiz - IT Solution & Service HTML Template">
    <meta name="keywords" content="TechBiz - IT Solution & Service HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $app_path ?>assets/img/easyplus/favicon/apple.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $app_path ?>assets/img/easyplus/favicon/96size.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= $app_path ?>assets/img/easyplus/favicon/192size.png">
    <link rel="icon" type="image/png" sizes="512x512" href="<?= $app_path ?>assets/img/easyplus/favicon/512size.png">
    <link rel="manifest" href="<?= $app_path ?>assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $app_path ?>assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Exo:400,500,600,700|Fira+Sans:400,500&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css?family=Exo:400,500,600,700|Fira+Sans:400,500&display=swap" rel="stylesheet"></noscript>
    <link rel="stylesheet" href="<?= $app_path ?>assets/css/app.min.css">
    <link rel="stylesheet" href="<?= $app_path ?>assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= $app_path ?>assets/css/style.css">
    <style>
    /* Critical CSS - Hero styles moved inline for faster rendering */
    .vs-hero-wrapper .hero-layer-base{font-style:normal;text-decoration:none;text-transform:none;letter-spacing:0}
    .vs-hero-wrapper .hero-text-badge{font-size:18px;font-weight:600;font-family:Exo, sans-serif;color:#ffffff;border:2px solid #ffffff;border-radius:5px;padding:9px 23.5px;}
    .vs-hero-wrapper .hero-btns{font-size:24px}
    .vs-hero-wrapper .hero-title{font-weight:700;font-family:Exo, sans-serif;color:#ffffff}
    .vs-hero-wrapper .hero-badge-lg{font-size:32px;font-weight:600;font-family:Exo, sans-serif;color:#ffffff;border:2px solid #ffffff;border-radius:5px;padding:18px 44px}
    .vs-hero-wrapper .hero-desc{font-size:16px;line-height:28px;font-family:'Fira Sans',sans-serif;color:#ffffff;white-space:normal}
    </style>
</head>

<body>
    <div class="preloader"><button class="vs-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner"><span class="loader"></span></div>
    </div>
    <?php include("navigation.php"); ?>