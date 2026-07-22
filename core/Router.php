<?php

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $pattern, array $handler): void
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'pattern' => $pattern,
            'handler' => $handler,
        ];
    }

    public function dispatch(string $method, string $uri): array
    {
        foreach ($this->routes as $route) {
            if ($route['method'] !== strtoupper($method)) {
                continue;
            }

            $pattern = $this->compilePattern($route['pattern']);
            if (preg_match($pattern, $uri, $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (!is_int($key)) {
                        $params[$key] = $value;
                    }
                }

                return ['handler' => $route['handler'], 'params' => $params];
            }
        }

        return ['handler' => null, 'params' => []];
    }

    private function compilePattern(string $pattern): string
    {
        $escaped = preg_quote($pattern, '~');
        $escaped = preg_replace_callback('~\\\{([a-zA-Z_][a-zA-Z0-9_]*)\\\}~', function ($matches) {
            return '(?P<' . $matches[1] . '>[^/]+)';
        }, $escaped);

        return '~^' . $escaped . '$~';
    }
}
