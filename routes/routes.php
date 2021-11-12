<?php

use \Application\Router\Route;

$router = new Route;

$router->get('/{id}/rental','\App\Controllers\HomeController:select');
$router->get('/create/book_store','\App\Controllers\RegisterController:createUser');
$router->post('/validate','\App\Controllers\AuthController:verifyLogin');
$router->post('/register','\App\Controllers\RegisterController:register');
$router->get('/logout', '\App\Controllers\HomeController:abort');
$router->get('/dashboard', '\App\Controllers\HomeController:index');
$router->get('/{page}/dashboard', '\App\Controllers\HomeController:selectPage');
$router->get('/{page}/back', '\App\Controllers\HomeController:backPage');
$router->get('/{page}/next', '\App\Controllers\HomeController:nextPage');

// $router->get('/dashboard/add', '\App\Controllers\HomeController:addBook');
$router->get('/', '\App\Controllers\AuthController:login');