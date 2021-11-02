<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Sessions\Session;
use Application\Guards\Guard;

class HomeController extends BaseController
{
    private Session $session;

    public function __construct()
    {
        $this->session = new Session;
        Guard::auth($this->session);
    }

    public function index()
    {
        $user = $this->session->all();
        $books = $this->getRepository('book')->getAll();

        if(empty($books)) $books = 'add more books';
    
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
    
    public function addBook()
    {
        return view('app/create');
    }

    public function abort()
    {
        if($this->session->destroy()) return redirect('/');
    }
}