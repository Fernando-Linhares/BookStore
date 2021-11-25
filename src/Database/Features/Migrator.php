<?php
namespace Application\Database\Features;

use Application\Database\Migration\Migrable;
use Application\Messages\ShellMessager;
use Exception;

class Migrator
{
    private \PDO $pdo;
    private ShellMessager $message;

    public function __construct(\PDO $pdo)
    {
        $this->message = new ShellMessager;
        $this->pdo = $pdo;
    }

    public function migrate(Migrable $migration): bool
    {
        try{
            $query = $migration->up();
            $downfirst = $migration->down();
    
            $statementdown = $this->pdo->prepare($downfirst);
            $statementup = $this->pdo->prepare($query);
    
            if($statementdown->execute())
                return $statementup->execute();
            else
                throw new Exception("Error on $query");

        }catch(\Exception $exception){
            $this->message->danger($exception->getMessage()."\t query -> $query");
        }catch(\PDOException $pdoException){
            $this->message->danger($pdoException->getMessage());
        }
        return 0;
    }
}