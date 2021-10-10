<?php
namespace Application\Mvc\Controllers;

class HomePageController
{
    public function index()
    {
        return 'ola mundo';
    }

    public function test(string $name)
    {
        return $name;
    }
}