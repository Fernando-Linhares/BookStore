<?php

namespace Database\Migrations;

use Application\Database\Migration\BaseMigration;
use Application\Database\Migration\Migrable;

class AddressMigration extends BaseMigration implements Migrable
{
    public function up()
    {
        //implements here your schema
        return $this->table("address")
        ->id()
        ->string('street')
        ->string('state')
        ->string('house')
        ->text('complement')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return $this->drop('address');
    }
}
    