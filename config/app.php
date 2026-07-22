<?php

return [
    'name' => 'Django in PHP',
    'debug' => true,
    'apps' => [
        'blog' => [
            'enabled' => true,
            'path' => __DIR__ . '/../apps/blog',
        ],
    ],
];
