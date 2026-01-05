<?php
/**
 * Website Content Integration Script
 * This script will insert the content from Website Content.txt into the database
 * Images are preserved (not changed)
 * 
 * Usage: Run this file once via browser or command line
 * URL: http://yourdomain.com/integrate_content.php
 */

// Include database connection
include('includes/config.php');
include('includes/dbcode.php');

// Start output
echo "<!DOCTYPE html><html><head><title>Content Integration</title><style>body{font-family:Arial;max-width:800px;margin:50px auto;padding:20px;} .success{color:green;} .error{color:red;} .info{color:blue;} ul{list-style-type:none;padding-left:0;} li{padding:5px 0;}</style></head><body>";
echo "<h1>Website Content Integration</h1>";
echo "<p class='info'>This script will populate the database with content from Website Content.txt</p>";
echo "<hr>";

$errors = [];
$success = [];

// Start transaction
mysqli_begin_transaction($link);

try {
    // 1. HERO SLIDER
    echo "<h2>1. Hero Slider</h2>";
    mysqli_query($link, "DELETE FROM hero_sliders");
    $query = "INSERT INTO `hero_sliders` (`heading`, `tagline`, `description`, `status`, `sort_order`) VALUES (?, ?, ?, 'active', 1)";
    $stmt = mysqli_prepare($link, $query);
    $heading = "Smart Accounting. Accurate Tax. Complete Business Support.";
    $tagline = "Focused on Quality. Driven by Accuracy. Committed to Results.";
    $description = "We help entrepreneurs, startups and established companies stay compliant and financially organised with reliable accounting, tax filing and government documentation support. Our work is designed for business owners who want peace of mind, timely submissions and a clear understanding of their financial position.";
    mysqli_stmt_bind_param($stmt, "sss", $heading, $tagline, $description);
    if (mysqli_stmt_execute($stmt)) {
        echo "<p class='success'>✓ Hero slider content inserted</p>";
    } else {
        throw new Exception("Hero slider insert failed: " . mysqli_error($link));
    }
    mysqli_stmt_close($stmt);

    // 2. FEATURES
    echo "<h2>2. Features</h2>";
    mysqli_query($link, "DELETE FROM features");
    $features = [
        ['Focused on Quality', 'We combine practical experience with a structured workflow to deliver consistent, professional service.', 1],
        ['Driven by Accuracy', 'With us, clients receive straightforward guidance, transparent processes and fast turnaround for all their accounting, tax and business support needs.', 2],
        ['Everything You Need Under One Platform', 'We offer a complete range of services including bookkeeping, VAT, corporate tax, business formation, visa processing, PRO services, labour and municipality documentation, and government typing. This makes it easier for you to manage compliance while focusing on growth.', 3]
    ];
    $query = "INSERT INTO `features` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES (?, ?, 'Read More', 'active', ?)";
    $stmt = mysqli_prepare($link, $query);
    foreach ($features as $feature) {
        mysqli_stmt_bind_param($stmt, "ssi", $feature[0], $feature[1], $feature[2]);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    echo "<p class='success'>✓ " . count($features) . " features inserted</p>";

    // 3. ABOUT SECTION
    echo "<h2>3. About Section</h2>";
    mysqli_query($link, "DELETE FROM about_section");
    $subtitle = "A Professional Team Focused on Your Compliance";
    $title = "Easy Plus Accounting & Records Management";
    $description = "Easy Plus Accounting & Records Management is a licensed service provider offering accounting, bookkeeping, taxation and government documentation support. We assist clients from various industries including restaurants, construction, trading, services and new startups.\n\nOur Commitment:\nWe believe in accuracy, consistency and clear communication. We understand how difficult it can be to manage paperwork, financial records and regular filings, so we simplify it through organised processes.\n\nYour Trusted UAE Partner:\nBusinesses rely on us because we focus on delivering dependable results and practical solutions that help them stay compliant with UAE regulations.";
    $query = "INSERT INTO `about_section` (`subtitle`, `title`, `description`, `status`) VALUES (?, ?, ?, 'active')";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sss", $subtitle, $title, $description);
    if (mysqli_stmt_execute($stmt)) {
        echo "<p class='success'>✓ About section content inserted</p>";
    } else {
        throw new Exception("About section insert failed: " . mysqli_error($link));
    }
    mysqli_stmt_close($stmt);

    // 4. PROCESS ITEMS
    echo "<h2>4. Process Items (Our Working Method)</h2>";
    mysqli_query($link, "DELETE FROM process_items");
    $processItems = [
        ['Clean and structured accounting', 'We maintain clean and organised accounting records that provide clarity, accuracy, and a structured overview of your financial operations.', '01', 1],
        ['Timely filings', 'Our team ensures all tax, regulatory, and statutory filings are completed on time, helping your business stay fully compliant and audit-ready.', '02', 2],
        ['Step-by-step guidance', 'We guide you through every financial process step by step, simplifying complex procedures and ensuring you always understand your accounting and compliance requirements.', '03', 3],
        ['Transparent service', 'Our services are fully transparent, providing you with clear reports, open communication, and complete visibility into every aspect of your financial management.', '04', 4],
        ['Practical business advice', 'We offer actionable business advice based on accurate financial data, helping you make informed decisions and drive sustainable growth for your company.', '05', 5]
    ];
    $query = "INSERT INTO `process_items` (`title`, `description`, `number`, `status`, `sort_order`) VALUES (?, ?, ?, 'active', ?)";
    $stmt = mysqli_prepare($link, $query);
    foreach ($processItems as $item) {
        mysqli_stmt_bind_param($stmt, "sssi", $item[0], $item[1], $item[2], $item[3]);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    echo "<p class='success'>✓ " . count($processItems) . " process items inserted</p>";

    // 5. SERVICES
    echo "<h2>5. Services</h2>";
    mysqli_query($link, "DELETE FROM services");
    $services = [
        ['Accounting & Bookkeeping', "Organised Accounting That Helps You Make Better Decisions\n\nWe maintain accurate records, update your books regularly and help you understand your business performance through structured financial reporting. Our service is designed for companies that want a systematic, organised and audit-ready accounting setup.\n\nOur Accounting Services Include:\n• Monthly bookkeeping\n• Complete accounting system setup\n• Chart of accounts development\n• Posting and classification of income & expenses\n• Bank reconciliation\n• Payables and receivables tracking\n• Cash flow monitoring\n• Inventory cost management\n• Profit & loss, balance sheet and cash flow reports\n• Asset register and depreciation schedules\n• Year-end closing and adjustments\n• Preparation for external audits\n• QuickBooks Desktop, Excel and customised accounting tools\n\nWhy It Matters:\nClean accounting helps with VAT, corporate tax, loan applications, investor reporting and day-to-day decision making. We keep everything organised, simple and clear.", 1],
        ['VAT & Corporate Tax', "Complete VAT Management from Registration to Reporting\n\nWe help businesses meet all VAT requirements with accurate documentation, timely filing and proper record maintenance. Our service reduces compliance risks and ensures your submissions are aligned with FTA rules.\n\nVAT Services Offered:\n• VAT registration\n• VAT deregistration\n• VAT return filing\n• Voluntary Disclosure (VD)\n• VAT amendments and correction requests\n• Zero-rated and exempt supply assessment\n• Import/export VAT advisory\n• VAT group support\n• FTA portal assistance\n• VAT record and documentation review\n• VAT penalty settlement guidance\n• Preparation for VAT audits\n\nPurpose of VAT Support:\nProper VAT management helps avoid penalties, keeps your records correct and ensures stable compliance across all operations.\n\nCorporate Tax Services:\nAccurate Corporate Tax Handling for UAE Businesses\n\nWe help clients prepare for corporate tax with clean financial statements, structured documentation and accurate calculations.\n\nCorporate Tax Services Include:\n• CT registration\n• CT deregistration\n• Corporate tax return filing\n• Taxable profit calculation\n• Adjustments and allowable deductions\n• Small Business Relief application\n• Tax planning\n• Record review for compliance\n• Financial documentation for CT audit\n• Guidance for keeping proper books and records\n\nCorporate Tax Is New in the UAE — We Make It Easy to Understand:\nWe help businesses avoid confusion by preparing clear reports and ensuring all requirements are fully met.", 2],
        ['Business Setup & Licensing', "Start and Manage Your Business Confidently\n\nWe support clients with licenses, renewals and updates. Our process covers all steps required for maintaining your legal status with RAK DED and related government departments.\n\nOur Business Setup Services:\n• New license registration\n• Activity selection and modification\n• Trade name reservation\n• License renewal\n• Establishment card updates\n• Ownership transfer\n• MOA amendments\n• Tenancy contract assistance\n• Municipality approvals\n• Guidance for opening a business bank account\n\nSimple, Clear and Fast:\nWhether you're starting a new project or updating an existing one, we take care of all formalities so you can focus on growth.", 3],
        ['Visa & Immigration', "Complete Residency and Visa Support\n\nWe help individuals and businesses manage visa applications with accurate documents and timely processing.\n\nVisa Services Include:\n• Investor visa\n• Partner visa\n• Family visa\n• Entry permits\n• Visa status change\n• Visa renewals\n• Emirates ID typing\n• Medical test typing\n• Mobile number updates in ICP\n• Immigration file and e-channel support\n\nReliable Assistance Throughout the Process:\nWe guide you at every step, making sure each requirement is completed correctly and on time.", 4],
        ['Typing & Document Services', "Accurate Typing and Document Preparation\n\nWe prepare government forms and documents for immigration, labour, municipality and business needs.\n\nOur Document Services:\n• Government typing\n• Visa forms\n• Labour applications\n• Municipality forms\n• NOCs\n• Letters and agreements\n• Power of attorney typing\n• Attestation support\n• English–Arabic translation\n• Printing and photocopy services", 5],
        ['Municipality & Labour Services', "Support for All Local Requirements\n\nWe assist with labour approvals, work permits, establishment setups and municipality-related documentation.\n\nServices Provided:\n• Tenancy contract assistance\n• Establishment labour file\n• Work permit typing\n• Labour quota requests\n• Occupation change requests\n• Municipality updates\n• Compliance documentation", 6],
        ['PRO & Government Services', "Fast and Reliable Government Liaison Support\n\nWe follow up on applications, coordinate with authorities and ensure that your documents move forward without delays.\n\nServices Include:\n• Document clearance\n• Approvals and NOCs\n• Government follow-up\n• MOHRE, ICA and Municipality coordination\n• Payment assistance\n• Appointment scheduling", 7]
    ];
    $query = "INSERT INTO `services` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES (?, ?, 'Learn More', 'active', ?)";
    $stmt = mysqli_prepare($link, $query);
    foreach ($services as $service) {
        mysqli_stmt_bind_param($stmt, "ssi", $service[0], $service[1], $service[2]);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    echo "<p class='success'>✓ " . count($services) . " services inserted</p>";

    // 6. UPDATE SETTINGS
    echo "<h2>6. Settings</h2>";
    $query = "UPDATE `settings` SET `setting_value` = ? WHERE `setting_key` = ?";
    $stmt = mysqli_prepare($link, $query);
    
    $settings = [
        ['skills_section_subtitle', 'Everything You Need Under One Platform'],
        ['skills_section_description', 'We offer a complete range of services including bookkeeping, VAT, corporate tax, business formation, visa processing, PRO services, labour and municipality documentation, and government typing. This makes it easier for you to manage compliance while focusing on growth.']
    ];
    
    foreach ($settings as $setting) {
        mysqli_stmt_bind_param($stmt, "ss", $setting[1], $setting[0]);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    echo "<p class='success'>✓ Settings updated</p>";

    // Commit transaction
    mysqli_commit($link);
    
    echo "<hr>";
    echo "<h2 class='success'>✓ Content Integration Completed Successfully!</h2>";
    echo "<p class='info'>All content has been inserted into the database. Images have been preserved (not changed).</p>";
    echo "<p><strong>Next Steps:</strong></p>";
    echo "<ul>";
    echo "<li>✓ Review the content in the admin panel</li>";
    echo "<li>✓ Add/update images as needed through the admin panel</li>";
    echo "<li>✓ Check the frontend to see the new content</li>";
    echo "</ul>";
    echo "<p><a href='index_dynamic.php'>View Homepage</a> | <a href='admin/'>Go to Admin Panel</a></p>";
    
} catch (Exception $e) {
    // Rollback transaction on error
    mysqli_rollback($link);
    echo "<p class='error'>✗ Error: " . $e->getMessage() . "</p>";
    echo "<p class='error'>Transaction rolled back. No changes were made.</p>";
}

mysqli_close($link);
echo "</body></html>";
?>

