<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Category;

class CategoriesSeeder extends Seeder
{
    public function update()
    {
            foreach(get_from_file('../dbitems.php',"categories") as $data){
                $instance = new Category;
                $instance->name = $data['name'];
                $instance->save();
            }
    }
}
    