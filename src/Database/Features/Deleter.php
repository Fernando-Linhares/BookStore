<?php
namespace Application\Database\Features;
use Application\Database\QueryBuilder;

class Deleter
{
    private \PDO $pdo;
    private string $query;

    public function __construct(\PDO $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->query = $this->getQueryBuilder($table)->delete('?');
    }

    public function getQueryBuilder(string $table): QueryBuilder
    {
        return new QueryBuilder($table);
    }

    public function delete(int $id)
    {
        $statement = $this->pdo->prepare($this->query);
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        return $statement->execute();
    }
}