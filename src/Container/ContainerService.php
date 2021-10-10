<?php
namespace Application\Container;

class ContainerService implements ContainerInterface
{
    private static string $instance;

    public function get(string $classname): self
    {
        self::$instance = $classname;
        return $this;
    }

    public function build(...$args): object
    {
        return new self::$instance(...$args);
    }

}