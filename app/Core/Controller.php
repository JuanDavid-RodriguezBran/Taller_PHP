<?php

namespace Core;

class Controller
{
    protected function view(string $path, array $data = []): void
    {
        extract($data);
        $GLOBALS['path'] = $path;
        include __DIR__ . '/../Views/layouts/main.php';
    }
}
