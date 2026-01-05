<?php
/**
 * Migration: Insert/Update Service Icons
 * Run this to add default icons to services based on their order
 * 
 * Access: http://localhost/projects/easy-plus/admin/migrations/insert_service_icons.php
 */

session_start();
include("../includes/constants.php");
include($root_path . "includes/dbcode.php");

// Check if services table exists
$checkTable = "SHOW TABLES LIKE 'services'";
$result = mysqli_query($link, $checkTable);

if (mysqli_num_rows($result) == 0) {
    echo "Error: services table does not exist. Please run the database schema first.<br>";
    mysqli_close($link);
    exit;
}

// Icon mapping from backup file (index_bk.php)
$iconMap = [
    1 => 'sr-icon-1-1.png',
    2 => 'sr-icon-1-2.png',
    3 => 'sr-icon-1-3.png',
    4 => 'sr-icon-1-4.png',
    5 => 'sr-icon-1-5.png',
    6 => 'sr-icon-1-6.png',
    7 => 'sr-icon-1-1.png', // Cycle back if more than 6 services
    8 => 'sr-icon-1-2.png',
    9 => 'sr-icon-1-3.png',
    10 => 'sr-icon-1-4.png',
];

// Get all services ordered by sort_order, then id
$query = "SELECT id, title, icon FROM services ORDER BY sort_order ASC, id ASC";
$result = mysqli_query($link, $query);

if (!$result) {
    echo "Error fetching services: " . mysqli_error($link) . "<br>";
    mysqli_close($link);
    exit;
}

$services = [];
while ($row = mysqli_fetch_assoc($result)) {
    $services[] = $row;
}

if (empty($services)) {
    echo "No services found in the database.<br>";
    echo "<a href='../modules/services/'>Go to Services</a> | ";
    echo "<a href='../../'>Go to Homepage</a>";
    mysqli_close($link);
    exit;
}

$updatedCount = 0;
$skippedCount = 0;
$errorCount = 0;

echo "<h2>Service Icons Update</h2>";
echo "<p>Found " . count($services) . " service(s)</p><hr>";

// Update each service with icon
foreach ($services as $index => $service) {
    $serviceId = $service['id'];
    $serviceTitle = htmlspecialchars($service['title']);
    $currentIcon = $service['icon'];
    
    // Determine icon based on position (index + 1)
    $iconIndex = ($index % 6) + 1;
    $newIcon = $iconMap[$iconIndex] ?? 'sr-icon-1-' . $iconIndex . '.png';
    
    // Only update if icon is empty or null
    if (empty($currentIcon)) {
        $updateQuery = "UPDATE services SET icon = ? WHERE id = ?";
        $stmt = mysqli_prepare($link, $updateQuery);
        mysqli_stmt_bind_param($stmt, "si", $newIcon, $serviceId);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "✓ Updated service #{$serviceId}: <strong>{$serviceTitle}</strong> → Icon: <strong>{$newIcon}</strong><br>";
            $updatedCount++;
        } else {
            echo "✗ Error updating service #{$serviceId}: " . mysqli_error($link) . "<br>";
            $errorCount++;
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "○ Skipped service #{$serviceId}: <strong>{$serviceTitle}</strong> (already has icon: {$currentIcon})<br>";
        $skippedCount++;
    }
}

echo "<hr>";
echo "<h3>Summary</h3>";
echo "<p><strong>Updated:</strong> {$updatedCount} service(s)</p>";
echo "<p><strong>Skipped:</strong> {$skippedCount} service(s)</p>";
if ($errorCount > 0) {
    echo "<p><strong>Errors:</strong> {$errorCount} service(s)</p>";
}

echo "<br><strong>Migration completed!</strong><br>";
echo "<a href='../modules/services/'>Go to Services</a> | ";
echo "<a href='../../'>Go to Homepage</a>";

mysqli_close($link);
?>

