<?php
namespace App\Controllers;

use App\Models\Entity\User;
use Application\Mvc\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function createUser()
    {
        return view('auth/register/create');
    }

    public function register()
    {
        $request = request();

        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = make_hash($request->password);
        
        if($this->getRepository(User::class)->create($user))
            return view('auth/register/success');
    
       return view('auth/register/error');
    }
}