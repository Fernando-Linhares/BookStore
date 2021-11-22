<?php

return [
    Application\Middleware\Handlers\RequestMiddleware::class,
    Application\Middleware\Handlers\DebugginMiddleware::class,
    Application\Middleware\Handlers\RouterMiddleware::class,
    Application\Middleware\Handlers\OutputMiddleware::class,
];