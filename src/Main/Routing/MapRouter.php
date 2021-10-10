<?php
namespace Application\Main\Routing;

class MapRouter
{
    private Url $route;

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

    public function setRoute(string $url)
    {
        $this->route = new Url($url);     
    }

    public function setArgs($args)
    {
        $this->args = $args;
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

    public function getArgs()
    {
        return $this->route->getArgs($_SERVER['REQUEST_URI']);
    }
}