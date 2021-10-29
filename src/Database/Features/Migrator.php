<?php
namespace Application\Database\Features;

use Application\Database\Migration\Migrable;

class Migrator
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function migrate(Migrable $migration): bool
    {
        $query = $migration->up();
        $downfirst = $migration->down();

        $statementdown = $this->pdo->prepare($downfirst);
        $statementup = $this->pdo->prepare($query);

        if($statementdown->execute())
            return $statementup->execute();
        else
            return false;
    }
}