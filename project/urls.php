<?php

$settings = require __DIR__ . '/settings.php';
$routes = [
    '/' => [HomeController::class, 'index'],
    '/posts/{id}' => [HomeController::class, 'show'],
];

$mergeRouteDefinitions = function (array $definitions) use (&$routes): void {
    if (array_is_list($definitions)) {
        foreach ($definitions as $definition) {
            if (!is_array($definition) || !isset($definition[0], $definition[1])) {
                continue;
            }

            $routes[$definition[0]] = $definition[1];
        }

        return;
    }

    foreach ($definitions as $pattern => $handler) {
        $routes[$pattern] = $handler;
    }
};

foreach ($settings['INSTALLED_APPS'] ?? $settings['apps'] ?? [] as $name => $appSettings) {
    if (($appSettings['enabled'] ?? false) !== true) {
        continue;
    }

    $appPath = $appSettings['path'] ?? __DIR__ . '/../apps/' . $name;
    $urlsFile = $appPath . '/urls.php';
    if (!file_exists($urlsFile)) {
        continue;
    }

    $appRoutes = require $urlsFile;
    if (is_array($appRoutes)) {
        $mergeRouteDefinitions($appRoutes);
    }
}

return $routes;
