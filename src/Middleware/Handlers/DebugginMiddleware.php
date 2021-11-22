<?php
namespace Application\Middleware\Handlers;

use Application\Middleware\MiddlewareInterface;
use Closure;

class DebugginMiddleware implements MiddlewareInterface
{
    public function handle(mixed $request, mixed $response, Closure $next)
    {
        if(DEBUG) ini_set('display_errors',1);

        return $next($request,$response);
    }
}