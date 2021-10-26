<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class ToPayMigration extends Migration
{

    public function up()
    {
        //implements here your schema
        return $this->table("to_paies")
        ->id()
        ->decimal('value',10,2)
        ->int('fees')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return 'to_paies';
    }
}
    