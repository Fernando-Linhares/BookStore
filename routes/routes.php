<?php

return [
    '/dashboard'=>[\App\Controllers\HomeController::class, 'index'],
    '/rental/{id}'=>[\App\Controllers\HomeController::class, 'select'],
    '/create/book_store'=>[\App\Controllers\RegisterController::class, 'createUser'],
    '/validate'=>[\App\Controllers\AuthController::class,'verifyLogin'],
    '/register'=>[\App\Controllers\RegisterController::class, 'register'],
    '/'=>[\App\Controllers\AuthController::class,'login'],
];