-- SQL Script: Insert FAQ Section and Skills Data from index_bk.php
-- Run this SQL directly in phpMyAdmin or MySQL

-- ============================================
-- 1. FAQ SECTION
-- ============================================

-- Update existing FAQ section (if exists)
UPDATE `faq_section` 
SET 
    `subtitle` = COALESCE(NULLIF(`subtitle`, ''), 'Quality. Accuracy. Results.'),
    `title` = COALESCE(NULLIF(`title`, ''), 'Professional & Reliable Support'),
    `description` = COALESCE(NULLIF(`description`, ''), 'We combine practical experience with a structured workflow to deliver consistent, professional service. With us, clients receive straightforward guidance, transparent processes and fast turnaround for all their accounting, tax and business support needs. Our approach ensures every task is handled with precision and accountability. We prioritise clear communication so you always know the status of your work. With reliable support at every step, your business stays organised, compliant and confidently on track.'),
    `image_1` = COALESCE(NULLIF(`image_1`, ''), 'faq-1-1.jpg'),
    `image_2` = COALESCE(NULLIF(`image_2`, ''), 'faq-1-2.jpg'),
    `video_url` = COALESCE(NULLIF(`video_url`, ''), 'https://www.youtube.com/watch?v=_sI_Ps7JSEk')
WHERE `status` = 'active'
LIMIT 1;

-- If no FAQ section exists, insert new one
INSERT INTO `faq_section` 
    (`subtitle`, `title`, `description`, `image_1`, `image_2`, `video_url`, `status`) 
SELECT 
    'Quality. Accuracy. Results.',
    'Professional & Reliable Support',
    'We combine practical experience with a structured workflow to deliver consistent, professional service. With us, clients receive straightforward guidance, transparent processes and fast turnaround for all their accounting, tax and business support needs. Our approach ensures every task is handled with precision and accountability. We prioritise clear communication so you always know the status of your work. With reliable support at every step, your business stays organised, compliant and confidently on track.',
    'faq-1-1.jpg',
    'faq-1-2.jpg',
    'https://www.youtube.com/watch?v=_sI_Ps7JSEk',
    'active'
WHERE NOT EXISTS (SELECT 1 FROM `faq_section` WHERE `status` = 'active');

-- ============================================
-- 2. SKILLS DATA
-- ============================================

-- Insert skills only if table is empty (uncomment the DELETE line if you want to replace existing)
-- DELETE FROM `skills` WHERE `status` = 'active';

INSERT INTO `skills` (`title`, `percentage`, `sort_order`, `status`) 
SELECT 'Bookkeeping & Accounting', 90, 1, 'active'
WHERE NOT EXISTS (SELECT 1 FROM `skills` WHERE `status` = 'active' LIMIT 1);

INSERT INTO `skills` (`title`, `percentage`, `sort_order`, `status`) 
SELECT 'Tax & VAT Compliance', 85, 2, 'active'
WHERE (SELECT COUNT(*) FROM `skills` WHERE `status` = 'active') = 1;

INSERT INTO `skills` (`title`, `percentage`, `sort_order`, `status`) 
SELECT 'Business Formation & PRO Services', 95, 3, 'active'
WHERE (SELECT COUNT(*) FROM `skills` WHERE `status` = 'active') = 2;

-- Alternative: Replace all skills (uncomment to use)
-- DELETE FROM `skills`;
-- INSERT INTO `skills` (`title`, `percentage`, `sort_order`, `status`) VALUES
-- ('Bookkeeping & Accounting', 90, 1, 'active'),
-- ('Tax & VAT Compliance', 85, 2, 'active'),
-- ('Business Formation & PRO Services', 95, 3, 'active');
