<?php
namespace Application\Database;

use Application\Database\Fetcher\Fetch;
use PDOStatement;
use PDO;
use PDOException;

class AccessToDatabase
{
    private PDO $pdo;
    private QueryBuilder $queryBuilder;

    public function __construct(?string $table=null)
    {
        
        $this->pdo = new PDO(
            "pgsql:host=localhost; port=5432; dbname=".DATABASE.';',
            USER,
            PASSWORD,
            OPTIONS
        );

    
        if(is_null($table))
            $table = 'postgres';
    
        $this->queryBuilder = new QueryBuilder($table);
    }

    public function find(int $id, string $classname)
    {
        $query = $this->queryBuilder->select("*")->where('id=:id');
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $fetch = new Fetch($statement);
        return current($fetch->fetchClass($classname));
    }
    
    public function delete(int $id): bool
    {
        $query = $this->queryBuilder->delete(':id');
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $this->resolve($statement());
    }
    
    public function all(string $classname): array
    {
        $query = $this->queryBuilder->select('*');
        $statement = $this->pdo->query($query);
        $fetch = new Fetch($statement);
        return $fetch->fetchClass($classname);
    }
   
    public function hasOne()
    {
        $query = $this->queryBuilder->select('count(*)');
        $statement = $this->pdo->query($query);
        $fetch = new Fetch($statement);
        return $fetch->fetchOne()->count >= 1;
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

    private function resolve(PDOStatement $statement): bool
    {
        return $statement->execute();
    }


    private function drop(string $table)
    {
        return $this->pdo->query('DROP TABLE '.$table);
    }


    public function migrate(object $migration)
    {
        try{
            $query = $migration->up();
    
            if($this->pdo->query((string) $query)) return true;
            
        }catch(PDOException $e)
        {
            $error = $e->getMessage();
    
            if(is_match('SQLSTATE\[42P07\]', $error)){
                echo "\033[38;2;255;255;0m dropping table ..\033[0m". PHP_EOL;
                $this->drop($query->getTable());
                echo "\033[38;2;0;102;0m table dropped \033[0m".PHP_EOL;
                if($this->pdo->query((string) $query))
                    return true;
            }else{
                echo $error . PHP_EOL;
            }
        }
    }

    public function rollBack($instance)
    {
       if($this->drop($instance->down())){
            echo "\033[38;2;255;255;0m dropping table ..\033[0m". PHP_EOL;
            echo "\033[38;2;0;102;0m table dropped \033[0m".PHP_EOL;
        }
    }

    public function __destruct()
    {
        unset($this->pdo);
    }
}