<?php
namespace Application\Database\Features;

use \Application\Database\QueryBuilder;

class Finder
{
    private \PDO $pdo;
    private QueryBuilder $builder;

    public function __construct(\PDO $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->builder = $this->getQueryBuilder($table)->select('*');
    }

    public function getQueryBuilder(string $table): QueryBuilder
    {
        return new QueryBuilder($table);
    }

    public function find(int $id, string $classname)
    {
        $query = $this->builder->where('id = ?');

        $statement = $this->pdo->prepare($query);

        $statement->bindValue(1, $id, \PDO::PARAM_INT);

        $fetch = new Fetch($statement);

        return $fetch->fetchClass($classname);
    }

    public function findWhere(string $col, string $value, string $classname)
    {
        $query = (string) $this->builder->where($col.' = ?');

        $statement = $this->pdo->prepare($query);

        $statement->bindValue(1, $value, \PDO::PARAM_STR);

        $statement->execute();

        $fetch = new Fetch($statement);

        return $fetch->fetchOne($classname);
    }
}