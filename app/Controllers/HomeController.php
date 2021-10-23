<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $book = $this->getRepository('book')->getAll();
        return view('app/panel', $book);
    }

    public function select($var)
    {
        $book = $this->getRepository('book')->find((int)$var->id);
        return view('select',['book' , $book]);
    }
}