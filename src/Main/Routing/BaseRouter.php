<?php
namespace Application\Main\Routing;

trait BaseRouter
{
    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getValidRoute(string $route): bool
    {
        return $this->getUri() === $route;
    }

    public function callActionWithArgs(object $controller,string $action, ...$args)
    {
        return $controller->$action(...$args);
    }

    public function callAction(object $controller, string $action)
    {
        return $controller->$action();
    }
}