<?php
/**
 * Migration Script: Create Clients Table
 * 
 * This script creates the clients table for storing client/brand logos
 * Run this script once: http://localhost/projects/easy-plus/admin/migrations/create_clients_table.php
 */

// Include database connection
require_once(__DIR__ . '/../../includes/dbcode.php');

if (!$link) {
    die("Database connection failed!");
}

echo "<h2>Creating Clients Table</h2>";
echo "<pre>";

// Check if table exists
$checkTable = "SHOW TABLES LIKE 'clients'";
$tableExists = mysqli_query($link, $checkTable);

if ($tableExists && mysqli_num_rows($tableExists) > 0) {
    echo "✓ Clients table already exists.\n";
} else {
    // Create clients table
    $createTable = "CREATE TABLE IF NOT EXISTS `clients` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `logo` varchar(255) NOT NULL,
        `website_url` varchar(255) DEFAULT NULL,
        `sort_order` int(11) DEFAULT 0,
        `status` enum('active','inactive') DEFAULT 'active',
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `status` (`status`),
        KEY `sort_order` (`sort_order`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    if (mysqli_query($link, $createTable)) {
        echo "✓ Clients table created successfully!\n";
    } else {
        echo "✗ Error creating clients table: " . mysqli_error($link) . "\n";
        exit;
    }
}

echo "\nMigration completed successfully!\n";
echo "</pre>";
?>

