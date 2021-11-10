<?php
namespace Application\Main;

class MvcApp
{
    /**
     * @render all middleawres
     */
    public static function render()
    {
        Middleware\Middleware::load();
    }
}