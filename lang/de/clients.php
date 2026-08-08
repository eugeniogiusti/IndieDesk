<?php

return [
    // Page titles
    'title' => 'Kunden',
    'client' => 'Kunde',
    'clients_list' => 'Kundenliste',
    'create_client' => 'Neuer Kunde',
    'export_excel' => 'Excel exportieren',
    'edit_client' => 'Kunden bearbeiten',
    'all_statuses' => 'Alle Status',
    'client_details' => 'Kundendetails',

    // Actions
    'add_client' => 'Kunden hinzufügen',
    'back_to_list' => 'Zurück zur Liste',
    'recent_projects' => 'Letzte Projekte',
    'save' => 'Speichern',
    'cancel' => 'Abbrechen',
    'edit' => 'Bearbeiten',
    'delete' => 'Löschen',
    'restore' => 'Wiederherstellen',
    'force_delete' => 'Endgültig löschen',
    'search' => 'Suchen',
    'filter' => 'Filtern',
    'reset' => 'Zurücksetzen',

    // Form labels
    'name' => 'Name / Firmenname',
    'email' => 'E-Mail',
    'status' => 'Status',
    'vat_number' => 'USt-IdNr.',
    'phone_prefix' => 'Vorwahl',
    'select_prefix' => 'Auswählen',
    'phone' => 'Telefon',
    'pec' => 'PEC',
    'website' => 'Webseite',
    'linkedin' => 'LinkedIn',
    'notes' => 'Notizen',

    // Billing fields
    'billing_info' => 'Rechnungsdaten',
    'billing_address' => 'Adresse',
    'billing_city' => 'Stadt',
    'billing_zip' => 'PLZ',
    'billing_province' => 'Provinz',
    'billing_country' => 'Land',
    'billing_recipient_code' => 'Empfängercode',

    // Contact info
    'contact_info' => 'Kontaktinformationen',
    'connected_to_stripe' => 'Mit Stripe verbunden',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Aktiv',
    'status_archived' => 'Archiviert',

    // Messages
    'created_successfully' => 'Kunde erfolgreich erstellt',
    'updated_successfully' => 'Kunde erfolgreich aktualisiert',
    'deleted_successfully' => 'Kunde erfolgreich gelöscht',
    'restored_successfully' => 'Kunde erfolgreich wiederhergestellt',
    'permanently_deleted' => 'Kunde endgültig gelöscht',

    // Validation messages
    'validation' => [
        'name_required' => 'Name ist erforderlich',
        'email_required' => 'E-Mail ist erforderlich',
        'email_invalid' => 'E-Mail ist ungültig',
        'email_unique' => 'Diese E-Mail wird bereits verwendet',
        'status_required' => 'Status ist erforderlich',
        'status_invalid' => 'Der ausgewählte Status ist ungültig',
        'country_code_invalid' => 'Ländercode muss 2 Zeichen haben (z. B. IT, US)',
        'recipient_code_invalid' => 'Empfängercode muss 7 Zeichen haben',
        'website_invalid' => 'Website-URL ist ungültig',
        'linkedin_invalid' => 'LinkedIn-URL ist ungültig',
    ],

    // Table headers
    'table' => [
        'name' => 'Name',
        'email' => 'E-Mail',
        'status' => 'Status',
        'phone' => 'Telefon',
        'created_at' => 'Erstellt am',
        'actions' => 'Aktionen',
    ],

    // Empty states
    'no_clients' => 'Keine Kunden gefunden',
    'no_clients_description' => 'Fange an und füge deinen ersten Kunden hinzu',

    // Confirmations
    'confirm_delete' => 'Möchtest du diesen Kunden wirklich löschen?',
    'confirm_force_delete' => 'Möchtest du diesen Kunden endgültig löschen? Diese Aktion kann nicht rückgängig gemacht werden.',
    'confirm_restore' => 'Möchtest du diesen Kunden wiederherstellen?',

    // Placeholders
    'placeholder' => [
        'name' => 'Z. B. Acme S.r.l.',
        'email' => 'Z. B. info@acme.it',
        'vat_number' => 'Z. B. IT12345678901',
        'phone' => 'Z. B. 333 1234567',
        'pec' => 'Z. B. acme@pec.it',
        'website' => 'Z. B. https://www.acme.it',
        'linkedin' => 'Z. B. https://www.linkedin.com/company/acme',
        'billing_address' => 'Z. B. Via Roma 10',
        'billing_city' => 'Z. B. Mailand',
        'billing_zip' => 'Z. B. 20100',
        'billing_province' => 'Z. B. MI',
        'billing_country' => 'Z. B. IT',
        'billing_recipient_code' => 'Z. B. ABCDEFG',
        'search' => 'Suche nach Name, E-Mail oder USt-IdNr...',
        'notes' => 'Notizen hinzufügen...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'ISO-Code mit 2 Zeichen (IT, US, FR usw.)',
        'billing_recipient_code' => 'Eindeutiger Code für eInvoice (7 Zeichen)',
        'billing_province' => 'Provinzkürzel (z. B. RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Keine Kontaktinformationen verfügbar',
    'no_billing_info' => 'Keine Rechnungsdaten verfügbar',
    'no_web_social' => 'Keine Web- oder Social-Links verfügbar',

    // Actions for client details
    'view_profile' => 'Profil ansehen',
    'view_page' => 'Seite ansehen',
    'send_email' => 'E-Mail senden',

    // Additional fields (solo quelli che usi)
    'address' => 'Adresse',
    'fiscal_code' => 'Steuernummer',
    'sdi_code' => 'SDI-Code',
    'company' => 'Unternehmen',

        // Stats Cards
    'stats' => [
        'total' => 'Gesamte Kunden',
        'lead' => 'Leads',
        'active' => 'Aktive',
        'archived' => 'Archivierte',
        'this_month' => 'diesen Monat',
        'of_total' => 'vom Gesamt',
        'converted' => 'konvertiert',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Lead Follow-up',
        'add' => 'Follow-up hinzufügen',
        'modal_title' => 'Neues Follow-up',
        'modal_title_edit' => 'Follow-up bearbeiten',
        'empty' => 'Keine Follow-ups erfasst',
        'created' => 'Follow-up gespeichert',
        'updated' => 'Follow-up aktualisiert',
        'deleted' => 'Follow-up gelöscht',
        'add_to_calendar' => 'Zu Google Kalender hinzufügen',
        'confirm_delete' => 'Dieses Follow-up löschen?',
        'type' => 'Typ',
        'contacted_at' => 'Kontaktdatum',
        'note' => 'Notiz',
        'note_placeholder' => 'Kontakt kurz beschreiben...',
        'type_call' => 'Anruf',
        'type_email' => 'E-Mail',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Meeting',
        'type_note' => 'Notiz',
        'action_call' => 'Anrufen',
        'action_email' => 'E-Mail',
        'validation' => [
            'type_required' => 'Typ ist erforderlich',
            'type_invalid' => 'Ungültiger Typ',
            'contacted_at_required' => 'Kontaktdatum ist erforderlich',
            'contacted_at_invalid' => 'Ungültiges Datum',
        ],
    ],
];