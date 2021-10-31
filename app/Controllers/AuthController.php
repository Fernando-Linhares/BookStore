<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Sessions\Session;

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

        if($this->getRepository('users')->verify($request)){
            return redirect('/dashboard');
        }

        return view('auth/error');
    }
}