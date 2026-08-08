<?php

return [
    // Page titles
    'title' => 'Klienci',
    'client' => 'Klient',
    'clients_list' => 'Lista klientów',
    'create_client' => 'Nowy klient',
    'export_excel' => 'Eksportuj do Excel',
    'edit_client' => 'Edytuj klienta',
    'all_statuses' => 'Wszystkie statusy',
    'client_details' => 'Szczegóły klienta',

    // Actions
    'add_client' => 'Dodaj klienta',
    'back_to_list' => 'Wróć do listy',
    'recent_projects' => 'Ostatnie projekty',
    'save' => 'Zapisz',
    'cancel' => 'Anuluj',
    'edit' => 'Edytuj',
    'delete' => 'Usuń',
    'restore' => 'Przywróć',
    'force_delete' => 'Usuń na stałe',
    'search' => 'Szukaj',
    'filter' => 'Filtruj',
    'reset' => 'Resetuj',

    // Form labels
    'name' => 'Nazwa / Firma',
    'email' => 'Email',
    'status' => 'Status',
    'vat_number' => 'NIP',
    'phone_prefix' => 'Prefix',
    'select_prefix' => 'Wybierz',
    'phone' => 'Telefon',
    'pec' => 'PEC',
    'website' => 'Strona www',
    'linkedin' => 'LinkedIn',
    'notes' => 'Notatki',

    // Billing fields
    'billing_info' => 'Dane do faktury',
    'billing_address' => 'Adres',
    'billing_city' => 'Miasto',
    'billing_zip' => 'Kod pocztowy',
    'billing_province' => 'Województwo',
    'billing_country' => 'Kraj',
    'billing_recipient_code' => 'Kod odbiorcy',

    // Contact info
    'contact_info' => 'Dane kontaktowe',
    'web_social' => 'Web i Social',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Aktywny',
    'status_archived' => 'Zarchiwizowany',

    // Messages
    'created_successfully' => 'Klient utworzony pomyślnie',
    'updated_successfully' => 'Klient zaktualizowany pomyślnie',
    'deleted_successfully' => 'Klient usunięty pomyślnie',
    'restored_successfully' => 'Klient przywrócony pomyślnie',
    'permanently_deleted' => 'Klient usunięty na stałe',

    // Validation messages
    'validation' => [
        'name_required' => 'Nazwa jest wymagana',
        'email_required' => 'Email jest wymagany',
        'email_invalid' => 'Email jest nieprawidłowy',
        'email_unique' => 'Ten email jest już używany',
        'status_required' => 'Status jest wymagany',
        'status_invalid' => 'Wybrany status jest nieprawidłowy',
        'country_code_invalid' => 'Kod kraju musi mieć 2 znaki (np. IT, US)',
        'recipient_code_invalid' => 'Kod odbiorcy musi mieć 7 znaków',
        'website_invalid' => 'URL strony www jest nieprawidłowy',
        'linkedin_invalid' => 'URL LinkedIn jest nieprawidłowy',
    ],

    // Table headers
    'table' => [
        'name' => 'Nazwa',
        'email' => 'Email',
        'status' => 'Status',
        'phone' => 'Telefon',
        'created_at' => 'Utworzono',
        'actions' => 'Akcje',
    ],

    // Empty states
    'no_clients' => 'Brak klientów',
    'no_clients_description' => 'Zacznij, dodając pierwszego klienta',

    // Confirmations
    'confirm_delete' => 'Czy na pewno chcesz usunąć tego klienta?',
    'confirm_force_delete' => 'Czy na pewno chcesz usunąć tego klienta na stałe? Tej akcji nie można cofnąć.',
    'confirm_restore' => 'Czy chcesz przywrócić tego klienta?',

    // Placeholders
    'placeholder' => [
        'name' => 'Np. Acme Sp. z o.o.',
        'email' => 'Np. info@acme.pl',
        'vat_number' => 'Np. PL1234567890',
        'phone' => 'Np. 333 1234567',
        'pec' => 'Np. acme@pec.it',
        'website' => 'Np. https://www.acme.pl',
        'linkedin' => 'Np. https://www.linkedin.com/company/acme',
        'billing_address' => 'Np. ul. Roma 10',
        'billing_city' => 'Np. Mediolan',
        'billing_zip' => 'Np. 20100',
        'billing_province' => 'Np. MI',
        'billing_country' => 'Np. IT',
        'billing_recipient_code' => 'Np. ABCDEFG',
        'search' => 'Szukaj po nazwie, emailu lub NIP...',
        'notes' => 'Dodaj notatki...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'Kod ISO 2 znaki (IT, US, FR itd.)',
        'billing_recipient_code' => 'Unikalny kod dla e-fakturowania (7 znaków)',
        'billing_province' => 'Skrót województwa (np. RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Brak danych kontaktowych',
    'no_billing_info' => 'Brak danych do faktury',
    'no_web_social' => 'Brak linków web/social',

    // Actions for client details
    'view_profile' => 'Zobacz profil',
    'view_page' => 'Zobacz stronę',
    'send_email' => 'Wyślij email',

    // Additional fields (solo quelli che usi)
    'address' => 'Adres',
    'fiscal_code' => 'Kod fiskalny',
    'sdi_code' => 'Kod SDI',
    'company' => 'Firma',

        // Stats Cards
    'stats' => [
        'total' => 'Łącznie klientów',
        'lead' => 'Leady',
        'active' => 'Aktywni',
        'archived' => 'Zarchiwizowani',
        'this_month' => 'w tym miesiącu',
        'of_total' => 'z całości',
        'converted' => 'przekształceni',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Follow-up leada',
        'add' => 'Dodaj follow-up',
        'modal_title' => 'Nowy follow-up',
        'modal_title_edit' => 'Edytuj follow-up',
        'empty' => 'Brak zarejestrowanych follow-upów',
        'created' => 'Follow-up zapisany',
        'updated' => 'Follow-up zaktualizowany',
        'deleted' => 'Follow-up usunięty',
        'add_to_calendar' => 'Dodaj do Kalendarza Google',
        'confirm_delete' => 'Usunąć ten follow-up?',
        'type' => 'Typ',
        'contacted_at' => 'Data kontaktu',
        'note' => 'Notatka',
        'note_placeholder' => 'Krótko opisz kontakt...',
        'type_call' => 'Połączenie',
        'type_email' => 'E-mail',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Spotkanie',
        'type_note' => 'Notatka',
        'action_call' => 'Zadzwoń',
        'action_email' => 'E-mail',
        'validation' => [
            'type_required' => 'Typ jest wymagany',
            'type_invalid' => 'Nieprawidłowy typ',
            'contacted_at_required' => 'Data kontaktu jest wymagana',
            'contacted_at_invalid' => 'Nieprawidłowa data',
        ],
    ],
];