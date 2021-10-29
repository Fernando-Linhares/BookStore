<?php
namespace Application\Database\Features;

use Application\Database\QueryBuilder;

class All
{
    private string $query;
    private \PDO $pdo;

    public function __construct(\PDO $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->query = $this->getQueryBuilder($table)->select('*');
    }

    public function getQueryBuilder(string $table)
    {
        return new QueryBuilder($table);
    }

    public function getAll(string $classname)
    {
        $statement = $this->pdo->prepare($this->query);
        $fetch = new Fetch($statement);
        return $fetch->fetchClass($classname);
    }
}