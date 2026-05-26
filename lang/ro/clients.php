<?php

return [
    // Page titles
    'title' => 'Clienți',
    'client' => 'Client',
    'clients_list' => 'Lista clienților',
    'create_client' => 'Client nou',
    'edit_client' => 'Editează clientul',
    'all_statuses' => 'Toate stările',
    'client_details' => 'Detalii client',

    // Actions
    'add_client' => 'Adaugă client',
    'back_to_list' => 'Înapoi la listă',
    'recent_projects' => 'Proiecte recente',
    'save' => 'Salvează',
    'cancel' => 'Anulează',
    'edit' => 'Editează',
    'delete' => 'Șterge',
    'restore' => 'Restaurează',
    'force_delete' => 'Șterge definitiv',
    'search' => 'Caută',
    'filter' => 'Filtrează',
    'reset' => 'Resetează',

    // Form labels
    'name' => 'Nume / Denumire socială',
    'email' => 'Email',
    'status' => 'Stare',
    'vat_number' => 'Cod TVA',
    'phone_prefix' => 'Prefix',
    'select_prefix' => 'Selectează',
    'phone' => 'Telefon',
    'pec' => 'PEC',
    'website' => 'Site web',
    'linkedin' => 'LinkedIn',
    'notes' => 'Note',

    // Billing fields
    'billing_info' => 'Date de facturare',
    'billing_address' => 'Adresă',
    'billing_city' => 'Oraș',
    'billing_zip' => 'Cod poștal',
    'billing_province' => 'Județ',
    'billing_country' => 'Țară',
    'billing_recipient_code' => 'Cod destinatar',

    // Contact info
    'contact_info' => 'Informații de contact',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Activ',
    'status_archived' => 'Arhivat',

    // Messages
    'created_successfully' => 'Client creat cu succes',
    'updated_successfully' => 'Client actualizat cu succes',
    'deleted_successfully' => 'Client șters cu succes',
    'restored_successfully' => 'Client restaurat cu succes',
    'permanently_deleted' => 'Client șters definitiv',

    // Validation messages
    'validation' => [
        'name_required' => 'Numele este obligatoriu',
        'email_required' => 'Emailul este obligatoriu',
        'email_invalid' => 'Emailul nu este valid',
        'email_unique' => 'Acest email este deja folosit',
        'status_required' => 'Starea este obligatorie',
        'status_invalid' => 'Starea selectată nu este validă',
        'country_code_invalid' => 'Codul țării trebuie să aibă 2 caractere (ex: IT, US)',
        'recipient_code_invalid' => 'Codul destinatarului trebuie să aibă 7 caractere',
        'website_invalid' => 'URL-ul site-ului web nu este valid',
        'linkedin_invalid' => 'URL-ul LinkedIn nu este valid',
    ],

    // Table headers
    'table' => [
        'name' => 'Nume',
        'email' => 'Email',
        'status' => 'Stare',
        'phone' => 'Telefon',
        'created_at' => 'Creat la',
        'actions' => 'Acțiuni',
    ],

    // Empty states
    'no_clients' => 'Niciun client găsit',
    'no_clients_description' => 'Începe adăugând primul tău client',

    // Confirmations
    'confirm_delete' => 'Ești sigur că vrei să ștergi acest client?',
    'confirm_force_delete' => 'Ești sigur că vrei să ștergi definitiv acest client? Această acțiune nu poate fi anulată.',
    'confirm_restore' => 'Vrei să restaurezi acest client?',

    // Placeholders
    'placeholder' => [
        'name' => 'Ex: Acme S.r.l.',
        'email' => 'Ex: info@acme.it',
        'vat_number' => 'Ex: IT12345678901',
        'phone' => 'Ex: 333 1234567',
        'pec' => 'Ex: acme@pec.it',
        'website' => 'Ex: https://www.acme.it',
        'linkedin' => 'Ex: https://www.linkedin.com/company/acme',
        'billing_address' => 'Ex: Str. Roma 10',
        'billing_city' => 'Ex: Milano',
        'billing_zip' => 'Ex: 20100',
        'billing_province' => 'Ex: MI',
        'billing_country' => 'Ex: IT',
        'billing_recipient_code' => 'Ex: ABCDEFG',
        'search' => 'Caută după nume, email sau cod TVA...',
        'notes' => 'Adaugă note...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'Cod ISO din 2 caractere (IT, US, FR etc.)',
        'billing_recipient_code' => 'Cod unic pentru facturare electronică (7 caractere)',
        'billing_province' => 'Abreviere județ (ex: RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Nicio informație de contact disponibilă',
    'no_billing_info' => 'Nicio informație de facturare disponibilă',
    'no_web_social' => 'Niciun link web sau social disponibil',

    // Actions for client details
    'view_profile' => 'Vezi profilul',
    'view_page' => 'Vezi pagina',
    'send_email' => 'Trimite email',

    // Additional fields (solo quelli che usi)
    'address' => 'Adresă',
    'fiscal_code' => 'Cod fiscal',
    'sdi_code' => 'Cod SDI',
    'company' => 'Companie',

        // Stats Cards
    'stats' => [
        'total' => 'Total clienți',
        'lead' => 'Lead',
        'active' => 'Activi',
        'archived' => 'Arhivați',
        'this_month' => 'luna aceasta',
        'of_total' => 'din total',
        'converted' => 'convertiți',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Follow-up lead',
        'add' => 'Adaugă follow-up',
        'modal_title' => 'Follow-up nou',
        'modal_title_edit' => 'Editare follow-up',
        'empty' => 'Niciun follow-up înregistrat',
        'created' => 'Follow-up salvat',
        'updated' => 'Follow-up actualizat',
        'deleted' => 'Follow-up șters',
        'add_to_calendar' => 'Adaugă în Google Calendar',
        'confirm_delete' => 'Ștergeți acest follow-up?',
        'type' => 'Tip',
        'contacted_at' => 'Data contactului',
        'note' => 'Notă',
        'note_placeholder' => 'Descrieți pe scurt contactul...',
        'type_call' => 'Apel',
        'type_email' => 'E-mail',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Întâlnire',
        'type_note' => 'Notă',
        'action_call' => 'Apelați',
        'action_email' => 'E-mail',
        'validation' => [
            'type_required' => 'Tipul este obligatoriu',
            'type_invalid' => 'Tip invalid',
            'contacted_at_required' => 'Data contactului este obligatorie',
            'contacted_at_invalid' => 'Dată invalidă',
        ],
    ],
];