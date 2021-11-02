<?php
namespace Application\Database\Features;

use Application\Database\QueryBuilder;

class Joiner
{
    private \PDO $pdo;
    private QueryBuilder $builder;

    public function __construct(\PDO $pdo,string $table)
    {
        $this->pdo = $pdo;
        $this->builder = $this->getQueryBuilder($table)->select('*');
    }

    public function getQueryBuilder(string $table): QueryBuilder
    {
        return new QueryBuilder($table);
    }

    public function join(string $nameEntity): self
    {
        $entity = new $nameEntity;
        $foreignKey = $this->getForeignKey($entity->table);
        $primaryKey = $this->getPrimaryKey($entity->table);
        $this->builder = $this->builder->join($entity->table, "$foreignKey = $primaryKey ");
        return $this;
    }


    public function get()
    {
        $statement = $this->pdo->prepare((string) $this->builder);
        $statement->execute();
        $fetch = new Fetch($statement);
        return $fetch->fetchGroup();
    }

    private function getPrimaryKey(string $table): string
    {
        return $table . ".id";
    }

    private function getForeignKey(string $table): string
    {
        if(substr($table,-3) == 'ies')
            return substr($table,0,-3) . "y_id";
        
        return substr($table,0,-1)."_id";
    }
}