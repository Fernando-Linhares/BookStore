<?php
use Application\Http\Request\RequestHttp;

return [
    '/home'=>[\App\Controllers\HomeController::class, 'index'],
    '/rental/{id}'=>[\App\Controllers\HomeController::class, 'select'],
    '/create/book_store'=>[\App\Controllers\RegisterController::class, 'createUser'],
    '/validate'=>[\App\Controllers\AuthController::class,'verifyLogin'],
    '/'=>[\App\Controllers\AuthController::class,'login'],
];