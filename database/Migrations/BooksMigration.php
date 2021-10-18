<?php

namespace Database\Migrations;

use Application\Database\Migrations\Migration;

class BooksMigration extends Migration
{

    public function up()
    {
        //implements here your schema
        return $this->table("books")
        ->id()
        ->string('title')
        ->string('book_cover')
        ->int('author_id')
        ->relation('author_id')
        ->date('published_at')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return 'books';
    }
}
    