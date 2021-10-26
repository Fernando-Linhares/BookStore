<?php

function view(string $name,$data=null): void
{
    $views = new Application\Mvc\View\ViewLable;
    $views->setView($name)->with($data)->render();
    return;
    
}

function hasAnyUser(): bool
{
    return (new \App\Models\Entity\User)->has();
}

function redirect(string $route)
{
    $fullroute = "location:$route";
    header($fullroute);
}

function regex(): Application\Regex\Regex
{
    return new Application\Regex\Regex;
}

function request(?string $name)
{
    return (object) $_REQUEST[$name];
}

function dd(...$some)
{
    var_dump(...$some);
    die;
}

function migrate(string $migration)
{
    $instance = new $migration;

    echo "\033[38;2;255;255;0m migrating ... \033[0m" . $migration . PHP_EOL;

    $access = new Application\Database\AccessToDatabase;

    if(!$access->migrate($instance)) die("error on migration");
    
    echo "\033[38;2;0;102;0m migrated successfully migration!\033[0m". PHP_EOL;   
}

function seed(string $seeder){
    
    $instance = new $seeder(new Application\Database\AccessToDatabase);
   try{
       $instance->update();
   }catch(Exception $excpt)
   {
       $msg = $excpt->getMessage();
    
       if(isset($msg)) die('error on seeding .. '.$msg);
   }
   echo "\033[38;2;0;102;0m seeded successfully!\033[0m". PHP_EOL; 
   die;
}

function call_down(string $classname)
{
    $access = new Application\Database\AccessToDatabase;

    $instance = new $classname;
    $access->rollBack($instance);
}

function is_match(string $pattern, string $input): bool
{
    $regex = new Application\Regex\Regex;
    $regex->setPattern($pattern);
    $regex->setInput($input);
    return $regex->is_match();
}

function get_from_file(string $file, string $key)
{
    $collection  = require getcwd().'/'.$file;
    return $collection[$key];
}

function env($key)
{
    $dotenv = new Application\Dotenv\Dotenv('../.env');
    return $dotenv->getKey($key);
}