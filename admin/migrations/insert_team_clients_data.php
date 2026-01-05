<?php
/**
 * Migration Script: Insert Team Members and Clients Data
 * 
 * This script inserts default team members and clients data
 * Run this script once: http://localhost/projects/easy-plus/admin/migrations/insert_team_clients_data.php
 */

// Include database connection
require_once(__DIR__ . '/../../includes/dbcode.php');

if (!$link) {
    die("Database connection failed!");
}

echo "<h2>Inserting Team Members and Clients Data</h2>";
echo "<pre>";

// Team Members Data
$teamMembers = [
    [
        'name' => 'Ahmed Khan',
        'position' => 'Managing Director',
        'bio' => 'Experienced leader with expertise in business management and strategic planning.',
        'image' => 'member3.jpg',
        'facebook_url' => 'https://www.facebook.com/',
        'instagram_url' => 'https://www.instagram.com/',
        'linkedin_url' => 'https://www.linkedin.com/',
        'sort_order' => 1
    ],
    [
        'name' => 'Bilal Ahmed',
        'position' => 'Head of Accounting & Bookkeeping',
        'bio' => 'Expert in financial accounting, bookkeeping, and financial reporting.',
        'image' => 'member1.jpg',
        'facebook_url' => 'https://www.facebook.com/',
        'instagram_url' => 'https://www.instagram.com/',
        'linkedin_url' => 'https://www.linkedin.com/',
        'sort_order' => 2
    ],
    [
        'name' => 'Omar Farooq',
        'position' => 'VAT & Corporate Tax Specialist',
        'bio' => 'Specialized in VAT compliance, corporate tax planning, and tax advisory services.',
        'image' => 'member2.jpg',
        'facebook_url' => 'https://www.facebook.com/',
        'instagram_url' => 'https://www.instagram.com/',
        'linkedin_url' => 'https://www.linkedin.com/',
        'sort_order' => 3
    ],
    [
        'name' => 'Usman Raza',
        'position' => 'Visa & Immigration Officer',
        'bio' => 'Experienced in visa processing, immigration services, and PRO documentation.',
        'image' => 'member3.jpg',
        'facebook_url' => 'https://www.facebook.com/',
        'instagram_url' => 'https://www.instagram.com/',
        'linkedin_url' => 'https://www.linkedin.com/',
        'sort_order' => 4
    ]
];

// Check if team_members table exists
$checkTable = "SHOW TABLES LIKE 'team_members'";
$tableExists = mysqli_query($link, $checkTable);

if ($tableExists && mysqli_num_rows($tableExists) > 0) {
    echo "✓ Team members table exists.\n";
    
    // Check if team members already exist
    $checkMembers = "SELECT COUNT(*) as count FROM team_members";
    $result = mysqli_query($link, $checkMembers);
    $row = mysqli_fetch_assoc($result);
    $existingCount = $row['count'];
    
    if ($existingCount > 0) {
        echo "⚠ Team members already exist ({$existingCount} records). Skipping team members insertion.\n";
    } else {
        echo "\nInserting team members...\n";
        $inserted = 0;
        $skipped = 0;
        
        $stmt = mysqli_prepare($link, "INSERT INTO team_members (name, position, bio, image, facebook_url, instagram_url, linkedin_url, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'active')");
        
        foreach ($teamMembers as $member) {
            mysqli_stmt_bind_param($stmt, "sssssssi", 
                $member['name'],
                $member['position'],
                $member['bio'],
                $member['image'],
                $member['facebook_url'],
                $member['instagram_url'],
                $member['linkedin_url'],
                $member['sort_order']
            );
            
            if (mysqli_stmt_execute($stmt)) {
                $inserted++;
                echo "  ✓ Inserted: {$member['name']} - {$member['position']}\n";
            } else {
                $skipped++;
                echo "  ✗ Failed: {$member['name']} - " . mysqli_error($link) . "\n";
            }
        }
        
        mysqli_stmt_close($stmt);
        echo "\nTeam members summary: {$inserted} inserted, {$skipped} failed.\n";
    }
} else {
    echo "✗ Team members table does not exist. Please create it first.\n";
}

// Clients Data
$clients = [
    ['name' => 'Client 1', 'logo' => 'br-1-1.png', 'sort_order' => 1],
    ['name' => 'Client 2', 'logo' => 'br-1-2.png', 'sort_order' => 2],
    ['name' => 'Client 3', 'logo' => 'br-1-3.png', 'sort_order' => 3],
    ['name' => 'Client 4', 'logo' => 'br-1-4.png', 'sort_order' => 4],
    ['name' => 'Client 5', 'logo' => 'br-1-5.png', 'sort_order' => 5],
    ['name' => 'Client 6', 'logo' => 'br-1-6.png', 'sort_order' => 6]
];

// Check if clients table exists
$checkTable = "SHOW TABLES LIKE 'clients'";
$tableExists = mysqli_query($link, $checkTable);

if ($tableExists && mysqli_num_rows($tableExists) > 0) {
    echo "\n✓ Clients table exists.\n";
    
    // Check if clients already exist
    $checkClients = "SELECT COUNT(*) as count FROM clients";
    $result = mysqli_query($link, $checkClients);
    $row = mysqli_fetch_assoc($result);
    $existingCount = $row['count'];
    
    if ($existingCount > 0) {
        echo "⚠ Clients already exist ({$existingCount} records). Skipping clients insertion.\n";
    } else {
        echo "\nInserting clients...\n";
        $inserted = 0;
        $skipped = 0;
        
        $stmt = mysqli_prepare($link, "INSERT INTO clients (name, logo, sort_order, status) VALUES (?, ?, ?, 'active')");
        
        foreach ($clients as $client) {
            mysqli_stmt_bind_param($stmt, "ssi", 
                $client['name'],
                $client['logo'],
                $client['sort_order']
            );
            
            if (mysqli_stmt_execute($stmt)) {
                $inserted++;
                echo "  ✓ Inserted: {$client['name']} - {$client['logo']}\n";
            } else {
                $skipped++;
                echo "  ✗ Failed: {$client['name']} - " . mysqli_error($link) . "\n";
            }
        }
        
        mysqli_stmt_close($stmt);
        echo "\nClients summary: {$inserted} inserted, {$skipped} failed.\n";
    }
} else {
    echo "\n✗ Clients table does not exist. Please run create_clients_table.php first.\n";
}

echo "\nMigration completed!\n";
echo "</pre>";
?>

