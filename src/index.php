<?php

require_once './config/database.php';
require_once 'vendor/autoload.php';
require_once 'routes.php';

session_start();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$path = ltrim($path, '/');

$parts = explode('/', $path);

$route = "";

if (count($parts) > 1) {
    $route = implode("/", $parts);
} else {
    $route = $parts[0];
}

// Checks whether the route is protected and requires authentication
if (isset($routes[$route]) && $routes[$route] instanceof Closure) {
    AuthMiddleware::handle();
}

$router->dispatch($route);
