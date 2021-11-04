<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\BooksCategories;

class BooksCategoriesSeeder extends Seeder
{
    public function update()
    {
            foreach(get_from_file('../dbitems.php',"books_category") as $data){
                $instance = new BooksCategories;
                $instance->book_id = $data['book_id'];
                $instance->category_id = $data['category_id'];
                $instance->save();
            }
    }
}
    