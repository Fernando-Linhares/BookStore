<?php

function view(string $name,$data=null): void
{
    $views = new Application\Mvc\View\ViewLable;
    $views->setView($name)->with($data)->render();
    return;
    
}

function regex(): Application\BookStoreLibs\Regex
{
    return new Application\BookStoreLibs\Regex;
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

    $access = new Application\Database\AccessToDatabase(null);
    if(!$access->migrate($instance))
        die('error on migration');
    
    echo "\033[38;2;0;102;0m migrated successfully migration!\033[0m". PHP_EOL;   
}

function is_match(string $pattern, string $input): bool
{
    $regex = new Application\BookStoreLibs\Regex;

    $regex->setPattern($pattern);
    $regex->setInput($input);

    return $regex->is_match();
}
