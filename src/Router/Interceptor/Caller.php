<?php
namespace Application\Router\Interceptor;

use Application\Router\Request\ArgumentsHttp;

class Caller
{
    private Builder $builder;
    private ActionBuilder $actionbuilder;


    public function __construct()
    {
        $this->builder = new Builder(new CallBacker);
        $this->actionbuilder = new ActionBuilder(new CallBacker,new ArgumentsHttp);
    }

    public function resolve(string $handler)
    {
        list($controller,$action) = $this->divide($handler);

        $controller = $this->build($controller);

        return $this->actionBuild($controller, $action);
    }

    public function build(string $controller)
    {
        return $this->builder->set($controller);
    }

    public function actionBuild(object $controller,string $action)
    {
        return $this->actionbuilder->set($controller,$action);
    }

    public function divide(string $hander): array
    {
        return explode(':', $hander);
    }
}