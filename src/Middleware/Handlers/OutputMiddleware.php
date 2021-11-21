<?php
namespace Application\Middleware\Handlers;

use Application\Middleware\MiddlewareInterface;

class OutputMiddleware implements MiddlewareInterface
{
    public function handle(mixed $request, mixed $response, \Closure $next)
    {
        echo $next($request,$response);
    }
}