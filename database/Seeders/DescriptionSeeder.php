<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Description;

class DescriptionSeeder extends Seeder
{
    public function update()
    {
            foreach(get_from_file('../dbitems.php',"description") as $data){
                $instance = new Description;
                $instance->content = $data['content'];
                $instance->save();
            }
    }
}