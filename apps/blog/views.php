<?php

require_once __DIR__ . '/../../project/core/Controller.php';

class BlogViewController extends Controller
{
    public function index(): string
    {
        return $this->view('blog/index', ['title' => 'Blog home']);
    }
}
