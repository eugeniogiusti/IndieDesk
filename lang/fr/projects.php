<?php

return [
    // Page titles
    'title' => 'Projets',
    'projects_list' => 'Liste des projets',
    'create_project' => 'Nouveau projet',
    'edit_project' => 'Modifier le projet',
    'project_details' => 'Détails du projet',
    
    // Navigation
    'back_to_list' => 'Retour à la liste',
    'add_project' => 'Ajouter un projet',
    
    // Form labels - Tab 1: Info Base
    'name' => 'Nom du projet',
    'client' => 'Client',
    'clients' => 'Clients',
    'is_internal' => 'Projet interne',
    'description' => 'Description',
    'status' => 'Statut',
    'priority' => 'Priorité',
    
    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Liens de développement',
    'repo_url' => 'Repository',
    'staging_url' => 'Staging',
    'production_url' => 'Production',
    'figma_url' => 'Figma',
    'docs_url' => 'Documentation',

    // Project type
    'type' => 'Type de projet',
    'type_client_work' => 'Travail client',
    'type_product' => 'Produit',
    'type_content' => 'Contenu',
    'type_asset' => 'Asset',
    'type_saas' => 'SaaS',

    // Dates
    'start_date' => 'Date de début',
    'due_date' => 'Échéance',

    // Due date labels

    'due_soon' => 'À échéance',
    'overdue' => 'En retard',
    
    // Form labels - Tab 3: Notes
    'notes' => 'Notes',
    
    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Ex : E-commerce Acme S.r.l.',
        'client' => 'Rechercher un client...',
        'description' => 'Brève description du projet...',
        'notes' => 'Notes et remarques générales sur le projet...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    
    // Status options
    'status_draft' => 'Brouillon',
    'status_in_progress' => 'En cours',
    'status_completed' => 'Terminé',
    'status_archived' => 'Archivé',
    
    // Priority options
    'select_priority' => 'Sélectionner la priorité',
    'priority_low' => 'Basse',
    'priority_medium' => 'Moyenne',
    'priority_high' => 'Haute',
    
    // Table headers
    'table' => [
        'name' => 'Nom',
        'client' => 'Client',
        'status' => 'Statut',
        'priority' => 'Priorité',
        'links' => 'Liens',
        'created_at' => 'Créé le',
        'actions' => 'Actions',
    ],
    
    // Internal project label
    'internal_project' => 'Projet interne',
    'no_clients_linked' => 'Aucun client lié',
    'internal_project_desc' => 'Ceci est un projet interne. Aucune information client associée.',
    
    // Buttons
    'save' => 'Enregistrer le projet',
    'filter' => 'Filtrer',
    'cancel' => 'Annuler',
    'edit' => 'Modifier',
    'details' => 'Détails',
    'client_details' => 'Détails du client',
    'delete' => 'Supprimer',
    'reset' => 'Réinitialiser', 
    'confirm_delete' => 'Es-tu sûr de vouloir supprimer ce projet ?',
    
    // Messages
    'created_successfully' => 'Projet créé avec succès',
    'updated_successfully' => 'Projet mis à jour avec succès',
    'deleted_successfully' => 'Projet supprimé avec succès',
    'restored_successfully' => 'Projet restauré avec succès',
    'permanently_deleted' => 'Projet supprimé définitivement',
    
    // Empty state
    'no_projects' => 'Aucun projet trouvé',
    'no_projects_description' => 'Commence par créer ton premier projet',
    'create_first_project' => 'Créer le premier projet',
    
    // Filters
    'filter_by_client' => 'Filtrer par client',
    'filter_by_status' => 'Filtrer par statut',
    'filter_by_priority' => 'Filtrer par priorité',
    'search_placeholder' => 'Rechercher par nom, client ou TVA...',
    'all_clients' => 'Tous les clients',
    'all_statuses' => 'Tous les statuts',
    'all_priorities' => 'Toutes les priorités',
    
    // Validation messages
    'validation' => [
        'name_required' => 'Le nom du projet est obligatoire',
        'status_required' => 'Le statut est obligatoire',
        'status_invalid' => 'Le statut sélectionné n’est pas valide',
        'client_not_found' => 'Le client sélectionné n’existe pas',
        'priority_invalid' => 'La priorité sélectionnée n’est pas valide',
        'repo_url_invalid' => 'L’URL du repository n’est pas valide',
        'staging_url_invalid' => 'L’URL de staging n’est pas valide',
        'production_url_invalid' => 'L’URL de production n’est pas valide',
        'figma_url_invalid' => 'L’URL Figma n’est pas valide',
        'docs_url_invalid' => 'L’URL de documentation n’est pas valide',
    ],
    
    // Tabs
    'tab_info' => 'Infos de base',
    'tab_links' => 'Liens dev',
    'tab_notes' => 'Notes',
    
    // Quick links (icons tooltip)
    'open_repo' => 'Ouvrir le repository',
    'open_staging' => 'Ouvrir le staging',
    'open_production' => 'Ouvrir la production',
    'open_figma' => 'Ouvrir Figma',
    'open_docs' => 'Ouvrir la documentation',

    // Show page - Sidebar & Tabs
    'overview' => 'Aperçu',
    'quick_info' => 'Infos rapides',
    'quick_links' => 'Liens rapides',
    'created_at' => 'Créé le',
    'updated_at' => 'Mis à jour le',

    // Empty states
    'no_description' => 'Aucune description',
    'no_notes' => 'Aucune note',
    'no_priority' => 'Aucune priorité',
    'no_links' => 'Aucun lien configuré',
    'no_links_configured' => 'Aucun lien configuré',

    // Actions
    'open' => 'Ouvrir',
    'add_to_calendar' => 'Ajouter au calendrier',
    'restore' => 'Restaurer',
    'force_delete' => 'Supprimer définitivement',
    'confirm_restore' => 'Voulez-vous restaurer ce projet?',
    'confirm_force_delete' => 'Êtes-vous sûr de vouloir supprimer définitivement ce projet? Cette action est irréversible et les données associées pourraient être perdues.',

    // Calendar
    'project' => 'Projet',

    // Stats Cards
    'stats' => [
        'total' => 'Total projets',
        'in_progress' => 'En cours',
        'completed' => 'Terminés',
        'archived' => 'Archivés',
        'this_month' => 'ce mois-ci',
        'this_week' => 'cette semaine',
        'of_total' => 'du total',
    ],
    

    // Repository (GitHub)
    'repository' => 'Dépôt',
    'commit_activity' => 'Activité des commits',
    'recent_commits' => 'Commits récents',
    'less' => 'Moins',
    'more' => 'Plus',
    'no_repository_data' => 'Aucune donnée disponible pour ce dépôt.',
    'repository_fetch_error' => 'Erreur lors du chargement des données GitHub.',
    'editor_tab' => 'Éditeur',
];
