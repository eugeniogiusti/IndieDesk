<?php

return [
    // Page titles
    'title' => 'Clientes',
    'client' => 'Cliente',
    'clients_list' => 'Lista de clientes',
    'create_client' => 'Nuevo cliente',
    'export_excel' => 'Exportar Excel',
    'edit_client' => 'Editar cliente',
    'all_statuses' => 'Todos los estados',
    'client_details' => 'Detalles del cliente',

    // Actions
    'add_client' => 'Añadir cliente',
    'back_to_list' => 'Volver a la lista',
    'recent_projects' => 'Proyectos recientes',
    'save' => 'Guardar',
    'cancel' => 'Cancelar',
    'edit' => 'Editar',
    'delete' => 'Eliminar',
    'restore' => 'Restaurar',
    'force_delete' => 'Eliminar definitivamente',
    'search' => 'Buscar',
    'filter' => 'Filtrar',
    'reset' => 'Restablecer',

    // Form labels
    'name' => 'Nombre / Razón social',
    'email' => 'Email',
    'status' => 'Estado',
    'vat_number' => 'NIF / IVA',
    'phone_prefix' => 'Prefijo',
    'select_prefix' => 'Seleccionar',
    'phone' => 'Teléfono',
    'pec' => 'PEC',
    'website' => 'Sitio web',
    'linkedin' => 'LinkedIn',
    'notes' => 'Notas',

    // Billing fields
    'billing_info' => 'Datos de facturación',
    'billing_address' => 'Dirección',
    'billing_city' => 'Ciudad',
    'billing_zip' => 'Código postal',
    'billing_province' => 'Provincia',
    'billing_country' => 'País',
    'billing_recipient_code' => 'Código destinatario',

    // Contact info
    'contact_info' => 'Información de contacto',
    'connected_to_stripe' => 'Conectado a Stripe',
    'web_social' => 'Web y redes',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Activo',
    'status_archived' => 'Archivado',

    // Messages
    'created_successfully' => 'Cliente creado correctamente',
    'updated_successfully' => 'Cliente actualizado correctamente',
    'deleted_successfully' => 'Cliente eliminado correctamente',
    'restored_successfully' => 'Cliente restaurado correctamente',
    'permanently_deleted' => 'Cliente eliminado definitivamente',

    // Validation messages
    'validation' => [
        'name_required' => 'El nombre es obligatorio',
        'email_required' => 'El email es obligatorio',
        'email_invalid' => 'El email no es válido',
        'email_unique' => 'Este email ya está en uso',
        'status_required' => 'El estado es obligatorio',
        'status_invalid' => 'El estado seleccionado no es válido',
        'country_code_invalid' => 'El código de país debe tener 2 caracteres (ej: IT, US)',
        'recipient_code_invalid' => 'El código destinatario debe tener 7 caracteres',
        'website_invalid' => 'La URL del sitio web no es válida',
        'linkedin_invalid' => 'La URL de LinkedIn no es válida',
    ],

    // Table headers
    'table' => [
        'name' => 'Nombre',
        'email' => 'Email',
        'status' => 'Estado',
        'phone' => 'Teléfono',
        'created_at' => 'Creado el',
        'actions' => 'Acciones',
    ],

    // Empty states
    'no_clients' => 'No se encontraron clientes',
    'no_clients_description' => 'Empieza añadiendo tu primer cliente',

    // Confirmations
    'confirm_delete' => '¿Seguro que quieres eliminar este cliente?',
    'confirm_force_delete' => '¿Seguro que quieres eliminar definitivamente este cliente? Esta acción no se puede deshacer.',
    'confirm_restore' => '¿Quieres restaurar este cliente?',

    // Placeholders
    'placeholder' => [
        'name' => 'Ej: Acme S.r.l.',
        'email' => 'Ej: info@acme.it',
        'vat_number' => 'Ej: IT12345678901',
        'phone' => 'Ej: 333 1234567',
        'pec' => 'Ej: acme@pec.it',
        'website' => 'Ej: https://www.acme.it',
        'linkedin' => 'Ej: https://www.linkedin.com/company/acme',
        'billing_address' => 'Ej: Via Roma 10',
        'billing_city' => 'Ej: Milán',
        'billing_zip' => 'Ej: 20100',
        'billing_province' => 'Ej: MI',
        'billing_country' => 'Ej: IT',
        'billing_recipient_code' => 'Ej: ABCDEFG',
        'search' => 'Buscar por nombre, email o NIF...',
        'notes' => 'Añadir notas...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'Código ISO de 2 caracteres (IT, US, FR, etc.)',
        'billing_recipient_code' => 'Código único para facturación electrónica (7 caracteres)',
        'billing_province' => 'Sigla de provincia (ej: RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'No hay información de contacto disponible',
    'no_billing_info' => 'No hay datos de facturación disponibles',
    'no_web_social' => 'No hay enlaces web o sociales disponibles',

    // Actions for client details
    'view_profile' => 'Ver perfil',
    'view_page' => 'Ver página',
    'send_email' => 'Enviar email',

    // Additional fields (solo quelli che usi)
    'address' => 'Dirección',
    'fiscal_code' => 'Código fiscal',
    'sdi_code' => 'Código SDI',
    'company' => 'Empresa',

        // Stats Cards
    'stats' => [
        'total' => 'Total de clientes',
        'lead' => 'Lead',
        'active' => 'Activos',
        'archived' => 'Archivados',
        'this_month' => 'este mes',
        'of_total' => 'del total',
        'converted' => 'convertidos',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Seguimiento Lead',
        'add' => 'Añadir seguimiento',
        'modal_title' => 'Nuevo seguimiento',
        'modal_title_edit' => 'Editar seguimiento',
        'empty' => 'Sin seguimientos registrados',
        'created' => 'Seguimiento guardado',
        'updated' => 'Seguimiento actualizado',
        'deleted' => 'Seguimiento eliminado',
        'add_to_calendar' => 'Añadir a Google Calendar',
        'confirm_delete' => '¿Eliminar este seguimiento?',
        'type' => 'Tipo',
        'contacted_at' => 'Fecha de contacto',
        'note' => 'Nota',
        'note_placeholder' => 'Describe brevemente el contacto...',
        'type_call' => 'Llamada',
        'type_email' => 'Correo',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Reunión',
        'type_note' => 'Nota',
        'action_call' => 'Llamar',
        'action_email' => 'Correo',
        'validation' => [
            'type_required' => 'El tipo es obligatorio',
            'type_invalid' => 'Tipo inválido',
            'contacted_at_required' => 'La fecha de contacto es obligatoria',
            'contacted_at_invalid' => 'Fecha inválida',
        ],
    ],
];