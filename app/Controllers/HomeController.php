<?php
namespace App\Controllers;

use App\Models\Entity\Author;
use App\Models\Entity\Book;
use App\Models\Entity\Category;
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

        dd($this->getRepository(Book::class)->getAll());
        // $books = $this->getRepository(Book::class)->join(Author::class)->get();
    
        if(empty($books)) $books = 'add more books';
    
        return view(
            'app/panel', [
                'title'=>'home page',
                'books'=>$books,
                'user'=> $this->session->all()
                ]
            );
    }

    public function select($request)
    {
        $id = (int) $request->id;
        $book = $this->getRepository(Book::class)->find($id);
        dd($book);
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