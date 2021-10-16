<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class AuthorMigration extends Migration
{

    public function up()
    {
        //implements here your schema
        return $this->table("author")
        ->id()
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return;
    }
}
    