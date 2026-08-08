<?php

return [
    // Page titles
    'title' => '客户',
    'client' => '客户',
    'clients_list' => '客户列表',
    'create_client' => '新建客户',
    'export_excel' => '导出 Excel',
    'edit_client' => '编辑客户',
    'all_statuses' => '所有状态',
    'client_details' => '客户详情',

    // Actions
    'add_client' => '添加客户',
    'back_to_list' => '返回列表',
    'recent_projects' => '最近项目',
    'save' => '保存',
    'cancel' => '取消',
    'edit' => '编辑',
    'delete' => '删除',
    'restore' => '恢复',
    'force_delete' => '永久删除',
    'search' => '搜索',
    'filter' => '筛选',
    'reset' => '重置',

    // Form labels
    'name' => '姓名 / 公司名称',
    'email' => '邮箱',
    'status' => '状态',
    'vat_number' => '增值税号',
    'phone_prefix' => '区号',
    'select_prefix' => '选择',
    'phone' => '电话',
    'pec' => 'PEC',
    'website' => '网站',
    'linkedin' => 'LinkedIn',
    'notes' => '备注',

    // Billing fields
    'billing_info' => '开票信息',
    'billing_address' => '地址',
    'billing_city' => '城市',
    'billing_zip' => '邮编',
    'billing_province' => '省/州',
    'billing_country' => '国家',
    'billing_recipient_code' => '接收代码',

    // Contact info
    'contact_info' => '联系信息',
    'connected_to_stripe' => '已连接 Stripe',
    'web_social' => '网站与社交',

    // Status options
    'status_lead' => '潜在客户',
    'status_prospect' => 'Prospect',
    'status_active' => '活跃',
    'status_archived' => '已归档',

    // Messages
    'created_successfully' => '客户创建成功',
    'updated_successfully' => '客户更新成功',
    'deleted_successfully' => '客户删除成功',
    'restored_successfully' => '客户恢复成功',
    'permanently_deleted' => '客户已永久删除',

    // Validation messages
    'validation' => [
        'name_required' => '名称为必填项',
        'email_required' => '邮箱为必填项',
        'email_invalid' => '邮箱格式无效',
        'email_unique' => '该邮箱已被使用',
        'status_required' => '状态为必填项',
        'status_invalid' => '所选状态无效',
        'country_code_invalid' => '国家代码必须为 2 位（如 IT、US）',
        'recipient_code_invalid' => '接收代码必须为 7 位字符',
        'website_invalid' => '网站 URL 无效',
        'linkedin_invalid' => 'LinkedIn URL 无效',
    ],

    // Table headers
    'table' => [
        'name' => '名称',
        'email' => '邮箱',
        'status' => '状态',
        'phone' => '电话',
        'created_at' => '创建时间',
        'actions' => '操作',
    ],

    // Empty states
    'no_clients' => '未找到客户',
    'no_clients_description' => '先添加你的第一个客户',

    // Confirmations
    'confirm_delete' => '确定要删除这个客户吗？',
    'confirm_force_delete' => '确定要永久删除这个客户吗？此操作无法撤销。',
    'confirm_restore' => '要恢复这个客户吗？',

    // Placeholders
    'placeholder' => [
        'name' => '例如：Acme S.r.l.',
        'email' => '例如：info@acme.it',
        'vat_number' => '例如：IT12345678901',
        'phone' => '例如：333 1234567',
        'pec' => '例如：acme@pec.it',
        'website' => '例如：https://www.acme.it',
        'linkedin' => '例如：https://www.linkedin.com/company/acme',
        'billing_address' => '例如：Via Roma 10',
        'billing_city' => '例如：Milano',
        'billing_zip' => '例如：20100',
        'billing_province' => '例如：MI',
        'billing_country' => '例如：IT',
        'billing_recipient_code' => '例如：ABCDEFG',
        'search' => '按名称、邮箱或税号搜索...',
        'notes' => '添加备注...',
    ],

    // Hints
    'hint' => [
        'billing_country' => '2 位 ISO 国家代码（IT、US、FR 等）',
        'billing_recipient_code' => '电子发票接收代码（7 位）',
        'billing_province' => '省份简称（如 RM、MI、NA）',
    ],

    // Empty states for details
    'no_contact_info' => '暂无联系信息',
    'no_billing_info' => '暂无开票信息',
    'no_web_social' => '暂无网站或社交链接',

    // Actions for client details
    'view_profile' => '查看资料',
    'view_page' => '查看页面',
    'send_email' => '发送邮件',

    // Additional fields
    'address' => '地址',
    'fiscal_code' => '税务代码',
    'sdi_code' => 'SDI 代码',
    'company' => '公司',

    // Stats Cards
    'stats' => [
        'total' => '客户总数',
        'lead' => '潜在客户',
        'active' => '活跃',
        'archived' => '已归档',
        'this_month' => '本月',
        'of_total' => '占总数',
        'converted' => '已转化',
    ],

    // Follow-up
    'followup' => [
        'section_title' => '潜在客户跟进',
        'add' => '添加跟进',
        'modal_title' => '新跟进',
        'modal_title_edit' => '编辑跟进',
        'empty' => '没有跟进记录',
        'created' => '跟进已保存',
        'updated' => '跟进已更新',
        'deleted' => '跟进已删除',
        'add_to_calendar' => '添加到谷歌日历',
        'confirm_delete' => '删除此跟进？',
        'type' => '类型',
        'contacted_at' => '联系日期',
        'note' => '备注',
        'note_placeholder' => '简要描述联系情况...',
        'type_call' => '电话',
        'type_email' => '邮件',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => '会议',
        'type_note' => '备注',
        'action_call' => '拨打',
        'action_email' => '邮件',
        'validation' => [
            'type_required' => '类型为必填项',
            'type_invalid' => '无效类型',
            'contacted_at_required' => '联系日期为必填项',
            'contacted_at_invalid' => '无效日期',
        ],
    ],
];