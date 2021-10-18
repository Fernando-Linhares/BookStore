<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return view('app/panel');
    }   
}