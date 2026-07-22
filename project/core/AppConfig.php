<?php

class AppConfig
{
    private string $name;
    private string $path;
    private bool $enabled;

    public function __construct(string $name, string $path, bool $enabled = true)
    {
        $this->name = $name;
        $this->path = $path;
        $this->enabled = $enabled;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }
}
