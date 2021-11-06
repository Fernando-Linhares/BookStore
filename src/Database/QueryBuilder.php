<?php
namespace Application\Database;

class QueryBuilder
{
    private string $query = "";

    private array $operation = [
        "INSERT INTO ",
        "SELECT ",
        "UPDATE ",
        "DELETE FROM "
    ];

    public string $table;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function insert(array $data): self
    {
        foreach(array_keys($data) as $key){
            $placeholders[] = ':'.$key;
        }
        $parms = implode(',', $placeholders);
        $cols = implode(',', array_keys($data));

        $this->query .= $this->operation[0] . $this->table.'('.$cols.')'
        .' VALUES '.'('.$parms.')';
        return $this;
    }


    public function select(string $cols): self
    {
        $this->query .= $this->operation[1].$cols.' FROM '.$this->table;
        return $this;
    }

    public function delete(string $id): self
    {
        $this->query .= $this->operation[3].' '.$this->table.' ';
        $this->where("id = $id");
        return $this;
    }

    public function update(string $col,string $id): self
    {
        $this->query .= $this->operation[2].$this->table.' SET '.$col;
        $this->where("id = $id");
        return $this;
    }

    public function where(string $val): self
    {
        $this->query .= ' WHERE '.$val;
        return $this;
    }

    public function join(string $table, string $on): self
    {
        $this->query .= ' INNER JOIN '.$table.' ON '.$on;
        return $this;
    }

    public function orderDesc()
    {
        $this->query .= ' ORDER BY id DESC';
        return $this;
    }

    public function orderAsc()
    {
        $this->query .= ' ORDER BY id ASC';
        return $this;
    }

    public function limit(int $limit, int $offset)
    {
        $this->query .= " LIMIT $limit OFFSET $offset";
        return $this;
    }

    public function __toString()
    {
        return $this->query;
    }

}