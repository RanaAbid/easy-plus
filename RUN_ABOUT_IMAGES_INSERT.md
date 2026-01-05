# Insert About Section Images and Video URL

## Quick Start

### Option 1: Run PHP Script (Recommended)
1. Open in browser: `http://localhost/projects/easy-plus/admin/migrations/insert_about_images.php`
2. The script will automatically:
   - Update existing about section with images and video URL (if exists)
   - Create new about section with images and video URL (if doesn't exist)
   - Only updates empty/null fields (preserves existing data)

### Option 2: Run SQL Script
1. Open phpMyAdmin
2. Select your database: `easy-plus`
3. Go to SQL tab
4. Copy and paste the content from `admin/migrations/insert_about_images.sql`
5. Click "Go"

## What Gets Inserted/Updated

- **Image 1**: `ab-1-1.jpg`
- **Image 2**: `ab-1-2.jpg`
- **Video URL**: `https://www.youtube.com/watch?v=_sI_Ps7JSEk`

## Notes

- The script only updates fields that are empty/null
- Existing data is preserved
- If about section doesn't exist, it creates a new one with default content
- Make sure the image files exist in: `assets/img/about/`

## Verify

After running the script:
1. Visit: `http://localhost/projects/easy-plus/admin/modules/about/`
2. Check that images and video URL are set
3. Visit homepage to see the images displayed

