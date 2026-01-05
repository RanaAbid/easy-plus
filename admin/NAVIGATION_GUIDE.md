# Admin Navigation Guide - Easy Plus

## Navigation Structure

The admin panel has a comprehensive navigation system with multiple access points:

### 1. Sidebar Navigation (Left Panel)

The main navigation is located in the left sidebar with the following sections:

#### Dashboard
- **Dashboard** - Main admin dashboard with statistics and overview

#### CMS For EASY PLUS
- **Hero Slider** - Manage homepage slider images
- **Features** - Manage feature cards
- **Services** - Manage service listings
- **About Section** - Manage about us content
- **Process/Team** - Manage process items
- **Skills/Progress** - Manage skills progress bars
- **FAQ** - Manage FAQ section
- **CTA Section** - Manage call-to-action sections

#### Content Management
- **Contact Inquiries** - View and manage contact form submissions
- **Testimonials** - Manage client testimonials
- **Team Members** - Manage team member profiles
- **Gallery** - Manage gallery images
- **Blog/News** - Manage blog posts (when created)
- **Portfolio/Projects** - Manage portfolio items (when created)
- **Service Details** - Manage detailed service pages (when created)
- **Pages** - Manage static pages (when created)

#### System
- **Admin Users** - Manage admin user accounts (when created)
- **Menu/Navigation** - Manage website navigation menu (when created)
- **Settings** - Manage general website settings

### 2. Header Navigation (Top Bar)

#### Quick Links Dropdown
A "Quick Links" dropdown button provides fast access to:
- **Content Section:**
  - Hero Slider
  - Services
  - Testimonials
  - Team

- **Management Section:**
  - Contact Inquiries
  - Gallery
  - Settings

#### User Profile Dropdown
The user profile dropdown in the top-right provides:
- **My Profile** - View admin profile
- **Dashboard** - Return to dashboard
- **Settings** - Access settings page
- **View Website** - Open frontend website in new tab
- **Logout** - Sign out of admin panel

### 3. Sidebar Footer

The sidebar footer includes:
- Admin profile picture and name
- **Website** link - Quick access to view frontend
- **Log Out** link - Sign out

## Navigation Features

### Active Menu Highlighting
- The current page's menu item is automatically highlighted
- JavaScript automatically detects the current URL and adds the `active` class
- Active items are visually distinguished in the sidebar

### Quick Access
- Quick Links dropdown for frequently used modules
- Direct links to view the frontend website
- Breadcrumb navigation in module pages

### Responsive Design
- Sidebar collapses on mobile devices
- Burger menu button toggles sidebar visibility
- All navigation is touch-friendly

## URL Structure

All admin module URLs follow this pattern:
```
<?= $app_path ?>modules/{module-name}/
```

Example:
- Dashboard: `<?= $app_path ?>modules/dashboard/`
- Services: `<?= $app_path ?>modules/services/`
- Contacts: `<?= $app_path ?>modules/contacts/`

## Adding New Navigation Items

To add a new navigation item to the sidebar:

1. Open `admin/includes/sidebar.php`
2. Add a new `<li class="menu-item">` entry:
```php
<li class="menu-item">
    <a href="<?= $app_path ?>modules/your-module/" class="menu-link">
        <i data-feather="icon-name" class="menu-icon tf-icons"></i>
        <span class="title">Your Module Name</span>
    </a>
</li>
```

3. Choose an appropriate Feather icon from: https://feathericons.com/

## Navigation Icons

Current icons used:
- `grid` - Dashboard
- `image` - Hero Slider, Gallery
- `star` - Features
- `briefcase` - Services, Portfolio
- `info` - About Section
- `layers` - Process/Team
- `trending-up` - Skills/Progress
- `help-circle` - FAQ
- `phone-call` - CTA Section
- `mail` - Contact Inquiries
- `message-square` - Testimonials
- `users` - Team Members
- `file-text` - Blog/News, Pages
- `file` - Service Details
- `user` - Admin Users
- `menu` - Menu/Navigation
- `settings` - Settings

## Best Practices

1. **Consistent Structure**: All modules follow the same URL pattern
2. **Clear Labels**: Menu items have descriptive names
3. **Logical Grouping**: Related modules are grouped together
4. **Quick Access**: Frequently used modules are in Quick Links
5. **Visual Feedback**: Active items are clearly highlighted

## Troubleshooting

### Menu item not highlighting
- Check that the URL path matches exactly
- Ensure JavaScript is enabled
- Check browser console for errors

### Links not working
- Verify the module directory exists
- Check file permissions
- Ensure `$app_path` is correctly defined

### Icons not showing
- Ensure Feather Icons library is loaded
- Check that icon name is correct
- Run `feather.replace()` if icons are added dynamically

## Support

For navigation issues or questions, refer to:
- Main README files
- Module-specific documentation
- Development team

