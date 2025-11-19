<?php

session_start();

spl_autoload_register(function($class){
    $class = ltrim($class, '\\');
    $file = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) require $file;
});

use Core\Router;

$router = new Router();
$router->dispatch($_GET);
