<?php

return [
    // Page
    'title' => 'Impostazioni Azienda', // Page title
    'sidebar_title' => 'Azienda', // Title in the sidebar
    'description' => 'Configura le informazioni della tua attività per fatture, preventivi e documenti ufficiali.',
    
    // Tabs
    'personal_info' => 'Dati Personali',
    'legal_address_tab' => 'Sede Legale',
    'tax_info' => 'Dati Fiscali',
    'contacts' => 'Contatti',
    'business_info' => 'Attività',
    
    
    // Personal Info
    'owner_first_name' => 'Nome',
    'owner_last_name' => 'Cognome',
    
    // Legal Address
    'legal_address' => 'Indirizzo Legale',
    'legal_city' => 'Città',
    'legal_zip' => 'CAP',
    'legal_province' => 'Provincia',
    'legal_country' => 'Paese',
    
    // Tax Info
    'tax_id' => 'Codice Fiscale',
    'vat_number' => 'Partita IVA',
    'iban' => 'IBAN',
    'default_currency' => 'Valuta Predefinita',

    // Fiscal Regime
    'fiscal_regime_section' => 'Regime Fiscale',
    'tax_regime' => 'Regime Fiscale',
    'substitute_tax_rate' => 'Imposta Sostitutiva',
    'profitability_coefficient' => 'Coeff. Redditività',
    'annual_revenue_cap' => 'Fatturato Annuo Massimo',
    'inps_rate' => 'Aliquota INPS (Gestione Separata)',
    'inps_rate_hint' => 'Usata per stimare i contributi dovuti sui pagamenti incassati. Se vuota, la stima non viene calcolata.',
    'inps_ceiling' => 'Massimale Contributivo INPS',
    'inps_ceiling_hint' => 'Tetto annuo oltre il quale non è più dovuta INPS sul cumulo dell\'anno. Se vuoto, nessun tetto viene applicato.',
    'business_start_date' => 'Inizio Attività',

    // Pension
    'pension_section' => 'Previdenza',
    'pension_fund' => 'Cassa Previdenziale',
    'pension_registration_number' => 'Matricola',
    'pension_registration_date' => 'Data Iscrizione',

    // ATECO
    'ateco_section' => 'Codici ATECO',
    'ateco_code' => 'Codice',
    'ateco_description' => 'Descrizione',
    'ateco_primary' => 'Principale',
    'ateco_add' => 'Aggiungi',
    'ateco_set_primary' => 'Imposta come principale',
    'ateco_no_codes' => 'Nessun codice ATECO aggiunto',
    'ateco_delete_confirm' => 'Eliminare questo codice ATECO?',
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefisso',
    'phone' => 'Telefono',
    
    // Business Info
    'business_name' => 'Nome Attività',
    'business_description' => 'Descrizione Servizi',
    'website' => 'Sito Web',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Salva Modifiche',
    'cancel' => 'Annulla',
    'delete_logo' => 'Elimina Logo',
    'confirm_delete_logo' => 'Sei sicuro di voler eliminare il logo?',
    
    // Messages
    'updated_successfully' => 'Impostazioni azienda aggiornate con successo',
    'logo_deleted' => 'Logo eliminato con successo',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'es. Mario',
        'owner_last_name' => 'es. Rossi',
        'legal_address' => 'es. Via Roma 1',
        'legal_city' => 'es. Milano',
        'legal_zip' => 'es. 20100',
        'legal_province' => 'es. MI',
        'legal_country' => 'es. IT',
        'tax_id' => 'es. RSSMRA80A01H501U',
        'vat_number' => 'es. IT12345678901',
        'iban' => 'es. IT60X0542811101000000123456', 
        'email' => 'es. info@tuaazienda.it',
        'certified_email' => 'es. pec@tuaazienda.it',
        'phone_prefix' => 'es. +39',
        'phone' => 'es. 3331234567',
        'business_name' => 'es. IT Software Solutions',
        'business_description' => 'es. Consulenza e sviluppo software personalizzato',
        'website' => 'es. https://tuaazienda.it',
        'billing_tool_url' => 'es. https://fatture.tuaazienda.it',
        'tax_regime' => 'es. Forfettario',
        'substitute_tax_rate' => 'es. 15',
        'profitability_coefficient' => 'es. 67',
        'annual_revenue_cap' => 'es. 85000',
        'inps_rate' => 'es. 26.07',
        'inps_ceiling' => 'es. 120607',
        'pension_fund' => 'es. GS INPS',
        'pension_registration_number' => 'es. 3300',
        'ateco_code' => 'es. 62.01',
        'ateco_description' => 'es. Produzione di software non connesso all\'edizione',
        'invoice_note' => 'es. Operazione in franchigia IVA ai sensi dell\'art. 1, c. 54-89, L. 190/2014',
    ],
    
    // Hints
    'logo_hint' => 'Formati accettati: JPG, PNG, SVG. Dimensione massima: 2MB.',
    'iban_hint' => 'Codice IBAN del conto corrente (es. IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'Il file deve essere un\'immagine.',
    'logo_max_size' => 'Il logo non può superare 2MB.',
    'logo_allowed_formats' => 'Formati consentiti: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Formato IBAN non valido', 

    // Invoice Note
    'invoice_note_section' => 'Nota Fattura',
    'invoice_note' => 'Nota legale / fiscale',
    'invoice_note_hint' => 'Testo che verrà riportato in calce alla fattura (es. esenzione IVA regime forfettario).',

    // Documents tab
    'documents_tab' => 'Documenti',
    'documents' => [
        'title' => 'Documenti Personali / P.IVA',
        'description' => 'Carica documenti relativi alla tua attività: certificato apertura P.IVA, variazioni ATECO, visure, ecc.',
        'upload' => 'Carica Documento',
        'name' => 'Nome documento',
        'notes' => 'Note',
        'file' => 'File',
        'uploaded_at' => 'Caricato il',
        'no_documents' => 'Nessun documento caricato.',
        'created' => 'Documento caricato con successo.',
        'updated' => 'Documento aggiornato con successo.',
        'deleted' => 'Documento eliminato con successo.',
        'delete_confirm' => 'Eliminare questo documento?',
        'placeholder_name' => 'es. Certificato apertura P.IVA',
        'placeholder_notes' => 'es. Documento ufficiale Agenzia Entrate',
    ],

    // Integrations
    'integrations' => 'Integrazioni',
    'github_pat' => 'GitHub Personal Access Token',
    'github_pat_hint' => 'Genera un token su',
    'github_required_scopes' => 'Permessi richiesti',
    'github_scope_repo' => 'accesso a repository pubblici e privati',
    'github_scope_read_user' => 'lettura profilo utente',
    'billing_tool' => 'Tool di Fatturazione',
    'billing_tool_url' => 'URL del Tool di Fatturazione',
    'billing_tool_url_hint' => 'Inserisci il link del tool che usi per emettere fatture.',
    'google_calendar_connect' => 'Connetti',
    'google_calendar_disconnect' => 'Disconnetti',
    'google_calendar_connected_as' => 'Connesso come',
    'google_calendar_hint' => 'Collega il tuo Google Calendar per sincronizzare automaticamente follow-up clienti, scadenze progetti, task, meeting e pagamenti.',
    'google_calendar_connected' => 'Google Calendar collegato con successo',
    'google_calendar_disconnected' => 'Google Calendar disconnesso',
    'google_calendar_connect_failed' => 'Collegamento a Google Calendar non riuscito, riprova',
];