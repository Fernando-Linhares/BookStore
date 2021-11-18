<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Router\Request\Request;
use App\Models\Repositories\BookRepository;

class BooksController extends BaseController
{
    public function __construct(
        private BookRepository $repository
    ){}

    public function create()
    {
        $data = [
            'authors'=> $this->repository->getAllAuthors(),
            'categories'=> $this->repository->getAllCategories()
            ];

        return view('app/book/create',$data);
    }

    public function store(Request $request)
    {
        $this->repository->create($request);
        if($this->repository->create($request))
            return view('app/book/created');

        return view('app/book/error');
    }
}