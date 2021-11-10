<?php
namespace Application\Router\Url;


class RegexDefault implements MatchAble
{
    public function match(string $base, string $value): bool
    {
        if(str_contains($base,'{')){
            $this->getArgs($base, $value);
            return preg_match($this->getBase($base), $value);
            }

        return $base == $value;
    }

    public function getBase(string $name): string
    {
        $tabs = explode('/',$name);

        $tabsmodified = array_map(
                function($tab){
                    if(str_contains($tab, '{')){
                        return '[a-z0-9\-\_\.]+';
                    }else{
                        return $tab;
                    }
                }
            ,$tabs);

        $tabsjoinded = implode('\/', $tabsmodified);
    
       $base = '/'.$tabsjoinded.'/i';

       return $base;
    }

    public function getArgs(string $base,string $route)
    {
        $tabs = explode('/',$route);
        $basetabs = explode('/',$base);

        $clear = fn($name)=>substr(substr($name,0,-1),1);
        $len = count($basetabs);
        for($i=0;$i<$len;$i++){
            if(str_contains($basetabs[$i],"{"))
                $tabresult[$clear($basetabs[$i])] = $tabs[$i];
        }

        $GLOBALS['args'] = (object) $tabresult;
    }
}