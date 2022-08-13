<?php

require_once __DIR__ . '/src/Core/DotEnv/DotEnv.php';

use Core\DotEnv\DotEnv;

new DotEnv(__DIR__ . '/.env');

$config = [
    // Database Module
    "database" => [
            "host" => getenv('DB_HOST') ?: "localhost",
            "port" => getenv('DB_PORT') ?: 3306,
        "database" => getenv('DB_NAME') ?: "",
        "username" => getenv('DB_USER') ?: "root",
        "password" => getenv('DB_PASS') ?: ""
    ],

    // Route Module
    'routes' => require __DIR__ . '/src/App/routing.php',

    // Logging Module
    'logging' => [
        'name' => getenv('LOG_NAME') ?: 'app',
        'outdir' => getenv('LOG_OUTDIR') ?:  __DIR__ . '/var/logs',
        'minlevel' => getenv('LOG_MINLEVEL') ?:  'info',
    ]
];

return $config;
