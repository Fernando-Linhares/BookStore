<?php
namespace Application\Database\Features;

use Application\Database\QueryBuilder;
use Application\Pagination\Paginator;

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

    public function count(): int
    {
        $statement = $this->pdo->prepare($this->query);
        $statement->execute();
        $fetch = new Fetch($statement);
        return count($fetch->fetchAll());
    }

    public function paginate(int $limit ,int $offset)
    {
        $query = Paginator::paginate($this->builder, $limit, $offset);
        dd($query);
    }

    public function getAll(string $classname)
    {
        $statement = $this->pdo->prepare($this->query);
        $statement->execute();
        $fetch = new Fetch($statement);
        return $fetch->fetchClass($classname);
    }
}