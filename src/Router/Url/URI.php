<?php
namespace Application\Router\Url;


class URI
{
    private string $url;

    private string $method;

    private FactoryRegexInterface $factoryRegex;

    public function __construct()
    {
        $this->factoryRegex = new FactoryRegex;
        $this->url = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        if($this->method !== 'GET') unset($GLOBALS['args']);
    }

    public function routeMatch(string $route):bool
    {
        return $this->factoryRegex->getRegex()->match($route, $this->url);
    }

    public function methodMatch(string $method): bool
    {
        return $this->method === $method;
    }

    public function __toString(): string
    {
        return $this->url;
    }
}