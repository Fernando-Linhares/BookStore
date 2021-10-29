<?php

namespace Database\Migrations;

use Application\Database\Migration\Migrable;
use Application\Database\Migration\BaseMigration;

class CategoriesMigration extends BaseMigration implements Migrable
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
        return $this->drop('categories');
    }
}
    