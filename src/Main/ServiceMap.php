<?php
namespace Application\Main;

use Application\Main\Routing\MapRouter;

abstract class ServiceMap
{
    public function getRoutesMapped()
    {
        $routes = include '../routes/routes.php';

        foreach($routes as $key=>$value){
            $mapRouter[] = $this->getMapRouter(
                $key,
                $value[0],
                $value[1],
                $value[2]
            );
        }
        
        return $mapRouter;
    }

    public function getMapRouter(string $route,string $controller,string $action, ?string $args)
    {
        $mapRouter = new MapRouter();
        $mapRouter->setRoute($route);
        $mapRouter->setController($controller);
        $mapRouter->setAction($action);
        $mapRouter->setArgs($args);
        return $mapRouter;
    }
}