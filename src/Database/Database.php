<?php
namespace Application\Database;

class Database
{
    public static function get()
    {
        return 'pgsql:host=localhost; port=5432; dbname='.DATABASE.';';
    }
}