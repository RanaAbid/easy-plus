# Insert Service Icons

## Quick Start

### Option 1: Run PHP Script (Recommended)
1. Open in browser: `http://localhost/projects/easy-plus/admin/migrations/insert_service_icons.php`
2. The script will automatically:
   - Fetch all services ordered by `sort_order`, then `id`
   - Update services that don't have icons
   - Assign icons based on position: `sr-icon-1-1.png`, `sr-icon-1-2.png`, etc.
   - Preserve existing icons (won't overwrite)
   - Show a summary of updated/skipped services

### Option 2: Run SQL Script
1. Open phpMyAdmin
2. Select your database: `easy-plus`
3. Go to SQL tab
4. Copy and paste the content from `admin/migrations/insert_service_icons.sql`
5. Click "Go"
6. **Note**: The SQL script uses a simpler approach - you may need to adjust based on your service order

### Option 3: Manual Update via Admin Panel
1. Go to: `http://localhost/projects/easy-plus/admin/modules/services/`
2. Edit each service individually
3. Upload/select icons manually

## Icon Mapping

Icons are assigned based on service position (ordered by `sort_order`, then `id`):

- **Position 1**: `sr-icon-1-1.png`
- **Position 2**: `sr-icon-1-2.png`
- **Position 3**: `sr-icon-1-3.png`
- **Position 4**: `sr-icon-1-4.png`
- **Position 5**: `sr-icon-1-5.png`
- **Position 6**: `sr-icon-1-6.png`
- **Position 7+**: Cycles back (uses position 1 icon, etc.)

## What Gets Updated

- Only services with **empty or NULL** icons are updated
- Existing icons are **preserved** (not overwritten)
- Services are ordered by `sort_order` ASC, then `id` ASC

## Verify

After running the script:
1. Visit: `http://localhost/projects/easy-plus/admin/modules/services/`
2. Check that icons are displayed in the icon column
3. Visit homepage or services page to see icons displayed

## Notes

- Make sure the icon files exist in: `assets/img/icon/`
- Icons should be: `sr-icon-1-1.png` through `sr-icon-1-6.png`
- The script is safe - it won't overwrite existing icons

