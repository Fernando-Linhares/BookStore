<?php
namespace Application\Database\Features;

use Application\Database\QueryBuilder;

class Has
{
    private \PDO $pdo;
    private string $query;

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
        return $someResult->count >= 1;
    }

    
}