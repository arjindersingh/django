<?php

require_once __DIR__ . '/Router.php';
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/AppConfig.php';

class Application
{
    private Router $router;
    private array $config;
    private array $apps = [];

    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->router = new Router();
        $this->loadInstalledApps();
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    public function get(string $pattern, array $handler): void
    {
        $this->router->addRoute('GET', $pattern, $handler);
    }

    public function post(string $pattern, array $handler): void
    {
        $this->router->addRoute('POST', $pattern, $handler);
    }

    public function run(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        $result = $this->router->dispatch($method, $uri);
        if (!$result['handler']) {
            http_response_code(404);
            echo '404 - Page not found';
            return;
        }

        [$controllerName, $methodName] = $result['handler'];
        $controller = new $controllerName();
        $response = call_user_func_array([$controller, $methodName], array_values($result['params']));
        echo $response;
    }

    private function loadInstalledApps(): void
    {
        $apps = $this->config['INSTALLED_APPS'] ?? $this->config['apps'] ?? [];
        foreach ($apps as $name => $settings) {
            if (($settings['enabled'] ?? false) !== true) {
                continue;
            }

            $appPath = $settings['path'] ?? __DIR__ . '/../../apps/' . $name;
            $this->apps[$name] = new AppConfig($name, $appPath, true);
        }
    }

    public function getInstalledApps(): array
    {
        return $this->apps;
    }
}
