<?php

return [
    'NAME' => 'Django in PHP',
    'DEBUG' => true,
    'ROOT_URLCONF' => __DIR__ . '/urls.php',
    'INSTALLED_APPS' => [
        'blog' => [
            'enabled' => true,
            'path' => __DIR__ . '/../apps/blog',
        ],
    ],
    'TEMPLATES' => [
        [
            'BACKEND' => 'php_view',
            'DIRS' => [__DIR__ . '/../templates'],
            'APP_DIRS' => true,
        ],
    ],
];
