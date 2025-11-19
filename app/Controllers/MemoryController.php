<?php

namespace Controllers;

use Core\Controller;

class MemoryController extends Controller
{
    public function index(): void
    {
        $this->view(__DIR__ . '/../Views/memory/index.php', []);
    }
}
