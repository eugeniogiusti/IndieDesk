<?php

return [
    // Page titles
    'title' => 'Projects',
    'projects_list' => 'Projects List',
    'create_project' => 'New Project',
    'edit_project' => 'Edit Project',
    'project_details' => 'Project Details',
    
    // Navigation
    'back_to_list' => 'Back to list',
    'add_project' => 'Add Project',
    
    // Form labels - Tab 1: Info Base
    'name' => 'Project Name',
    'client' => 'Client',
    'clients' => 'Clients',
    'is_internal' => 'Internal project',
    'description' => 'Description',
    'status' => 'Status',
    'priority' => 'Priority',
    'hourly_rate' => 'Hourly Rate',

    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Dev Links',
    'repo_url' => 'Repository',
    'staging_url' => 'Staging',
    'production_url' => 'Production',
    'figma_url' => 'Figma',
    'docs_url' => 'Documentation',

    // Project type
    'type' => 'Project Type',
    'type_client_work' => 'Client work',
    'type_product' => 'Product',
    'type_content' => 'Content',
    'type_asset' => 'Asset',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Start date',
    'due_date' => 'Due date',

    // Due date labels
    'due_soon' => 'Due soon',
    'overdue' => 'Overdue',
    
    // Form labels - Tab 3: Notes
    'notes' => 'Notes',
    
    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'E.g.: Acme S.r.l. E-commerce',
        'client' => 'Search client...',
        'description' => 'Brief project description...',
        'notes' => 'General notes and remarks about the project...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    // Status options
    'status_draft' => 'Draft',
    'status_in_progress' => 'In Progress',
    'status_completed' => 'Completed',
    'status_archived' => 'Archived',
    
    // Priority options
    'select_priority' => 'Select priority',
    'priority_low' => 'Low',
    'priority_medium' => 'Medium',
    'priority_high' => 'High',
    
    // Table headers
    'table' => [
        'name' => 'Name',
        'client' => 'Client',
        'status' => 'Status',
        'priority' => 'Priority',
        'links' => 'Links',
        'created_at' => 'Created at',
        'actions' => 'Actions',
    ],
    
    // Internal project label
    'internal_project' => 'Internal Project',
    'no_clients_linked' => 'No clients linked',
    'internal_project_desc' => 'This is an internal project. No client information is associated.',
    
    // Buttons
    'save' => 'Save Project',
    'filter' => 'Filter',
    'cancel' => 'Cancel',
    'edit' => 'Edit',
    'details' => 'Details',
    'client_details' => 'Client Details',
    'delete' => 'Delete',
    'reset' => 'Reset', 
    'confirm_delete' => 'Are you sure you want to delete this project?',
    
    // Messages
    'created_successfully' => 'Project created successfully',
    'updated_successfully' => 'Project updated successfully',
    'deleted_successfully' => 'Project deleted successfully',
    'restored_successfully' => 'Project restored successfully',
    'permanently_deleted' => 'Project permanently deleted',
    
    // Empty state
    'no_projects' => 'No projects found',
    'no_projects_description' => 'Start by creating your first project',
    'create_first_project' => 'Create first project',
    
    // Filters
    'filter_by_client' => 'Filter by client',
    'filter_by_status' => 'Filter by status',
    'filter_by_priority' => 'Filter by priority',
    'search_placeholder' => 'Search by name, client or VAT...',
    'all_clients' => 'All clients',
    'all_statuses' => 'All statuses',
    'all_priorities' => 'All priorities',
    
    // Validation messages
    'validation' => [
        'name_required' => 'Project name is required',
        'status_required' => 'Status is required',
        'status_invalid' => 'The selected status is invalid',
        'client_not_found' => 'The selected client does not exist',
        'priority_invalid' => 'The selected priority is invalid',
        'repo_url_invalid' => 'The repository URL is invalid',
        'staging_url_invalid' => 'The staging URL is invalid',
        'production_url_invalid' => 'The production URL is invalid',
        'figma_url_invalid' => 'The Figma URL is invalid',
        'docs_url_invalid' => 'The documentation URL is invalid',
    ],
    
    // Tabs
    'tab_info' => 'Basic Info',
    'tab_links' => 'Dev Links',
    'tab_notes' => 'Notes',
    
    // Quick links (icons tooltip)
    'open_repo' => 'Open Repository',
    'open_staging' => 'Open Staging',
    'open_production' => 'Open Production',
    'open_figma' => 'Open Figma',
    'open_docs' => 'Open Documentation',

    // Show page - Sidebar & Tabs
    'overview' => 'Overview',
    'quick_info' => 'Quick Info',
    'quick_links' => 'Quick Links',
    'created_at' => 'Created at',
    'updated_at' => 'Updated at',

    // Empty states
    'no_description' => 'No description',
    'no_notes' => 'No notes',
    'no_priority' => 'No priority',
    'no_links' => 'No links configured',
    'no_links_configured' => 'No links configured',

    // Actions
    'open' => 'Open',
    'add_to_calendar' => 'Add to Calendar',
    'restore' => 'Restore',
    'force_delete' => 'Delete Permanently',
    'confirm_restore' => 'Do you want to restore this project?',
    'confirm_force_delete' => 'Are you sure you want to permanently delete this project? This action cannot be undone and related data may be lost.',

    // Calendar
    'project' => 'Project',

    // Stats Cards
    'stats' => [
        'total' => 'Total Projects',
        'in_progress' => 'In Progress',
        'completed' => 'Completed',
        'archived' => 'Archived',
        'this_month' => 'this month',
        'this_week' => 'this week',
        'of_total' => 'of total',
    ],

    // Editor
    'editor_tab' => 'Editor',
    'editor_saved' => 'Notes saved successfully.',
    'editor_image_invalid_type' => 'Unsupported format. Use PNG, JPG or GIF.',
    'editor_image_upload_error' => 'Error uploading image.',

    // Repository (GitHub)
    'repository' => 'Repository',
    'commit_activity' => 'Commit Activity',
    'recent_commits' => 'Recent Commits',
    'less' => 'Less',
    'more' => 'More',
    'no_repository_data' => 'No data available for this repository.',
    'repository_fetch_error' => 'Error loading GitHub data.',
];