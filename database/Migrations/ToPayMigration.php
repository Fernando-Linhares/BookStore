<?php

namespace Database\Migrations;

use Application\Database\Migration\BaseMigration;
use Application\Database\Migration\Migrable;

class ToPayMigration extends BaseMigration implements Migrable
{

    public function up()
    {
        //implements here your schema
        return $this->table("to_paies")
        ->id()
        ->decimal('value',10,2)
        ->int('fees')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return $this->drop('to_paies');
    }
}
    