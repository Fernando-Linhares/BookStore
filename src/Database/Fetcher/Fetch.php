<?php
namespace Application\Database\Fetcher;


class Fetch
{
    private \PDOstatement $statement;

    public function __construct(\PDOstatement $statement)
    {
        $this->statement = $statement;
    }

    public function fetchAssoc()
    {
        return $this->statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchOne()
    {
        return $this->statement->fetch();   
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