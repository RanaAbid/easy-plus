# Troubleshooting 500 Error

## Quick Fixes

### 1. Check .htaccess RewriteBase
The `.htaccess` file has `RewriteBase /projects/easy-plus/` which is correct for WAMP localhost setup.

**If you're getting 500 errors:**
- Try renaming `.htaccess` to `.htaccess.backup`
- Rename `.htaccess.simple` to `.htaccess`
- Test if the site loads

### 2. Check if mod_rewrite is enabled
In WAMP:
1. Click on WAMP icon
2. Go to Apache → Apache modules
3. Make sure `rewrite_module` is checked/enabled

### 3. Check PHP Error Logs
Look for errors in:
- `C:\wamp64\logs\php_error.log`
- `C:\wamp64\logs\apache_error.log`

### 4. Common Issues Fixed

#### Issue: Slug column doesn't exist
**Solution:** The code now handles this gracefully. The site will work without slugs using ID-based URLs.

#### Issue: .htaccess syntax error
**Solution:** Use the simplified `.htaccess.simple` file instead.

#### Issue: Database connection
**Solution:** Check `includes/dbcode.php` for correct database credentials.

### 5. Step-by-Step Recovery

1. **Disable .htaccess temporarily:**
   ```bash
   # Rename .htaccess to .htaccess.disabled
   ```

2. **Test if site loads:**
   - If yes: The issue is with .htaccess
   - If no: The issue is with PHP code

3. **If .htaccess is the issue:**
   - Use `.htaccess.simple` (minimal rewrite rules)
   - Or remove RewriteBase line
   - Or comment out all rewrite rules

4. **If PHP code is the issue:**
   - Check error logs
   - Make sure database connection works
   - Verify all includes are correct

### 6. Run Migration (Optional)
If you want to enable slug functionality:
1. Visit: `http://localhost/projects/easy-plus/admin/migrations/add_slug_to_services.php`
2. This will add the slug column to the database

### 7. Test Without Slugs
The site should work fine without slugs. All code has been made backward compatible:
- Service URLs will use: `/services/service-details.php?id=1`
- Once migration is run, URLs will use: `/services/service-slug`

## Still Having Issues?

1. **Check Apache error log:**
   - Location: `C:\wamp64\logs\apache_error.log`
   - Look for specific error messages

2. **Enable PHP error display (temporarily):**
   Add to `index.php` at the top:
   ```php
   <?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ```

3. **Check file permissions:**
   - Make sure `.htaccess` is readable
   - Check that all PHP files have correct permissions

