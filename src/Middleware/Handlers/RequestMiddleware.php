<?php
namespace Application\Middleware\Handlers;

use Application\Middleware\MiddlewareInterface;
use Closure;

class RequestMiddleware implements MiddlewareInterface
{
    public function handle(mixed $request, mixed $response, Closure $next)
    {
        return $next($request,$response);
    }
}