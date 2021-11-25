<?php

namespace Database\Migrations;

use Application\Database\Migration\Migrable;
use Application\Database\Migration\BaseMigration;

class CustomersMigration extends BaseMigration implements Migrable
{

    public function up()
    {
        //implements here your schema
        return $this->table("customers")
        ->id()
        ->string('first_name')
        ->string('last_name')
        ->int('addres_id')
        ->relation('addres_id')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return $this->drop('customers');
    }
}
    