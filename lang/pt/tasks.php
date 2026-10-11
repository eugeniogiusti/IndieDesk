<?php

return [
    // Page titles
    'title' => 'Tarefas',
    'task_list' => 'Lista de Tarefas',
    'create_task' => 'Criar Tarefa',
    'edit_task' => 'Editar Tarefa',
    'index_description' => 'Gere todas as tarefas dos teus projetos',
    
    // Fields
    'task_title' => 'Título',
    'description' => 'Descrição',
    'type' => 'Tipo',
    'status' => 'Estado',
    'priority' => 'Prioridade',
    'due_date' => 'Vencimento',
    'project' => 'Projeto',
    
    // Types
    'type_feature' => 'Feature',
    'type_improvement' => 'Melhoria',
    'type_bug' => 'Bug',
    'type_infra' => 'Infra',
    'type_refactor' => 'Refactor',
    'type_research' => 'Research',
    'type_administrative' => 'Administrativo',
    'type_marketing' => 'Marketing',
    'type_commercial' => 'Comercial',
    'type_hardware' => 'Hardware',
    'type_documentation' => 'Documentação',
    'type_maintenance' => 'Manutenção',
    
    // Statuses
    'status_todo' => 'Por fazer',
    'status_in_progress' => 'Em curso',
    'status_blocked' => 'Bloqueado',
    'status_done' => 'Concluído',
    
    // Priorities
    'select_priority' => 'Selecionar prioridade',
    'priority_low' => 'Baixa',
    'priority_medium' => 'Média',
    'priority_high' => 'Alta',
    
    // Actions (task-specific)
    'add_task' => 'Adicionar Tarefa',
    'view_all' => 'Ver todas as tarefas',
    'recent_tasks' => 'Tarefas Recentes',
    'view_project' => 'Ir para o projeto',
    'add_to_calendar' => 'Adicionar ao Calendário',
    'mark_complete' => 'Marcar como concluída',
    'mark_incomplete' => 'Marcar como não concluída',
    
    // Messages
    'created_successfully' => 'Tarefa criada com sucesso',
    'updated_successfully' => 'Tarefa atualizada com sucesso',
    'deleted_successfully' => 'Tarefa eliminada com sucesso',
    'confirm_delete' => 'Tens a certeza de que queres eliminar esta tarefa?',
    
    // Empty states
    'no_tasks' => 'Nenhuma tarefa encontrada',
    'no_tasks_description' => 'Começa por adicionar a primeira tarefa',
    
    // Stats
    'total_tasks' => 'Total de tarefas',
    'open_tasks' => 'Tarefas abertas',
    'completed_tasks' => 'Tarefas concluídas',
    'overdue_tasks' => 'Tarefas em atraso',

    // Due date states
    'overdue' => 'Em atraso',
    'due_today' => 'Hoje',
    'due_soon' => 'A vencer',
    'no_due_date' => 'Sem vencimento',
    
    // Filters
    'all_statuses' => 'Todos os estados',
    'all_types' => 'Todos os tipos',
    
    // Placeholders
    'placeholder' => [
        'title' => 'ex. Implementar login OAuth',
        'description' => 'Descrição detalhada da tarefa...',
        'search' => 'Pesquisar por título ou nome do projeto...',
    ],

    // Index Statistics
        'stats' => [
        'todo' => 'Por Fazer',
        'backlog' => 'Backlog',
        'in_progress' => 'Em Curso',
        'working_on' => 'Em execução',
        'blocked' => 'Bloqueadas',
        'need_attention' => 'Precisam de atenção',
        'bugs_open' => 'Bugs Abertos',
        'to_fix' => 'Para corrigir',
    ],
];
