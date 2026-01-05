# Team Members and Clients Data Migration

This guide explains how to insert team members and clients data into the database.

## Steps

### Step 1: Create Clients Table (if not exists)

First, create the clients table:

**URL:** `http://localhost/projects/easy-plus/admin/migrations/create_clients_table.php`

This script will:
- Check if the `clients` table exists
- Create the table if it doesn't exist
- The table includes fields: `id`, `name`, `logo`, `website_url`, `sort_order`, `status`, `created_at`, `updated_at`

### Step 2: Insert Team Members and Clients Data

Run the migration script to insert default data:

**URL:** `http://localhost/projects/easy-plus/admin/migrations/insert_team_clients_data.php`

This script will:
- Insert 4 team members:
  - Ahmed Khan - Managing Director
  - Bilal Ahmed - Head of Accounting & Bookkeeping
  - Omar Farooq - VAT & Corporate Tax Specialist
  - Usman Raza - Visa & Immigration Officer
- Insert 6 client logos:
  - br-1-1.png through br-1-6.png

**Note:** The script will skip insertion if data already exists to prevent duplicates.

## Database Tables

### Team Members Table (`team_members`)

Fields:
- `id` - Primary key
- `name` - Team member name
- `position` - Job title/position
- `bio` - Biography/description
- `email` - Email address
- `phone` - Phone number
- `image` - Image filename (stored in `assets/img/easyplus/team/`)
- `facebook_url` - Facebook profile URL
- `twitter_url` - Twitter profile URL
- `linkedin_url` - LinkedIn profile URL
- `instagram_url` - Instagram profile URL
- `sort_order` - Display order
- `status` - active/inactive
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

### Clients Table (`clients`)

Fields:
- `id` - Primary key
- `name` - Client name
- `logo` - Logo filename (stored in `assets/img/brand/`)
- `website_url` - Client website URL (optional)
- `sort_order` - Display order
- `status` - active/inactive
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

## Frontend Display

The team and clients sections will automatically appear on the homepage (`index.php`) once the data is inserted.

- **Team Section:** Displays team members in a carousel layout
- **Clients Section:** Displays client logos in a carousel layout

Both sections are conditionally rendered - they only appear if data exists in the database.

## Managing Team and Clients

After running the migration scripts, you can manage team members and clients through the admin panel:
- Team Members: `/admin/modules/team/`
- Clients: You may need to create an admin module for clients or manage them directly in the database

## Image Requirements

Make sure the following images exist:

**Team Images:**
- `assets/img/easyplus/team/member1.jpg`
- `assets/img/easyplus/team/member2.jpg`
- `assets/img/easyplus/team/member3.jpg`

**Client Logos:**
- `assets/img/brand/br-1-1.png`
- `assets/img/brand/br-1-2.png`
- `assets/img/brand/br-1-3.png`
- `assets/img/brand/br-1-4.png`
- `assets/img/brand/br-1-5.png`
- `assets/img/brand/br-1-6.png`

