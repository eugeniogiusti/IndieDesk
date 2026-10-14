<?php

return [
    // Page titles
    'title' => '任务',
    'task_list' => '任务列表',
    'create_task' => '创建任务',
    'edit_task' => '编辑任务',
    'index_description' => '管理你所有项目的任务',

    // Fields
    'task_title' => '标题',
    'description' => '描述',
    'type' => '类型',
    'status' => '状态',
    'priority' => '优先级',
    'due_date' => '截止日期',
    'project' => '项目',

    // Types
    'type_feature' => '功能',
    'type_improvement' => '改进',
    'type_bug' => '缺陷',
    'type_infra' => '基础设施',
    'type_refactor' => '重构',
    'type_research' => '调研',
    'type_administrative' => '行政',
    'type_marketing' => '市场营销',
    'type_commercial' => '商务',
    'type_hardware' => '硬件',
    'type_documentation' => '文档',
    'type_maintenance' => '维护',

    // Statuses
    'status_todo' => '待办',
    'status_in_progress' => '进行中',
    'status_blocked' => '已阻塞',
    'status_done' => '已完成',

    // Priorities
    'select_priority' => '选择优先级',
    'priority_low' => '低',
    'priority_medium' => '中',
    'priority_high' => '高',

    // Actions (task-specific)
    'add_task' => '添加任务',
    'view_all' => '查看全部任务',
    'recent_tasks' => '最近任务',
    'view_project' => '前往项目',
    'add_to_calendar' => '添加到日历',
    'mark_complete' => '标记为已完成',
    'mark_incomplete' => '标记为未完成',

    // Messages
    'created_successfully' => '任务创建成功',
    'updated_successfully' => '任务更新成功',
    'deleted_successfully' => '任务删除成功',
    'confirm_delete' => '确定要删除该任务吗？',

    // Empty states
    'no_tasks' => '未找到任务',
    'no_tasks_description' => '先添加第一个任务',

    // Stats
    'total_tasks' => '任务总数',
    'open_tasks' => '未完成任务',
    'completed_tasks' => '已完成任务',
    'overdue_tasks' => '逾期任务',

    // Due date states
    'overdue' => '已逾期',
    'due_today' => '今天到期',
    'due_soon' => '即将到期',
    'no_due_date' => '无截止日期',

    // Filters
    'all_statuses' => '所有状态',
    'all_types' => '所有类型',
    'filter_due_from' => '截止日期从',
    'filter_due_to' => '截止日期至',

    // Placeholders
    'placeholder' => [
        'title' => '例如：实现 OAuth 登录',
        'description' => '任务详细描述...',
        'search' => '按标题或项目名搜索...',
    ],

    // Index Statistics
    'stats' => [
        'todo' => '待办',
        'backlog' => '待处理',
        'in_progress' => '进行中',
        'working_on' => '处理中',
        'blocked' => '阻塞中',
        'need_attention' => '需要关注',
        'bugs_open' => '未修复缺陷',
        'to_fix' => '待修复',
    ],
];
