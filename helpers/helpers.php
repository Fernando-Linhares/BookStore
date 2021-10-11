<?php

function view(string $name,$data=null)
{
    $views = new Application\Mvc\View\ViewLable;
    $views->setView($name)->with($data)->render();
    die;
}

function regex(string $pattern, string $place)
{
    return preg_match('/'.$pattern.'/i',$place, $result) === 1;
}

function request(?string $name)
{
    return (object) $_REQUEST[$name];
}