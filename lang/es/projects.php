<?php

return [
    // Page titles
    'title' => 'Proyectos',
    'projects_list' => 'Lista de proyectos',
    'create_project' => 'Nuevo proyecto',
    'edit_project' => 'Editar proyecto',
    'project_details' => 'Detalles del proyecto',
    
    // Navigation
    'back_to_list' => 'Volver a la lista',
    'add_project' => 'Añadir proyecto',
    
    // Form labels - Tab 1: Info Base
    'name' => 'Nombre del proyecto',
    'client' => 'Cliente',
    'clients' => 'Clientes',
    'is_internal' => 'Proyecto interno',
    'description' => 'Descripción',
    'status' => 'Estado',
    'priority' => 'Prioridad',
    
    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Enlaces de desarrollo',
    'repo_url' => 'Repositorio',
    'staging_url' => 'Staging',
    'production_url' => 'Producción',
    'figma_url' => 'Figma',
    'docs_url' => 'Documentación',

    // Project type
    'type' => 'Tipo de proyecto',
    'type_client_work' => 'Trabajo para cliente',
    'type_product' => 'Producto',
    'type_content' => 'Contenido',
    'type_asset' => 'Activo',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Fecha de inicio',
    'due_date' => 'Vencimiento',

    // Due date labels

    'due_soon' => 'Próximo a vencer',
    'overdue' => 'Vencido',
    
    // Form labels - Tab 3: Notes
    'notes' => 'Notas',
    
    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Ej: E-commerce Acme S.r.l.',
        'client' => 'Buscar cliente...',
        'description' => 'Breve descripción del proyecto...',
        'notes' => 'Notas y apuntes generales del proyecto...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    
    // Status options
    'status_draft' => 'Borrador',
    'status_in_progress' => 'En curso',
    'status_completed' => 'Completado',
    'status_archived' => 'Archivado',
    
    // Priority options
    'select_priority' => 'Seleccionar prioridad',
    'priority_low' => 'Baja',
    'priority_medium' => 'Media',
    'priority_high' => 'Alta',
    
    // Table headers
    'table' => [
        'name' => 'Nombre',
        'client' => 'Cliente',
        'status' => 'Estado',
        'priority' => 'Prioridad',
        'links' => 'Enlaces',
        'created_at' => 'Creado el',
        'actions' => 'Acciones',
    ],
    
    // Internal project label
    'internal_project' => 'Proyecto interno',
    'no_clients_linked' => 'Ningún cliente vinculado',
    'internal_project_desc' => 'Este es un proyecto interno. No hay información del cliente asociada.',
    
    // Buttons
    'save' => 'Guardar proyecto',
    'filter' => 'Filtrar',
    'cancel' => 'Cancelar',
    'edit' => 'Editar',
    'details' => 'Detalles',
    'client_details' => 'Detalles del cliente',
    'delete' => 'Eliminar',
    'reset' => 'Restablecer', 
    'confirm_delete' => '¿Seguro que quieres eliminar este proyecto?',
    
    // Messages
    'created_successfully' => 'Proyecto creado correctamente',
    'updated_successfully' => 'Proyecto actualizado correctamente',
    'deleted_successfully' => 'Proyecto eliminado correctamente',
    'restored_successfully' => 'Proyecto restaurado correctamente',
    'permanently_deleted' => 'Proyecto eliminado definitivamente',
    
    // Empty state
    'no_projects' => 'No se encontraron proyectos',
    'no_projects_description' => 'Empieza creando tu primer proyecto',
    'create_first_project' => 'Crear el primer proyecto',
    
    // Filters
    'filter_by_client' => 'Filtrar por cliente',
    'filter_by_status' => 'Filtrar por estado',
    'filter_by_priority' => 'Filtrar por prioridad',
    'search_placeholder' => 'Buscar por nombre, cliente o NIF...',
    'all_clients' => 'Todos los clientes',
    'all_statuses' => 'Todos los estados',
    'all_priorities' => 'Todas las prioridades',
    
    // Validation messages
    'validation' => [
        'name_required' => 'El nombre del proyecto es obligatorio',
        'status_required' => 'El estado es obligatorio',
        'status_invalid' => 'El estado seleccionado no es válido',
        'client_not_found' => 'El cliente seleccionado no existe',
        'priority_invalid' => 'La prioridad seleccionada no es válida',
        'repo_url_invalid' => 'La URL del repositorio no es válida',
        'staging_url_invalid' => 'La URL de staging no es válida',
        'production_url_invalid' => 'La URL de producción no es válida',
        'figma_url_invalid' => 'La URL de Figma no es válida',
        'docs_url_invalid' => 'La URL de la documentación no es válida',
    ],
    
    // Tabs
    'tab_info' => 'Info base',
    'tab_links' => 'Enlaces de desarrollo',
    'tab_notes' => 'Notas',
    
    // Quick links (icons tooltip)
    'open_repo' => 'Abrir repositorio',
    'open_staging' => 'Abrir staging',
    'open_production' => 'Abrir producción',
    'open_figma' => 'Abrir Figma',
    'open_docs' => 'Abrir documentación',

    // Show page - Sidebar & Tabs
    'overview' => 'Resumen',
    'quick_info' => 'Info rápida',
    'quick_links' => 'Enlaces rápidos',
    'created_at' => 'Creado el',
    'updated_at' => 'Actualizado el',

    // Empty states
    'no_description' => 'Sin descripción',
    'no_notes' => 'Sin notas',
    'no_priority' => 'Sin prioridad',
    'no_links' => 'Sin enlaces configurados',
    'no_links_configured' => 'Sin enlaces configurados',

    // Actions
    'open' => 'Abrir',
    'add_to_calendar' => 'Añadir al calendario',
    'restore' => 'Restaurar',
    'force_delete' => 'Eliminar permanentemente',
    'confirm_restore' => '¿Desea restaurar este proyecto?',
    'confirm_force_delete' => '¿Está seguro de que desea eliminar permanentemente este proyecto? Esta acción no se puede deshacer y los datos relacionados podrían perderse.',

    // Calendar
    'project' => 'Proyecto',

    // Stats Cards
    'stats' => [
        'total' => 'Total de proyectos',
        'in_progress' => 'En curso',
        'completed' => 'Completados',
        'archived' => 'Archivados',
        'this_month' => 'este mes',
        'this_week' => 'esta semana',
        'of_total' => 'del total',
    ],
    

    // Repository (GitHub)
    'repository' => 'Repositorio',
    'commit_activity' => 'Actividad de commits',
    'recent_commits' => 'Commits recientes',
    'less' => 'Menos',
    'more' => 'Más',
    'no_repository_data' => 'No hay datos disponibles para este repositorio.',
    'repository_fetch_error' => 'Error al cargar datos de GitHub.',
    'editor_tab' => 'Editor',
];
