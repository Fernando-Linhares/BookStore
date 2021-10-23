<?php

return [
    '/home'=>[\App\Controllers\HomeController::class, 'index'],
    '/rental/{id}'=>[\App\Controllers\HomeController::class, 'select'],
];