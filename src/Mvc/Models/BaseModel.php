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

    public function has(): bool
    {
        return $this->getAccessInstance($this->table)->hasOne();
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

    public function with(string $foreign_key)
    {
        $all = $this->all();
        $table = substr($foreign_key,0,-3).'s';
        $classname = '\\App\\Models\\Entity\\'.ucfirst(substr($table,0,-1));

        return array_map(
            function($item)use($foreign_key, $table, $classname){
                $attr = substr($table,0,-1);
                $item->$attr = $this->getAccessInstance($table)->find($item->$foreign_key, $classname);
                return $item;
                }
        ,$all);
       
    }

    public function getQueryBuilder(string $table)
    {
        return new QueryBuilder($table);
    }
}