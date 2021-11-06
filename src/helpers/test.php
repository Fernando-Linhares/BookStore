<?php
function database_test(string $table): \PDO
{

    $pdo = new \PDO('sqlite::memory',null,null,[\PDO::ATTR_PERSISTENT=>true]);
   
    if(is_string($table))
        $pdo->query('CREATE TABLE IF NOT EXISTS $table');


    return $pdo;
}