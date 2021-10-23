<?php

namespace Application\Mvc\Controllers;

abstract class BaseController
{
    public function getRepository(string $name)
    {
       $repository = $this->getName($name);
       return new $repository;
    }

    private function getName(string $name)
    {
        $namespace = 'App\\Models\\Repositories\\';
        return $namespace.(ucfirst($name)).'Repository';
    }
}