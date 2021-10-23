<?php
namespace Application\Mvc\Models;

use Application\Database\AccessToDatabase;
use Application\Database\QueryBuilder;
use stdClass;

abstract class BaseModel
{
    public string $table;

    public function save()
    {
        return $this->getAccessInstance($this->table)->create($this);
    }

    public function getAccessInstance($table)
    {
        return new AccessToDatabase($table);
    }

    public function all()
    {
        return $this->getAccessInstance($this->table)->all(get_class($this));
    }

    public function find(int $id)
    {
        return $this->getAccessInstance($this->table)->find($id);
    }

    public function make(\PDO $statemant)
    {
        $loaded = $this->load();
        $query =  $this
        ->getQueryBuilder($loaded->entity->table)
        ->insert($loaded->attrs);
        $app = $statemant->prepare($query);
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

    public function getQueryBuilder(string $table)
    {
        return new QueryBuilder($table);
    }
}