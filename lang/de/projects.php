<?php

return [
    // Page titles
    'title' => 'Projekte',
    'projects_list' => 'Projektliste',
    'create_project' => 'Neues Projekt',
    'edit_project' => 'Projekt bearbeiten',
    'project_details' => 'Projektdetails',
    
    // Navigation
    'back_to_list' => 'Zurück zur Liste',
    'add_project' => 'Projekt hinzufügen',
    
    // Form labels - Tab 1: Info Base
    'name' => 'Projektname',
    'client' => 'Kunde',
    'clients' => 'Kunden',
    'is_internal' => 'Internes Projekt',
    'description' => 'Beschreibung',
    'status' => 'Status',
    'priority' => 'Priorität',
    
    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Dev-Links',
    'repo_url' => 'Repository',
    'staging_url' => 'Staging',
    'production_url' => 'Produktion',
    'figma_url' => 'Figma',
    'docs_url' => 'Dokumentation',

    // Project type
    'type' => 'Projekttyp',
    'type_client_work' => 'Kundenarbeit',
    'type_product' => 'Produkt',
    'type_content' => 'Inhalt',
    'type_asset' => 'Asset',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Startdatum',
    'due_date' => 'Fälligkeit',

    // Due date labels

    'due_soon' => 'Bald fällig',
    'overdue' => 'Überfällig',
    
    // Form labels - Tab 3: Notes
    'notes' => 'Notizen',
    
    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Z. B. E-Commerce Acme S.r.l.',
        'client' => 'Kunden suchen...',
        'description' => 'Kurze Projektbeschreibung...',
        'notes' => 'Allgemeine Notizen zum Projekt...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    
    // Status options
    'status_draft' => 'Entwurf',
    'status_in_progress' => 'In Arbeit',
    'status_completed' => 'Abgeschlossen',
    'status_archived' => 'Archiviert',
    
    // Priority options
    'select_priority' => 'Priorität auswählen',
    'priority_low' => 'Niedrig',
    'priority_medium' => 'Mittel',
    'priority_high' => 'Hoch',
    
    // Table headers
    'table' => [
        'name' => 'Name',
        'client' => 'Kunde',
        'status' => 'Status',
        'priority' => 'Priorität',
        'links' => 'Links',
        'created_at' => 'Erstellt am',
        'actions' => 'Aktionen',
    ],
    
    // Internal project label
    'internal_project' => 'Internes Projekt',
    'no_clients_linked' => 'Keine Kunden verknüpft',
    'internal_project_desc' => 'Dies ist ein internes Projekt. Es sind keine Kundeninformationen verknüpft.',
    
    // Buttons
    'save' => 'Projekt speichern',
    'filter' => 'Filtern',
    'cancel' => 'Abbrechen',
    'edit' => 'Bearbeiten',
    'details' => 'Details',
    'client_details' => 'Kundendetails',
    'delete' => 'Löschen',
    'reset' => 'Zurücksetzen', 
    'confirm_delete' => 'Möchtest du dieses Projekt wirklich löschen?',
    
    // Messages
    'created_successfully' => 'Projekt erfolgreich erstellt',
    'updated_successfully' => 'Projekt erfolgreich aktualisiert',
    'deleted_successfully' => 'Projekt erfolgreich gelöscht',
    'restored_successfully' => 'Projekt erfolgreich wiederhergestellt',
    'permanently_deleted' => 'Projekt endgültig gelöscht',
    
    // Empty state
    'no_projects' => 'Keine Projekte gefunden',
    'no_projects_description' => 'Beginne mit deinem ersten Projekt',
    'create_first_project' => 'Erstes Projekt erstellen',
    
    // Filters
    'filter_by_client' => 'Nach Kunde filtern',
    'filter_by_status' => 'Nach Status filtern',
    'filter_by_priority' => 'Nach Priorität filtern',
    'search_placeholder' => 'Suche nach Name, Kunde oder USt-IdNr...',
    'all_clients' => 'Alle Kunden',
    'all_statuses' => 'Alle Status',
    'all_priorities' => 'Alle Prioritäten',
    
    // Validation messages
    'validation' => [
        'name_required' => 'Der Projektname ist erforderlich',
        'status_required' => 'Der Status ist erforderlich',
        'status_invalid' => 'Der ausgewählte Status ist ungültig',
        'client_not_found' => 'Der ausgewählte Kunde existiert nicht',
        'priority_invalid' => 'Die ausgewählte Priorität ist ungültig',
        'repo_url_invalid' => 'Die Repository-URL ist ungültig',
        'staging_url_invalid' => 'Die Staging-URL ist ungültig',
        'production_url_invalid' => 'Die Produktions-URL ist ungültig',
        'figma_url_invalid' => 'Die Figma-URL ist ungültig',
        'docs_url_invalid' => 'Die Dokumentations-URL ist ungültig',
    ],
    
    // Tabs
    'tab_info' => 'Basisinfos',
    'tab_links' => 'Dev-Links',
    'tab_notes' => 'Notizen',
    
    // Quick links (icons tooltip)
    'open_repo' => 'Repository öffnen',
    'open_staging' => 'Staging öffnen',
    'open_production' => 'Produktion öffnen',
    'open_figma' => 'Figma öffnen',
    'open_docs' => 'Dokumentation öffnen',

    // Show page - Sidebar & Tabs
    'overview' => 'Übersicht',
    'quick_info' => 'Schnellinfos',
    'quick_links' => 'Schnelllinks',
    'created_at' => 'Erstellt am',
    'updated_at' => 'Aktualisiert am',

    // Empty states
    'no_description' => 'Keine Beschreibung',
    'no_notes' => 'Keine Notizen',
    'no_priority' => 'Keine Priorität',
    'no_links' => 'Keine Links konfiguriert',
    'no_links_configured' => 'Keine Links konfiguriert',

    // Actions
    'open' => 'Öffnen',
    'add_to_calendar' => 'Zum Kalender hinzufügen',
    'restore' => 'Wiederherstellen',
    'force_delete' => 'Endgültig löschen',
    'confirm_restore' => 'Möchten Sie dieses Projekt wiederherstellen?',
    'confirm_force_delete' => 'Sind Sie sicher dass Sie dieses Projekt endgültig löschen möchten? Diese Aktion kann nicht rückgängig gemacht werden und zugehörige Daten könnten verloren gehen.',

    // Calendar
    'project' => 'Projekt',

    // Stats Cards
    'stats' => [
        'total' => 'Gesamtprojekte',
        'in_progress' => 'In Arbeit',
        'completed' => 'Abgeschlossen',
        'archived' => 'Archiviert',
        'this_month' => 'diesen Monat',
        'this_week' => 'diese Woche',
        'of_total' => 'vom Gesamt',
    ],
    

    // Repository (GitHub)
    'repository' => 'Repository',
    'commit_activity' => 'Commit-Aktivität',
    'recent_commits' => 'Letzte Commits',
    'less' => 'Weniger',
    'more' => 'Mehr',
    'no_repository_data' => 'Keine Daten für dieses Repository verfügbar.',
    'repository_fetch_error' => 'Fehler beim Laden der GitHub-Daten.',
    'editor_tab' => 'Editor',
];
