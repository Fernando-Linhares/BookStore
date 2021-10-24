<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $book = $this->getRepository('book')->getAll();

        return view('app/panel', ['title'=>'home page','book'=>$book]);
    }

    public function select($request)
    {
        $id = (int) $request->id;
        $book = $this->getRepository('book')->find($id);

        return view('app/select', ['title'=>'book '.$book->title, 'book'=> $book]);
    }
}