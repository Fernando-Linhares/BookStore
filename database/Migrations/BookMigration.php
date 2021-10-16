<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class BookMigration extends Migration
{

    public function up()
    {
        //implements here your schema
        return $this->table("book")
        ->id()
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return;
    }
}
    