<?php
include 'database.php';

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

function generate(string $key)
{
    $collection = require '../dbitems.php';
    return $collection[$key];
}

function env($key)
{
    $dotenv = new Application\Dotenv\Dotenv('../.env');
    return $dotenv->getKey($key);
}