<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\BooksCategories;

class BooksCategoriesSeeder extends Seeder
{
    public function update()
    {
        foreach(generate('books_categories') as $data){
            $instance = new BooksCategories(...$data);
            $instance->save();
        }
    }
}
    