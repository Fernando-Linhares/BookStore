<?php
namespace Application\Database\Features;

use Application\Database\QueryBuilder;
use Application\Pagination\Pages;
use Application\Pagination\Paginator as ProductPaginator;

class Paginator
{
    private array $collections;
    private Pages $pages;

    public function __construct(
        private QueryBuilder $builder,
        private \PDO $pdo,
        private object $entity,
        private int $limit,
        private int $offset,
        private string $classname)
    {
        $this->collections = $this->getCollections();
        $this->pages = $this->getPages($entity);
    }

    public function getCollections(): array
    {
        if(isset($this->collections)) return $this->collections;

        $query = ProductPaginator::paginate($this->builder, $this->limit, $this->offset);

        $statement = $this->pdo->prepare((string) $query);

        $statement->execute();

        $fetch = new Fetch($statement);

        if(empty($this->classname)) return $fetch->fetchAll();

        return $fetch->fetchClass($this->classname);
    }

    public function getPages(): Pages
    {
        if(isset($this->pages)) return $this->pages;
    
        return new Pages($this->entity->count(), $this->limit, $this->offset);
    }
}