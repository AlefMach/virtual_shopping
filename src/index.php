<?php

require_once './config/database.php';
require_once 'routes.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$path = ltrim($path, '/');

$parts = explode('/', $path);

$route = $parts[0] ?? '';

$router->dispatch($route);