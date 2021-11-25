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

$router->get('/add', '\App\Controllers\BooksController:create');

$router->post('/save-book','\App\Controllers\BooksController:store');

$router->get('/', '\App\Controllers\AuthController:login');

$router->get('/rentals','\App\Controllers\RentalController:index');

$router->get('/actives', '\App\Controllers\RentalController:toPays');

$router->get('/customers', '\App\Controllers\CustomerController:index');