<?php
namespace Application\Database\Features;

use \Application\Database\QueryBuilder;

class Finder
{
    private \PDO $pdo;
    private string $query;

    public function __construct(\PDO $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->query = $this->getQueryBuilder($table)->select('*')->where('?');
    }
    public function getQueryBuilder(string $table): QueryBuilder
    {
        return new QueryBuilder($table);
    }

    public function find(int $id, string $classname)
    {
        $statement = $this->pdo->prepare($this->query);
        $statement->bindValue(0, $id, \PDO::PARAM_INT);
        $fetch = new Fetch($statement);
        return $fetch->fetchClass($classname);
    }

}