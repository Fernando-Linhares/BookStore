<?php
namespace Application\Router\Container;

interface FactoryContainerInterface
{
    public function getContainer(): Psr\ContainerInterface;
}