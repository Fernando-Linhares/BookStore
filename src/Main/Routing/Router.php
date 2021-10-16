<?php

namespace Application\Main\Routing;

use Application\Container\ContainerService;

class Router
{
    use BaseRouter;

    public ContainerService $container;

    public function __construct(ContainerService $container)
    {
        $this->container = $container;
    }

    public function getRouting(array $routes)
    {
      
        foreach($routes as $route)
            if($this->getValidRoute($route->getRoute())) return $this->calls($route);
        
        return false;
    }

    public function calls(MapRouter $component)
    {
        if(!is_null($component->getArgs())){
                return $this->callActionWithArgs(
                    $this->getInstance($component->getController()),
                    $component->getAction(),
                    $component->getArgs()
                );
            }
        
        return $this->callAction(
            $this->getInstance($component->getController()),
            $component->getAction()
        );
    }

    public function getInstance($instance)
    {

        if(is_array($instance))
            return $this->container->get($instance[0])->build(...$instance[1]);
        
        return $this->container->get($instance)->build();
    }

}