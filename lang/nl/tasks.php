<?php

return [
    // Page titles
    'title' => 'Taken',
    'task_list' => 'Takenlijst',
    'create_task' => 'Taak aanmaken',
    'edit_task' => 'Taak bewerken',
    'index_description' => 'Beheer alle taken van je projecten',
    
    // Fields
    'task_title' => 'Titel',
    'description' => 'Beschrijving',
    'type' => 'Type',
    'status' => 'Status',
    'priority' => 'Prioriteit',
    'due_date' => 'Vervaldatum',
    'project' => 'Project',
    
    // Types
    'type_feature' => 'Feature',
    'type_improvement' => 'Verbetering',
    'type_bug' => 'Bug',
    'type_infra' => 'Infra',
    'type_refactor' => 'Refactor',
    'type_research' => 'Research',
    'type_administrative' => 'Administratief',
    'type_marketing' => 'Marketing',
    'type_commercial' => 'Commercieel',
    'type_hardware' => 'Hardware',
    'type_documentation' => 'Documentatie',
    'type_maintenance' => 'Onderhoud',
    
    // Statuses
    'status_todo' => 'Te doen',
    'status_in_progress' => 'In uitvoering',
    'status_blocked' => 'Geblokkeerd',
    'status_done' => 'Voltooid',
    
    // Priorities
    'select_priority' => 'Prioriteit selecteren',
    'priority_low' => 'Laag',
    'priority_medium' => 'Middel',
    'priority_high' => 'Hoog',
    
    // Actions (task-specific)
    'add_task' => 'Taak toevoegen',
    'view_all' => 'Alle taken bekijken',
    'recent_tasks' => 'Recente taken',
    'view_project' => 'Naar project',
    'add_to_calendar' => 'Aan kalender toevoegen',
    'mark_complete' => 'Markeren als voltooid',
    'mark_incomplete' => 'Markeren als niet voltooid',
    
    // Messages
    'created_successfully' => 'Taak succesvol aangemaakt',
    'updated_successfully' => 'Taak succesvol bijgewerkt',
    'deleted_successfully' => 'Taak succesvol verwijderd',
    'confirm_delete' => 'Weet je zeker dat je deze taak wilt verwijderen?',
    
    // Empty states
    'no_tasks' => 'Geen taken gevonden',
    'no_tasks_description' => 'Begin met het toevoegen van je eerste taak',
    
    // Stats
    'total_tasks' => 'Totaal taken',
    'open_tasks' => 'Open taken',
    'completed_tasks' => 'Voltooide taken',
    'overdue_tasks' => 'Achterstallige taken',

    // Due date states
    'overdue' => 'Achterstallig',
    'due_today' => 'Vandaag',
    'due_soon' => 'Binnenkort vervalt',
    'no_due_date' => 'Geen vervaldatum',
    
    // Filters
    'all_statuses' => 'Alle statussen',
    'all_types' => 'Alle types',
    
    // Placeholders
    'placeholder' => [
        'title' => 'bv. OAuth-login implementeren',
        'description' => 'Gedetailleerde taakomschrijving...',
        'search' => 'Zoek op titel of projectnaam...',
    ],

    // Index Statistics
        'stats' => [
        'todo' => 'Te doen',
        'backlog' => 'Backlog',
        'in_progress' => 'In uitvoering',
        'working_on' => 'Mee bezig',
        'blocked' => 'Geblokkeerd',
        'need_attention' => 'Vereisen aandacht',
        'bugs_open' => 'Open bugs',
        'to_fix' => 'Te fixen',
    ],
];
