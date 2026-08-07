<?php

return [
    // Page titles
    'title' => 'Projetos',
    'projects_list' => 'Lista de Projetos',
    'create_project' => 'Novo Projeto',
    'edit_project' => 'Editar Projeto',
    'project_details' => 'Detalhes do Projeto',
    
    // Navigation
    'back_to_list' => 'Voltar à lista',
    'add_project' => 'Adicionar Projeto',
    
    // Form labels - Tab 1: Info Base
    'name' => 'Nome do Projeto',
    'client' => 'Cliente',
    'clients' => 'Clientes',
    'is_internal' => 'Projeto interno',
    'description' => 'Descrição',
    'status' => 'Estado',
    'priority' => 'Prioridade',
    
    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Links de Desenvolvimento',
    'repo_url' => 'Repositório',
    'staging_url' => 'Staging',
    'production_url' => 'Produção',
    'figma_url' => 'Figma',
    'docs_url' => 'Documentação',

    // Project type
    'type' => 'Tipo de Projeto',
    'type_client_work' => 'Trabalho para cliente',
    'type_product' => 'Produto',
    'type_content' => 'Conteúdo',
    'type_asset' => 'Asset',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Data de início',
    'due_date' => 'Vencimento',

    // Due date labels

    'due_soon' => 'A vencer',
    'overdue' => 'Em atraso',
    
    // Form labels - Tab 3: Notes
    'notes' => 'Notas',
    
    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Ex: E-commerce Acme S.r.l.',
        'client' => 'Pesquisar cliente...',
        'description' => 'Breve descrição do projeto...',
        'notes' => 'Notas e apontamentos gerais sobre o projeto...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    
    // Status options
    'status_draft' => 'Rascunho',
    'status_in_progress' => 'Em curso',
    'status_completed' => 'Concluído',
    'status_archived' => 'Arquivado',
    
    // Priority options
    'select_priority' => 'Selecionar prioridade',
    'priority_low' => 'Baixa',
    'priority_medium' => 'Média',
    'priority_high' => 'Alta',
    
    // Table headers
    'table' => [
        'name' => 'Nome',
        'client' => 'Cliente',
        'status' => 'Estado',
        'priority' => 'Prioridade',
        'links' => 'Links',
        'created_at' => 'Criado em',
        'actions' => 'Ações',
    ],
    
    // Internal project label
    'internal_project' => 'Projeto interno',
    'no_clients_linked' => 'Nenhum cliente vinculado',
    'internal_project_desc' => 'Este é um projeto interno. Não existem informações de cliente associadas.',
    
    // Buttons
    'save' => 'Guardar Projeto',
    'filter' => 'Filtrar',
    'cancel' => 'Cancelar',
    'edit' => 'Editar',
    'details' => 'Detalhes',
    'client_details' => 'Detalhes do Cliente',
    'delete' => 'Eliminar',
    'reset' => 'Repor', 
    'confirm_delete' => 'Tens a certeza de que queres eliminar este projeto?',
    
    // Messages
    'created_successfully' => 'Projeto criado com sucesso',
    'updated_successfully' => 'Projeto atualizado com sucesso',
    'deleted_successfully' => 'Projeto eliminado com sucesso',
    'restored_successfully' => 'Projeto restaurado com sucesso',
    'permanently_deleted' => 'Projeto eliminado definitivamente',
    
    // Empty state
    'no_projects' => 'Nenhum projeto encontrado',
    'no_projects_description' => 'Começa por criar o teu primeiro projeto',
    'create_first_project' => 'Criar o primeiro projeto',
    
    // Filters
    'filter_by_client' => 'Filtrar por cliente',
    'filter_by_status' => 'Filtrar por estado',
    'filter_by_priority' => 'Filtrar por prioridade',
    'search_placeholder' => 'Pesquisar por nome, cliente ou NIF...',
    'all_clients' => 'Todos os clientes',
    'all_statuses' => 'Todos os estados',
    'all_priorities' => 'Todas as prioridades',
    
    // Validation messages
    'validation' => [
        'name_required' => 'O nome do projeto é obrigatório',
        'status_required' => 'O estado é obrigatório',
        'status_invalid' => 'O estado selecionado não é válido',
        'client_not_found' => 'O cliente selecionado não existe',
        'priority_invalid' => 'A prioridade selecionada não é válida',
        'repo_url_invalid' => 'O URL do repositório não é válido',
        'staging_url_invalid' => 'O URL de staging não é válido',
        'production_url_invalid' => 'O URL de produção não é válido',
        'figma_url_invalid' => 'O URL do Figma não é válido',
        'docs_url_invalid' => 'O URL da documentação não é válido',
    ],
    
    // Tabs
    'tab_info' => 'Info Base',
    'tab_links' => 'Links Dev',
    'tab_notes' => 'Notas',
    
    // Quick links (icons tooltip)
    'open_repo' => 'Abrir Repositório',
    'open_staging' => 'Abrir Staging',
    'open_production' => 'Abrir Produção',
    'open_figma' => 'Abrir Figma',
    'open_docs' => 'Abrir Documentação',

    // Show page - Sidebar & Tabs
    'overview' => 'Visão Geral',
    'quick_info' => 'Info Rápidas',
    'quick_links' => 'Links Rápidos',
    'created_at' => 'Criado em',
    'updated_at' => 'Atualizado em',

    // Empty states
    'no_description' => 'Sem descrição',
    'no_notes' => 'Sem notas',
    'no_priority' => 'Sem prioridade',
    'no_links' => 'Sem links configurados',
    'no_links_configured' => 'Sem links configurados',

    // Actions
    'open' => 'Abrir',
    'add_to_calendar' => 'Adicionar ao Calendário',
    'restore' => 'Restaurar',
    'force_delete' => 'Excluir permanentemente',
    'confirm_restore' => 'Deseja restaurar este projeto?',
    'confirm_force_delete' => 'Tem certeza de que deseja excluir permanentemente este projeto? Esta ação não pode ser desfeita e os dados relacionados podem ser perdidos.',

    // Calendar
    'project' => 'Projeto',

    // Stats Cards
    'stats' => [
        'total' => 'Total de Projetos',
        'in_progress' => 'Em Curso',
        'completed' => 'Concluídos',
        'archived' => 'Arquivados',
        'this_month' => 'este mês',
        'this_week' => 'esta semana',
        'of_total' => 'do total',
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
