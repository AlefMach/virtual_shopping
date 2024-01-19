<?php

class Router {
    private $routes = [];

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($route) {
        if (array_key_exists($route, $this->routes)) {
            $controllerName = $this->routes[$route]['controller'];
            $action = $this->routes[$route]['action'];

            require_once "http/controller/$controllerName.php";

            $controller = new $controllerName();
            $controller->$action();
        } else {
            echo "Página não encontrada";
        }
    }
}