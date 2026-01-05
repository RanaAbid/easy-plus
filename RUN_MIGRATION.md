# Database Migration - Add Slug Column

## Quick Start

1. **Run the migration script:**
   - Open in browser: `http://localhost/projects/easy-plus/admin/migrations/add_slug_to_services.php`
   - The script will automatically:
     - Add `slug` column to `services` table
     - Generate unique slugs for all existing services
     - Add unique index on slug column

2. **Verify the migration:**
   - Check that all services now have slugs
   - Visit admin panel: `admin/modules/services/`
   - All service URLs will now use slugs instead of IDs

## What the Migration Does

1. **Adds slug column** to `services` table (if it doesn't exist)
2. **Generates slugs** for all existing services based on their titles
3. **Ensures uniqueness** - if two services have similar titles, adds numeric suffix
4. **Creates unique index** on slug column for performance

## After Migration

- All service URLs will use slugs: `/services/accounting-bookkeeping`
- Old ID-based URLs will automatically redirect to slug URLs
- New services will automatically get slugs when created/updated

## Manual SQL (Alternative)

If you prefer to run SQL manually:

```sql
-- Add slug column
ALTER TABLE services ADD COLUMN slug VARCHAR(255) NULL AFTER title;

-- Add unique index
ALTER TABLE services ADD UNIQUE KEY slug (slug);

-- Generate slugs for existing services (run for each service)
UPDATE services SET slug = LOWER(REPLACE(REPLACE(REPLACE(title, ' ', '-'), '&', 'and'), ' ', '-')) WHERE slug IS NULL;
```

## Troubleshooting

- **If migration fails:** Check database permissions
- **If slugs are empty:** Run the migration script again
- **If duplicate slugs:** The script handles this automatically

