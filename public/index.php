<?php

require_once __DIR__ . '/../app/Core/Application.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';

$config = [
    'name' => 'Django in PHP',
    'debug' => true,
    'apps' => [],
];

$app = new Application($config);
$app->get('/', [HomeController::class, 'index']);
$app->get('/posts/{id}', [HomeController::class, 'show']);
$app->run();
