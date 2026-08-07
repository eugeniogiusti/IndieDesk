<?php

return [
    // Page titles
    'title' => '项目',
    'projects_list' => '项目列表',
    'create_project' => '新建项目',
    'edit_project' => '编辑项目',
    'project_details' => '项目详情',

    // Navigation
    'back_to_list' => '返回列表',
    'add_project' => '添加项目',

    // Form labels - Tab 1: Info Base
    'name' => '项目名称',
    'client' => '客户',
    'clients' => '客户',
    'is_internal' => '内部项目',
    'description' => '描述',
    'status' => '状态',
    'priority' => '优先级',

    // Form labels - Tab 2: Dev Links
    'dev_links' => '开发链接',
    'repo_url' => '仓库',
    'staging_url' => '预发',
    'production_url' => '生产',
    'figma_url' => 'Figma',
    'docs_url' => '文档',

    // Project type
    'type' => '项目类型',
    'type_client_work' => '客户项目',
    'type_product' => '产品',
    'type_content' => '内容',
    'type_asset' => '资产',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => '开始日期',
    'due_date' => '截止日期',

    // Due date labels
    'due_soon' => '即将到期',
    'overdue' => '已逾期',

    // Form labels - Tab 3: Notes
    'notes' => '备注',

    // Placeholders - Tab 1
    'placeholder' => [
        'name' => '例如：Acme 电商网站',
        'client' => '搜索客户...',
        'description' => '项目简要描述...',
        'notes' => '项目通用备注...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    // Status options
    'status_draft' => '草稿',
    'status_in_progress' => '进行中',
    'status_completed' => '已完成',
    'status_archived' => '已归档',

    // Priority options
    'select_priority' => '选择优先级',
    'priority_low' => '低',
    'priority_medium' => '中',
    'priority_high' => '高',

    // Table headers
    'table' => [
        'name' => '名称',
        'client' => '客户',
        'status' => '状态',
        'priority' => '优先级',
        'links' => '链接',
        'created_at' => '创建时间',
        'actions' => '操作',
    ],

    // Internal project label
    'internal_project' => '内部项目',
    'no_clients_linked' => '未关联客户',
    'internal_project_desc' => '这是一个内部项目，不关联客户信息。',

    // Buttons
    'save' => '保存项目',
    'filter' => '筛选',
    'cancel' => '取消',
    'edit' => '编辑',
    'details' => '详情',
    'client_details' => '客户详情',
    'delete' => '删除',
    'reset' => '重置',
    'confirm_delete' => '确定要删除该项目吗？',

    // Messages
    'created_successfully' => '项目创建成功',
    'updated_successfully' => '项目更新成功',
    'deleted_successfully' => '项目删除成功',
    'restored_successfully' => '项目恢复成功',
    'permanently_deleted' => '项目已永久删除',

    // Empty state
    'no_projects' => '未找到项目',
    'no_projects_description' => '先创建你的第一个项目',
    'create_first_project' => '创建第一个项目',

    // Filters
    'filter_by_client' => '按客户筛选',
    'filter_by_status' => '按状态筛选',
    'filter_by_priority' => '按优先级筛选',
    'search_placeholder' => '按名称、客户或税号搜索...',
    'all_clients' => '所有客户',
    'all_statuses' => '所有状态',
    'all_priorities' => '所有优先级',

    // Validation messages
    'validation' => [
        'name_required' => '项目名称为必填项',
        'status_required' => '状态为必填项',
        'status_invalid' => '所选状态无效',
        'client_not_found' => '所选客户不存在',
        'priority_invalid' => '所选优先级无效',
        'repo_url_invalid' => '仓库 URL 无效',
        'staging_url_invalid' => '预发 URL 无效',
        'production_url_invalid' => '生产 URL 无效',
        'figma_url_invalid' => 'Figma URL 无效',
        'docs_url_invalid' => '文档 URL 无效',
    ],

    // Tabs
    'tab_info' => '基础信息',
    'tab_links' => '开发链接',
    'tab_notes' => '备注',

    // Quick links
    'open_repo' => '打开仓库',
    'open_staging' => '打开预发',
    'open_production' => '打开生产',
    'open_figma' => '打开 Figma',
    'open_docs' => '打开文档',

    // Show page - Sidebar & Tabs
    'overview' => '概览',
    'quick_info' => '快速信息',
    'quick_links' => '快捷链接',
    'created_at' => '创建于',
    'updated_at' => '更新于',

    // Empty states
    'no_description' => '暂无描述',
    'no_notes' => '暂无备注',
    'no_priority' => '无优先级',
    'no_links' => '未配置链接',
    'no_links_configured' => '未配置链接',

    // Actions
    'open' => '打开',
    'add_to_calendar' => '添加到日历',
    'restore' => '恢复',
    'force_delete' => '永久删除',
    'confirm_restore' => '确定恢复该项目吗？',
    'confirm_force_delete' => '确定永久删除该项目吗？此操作不可撤销，关联数据可能丢失。',

    // Calendar
    'project' => '项目',

    // Stats Cards
    'stats' => [
        'total' => '项目总数',
        'in_progress' => '进行中',
        'completed' => '已完成',
        'archived' => '已归档',
        'this_month' => '本月',
        'this_week' => '本周',
        'of_total' => '占总数',
    ],


    // Repository (GitHub)
    'repository' => 'Repository',
    'commit_activity' => 'Attività commit',
    'recent_commits' => 'Commit recenti',
    'less' => 'Meno',
    'more' => 'Di più',
    'no_repository_data' => 'Nessun dato disponibile per questo repository.',
    'repository_fetch_error' => 'Errore nel caricamento dei dati GitHub.',
    'editor_tab' => '编辑器',
];
