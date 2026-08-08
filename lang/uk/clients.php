<?php

return [
    // Page titles
    'title' => 'Клієнти',
    'client' => 'Клієнт',
    'clients_list' => 'Список клієнтів',
    'create_client' => 'Новий клієнт',
    'export_excel' => 'Експорт в Excel',
    'edit_client' => 'Редагувати клієнта',
    'all_statuses' => 'Усі статуси',
    'client_details' => 'Деталі клієнта',

    // Actions
    'add_client' => 'Додати клієнта',
    'back_to_list' => 'Повернутися до списку',
    'recent_projects' => 'Останні проєкти',
    'save' => 'Зберегти',
    'cancel' => 'Скасувати',
    'edit' => 'Редагувати',
    'delete' => 'Видалити',
    'restore' => 'Відновити',
    'force_delete' => 'Видалити назавжди',
    'search' => 'Пошук',
    'filter' => 'Фільтрувати',
    'reset' => 'Скинути',

    // Form labels
    'name' => 'Назва / Компанія',
    'email' => 'Email',
    'status' => 'Статус',
    'vat_number' => 'ПДВ',
    'phone_prefix' => 'Префікс',
    'select_prefix' => 'Обрати',
    'phone' => 'Телефон',
    'pec' => 'PEC',
    'website' => 'Вебсайт',
    'linkedin' => 'LinkedIn',
    'notes' => 'Нотатки',

    // Billing fields
    'billing_info' => 'Дані для рахунку',
    'billing_address' => 'Адреса',
    'billing_city' => 'Місто',
    'billing_zip' => 'Поштовий індекс',
    'billing_province' => 'Область',
    'billing_country' => 'Країна',
    'billing_recipient_code' => 'Код отримувача',

    // Contact info
    'contact_info' => 'Контактна інформація',
    'web_social' => 'Web та Social',

    // Status options
    'status_lead' => 'Лід',
    'status_prospect' => 'Prospect',
    'status_active' => 'Активний',
    'status_archived' => 'Архівований',

    // Messages
    'created_successfully' => 'Клієнта успішно створено',
    'updated_successfully' => 'Клієнта успішно оновлено',
    'deleted_successfully' => 'Клієнта успішно видалено',
    'restored_successfully' => 'Клієнта успішно відновлено',
    'permanently_deleted' => 'Клієнта видалено назавжди',

    // Validation messages
    'validation' => [
        'name_required' => 'Назва є обовʼязковою',
        'email_required' => 'Email є обовʼязковим',
        'email_invalid' => 'Email недійсний',
        'email_unique' => 'Цей email уже використовується',
        'status_required' => 'Статус є обовʼязковим',
        'status_invalid' => 'Вибраний статус недійсний',
        'country_code_invalid' => 'Код країни має бути з 2 символів (наприклад: IT, US)',
        'recipient_code_invalid' => 'Код отримувача має бути з 7 символів',
        'website_invalid' => 'URL сайту недійсний',
        'linkedin_invalid' => 'URL LinkedIn недійсний',
    ],

    // Table headers
    'table' => [
        'name' => 'Назва',
        'email' => 'Email',
        'status' => 'Статус',
        'phone' => 'Телефон',
        'created_at' => 'Створено',
        'actions' => 'Дії',
    ],

    // Empty states
    'no_clients' => 'Клієнтів не знайдено',
    'no_clients_description' => 'Почніть з додавання першого клієнта',

    // Confirmations
    'confirm_delete' => 'Ви впевнені, що хочете видалити цього клієнта?',
    'confirm_force_delete' => 'Ви впевнені, що хочете видалити цього клієнта назавжди? Цю дію не можна скасувати.',
    'confirm_restore' => 'Ви хочете відновити цього клієнта?',

    // Placeholders
    'placeholder' => [
        'name' => 'Напр. Acme S.r.l.',
        'email' => 'Напр. info@acme.it',
        'vat_number' => 'Напр. IT12345678901',
        'phone' => 'Напр. 333 1234567',
        'pec' => 'Напр. acme@pec.it',
        'website' => 'Напр. https://www.acme.it',
        'linkedin' => 'Напр. https://www.linkedin.com/company/acme',
        'billing_address' => 'Напр. Via Roma 10',
        'billing_city' => 'Напр. Milano',
        'billing_zip' => 'Напр. 20100',
        'billing_province' => 'Напр. MI',
        'billing_country' => 'Напр. IT',
        'billing_recipient_code' => 'Напр. ABCDEFG',
        'search' => 'Пошук за назвою, email або ПДВ...',
        'notes' => 'Додайте нотатки...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'Код ISO з 2 символів (IT, US, FR тощо)',
        'billing_recipient_code' => 'Унікальний код для е-рахунку (7 символів)',
        'billing_province' => 'Скорочення області (наприклад: RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Немає контактної інформації',
    'no_billing_info' => 'Немає даних для рахунку',
    'no_web_social' => 'Немає веб або social посилань',

    // Actions for client details
    'view_profile' => 'Переглянути профіль',
    'view_page' => 'Переглянути сторінку',
    'send_email' => 'Надіслати email',

    // Additional fields (solo quelli che usi)
    'address' => 'Адреса',
    'fiscal_code' => 'Фіскальний код',
    'sdi_code' => 'Код SDI',
    'company' => 'Компанія',

        // Stats Cards
    'stats' => [
        'total' => 'Усього клієнтів',
        'lead' => 'Ліди',
        'active' => 'Активні',
        'archived' => 'Архівовані',
        'this_month' => 'цього місяця',
        'of_total' => 'від загальної кількості',
        'converted' => 'конвертовані',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Follow-up ліда',
        'add' => 'Додати follow-up',
        'modal_title' => 'Новий follow-up',
        'modal_title_edit' => 'Редагувати follow-up',
        'empty' => 'Немає зареєстрованих follow-up',
        'created' => 'Follow-up збережено',
        'updated' => 'Follow-up оновлено',
        'deleted' => 'Follow-up видалено',
        'add_to_calendar' => 'Додати до Google Календаря',
        'confirm_delete' => 'Видалити цей follow-up?',
        'type' => 'Тип',
        'contacted_at' => 'Дата контакту',
        'note' => 'Нотатка',
        'note_placeholder' => 'Коротко опишіть контакт...',
        'type_call' => 'Дзвінок',
        'type_email' => 'E-mail',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Зустріч',
        'type_note' => 'Нотатка',
        'action_call' => 'Зателефонувати',
        'action_email' => 'E-mail',
        'validation' => [
            'type_required' => 'Тип є обовʼязковим',
            'type_invalid' => 'Недопустимий тип',
            'contacted_at_required' => 'Дата контакту є обовʼязковою',
            'contacted_at_invalid' => 'Невірна дата',
        ],
    ],
];