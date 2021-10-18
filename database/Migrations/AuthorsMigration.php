<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class AuthorsMigration extends Migration
{

    public function up()
    {
        //implements here your schema
        return $this->table("authors")
        ->id()
        ->string('first_name')
        ->string('last_name')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return 'authors';
    }
}
    