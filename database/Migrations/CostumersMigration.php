<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class CostumersMigration extends Migration
{

    public function up()
    {
        //implements here your schema
        return $this->table("costumers")
        ->id()
        ->string('first_name')
        ->string('last_name')
        ->boolean('is_paid')
        ->int('to_pay_id')
        ->int('address_id')
        ->relation('to_pay_id')
        ->relation('address_id')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return 'costumers';
    }
}
    