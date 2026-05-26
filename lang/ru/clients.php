<?php

return [
    // Page titles
    'title' => 'Клиенты',
    'client' => 'Клиент',
    'clients_list' => 'Список клиентов',
    'create_client' => 'Новый клиент',
    'edit_client' => 'Редактировать клиента',
    'all_statuses' => 'Все статусы',
    'client_details' => 'Детали клиента',

    // Actions
    'add_client' => 'Добавить клиента',
    'back_to_list' => 'Вернуться к списку',
    'recent_projects' => 'Недавние проекты',
    'save' => 'Сохранить',
    'cancel' => 'Отмена',
    'edit' => 'Редактировать',
    'delete' => 'Удалить',
    'restore' => 'Восстановить',
    'force_delete' => 'Удалить навсегда',
    'search' => 'Поиск',
    'filter' => 'Фильтр',
    'reset' => 'Сброс',

    // Form labels
    'name' => 'Имя / Название компании',
    'email' => 'Email',
    'status' => 'Статус',
    'vat_number' => 'НДС номер',
    'phone_prefix' => 'Код',
    'select_prefix' => 'Выберите',
    'phone' => 'Телефон',
    'pec' => 'PEC',
    'website' => 'Веб-сайт',
    'linkedin' => 'LinkedIn',
    'notes' => 'Заметки',

    // Billing fields
    'billing_info' => 'Данные для выставления счетов',
    'billing_address' => 'Адрес',
    'billing_city' => 'Город',
    'billing_zip' => 'Индекс',
    'billing_province' => 'Область',
    'billing_country' => 'Страна',
    'billing_recipient_code' => 'Код получателя',

    // Contact info
    'contact_info' => 'Контактная информация',
    'web_social' => 'Веб и соцсети',

    // Status options
    'status_lead' => 'Лид',
    'status_prospect' => 'Prospect',
    'status_active' => 'Активный',
    'status_archived' => 'Архивный',

    // Messages
    'created_successfully' => 'Клиент успешно создан',
    'updated_successfully' => 'Клиент успешно обновлен',
    'deleted_successfully' => 'Клиент успешно удален',
    'restored_successfully' => 'Клиент успешно восстановлен',
    'permanently_deleted' => 'Клиент удален навсегда',

    // Validation messages
    'validation' => [
        'name_required' => 'Имя обязательно',
        'email_required' => 'Email обязателен',
        'email_invalid' => 'Некорректный email',
        'email_unique' => 'Этот email уже используется',
        'status_required' => 'Статус обязателен',
        'status_invalid' => 'Выбран неверный статус',
        'country_code_invalid' => 'Код страны должен состоять из 2 символов (например: IT, US)',
        'recipient_code_invalid' => 'Код получателя должен содержать 7 символов',
        'website_invalid' => 'Некорректный URL сайта',
        'linkedin_invalid' => 'Некорректный URL LinkedIn',
    ],

    // Table headers
    'table' => [
        'name' => 'Имя',
        'email' => 'Email',
        'status' => 'Статус',
        'phone' => 'Телефон',
        'created_at' => 'Создан',
        'actions' => 'Действия',
    ],

    // Empty states
    'no_clients' => 'Клиенты не найдены',
    'no_clients_description' => 'Начните с добавления первого клиента',

    // Confirmations
    'confirm_delete' => 'Вы уверены, что хотите удалить этого клиента?',
    'confirm_force_delete' => 'Вы уверены, что хотите удалить этого клиента навсегда? Это действие нельзя отменить.',
    'confirm_restore' => 'Восстановить этого клиента?',

    // Placeholders
    'placeholder' => [
        'name' => 'Напр.: Acme S.r.l.',
        'email' => 'Напр.: info@acme.it',
        'vat_number' => 'Напр.: IT12345678901',
        'phone' => 'Напр.: 333 1234567',
        'pec' => 'Напр.: acme@pec.it',
        'website' => 'Напр.: https://www.acme.it',
        'linkedin' => 'Напр.: https://www.linkedin.com/company/acme',
        'billing_address' => 'Напр.: Via Roma 10',
        'billing_city' => 'Напр.: Milano',
        'billing_zip' => 'Напр.: 20100',
        'billing_province' => 'Напр.: MI',
        'billing_country' => 'Напр.: IT',
        'billing_recipient_code' => 'Напр.: ABCDEFG',
        'search' => 'Поиск по имени, email или НДС...',
        'notes' => 'Добавьте заметки...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'ISO-код из 2 символов (IT, US, FR и т.д.)',
        'billing_recipient_code' => 'Уникальный код для электронного счета (7 символов)',
        'billing_province' => 'Код области (напр.: RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Контактная информация отсутствует',
    'no_billing_info' => 'Данные для выставления счетов отсутствуют',
    'no_web_social' => 'Веб или социальные ссылки отсутствуют',

    // Actions for client details
    'view_profile' => 'Открыть профиль',
    'view_page' => 'Открыть страницу',
    'send_email' => 'Отправить email',

    // Additional fields
    'address' => 'Адрес',
    'fiscal_code' => 'Налоговый код',
    'sdi_code' => 'Код SDI',
    'company' => 'Компания',

    // Stats Cards
    'stats' => [
        'total' => 'Всего клиентов',
        'lead' => 'Лиды',
        'active' => 'Активные',
        'archived' => 'Архивные',
        'this_month' => 'в этом месяце',
        'of_total' => 'от общего',
        'converted' => 'конвертировано',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Follow-up лида',
        'add' => 'Добавить follow-up',
        'modal_title' => 'Новый follow-up',
        'modal_title_edit' => 'Редактировать follow-up',
        'empty' => 'Нет зарегистрированных follow-up',
        'created' => 'Follow-up сохранён',
        'updated' => 'Follow-up обновлён',
        'deleted' => 'Follow-up удалён',
        'add_to_calendar' => 'Добавить в Google Календарь',
        'confirm_delete' => 'Удалить этот follow-up?',
        'type' => 'Тип',
        'contacted_at' => 'Дата контакта',
        'note' => 'Заметка',
        'note_placeholder' => 'Кратко опишите контакт...',
        'type_call' => 'Звонок',
        'type_email' => 'E-mail',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Встреча',
        'type_note' => 'Заметка',
        'action_call' => 'Позвонить',
        'action_email' => 'E-mail',
        'validation' => [
            'type_required' => 'Тип обязателен',
            'type_invalid' => 'Недопустимый тип',
            'contacted_at_required' => 'Дата контакта обязательна',
            'contacted_at_invalid' => 'Неверная дата',
        ],
    ],
];