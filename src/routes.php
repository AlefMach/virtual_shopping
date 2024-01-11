<?php

include './config/route.php';

$router = new Router();

$router->addRoute('', 'HomeController', 'index');
$router->addRoute('products', 'ProductController', 'index');
$router->addRoute('product/create', 'ProductController', 'create');
$router->addRoute('product/save', 'ProductController', 'save');
$router->addRoute('sales', 'SaleController', 'index');