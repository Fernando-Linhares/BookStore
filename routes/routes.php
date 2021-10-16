<?php

return [
    '/testing'=>[
        \Application\Mvc\Controllers\HomePageController::class,
        'test'
    ],
    '/'=>[
        \Application\Mvc\Controllers\HomePageController::class,
        'index'
    ],
];