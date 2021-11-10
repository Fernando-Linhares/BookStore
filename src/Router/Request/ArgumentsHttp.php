<?php
namespace Application\Router\Request;

use Application\Router\Interceptor\Contracts\ArgumentsHttpInterface;

class ArgumentsHttp implements ArgumentsHttpInterface
{
    public function has(): bool
    {
        return isset($GLOBALS['args']);
    }

    public function __get($name)
    {
        return $GLOBALS['args']->$name;
    }

    public function __set($name, $value)
    {
        $GLOBALS['args']->$name = $value;
    }

    public function __destruct()
    {
        unset($GLOBALS['args']);
    }
}