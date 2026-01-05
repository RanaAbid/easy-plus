-- Website Content Integration SQL
-- This file contains INSERT statements to populate the database with content from Website Content.txt
-- Images are left as NULL to preserve existing images

-- ============================================
-- 1. HERO SLIDER CONTENT
-- ============================================
-- Clear existing sliders (optional - comment out if you want to keep existing)
-- DELETE FROM hero_sliders;

INSERT INTO `hero_sliders` (`heading`, `tagline`, `description`, `status`, `sort_order`) VALUES
('Smart Accounting. Accurate Tax. Complete Business Support.', 
 'Focused on Quality. Driven by Accuracy. Committed to Results.',
 'We help entrepreneurs, startups and established companies stay compliant and financially organised with reliable accounting, tax filing and government documentation support. Our work is designed for business owners who want peace of mind, timely submissions and a clear understanding of their financial position.',
 'active', 1);

-- ============================================
-- 2. FEATURES CONTENT
-- ============================================
-- Clear existing features (optional)
-- DELETE FROM features;

INSERT INTO `features` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES
('Focused on Quality', 
 'We combine practical experience with a structured workflow to deliver consistent, professional service.',
 'Read More', 'active', 1),
('Driven by Accuracy', 
 'With us, clients receive straightforward guidance, transparent processes and fast turnaround for all their accounting, tax and business support needs.',
 'Read More', 'active', 2),
('Everything You Need Under One Platform', 
 'We offer a complete range of services including bookkeeping, VAT, corporate tax, business formation, visa processing, PRO services, labour and municipality documentation, and government typing. This makes it easier for you to manage compliance while focusing on growth.',
 'Read More', 'active', 3);

-- ============================================
-- 3. ABOUT SECTION CONTENT
-- ============================================
-- Update or insert about section
DELETE FROM about_section;
INSERT INTO `about_section` (`subtitle`, `title`, `description`, `status`) VALUES
('A Professional Team Focused on Your Compliance',
 'Easy Plus Accounting & Records Management',
 'Easy Plus Accounting & Records Management is a licensed service provider offering accounting, bookkeeping, taxation and government documentation support. We assist clients from various industries including restaurants, construction, trading, services and new startups.

Our Commitment:
We believe in accuracy, consistency and clear communication. We understand how difficult it can be to manage paperwork, financial records and regular filings, so we simplify it through organised processes.

Your Trusted UAE Partner:
Businesses rely on us because we focus on delivering dependable results and practical solutions that help them stay compliant with UAE regulations.',
 'active');

-- ============================================
-- 4. PROCESS ITEMS (Our Working Method)
-- ============================================
-- Clear existing process items (optional)
-- DELETE FROM process_items;

INSERT INTO `process_items` (`title`, `description`, `number`, `status`, `sort_order`) VALUES
('Clean and structured accounting', 
 'We maintain clean and organised accounting records that provide clarity, accuracy, and a structured overview of your financial operations.',
 '01', 'active', 1),
('Timely filings', 
 'Our team ensures all tax, regulatory, and statutory filings are completed on time, helping your business stay fully compliant and audit-ready.',
 '02', 'active', 2),
('Step-by-step guidance', 
 'We guide you through every financial process step by step, simplifying complex procedures and ensuring you always understand your accounting and compliance requirements.',
 '03', 'active', 3),
('Transparent service', 
 'Our services are fully transparent, providing you with clear reports, open communication, and complete visibility into every aspect of your financial management.',
 '04', 'active', 4),
('Practical business advice', 
 'We offer actionable business advice based on accurate financial data, helping you make informed decisions and drive sustainable growth for your company.',
 '05', 'active', 5);

-- ============================================
-- 5. SERVICES CONTENT
-- ============================================
-- Clear existing services (optional)
-- DELETE FROM services;

-- Accounting & Bookkeeping
INSERT INTO `services` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES
('Accounting & Bookkeeping',
 'Organised Accounting That Helps You Make Better Decisions

We maintain accurate records, update your books regularly and help you understand your business performance through structured financial reporting. Our service is designed for companies that want a systematic, organised and audit-ready accounting setup.

Our Accounting Services Include:
• Monthly bookkeeping
• Complete accounting system setup
• Chart of accounts development
• Posting and classification of income & expenses
• Bank reconciliation
• Payables and receivables tracking
• Cash flow monitoring
• Inventory cost management
• Profit & loss, balance sheet and cash flow reports
• Asset register and depreciation schedules
• Year-end closing and adjustments
• Preparation for external audits
• QuickBooks Desktop, Excel and customised accounting tools

Why It Matters:
Clean accounting helps with VAT, corporate tax, loan applications, investor reporting and day-to-day decision making. We keep everything organised, simple and clear.',
 'Learn More', 'active', 1);

-- VAT & Corporate Tax
INSERT INTO `services` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES
('VAT & Corporate Tax',
 'Complete VAT Management from Registration to Reporting

We help businesses meet all VAT requirements with accurate documentation, timely filing and proper record maintenance. Our service reduces compliance risks and ensures your submissions are aligned with FTA rules.

VAT Services Offered:
• VAT registration
• VAT deregistration
• VAT return filing
• Voluntary Disclosure (VD)
• VAT amendments and correction requests
• Zero-rated and exempt supply assessment
• Import/export VAT advisory
• VAT group support
• FTA portal assistance
• VAT record and documentation review
• VAT penalty settlement guidance
• Preparation for VAT audits

Purpose of VAT Support:
Proper VAT management helps avoid penalties, keeps your records correct and ensures stable compliance across all operations.

Corporate Tax Services:
Accurate Corporate Tax Handling for UAE Businesses

We help clients prepare for corporate tax with clean financial statements, structured documentation and accurate calculations.

Corporate Tax Services Include:
• CT registration
• CT deregistration
• Corporate tax return filing
• Taxable profit calculation
• Adjustments and allowable deductions
• Small Business Relief application
• Tax planning
• Record review for compliance
• Financial documentation for CT audit
• Guidance for keeping proper books and records

Corporate Tax Is New in the UAE — We Make It Easy to Understand:
We help businesses avoid confusion by preparing clear reports and ensuring all requirements are fully met.',
 'Learn More', 'active', 2);

-- Business Setup & Licensing
INSERT INTO `services` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES
('Business Setup & Licensing',
 'Start and Manage Your Business Confidently

We support clients with licenses, renewals and updates. Our process covers all steps required for maintaining your legal status with RAK DED and related government departments.

Our Business Setup Services:
• New license registration
• Activity selection and modification
• Trade name reservation
• License renewal
• Establishment card updates
• Ownership transfer
• MOA amendments
• Tenancy contract assistance
• Municipality approvals
• Guidance for opening a business bank account

Simple, Clear and Fast:
Whether you\'re starting a new project or updating an existing one, we take care of all formalities so you can focus on growth.',
 'Learn More', 'active', 3);

-- Visa & Immigration
INSERT INTO `services` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES
('Visa & Immigration',
 'Complete Residency and Visa Support

We help individuals and businesses manage visa applications with accurate documents and timely processing.

Visa Services Include:
• Investor visa
• Partner visa
• Family visa
• Entry permits
• Visa status change
• Visa renewals
• Emirates ID typing
• Medical test typing
• Mobile number updates in ICP
• Immigration file and e-channel support

Reliable Assistance Throughout the Process:
We guide you at every step, making sure each requirement is completed correctly and on time.',
 'Learn More', 'active', 4);

-- Typing & Document Services
INSERT INTO `services` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES
('Typing & Document Services',
 'Accurate Typing and Document Preparation

We prepare government forms and documents for immigration, labour, municipality and business needs.

Our Document Services:
• Government typing
• Visa forms
• Labour applications
• Municipality forms
• NOCs
• Letters and agreements
• Power of attorney typing
• Attestation support
• English–Arabic translation
• Printing and photocopy services',
 'Learn More', 'active', 5);

-- Municipality & Labour Services
INSERT INTO `services` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES
('Municipality & Labour Services',
 'Support for All Local Requirements

We assist with labour approvals, work permits, establishment setups and municipality-related documentation.

Services Provided:
• Tenancy contract assistance
• Establishment labour file
• Work permit typing
• Labour quota requests
• Occupation change requests
• Municipality updates
• Compliance documentation',
 'Learn More', 'active', 6);

-- PRO & Government Services
INSERT INTO `services` (`title`, `description`, `link_text`, `status`, `sort_order`) VALUES
('PRO & Government Services',
 'Fast and Reliable Government Liaison Support

We follow up on applications, coordinate with authorities and ensure that your documents move forward without delays.

Services Include:
• Document clearance
• Approvals and NOCs
• Government follow-up
• MOHRE, ICA and Municipality coordination
• Payment assistance
• Appointment scheduling',
 'Learn More', 'active', 7);

-- ============================================
-- 6. UPDATE SETTINGS
-- ============================================
UPDATE `settings` SET `setting_value` = 'Everything You Need Under One Platform' WHERE `setting_key` = 'skills_section_subtitle';
UPDATE `settings` SET `setting_value` = 'We offer a complete range of services including bookkeeping, VAT, corporate tax, business formation, visa processing, PRO services, labour and municipality documentation, and government typing. This makes it easier for you to manage compliance while focusing on growth.' WHERE `setting_key` = 'skills_section_description';

-- CTA Section (if exists, update; otherwise you can add via admin)
-- UPDATE `cta_section` SET `title` = 'We\'re Ready to Assist You', `subtitle` = 'Our team provides quick response and clear guidance. You can reach us through WhatsApp, phone or email for support with any service.' WHERE `id` = 1;

-- ============================================
-- END OF CONTENT INSERTION
-- ============================================
