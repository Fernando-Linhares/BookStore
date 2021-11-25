<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Book;

class BookSeeder extends Seeder
{
    public function update()
    {
            foreach(get_from_file('../dbitems.php','books') as $data){
                $instance = new Book;
                $instance->title = $data['title'];
                $instance->book_cover = $data['book_cover'];
                $instance->description_id = $data['description_id'];
                $instance->author_id = $data['author_id'];
                $instance->published_at = $data['published_at'];
                $instance->amount = $data['amount'];
                $instance->save();
            }
        
    }
}