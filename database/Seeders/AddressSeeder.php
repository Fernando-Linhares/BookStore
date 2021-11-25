<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Address;

class AddressSeeder extends Seeder
{
    public function update()
    {
        foreach(get_from_file('../dbitems.php','address') as $data){
            $instance = new Address;
            $instance->state = $data['state'];
            $instance->street = $data['street'];
            $instance->complement = $data['complement'];
            $instance->house = $data['house'];
            $instance->save();
        }
    }
}