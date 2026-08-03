<?php

return [
    // Page titles
    'title' => 'Clienti',
    'client' => 'Cliente',
    'clients_list' => 'Lista Clienti',
    'create_client' => 'Nuovo Cliente',
    'edit_client' => 'Modifica Cliente',
    'all_statuses' => 'Tutti gli stati',
    'client_details' => 'Dettagli Cliente',

    // Actions
    'add_client' => 'Aggiungi Cliente',
    'back_to_list' => 'Torna alla lista',
    'recent_projects' => 'Progetti Recenti',
    'save' => 'Salva',
    'cancel' => 'Annulla',
    'edit' => 'Modifica',
    'delete' => 'Elimina',
    'restore' => 'Ripristina',
    'force_delete' => 'Elimina Definitivamente',
    'search' => 'Cerca',
    'filter' => 'Filtra',
    'reset' => 'Reimposta',

    // Form labels
    'name' => 'Nome / Ragione Sociale',
    'email' => 'Email',
    'status' => 'Stato',
    'acquisition_source' => 'Fonte di Acquisizione',
    'vat_number' => 'Partita IVA',
    'phone_prefix' => 'Prefisso',
    'select_prefix' => 'Seleziona',
    'phone' => 'Telefono',
    'pec' => 'PEC',
    'website' => 'Sito Web',
    'linkedin' => 'LinkedIn',
    'notes' => 'Note',

    // Billing fields
    'billing_info' => 'Dati Fatturazione',
    'billing_address' => 'Indirizzo',
    'billing_city' => 'Città',
    'billing_zip' => 'CAP',
    'billing_province' => 'Provincia',
    'billing_country' => 'Nazione',
    'billing_recipient_code' => 'Codice Destinatario',

    // Contact info
    'contact_info' => 'Informazioni Contatto',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Attivo',
    'status_archived' => 'Archiviato',

    // Acquisition sources
    'all_acquisition_sources' => 'Tutte le fonti',
    'acquisition_sources' => [
        'categories' => [
            'direct_search' => 'Ricerca diretta',
            'organic' => 'Organico',
            'ads' => 'ADS (Campagne)',
            'sponsorship' => 'Sponsorship',
            'other' => 'Altro',
        ],
        'options' => [
            'search_linkedin' => 'Ricerca diretta su LinkedIn',
            'search_google' => 'Ricerca diretta su Google',
            'search_instagram' => 'Ricerca diretta su Instagram',
            'search_x' => 'Ricerca diretta su X',
            'search_facebook' => 'Ricerca diretta su Facebook',
            'search_thread' => 'Ricerca diretta su Thread',
            'search_bluesky' => 'Ricerca diretta su Bluesky',

            'organic_website' => 'Organico tramite sito web',
            'organic_blog' => 'Organico tramite blog',
            'organic_facebook' => 'Facebook',
            'organic_instagram' => 'Instagram',
            'organic_reddit' => 'Reddit',
            'organic_x' => 'X',
            'organic_thread' => 'Thread',
            'organic_bluesky' => 'Bluesky',

            'ads_google' => 'ADS Google',
            'ads_facebook' => 'ADS Facebook',
            'ads_instagram' => 'ADS Instagram',
            'ads_reddit' => 'ADS Reddit',

            'sponsorship_influencer' => 'Sponsorship influencer',

            'other_word_of_mouth' => 'Passaparola',
            'other_cold_contact' => 'Contatto a freddo dal vivo',
        ],
    ],

    // Messages
    'created_successfully' => 'Cliente creato con successo',
    'updated_successfully' => 'Cliente aggiornato con successo',
    'deleted_successfully' => 'Cliente eliminato con successo',
    'restored_successfully' => 'Cliente ripristinato con successo',
    'permanently_deleted' => 'Cliente eliminato definitivamente',

    // Validation messages
    'validation' => [
        'name_required' => 'Il nome è obbligatorio',
        'email_required' => 'L\'email è obbligatoria',
        'email_invalid' => 'L\'email non è valida',
        'email_unique' => 'Questa email è già in uso',
        'status_required' => 'Lo stato è obbligatorio',
        'status_invalid' => 'Lo stato selezionato non è valido',
        'country_code_invalid' => 'Il codice nazione deve essere di 2 caratteri (es: IT, US)',
        'recipient_code_invalid' => 'Il codice destinatario deve essere di 7 caratteri',
        'website_invalid' => 'L\'URL del sito web non è valido',
        'linkedin_invalid' => 'L\'URL di LinkedIn non è valido',
    ],

    // Table headers
    'table' => [
        'name' => 'Nome',
        'email' => 'Email',
        'status' => 'Stato',
        'phone' => 'Telefono',
        'followups_count' => 'Follow-up',
        'created_at' => 'Creato il',
        'actions' => 'Azioni',
    ],

    // Empty states
    'no_clients' => 'Nessun cliente trovato',
    'no_clients_description' => 'Inizia aggiungendo il tuo primo cliente',

    // Confirmations
    'confirm_delete' => 'Sei sicuro di voler eliminare questo cliente?',
    'confirm_force_delete' => 'Sei sicuro di voler eliminare definitivamente questo cliente? Questa azione non può essere annullata.',
    'confirm_restore' => 'Vuoi ripristinare questo cliente?',

    // Placeholders
    'placeholder' => [
        'name' => 'Es: Acme S.r.l.',
        'email' => 'Es: info@acme.it',
        'vat_number' => 'Es: IT12345678901',
        'phone' => 'Es: 333 1234567',
        'pec' => 'Es: acme@pec.it',
        'website' => 'Es: https://www.acme.it',
        'linkedin' => 'Es: https://www.linkedin.com/company/acme',
        'billing_address' => 'Es: Via Roma 10',
        'billing_city' => 'Es: Milano',
        'billing_zip' => 'Es: 20100',
        'billing_province' => 'Es: MI',
        'billing_country' => 'Es: IT',
        'billing_recipient_code' => 'Es: ABCDEFG',
        'search' => 'Cerca per nome, email o piva...',
        'notes' => 'Aggiungi note...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'Codice ISO a 2 caratteri (IT, US, FR, ecc.)',
        'billing_recipient_code' => 'Codice univoco per fatturazione elettronica (7 caratteri)',
        'billing_province' => 'Sigla provincia (es: RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Nessuna informazione di contatto disponibile',
    'no_billing_info' => 'Nessun dato di fatturazione disponibile',
    'no_web_social' => 'Nessun link web o social disponibile',

    // Actions for client details
    'view_profile' => 'Vedi Profilo',
    'view_page' => 'Vedi Pagina',
    'send_email' => 'Invia Email',

    // Additional fields (solo quelli che usi)
    'address' => 'Indirizzo',
    'fiscal_code' => 'Codice Fiscale',
    'sdi_code' => 'Codice SDI',
    'company' => 'Azienda',

        // Stats Cards
    'stats' => [
        'total' => 'Totale Clienti',
        'lead' => 'Lead',
        'prospect' => 'Prospect',
        'active' => 'Attivi',
        'archived' => 'Archiviati',
        'this_month' => 'questo mese',
        'of_total' => 'del totale',
        'converted' => 'convertiti',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Follow-up Lead',
        'add' => 'Aggiungi Follow-up',
        'modal_title' => 'Nuovo Follow-up',
        'modal_title_edit' => 'Modifica Follow-up',
        'empty' => 'Nessun follow-up registrato',
        'created' => 'Follow-up salvato',
        'updated' => 'Follow-up aggiornato',
        'deleted' => 'Follow-up eliminato',
        'add_to_calendar' => 'Aggiungi a Google Calendar',
        'confirm_delete' => 'Eliminare questo follow-up?',
        'type' => 'Tipo',
        'contacted_at' => 'Data contatto',
        'last_contact' => 'Ultimo contatto',
        'note' => 'Nota',
        'note_placeholder' => 'Descrivi brevemente il contatto...',
        'type_call' => 'Chiamata',
        'type_email' => 'Email',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Meeting',
        'type_note' => 'Nota',
        'action_call' => 'Chiama',
        'action_email' => 'Email',
        'filter' => [
            'all' => 'Tutti i follow-up',
            'never' => 'Mai contattato',
            'first_contact' => '1° contatto fatto',
            'second_contact' => '2° contatto fatto',
            'exhausted' => 'Esauriti (3+)',
        ],
        'validation' => [
            'type_required' => 'Il tipo è obbligatorio',
            'type_invalid' => 'Tipo non valido',
            'contacted_at_required' => 'La data di contatto è obbligatoria',
            'contacted_at_invalid' => 'Data non valida',
        ],
    ],
];