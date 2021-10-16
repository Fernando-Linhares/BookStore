<?php
namespace Application\Main\Routing;

use Application\Main\Routing\Argument;

trait BaseRouter
{
    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getValidRoute(Url $route): bool
    {
        return is_match($route->getPlaceHolders(), $this->getUri());
    }

    public function callActionWithArgs(object $controller,string $action, $args)
    {
        return $controller->$action((object) ($args));
    }

    public function callAction(object $controller, string $action)
    {
        return $controller->$action();
    }
}