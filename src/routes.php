<?php

include './config/route.php';

$router = new Router();

$router->addRoute('products', 'ProductController', 'index');
$router->addRoute('products/create', 'ProductController', 'create');
$router->addRoute('sales', 'SaleController', 'index');