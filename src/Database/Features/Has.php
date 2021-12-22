<?php
namespace Application\Database\Features;

use Application\Database\QueryBuilder;

class Has
{
    private \PDO $pdo;
    private QueryBuilder $query;

    public function __construct(\PDO $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->query = $this->getQueryBuilder($table)->select('count(*)');
    }

    public function getQueryBuilder(string $table): QueryBuilder
    {
        return new QueryBuilder($table);
    }

    public function hasOne()
    {
        $someResult = $this->pdo->query($this->query);
        return $someResult >= 1;
    }

    public function hasThis(object $instance)
    {
        $query = $this->query->where('id= ?');
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $instance->id);
        $statement->execute();
        dd($statement);
        return ($statement->fetchAll() > 1);
    }
}