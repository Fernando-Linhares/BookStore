<?php
function access(string $table=null): Application\Database\AccessToDatabase
{
    return (new Application\Database\Access\Access)->getAccess($table);
}

function seed(string $seeder){
    
    $message = new Application\Messages\ShellMessager;
    $instance = new $seeder;

    $message->primary('seeding ..');

   try{
       $instance->update();
    }catch(Exception $excpt){    
        $message->danger("error on seed\n{$excpt->getMessage()}"); die;
    }

   $message->success("seeded successfully"); die;
}

function call_down(string $classname)
{
    $access = new Application\Database\Access\Access;
    $instance = new $classname;
    $message = new Application\Messages\ShellMessager;

    $message->warnning('rolling back migration');

    $rollbackResult = $access->getAccess()->rollBack($instance);

    if($rollbackResult)
        $message->success("rollback migration successfully");
    else
        $message->danger('error on rolling back');
}

function migrate(string $migration)
{
    $message = new Application\Messages\ShellMessager;
    $access = new Application\Database\Access\Access;
    $instance = new $migration;

    $message->primary("Migrating ... $migration");

    $migrateResult = $access->getAccess()->migrate($instance);

    if($migrateResult) 
        $message->success('Migration migrated successfuly');
    else
        $message->danger('Error on migrate');
    
}