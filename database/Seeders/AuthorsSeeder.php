<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Author;

class AuthorsSeeder extends Seeder
{
    public function update()
    {
        foreach(generate('authors') as $data){
            $instance = new Author(...$data);
            $instance->save();
        }
    }
}
    