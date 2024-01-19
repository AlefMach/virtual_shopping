<?php

include './config/route.php';

$router = new Router();

$router->addRoute('', 'HomeController', 'index');

$router->addRoute('products', 'ProductController', 'index');
$router->addRoute('product/create', 'ProductController', 'create');
$router->addRoute('product/save', 'ProductController', 'save');

$router->addRoute('sales', 'SaleController', 'index');

$router->addRoute('product-type/create', 'ProductTypeController', 'create');
$router->addRoute('product-type/save', 'ProductTypeController', 'save');

$router->addRoute('login', 'AuthController', 'login');
$router->addRoute('logout', 'AuthController', 'logout');

$router->addRoute('register', 'UserController', 'index');
$router->addRoute('register/create', 'UserController', 'create');
