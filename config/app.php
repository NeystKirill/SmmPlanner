<?php

declare(strict_types=1);

return [
    'app' => [
        'name' => $_ENV['APP_NAME'] ?? 'SMM Planner',
        'env' => $_ENV['APP_ENV'] ?? 'production',
        'debug' => filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN),
        'url' => $_ENV['APP_URL'] ?? 'http://localhost',
        'timezone' => $_ENV['TIMEZONE'] ?? 'UTC',
    ],
    'db' => [
        'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
        'port' => $_ENV['DB_PORT'] ?? '3306',
        'name' => $_ENV['DB_DATABASE'] ?? 'smm_planner',
        'user' => $_ENV['DB_USERNAME'] ?? 'root',
        'pass' => $_ENV['DB_PASSWORD'] ?? '',
        'charset' => 'utf8mb4',
    ],
    'session' => [
        'lifetime' => (int)($_ENV['SESSION_LIFETIME'] ?? 7200),
        'name' => 'smm_session',
    ],
    'upload' => [
        'max_size' => (int)($_ENV['UPLOAD_MAX_SIZE'] ?? 5242880),
        'path' => $_ENV['UPLOAD_PATH'] ?? 'public/uploads',
        'allowed' => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'mp4', 'mov'],
    ],
];
