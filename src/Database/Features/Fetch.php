<?php
namespace Application\Database\Features;

class Fetch
{
    private \PDOstatement $statement;

    public function __construct(\PDOstatement $statement)
    {
        $this->statement = $statement;
    }

    public function fetchAssoc()
    {
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchOne(string $classname)
    {
        return current($this->fetchClass($classname));
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }

    public function fetchObj()
    {
        return $this->statement->fetch(\PDO::FETCH_OBJ);
    }

    public function fetchClass(string $classname)
    {
        return $this->statement->fetchAll(\PDO::FETCH_CLASS, $classname);
    }
}