<?php
namespace Database\Seeders;

use App\Models\Entity\RentalBook;
use Application\Database\Seeders\Seeder;

class RentalBookSeeder extends Seeder
{
    public function update()
    {
        foreach(generate('costumers') as $rows){
            $instance = new RentalBook(...$rows);
            $instance->save();
        }
    }
}
    