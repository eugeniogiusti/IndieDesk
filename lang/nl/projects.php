<?php

return [
    // Page titles
    'title' => 'Projecten',
    'projects_list' => 'Projectlijst',
    'create_project' => 'Nieuw project',
    'edit_project' => 'Project bewerken',
    'project_details' => 'Projectdetails',
    
    // Navigation
    'back_to_list' => 'Terug naar lijst',
    'add_project' => 'Project toevoegen',
    
    // Form labels - Tab 1: Info Base
    'name' => 'Projectnaam',
    'client' => 'Klant',
    'clients' => 'Klanten',
    'is_internal' => 'Intern project',
    'description' => 'Beschrijving',
    'status' => 'Status',
    'priority' => 'Prioriteit',
    
    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Dev-links',
    'repo_url' => 'Repository',
    'staging_url' => 'Staging',
    'production_url' => 'Productie',
    'figma_url' => 'Figma',
    'docs_url' => 'Documentatie',

    // Project type
    'type' => 'Projecttype',
    'type_client_work' => 'Werk voor klant',
    'type_product' => 'Product',
    'type_content' => 'Content',
    'type_asset' => 'Asset',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Startdatum',
    'due_date' => 'Vervaldatum',

    // Due date labels

    'due_soon' => 'Binnenkort vervalt',
    'overdue' => 'Achterstallig',
    
    // Form labels - Tab 3: Notes
    'notes' => 'Notities',
    
    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Bijv. E-commerce Acme S.r.l.',
        'client' => 'Klant zoeken...',
        'description' => 'Korte projectbeschrijving...',
        'notes' => 'Algemene notities over het project...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    
    // Status options
    'status_draft' => 'Concept',
    'status_in_progress' => 'In uitvoering',
    'status_completed' => 'Voltooid',
    'status_archived' => 'Gearchiveerd',
    
    // Priority options
    'select_priority' => 'Prioriteit selecteren',
    'priority_low' => 'Laag',
    'priority_medium' => 'Middel',
    'priority_high' => 'Hoog',
    
    // Table headers
    'table' => [
        'name' => 'Naam',
        'client' => 'Klant',
        'status' => 'Status',
        'priority' => 'Prioriteit',
        'links' => 'Links',
        'created_at' => 'Aangemaakt op',
        'actions' => 'Acties',
    ],
    
    // Internal project label
    'internal_project' => 'Intern project',
    'no_clients_linked' => 'Geen klanten gekoppeld',
    'internal_project_desc' => 'Dit is een intern project. Er is geen klantinformatie gekoppeld.',
    
    // Buttons
    'save' => 'Project opslaan',
    'filter' => 'Filteren',
    'cancel' => 'Annuleren',
    'edit' => 'Bewerken',
    'details' => 'Details',
    'client_details' => 'Klantdetails',
    'delete' => 'Verwijderen',
    'reset' => 'Resetten', 
    'confirm_delete' => 'Weet je zeker dat je dit project wilt verwijderen?',
    
    // Messages
    'created_successfully' => 'Project succesvol aangemaakt',
    'updated_successfully' => 'Project succesvol bijgewerkt',
    'deleted_successfully' => 'Project succesvol verwijderd',
    'restored_successfully' => 'Project succesvol hersteld',
    'permanently_deleted' => 'Project permanent verwijderd',
    
    // Empty state
    'no_projects' => 'Geen projecten gevonden',
    'no_projects_description' => 'Begin met het aanmaken van je eerste project',
    'create_first_project' => 'Eerste project aanmaken',
    
    // Filters
    'filter_by_client' => 'Filter op klant',
    'filter_by_status' => 'Filter op status',
    'filter_by_priority' => 'Filter op prioriteit',
    'search_placeholder' => 'Zoek op naam, klant of btw...',
    'all_clients' => 'Alle klanten',
    'all_statuses' => 'Alle statussen',
    'all_priorities' => 'Alle prioriteiten',
    
    // Validation messages
    'validation' => [
        'name_required' => 'De projectnaam is verplicht',
        'status_required' => 'De status is verplicht',
        'status_invalid' => 'De geselecteerde status is ongeldig',
        'client_not_found' => 'De geselecteerde klant bestaat niet',
        'priority_invalid' => 'De geselecteerde prioriteit is ongeldig',
        'repo_url_invalid' => 'De repository-URL is ongeldig',
        'staging_url_invalid' => 'De staging-URL is ongeldig',
        'production_url_invalid' => 'De productie-URL is ongeldig',
        'figma_url_invalid' => 'De Figma-URL is ongeldig',
        'docs_url_invalid' => 'De documentatie-URL is ongeldig',
    ],
    
    // Tabs
    'tab_info' => 'Basisinfo',
    'tab_links' => 'Dev-links',
    'tab_notes' => 'Notities',
    
    // Quick links (icons tooltip)
    'open_repo' => 'Repository openen',
    'open_staging' => 'Staging openen',
    'open_production' => 'Productie openen',
    'open_figma' => 'Figma openen',
    'open_docs' => 'Documentatie openen',

    // Show page - Sidebar & Tabs
    'overview' => 'Overzicht',
    'quick_info' => 'Snelle info',
    'quick_links' => 'Snelle links',
    'created_at' => 'Aangemaakt op',
    'updated_at' => 'Bijgewerkt op',

    // Empty states
    'no_description' => 'Geen beschrijving',
    'no_notes' => 'Geen notities',
    'no_priority' => 'Geen prioriteit',
    'no_links' => 'Geen links geconfigureerd',
    'no_links_configured' => 'Geen links geconfigureerd',

    // Actions
    'open' => 'Openen',
    'add_to_calendar' => 'Aan kalender toevoegen',
    'restore' => 'Herstellen',
    'force_delete' => 'Permanent verwijderen',
    'confirm_restore' => 'Wilt u dit project herstellen?',
    'confirm_force_delete' => 'Weet u zeker dat u dit project permanent wilt verwijderen? Deze actie kan niet ongedaan worden gemaakt en gerelateerde gegevens kunnen verloren gaan.',

    // Calendar
    'project' => 'Project',

    // Stats Cards
    'stats' => [
        'total' => 'Totaal projecten',
        'in_progress' => 'In uitvoering',
        'completed' => 'Voltooid',
        'archived' => 'Gearchiveerd',
        'this_month' => 'deze maand',
        'this_week' => 'deze week',
        'of_total' => 'van het totaal',
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
