<?php
/**
 * Migration: Insert FAQ Section and Skills Data from index_bk.php
 * Run this to add FAQ section and Skills data to database
 * 
 * Access: http://localhost/projects/easy-plus/admin/migrations/insert_faq_skills_data.php
 */

session_start();
include("../includes/constants.php");
include($root_path . "includes/dbcode.php");

echo "<h2>FAQ Section and Skills Data Migration</h2><hr>";

// ============================================
// 1. FAQ SECTION
// ============================================
echo "<h3>1. FAQ Section</h3>";

$checkTable = "SHOW TABLES LIKE 'faq_section'";
$result = mysqli_query($link, $checkTable);

if (mysqli_num_rows($result) == 0) {
    echo "✗ Error: faq_section table does not exist. Please run the database schema first.<br>";
} else {
    // Check if FAQ section already exists
    $checkQuery = "SELECT id FROM faq_section WHERE status = 'active' LIMIT 1";
    $checkResult = mysqli_query($link, $checkQuery);
    $existing = mysqli_fetch_assoc($checkResult);
    
    $subtitle = "Quality. Accuracy. Results.";
    $title = "Professional & Reliable Support";
    $description = "We combine practical experience with a structured workflow to deliver consistent, professional service. With us, clients receive straightforward guidance, transparent processes and fast turnaround for all their accounting, tax and business support needs. Our approach ensures every task is handled with precision and accountability. We prioritise clear communication so you always know the status of your work. With reliable support at every step, your business stays organised, compliant and confidently on track.";
    $image_1 = 'faq-1-1.jpg';
    $image_2 = 'faq-1-2.jpg';
    $video_url = 'https://www.youtube.com/watch?v=_sI_Ps7JSEk';
    $status = 'active';
    
    if ($existing) {
        // Update existing record (only if fields are empty)
        $id = $existing['id'];
        $updateQuery = "UPDATE faq_section SET 
                        subtitle = COALESCE(NULLIF(subtitle, ''), ?),
                        title = COALESCE(NULLIF(title, ''), ?),
                        description = COALESCE(NULLIF(description, ''), ?),
                        image_1 = COALESCE(NULLIF(image_1, ''), ?),
                        image_2 = COALESCE(NULLIF(image_2, ''), ?),
                        video_url = COALESCE(NULLIF(video_url, ''), ?)
                      WHERE id = ?";
        $stmt = mysqli_prepare($link, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssssssi", $subtitle, $title, $description, $image_1, $image_2, $video_url, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "✓ FAQ section updated successfully!<br>";
        } else {
            echo "✗ Error updating FAQ section: " . mysqli_error($link) . "<br>";
        }
        mysqli_stmt_close($stmt);
    } else {
        // Insert new record
        $insertQuery = "INSERT INTO faq_section (subtitle, title, description, image_1, image_2, video_url, status) 
                       VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $insertQuery);
        mysqli_stmt_bind_param($stmt, "sssssss", $subtitle, $title, $description, $image_1, $image_2, $video_url, $status);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "✓ FAQ section created successfully!<br>";
        } else {
            echo "✗ Error inserting FAQ section: " . mysqli_error($link) . "<br>";
        }
        mysqli_stmt_close($stmt);
    }
}

echo "<hr>";

// ============================================
// 2. SKILLS DATA
// ============================================
echo "<h3>2. Skills Data</h3>";

$checkTable = "SHOW TABLES LIKE 'skills'";
$result = mysqli_query($link, $checkTable);

if (mysqli_num_rows($result) == 0) {
    echo "✗ Error: skills table does not exist. Please run the database schema first.<br>";
} else {
    // Check existing skills count
    $countQuery = "SELECT COUNT(*) as count FROM skills WHERE status = 'active'";
    $countResult = mysqli_query($link, $countQuery);
    $countRow = mysqli_fetch_assoc($countResult);
    $existingCount = $countRow['count'];
    
    // Skills data from index_bk.php
    $skillsData = [
        [
            'title' => 'Bookkeeping & Accounting',
            'percentage' => 90,
            'sort_order' => 1
        ],
        [
            'title' => 'Tax & VAT Compliance',
            'percentage' => 85,
            'sort_order' => 2
        ],
        [
            'title' => 'Business Formation & PRO Services',
            'percentage' => 95,
            'sort_order' => 3
        ]
    ];
    
    if ($existingCount == 0) {
        // Insert all skills
        $insertQuery = "INSERT INTO skills (title, percentage, sort_order, status) VALUES (?, ?, ?, 'active')";
        
        $insertedCount = 0;
        $errorCount = 0;
        foreach ($skillsData as $skill) {
            $stmt = mysqli_prepare($link, $insertQuery);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sii", $skill['title'], $skill['percentage'], $skill['sort_order']);
                if (mysqli_stmt_execute($stmt)) {
                    $insertedCount++;
                    echo "✓ Inserted skill: {$skill['title']} ({$skill['percentage']}%)<br>";
                } else {
                    $errorCount++;
                    echo "✗ Error inserting skill {$skill['title']}: " . mysqli_error($link) . "<br>";
                }
                mysqli_stmt_close($stmt);
            } else {
                $errorCount++;
                echo "✗ Error preparing statement for {$skill['title']}: " . mysqli_error($link) . "<br>";
            }
        }
        echo "<strong>Total skills inserted: $insertedCount</strong><br>";
        if ($errorCount > 0) {
            echo "<strong>Errors: $errorCount</strong><br>";
        }
    } else {
        echo "○ Skills already exist ($existingCount skill(s) found). Skipping insertion.<br>";
        echo "To update skills, please use the admin panel: <a href='../modules/skills/'>Skills Module</a><br>";
    }
}

echo "<hr>";
echo "<br><strong>Migration completed!</strong><br>";
echo "<a href='../modules/faq/'>Go to FAQ Module</a> | ";
echo "<a href='../modules/skills/'>Go to Skills Module</a> | ";
echo "<a href='../../'>Go to Homepage</a>";

mysqli_close($link);
?>

