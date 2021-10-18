<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class RentalBookMigration extends Migration
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
        return 'rental_book';
    }
}
    