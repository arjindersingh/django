<?php

class Controller
{
    protected function view(string $template, array $data = []): string
    {
        extract($data);
        ob_start();
        $templateFile = dirname(__DIR__) . '/templates/' . $template . '.php';
        if (file_exists($templateFile)) {
            require $templateFile;
        }
        return ob_get_clean();
    }
}
