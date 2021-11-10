<?php
namespace Application\Router\Interceptor;

use Application\Router\Container\FactoryContainer;
use Application\Router\Container\FactoryContainerInterface;
use Application\Router\Interceptor\Contracts\CallBackerInterface;

class CallBacker implements CallBackerInterface
{
    private FactoryContainerInterface $containerFactory;
    private object $controller;

    public function __construct()
    {
        $this->containerFactory = new FactoryContainer;
    }

    public function callControllerWithDependence(string $controller, ...$dependences)
    {
        // var_dump($controller,$dependences);
        return $this->containerFactory
        ->getContainer()
        ->get($controller)
        ->build(...$dependences);
    }

    public function callNormalyController(string $controller)
    {
        return $this->containerFactory
        ->getContainer()
        ->get($controller)
        ->build();   
    }

    public function callAction(object $controller, string $action)
    {
       return $controller->$action();
    }

    public function callActionWith(object $controller, string $action, ...$args)
    {
        return $controller->$action(...$args);
    }
}