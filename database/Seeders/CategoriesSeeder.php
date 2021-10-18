<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Category;

class CategoriesSeeder extends Seeder
{
    public function update()
    {
        foreach(generate('categories') as $data){
            $instance = new Category(...$data);
            $instance->save();
        }
    }
}
    