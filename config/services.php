<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
],
'paypal' => [
    'client_id' => env('AWkcPTxGSLrMPl4FLmK80qoUmV1orhpU1T-Cn1XbFeuTxRbnv-K2bLt0ceOViw07cd8tiS7L-tjZQbJg'), // Utiliza el sandbox para pruebas
    'secret'    => env('EHNPpHA09Nml5NVFoAcIA65tJ6AbKc_VO2h3hJao7UCcwjMyk9bOBq8YLBfNk757JD7iTOs76O7NqpHA'),
    'settings'  => [
        'mode'    => env('PAYPAL_MODE', 'sandbox'), // Puede ser 'sandbox' o 'live'
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled'         => true,
        'log.FileName'           => storage_path('logs/paypal.log'),
        'log.LogLevel'           => 'DEBUG', // Cambiar a 'DEBUG' en pruebas
    ],
],

];
