<?php
namespace App\Models\Repositories;

use App\Models\Entity\User;
use Application\Database\Access\Access;
use Application\Sessions\Session;

class UsersRepository
{
    private Access $access;

    public function __construct()
    {
        $this->access = new Access;
    }

    public function create(User $user)
    {
        $user->created_at = date('Y-m-d h:m:s');
        $user->updated_at = date('Y-m-d h:m:s');
        return $this->access->getAccess('users')->create($user);
    }

    public function verify(object $data)
    {
        $user  = $this->access->getAccess('users')->where('email' ,$data->email, User::class);

        if(empty($user)) return false;

        $session = new Session;
        $session->set('first_name', $user->first_name);
        $session->set('last_name', $user->last_name);
        $session->set('email', $user->email);

        return check_password($user->password, $data->password);
    }
}