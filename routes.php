<?php

use Bramus\Router\Router;
use Ductong\Mvcoop\Controllers\Admin\CategoryController;
use Ductong\Mvcoop\Controllers\Admin\UserController;
use Ductong\Mvcoop\Controllers\Client\HomeController;
use Ductong\Mvcoop\Controllers\Admin\DashboardController;
use Ductong\Mvcoop\Controllers\Admin\PostController;
use Ductong\Mvcoop\Controllers\Admin\AuthenticateController;
use Ductong\Mvcoop\Controllers\Client\PostController as ClientPostController;

// Create Router instance
$router = new Router();

// Define routes
$router->get('/', HomeController::class . '@index');
$router->get('/post/{id}', ClientPostController::class . '@show');
$router->match('GET|POST', '/auth/login', AuthenticateController::class . '@login');

$router->mount('/admin', function() use ($router) {
    $router->get('/', DashboardController::class . '@index');
    $router->get('/logout', AuthenticateController::class . '@logout');

    $router->mount('/users', function () use ($router) {
        $router->get('/',                           UserController::class . '@index');
        $router->get('/{id}/show',                  UserController::class . '@show');
        $router->get('/{id}/delete',                UserController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  UserController::class . '@update');
        $router->match('GET|POST', '/create',       UserController::class . '@create');
    });

    $router->before('GET|POST', '/admin/*', function(){
        if(!isset($_SESSION['user'])){
            header('Location: /auth/login');
            exit();
        }
    });
    $router->before('GET|POST', '/admin/.*', function(){
        if(!isset($_SESSION['user'])){
            header('Location: /auth/login');
            exit();
        }
    });

    $router->mount('/categories', function () use ($router) {
        $router->get('/',                           CategoryController ::class . '@index');
        $router->get('/{id}/show',                  CategoryController::class . '@show');
        $router->get('/{id}/delete',                CategoryController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  CategoryController::class . '@update');
        $router->match('GET|POST', '/create',       CategoryController::class . '@create');
    });

    $router->mount('/posts', function () use ($router) {
        $router->get('/',                           PostController::class . '@index');
        $router->get('/{id}/show',                  PostController::class . '@show');
        $router->get('/{id}/delete',                PostController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  PostController::class . '@update');
        $router->match('GET|POST', '/create',       PostController::class . '@create');
    });
});
// Run it!
$router->run();