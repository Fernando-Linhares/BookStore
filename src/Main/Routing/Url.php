<?php

namespace Application\Main\Routing;


class Url
{
    private string $routeBase;

    public function __construct(string $routeBase)
    {
        $this->routeBase = $routeBase;
    }

    public function match(string $route)
    {
        $this->convertToRouteRegex($route);

        return is_match($route, $this->routeBase);
    }

    public function convertToRouteRegex(string &$route): void
    {
        $tabs = explode('/',$route);
        $tabs = array_map(function($tab){
            if(is_match('\{[a-z0-9\-\_]+\}',$tab))
                return '[a-z0-9]+';
            return $tab;
        }, $tabs);

        $route = implode('\/',$tabs);
    }

    public function getArgs(string $route)
    {
        $tabs = explode('/', $route);
        $tabsbase = explode('/', $this->routeBase);
        $len = count($tabsbase);
        $clear = fn ($name)=>substr(substr($name,0,-1),1);

        for($i=0; $i<$len; $i++){
            if(is_match('\{[a-z0-9\-\_]+\}',$tabs[$i]))
                $tabresult[$clear($tabs[$i])] = $tabsbase[$i];
        }
        return (object) $tabresult;
    }
}