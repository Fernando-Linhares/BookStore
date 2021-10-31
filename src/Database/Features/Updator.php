<?php
namespace Application\Database\Features;

use Application\Database\QueryBuilder;

class Updator
{
    private \PDO $pdo;
    private QueryBuilder $builder;

    public function __construct(\PDO $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->builder = $this->getQueryBuilder($table);
    }

    public function getQueryBuilder(string $table): QueryBuilder
    {
        return new QueryBuilder($table);
    }
    public function update(string $col, string $row, int $id)
    {
        $query = $this->builder->update($col.' = ?','?');

        $statement = $this->pdo->prepare($query);

        $statement->bindValue(1, $row, \PDO::PARAM_STR);
        $statement->bindValue(2, $id, \PDO::PARAM_INT);

        return $statement->execute();
    }
}