<?php
namespace Application\Router\Interceptor;

class Builder
{
    public function __construct(private CallBacker $callbacker){}

    public function set(string $controller)
    {
        return $this->getInstance($controller);
    }

    public function getInstance(string $controller)
    {
        if($this->hasDependences($controller))
            return $this->callWithDependences($controller);

        
        return $this->callNormaly($controller);
    }

    public function callNormaly(string $controller)
    {
        return $this->callbacker->callNormalyController($controller);
    }

    public function callWithDependences(string $controller)
    {
        return $this->callbacker
                    ->callControllerWithDependence(
                        $controller, 
                       ...$this->getDependences($controller)
                    );
    }

    public function getDependences(string $controller): array
    {
        $reflectionclass = new \ReflectionClass($controller);
        $properties = array_map(
            function($reflectionProperty){
                return new ($reflectionProperty->getType()->getName());
            }
            ,$reflectionclass->getProperties());

        return $properties;
    }

    private function hasDependences(string $controller)
    {
        $reflectionclass = new \ReflectionClass($controller);

        return count($reflectionclass->getProperties()) > 0;
    }
}