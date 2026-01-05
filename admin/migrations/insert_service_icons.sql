-- SQL Script: Insert/Update Service Icons
-- Run this SQL directly in phpMyAdmin or MySQL
-- This will update services with default icons based on their sort_order/id

-- Update services with icons (only if icon is NULL or empty)
-- Icon mapping: sr-icon-1-1.png, sr-icon-1-2.png, sr-icon-1-3.png, sr-icon-1-4.png, sr-icon-1-5.png, sr-icon-1-6.png

UPDATE `services` s1
INNER JOIN (
    SELECT 
        id,
        title,
        (@row_number := CASE 
            WHEN @prev_sort = sort_order THEN @row_number + 1
            ELSE 1
        END) AS position,
        @prev_sort := sort_order
    FROM 
        services,
        (SELECT @row_number := 0, @prev_sort := NULL) AS vars
    ORDER BY sort_order ASC, id ASC
) s2 ON s1.id = s2.id
SET s1.icon = CASE 
    WHEN (s2.position % 6) = 1 THEN 'sr-icon-1-1.png'
    WHEN (s2.position % 6) = 2 THEN 'sr-icon-1-2.png'
    WHEN (s2.position % 6) = 3 THEN 'sr-icon-1-3.png'
    WHEN (s2.position % 6) = 4 THEN 'sr-icon-1-4.png'
    WHEN (s2.position % 6) = 5 THEN 'sr-icon-1-5.png'
    WHEN (s2.position % 6) = 0 THEN 'sr-icon-1-6.png'
    ELSE 'sr-icon-1-1.png'
END
WHERE s1.icon IS NULL OR s1.icon = '';

-- Alternative simpler approach: Update by ID order (if services are already in correct order)
-- UPDATE services SET icon = 'sr-icon-1-1.png' WHERE id = 1 AND (icon IS NULL OR icon = '');
-- UPDATE services SET icon = 'sr-icon-1-2.png' WHERE id = 2 AND (icon IS NULL OR icon = '');
-- UPDATE services SET icon = 'sr-icon-1-3.png' WHERE id = 3 AND (icon IS NULL OR icon = '');
-- UPDATE services SET icon = 'sr-icon-1-4.png' WHERE id = 4 AND (icon IS NULL OR icon = '');
-- UPDATE services SET icon = 'sr-icon-1-5.png' WHERE id = 5 AND (icon IS NULL OR icon = '');
-- UPDATE services SET icon = 'sr-icon-1-6.png' WHERE id = 6 AND (icon IS NULL OR icon = '');

-- For services beyond 6, cycle through icons
-- UPDATE services SET icon = CASE 
--     WHEN (id % 6) = 1 THEN 'sr-icon-1-1.png'
--     WHEN (id % 6) = 2 THEN 'sr-icon-1-2.png'
--     WHEN (id % 6) = 3 THEN 'sr-icon-1-3.png'
--     WHEN (id % 6) = 4 THEN 'sr-icon-1-4.png'
--     WHEN (id % 6) = 5 THEN 'sr-icon-1-5.png'
--     WHEN (id % 6) = 0 THEN 'sr-icon-1-6.png'
--     ELSE 'sr-icon-1-1.png'
-- END
-- WHERE (icon IS NULL OR icon = '')
-- ORDER BY sort_order ASC, id ASC;

