<?php

return [
    // Page titles
    'title' => 'Проєкти',
    'projects_list' => 'Список проєктів',
    'create_project' => 'Новий проєкт',
    'edit_project' => 'Редагувати проєкт',
    'project_details' => 'Деталі проєкту',

    // Navigation
    'back_to_list' => 'Повернутися до списку',
    'add_project' => 'Додати проєкт',

    // Form labels - Tab 1: Info Base
    'name' => 'Назва проєкту',
    'client' => 'Клієнт',
    'clients' => 'Клієнти',
    'is_internal' => 'Внутрішній проєкт',
    'description' => 'Опис',
    'status' => 'Статус',
    'priority' => 'Пріоритет',

    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Посилання для розробки',
    'repo_url' => 'Репозиторій',
    'staging_url' => 'Staging',
    'production_url' => 'Production',
    'figma_url' => 'Figma',
    'docs_url' => 'Документація',

    // Project type
    'type' => 'Тип проєкту',
    'type_client_work' => 'Робота для клієнта',
    'type_product' => 'Продукт',
    'type_content' => 'Контент',
    'type_asset' => 'Asset',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Дата початку',
    'due_date' => 'Дедлайн',

    // Due date labels

    'due_soon' => 'Незабаром',
    'overdue' => 'Прострочено',

    // Form labels - Tab 3: Notes
    'notes' => 'Нотатки',

    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Напр. E-commerce Acme S.r.l.',
        'client' => 'Пошук клієнта...',
        'description' => 'Короткий опис проєкту...',
        'notes' => 'Нотатки та загальні коментарі про проєкт...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],


    // Status options
    'status_draft' => 'Чернетка',
    'status_in_progress' => 'У процесі',
    'status_completed' => 'Завершено',
    'status_archived' => 'Архівовано',

    // Priority options
    'select_priority' => 'Оберіть пріоритет',
    'priority_low' => 'Низький',
    'priority_medium' => 'Середній',
    'priority_high' => 'Високий',

    // Table headers
    'table' => [
        'name' => 'Назва',
        'client' => 'Клієнт',
        'status' => 'Статус',
        'priority' => 'Пріоритет',
        'links' => 'Посилання',
        'created_at' => 'Створено',
        'actions' => 'Дії',
    ],

    // Internal project label
    'internal_project' => 'Внутрішній проєкт',
    'no_clients_linked' => 'Клієнтів не прив’язано',
    'internal_project_desc' => 'Це внутрішній проєкт. Інформація про клієнта відсутня.',

    // Buttons
    'save' => 'Зберегти проєкт',
    'filter' => 'Фільтрувати',
    'cancel' => 'Скасувати',
    'edit' => 'Редагувати',
    'details' => 'Деталі',
    'client_details' => 'Деталі клієнта',
    'delete' => 'Видалити',
    'reset' => 'Скинути',
    'confirm_delete' => 'Ви впевнені, що хочете видалити цей проєкт?',

    // Messages
    'created_successfully' => 'Проєкт успішно створено',
    'updated_successfully' => 'Проєкт успішно оновлено',
    'deleted_successfully' => 'Проєкт успішно видалено',
    'restored_successfully' => 'Проєкт успішно відновлено',
    'permanently_deleted' => 'Проєкт видалено назавжди',

    // Empty state
    'no_projects' => 'Проєктів не знайдено',
    'no_projects_description' => 'Почніть зі створення першого проєкту',
    'create_first_project' => 'Створіть перший проєкт',

    // Filters
    'filter_by_client' => 'Фільтр за клієнтом',
    'filter_by_status' => 'Фільтр за статусом',
    'filter_by_priority' => 'Фільтр за пріоритетом',
    'search_placeholder' => 'Пошук за назвою, клієнтом або ПДВ...',
    'all_clients' => 'Усі клієнти',
    'all_statuses' => 'Усі статуси',
    'all_priorities' => 'Усі пріоритети',

    // Validation messages
    'validation' => [
        'name_required' => 'Назва проєкту є обовʼязковою',
        'status_required' => 'Статус є обовʼязковим',
        'status_invalid' => 'Вибраний статус недійсний',
        'client_not_found' => 'Вибраний клієнт не існує',
        'priority_invalid' => 'Вибраний пріоритет недійсний',
        'repo_url_invalid' => 'URL репозиторію недійсний',
        'staging_url_invalid' => 'URL staging недійсний',
        'production_url_invalid' => 'URL production недійсний',
        'figma_url_invalid' => 'URL Figma недійсний',
        'docs_url_invalid' => 'URL документації недійсний',
    ],

    // Tabs
    'tab_info' => 'Базова інформація',
    'tab_links' => 'Dev links',
    'tab_notes' => 'Нотатки',

    // Quick links (icons tooltip)
    'open_repo' => 'Відкрити репозиторій',
    'open_staging' => 'Відкрити staging',
    'open_production' => 'Відкрити production',
    'open_figma' => 'Відкрити Figma',
    'open_docs' => 'Відкрити документацію',

    // Show page - Sidebar & Tabs
    'overview' => 'Огляд',
    'quick_info' => 'Швидка інформація',
    'quick_links' => 'Швидкі посилання',
    'created_at' => 'Створено',
    'updated_at' => 'Оновлено',

    // Empty states
    'no_description' => 'Немає опису',
    'no_notes' => 'Немає нотаток',
    'no_priority' => 'Немає пріоритету',
    'no_links' => 'Немає налаштованих посилань',
    'no_links_configured' => 'Немає налаштованих посилань',

    // Actions
    'open' => 'Відкрити',
    'add_to_calendar' => 'Додати до календаря',
    'restore' => 'Відновити',
    'force_delete' => 'Видалити назавжди',
    'confirm_restore' => 'Бажаєте відновити цей проект?',
    'confirm_force_delete' => 'Ви впевнені що хочете остаточно видалити цей проект? Цю дію неможливо скасувати і пов\'язані дані можуть бути втрачені.',

    // Calendar
    'project' => 'Проєкт',

    // Stats Cards
    'stats' => [
        'total' => 'Усього проєктів',
        'in_progress' => 'У процесі',
        'completed' => 'Завершені',
        'archived' => 'Архівовані',
        'this_month' => 'цього місяця',
        'this_week' => 'цього тижня',
        'of_total' => 'від загальної кількості',
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
