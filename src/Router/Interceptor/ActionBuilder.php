<?php
namespace Application\Router\Interceptor;


/**
 * this component job to routing class like self name
 * tell building an action handle to the application.
 */
class ActionBuilder
{
    public function __construct(
        private Contracts\CallBackerInterface $callbacker,
        private Contracts\ArgumentsHttpInterface $argumentshttp
    ){}

    public function set(object $controller,string $action)
    {
        if($this->hasArgs())
            return $this->callActionWithArgs($controller,$action);
        
    
        if($this->hasParameters($controller,$action))
            return $this->callWithParameters($controller,$action);


        return $this->callNormaly($controller,$action);
    }

    public function callNormaly(object $controller,string $action)
    {
        return $this->callbacker->callAction($controller,$action);
    }

    public function callWithParameters(object $controller,string $action)
    {
        return $this->callbacker
                ->callActionWith(
                        $controller,
                        $action,
                    ...$this->getParameters($controller, $action)
                    );
    }

    public function callActionWithArgs(object $controller, string $action)
    {
        return $this->callbacker->callActionWith(
            $controller,
            $action,
            ...$this->getArgs($controller,$action)
            );
    }

    public function hasParameters($controller,$action)
    {
        $reflectionmethod = new \ReflectionMethod($controller,$action);
        return count($reflectionmethod->getParameters()) > 0;
    }

    public function getParameters(object $controller,string $action)
    {
        $reflectionmethods = new \ReflectionMethod($controller,$action);
        return array_map(
            function($reflectionmethod){
                return new ($reflectionmethod->getType()->getName());
            }
            ,
        $reflectionmethods->getParameters());
    }

    public function hasArgs(): bool
    {
        return $this->argumentshttp->has();
    }

    public function getArgs(object $controller, string $action)
    {
        $argumentshttp = $this->argumentshttp;
        
        $reflectionmethods = new \ReflectionMethod($controller,$action);

        return array_map(
            function($reflectionmethod)use($argumentshttp){
                $argument = $reflectionmethod->getName();
                return $argumentshttp->$argument;
        },
        $reflectionmethods->getParameters());
    }
}