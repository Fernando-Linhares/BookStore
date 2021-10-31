<?php

namespace Application\Database;

class PdoSingleton
{
    private static \PDO $pdo;

    private function __construct(){}
    private function __clone(){}

    public static function getPdo(): \PDO
    {
        if(empty(self::$pdo))
        {
            self::$pdo = new \PDO(
                Database::get(),
                USER,
                PASSWORD,
                OPTIONS
            );
        }

        return self::$pdo;
    }
}