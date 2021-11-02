<?php

namespace Application\Mvc\Controllers;

abstract class BaseController
{
    public function getRepository(string $name)
    {
       $repository = $this->getName($name);
       return new $repository;
    }

    private function getName(string $entityName)
    {
        $entity = new $entityName;
        $name = substr($entity->table,0,-1);
        $namespace = 'App\\Models\\Repositories\\';
        return $namespace.(ucfirst($name)).'Repository';
    }
}