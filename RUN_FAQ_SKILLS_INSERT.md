# Insert FAQ Section and Skills Data

## Quick Start

### Option 1: Run PHP Script (Recommended)
1. Open in browser: `http://localhost/projects/easy-plus/admin/migrations/insert_faq_skills_data.php`
2. The script will automatically:
   - Insert/Update FAQ section with content from index_bk.php
   - Insert Skills data (3 skills) if table is empty
   - Show detailed progress and summary

### Option 2: Run SQL Script
1. Open phpMyAdmin
2. Select your database: `easy-plus`
3. Go to SQL tab
4. Copy and paste the content from `admin/migrations/insert_faq_skills_data.sql`
5. Click "Go"

## What Gets Inserted

### FAQ Section:
- **Subtitle**: "Quality. Accuracy. Results."
- **Title**: "Professional & Reliable Support"
- **Description**: Full paragraph text from index_bk.php
- **Image 1**: `faq-1-1.jpg`
- **Image 2**: `faq-1-2.jpg`
- **Video URL**: `https://www.youtube.com/watch?v=_sI_Ps7JSEk`

### Skills Data (3 items):
1. **Bookkeeping & Accounting** - 90%
2. **Tax & VAT Compliance** - 85%
3. **Business Formation & PRO Services** - 95%

## Notes

- The script only inserts skills if the table is empty (preserves existing data)
- FAQ section updates existing record or creates new one
- Make sure the image files exist in: `assets/img/faq/`
- The script is safe - it won't overwrite existing skills data

## Verify

After running the script:
1. Visit: `http://localhost/projects/easy-plus/admin/modules/faq/`
2. Visit: `http://localhost/projects/easy-plus/admin/modules/skills/`
3. Check homepage to see FAQ and Skills sections displayed

