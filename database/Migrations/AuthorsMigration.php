<?php

namespace Database\Migrations;

use Application\Database\Migration\Migrable;
use Application\Database\Migration\BaseMigration;

class AuthorsMigration extends BaseMigration implements Migrable
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
        return $this->drop('authors');
    }
}
    