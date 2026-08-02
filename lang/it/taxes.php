<?php

return [
    'title'       => 'Tasse',
    'subtitle'    => 'Traccia i tuoi pagamenti fiscali e documenti',
    'create_tax'  => 'Aggiungi Tassa',
    'edit_tax'    => 'Modifica Tassa',
    'no_taxes'    => 'Nessuna tassa',
    'no_taxes_description' => 'Registra il tuo primo pagamento fiscale',
    'confirm_delete' => 'Sei sicuro di voler eliminare questa tassa?',

    'type'           => 'Tipo',
    'description'    => 'Descrizione',
    'amount'         => 'Importo',
    'due_date'       => 'Scadenza',
    'paid_at'        => 'Pagato il',
    'reference_year' => 'Anno di Riferimento',
    'attachment'     => 'Documento fiscale',
    'notes'          => 'Note',

    'type_f24'                       => 'F24',
    'type_dichiarazione_redditi'     => 'Dichiarazione dei redditi',

    'all_years'    => 'Tutti gli Anni',
    'all_types'    => 'Tutti i Tipi',
    'all_statuses' => 'Tutti',
    'paid'         => 'Pagato',
    'unpaid'       => 'Da pagare',

    'created_successfully' => 'Tassa creata con successo',
    'updated_successfully' => 'Tassa aggiornata con successo',
    'deleted_successfully' => 'Tassa eliminata con successo',

    'attachment_uploaded_successfully' => 'Documento caricato con successo',
    'attachment_deleted_successfully'  => 'Documento eliminato con successo',
    'attachment_not_found'             => 'Documento non trovato',
    'attachment_required'              => 'Il file è obbligatorio',
    'attachment_mimes'                 => 'Sono ammessi solo file PDF, JPG, JPEG, PNG',
    'attachment_max'                   => 'Il file non può superare 10MB',

    'stats' => [
        'total_all_time'  => 'Totale Storico',
        'total_this_year' => 'Quest\'Anno',
        'unpaid_amount'   => 'Da Pagare',
        'count_this_year' => 'Tasse Quest\'Anno',
        'paid_total'      => 'Totale pagato',
        'due'             => 'Importo dovuto',
        'scheduled'       => 'Programmate',
    ],

    'placeholder' => [
        'search'         => 'Cerca per descrizione...',
        'amount'         => 'es., 1500.00',
        'description'    => 'es., Saldo IRPEF 2025',
        'reference_year' => 'es., 2025',
        'notes'          => 'Note aggiuntive...',
    ],

    'calendar_title'          => 'Scadenza fiscale :due_date – :description (:year)',
    'calendar_description'    => 'Pagamento tassa in scadenza',
    'add_to_calendar'         => 'Aggiungi a Google Calendar',

    'description_required'    => 'La descrizione è obbligatoria',
    'amount_required'         => 'L\'importo è obbligatorio',
    'amount_min'              => 'L\'importo deve essere almeno 0.01',
    'due_date_required'       => 'La data di scadenza è obbligatoria',
    'reference_year_required' => 'L\'anno di riferimento è obbligatorio',
];
