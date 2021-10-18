<?php
namespace Application\Database\Seeders;

use Application\Database\AccessToDatabase;

abstract class Seeder
{
    public function seed(object $entity,AccessToDatabase $access)
    {
        $access->create($entity);
    }

    public abstract function update();
}