<?php
/**
 * Class Router, is a component center of this application
 * a simple helper for your application. More about see in
 * documentation https://www.github.com/Fernando-Linhares/Router-PHP
 */
namespace Application\Router;

use Application\Router\Interceptor\Routing;

class Route
{
    public function get(string $uri, string $action)
    {
        return (new Routing('GET', $uri))->call($action);
    }

    public function post(string $uri, string $action)
    {
        return (new Routing('POST', $uri))->call($action);
    }

    public function put(string $uri, string $action)
    {
        return (new Routing('PUT', $uri))->call($action);
    }

    public function patch(string $uri, string $action)
    {
        return (new Routing('PATCH', $uri))->call($action);
    }

    public function delete(string $uri, string $action)
    {
        return (new Routing('DELETE', $uri))->call($action);
    }

    public function options(string $uri, string $action)
    {
        return (new Routing('OPTIONS', $uri))->call($action);
    }

    public function error(string $action)
    {
        return (new Routing('GET', '/error'))->call($action);
    }
}