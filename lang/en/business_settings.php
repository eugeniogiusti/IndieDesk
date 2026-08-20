<?php

return [
    // Page
    'title' => 'Company Settings', // Page title
    'sidebar_title' => 'Company', // Title in the sidebar
    'description' => 'Set up your business information for invoices, quotes, and official documents.',
    
    // Tabs
    'personal_info' => 'Personal Info',
    'legal_address_tab' => 'Registered Office',
    'tax_info' => 'Tax Details',
    'contacts' => 'Contacts',
    'business_info' => 'Business',
    
    
    // Personal Info
    'owner_first_name' => 'First Name',
    'owner_last_name' => 'Last Name',
    
    // Legal Address
    'legal_address' => 'Legal Address',
    'legal_city' => 'City',
    'legal_zip' => 'ZIP Code',
    'legal_province' => 'Province',
    'legal_country' => 'Country',
    
    // Tax Info
    'tax_id' => 'Tax Code',
    'vat_number' => 'VAT Number',
    'iban' => 'IBAN',
    'default_currency' => 'Default Currency',

    // Fiscal Regime
    'fiscal_regime_section' => 'Tax Regime',
    'tax_regime' => 'Tax Regime',
    'substitute_tax_rate' => 'Substitute Tax Rate',
    'profitability_coefficient' => 'Profitability Coefficient',
    'annual_revenue_cap' => 'Annual Revenue Cap',
    'inps_rate' => 'INPS Rate (Gestione Separata)',
    'inps_rate_hint' => 'Used to estimate the social security contributions due on cashed payments. If left empty, the estimate is not calculated.',
    'inps_ceiling' => 'INPS Contribution Ceiling',
    'inps_ceiling_hint' => 'Annual cap above which no further INPS is due on the year\'s cumulative income. If left empty, no cap is applied.',
    'business_start_date' => 'Business Start Date',

    // Pension
    'pension_section' => 'Pension',
    'pension_fund' => 'Pension Fund',
    'pension_registration_number' => 'Registration Number',
    'pension_registration_date' => 'Registration Date',

    // ATECO
    'ateco_section' => 'ATECO Codes',
    'ateco_code' => 'Code',
    'ateco_description' => 'Description',
    'ateco_primary' => 'Primary',
    'ateco_add' => 'Add',
    'ateco_set_primary' => 'Set as primary',
    'ateco_no_codes' => 'No ATECO codes added',
    'ateco_delete_confirm' => 'Delete this ATECO code?',

    // Contacts
    'email' => 'Email',
    'certified_email' => 'Certified Email (PEC)',
    'phone_prefix' => 'Prefix',
    'phone' => 'Phone Number',
    
    // Business Info
    'business_name' => 'Business Name',
    'business_description' => 'Service Description',
    'website' => 'Website',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Save Changes',
    'cancel' => 'Cancel',
    'delete_logo' => 'Delete Logo',
    'confirm_delete_logo' => 'Are you sure you want to delete the logo?',
    
    // Messages
    'updated_successfully' => 'Company settings updated successfully',
    'logo_deleted' => 'Logo deleted successfully',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'e.g. Mario',
        'owner_last_name' => 'e.g. Rossi',
        'legal_address' => 'e.g. Via Roma 1',
        'legal_city' => 'e.g. Milan',
        'legal_zip' => 'e.g. 20100',
        'legal_province' => 'e.g. MI',
        'legal_country' => 'e.g. IT',
        'tax_id' => 'e.g. RSSMRA80A01H501U',
        'vat_number' => 'e.g. IT12345678901',
        'iban' => 'e.g. IT60X0542811101000000123456', 
        'email' => 'e.g. info@yourcompany.com',
        'certified_email' => 'e.g. pec@yourcompany.com',
        'phone_prefix' => 'e.g. +39',
        'phone' => 'e.g. 3331234567',
        'business_name' => 'e.g. IT Software Solutions',
        'business_description' => 'e.g. Custom software development and consulting services',
        'website' => 'e.g. https://yourcompany.com',
        'billing_tool_url' => 'e.g. https://billing.yourcompany.com',
        'tax_regime' => 'e.g. Flat-rate scheme',
        'substitute_tax_rate' => 'e.g. 15',
        'profitability_coefficient' => 'e.g. 67',
        'annual_revenue_cap' => 'e.g. 85000',
        'inps_rate' => 'e.g. 26.07',
        'inps_ceiling' => 'e.g. 120607',
        'pension_fund' => 'e.g. GS INPS',
        'pension_registration_number' => 'e.g. 3300',
        'ateco_code' => 'e.g. 62.01',
        'ateco_description' => 'e.g. Production of software not connected to publishing',
        'invoice_note' => 'e.g. VAT exempt pursuant to Art. 1, par. 54-89, Law 190/2014',
    ],
    
    // Hints
    'logo_hint' => 'Accepted formats: JPG, PNG, SVG. Maximum size: 2MB.',
    'iban_hint' => 'International Bank Account Number (e.g., IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'The file must be an image.',
    'logo_max_size' => 'The logo cannot exceed 2MB.',
    'logo_allowed_formats' => 'Allowed formats: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Invalid IBAN format', 

    // Integrations
    'integrations' => 'Integrations',
    'github_pat' => 'GitHub Personal Access Token',
    'github_pat_hint' => 'Generate a token at',
    'github_required_scopes' => 'Required permissions',
    'github_scope_repo' => 'access to public and private repositories',
    'github_scope_read_user' => 'read user profile',
    'billing_tool' => 'Billing Tool',
    'billing_tool_url' => 'Billing Tool URL',
    'billing_tool_url_hint' => 'Enter the link of the tool you use to issue invoices.',
    'google_calendar_connect' => 'Connect',
    'google_calendar_disconnect' => 'Disconnect',
    'google_calendar_connected_as' => 'Connected as',
    'google_calendar_hint' => 'Link your Google Calendar to automatically sync client follow-ups, project deadlines, tasks, meetings, and payments.',
    'google_calendar_connected' => 'Google Calendar connected successfully',
    'google_calendar_disconnected' => 'Google Calendar disconnected',
    'google_calendar_connect_failed' => 'Failed to connect Google Calendar, please try again',

    // Documents tab
    'documents_tab' => 'Documents',
    'documents' => [
        'title' => 'Personal / VAT Documents',
        'description' => 'Upload documents related to your business: VAT registration, ATECO changes, etc.',
        'upload' => 'Upload Document',
        'name' => 'Document name',
        'notes' => 'Notes',
        'file' => 'File',
        'uploaded_at' => 'Uploaded on',
        'no_documents' => 'No documents uploaded.',
        'created' => 'Document uploaded successfully.',
        'updated' => 'Document updated successfully.',
        'deleted' => 'Document deleted successfully.',
        'delete_confirm' => 'Delete this document?',
        'placeholder_name' => 'e.g. VAT Registration Certificate',
        'placeholder_notes' => 'e.g. Official document from Tax Authority',
    ],

    // Invoice Note
    'invoice_note_section' => 'Invoice Note',
    'invoice_note' => 'Legal / tax note',
    'invoice_note_hint' => 'Text that will appear at the bottom of the invoice.',
];
