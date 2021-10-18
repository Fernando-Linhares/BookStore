<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class BooksCategoriesMigration extends Migration
{

    public function up()
    {
        //implements here your schema
        return $this->table("books_categories")
        ->id()
        ->int('category_id')
        ->int('book_id')
        ->relation('category_id')
        ->relation('book_id')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return 'books_categories';
    }
}
    