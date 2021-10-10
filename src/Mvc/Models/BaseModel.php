<?php
namespace Application\Mvc\Models;

use Application\Database\QueryBuilder;
use stdClass;

abstract class BaseModel
{
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