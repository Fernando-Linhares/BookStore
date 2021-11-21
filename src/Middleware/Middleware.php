<?php
namespace Application\Middleware;

class Middleware
{
    public static function load(array $middlewares, mixed &$request, mixed &$response)
    {
        foreach($middlewares as $middleware)
        {
            $response = self::call($middleware, $request, $response, function($request, $response){
                return $response;
            });
        }

        return $response;
    }

    public static function call($middleware, mixed $request, mixed $response, \Closure $next)
    {
        return call_user_func_array([new $middleware, 'handle'], [$request, $response, $next]);
    }
}