<?php
// config/cors.php
return [
    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | The settings here will be used to control the CORS headers that are
    | sent with responses. You can configure the origins, headers, methods,
    | and more. You can set different options depending on your requirements.
    |
    */

    'supports_credentials' => false,

    'allowed_origins' => ['*'], // Puedes restringir esto a dominios específicos
    
    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization'],
    
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
    
    'exposed_headers' => [],
    
    'max_age' => 0,
    
    'hosts' => [],
];
