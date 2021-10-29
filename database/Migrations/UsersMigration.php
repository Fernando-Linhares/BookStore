<?php

namespace Database\Migrations;

use Application\Database\Migration\Migrable;
use Application\Database\Migration\BaseMigration;

class UsersMigration extends BaseMigration implements Migrable
{
    public function up()
    {
        //implements here your schema
        return $this->table("users")
        ->id()
        ->string('first_name')
        ->string('last_name')
        ->string('email')
        ->string('password')
        ->timestamp('created_at')
        ->timestamp('updated_at')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return $this->drop('users');
    }
}
    