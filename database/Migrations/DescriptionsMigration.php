<?php

namespace Database\Migrations;

use Application\Database\Migration\BaseMigration;
use Application\Database\Migration\Migrable;

/**
 * Migration created in 2021-11-02 10:11:11.
 * See more on documentation https://github.com/Fernando-Linhares/BookStore
 */

class DescriptionsMigration extends BaseMigration implements Migrable
{

    public function up()
    {
        //implements here your schema
        return $this->table("descriptions")
        ->id()
        ->text('content')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return $this->drop("descriptions");
    }
}
    