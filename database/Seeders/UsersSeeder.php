<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\User;

class UsersSeeder extends Seeder
{
    public function update()
    {
        foreach(generate('users') as $rows){
            $instance = new User(...$rows);
            $instance->save();
        }
    }
}
    