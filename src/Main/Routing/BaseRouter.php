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
        if(!preg_match('/'.$route->getPlaceHolders().'/i', $this->getUri()))
            return false;

        return true;
    }

    public function callActionWithArgs(object $controller,string $action, $args)
    {
        return $controller->$action((object) ($args[0]));
    }

    public function callAction(object $controller, string $action)
    {
        return $controller->$action();
    }
}