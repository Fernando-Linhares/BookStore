<?php

namespace Database\Migrations;

use Application\Database\Migration\BaseMigration;
use Application\Database\Migration\Migrable;

class RentalBookMigration extends BaseMigration implements Migrable
{

    public function up()
    {
        //implements here your schema
        return $this->table("rental_book")
        ->id()
        ->int('book_id')
        ->int('costumer_id')
        ->date('rental_date')
        ->relation('book_id')
        ->relation('costumer_id')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return $this->drop('rental_book');
    }
}
    