<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Book;

class BookSeeder extends Seeder
{
    public function update()
    {
        foreach(generate('books') as $data){
            $instance = new Book(...$data);
            $instance->save();
        }
    }
}