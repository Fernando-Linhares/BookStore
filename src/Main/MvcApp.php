<?php
namespace Application\Main;

class MvcApp
{
    public static function render()
    {
        return Manager::all()->getRoutines();
    }
}