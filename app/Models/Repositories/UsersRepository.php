<?php
namespace App\Models\Repositories;

use App\Models\Entity\User;
use Application\Database\Access\Access;

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
        $user->password = make_hash($user->password);
        return $this->access->getAccess('users')->create($user);
    }

    public function verify(object $data)
    {
        $user  = $this->access->getAccess('users')->where('email' ,$data->email, User::class);

        if(empty($user)) return false;

        return check_password($user->password, $data->password);
    }
}