<?php

namespace Application\Main;

use Application\Container\ContainerService;

class Manager extends ServiceMap
{
    public static function all()
    {
        return new self;
    }

    public function getRoutines()
    {
       $router = new Routing\Router(new ContainerService);

       $router->getRouting($this->getRoutesMapped());

        if(http_response_code()==404)
            die($this->span(404));
    }

    private function span(int $status)
    {
        switch($status)
        {
            case 404:
                return "<h3 style='text-align: center;'>Error <span style='color: red;'>404</span> NOT FOUND <h3><hr/>";
                break;
        }
    }

}