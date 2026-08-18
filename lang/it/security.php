<?php

return [

    'title' => 'Sicurezza',
    'subtitle' => 'Storico accessi e sessioni attive del tuo account.',

    'active_sessions' => [
        'title' => 'Sessioni attive',
        'ip' => 'Indirizzo IP',
        'device' => 'Dispositivo',
        'last_activity' => 'Ultima attività',
        'current_badge' => 'Questo dispositivo',
        'empty' => 'Nessuna sessione attiva.',
    ],

    'login_history' => [
        'title' => 'Storico accessi',
        'event' => 'Evento',
        'email' => 'Email',
        'ip' => 'Indirizzo IP',
        'device' => 'Dispositivo',
        'date' => 'Data',
        'empty' => 'Nessun evento registrato.',
    ],

    'events' => [
        'login_success' => 'Accesso',
        'login_failed' => 'Accesso fallito',
        'logout' => 'Logout',
        'lockout' => 'Blocco tentativi',
    ],

    'lockout_alert' => [
        'subject' => 'Allerta sicurezza: account bloccato per troppi tentativi falliti',
        'intro' => 'Il tuo account è stato bloccato temporaneamente dopo troppi tentativi di accesso falliti.',
        'attempted_email' => 'Email utilizzata: :email',
        'ip' => 'Indirizzo IP: :ip',
        'date' => 'Data: :date',
        'outro' => 'Se non sei stato tu, valuta di cambiare la password.',
        'action' => 'Vai alla pagina sicurezza',
    ],

];
