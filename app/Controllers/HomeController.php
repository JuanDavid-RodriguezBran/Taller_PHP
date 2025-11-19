<?php

namespace Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view(__DIR__ . '/../Views/home.php', []);
    }
}
