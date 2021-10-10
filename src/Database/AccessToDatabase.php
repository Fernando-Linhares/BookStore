<?php
namespace Application\Database;

use PDOStatement;
use PDO;

class AccessToDatabase
{
    private PDO $pdo;
    private QueryBuilder $queryBuilder;

    public function __construct(string $table)
    {
        $this->pdo = new PDO(
            "pgsql:host=localhost; port=5432; dbname=".DATABASE.';',
            USER,
            PASSWORD,
            OPTIONS
        );
        $this->queryBuilder = new QueryBuilder($table);
    }

    public function delete(int $id): bool
    {
        $query = $this->queryBuilder->delete('?');
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        return $this->resolve($statement());
    }

    public function all(): array
    {
        $query = $this->queryBuilder->select('*');
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function update(string $col, string $row, int $id): bool
    {

        $query = $this->queryBuilder->update(" {$col} = ?", '?');
    
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(1, $row, PDO::PARAM_STR);
        $statement->bindParam(2, $id, PDO::PARAM_INT);

        return $this->resolve($statement);
    }

    public function create(object $entity)
    {
        return $this->resolve(
            $entity->make($this->pdo)
        );
    }

    public function resolve(PDOStatement $statement): bool
    {
        if($statement->execute())
            return true;
    
        return false;
    }

    public function __destruct()
    {
        unset($this->pdo);
    }

}