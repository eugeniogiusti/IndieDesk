<?php

return [
    // Page titles
    'title' => 'Proiecte',
    'projects_list' => 'Lista proiectelor',
    'create_project' => 'Proiect nou',
    'edit_project' => 'Editează proiectul',
    'project_details' => 'Detalii proiect',

    // Navigation
    'back_to_list' => 'Înapoi la listă',
    'add_project' => 'Adaugă proiect',

    // Form labels - Tab 1: Info Base
    'name' => 'Nume proiect',
    'client' => 'Client',
    'clients' => 'Clienți',
    'is_internal' => 'Proiect intern',
    'description' => 'Descriere',
    'status' => 'Stare',
    'priority' => 'Prioritate',

    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Linkuri dezvoltare',
    'repo_url' => 'Repository',
    'staging_url' => 'Staging',
    'production_url' => 'Producție',
    'figma_url' => 'Figma',
    'docs_url' => 'Documentație',

    // Project type
    'type' => 'Tip proiect',
    'type_client_work' => 'Lucru pentru client',
    'type_product' => 'Produs',
    'type_content' => 'Conținut',
    'type_asset' => 'Asset',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Data de început',
    'due_date' => 'Scadență',

    // Due date labels

    'due_soon' => 'În curând scadent',
    'overdue' => 'Întârziat',

    // Form labels - Tab 3: Notes
    'notes' => 'Note',

    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Ex: E-commerce Acme S.r.l.',
        'client' => 'Caută client...',
        'description' => 'Scurtă descriere a proiectului...',
        'notes' => 'Note și observații generale despre proiect...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],


    // Status options
    'status_draft' => 'Ciornă',
    'status_in_progress' => 'În desfășurare',
    'status_completed' => 'Finalizat',
    'status_archived' => 'Arhivat',

    // Priority options
    'select_priority' => 'Selectează prioritatea',
    'priority_low' => 'Scăzută',
    'priority_medium' => 'Medie',
    'priority_high' => 'Ridicată',

    // Table headers
    'table' => [
        'name' => 'Nume',
        'client' => 'Client',
        'status' => 'Stare',
        'priority' => 'Prioritate',
        'links' => 'Linkuri',
        'created_at' => 'Creat la',
        'actions' => 'Acțiuni',
    ],

    // Internal project label
    'internal_project' => 'Proiect intern',
    'no_clients_linked' => 'Niciun client asociat',
    'internal_project_desc' => 'Acesta este un proiect intern. Nu există informații despre client asociate.',

    // Buttons
    'save' => 'Salvează proiectul',
    'filter' => 'Filtrează',
    'cancel' => 'Anulează',
    'edit' => 'Editează',
    'details' => 'Detalii',
    'client_details' => 'Detalii client',
    'delete' => 'Șterge',
    'reset' => 'Resetează',
    'confirm_delete' => 'Ești sigur că vrei să ștergi acest proiect?',

    // Messages
    'created_successfully' => 'Proiect creat cu succes',
    'updated_successfully' => 'Proiect actualizat cu succes',
    'deleted_successfully' => 'Proiect șters cu succes',
    'restored_successfully' => 'Proiect restaurat cu succes',
    'permanently_deleted' => 'Proiect șters definitiv',

    // Empty state
    'no_projects' => 'Niciun proiect găsit',
    'no_projects_description' => 'Începe creând primul tău proiect',
    'create_first_project' => 'Creează primul proiect',

    // Filters
    'filter_by_client' => 'Filtrează după client',
    'filter_by_status' => 'Filtrează după stare',
    'filter_by_priority' => 'Filtrează după prioritate',
    'search_placeholder' => 'Caută după nume, client sau cod TVA...',
    'all_clients' => 'Toți clienții',
    'all_statuses' => 'Toate stările',
    'all_priorities' => 'Toate prioritățile',

    // Validation messages
    'validation' => [
        'name_required' => 'Numele proiectului este obligatoriu',
        'status_required' => 'Starea este obligatorie',
        'status_invalid' => 'Starea selectată nu este validă',
        'client_not_found' => 'Clientul selectat nu există',
        'priority_invalid' => 'Prioritatea selectată nu este validă',
        'repo_url_invalid' => 'URL-ul repository-ului nu este valid',
        'staging_url_invalid' => 'URL-ul de staging nu este valid',
        'production_url_invalid' => 'URL-ul de producție nu este valid',
        'figma_url_invalid' => 'URL-ul Figma nu este valid',
        'docs_url_invalid' => 'URL-ul documentației nu este valid',
    ],

    // Tabs
    'tab_info' => 'Informații de bază',
    'tab_links' => 'Linkuri dev',
    'tab_notes' => 'Note',

    // Quick links (icons tooltip)
    'open_repo' => 'Deschide repository',
    'open_staging' => 'Deschide staging',
    'open_production' => 'Deschide producția',
    'open_figma' => 'Deschide Figma',
    'open_docs' => 'Deschide documentația',

    // Show page - Sidebar & Tabs
    'overview' => 'Prezentare generală',
    'quick_info' => 'Info rapide',
    'quick_links' => 'Linkuri rapide',
    'created_at' => 'Creat la',
    'updated_at' => 'Actualizat la',

    // Empty states
    'no_description' => 'Fără descriere',
    'no_notes' => 'Fără note',
    'no_priority' => 'Fără prioritate',
    'no_links' => 'Niciun link configurat',
    'no_links_configured' => 'Niciun link configurat',

    // Actions
    'open' => 'Deschide',
    'add_to_calendar' => 'Adaugă în calendar',
    'restore' => 'Restaurează',
    'force_delete' => 'Șterge permanent',
    'confirm_restore' => 'Doriți să restaurați acest proiect?',
    'confirm_force_delete' => 'Sunteți sigur că doriți să ștergeți permanent acest proiect? Această acțiune nu poate fi anulată și datele asociate pot fi pierdute.',

    // Calendar
    'project' => 'Proiect',

    // Stats Cards
    'stats' => [
        'total' => 'Total proiecte',
        'in_progress' => 'În desfășurare',
        'completed' => 'Finalizate',
        'archived' => 'Arhivate',
        'this_month' => 'luna aceasta',
        'this_week' => 'săptămâna aceasta',
        'of_total' => 'din total',
    ],


    // Repository (GitHub)
    'repository' => 'Repository',
    'commit_activity' => 'Attività commit',
    'recent_commits' => 'Commit recenti',
    'less' => 'Meno',
    'more' => 'Di più',
    'no_repository_data' => 'Nessun dato disponibile per questo repository.',
    'repository_fetch_error' => 'Errore nel caricamento dei dati GitHub.',
    'editor_tab' => 'Editor',
];
