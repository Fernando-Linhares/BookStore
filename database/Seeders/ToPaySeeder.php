<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\ToPay;

class ToPaySeeder extends Seeder
{
    public function update()
    {
        foreach(generate('to_pay') as $rows){
            $instance = new ToPay(...$rows);
            $instance->save();
        }
    }
}
    