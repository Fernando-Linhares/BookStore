<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;

class AuthController extends BaseController
{
    public function login()
    {
        if(hasAnyUser())
            return redirect('/create/book_store');
        return view('auth/login');
    }
}