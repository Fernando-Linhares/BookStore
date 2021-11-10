<?php
namespace App\Controllers;

use App\Models\Entity\User;
use Application\Router\Request\Request;
use Application\Mvc\Controllers\BaseController;
use App\Models\Repositories\UserRepository;

class RegisterController extends BaseController
{
    public function __construct(
        private UserRepository $repository
    ){}

    public function createUser()
    {
        return view('auth/register/create');
    }

    public function register(Request $request)
    {
        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = make_hash($request->password);
        
        if($this->repository->create($user))
            return redirect('/dashboard');
    
       return view('auth/register/error');
    }
}