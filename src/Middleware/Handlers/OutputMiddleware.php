<?php
namespace Application\Middleware\Handlers;

use Application\Middleware\MiddlewareInterface;

class OutputMiddleware implements MiddlewareInterface
{
    public function handle(mixed $request, mixed $response, \Closure $next)
    {
        $view = $response->getAddress();

        $loaded_data = $response->getData();

        render($view, $loaded_data);

        return $next($request,$response);
    }
}