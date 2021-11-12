<?php
namespace Application\Database\Features;

use Application\Database\QueryBuilder;

class Joiner
{
    private QueryBuilder $builder;

    public function __construct(
        private \PDO $pdo,
        private string $table
        )
    {
        $this->builder = $this->getQueryBuilder($this->table)->select('*');
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


    public function get(?string $classname=null)
    {
        $statement = $this->pdo->prepare((string) $this->builder);
        $statement->execute();
        $fetch = new Fetch($statement);

        if(empty($classname))
            return $fetch->fetchAll();

        return $fetch->fetchClass($classname);
    }

    public function paginate(int $limit ,int $offset, object $entity, ?string $classname=null)
    {
        return new Paginator(
            builder:$this->builder,
            pdo: $this->pdo,
            entity: $entity,
            limit: $limit,
            offset: $offset,
            classname: $classname);
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