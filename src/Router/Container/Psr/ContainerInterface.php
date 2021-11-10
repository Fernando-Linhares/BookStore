<?php
namespace Application\Router\Container\Psr;

interface ContainerInterface
{
    /**
     * @throws ContainerExceptionInterface
     * @throws ContainerNotFoundException
     */
    public function get(string $id): mixed;

    public function has(string $id): bool;
}