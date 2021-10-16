<?php

namespace Application\Main\Routing;


class Url
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function toComp()
    {
        return substr($this->content,1);
    }

    public function getPlaceHolders()
    {
        $route = $this->content;

        foreach($this->getTabs($route) as $tabs)
            $fulltabs[] = $this->hasKey($tabs) ? '[a-z0-9\-\_]+': $tabs ;
        
        return implode('\/',$fulltabs);
    }

    public function hasKey(string $tab)
    {
        if(is_match('\{[a-z0-9\-\_]+\}', $tab)) return true;   
    }

    public function hasParms()
    {
        foreach($this->getTabs($this->content) as $tabs)
            if($this->hasKey($tabs)) return true;
        
        return false;
    }

    public function getTabs(string $fulltabs)
    {
        return explode('/', $fulltabs);
    }

    public function getArgs($route)
    {
        $tab = explode('/',$route);
       foreach($this->getTabs($this->content)as $key=>$tabs){
           if($this->hasKey($tabs))
             $args[] = [substr($tabs,1,-1) => $tab[$key]];
       }
       return $args;
    }


    public function __toString()
    {
        return $this->content;
    }
}