<?php

return [
    // Page titles
    'title' => 'Opgaver',
    'task_list' => 'Opgaveliste',
    'create_task' => 'Opret opgave',
    'edit_task' => 'Redigér opgave',
    'index_description' => 'Administrér alle opgaver i dine projekter',
    
    // Fields
    'task_title' => 'Titel',
    'description' => 'Beskrivelse',
    'type' => 'Type',
    'status' => 'Status',
    'priority' => 'Prioritet',
    'due_date' => 'Forfald',
    'project' => 'Projekt',
    
    // Types
    'type_feature' => 'Feature',
    'type_improvement' => 'Forbedring',
    'type_bug' => 'Bug',
    'type_infra' => 'Infra',
    'type_refactor' => 'Refactor',
    'type_research' => 'Research',
    'type_administrative' => 'Administrativ',
    'type_marketing' => 'Marketing',
    'type_commercial' => 'Kommerciel',
    'type_hardware' => 'Hardware',
    'type_documentation' => 'Dokumentation',
    'type_maintenance' => 'Vedligeholdelse',
    
    // Statuses
    'status_todo' => 'At gøre',
    'status_in_progress' => 'I gang',
    'status_blocked' => 'Blokeret',
    'status_done' => 'Afsluttet',
    
    // Priorities
    'select_priority' => 'Vælg prioritet',
    'priority_low' => 'Lav',
    'priority_medium' => 'Mellem',
    'priority_high' => 'Høj',
    
    // Actions (task-specific)
    'add_task' => 'Tilføj opgave',
    'view_all' => 'Se alle opgaver',
    'recent_tasks' => 'Seneste opgaver',
    'view_project' => 'Gå til projekt',
    'add_to_calendar' => 'Tilføj til kalender',
    'mark_complete' => 'Markér som afsluttet',
    'mark_incomplete' => 'Markér som ikke afsluttet',
    
    // Messages
    'created_successfully' => 'Opgave oprettet',
    'updated_successfully' => 'Opgave opdateret',
    'deleted_successfully' => 'Opgave slettet',
    'confirm_delete' => 'Er du sikker på, at du vil slette denne opgave?',
    
    // Empty states
    'no_tasks' => 'Ingen opgaver fundet',
    'no_tasks_description' => 'Kom i gang ved at tilføje den første opgave',
    
    // Stats
    'total_tasks' => 'Samlede opgaver',
    'open_tasks' => 'Åbne opgaver',
    'completed_tasks' => 'Afsluttede opgaver',
    'overdue_tasks' => 'Forsinkede opgaver',

    // Due date states
    'overdue' => 'Forsinket',
    'due_today' => 'I dag',
    'due_soon' => 'Snart forfald',
    'no_due_date' => 'Ingen forfaldsdate',
    
    // Filters
    'all_statuses' => 'Alle statuser',
    'all_types' => 'Alle typer',
    'filter_due_from' => 'Forfald fra',
    'filter_due_to' => 'Forfald til',
    
    // Placeholders
    'placeholder' => [
        'title' => 'fx Implementér OAuth-login',
        'description' => 'Detaljeret opgavebeskrivelse...',
        'search' => 'Søg efter titel eller projektnavn...',
    ],

    // Index Statistics
        'stats' => [
        'todo' => 'At gøre',
        'backlog' => 'Backlog',
        'in_progress' => 'I gang',
        'working_on' => 'Under arbejde',
        'blocked' => 'Blokerede',
        'need_attention' => 'Kræver opmærksomhed',
        'bugs_open' => 'Åbne bugs',
        'to_fix' => 'Skal fikses',
    ],
];
