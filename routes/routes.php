<?php

return [
    '/home'=>[
        \Application\Mvc\Controllers\HomePageController::class,
        'index',
    ],

    '/testing/{name}'=>[
        \Application\Mvc\Controllers\HomePageController::class,
        'test'
    ]
];