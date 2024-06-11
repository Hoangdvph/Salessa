<?php

use XuongOop\Salessa\Controllers\Client\OrderController;
use XuongOop\Salessa\Controllers\Client\ProductController;
use XuongOop\Salessa\Controllers\Client\HomeController;
use XuongOop\Salessa\Controllers\Admin\LoginController;
use XuongOop\Salessa\Controllers\Client\CartController;

$router->get('/', HomeController::class . '@index');

$router->get('products', ProductController::class . '@listproduct');

$router->get('/{$id}/listproductbyidcate', ProductController::class . '@show');

$router->get('/{$id}/productdetail', ProductController::class . '@showdetail');

$router->get('/login', LoginController::class . '@showFormLogin');
$router->post('/handle-login', LoginController::class . '@login');
$router->get('/logout', LoginController::class . '@logout');



$router->get('/cart/add', CartController::class . '@add');
$router->get('/cart/quantityInc', CartController::class . '@quantityInc');
$router->get('/cart/quantityDes', CartController::class . '@quantityDes');
$router->get('/cart/remove', CartController::class . '@remove');
$router->get('/cart/detail', CartController::class . '@detail');
$router->get('order', OrderController::class . '@showForm');
$router->post('order/checkout', OrderController::class . '@checkout');

