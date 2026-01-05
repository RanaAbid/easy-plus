<?php
/**
 * Migration: Insert/Update About Section with Images and Video URL
 * Run this to add default images and video URL to about section
 * 
 * Access: http://localhost/projects/easy-plus/admin/migrations/insert_about_images.php
 */

session_start();
include("../includes/constants.php");
include($root_path . "includes/dbcode.php");

// Check if about_section exists
$checkTable = "SHOW TABLES LIKE 'about_section'";
$result = mysqli_query($link, $checkTable);

if (mysqli_num_rows($result) == 0) {
    echo "Error: about_section table does not exist. Please run the database schema first.<br>";
    mysqli_close($link);
    exit;
}

// Check if about section already exists
$checkQuery = "SELECT id FROM about_section WHERE status = 'active' LIMIT 1";
$checkResult = mysqli_query($link, $checkQuery);
$existing = mysqli_fetch_assoc($checkResult);

if ($existing) {
    // Update existing record
    $id = $existing['id'];
    
    // Default images from backup file
    $image_1 = 'ab-1-1.jpg';
    $image_2 = 'ab-1-2.jpg';
    $video_url = 'https://www.youtube.com/watch?v=_sI_Ps7JSEk'; // YouTube video URL
    
    // Only update images and video_url if they're not already set
    $query = "UPDATE about_section SET 
                image_1 = COALESCE(NULLIF(image_1, ''), ?),
                image_2 = COALESCE(NULLIF(image_2, ''), ?),
                video_url = COALESCE(NULLIF(video_url, ''), ?)
              WHERE id = ?";
    
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $image_1, $image_2, $video_url, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "✓ About section updated successfully with images and video URL!<br>";
        echo "Image 1: $image_1<br>";
        echo "Image 2: $image_2<br>";
        echo "Video URL: $video_url<br>";
    } else {
        echo "Error updating about section: " . mysqli_error($link) . "<br>";
    }
    mysqli_stmt_close($stmt);
    
} else {
    // Insert new record with default content
    $subtitle = "Get best It solution 2022";
    $title = "Trust Our Best IT Solution For Your Business";
    $description = "Compellingly mesh cross-platform portals through functional human capital world-class architectures for orthogonal initiatives. Assertively benchmark visionary quality vectors after covalent e-tailers. Intrinsicly enhance 24/7 users and supply process";
    $image_1 = 'ab-1-1.jpg';
    $image_2 = 'ab-1-2.jpg';
    $video_url = 'https://www.youtube.com/watch?v=_sI_Ps7JSEk';
    $call_number = '+(666) 888 0000';
    $button_text = 'About Us';
    $button_url = 'about-us/';
    $status = 'active';
    
    $query = "INSERT INTO about_section (subtitle, title, description, image_1, image_2, video_url, call_number, button_text, button_url, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $subtitle, $title, $description, $image_1, $image_2, $video_url, $call_number, $button_text, $button_url, $status);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "✓ About section created successfully with images and video URL!<br>";
        echo "Image 1: $image_1<br>";
        echo "Image 2: $image_2<br>";
        echo "Video URL: $video_url<br>";
    } else {
        echo "Error inserting about section: " . mysqli_error($link) . "<br>";
    }
    mysqli_stmt_close($stmt);
}

echo "<br><strong>Migration completed!</strong><br>";
echo "<a href='../modules/about/'>Go to About Section</a> | ";
echo "<a href='../../'>Go to Homepage</a>";

mysqli_close($link);
?>

