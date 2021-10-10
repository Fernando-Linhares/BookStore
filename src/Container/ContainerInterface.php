<?php
namespace Application\Container;

interface ContainerInterface
{
    public function get(string $id): self;

    public function build(...$args): object;
}