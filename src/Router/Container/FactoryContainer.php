<?php
namespace Application\Router\Container;

class FactoryContainer implements FactoryContainerInterface
{
    public function getContainer(): Psr\ContainerInterface
    {
        return new Container;
    }
}