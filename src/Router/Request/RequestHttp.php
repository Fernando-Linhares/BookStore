<?php
namespace Application\Router\Request;

class RequestHttp
{
    public function has(): bool
    {
        return count($_REQUEST)>0;
    }

    public function __get($name)
    {
        return $_REQUEST[$name];
    }

    public function __set($name, $value)
    {
        $_REQUEST[$name] = $value;
    }
}