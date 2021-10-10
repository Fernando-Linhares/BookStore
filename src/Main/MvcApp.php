<?php
namespace Application\Main;

class MvcApp
{
    public static function render(): string
    {
        return Manager::all()->getRoutines();
    }
}