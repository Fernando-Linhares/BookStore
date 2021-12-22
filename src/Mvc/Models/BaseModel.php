<?php
namespace Application\Mvc\Models;

use Application\Database\Access\Access;
use Application\Database\QueryBuilder;
use PDOStatement;
use stdClass;

abstract class BaseModel
{
    public string $table;
    
    public function save()
    {
        return $this->getAccessInstance($this->table)->create($this);
    }

    public function where(string $key, string $value)
    {
        return $this->getAccessInstance($this->table)->where($key,$value,get_class($this));
    }

    public function getAccessInstance($table)
    {
        return (new Access)->getAccess($table);
    }

    public function has(): bool
    {
        return $this->getAccessInstance($this->table)->hasOne();
    }

    public function count(): int
    {
        return $this->getAccessInstance($this->table)->count();
    }

    public function join(string $nameEntity)
    {   
        return $this->getAccessInstance($this->table)->join($nameEntity);
    }

    public function all()
    {
        return $this->getAccessInstance($this->table)->all(get_class($this));
    }

    public function find(int $id)
    {
        return $this->getAccessInstance($this->table)->find($id,get_class($this));
    }

    public function findOn(int $id, string $classname)
    {
        return $this->getAccessInstance($this->table)->find($id, $classname);
    }

    /**
     * verify if the instance exists on database
     */
    public function exists()
    {
        $this->getAccessInstance($this->table)->findSome($this);
    }

    public function make(\PDO $pdo): PDOStatement
    {
        $loaded = $this->load();
        $query =  $this
        ->getQueryBuilder($loaded->entity->table)
        ->insert($loaded->attrs);
        $app = $pdo->prepare($query);
        foreach($loaded->attrs as $key=>$value){        
            $app->bindValue(':'.$key,$value);
        }
        return $app;
    }

    public function load()
    {
        $loaded = new stdClass();
        $loaded->entity = $this;
        $attrs = (array) $this;
        unset($attrs['table']);
        unset($attrs['id']);
        $loaded->attrs = $attrs;
        $loaded->values = array_values($attrs);
        return $loaded;
    }

    public function getLast()
    {
        $all = $this->getAccessInstance($this->table)->all(get_class($this));
        $count =  $this->count();
        $count--;
        return $all[$count];
    }

    public function getQueryBuilder(string $table)
    {
        return new QueryBuilder($table);
    }
}