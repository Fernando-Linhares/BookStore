<?php

namespace Database\Migrations;

use Application\Database\Migration\Migrable;
use Application\Database\Migration\BaseMigration;

class BooksMigration extends BaseMigration implements Migrable
{

    public function up()
    {
        //implements here your schema
        return $this->table("books")
        ->id()
        ->string('title')
        ->string('book_cover')
        ->int('author_id')
        ->int('description_id')
        ->date('published_at')
        ->relation('description_id')
        ->relation('author_id')
        ->create();
    }

    public function down()
    {
        //drop here your schema
        return $this->drop('books');
    }
}
    