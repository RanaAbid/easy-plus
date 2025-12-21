# Admin Login System

## Default Login Credentials

After importing the database schema, you can login with:

- **Username:** `admin`
- **Password:** `admin123`

⚠️ **IMPORTANT:** Change this password immediately after first login!

## Setup Instructions

1. **Import Database Schema**
   - Run `admin/database_schema.sql` in your MySQL database
   - This creates the `admin_users` table with a default admin account

2. **Access Login Page**
   - Navigate to: `http://localhost/projects/easy-plus-u/admin/`
   - You'll see the login page

3. **Login**
   - Enter username: `admin`
   - Enter password: `admin123`
   - Click "Sign In"

4. **Change Password (Recommended)**
   - After logging in, you should change the default password
   - You can do this by updating the database directly or creating a password change module

## Security Features

- ✅ Password hashing using PHP's `password_hash()` / `password_verify()`
- ✅ Session-based authentication
- ✅ Protected admin pages (all pages check for login)
- ✅ Secure logout (session destruction)
- ✅ Role-based access (admin/editor roles)

## Files Created

- `admin/authenticate.php` - Handles login authentication
- `admin/logout.php` - Handles logout
- `admin/includes/auth.php` - Authentication helper functions
- `admin/database_schema.sql` - Includes `admin_users` table

## How It Works

1. **Login Process:**
   - User enters credentials on `index.php`
   - Form submits to `authenticate.php`
   - Credentials are verified against database
   - If valid, session is created and user redirected to dashboard
   - If invalid, error message shown

2. **Protection:**
   - All admin pages include `admin/includes/auth.php`
   - `checkAdminLogin()` function redirects to login if not authenticated
   - Session data stores user information

3. **Logout:**
   - User clicks logout link
   - `logout.php` destroys session
   - User redirected to login page

## Adding New Admin Users

You can add new admin users directly in the database:

```sql
INSERT INTO admin_users (username, email, password, full_name, role, status) 
VALUES ('newadmin', 'newadmin@example.com', '$2y$10$...', 'New Admin', 'admin', 'active');
```

To generate a password hash, use PHP:
```php
echo password_hash('your_password', PASSWORD_DEFAULT);
```

## Troubleshooting

**Can't login:**
- Check database connection in `includes/dbcode.php`
- Verify `admin_users` table exists
- Check if user status is 'active'
- Verify password hash in database

**Session issues:**
- Check PHP session configuration
- Ensure cookies are enabled
- Check file permissions

**Redirect loops:**
- Verify `$app_path` is correct in `constants.php`
- Check that `auth.php` is included before any output

