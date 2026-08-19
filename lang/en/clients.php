<?php

return [
    // Page titles
    'title' => 'Clients',
    'client' => 'Client',
    'clients_list' => 'Clients List',
    'create_client' => 'New Client',
    'export_excel' => 'Export Excel',
    'edit_client' => 'Edit Client',
    'all_statuses' => 'All Statuses',
    'client_details' => 'Client Details',

    // Actions
    'add_client' => 'Add Client',
    'back_to_list' => 'Back to list',
    'recent_projects' => 'Recent Projects',
    'save' => 'Save',
    'cancel' => 'Cancel',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'restore' => 'Restore',
    'force_delete' => 'Delete Permanently',
    'search' => 'Search',
    'filter' => 'Filter',
    'reset' => 'Reset',

    // Form labels
    'name' => 'Company Name',
    'email' => 'Email',
    'status' => 'Status',
    'acquisition_source' => 'Acquisition Source',
    'vat_number' => 'VAT Number',
    'phone_prefix' => 'Prefix',
    'select_prefix' => 'Select',
    'phone' => 'Phone',
    'pec' => 'Certified Email (PEC)',
    'website' => 'Website',
    'linkedin' => 'LinkedIn',
    'notes' => 'Notes',

    // Billing fields
    'billing_info' => 'Billing Information',
    'billing_address' => 'Address',
    'billing_city' => 'City',
    'billing_zip' => 'ZIP Code',
    'billing_province' => 'Province',
    'billing_country' => 'Country',
    'billing_recipient_code' => 'Recipient Code',
    'email_fatturazione' => 'Administration Email',

    // Contact info
    'contact_info' => 'Contact Information',
    'connected_to_stripe' => 'Connected to Stripe',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Active',
    'status_archived' => 'Archived',

    // Acquisition sources
    'all_acquisition_sources' => 'All Sources',
    'acquisition_sources' => [
        'categories' => [
            'direct_search' => 'Direct Search',
            'organic' => 'Organic',
            'ads' => 'Ads (Campaigns)',
            'sponsorship' => 'Sponsorship',
            'other' => 'Other',
        ],
        'options' => [
            'search_linkedin' => 'Direct search on LinkedIn',
            'search_google' => 'Direct search on Google',
            'search_instagram' => 'Direct search on Instagram',
            'search_x' => 'Direct search on X',
            'search_facebook' => 'Direct search on Facebook',
            'search_thread' => 'Direct search on Thread',
            'search_bluesky' => 'Direct search on Bluesky',

            'organic_website' => 'Organic via website',
            'organic_blog' => 'Organic via blog',
            'organic_facebook' => 'Facebook',
            'organic_instagram' => 'Instagram',
            'organic_reddit' => 'Reddit',
            'organic_x' => 'X',
            'organic_thread' => 'Thread',
            'organic_bluesky' => 'Bluesky',

            'ads_google' => 'Google Ads',
            'ads_facebook' => 'Facebook Ads',
            'ads_instagram' => 'Instagram Ads',
            'ads_reddit' => 'Reddit Ads',

            'sponsorship_influencer' => 'Influencer sponsorship',

            'other_word_of_mouth' => 'Word of mouth',
            'other_cold_contact' => 'Cold contact in person',
        ],
    ],

    // Messages
    'created_successfully' => 'Client created successfully',
    'updated_successfully' => 'Client updated successfully',
    'deleted_successfully' => 'Client deleted successfully',
    'restored_successfully' => 'Client restored successfully',
    'permanently_deleted' => 'Client permanently deleted',

    // Validation messages
    'validation' => [
        'name_required' => 'Company name is required',
        'email_required' => 'Email is required',
        'email_invalid' => 'Email is not valid',
        'email_unique' => 'This email is already in use',
        'status_required' => 'Status is required',
        'status_invalid' => 'Selected status is not valid',
        'country_code_invalid' => 'Country code must be 2 characters (e.g., IT, US)',
        'recipient_code_invalid' => 'Recipient code must be 7 characters',
        'website_invalid' => 'Website URL is not valid',
        'linkedin_invalid' => 'LinkedIn URL is not valid',
    ],

    // Table headers
    'table' => [
        'name' => 'Name',
        'email' => 'Email',
        'status' => 'Status',
        'phone' => 'Phone',
        'followups_count' => 'Follow-ups',
        'created_at' => 'Created At',
        'actions' => 'Actions',
    ],

    // Empty states
    'no_clients' => 'No clients found',
    'no_clients_description' => 'Start by adding your first client',

    // Confirmations
    'confirm_delete' => 'Are you sure you want to delete this client?',
    'confirm_force_delete' => 'Are you sure you want to permanently delete this client? This action cannot be undone.',
    'confirm_restore' => 'Do you want to restore this client?',

    // Placeholders
    'placeholder' => [
        'name' => 'E.g.: Acme Ltd.',
        'email' => 'E.g.: info@acme.it',
        'vat_number' => 'E.g.: IT12345678901',
        'phone' => 'E.g.: 333 1234567',
        'pec' => 'E.g.: acme@pec.it',
        'website' => 'E.g.: https://www.acme.it',
        'linkedin' => 'E.g.: https://www.linkedin.com/company/acme',
        'billing_address' => 'E.g.: 10 Via Roma',
        'billing_city' => 'E.g.: Milan',
        'billing_zip' => 'E.g.: 20100',
        'billing_province' => 'E.g.: MI',
        'billing_country' => 'E.g.: IT',
        'billing_recipient_code' => 'E.g.: ABCDEFG',
        'email_fatturazione' => 'E.g.: administration@acme.it',
        'search' => 'Search by name, email, or VAT...',
        'notes' => 'Add notes...',
    ],

    // Hints
    'hint' => [
        'billing_country' => '2-character ISO code (IT, US, FR, etc.)',
        'billing_recipient_code' => 'Unique code for electronic invoicing (7 characters)',
        'billing_province' => 'Province abbreviation (e.g., RM, MI, NA)',
        'email_fatturazione' => 'Email address to send invoices to, if different from the main email',
    ],

    // Empty states for details
    'no_contact_info' => 'No contact information available',
    'no_billing_info' => 'No billing information available',
    'no_web_social' => 'No web or social links available',

    // Actions for client details
    'view_profile' => 'View Profile',
    'view_page' => 'View Page',
    'send_email' => 'Send Email',

    // Additional fields (only those you use)
    'address' => 'Address',
    'fiscal_code' => 'Tax Code',
    'sdi_code' => 'SDI Code',
    'company' => 'Company',

    // Stats Cards
    'stats' => [
        'total' => 'Total Clients',
        'lead' => 'Leads',
        'prospect' => 'Prospects',
        'active' => 'Active',
        'archived' => 'Archived',
        'this_month' => 'this month',
        'of_total' => 'of total',
        'converted' => 'converted',
    ],
    // Follow-up
    'followup' => [
        'section_title' => 'Lead Follow-up',
        'add' => 'Add Follow-up',
        'modal_title' => 'New Follow-up',
        'modal_title_edit' => 'Edit Follow-up',
        'empty' => 'No follow-ups recorded',
        'created' => 'Follow-up saved',
        'updated' => 'Follow-up updated',
        'deleted' => 'Follow-up deleted',
        'add_to_calendar' => 'Add to Google Calendar',
        'confirm_delete' => 'Delete this follow-up?',
        'type' => 'Type',
        'contacted_at' => 'Contact date',
        'last_contact' => 'Last contact',
        'note' => 'Note',
        'note_placeholder' => 'Briefly describe the contact...',
        'type_call' => 'Call',
        'type_email' => 'Email',
        'type_whatsapp' => 'WhatsApp',
        'type_linkedin' => 'LinkedIn',
        'type_meeting' => 'Meeting',
        'type_note' => 'Note',
        'action_call' => 'Call',
        'action_email' => 'Email',
        'completed' => 'Completed',
        'status_done' => 'Done',
        'status_pending' => 'Pending',
        'mark_completed' => 'Mark as completed',
        'mark_not_completed' => 'Mark as not completed',
        'filter' => [
            'all' => 'All follow-ups',
            'never' => 'Never contacted',
            'first_contact' => '1st contact made',
            'second_contact' => '2nd contact made',
            'exhausted' => 'Exhausted (3+)',
        ],
        'validation' => [
            'type_required' => 'Type is required',
            'type_invalid' => 'Invalid type',
            'contacted_at_required' => 'Contact date is required',
            'contacted_at_invalid' => 'Invalid date',
        ],
    ],
];