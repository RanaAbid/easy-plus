<?php
/**
 * Migration: Add slug column to services table
 * Run this once to add slug support to existing services
 * 
 * Access: http://localhost/projects/easy-plus/admin/migrations/add_slug_to_services.php
 */

session_start();
include("../includes/constants.php");
include($root_path . "includes/dbcode.php");
include("../includes/functions.php");

// Add slug column if it doesn't exist
$checkColumn = "SHOW COLUMNS FROM services LIKE 'slug'";
$result = mysqli_query($link, $checkColumn);

if (mysqli_num_rows($result) == 0) {
    // Add slug column
    $alterQuery = "ALTER TABLE services ADD COLUMN slug VARCHAR(255) NULL AFTER title";
    if (mysqli_query($link, $alterQuery)) {
        echo "Slug column added successfully.<br>";
        
        // Add unique index
        $indexQuery = "ALTER TABLE services ADD UNIQUE KEY slug (slug)";
        mysqli_query($link, $indexQuery);
        echo "Unique index on slug added.<br>";
        
        // Generate slugs for existing services using the function from includes/functions.php
        $servicesQuery = "SELECT id, title FROM services WHERE slug IS NULL OR slug = ''";
        $servicesResult = mysqli_query($link, $servicesQuery);
        
        $updated = 0;
        while ($service = mysqli_fetch_assoc($servicesResult)) {
            // Use the generateUniqueSlug function if available, otherwise use inline function
            if (function_exists('generateUniqueSlug')) {
                $slug = generateUniqueSlug($link, $service['title'], $service['id']);
            } else {
                // Fallback slug generation
                $baseSlug = strtolower(trim($service['title']));
                $baseSlug = preg_replace('/[^a-z0-9]+/', '-', $baseSlug);
                $baseSlug = trim($baseSlug, '-');
                $slug = $baseSlug;
                $counter = 1;
                
                // Ensure uniqueness
                while (true) {
                    $checkQuery = "SELECT id FROM services WHERE slug = ? AND id != ?";
                    $checkStmt = mysqli_prepare($link, $checkQuery);
                    mysqli_stmt_bind_param($checkStmt, "si", $slug, $service['id']);
                    mysqli_stmt_execute($checkStmt);
                    $checkResult = mysqli_stmt_get_result($checkStmt);
                    
                    if (mysqli_num_rows($checkResult) == 0) {
                        mysqli_stmt_close($checkStmt);
                        break;
                    }
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                    mysqli_stmt_close($checkStmt);
                }
            }
            
            // Update service with slug
            $updateQuery = "UPDATE services SET slug = ? WHERE id = ?";
            $updateStmt = mysqli_prepare($link, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "si", $slug, $service['id']);
            mysqli_stmt_execute($updateStmt);
            mysqli_stmt_close($updateStmt);
            $updated++;
            
            echo "Generated slug for: " . htmlspecialchars($service['title']) . " -> " . htmlspecialchars($slug) . "<br>";
        }
        
        echo "Generated slugs for $updated existing services.<br>";
        echo "<strong>Migration completed successfully!</strong><br>";
        echo "<a href='../modules/services/'>Go to Services</a>";
    } else {
        echo "Error adding slug column: " . mysqli_error($link);
    }
} else {
    echo "Slug column already exists. Migration not needed.";
}

mysqli_close($link);
?>

