<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function createUser()
    {
        return view('auth/register/create');
    }
}