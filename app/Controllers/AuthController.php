<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Router\Request\Request;
use App\Models\Repositories\UserRepository;

class AuthController extends BaseController
{
    public function __construct(
        private UserRepository $repository
    ){}

    public function login()
    {
        if(hasAnyUser())
            return redirect('/create/book_store');

        return view('auth/login');
    }

    public function verifyLogin(Request $request)
    {
        if($this->repository->verify($request))
            return redirect('/dashboard');

        return die('error');// view('auth/error');
    }
}