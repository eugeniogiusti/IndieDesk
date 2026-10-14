<?php

return [
    // Page titles
    'title' => 'Задачи',
    'task_list' => 'Список задач',
    'create_task' => 'Создать задачу',
    'edit_task' => 'Изменить задачу',
    'index_description' => 'Управляйте всеми задачами ваших проектов',

    // Fields
    'task_title' => 'Название',
    'description' => 'Описание',
    'type' => 'Тип',
    'status' => 'Статус',
    'priority' => 'Приоритет',
    'due_date' => 'Срок',
    'project' => 'Проект',

    // Types
    'type_feature' => 'Feature',
    'type_improvement' => 'Улучшение',
    'type_bug' => 'Bug',
    'type_infra' => 'Infra',
    'type_refactor' => 'Refactor',
    'type_research' => 'Research',
    'type_administrative' => 'Административная',
    'type_marketing' => 'Маркетинг',
    'type_commercial' => 'Коммерческая',
    'type_hardware' => 'Оборудование',
    'type_documentation' => 'Документация',
    'type_maintenance' => 'Обслуживание',

    // Statuses
    'status_todo' => 'К выполнению',
    'status_in_progress' => 'В работе',
    'status_blocked' => 'Заблокирована',
    'status_done' => 'Завершена',

    // Priorities
    'select_priority' => 'Выберите приоритет',
    'priority_low' => 'Низкий',
    'priority_medium' => 'Средний',
    'priority_high' => 'Высокий',

    // Actions (task-specific)
    'add_task' => 'Добавить задачу',
    'view_all' => 'Посмотреть все задачи',
    'recent_tasks' => 'Последние задачи',
    'view_project' => 'Перейти к проекту',
    'add_to_calendar' => 'Добавить в календарь',
    'mark_complete' => 'Отметить как выполненную',
    'mark_incomplete' => 'Отметить как невыполненную',

    // Messages
    'created_successfully' => 'Задача успешно создана',
    'updated_successfully' => 'Задача успешно обновлена',
    'deleted_successfully' => 'Задача успешно удалена',
    'confirm_delete' => 'Вы уверены, что хотите удалить эту задачу?',

    // Empty states
    'no_tasks' => 'Задачи не найдены',
    'no_tasks_description' => 'Начните с добавления первой задачи',

    // Stats
    'total_tasks' => 'Всего задач',
    'open_tasks' => 'Открытые задачи',
    'completed_tasks' => 'Завершенные задачи',
    'overdue_tasks' => 'Просроченные задачи',

    // Due date states
    'overdue' => 'Просрочена',
    'due_today' => 'Сегодня',
    'due_soon' => 'Скоро срок',
    'no_due_date' => 'Без срока',

    // Filters
    'all_statuses' => 'Все статусы',
    'all_types' => 'Все типы',
    'filter_due_from' => 'Срок с',
    'filter_due_to' => 'Срок по',

    // Placeholders
    'placeholder' => [
        'title' => 'например, Реализовать OAuth login',
        'description' => 'Подробное описание задачи...',
        'search' => 'Поиск по названию или проекту...',
    ],

    // Index Statistics
    'stats' => [
        'todo' => 'К выполнению',
        'backlog' => 'Бэклог',
        'in_progress' => 'В работе',
        'working_on' => 'В процессе',
        'blocked' => 'Заблокированные',
        'need_attention' => 'Требуют внимания',
        'bugs_open' => 'Открытые баги',
        'to_fix' => 'Нужно исправить',
    ],
];
