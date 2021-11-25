<?php
namespace Database\Seeders;

use Application\Database\Seeders\Seeder;
use App\Models\Entity\Customer;

class CustomersSeeder extends Seeder
{
    public function update()
    {
        foreach(get_from_file('../dbitems.php','customers') as $data){
            $instance = new Customer;
            $instance->first_name = $data['first_name'];
            $instance->last_name = $data['last_name'];
            $instance->addres_id = $data['address_id'];
            $instance->save();
        }
    }
}
    