<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Address;

class AddressSeeder extends Seeder
{
    public function update()
    {
        foreach(generate('address') as $data){
            $instance = new Address(...$data);
            $instance->save();
        }
    }
}
    