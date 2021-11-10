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
    // private const LIMIT_ITEMS = 3;
    private Session $session;

    public function __construct()
    {
        $this->session = new Session;
        // Guard::auth($this->session);
    }

    public function test()
    {
        dd(DATABASE,USER,PASSWORD);
    }

    public function index()
    {
        $offset = 1;
        $limit = 9;//self::LIMIT_ITEMS;

        $books = $this->getRepository(Book::class)->getAllPaginated($limit, $offset);

        if(empty($books)) $books = 'add more books';
    
        return view(
            'app/panel', [
                'title'=>'home page',
                'books'=>$books,
                'user'=> $this->session->getUser()
                ]
            );
    }

    public function nextPage($request)
    {
        $limit = 0;//self::LIMIT_ITEMS;

        $offset = $request->page;
    
        $books = $this->getRepository(Book::class)->getAllPaginated($limit, $offset);

        if(empty($books)) $books = 'add more books';
    
        return view(
            'app/panel', [
                'title'=>'home page',
                'books'=>$books,
                'user'=> $this->session->getUser()
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
        die('ok');
        return view('app/create');
    }

    public function abort()
    {
        if($this->session->destroy()) return redirect('/');
    }
}