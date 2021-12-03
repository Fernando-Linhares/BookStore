<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Guards\Guard;
use Application\Sessions\Session;
use App\Models\Repositories\RentalRepository;
use Application\Router\Request\Request;

class RentalController extends BaseController
{
    public function __construct(
        private Session $session,
        private RentalRepository $repository
        )
    {
        Guard::auth($this->session);
    }

    public function index()
    {
        $data = [
            'title'=>'alugueis',
            'customers'=>$this->repository->getCustomers(),
            'books'=>$this->repository->getBooks(),
            'rentals'=>$this->repository->getRentals()
        ];

        return view('app/rentals/index',$data);
    }

    public function store(Request $request)
    {
        if($this->repository->store($request->all()))
            return view('app/rentals/created');

        return view('app/rentals/error');
    }

    public function onBook(int $id)
    {
        $data = [
            'book'=>$this->repository->findBook($id),
            'customers'=>$this->repository->getCustomers(),
            'title'=>'aluguel'
        ];

        return view('app/rentals/book', $data);
    }
}