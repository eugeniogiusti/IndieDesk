<?php

return [
    // Page titles
    'title' => 'Klanten',
    'client' => 'Klant',
    'clients_list' => 'Klantenlijst',
    'create_client' => 'Nieuwe klant',
    'export_excel' => 'Excel exporteren',
    'edit_client' => 'Klant bewerken',
    'all_statuses' => 'Alle statussen',
    'client_details' => 'Klantgegevens',

    // Actions
    'add_client' => 'Klant toevoegen',
    'back_to_list' => 'Terug naar lijst',
    'recent_projects' => 'Recente projecten',
    'save' => 'Opslaan',
    'cancel' => 'Annuleren',
    'edit' => 'Bewerken',
    'delete' => 'Verwijderen',
    'restore' => 'Herstellen',
    'force_delete' => 'Permanent verwijderen',
    'search' => 'Zoeken',
    'filter' => 'Filteren',
    'reset' => 'Resetten',

    // Form labels
    'name' => 'Naam / Bedrijfsnaam',
    'email' => 'Email',
    'status' => 'Status',
    'vat_number' => 'BTW-nummer',
    'phone_prefix' => 'Prefix',
    'select_prefix' => 'Selecteren',
    'phone' => 'Telefoon',
    'pec' => 'PEC',
    'website' => 'Website',
    'linkedin' => 'LinkedIn',
    'notes' => 'Notities',

    // Billing fields
    'billing_info' => 'Facturatiegegevens',
    'billing_address' => 'Adres',
    'billing_city' => 'Stad',
    'billing_zip' => 'Postcode',
    'billing_province' => 'Provincie',
    'billing_country' => 'Land',
    'billing_recipient_code' => 'Ontvangerscode',

    // Contact info
    'contact_info' => 'Contactgegevens',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Actief',
    'status_archived' => 'Gearchiveerd',

    // Messages
    'created_successfully' => 'Klant succesvol aangemaakt',
    'updated_successfully' => 'Klant succesvol bijgewerkt',
    'deleted_successfully' => 'Klant succesvol verwijderd',
    'restored_successfully' => 'Klant succesvol hersteld',
    'permanently_deleted' => 'Klant permanent verwijderd',

    // Validation messages
    'validation' => [
        'name_required' => 'Naam is verplicht',
        'email_required' => 'Email is verplicht',
        'email_invalid' => 'Email is ongeldig',
        'email_unique' => 'Deze email is al in gebruik',
        'status_required' => 'Status is verplicht',
        'status_invalid' => 'De geselecteerde status is ongeldig',
        'country_code_invalid' => 'Landcode moet 2 tekens hebben (bv: IT, US)',
        'recipient_code_invalid' => 'Ontvangerscode moet 7 tekens hebben',
        'website_invalid' => 'Website-URL is ongeldig',
        'linkedin_invalid' => 'LinkedIn-URL is ongeldig',
    ],

    // Table headers
    'table' => [
        'name' => 'Naam',
        'email' => 'Email',
        'status' => 'Status',
        'phone' => 'Telefoon',
        'created_at' => 'Aangemaakt op',
        'actions' => 'Acties',
    ],

    // Empty states
    'no_clients' => 'Geen klanten gevonden',
    'no_clients_description' => 'Begin met het toevoegen van je eerste klant',

    // Confirmations
    'confirm_delete' => 'Weet je zeker dat je deze klant wilt verwijderen?',
    'confirm_force_delete' => 'Weet je zeker dat je deze klant definitief wilt verwijderen? Deze actie kan niet ongedaan worden gemaakt.',
    'confirm_restore' => 'Wil je deze klant herstellen?',

    // Placeholders
    'placeholder' => [
        'name' => 'Bijv. Acme S.r.l.',
        'email' => 'Bijv. info@acme.it',
        'vat_number' => 'Bijv. IT12345678901',
        'phone' => 'Bijv. 333 1234567',
        'pec' => 'Bijv. acme@pec.it',
        'website' => 'Bijv. https://www.acme.it',
        'linkedin' => 'Bijv. https://www.linkedin.com/company/acme',
        'billing_address' => 'Bijv. Via Roma 10',
        'billing_city' => 'Bijv. Milaan',
        'billing_zip' => 'Bijv. 20100',
        'billing_province' => 'Bijv. MI',
        'billing_country' => 'Bijv. IT',
        'billing_recipient_code' => 'Bijv. ABCDEFG',
        'search' => 'Zoek op naam, email of btw...',
        'notes' => 'Notities toevoegen...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'ISO-code van 2 tekens (IT, US, FR, enz.)',
        'billing_recipient_code' => 'Unieke code voor e-facturatie (7 tekens)',
        'billing_province' => 'Provincie-afkorting (bv: RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Geen contactinformatie beschikbaar',
    'no_billing_info' => 'Geen facturatiegegevens beschikbaar',
    'no_web_social' => 'Geen web- of social-links beschikbaar',

    // Actions for client details
    'view_profile' => 'Bekijk profiel',
    'view_page' => 'Bekijk pagina',
    'send_email' => 'Email versturen',

    // Additional fields (solo quelli che usi)
    'address' => 'Adres',
    'fiscal_code' => 'Fiscaal nummer',
    'sdi_code' => 'SDI-code',
    'company' => 'Bedrijf',

        // Stats Cards
    'stats' => [
        'total' => 'Totaal klanten',
        'lead' => 'Leads',
        'active' => 'Actief',
        'archived' => 'Gearchiveerd',
        'this_month' => 'deze maand',
        'of_total' => 'van het totaal',
        'converted' => 'geconverteerd',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Lead follow-up',
        'add' => 'Follow-up toevoegen',
        'modal_title' => 'Nieuwe follow-up',
        'modal_title_edit' => 'Follow-up bewerken',
        'empty' => 'Geen follow-ups geregistreerd',
        'created' => 'Follow-up opgeslagen',
        'updated' => 'Follow-up bijgewerkt',
        'deleted' => 'Follow-up verwijderd',
        'add_to_calendar' => 'Toevoegen aan Google Agenda',
        'confirm_delete' => 'Deze follow-up verwijderen?',
        'type' => 'Type',
        'contacted_at' => 'Contactdatum',
        'note' => 'Notitie',
        'note_placeholder' => 'Beschrijf het contact kort...',
        'type_call' => 'Bellen',
        'type_email' => 'E-mail',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Vergadering',
        'type_note' => 'Notitie',
        'action_call' => 'Bellen',
        'action_email' => 'E-mail',
        'validation' => [
            'type_required' => 'Type is verplicht',
            'type_invalid' => 'Ongeldig type',
            'contacted_at_required' => 'Contactdatum is verplicht',
            'contacted_at_invalid' => 'Ongeldige datum',
        ],
    ],
];