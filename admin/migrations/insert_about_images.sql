-- SQL Script: Insert/Update About Section with Images and Video URL
-- Run this SQL directly in phpMyAdmin or MySQL

-- Update existing about section (if exists)
UPDATE `about_section` 
SET 
    `image_1` = COALESCE(NULLIF(`image_1`, ''), 'ab-1-1.jpg'),
    `image_2` = COALESCE(NULLIF(`image_2`, ''), 'ab-1-2.jpg'),
    `video_url` = COALESCE(NULLIF(`video_url`, ''), 'https://www.youtube.com/watch?v=_sI_Ps7JSEk')
WHERE `status` = 'active'
LIMIT 1;

-- If no record exists, insert new one
INSERT INTO `about_section` 
    (`subtitle`, `title`, `description`, `image_1`, `image_2`, `video_url`, `call_number`, `button_text`, `button_url`, `status`) 
SELECT 
    'Get best It solution 2022',
    'Trust Our Best IT Solution For Your Business',
    'Compellingly mesh cross-platform portals through functional human capital world-class architectures for orthogonal initiatives. Assertively benchmark visionary quality vectors after covalent e-tailers. Intrinsicly enhance 24/7 users and supply process',
    'ab-1-1.jpg',
    'ab-1-2.jpg',
    'https://www.youtube.com/watch?v=_sI_Ps7JSEk',
    '+(666) 888 0000',
    'About Us',
    'about-us/',
    'active'
WHERE NOT EXISTS (SELECT 1 FROM `about_section` WHERE `status` = 'active');

