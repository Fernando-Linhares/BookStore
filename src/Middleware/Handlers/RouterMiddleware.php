<?php
namespace Application\Middleware\Handlers;

use Application\Middleware\MiddlewareInterface;
use Closure;

class RouterMiddleware implements MiddlewareInterface
{
    public function handle(mixed $request, mixed $response, Closure $next)
    {
        require '../routes/routes.php';

        $response = $GLOBALS['response'];

        return $next($request, $response);
    }
}