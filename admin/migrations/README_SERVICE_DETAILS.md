# Service Details Database Migration

## Overview

The service details page has been improved to support database storage while maintaining backward compatibility with static content. Service details can now be stored in the `service_details` table for easier management through the admin panel.

## What Changed

### 1. Database Function Added
- Added `getServiceDetailsByServiceId()` function in `includes/functions.php`
- This function retrieves service details from the `service_details` table

### 2. Service Details Page Updated
- `services/service-details.php` now checks the database first
- Falls back to static array if no database entry exists
- Supports both database and static content seamlessly

### 3. Features Cleaned Up
- Removed commented features from the static content array
- All active features are now properly displayed

### 4. Image Support
- Each service can have a specific image (1.jpeg through 6.jpeg)
- Images are stored in `assets/img/service/` folder

## How to Use

### Option 1: Run SQL Migration (Recommended)

1. Open phpMyAdmin or your MySQL client
2. Select your database: `easy-plus`
3. Go to SQL tab
4. Copy and paste the content from `admin/migrations/insert_service_details.sql`
5. Click "Go" to execute

This will populate the `service_details` table with all service content from the static array.

### Option 2: Use Admin Panel (Future)

If you have an admin panel module for `service_details`, you can manually add/edit service details through the interface.

### Option 3: Keep Using Static Array

The system will automatically fall back to the static array if no database entry exists, so your site will continue working even without running the migration.

## Database Structure

The `service_details` table includes:
- `service_id` - Links to the service
- `slug` - Unique identifier
- `page_title` - Page title
- `content` - Main content (longtext)
- `features` - Features stored as JSON array or newline-separated text
- `image_1` - Primary image filename
- `image_2` - Secondary image (optional)
- `status` - active/inactive

## Features Format

Features can be stored in two formats:
1. **JSON Array**: `["Feature 1","Feature 2","Feature 3"]`
2. **Newline-separated**: Each feature on a new line (automatically converted to array)

## Image Mapping

- Accounting & Bookkeeping → `1.jpeg`
- VAT & Corporate Tax → `2.jpeg`
- Business Setup & Licensing → `3.jpeg`
- Visa & Immigration → `4.jpeg`
- Typing & Document Services → `5.jpeg`
- Municipality & Labour Services → `6.jpeg`
- PRO & Government Services → `1.jpeg`

## Benefits

1. **Database Storage**: Easy to manage content through admin panel
2. **Backward Compatible**: Falls back to static array if database is empty
3. **Flexible**: Supports both JSON and text-based feature storage
4. **Maintainable**: Content can be updated without changing code

## Verification

After running the migration:
1. Visit any service detail page
2. The content should now come from the database
3. Check that images are displaying correctly
4. Verify that features are listed properly

## Notes

- The migration uses `ON DUPLICATE KEY UPDATE` to safely re-run if needed
- Service IDs are matched by title, so ensure service titles match exactly
- If a service doesn't have database details, it will use the static array fallback
- Features array is automatically filtered to remove empty values
