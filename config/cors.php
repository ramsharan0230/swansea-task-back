<?php

return [
    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'download-report/*', // Add this
        'storage/*'          // Add this
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'], // Changed to allow all during dev

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],
    
    'max_age' => 0,

    'supports_credentials' => true, // Keep false unless using cookies
];