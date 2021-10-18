<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class CategoriesMigration extends Migration
{

    public function up()
    {
        //implements here your schema
        return $this->table("categories")
        ->id()
        ->string('name')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return 'categories';
    }
}
    