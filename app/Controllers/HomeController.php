<?php

require_once __DIR__ . '/../Core/Controller.php';

class HomeController extends Controller
{
    public function index(): string
    {
        return $this->view('home', ['title' => 'Django in PHP']);
    }

    public function show(int $id): string
    {
        return $this->view('post', ['title' => 'Post #' . $id]);
    }
}
