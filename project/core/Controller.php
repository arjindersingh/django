<?php

class Controller
{
    protected function view(string $template, array $data = []): string
    {
        extract($data);
        ob_start();

        $templatePath = str_replace('.', '/', $template);
        $templateFile = dirname(__DIR__, 2) . '/templates/' . $templatePath . '.php';
        if (!file_exists($templateFile)) {
            $appName = explode('/', $templatePath)[0];
            $appTemplateFile = dirname(__DIR__, 2) . '/apps/' . $appName . '/templates/' . $templatePath . '.php';
            if (file_exists($appTemplateFile)) {
                $templateFile = $appTemplateFile;
            }
        }

        if (file_exists($templateFile)) {
            require $templateFile;
        }

        return ob_get_clean();
    }

    protected function render(string $template, array $data = []): string
    {
        return $this->view($template, $data);
    }
}
