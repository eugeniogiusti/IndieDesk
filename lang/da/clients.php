<?php

return [
    // Page titles
    'title' => 'Kunder',
    'client' => 'Kunde',
    'clients_list' => 'Kundeliste',
    'create_client' => 'Ny kunde',
    'export_excel' => 'Eksporter Excel',
    'edit_client' => 'Redigér kunde',
    'all_statuses' => 'Alle statuser',
    'client_details' => 'Kundedetaljer',

    // Actions
    'add_client' => 'Tilføj kunde',
    'back_to_list' => 'Tilbage til listen',
    'recent_projects' => 'Seneste projekter',
    'save' => 'Gem',
    'cancel' => 'Annuller',
    'edit' => 'Redigér',
    'delete' => 'Slet',
    'restore' => 'Gendan',
    'force_delete' => 'Slet permanent',
    'search' => 'Søg',
    'filter' => 'Filtrér',
    'reset' => 'Nulstil',

    // Form labels
    'name' => 'Navn / Firmanavn',
    'email' => 'Email',
    'status' => 'Status',
    'vat_number' => 'Momsnummer',
    'phone_prefix' => 'Forvalg',
    'select_prefix' => 'Vælg',
    'phone' => 'Telefon',
    'pec' => 'PEC',
    'website' => 'Hjemmeside',
    'linkedin' => 'LinkedIn',
    'notes' => 'Noter',

    // Billing fields
    'billing_info' => 'Faktureringsoplysninger',
    'billing_address' => 'Adresse',
    'billing_city' => 'By',
    'billing_zip' => 'Postnr.',
    'billing_province' => 'Provins',
    'billing_country' => 'Land',
    'billing_recipient_code' => 'Modtagerkode',

    // Contact info
    'contact_info' => 'Kontaktoplysninger',
    'connected_to_stripe' => 'Forbundet til Stripe',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Aktiv',
    'status_archived' => 'Arkiveret',

    // Messages
    'created_successfully' => 'Kunde oprettet',
    'updated_successfully' => 'Kunde opdateret',
    'deleted_successfully' => 'Kunde slettet',
    'restored_successfully' => 'Kunde gendannet',
    'permanently_deleted' => 'Kunde slettet permanent',

    // Validation messages
    'validation' => [
        'name_required' => 'Navn er påkrævet',
        'email_required' => 'Email er påkrævet',
        'email_invalid' => 'Email er ugyldig',
        'email_unique' => 'Denne email er allerede i brug',
        'status_required' => 'Status er påkrævet',
        'status_invalid' => 'Den valgte status er ugyldig',
        'country_code_invalid' => 'Landekoden skal være 2 tegn (fx IT, US)',
        'recipient_code_invalid' => 'Modtagerkoden skal være 7 tegn',
        'website_invalid' => 'Website-URL er ugyldig',
        'linkedin_invalid' => 'LinkedIn-URL er ugyldig',
    ],

    // Table headers
    'table' => [
        'name' => 'Navn',
        'email' => 'Email',
        'status' => 'Status',
        'phone' => 'Telefon',
        'created_at' => 'Oprettet den',
        'actions' => 'Handlinger',
    ],

    // Empty states
    'no_clients' => 'Ingen kunder fundet',
    'no_clients_description' => 'Kom i gang ved at tilføje din første kunde',

    // Confirmations
    'confirm_delete' => 'Er du sikker på, at du vil slette denne kunde?',
    'confirm_force_delete' => 'Er du sikker på, at du vil slette denne kunde permanent? Denne handling kan ikke fortrydes.',
    'confirm_restore' => 'Vil du gendanne denne kunde?',

    // Placeholders
    'placeholder' => [
        'name' => 'F.eks. Acme S.r.l.',
        'email' => 'F.eks. info@acme.it',
        'vat_number' => 'F.eks. IT12345678901',
        'phone' => 'F.eks. 333 1234567',
        'pec' => 'F.eks. acme@pec.it',
        'website' => 'F.eks. https://www.acme.it',
        'linkedin' => 'F.eks. https://www.linkedin.com/company/acme',
        'billing_address' => 'F.eks. Via Roma 10',
        'billing_city' => 'F.eks. Milano',
        'billing_zip' => 'F.eks. 20100',
        'billing_province' => 'F.eks. MI',
        'billing_country' => 'F.eks. IT',
        'billing_recipient_code' => 'F.eks. ABCDEFG',
        'search' => 'Søg efter navn, email eller momsnummer...',
        'notes' => 'Tilføj noter...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'ISO-kode med 2 tegn (IT, US, FR osv.)',
        'billing_recipient_code' => 'Unik kode til elektronisk fakturering (7 tegn)',
        'billing_province' => 'Provinsforkortelse (fx RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Ingen kontaktoplysninger tilgængelige',
    'no_billing_info' => 'Ingen faktureringsoplysninger tilgængelige',
    'no_web_social' => 'Ingen web- eller social-links tilgængelige',

    // Actions for client details
    'view_profile' => 'Se profil',
    'view_page' => 'Se side',
    'send_email' => 'Send email',

    // Additional fields (solo quelli che usi)
    'address' => 'Adresse',
    'fiscal_code' => 'Skattenummer',
    'sdi_code' => 'SDI-kode',
    'company' => 'Virksomhed',

        // Stats Cards
    'stats' => [
        'total' => 'Samlet antal kunder',
        'lead' => 'Leads',
        'active' => 'Aktive',
        'archived' => 'Arkiverede',
        'this_month' => 'denne måned',
        'of_total' => 'af totalen',
        'converted' => 'konverteret',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Lead follow-up',
        'add' => 'Tilføj follow-up',
        'modal_title' => 'Ny follow-up',
        'modal_title_edit' => 'Rediger follow-up',
        'empty' => 'Ingen follow-ups registreret',
        'created' => 'Follow-up gemt',
        'updated' => 'Follow-up opdateret',
        'deleted' => 'Follow-up slettet',
        'add_to_calendar' => 'Tilføj til Google Kalender',
        'confirm_delete' => 'Slet denne follow-up?',
        'type' => 'Type',
        'contacted_at' => 'Kontaktdato',
        'note' => 'Note',
        'note_placeholder' => 'Beskriv kort kontakten...',
        'type_call' => 'Opkald',
        'type_email' => 'E-mail',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Møde',
        'type_note' => 'Note',
        'action_call' => 'Ring',
        'action_email' => 'E-mail',
        'validation' => [
            'type_required' => 'Type er påkrævet',
            'type_invalid' => 'Ugyldig type',
            'contacted_at_required' => 'Kontaktdato er påkrævet',
            'contacted_at_invalid' => 'Ugyldig dato',
        ],
    ],
];