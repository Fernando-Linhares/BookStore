<?php
namespace App\Controllers;

use App\Models\Entity\Author;
use App\Models\Entity\Book;
use App\Models\Entity\Category;
use App\Models\Repositories\BookRepository;
use Application\Mvc\Controllers\BaseController;
use Application\Sessions\Session;
use Application\Guards\Guard;
use Application\Router\Request\Request;

class HomeController extends BaseController
{
    public function __construct(
        private Session $session,
        private BookRepository $repository
        )
    {
        Guard::auth($this->session);
    }

    public function index()
    {
        $offset = 0;
        $limit = 10;

        $books = $this->repository->getAllPaginated($limit, $offset);

        
        $pages = $this->repository->getPages($limit,$offset)->getLinks();

        dd($pages);
        if(empty($books)) $books = 'add more books';

        return view(
            'app/panel', [
                'title'=>'home page',
                'books'=>$books,
                'user'=> $this->session->getUser(),
                'pages'=>$pages
                ]
            );
    }

    public function nextPage(int $page)
    {
        $limit = 10;

        $books = $this->repository->getAllPaginated($limit, $page * $limit);

        if(empty($books)) $books = 'add more books';
    
        $pages = $this->repository->getPages(10, $page)->getLinks();

        // dd($pages);
        return view(
            'app/panel', [
                'title'=>'home page',
                'books'=>$books,
                'user'=> $this->session->getUser(),
                'pages'=>$pages
                ]
            );
    }

    public function select(int $id)
    {
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