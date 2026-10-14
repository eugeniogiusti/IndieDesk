<?php

return [
    // Page titles
    'title' => 'Tareas',
    'task_list' => 'Lista de tareas',
    'create_task' => 'Crear tarea',
    'edit_task' => 'Editar tarea',
    'index_description' => 'Gestiona todas las tareas de tus proyectos',
    
    // Fields
    'task_title' => 'Título',
    'description' => 'Descripción',
    'type' => 'Tipo',
    'status' => 'Estado',
    'priority' => 'Prioridad',
    'due_date' => 'Vencimiento',
    'project' => 'Proyecto',
    
    // Types
    'type_feature' => 'Feature',
    'type_improvement' => 'Mejora',
    'type_bug' => 'Bug',
    'type_infra' => 'Infra',
    'type_refactor' => 'Refactor',
    'type_research' => 'Research',
    'type_administrative' => 'Administrativo',
    'type_marketing' => 'Marketing',
    'type_commercial' => 'Comercial',
    'type_hardware' => 'Hardware',
    'type_documentation' => 'Documentación',
    'type_maintenance' => 'Mantenimiento',
    
    // Statuses
    'status_todo' => 'Por hacer',
    'status_in_progress' => 'En curso',
    'status_blocked' => 'Bloqueado',
    'status_done' => 'Completado',
    
    // Priorities
    'select_priority' => 'Seleccionar prioridad',
    'priority_low' => 'Baja',
    'priority_medium' => 'Media',
    'priority_high' => 'Alta',
    
    // Actions (task-specific)
    'add_task' => 'Añadir tarea',
    'view_all' => 'Ver todas las tareas',
    'recent_tasks' => 'Tareas recientes',
    'view_project' => 'Ir al proyecto',
    'add_to_calendar' => 'Añadir al calendario',
    'mark_complete' => 'Marcar como completada',
    'mark_incomplete' => 'Marcar como no completada',
    
    // Messages
    'created_successfully' => 'Tarea creada correctamente',
    'updated_successfully' => 'Tarea actualizada correctamente',
    'deleted_successfully' => 'Tarea eliminada correctamente',
    'confirm_delete' => '¿Seguro que quieres eliminar esta tarea?',
    
    // Empty states
    'no_tasks' => 'No se encontraron tareas',
    'no_tasks_description' => 'Empieza añadiendo la primera tarea',
    
    // Stats
    'total_tasks' => 'Total de tareas',
    'open_tasks' => 'Tareas abiertas',
    'completed_tasks' => 'Tareas completadas',
    'overdue_tasks' => 'Tareas vencidas',

    // Due date states
    'overdue' => 'Vencido',
    'due_today' => 'Vence hoy',
    'due_soon' => 'Próximo a vencer',
    'no_due_date' => 'Sin vencimiento',
    
    // Filters
    'all_statuses' => 'Todos los estados',
    'all_types' => 'Todos los tipos',
    'filter_due_from' => 'Vence desde',
    'filter_due_to' => 'Vence hasta',
    
    // Placeholders
    'placeholder' => [
        'title' => 'ej. Implementar login OAuth',
        'description' => 'Descripción detallada de la tarea...',
        'search' => 'Buscar por título o nombre del proyecto...',
    ],

    // Index Statistics
        'stats' => [
        'todo' => 'Por hacer',
        'backlog' => 'Backlog',
        'in_progress' => 'En curso',
        'working_on' => 'En trabajo',
        'blocked' => 'Bloqueadas',
        'need_attention' => 'Requieren atención',
        'bugs_open' => 'Bugs abiertos',
        'to_fix' => 'Por corregir',
    ],
];
