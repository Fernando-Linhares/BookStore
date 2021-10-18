<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class UsersMigration extends Migration
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
        return 'users';
    }
}
    