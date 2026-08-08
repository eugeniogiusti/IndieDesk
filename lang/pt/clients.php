<?php

return [
    // Page titles
    'title' => 'Clientes',
    'client' => 'Cliente',
    'clients_list' => 'Lista de Clientes',
    'create_client' => 'Novo Cliente',
    'export_excel' => 'Exportar Excel',
    'edit_client' => 'Editar Cliente',
    'all_statuses' => 'Todos os estados',
    'client_details' => 'Detalhes do Cliente',

    // Actions
    'add_client' => 'Adicionar Cliente',
    'back_to_list' => 'Voltar à lista',
    'recent_projects' => 'Projetos Recentes',
    'save' => 'Guardar',
    'cancel' => 'Cancelar',
    'edit' => 'Editar',
    'delete' => 'Eliminar',
    'restore' => 'Restaurar',
    'force_delete' => 'Eliminar Definitivamente',
    'search' => 'Pesquisar',
    'filter' => 'Filtrar',
    'reset' => 'Repor',

    // Form labels
    'name' => 'Nome / Razão Social',
    'email' => 'Email',
    'status' => 'Estado',
    'vat_number' => 'NIF',
    'phone_prefix' => 'Prefixo',
    'select_prefix' => 'Selecionar',
    'phone' => 'Telefone',
    'pec' => 'PEC',
    'website' => 'Website',
    'linkedin' => 'LinkedIn',
    'notes' => 'Notas',

    // Billing fields
    'billing_info' => 'Dados de Faturação',
    'billing_address' => 'Morada',
    'billing_city' => 'Cidade',
    'billing_zip' => 'Código Postal',
    'billing_province' => 'Província',
    'billing_country' => 'País',
    'billing_recipient_code' => 'Código Destinatário',

    // Contact info
    'contact_info' => 'Informações de Contacto',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Ativo',
    'status_archived' => 'Arquivado',

    // Messages
    'created_successfully' => 'Cliente criado com sucesso',
    'updated_successfully' => 'Cliente atualizado com sucesso',
    'deleted_successfully' => 'Cliente eliminado com sucesso',
    'restored_successfully' => 'Cliente restaurado com sucesso',
    'permanently_deleted' => 'Cliente eliminado definitivamente',

    // Validation messages
    'validation' => [
        'name_required' => 'O nome é obrigatório',
        'email_required' => 'O email é obrigatório',
        'email_invalid' => 'O email não é válido',
        'email_unique' => 'Este email já está em uso',
        'status_required' => 'O estado é obrigatório',
        'status_invalid' => 'O estado selecionado não é válido',
        'country_code_invalid' => 'O código do país deve ter 2 caracteres (ex: IT, US)',
        'recipient_code_invalid' => 'O código destinatário deve ter 7 caracteres',
        'website_invalid' => 'O URL do website não é válido',
        'linkedin_invalid' => 'O URL do LinkedIn não é válido',
    ],

    // Table headers
    'table' => [
        'name' => 'Nome',
        'email' => 'Email',
        'status' => 'Estado',
        'phone' => 'Telefone',
        'created_at' => 'Criado em',
        'actions' => 'Ações',
    ],

    // Empty states
    'no_clients' => 'Nenhum cliente encontrado',
    'no_clients_description' => 'Começa por adicionar o teu primeiro cliente',

    // Confirmations
    'confirm_delete' => 'Tens a certeza de que queres eliminar este cliente?',
    'confirm_force_delete' => 'Tens a certeza de que queres eliminar definitivamente este cliente? Esta ação não pode ser desfeita.',
    'confirm_restore' => 'Queres restaurar este cliente?',

    // Placeholders
    'placeholder' => [
        'name' => 'Ex: Acme S.r.l.',
        'email' => 'Ex: info@acme.it',
        'vat_number' => 'Ex: IT12345678901',
        'phone' => 'Ex: 333 1234567',
        'pec' => 'Ex: acme@pec.it',
        'website' => 'Ex: https://www.acme.it',
        'linkedin' => 'Ex: https://www.linkedin.com/company/acme',
        'billing_address' => 'Ex: Via Roma 10',
        'billing_city' => 'Ex: Milão',
        'billing_zip' => 'Ex: 20100',
        'billing_province' => 'Ex: MI',
        'billing_country' => 'Ex: IT',
        'billing_recipient_code' => 'Ex: ABCDEFG',
        'search' => 'Pesquisar por nome, email ou NIF...',
        'notes' => 'Adicionar notas...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'Código ISO de 2 caracteres (IT, US, FR, etc.)',
        'billing_recipient_code' => 'Código único para faturação eletrónica (7 caracteres)',
        'billing_province' => 'Sigla da província (ex: RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Sem informações de contacto disponíveis',
    'no_billing_info' => 'Sem dados de faturação disponíveis',
    'no_web_social' => 'Sem links web ou sociais disponíveis',

    // Actions for client details
    'view_profile' => 'Ver Perfil',
    'view_page' => 'Ver Página',
    'send_email' => 'Enviar Email',

    // Additional fields (solo quelli che usi)
    'address' => 'Morada',
    'fiscal_code' => 'Código Fiscal',
    'sdi_code' => 'Código SDI',
    'company' => 'Empresa',

        // Stats Cards
    'stats' => [
        'total' => 'Total de Clientes',
        'lead' => 'Leads',
        'active' => 'Ativos',
        'archived' => 'Arquivados',
        'this_month' => 'este mês',
        'of_total' => 'do total',
        'converted' => 'convertidos',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Acompanhamento Lead',
        'add' => 'Adicionar acompanhamento',
        'modal_title' => 'Novo acompanhamento',
        'modal_title_edit' => 'Editar acompanhamento',
        'empty' => 'Nenhum acompanhamento registrado',
        'created' => 'Acompanhamento salvo',
        'updated' => 'Acompanhamento atualizado',
        'deleted' => 'Acompanhamento excluído',
        'add_to_calendar' => 'Adicionar ao Google Agenda',
        'confirm_delete' => 'Excluir este acompanhamento?',
        'type' => 'Tipo',
        'contacted_at' => 'Data do contato',
        'note' => 'Nota',
        'note_placeholder' => 'Descreva brevemente o contato...',
        'type_call' => 'Ligação',
        'type_email' => 'E-mail',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Reunião',
        'type_note' => 'Nota',
        'action_call' => 'Ligar',
        'action_email' => 'E-mail',
        'validation' => [
            'type_required' => 'O tipo é obrigatório',
            'type_invalid' => 'Tipo inválido',
            'contacted_at_required' => 'A data de contato é obrigatória',
            'contacted_at_invalid' => 'Data inválida',
        ],
    ],
];