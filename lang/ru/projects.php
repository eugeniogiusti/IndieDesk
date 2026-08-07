<?php

return [
    // Page titles
    'title' => 'Проекты',
    'projects_list' => 'Список проектов',
    'create_project' => 'Новый проект',
    'edit_project' => 'Изменить проект',
    'project_details' => 'Детали проекта',

    // Navigation
    'back_to_list' => 'Назад к списку',
    'add_project' => 'Добавить проект',

    // Form labels - Tab 1: Base Info
    'name' => 'Название проекта',
    'client' => 'Клиент',
    'clients' => 'Клиенты',
    'is_internal' => 'Внутренний проект',
    'description' => 'Описание',
    'status' => 'Статус',
    'priority' => 'Приоритет',

    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Ссылки разработки',
    'repo_url' => 'Репозиторий',
    'staging_url' => 'Staging',
    'production_url' => 'Продакшн',
    'figma_url' => 'Figma',
    'docs_url' => 'Документация',

    // Project type
    'type' => 'Тип проекта',
    'type_client_work' => 'Работа для клиента',
    'type_product' => 'Продукт',
    'type_content' => 'Контент',
    'type_asset' => 'Ассет',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Дата начала',
    'due_date' => 'Срок',

    // Due date labels
    'due_soon' => 'Скоро срок',
    'overdue' => 'Просрочен',

    // Form labels - Tab 3: Notes
    'notes' => 'Заметки',

    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Пример: E-commerce Acme S.r.l.',
        'client' => 'Поиск клиента...',
        'description' => 'Краткое описание проекта...',
        'notes' => 'Общие заметки по проекту...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    // Status options
    'status_draft' => 'Черновик',
    'status_in_progress' => 'В работе',
    'status_completed' => 'Завершен',
    'status_archived' => 'Архивирован',

    // Priority options
    'select_priority' => 'Выберите приоритет',
    'priority_low' => 'Низкий',
    'priority_medium' => 'Средний',
    'priority_high' => 'Высокий',

    // Table headers
    'table' => [
        'name' => 'Название',
        'client' => 'Клиент',
        'status' => 'Статус',
        'priority' => 'Приоритет',
        'links' => 'Ссылки',
        'created_at' => 'Создан',
        'actions' => 'Действия',
    ],

    // Internal project label
    'internal_project' => 'Внутренний проект',
    'no_clients_linked' => 'Клиенты не привязаны',
    'internal_project_desc' => 'Это внутренний проект. Данные клиента отсутствуют.',

    // Buttons
    'save' => 'Сохранить проект',
    'filter' => 'Фильтр',
    'cancel' => 'Отмена',
    'edit' => 'Изменить',
    'details' => 'Детали',
    'client_details' => 'Детали клиента',
    'delete' => 'Удалить',
    'reset' => 'Сбросить',
    'confirm_delete' => 'Вы уверены, что хотите удалить этот проект?',

    // Messages
    'created_successfully' => 'Проект успешно создан',
    'updated_successfully' => 'Проект успешно обновлен',
    'deleted_successfully' => 'Проект успешно удален',
    'restored_successfully' => 'Проект успешно восстановлен',
    'permanently_deleted' => 'Проект удален навсегда',

    // Empty state
    'no_projects' => 'Проекты не найдены',
    'no_projects_description' => 'Начните с создания первого проекта',
    'create_first_project' => 'Создать первый проект',

    // Filters
    'filter_by_client' => 'Фильтр по клиенту',
    'filter_by_status' => 'Фильтр по статусу',
    'filter_by_priority' => 'Фильтр по приоритету',
    'search_placeholder' => 'Поиск по названию, клиенту или НДС...',
    'all_clients' => 'Все клиенты',
    'all_statuses' => 'Все статусы',
    'all_priorities' => 'Все приоритеты',

    // Validation messages
    'validation' => [
        'name_required' => 'Название проекта обязательно',
        'status_required' => 'Статус обязателен',
        'status_invalid' => 'Выбран недопустимый статус',
        'client_not_found' => 'Выбранный клиент не существует',
        'priority_invalid' => 'Выбран недопустимый приоритет',
        'repo_url_invalid' => 'Некорректный URL репозитория',
        'staging_url_invalid' => 'Некорректный URL staging',
        'production_url_invalid' => 'Некорректный URL production',
        'figma_url_invalid' => 'Некорректный URL Figma',
        'docs_url_invalid' => 'Некорректный URL документации',
    ],

    // Tabs
    'tab_info' => 'Базовая информация',
    'tab_links' => 'Dev-ссылки',
    'tab_notes' => 'Заметки',

    // Quick links (icons tooltip)
    'open_repo' => 'Открыть репозиторий',
    'open_staging' => 'Открыть staging',
    'open_production' => 'Открыть production',
    'open_figma' => 'Открыть Figma',
    'open_docs' => 'Открыть документацию',

    // Show page - Sidebar & Tabs
    'overview' => 'Обзор',
    'quick_info' => 'Быстрая информация',
    'quick_links' => 'Быстрые ссылки',
    'created_at' => 'Создан',
    'updated_at' => 'Обновлен',

    // Empty states
    'no_description' => 'Нет описания',
    'no_notes' => 'Нет заметок',
    'no_priority' => 'Нет приоритета',
    'no_links' => 'Ссылки не настроены',
    'no_links_configured' => 'Ссылки не настроены',

    // Actions
    'open' => 'Открыть',
    'add_to_calendar' => 'Добавить в календарь',
    'restore' => 'Восстановить',
    'force_delete' => 'Удалить навсегда',
    'confirm_restore' => 'Восстановить этот проект?',
    'confirm_force_delete' => 'Вы уверены, что хотите удалить этот проект навсегда? Это действие нельзя отменить, связанные данные могут быть утеряны.',

    // Calendar
    'project' => 'Проект',

    // Stats Cards
    'stats' => [
        'total' => 'Всего проектов',
        'in_progress' => 'В работе',
        'completed' => 'Завершены',
        'archived' => 'В архиве',
        'this_month' => 'в этом месяце',
        'this_week' => 'на этой неделе',
        'of_total' => 'от общего',
    ],


    // Repository (GitHub)
    'repository' => 'Repository',
    'commit_activity' => 'Attività commit',
    'recent_commits' => 'Commit recenti',
    'less' => 'Meno',
    'more' => 'Di più',
    'no_repository_data' => 'Nessun dato disponibile per questo repository.',
    'repository_fetch_error' => 'Errore nel caricamento dei dati GitHub.',
    'editor_tab' => 'Редактор',
];
