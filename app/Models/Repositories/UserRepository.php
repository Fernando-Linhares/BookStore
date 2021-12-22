<?php
namespace App\Models\Repositories;

use App\Models\Entity\User;
use Application\Database\Access\Access;
use Application\Sessions\Session;

class UserRepository
{
    private User $user;
    private Access $access;

    public function __construct()
    {
        $this->user = new User;
        $this->access = new Access;
    }

    public function create(User $user)
    {
        $user->created_at = date('Y-m-d h:m:s');

        $user->updated_at = date('Y-m-d h:m:s');

        return $this->access->getAccess('user')->create($user);
    }

    public function verify(object $data)
    {
        $user  = $this->user->where('email', $data->email);

        if(!$user) return false;

        $session = new Session;
            
        $session->setUser($user);
    
        return check_password($user->password, $data->password);
    }
}