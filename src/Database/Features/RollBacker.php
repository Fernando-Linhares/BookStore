<?php
namespace Application\Database\Features;

use Application\Database\Migration\Migrable;

class RollBacker
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function rollBack(Migrable $migration): bool
    {
        if($this->pdo->query($migration->down())) return true;

        return false;
    }
}