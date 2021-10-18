<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class AddressMigration extends Migration
{

    public function up()
    {
        //implements here your schema
        return $this->table("address")
        ->id()
        ->string('street')
        ->string('state')
        ->string('house')
        ->text('complement')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return 'address';
    }
}
    