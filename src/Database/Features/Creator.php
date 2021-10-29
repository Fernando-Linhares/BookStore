<?php
namespace Application\Database\Features;

class Creator
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(object $entity)
    {
        $statement = $entity->make($this->pdo);
        return $statement->execute();
    }
}