-- Migration: Insert Service Details into service_details table
-- This script populates the service_details table with content from the static array
-- Run this in phpMyAdmin or via command line

-- First, ensure the service_details table exists (check database_schema.sql)

-- Get service IDs (adjust if your service IDs are different)
-- You may need to run: SELECT id, title FROM services ORDER BY sort_order, id;

-- Accounting & Bookkeeping (Service ID: 1 - adjust based on your actual IDs)
INSERT INTO `service_details` (`service_id`, `slug`, `page_title`, `content`, `features`, `image_1`, `status`, `sort_order`)
SELECT 
    s.id,
    CONCAT('details-', s.id),
    CONCAT(s.title, ' - Complete Details'),
    'We act as your extended finance team, handling day-to-day accounting tasks while ensuring long-term financial accuracy and compliance. Our approach focuses on transparency, consistency and systemisation, so your books remain audit-ready at all times.

You gain access to structured reports that clearly show income trends, expense control, profitability and cash position — enabling smarter and faster business decisions.

This service is ideal for businesses that want:
• Organised and professional accounting records
• Reliable financial reporting for management decisions
• Reduced risk during audits and tax assessments
• A dependable accounting system without in-house overhead',
    '["Systematic & Audit-Ready Records","Clear Financial Reporting","Compliance-Focused Approach","Monthly Bookkeeping & Reconciliation"]',
    '1.jpeg',
    'active',
    1
FROM services s
WHERE s.title = 'Accounting & Bookkeeping' AND s.status = 'active'
LIMIT 1
ON DUPLICATE KEY UPDATE
    content = VALUES(content),
    features = VALUES(features),
    image_1 = VALUES(image_1),
    updated_at = CURRENT_TIMESTAMP;

-- VAT & Corporate Tax (Service ID: 2)
INSERT INTO `service_details` (`service_id`, `slug`, `page_title`, `content`, `features`, `image_1`, `status`, `sort_order`)
SELECT 
    s.id,
    CONCAT('details-', s.id),
    CONCAT(s.title, ' - Complete Details'),
    'We help businesses meet all VAT and corporate tax requirements with accurate documentation, timely filing and proper record maintenance. Our service reduces compliance risks and ensures your submissions are aligned with FTA rules.

Corporate Tax is new in the UAE — we make it easy to understand by preparing clear reports and ensuring all requirements are fully met, helping you avoid confusion and penalties.

This service is ideal for businesses that need:
• Expert VAT compliance and filing support
• Corporate tax registration and return filing
• Guidance through FTA audits and assessments
• Proper documentation for tax compliance',
    '["VAT Registration & Deregistration","Timely VAT Return Filing","Corporate Tax Compliance","Tax Audit Preparation"]',
    '2.jpeg',
    'active',
    2
FROM services s
WHERE s.title = 'VAT & Corporate Tax' AND s.status = 'active'
LIMIT 1
ON DUPLICATE KEY UPDATE
    content = VALUES(content),
    features = VALUES(features),
    image_1 = VALUES(image_1),
    updated_at = CURRENT_TIMESTAMP;

-- Business Setup & Licensing (Service ID: 3)
INSERT INTO `service_details` (`service_id`, `slug`, `page_title`, `content`, `features`, `image_1`, `status`, `sort_order`)
SELECT 
    s.id,
    CONCAT('details-', s.id),
    CONCAT(s.title, ' - Complete Details'),
    'We support clients with licenses, renewals and updates. Our process covers all steps required for maintaining your legal status with RAK DED and related government departments.

Whether you\'re starting a new project or updating an existing one, we take care of all formalities including establishment card updates, ownership transfers, tenancy contract assistance, and municipality approvals — so you can focus on growth.

This service is ideal for:
• New businesses starting operations in the UAE
• Existing businesses needing license renewals
• Companies requiring activity modifications
• Businesses seeking professional setup guidance',
    '["New License Registration","Activity Selection & Modification","Trade Name Reservation","License Renewal Services"]',
    '3.jpeg',
    'active',
    3
FROM services s
WHERE s.title = 'Business Setup & Licensing' AND s.status = 'active'
LIMIT 1
ON DUPLICATE KEY UPDATE
    content = VALUES(content),
    features = VALUES(features),
    image_1 = VALUES(image_1),
    updated_at = CURRENT_TIMESTAMP;

-- Visa & Immigration (Service ID: 4)
INSERT INTO `service_details` (`service_id`, `slug`, `page_title`, `content`, `features`, `image_1`, `status`, `sort_order`)
SELECT 
    s.id,
    CONCAT('details-', s.id),
    CONCAT(s.title, ' - Complete Details'),
    'We help individuals and businesses manage visa applications with accurate documents and timely processing. Our team guides you at every step, making sure each requirement is completed correctly and on time.

From initial entry permits to family visa processing, visa renewals, Emirates ID typing, and mobile number updates in ICP — we provide reliable assistance throughout the entire immigration process.

This service is ideal for:
• Investors and business partners needing visas
• Families requiring residency permits
• Businesses managing employee visas
• Individuals needing visa renewal or status changes',
    '["Investor & Partner Visas","Family Visa Processing","Entry Permits & Status Changes","Visa Renewals & Updates"]',
    '4.jpeg',
    'active',
    4
FROM services s
WHERE s.title = 'Visa & Immigration' AND s.status = 'active'
LIMIT 1
ON DUPLICATE KEY UPDATE
    content = VALUES(content),
    features = VALUES(features),
    image_1 = VALUES(image_1),
    updated_at = CURRENT_TIMESTAMP;

-- Typing & Document Services (Service ID: 5)
INSERT INTO `service_details` (`service_id`, `slug`, `page_title`, `content`, `features`, `image_1`, `status`, `sort_order`)
SELECT 
    s.id,
    CONCAT('details-', s.id),
    CONCAT(s.title, ' - Complete Details'),
    'We prepare government forms and documents for immigration, labour, municipality and business needs with accuracy and attention to detail. Our typing services ensure all documents meet government requirements.

From visa forms and labour applications to municipality forms, NOCs, letters, agreements, and English–Arabic translation — we provide comprehensive document preparation support along with printing and photocopy services.

This service is ideal for:
• Businesses needing government document preparation
• Individuals requiring official form typing
• Companies needing translation services
• Anyone seeking reliable document processing',
    '["Government Form Typing","Visa & Labour Applications","Municipality Documentation","NOCs & Letters"]',
    '5.jpeg',
    'active',
    5
FROM services s
WHERE s.title = 'Typing & Document Services' AND s.status = 'active'
LIMIT 1
ON DUPLICATE KEY UPDATE
    content = VALUES(content),
    features = VALUES(features),
    image_1 = VALUES(image_1),
    updated_at = CURRENT_TIMESTAMP;

-- Municipality & Labour Services (Service ID: 6)
INSERT INTO `service_details` (`service_id`, `slug`, `page_title`, `content`, `features`, `image_1`, `status`, `sort_order`)
SELECT 
    s.id,
    CONCAT('details-', s.id),
    CONCAT(s.title, ' - Complete Details'),
    'We assist with labour approvals, work permits, establishment setups and municipality-related documentation. Our services ensure your business meets all local labour and municipal requirements.

From setting up establishment labour files to processing work permits, managing labour quotas, handling occupation changes, and ensuring municipality compliance — we provide comprehensive support for all local regulatory requirements.

This service is ideal for:
• Businesses setting up labour files
• Companies needing work permit processing
• Establishments requiring municipality approvals
• Businesses managing labour and municipal compliance',
    '["Tenancy Contract Assistance","Establishment Labour File","Work Permit Typing","Municipality Updates & Compliance"]',
    '6.jpeg',
    'active',
    6
FROM services s
WHERE s.title = 'Municipality & Labour Services' AND s.status = 'active'
LIMIT 1
ON DUPLICATE KEY UPDATE
    content = VALUES(content),
    features = VALUES(features),
    image_1 = VALUES(image_1),
    updated_at = CURRENT_TIMESTAMP;

-- PRO & Government Services (Service ID: 7)
INSERT INTO `service_details` (`service_id`, `slug`, `page_title`, `content`, `features`, `image_1`, `status`, `sort_order`)
SELECT 
    s.id,
    CONCAT('details-', s.id),
    CONCAT(s.title, ' - Complete Details'),
    'We follow up on applications, coordinate with authorities and ensure that your documents move forward without delays. Our PRO services save you time and ensure smooth government interactions.

From document clearance and approvals to coordinating with MOHRE, ICA, and Municipality departments, we handle payment assistance and appointment scheduling — providing fast and reliable government liaison support for all your administrative needs.

This service is ideal for:
• Businesses needing government document processing
• Companies requiring PRO coordination services
• Establishments seeking approval assistance
• Anyone needing reliable government liaison support',
    '["Document Clearance","Approvals & NOCs","Government Follow-Up","MOHRE & ICA Coordination"]',
    '1.jpeg',
    'active',
    7
FROM services s
WHERE s.title = 'PRO & Government Services' AND s.status = 'active'
LIMIT 1
ON DUPLICATE KEY UPDATE
    content = VALUES(content),
    features = VALUES(features),
    image_1 = VALUES(image_1),
    updated_at = CURRENT_TIMESTAMP;
