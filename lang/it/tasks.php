<?php

return [
    // Page titles
    'title' => 'Task',
    'task_list' => 'Lista Task',
    'create_task' => 'Crea Task',
    'edit_task' => 'Modifica Task',
    'index_description' => 'Gestisci tutti i task dei tuoi progetti',
    
    // Fields
    'task_title' => 'Titolo',
    'task_title_status' => 'Titolo/Stato',
    'description' => 'Descrizione',
    'type' => 'Tipo',
    'status' => 'Stato',
    'status_priority' => 'Stato/Priorità',
    'priority' => 'Priorità',
    'due_date' => 'Scadenza',
    'project' => 'Progetto',
    
    // Types
    'type_feature' => 'Feature',
    'type_improvement' => 'Miglioramento',
    'type_bug' => 'Bug',
    'type_infra' => 'Infra',
    'type_refactor' => 'Refactor',
    'type_research' => 'Research',
    'type_administrative' => 'Amministrativo',
    'type_marketing' => 'Marketing',
    'type_hardware' => 'Hardware',
    'type_documentation' => 'Documentazione',
    'type_maintenance' => 'Manutenzione',
    
    // Statuses
    'status_todo' => 'Da fare',
    'status_in_progress' => 'In corso',
    'status_blocked' => 'Bloccato',
    'status_done' => 'Completato',
    
    // Priorities
    'select_priority' => 'Seleziona priorità',
    'priority_low' => 'Bassa',
    'priority_medium' => 'Media',
    'priority_high' => 'Alta',
    
    // Actions (task-specific)
    'add_task' => 'Aggiungi Task',
    'view_all' => 'Vedi tutti i task',
    'recent_tasks' => 'Task Recenti',
    'view_project' => 'Vai al progetto',
    'add_to_calendar' => 'Aggiungi al Calendario',
    'mark_complete' => 'Segna come completato',
    'mark_incomplete' => 'Segna come non completato',
    
    // Messages
    'created_successfully' => 'Task creato con successo',
    'updated_successfully' => 'Task aggiornato con successo',
    'deleted_successfully' => 'Task eliminato con successo',
    'confirm_delete' => 'Sei sicuro di voler eliminare questo task?',
    
    // Empty states
    'no_tasks' => 'Nessun task trovato',
    'no_tasks_description' => 'Inizia aggiungendo il primo task',
    
    // Stats
    'total_tasks' => 'Totale task',
    'open_tasks' => 'Task aperti',
    'completed_tasks' => 'Task completati',
    'overdue_tasks' => 'Task scaduti',

    // Due date states
    'overdue' => 'Scaduto',
    'due_today' => 'Da fare oggi',
    'due_soon' => 'In scadenza',
    'no_due_date' => 'Nessuna scadenza',
    
    // Filters
    'all_statuses' => 'Tutti gli stati',
    'all_types' => 'Tutti i tipi',
    
    // Placeholders
    'placeholder' => [
        'title' => 'es. Implementa login OAuth',
        'description' => 'Descrizione dettagliata del task...',
        'search' => 'Cerca per titolo o nome progetto...',
    ],

    // Index Statistics
        'stats' => [
        'todo' => 'Da Fare',
        'backlog' => 'Backlog',
        'in_progress' => 'In Corso',
        'working_on' => 'In lavorazione',
        'blocked' => 'Bloccate',
        'need_attention' => 'Richiedono attenzione',
        'bugs_open' => 'Bug Aperti',
        'to_fix' => 'Da fixare',
    ],
];