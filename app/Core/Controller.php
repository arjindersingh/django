<?php

class Controller
{
    protected function view(string $template, array $data = []): string
    {
        extract($data);
        ob_start();

        $baseDir = dirname(__DIR__, 1) . '/..';
        $templateFile = $baseDir . '/templates/' . $template . '.php';
        if (file_exists($templateFile)) {
            require $templateFile;
        }

        return ob_get_clean();
    }
}
