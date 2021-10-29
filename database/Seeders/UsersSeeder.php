<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\User;

class UsersSeeder extends Seeder
{
    public function update()
    {
        foreach(get_from_file('../dbitems.php','users') as $data){
            $instance = new User;
            $instance->first_name = $data['first_name'];
            $instance->last_name = $data['last_name'];
            $instance->email = $data['email'];
            $instance->password = $data['password'];
            $instance->created_at = $data['created_at'];
            $instance->updated_at = $data['updated_at'];
            $instance->save();
        }
    }
}
    