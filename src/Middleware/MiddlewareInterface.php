<?php
namespace Application\Middleware;

interface MiddlewareInterface
{
    public function handle(mixed $request, mixed $response,\Closure $next);
}