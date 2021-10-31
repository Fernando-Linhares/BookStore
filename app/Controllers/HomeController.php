<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Sessions\Session;

class HomeController extends BaseController
{
    private Session $session;

    public function __construct()
    {
        $this->session = new Session;
    }

    public function index()
    {
        $user = $this->session->all();
    
        $books = $this->getRepository('book')->getAll();

        dd($user);
        return view(
            'app/panel', [
                'title'=>'home page',
                'books'=>$books,
                'user'=>$user
            ]);
    }

    public function select($request)
    {
        $id = (int) $request->id;
        $book = $this->getRepository('book')->find($id);

        return view('app/select', ['title'=>'book '.$book->title, 'book'=> $book]);
    }
    
    public function abort()
    {
        if($this->session->destroy()) die('aborted session');
    }
}