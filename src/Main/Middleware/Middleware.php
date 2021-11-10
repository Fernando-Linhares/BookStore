<?php
namespace Application\Main\Middleware;

use Application\Main\Middleware\Handlers\HandlerRoute;

class Middleware
{
    public static function load()
    {
       return (new HandlerRoute)->handle();
    }
}