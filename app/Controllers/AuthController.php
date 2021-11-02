<?php
namespace App\Controllers;

use App\Models\Entity\User;
use Application\Mvc\Controllers\BaseController;

class AuthController extends BaseController
{
    public function login()
    {
        if(hasAnyUser())
            return redirect('/create/book_store');

        return view('auth/login');
    }

    public function verifyLogin()
    {
        $request = request();
        if($this->getRepository(User::class)->verify($request)){
            return redirect('/dashboard');
        }

        return die('error');// view('auth/error');
    }
}