<?php

namespace Controllers;

use Core\Controller;

class StopwatchController extends Controller
{
    public function index(): void
    {
        $this->view(__DIR__ . '/../Views/stopwatch/index.php', []);
    }
}