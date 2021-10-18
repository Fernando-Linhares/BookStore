<?php
namespace Application\Database\Migrations;

abstract class Migration
{
    protected string $query = '';

    protected string $foreignkey;

    protected string $table;

    public abstract function up();

    public abstract function down();

    public function table(string $table)
    {
        $this->table = $table;   
        $this->query .= "CREATE TABLE $table ";
        return $this;
    }

    public function id()
    {
        $this->query .= '(id SERIAL NOT NULL,';
        return $this;
    }

    public function boolean(string $col)
    {
        $this->query .= "$col BOOLEAN NOT NULL,";
        return $this;
    }

    public function text(string $col)
    {
        $this->query .= "$col TEXT NOT NULL,";
        return $this;
    }

    public function timestamp(string $col)
    {
        $this->query .= "$col TIMESTAMP NOT NULL,";
        return $this;
    }

    public function string(string $col, ?int $len=null)
    {
        $value = is_null($len) ? '255' : (string) $len;
        $this->query .= "$col VARCHAR($value)NOT NULL,";
        return $this;
    }

    public function decimal(string $col, int $scala, int $len)
    {
        $this->query .= "$col DECIMAL(".
        ($scala?(string)$scala:'1')
        .",".
        ($len?(string)$len:'1')
        .") NOT NULL,";
        return $this;
    }

    public function int(string $col)
    {
        $this->query .= "$col INT NOT NULL,";
        return $this;
    }

    public function date(string $col)
    {
        $this->query .= "$col DATE NOT NULL,";
        return $this;
    }

    public function datetime(string $col)
    {
        $this->query .= "$col DATETIME NOT NULL,";
        return $this;
    }

    public function float(string $col,string $scala, string $len)
    {
        $this->query .= "$col FLOAT($scala,$len) NOT NULL,";
        return $this;
    }

    public function relation(string $foreignkey)
    {
        $table = substr($foreignkey,0,-3);

        if(is_match('[a-z0-9]y$',$table)){
           $table = substr($table,0,-1);
           $table .= 'ies';
        }
        else{
            $table .= 's';
        }
    
        $this->query .= "FOREIGN KEY ($foreignkey) REFERENCES $table (id),";
        return $this;
    }

    public function create()
    {
        $this->query .= ' PRIMARY KEY(id))';
        return $this;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function __toString()
    {
        return $this->query;
    }

}