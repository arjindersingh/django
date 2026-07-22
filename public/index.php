<?php

require_once __DIR__ . '/../project/core/Application.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';

$config = require __DIR__ . '/../project/settings.php';
$projectUrls = require __DIR__ . '/../project/urls.php';

$app = new Application($config);
foreach ($projectUrls as $pattern => $handler) {
    $app->get($pattern, $handler);
}
$app->run();
