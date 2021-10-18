<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Costumer;

class CostumersSeeder extends Seeder
{
    public function update()
    {
        foreach(generate('costumers') as $rows){
            $instance = new Costumer(...$rows);
            $instance->save();
        }
    }
}
    