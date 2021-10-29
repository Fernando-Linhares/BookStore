<?php
namespace Application\Database\Features;

use Application\Database\QueryBuilder;

class Updator
{
    private \PDO $pdo;
    private string $query;

    public function __construct(\PDO $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->query = $this->getQueryBuilder($table)->update('? = ?','?');
    }

    public function getQueryBuilder(string $table): QueryBuilder
    {
        return new QueryBuilder($table);
    }
    public function update(string $col, string $row, int $id)
    {
        $statement = $this->pdo->prepare($this->query);
        $statement->bindValue(0, $col, \PDO::PARAM_STR);
        $statement->bindValue(1, $row, \PDO::PARAM_STR);
        $statement->bindValue(2, $id, \PDO::PARAM_INT);
        return $statement->execute();
    }
}