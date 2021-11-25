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
        ->boolean('is_paided')
        ->date('rental_date')
        ->int('book_id')
        ->int('to_pay_id')
        ->int('customer_id')
        ->relation('customer_id')
        ->relation('book_id')
        ->relation('to_pay_id')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return $this->drop('rental_book');
    }
}
    