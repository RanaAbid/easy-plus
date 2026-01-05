<?php
/**
 * Add Slider Images with Content to Database
 * This script will add slider entries with content and image filenames
 * 
 * Usage: Run this file once via browser
 * URL: http://yourdomain.com/add_slider_with_images.php
 */

// Include database connection
include('includes/config.php');
include('includes/dbcode.php');

// Start output
echo "<!DOCTYPE html><html><head><title>Add Sliders with Images</title><style>body{font-family:Arial;max-width:900px;margin:50px auto;padding:20px;} .success{color:green;} .error{color:red;} .info{color:blue;} .warning{color:orange;} ul{list-style-type:none;padding-left:0;} li{padding:5px 0;} table{border-collapse:collapse;width:100%;margin:20px 0;} th,td{border:1px solid #ddd;padding:8px;text-align:left;} th{background-color:#f2f2f2;}</style></head><body>";
echo "<h1>Add Slider Images with Content</h1>";
echo "<p class='info'>This script will add slider entries with content and image filenames to the database.</p>";
echo "<hr>";

$errors = [];
$success = [];

// Define slider data with content and images
// Images should exist in assets/img/hero/ directory
$sliders_data = [
    [
        'heading' => 'Smart Accounting. Accurate Tax. Complete Business Support.',
        'tagline' => 'Focused on Quality. Driven by Accuracy. Committed to Results.',
        'description' => 'We help entrepreneurs, startups and established companies stay compliant and financially organised with reliable accounting, tax filing and government documentation support. Our work is designed for business owners who want peace of mind, timely submissions and a clear understanding of their financial position.',
        'image_desktop' => 'hero-1-1.jpg', // Use existing image or specify new one
        'image_mobile' => 'hero-1-2.jpg', // Use existing image or specify new one
        'alt_text' => 'Business Accounting and Tax Services',
        'btn_title' => 'Get Started',
        'btn_url' => '#contact',
        'btn_title_2' => 'Our Services',
        'btn_url_2' => '#services',
        'sort_order' => 1,
        'status' => 'active'
    ],
    [
        'heading' => 'Your Trusted Partner for Business Growth',
        'tagline' => 'Expert Guidance. Reliable Support. Proven Results.',
        'description' => 'From company formation to ongoing compliance, we provide comprehensive business support services that help you focus on what matters most – growing your business.',
        'image_desktop' => 'hero-2-1.jpg',
        'image_mobile' => 'hero-2-2.jpg',
        'alt_text' => 'Business Support and Consulting Services',
        'btn_title' => 'Learn More',
        'btn_url' => '#about',
        'btn_title_2' => 'Contact Us',
        'btn_url_2' => '#contact',
        'sort_order' => 2,
        'status' => 'active'
    ],
    [
        'heading' => 'Complete Business Solutions Under One Roof',
        'tagline' => 'Accounting. Tax. Licensing. Everything You Need.',
        'description' => 'We offer a complete range of services including bookkeeping, VAT, corporate tax, business formation, visa processing, PRO services, and government documentation support.',
        'image_desktop' => 'hero-3-1.jpg',
        'image_mobile' => 'hero-3-2.jpg',
        'alt_text' => 'Complete Business Solutions',
        'btn_title' => 'View Services',
        'btn_url' => '#services',
        'btn_title_2' => null,
        'btn_url_2' => null,
        'sort_order' => 3,
        'status' => 'active'
    ]
];

// Check which images exist
$hero_dir = __DIR__ . '/assets/img/hero/';
echo "<h2>Image Availability Check</h2>";
echo "<table><tr><th>Slider</th><th>Desktop Image</th><th>Mobile Image</th><th>Status</th></tr>";

foreach ($sliders_data as $index => $slider) {
    $desktop_exists = file_exists($hero_dir . $slider['image_desktop']);
    $mobile_exists = file_exists($hero_dir . $slider['image_mobile']);
    
    echo "<tr>";
    echo "<td>Slider " . ($index + 1) . "</td>";
    echo "<td>" . htmlspecialchars($slider['image_desktop']) . " " . ($desktop_exists ? "✓" : "<span class='warning'>✗ Not Found</span>") . "</td>";
    echo "<td>" . htmlspecialchars($slider['image_mobile']) . " " . ($mobile_exists ? "✓" : "<span class='warning'>✗ Not Found</span>") . "</td>";
    echo "<td>" . (($desktop_exists && $mobile_exists) ? "<span class='success'>Ready</span>" : "<span class='warning'>Warning</span>") . "</td>";
    echo "</tr>";
}
echo "</table>";

// Start transaction
mysqli_begin_transaction($link);

try {
    echo "<h2>Database Operations</h2>";
    
    // Option: Clear existing sliders (uncomment if needed)
    // mysqli_query($link, "DELETE FROM hero_sliders");
    // echo "<p class='info'>✓ Existing sliders cleared</p>";
    
    // Insert sliders
    $query = "INSERT INTO `hero_sliders` (`heading`, `tagline`, `description`, `image_desktop`, `image_mobile`, `alt_text`, `btn_title`, `btn_url`, `btn_title_2`, `btn_url_2`, `sort_order`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $query);
    
    if (!$stmt) {
        throw new Exception("Prepare failed: " . mysqli_error($link));
    }
    
    $inserted = 0;
    foreach ($sliders_data as $slider) {
        mysqli_stmt_bind_param($stmt, "ssssssssssis", 
            $slider['heading'],
            $slider['tagline'],
            $slider['description'],
            $slider['image_desktop'],
            $slider['image_mobile'],
            $slider['alt_text'],
            $slider['btn_title'],
            $slider['btn_url'],
            $slider['btn_title_2'],
            $slider['btn_url_2'],
            $slider['sort_order'],
            $slider['status']
        );
        
        if (mysqli_stmt_execute($stmt)) {
            $inserted++;
            echo "<p class='success'>✓ Slider inserted: " . htmlspecialchars($slider['heading']) . "</p>";
        } else {
            throw new Exception("Insert failed: " . mysqli_error($link));
        }
    }
    
    mysqli_stmt_close($stmt);
    
    // Commit transaction
    mysqli_commit($link);
    
    echo "<hr>";
    echo "<h2 class='success'>✓ Success!</h2>";
    echo "<p class='success'><strong>$inserted slider(s) added successfully!</strong></p>";
    echo "<p class='info'>You can now view the sliders in the admin panel: <a href='admin/modules/slider/'>View Sliders</a></p>";
    
} catch (Exception $e) {
    // Rollback on error
    mysqli_rollback($link);
    echo "<hr>";
    echo "<h2 class='error'>✗ Error!</h2>";
    echo "<p class='error'><strong>Error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p class='warning'>Transaction rolled back. No changes were made.</p>";
}

echo "<hr>";
echo "<h3>Available Images in assets/img/hero/:</h3>";
echo "<ul>";
$images = glob($hero_dir . '*.{jpg,jpeg,png,webp}', GLOB_BRACE);
if ($images) {
    foreach ($images as $image) {
        $filename = basename($image);
        echo "<li>" . htmlspecialchars($filename) . "</li>";
    }
} else {
    echo "<li class='warning'>No images found in hero directory</li>";
}
echo "</ul>";

echo "<hr>";
echo "<p class='info'><strong>Note:</strong> If you need to use different images, edit the \$sliders_data array in this file and run it again.</p>";
echo "<p class='info'><strong>Note:</strong> Images must be uploaded to assets/img/hero/ directory before running this script.</p>";

echo "</body></html>";
?>

