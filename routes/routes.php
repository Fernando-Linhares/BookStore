<?php

return [
    '/home'=>[\App\Controllers\HomeController::class, 'index'],
    '/rental/{id}'=>[\App\Controllers\HomeController::class, 'select'],
    '/create/book_store'=>[\App\Controllers\RegisterController::class, 'createUser'],
    '/'=>[\App\Controllers\AuthController::class,'login'],
];