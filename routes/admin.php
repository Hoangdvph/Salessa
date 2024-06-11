<?php

use XuongOop\Salessa\Controllers\Admin\CategoryController;
use XuongOop\Salessa\Controllers\Admin\DashBoardController;
use XuongOop\Salessa\Controllers\Admin\LoginController;
use XuongOop\Salessa\Controllers\Admin\ProductController;
use XuongOop\Salessa\Controllers\Admin\UserController;

$router->before('GET|POST', '/admin/*.*', function() {
    if(!is_logged()){
        header("Location: "  . url('login'));
        exit;
    }

    if(!is_admin()){
        header("Location: "  . url());
        exit;
    }


});

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashBoardController::class . '@dashboard');
    
    $router->mount('/categories', function () use ($router) {

        $router->get('/',             CategoryController::class . '@index');

        $router->get('/create',       CategoryController::class . '@create'); // Show form thêm mới

        $router->post('/store',        CategoryController::class . '@store'); // Lưu mới vào DB

        $router->get('/{id}/edit',    CategoryController::class . '@edit');

        $router->post('/{id}/update',  CategoryController::class . '@update');

        $router->get('/{id}/delete',  CategoryController::class . '@delete');

    });

    $router->mount('/products', function () use ($router) {

        $router->get('/',             ProductController::class . '@index');

        $router->get('/create',       ProductController::class . '@create'); // Show form thêm mới

        $router->post('/store',        ProductController::class . '@store'); // Lưu mới vào DB

        $router->get('/{id}/show',    ProductController::class . '@show');

        $router->get('/{id}/edit',    ProductController::class . '@edit');

        $router->post('/{id}/update',  ProductController::class . '@update');

        $router->get('/{id}/delete',  ProductController::class . '@delete');

    });

    $router->mount('/users', function () use ($router) {

        $router->get('/',             UserController::class . '@index');

        $router->get('/create',       UserController::class . '@create'); // Show form thêm mới

        $router->post('/store',        UserController::class . '@store'); // Lưu mới vào DB

        $router->get('/{id}/show',    UserController::class . '@show');

        $router->get('/{id}/edit',    UserController::class . '@edit');

        $router->post('/{id}/update',  UserController::class . '@update');

        $router->get('/{id}/delete',  UserController::class . '@delete');

    });


    $router->get('/logout', LoginController::class . '@logout');
});
