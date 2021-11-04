<?php
namespace Application\Main\Routing;

class MapRouter
{
    private string $route;

    private string $controller;

    private string $action;

    private $args;

    public function setController(string $controller)
    {
        $this->controller = $controller;
    }

    public function setAction(string $action)
    {
        $this->action = $action;
    }

    public function setRoute(string $route)
    {
        $this->route = $route;     
    }

    public function setArgs($args)
    {
        $this->args = $args;
    }

    public function getArgs()
    {
        return $this->args;
    }

      public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getRoute()
    {
        return $this->route;
    }
}