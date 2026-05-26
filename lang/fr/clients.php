<?php

return [
    // Page titles
    'title' => 'Clients',
    'client' => 'Client',
    'clients_list' => 'Liste des clients',
    'create_client' => 'Nouveau client',
    'edit_client' => 'Modifier le client',
    'all_statuses' => 'Tous les statuts',
    'client_details' => 'Détails du client',

    // Actions
    'add_client' => 'Ajouter un client',
    'back_to_list' => 'Retour à la liste',
    'recent_projects' => 'Projets récents',
    'save' => 'Enregistrer',
    'cancel' => 'Annuler',
    'edit' => 'Modifier',
    'delete' => 'Supprimer',
    'restore' => 'Restaurer',
    'force_delete' => 'Supprimer définitivement',
    'search' => 'Rechercher',
    'filter' => 'Filtrer',
    'reset' => 'Réinitialiser',

    // Form labels
    'name' => 'Nom / Raison sociale',
    'email' => 'Email',
    'status' => 'Statut',
    'vat_number' => 'N° de TVA',
    'phone_prefix' => 'Préfixe',
    'select_prefix' => 'Sélectionner',
    'phone' => 'Téléphone',
    'pec' => 'PEC',
    'website' => 'Site web',
    'linkedin' => 'LinkedIn',
    'notes' => 'Notes',

    // Billing fields
    'billing_info' => 'Données de facturation',
    'billing_address' => 'Adresse',
    'billing_city' => 'Ville',
    'billing_zip' => 'Code postal',
    'billing_province' => 'Province',
    'billing_country' => 'Pays',
    'billing_recipient_code' => 'Code destinataire',

    // Contact info
    'contact_info' => 'Informations de contact',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_prospect' => 'Prospect',
    'status_active' => 'Actif',
    'status_archived' => 'Archivé',

    // Messages
    'created_successfully' => 'Client créé avec succès',
    'updated_successfully' => 'Client mis à jour avec succès',
    'deleted_successfully' => 'Client supprimé avec succès',
    'restored_successfully' => 'Client restauré avec succès',
    'permanently_deleted' => 'Client supprimé définitivement',

    // Validation messages
    'validation' => [
        'name_required' => 'Le nom est obligatoire',
        'email_required' => 'L’email est obligatoire',
        'email_invalid' => 'L’email n’est pas valide',
        'email_unique' => 'Cet email est déjà utilisé',
        'status_required' => 'Le statut est obligatoire',
        'status_invalid' => 'Le statut sélectionné n’est pas valide',
        'country_code_invalid' => 'Le code pays doit contenir 2 caractères (ex : IT, US)',
        'recipient_code_invalid' => 'Le code destinataire doit contenir 7 caractères',
        'website_invalid' => 'L’URL du site web n’est pas valide',
        'linkedin_invalid' => 'L’URL de LinkedIn n’est pas valide',
    ],

    // Table headers
    'table' => [
        'name' => 'Nom',
        'email' => 'Email',
        'status' => 'Statut',
        'phone' => 'Téléphone',
        'created_at' => 'Créé le',
        'actions' => 'Actions',
    ],

    // Empty states
    'no_clients' => 'Aucun client trouvé',
    'no_clients_description' => 'Commence par ajouter ton premier client',

    // Confirmations
    'confirm_delete' => 'Es-tu sûr de vouloir supprimer ce client ?',
    'confirm_force_delete' => 'Es-tu sûr de vouloir supprimer définitivement ce client ? Cette action est irréversible.',
    'confirm_restore' => 'Veux-tu restaurer ce client ?',

    // Placeholders
    'placeholder' => [
        'name' => 'Ex : Acme S.r.l.',
        'email' => 'Ex : info@acme.it',
        'vat_number' => 'Ex : IT12345678901',
        'phone' => 'Ex : 333 1234567',
        'pec' => 'Ex : acme@pec.it',
        'website' => 'Ex : https://www.acme.it',
        'linkedin' => 'Ex : https://www.linkedin.com/company/acme',
        'billing_address' => 'Ex : Via Roma 10',
        'billing_city' => 'Ex : Milan',
        'billing_zip' => 'Ex : 20100',
        'billing_province' => 'Ex : MI',
        'billing_country' => 'Ex : IT',
        'billing_recipient_code' => 'Ex : ABCDEFG',
        'search' => 'Rechercher par nom, email ou TVA...',
        'notes' => 'Ajouter des notes...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'Code ISO à 2 caractères (IT, US, FR, etc.)',
        'billing_recipient_code' => 'Code unique pour la facturation électronique (7 caractères)',
        'billing_province' => 'Sigle de province (ex : RM, MI, NA)',
    ],

    // Empty states for details
    'no_contact_info' => 'Aucune information de contact disponible',
    'no_billing_info' => 'Aucune donnée de facturation disponible',
    'no_web_social' => 'Aucun lien web ou social disponible',

    // Actions for client details
    'view_profile' => 'Voir le profil',
    'view_page' => 'Voir la page',
    'send_email' => 'Envoyer un email',

    // Additional fields (solo quelli che usi)
    'address' => 'Adresse',
    'fiscal_code' => 'Code fiscal',
    'sdi_code' => 'Code SDI',
    'company' => 'Entreprise',

        // Stats Cards
    'stats' => [
        'total' => 'Total clients',
        'lead' => 'Leads',
        'active' => 'Actifs',
        'archived' => 'Archivés',
        'this_month' => 'ce mois-ci',
        'of_total' => 'du total',
        'converted' => 'convertis',
    ],

    // Follow-up
    'followup' => [
        'section_title' => 'Suivi Lead',
        'add' => 'Ajouter un suivi',
        'modal_title' => 'Nouveau suivi',
        'modal_title_edit' => 'Modifier le suivi',
        'empty' => 'Aucun suivi enregistré',
        'created' => 'Suivi sauvegardé',
        'updated' => 'Suivi mis à jour',
        'deleted' => 'Suivi supprimé',
        'add_to_calendar' => 'Ajouter à Google Agenda',
        'confirm_delete' => 'Supprimer ce suivi?',
        'type' => 'Type',
        'contacted_at' => 'Date de contact',
        'note' => 'Note',
        'note_placeholder' => 'Décrire brièvement le contact...',
        'type_call' => 'Appel',
        'type_email' => 'E-mail',
        'type_whatsapp' => 'WhatsApp',
        'type_meeting' => 'Réunion',
        'type_note' => 'Note',
        'action_call' => 'Appeler',
        'action_email' => 'E-mail',
        'validation' => [
            'type_required' => 'Le type est obligatoire',
            'type_invalid' => 'Type invalide',
            'contacted_at_required' => 'La date de contact est obligatoire',
            'contacted_at_invalid' => 'Date invalide',
        ],
    ],
];