<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Author;

class AuthorsSeeder extends Seeder
{
    public function update()
    {
        foreach(get_from_file('../dbitems.php','authors') as $data){
            $instance = new Author;
            $instance->first_name = $data['first_name'];
            $instance->last_name = $data['last_name'];
            $instance->save();
        }
    }
}
    