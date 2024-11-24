<?php

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Cambia a 'live' para producción
    'sandbox' => [
        'client_id'     => env('PAYPAL_CLIENT_ID'),
        'client_secret' => env('PAYPAL_SECRET'),
        'app_id'        => '', // Opcional
    ],
    'live' => [
        'client_id'     => env('PAYPAL_LIVE_CLIENT_ID'),
        'client_secret' => env('PAYPAL_LIVE_CLIENT_SECRET'),
        'app_id'        => '', // Opcional
    ],
    'payment_action' => 'Sale',
    'currency'       => env('PAYPAL_CURRENCY', 'MXN'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''),
    'locale'         => env('PAYPAL_LOCALE', 'en_ES'),
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true),
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => true,
    'log.FileName' => storage_path('logs/paypal.log'),
    'log.LogLevel' => 'ERROR'
];


