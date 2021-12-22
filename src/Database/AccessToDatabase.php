<?php
namespace Application\Database;

use Application\Database\Features\All;
use Application\Database\Features\Deleter;
use Application\Database\Features\Finder;
use Application\Database\Features\Migrator;
use Application\Database\Features\Creator;
use Application\Database\Features\Has;
use Application\Database\Features\RollBacker;
use Application\Database\Features\Updator;
use Application\Database\Features\Joiner;

class AccessToDatabase
{
    private Finder $finder;
    private Deleter $deleter;
    private Creator $creator;
    private Updator $updator;
    private Migrator $migrator;
    private RollBacker $rollbacker;
    private All $all;
    private Has $has;
    private Joiner $joiner;

    public function __construct(?string $table=null)
    {
        if(empty($table))
            $table = 'postgres';
    
        $this->finder = new Finder($this->getPdo(), $table);
        $this->deleter = new Deleter($this->getPdo(), $table);
        $this->creator = new Creator($this->getPdo());
        $this->updator = new Updator($this->getPdo(), $table);
        $this->migrator = new Migrator($this->getPdo(), $table);
        $this->rollbacker = new RollBacker($this->getPdo(), $table);
        $this->all = new All($this->getPdo(), $table);
        $this->has = new Has($this->getPdo(), $table);
        $this->joiner = new Joiner($this->getPdo(), $table);
    }

    public function getPdo(): \PDO
    {
        return PdoSingleton::getPdo(); 
    }

    public function find(int $id, string $classname): ?object
    {
        return $this->finder->find($id, $classname);
    }

    public function join(string $table)
    {
        return $this->joiner->join($table);
    }
    
    public function where(string $col, string $value, string $classname)
    {
        return $this->finder->findWhere($col, $value, $classname);
    }

    public function findSome(object $instance)
    {
        return $this->Has->hasThis($instance);
    }

    public function delete(int $id): bool
    {
       return  $this->deleter->delete($id);
    }
    
    public function all(string $classname): ?array
    {
        return $this->all->getAll($classname);
    }

    public function count(): int
    {
        return $this->all->count();
    }

    public function hasOne()
    {
        return $this->has->hasOne();
    }

    public function update(string $col, string $row, int $id): bool
    {
        return $this->updator->update($col,$row,$id);
    }

    public function create(object $entity): bool
    {
        return $this->creator->create($entity);
    }

    public function migrate(object $migration)
    {
        return $this->migrator->migrate($migration);
    }

    public function rollBack($instance)
    {
       return $this->rollbacker->rollBack($instance);
    }
}