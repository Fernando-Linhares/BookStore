<?php
namespace Application\Router\Interceptor;

use Application\Router\Url\URI;

class Routing
{
    private string $method;
    private string $route;

    public function __construct(string $method, string $route)
    {
       $this->route = $route;
       $this->method = $method;
    }

    public function call(string $action)
    {
        $uri = new URI;
    
        if(!$uri->routeMatch($this->route)) return;
            

        if(!$uri->methodMatch($this->method)) return;

        $caller = new Caller;

        return $caller->resolve($action);
    }
}