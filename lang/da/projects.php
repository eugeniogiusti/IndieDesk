<?php

return [
    // Page titles
    'title' => 'Projekter',
    'projects_list' => 'Projektliste',
    'create_project' => 'Nyt projekt',
    'edit_project' => 'Redigér projekt',
    'project_details' => 'Projektdetaljer',
    
    // Navigation
    'back_to_list' => 'Tilbage til listen',
    'add_project' => 'Tilføj projekt',
    
    // Form labels - Tab 1: Info Base
    'name' => 'Projektnavn',
    'client' => 'Kunde',
    'clients' => 'Kunder',
    'is_internal' => 'Internt projekt',
    'description' => 'Beskrivelse',
    'status' => 'Status',
    'priority' => 'Prioritet',
    
    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Udviklingslinks',
    'repo_url' => 'Repository',
    'staging_url' => 'Staging',
    'production_url' => 'Produktion',
    'figma_url' => 'Figma',
    'docs_url' => 'Dokumentation',

    // Project type
    'type' => 'Projekttype',
    'type_client_work' => 'Kundearbejde',
    'type_product' => 'Produkt',
    'type_content' => 'Indhold',
    'type_asset' => 'Asset',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Startdato',
    'due_date' => 'Forfald',

    // Due date labels

    'due_soon' => 'Snart forfald',
    'overdue' => 'Forfalden',
    
    // Form labels - Tab 3: Notes
    'notes' => 'Noter',
    
    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Fx E-commerce Acme S.r.l.',
        'client' => 'Søg kunde...',
        'description' => 'Kort projektbeskrivelse...',
        'notes' => 'Generelle noter om projektet...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    
    // Status options
    'status_draft' => 'Kladde',
    'status_in_progress' => 'I gang',
    'status_completed' => 'Afsluttet',
    'status_archived' => 'Arkiveret',
    
    // Priority options
    'select_priority' => 'Vælg prioritet',
    'priority_low' => 'Lav',
    'priority_medium' => 'Mellem',
    'priority_high' => 'Høj',
    
    // Table headers
    'table' => [
        'name' => 'Navn',
        'client' => 'Kunde',
        'status' => 'Status',
        'priority' => 'Prioritet',
        'links' => 'Links',
        'created_at' => 'Oprettet den',
        'actions' => 'Handlinger',
    ],
    
    // Internal project label
    'internal_project' => 'Internt projekt',
    'no_clients_linked' => 'Ingen kunder tilknyttet',
    'internal_project_desc' => 'Dette er et internt projekt. Der er ingen tilknyttede kundeoplysninger.',
    
    // Buttons
    'save' => 'Gem projekt',
    'filter' => 'Filtrér',
    'cancel' => 'Annuller',
    'edit' => 'Redigér',
    'details' => 'Detaljer',
    'client_details' => 'Kundedetaljer',
    'delete' => 'Slet',
    'reset' => 'Nulstil', 
    'confirm_delete' => 'Er du sikker på, at du vil slette dette projekt?',
    
    // Messages
    'created_successfully' => 'Projekt oprettet',
    'updated_successfully' => 'Projekt opdateret',
    'deleted_successfully' => 'Projekt slettet',
    'restored_successfully' => 'Projekt gendannet',
    'permanently_deleted' => 'Projekt slettet permanent',
    
    // Empty state
    'no_projects' => 'Ingen projekter fundet',
    'no_projects_description' => 'Start med at oprette dit første projekt',
    'create_first_project' => 'Opret det første projekt',
    
    // Filters
    'filter_by_client' => 'Filtrér efter kunde',
    'filter_by_status' => 'Filtrér efter status',
    'filter_by_priority' => 'Filtrér efter prioritet',
    'search_placeholder' => 'Søg efter navn, kunde eller momsnummer...',
    'all_clients' => 'Alle kunder',
    'all_statuses' => 'Alle statuser',
    'all_priorities' => 'Alle prioriteter',
    
    // Validation messages
    'validation' => [
        'name_required' => 'Projektnavn er påkrævet',
        'status_required' => 'Status er påkrævet',
        'status_invalid' => 'Den valgte status er ugyldig',
        'client_not_found' => 'Den valgte kunde findes ikke',
        'priority_invalid' => 'Den valgte prioritet er ugyldig',
        'repo_url_invalid' => 'Repository-URL er ugyldig',
        'staging_url_invalid' => 'Staging-URL er ugyldig',
        'production_url_invalid' => 'Produktions-URL er ugyldig',
        'figma_url_invalid' => 'Figma-URL er ugyldig',
        'docs_url_invalid' => 'Dokumentations-URL er ugyldig',
    ],
    
    // Tabs
    'tab_info' => 'Basisinfo',
    'tab_links' => 'Udviklingslinks',
    'tab_notes' => 'Noter',
    
    // Quick links (icons tooltip)
    'open_repo' => 'Åbn repository',
    'open_staging' => 'Åbn staging',
    'open_production' => 'Åbn produktion',
    'open_figma' => 'Åbn Figma',
    'open_docs' => 'Åbn dokumentation',

    // Show page - Sidebar & Tabs
    'overview' => 'Oversigt',
    'quick_info' => 'Hurtig info',
    'quick_links' => 'Hurtige links',
    'created_at' => 'Oprettet den',
    'updated_at' => 'Opdateret den',

    // Empty states
    'no_description' => 'Ingen beskrivelse',
    'no_notes' => 'Ingen noter',
    'no_priority' => 'Ingen prioritet',
    'no_links' => 'Ingen links konfigureret',
    'no_links_configured' => 'Ingen links konfigureret',

    // Actions
    'open' => 'Åbn',
    'add_to_calendar' => 'Tilføj til kalender',
    'restore' => 'Gendan',
    'force_delete' => 'Slet permanent',
    'confirm_restore' => 'Vil du gendanne dette projekt?',
    'confirm_force_delete' => 'Er du sikker på at du vil slette dette projekt permanent? Denne handling kan ikke fortrydes og relaterede data kan gå tabt.',

    // Calendar
    'project' => 'Projekt',

    // Stats Cards
    'stats' => [
        'total' => 'Samlet antal projekter',
        'in_progress' => 'I gang',
        'completed' => 'Afsluttede',
        'archived' => 'Arkiverede',
        'this_month' => 'denne måned',
        'this_week' => 'denne uge',
        'of_total' => 'af totalen',
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
