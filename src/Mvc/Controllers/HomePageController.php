<?php

namespace Application\Mvc\Controllers;

class HomePageController
{
    public function index()
    {
        return view('app/panel');
    }

    public function test($args)
    {
        return $args->name;
    }
}