<?php

return [
    // Page titles
    'title' => 'Projekty',
    'projects_list' => 'Lista projektów',
    'create_project' => 'Nowy projekt',
    'edit_project' => 'Edytuj projekt',
    'project_details' => 'Szczegóły projektu',

    // Navigation
    'back_to_list' => 'Wróć do listy',
    'add_project' => 'Dodaj projekt',

    // Form labels - Tab 1: Info Base
    'name' => 'Nazwa projektu',
    'client' => 'Klient',
    'clients' => 'Klienci',
    'is_internal' => 'Projekt wewnętrzny',
    'description' => 'Opis',
    'status' => 'Status',
    'priority' => 'Priorytet',

    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Linki dev',
    'repo_url' => 'Repozytorium',
    'staging_url' => 'Staging',
    'production_url' => 'Produkcja',
    'figma_url' => 'Figma',
    'docs_url' => 'Dokumentacja',

    // Project type
    'type' => 'Typ projektu',
    'type_client_work' => 'Praca dla klienta',
    'type_product' => 'Produkt',
    'type_content' => 'Treść',
    'type_asset' => 'Asset',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Data rozpoczęcia',
    'due_date' => 'Termin',

    // Due date labels

    'due_soon' => 'Wkrótce termin',
    'overdue' => 'Po terminie',

    // Form labels - Tab 3: Notes
    'notes' => 'Notatki',

    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Np. E-commerce Acme Sp. z o.o.',
        'client' => 'Szukaj klienta...',
        'description' => 'Krótki opis projektu...',
        'notes' => 'Notatki i uwagi dotyczące projektu...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],


    // Status options
    'status_draft' => 'Szkic',
    'status_in_progress' => 'W toku',
    'status_completed' => 'Zakończony',
    'status_archived' => 'Zarchiwizowany',

    // Priority options
    'select_priority' => 'Wybierz priorytet',
    'priority_low' => 'Niski',
    'priority_medium' => 'Średni',
    'priority_high' => 'Wysoki',

    // Table headers
    'table' => [
        'name' => 'Nazwa',
        'client' => 'Klient',
        'status' => 'Status',
        'priority' => 'Priorytet',
        'links' => 'Linki',
        'created_at' => 'Utworzono',
        'actions' => 'Akcje',
    ],

    // Internal project label
    'internal_project' => 'Projekt wewnętrzny',
    'no_clients_linked' => 'Brak powiązanych klientów',
    'internal_project_desc' => 'To jest projekt wewnętrzny. Nie ma powiązanych informacji o kliencie.',

    // Buttons
    'save' => 'Zapisz projekt',
    'filter' => 'Filtruj',
    'cancel' => 'Anuluj',
    'edit' => 'Edytuj',
    'details' => 'Szczegóły',
    'client_details' => 'Szczegóły klienta',
    'delete' => 'Usuń',
    'reset' => 'Resetuj',
    'confirm_delete' => 'Czy na pewno chcesz usunąć ten projekt?',

    // Messages
    'created_successfully' => 'Projekt utworzony pomyślnie',
    'updated_successfully' => 'Projekt zaktualizowany pomyślnie',
    'deleted_successfully' => 'Projekt usunięty pomyślnie',
    'restored_successfully' => 'Projekt przywrócony pomyślnie',
    'permanently_deleted' => 'Projekt usunięty na stałe',

    // Empty state
    'no_projects' => 'Brak projektów',
    'no_projects_description' => 'Zacznij, tworząc swój pierwszy projekt',
    'create_first_project' => 'Utwórz pierwszy projekt',

    // Filters
    'filter_by_client' => 'Filtruj wg klienta',
    'filter_by_status' => 'Filtruj wg statusu',
    'filter_by_priority' => 'Filtruj wg priorytetu',
    'search_placeholder' => 'Szukaj po nazwie, kliencie lub NIP...',
    'all_clients' => 'Wszyscy klienci',
    'all_statuses' => 'Wszystkie statusy',
    'all_priorities' => 'Wszystkie priorytety',

    // Validation messages
    'validation' => [
        'name_required' => 'Nazwa projektu jest wymagana',
        'status_required' => 'Status jest wymagany',
        'status_invalid' => 'Wybrany status jest nieprawidłowy',
        'client_not_found' => 'Wybrany klient nie istnieje',
        'priority_invalid' => 'Wybrany priorytet jest nieprawidłowy',
        'repo_url_invalid' => 'URL repozytorium jest nieprawidłowy',
        'staging_url_invalid' => 'URL stagingu jest nieprawidłowy',
        'production_url_invalid' => 'URL produkcji jest nieprawidłowy',
        'figma_url_invalid' => 'URL Figmy jest nieprawidłowy',
        'docs_url_invalid' => 'URL dokumentacji jest nieprawidłowy',
    ],

    // Tabs
    'tab_info' => 'Podstawowe info',
    'tab_links' => 'Linki dev',
    'tab_notes' => 'Notatki',

    // Quick links (icons tooltip)
    'open_repo' => 'Otwórz repozytorium',
    'open_staging' => 'Otwórz staging',
    'open_production' => 'Otwórz produkcję',
    'open_figma' => 'Otwórz Figmę',
    'open_docs' => 'Otwórz dokumentację',

    // Show page - Sidebar & Tabs
    'overview' => 'Przegląd',
    'quick_info' => 'Szybkie info',
    'quick_links' => 'Szybkie linki',
    'created_at' => 'Utworzono',
    'updated_at' => 'Zaktualizowano',

    // Empty states
    'no_description' => 'Brak opisu',
    'no_notes' => 'Brak notatek',
    'no_priority' => 'Brak priorytetu',
    'no_links' => 'Brak skonfigurowanych linków',
    'no_links_configured' => 'Brak skonfigurowanych linków',

    // Actions
    'open' => 'Otwórz',
    'add_to_calendar' => 'Dodaj do kalendarza',
    'restore' => 'Przywróć',
    'force_delete' => 'Usuń trwale',
    'confirm_restore' => 'Czy chcesz przywrócić ten projekt?',
    'confirm_force_delete' => 'Czy na pewno chcesz trwale usunąć ten projekt? Tej akcji nie można cofnąć a powiązane dane mogą zostać utracone.',

    // Calendar
    'project' => 'Projekt',

    // Stats Cards
    'stats' => [
        'total' => 'Łącznie projektów',
        'in_progress' => 'W toku',
        'completed' => 'Zakończone',
        'archived' => 'Zarchiwizowane',
        'this_month' => 'w tym miesiącu',
        'this_week' => 'w tym tygodniu',
        'of_total' => 'z całości',
    ],


    // Repository (GitHub)
    'repository' => 'Repository',
    'commit_activity' => 'Attività commit',
    'recent_commits' => 'Commit recenti',
    'less' => 'Meno',
    'more' => 'Di più',
    'no_repository_data' => 'Nessun dato disponibile per questo repository.',
    'repository_fetch_error' => 'Errore nel caricamento dei dati GitHub.',
    'editor_tab' => 'Edytor',
];
