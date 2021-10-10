<?php

function view(string $name,$data=null)
{
    $views = new Application\Mvc\View\ViewLable;
    $views->setView($name)->with($data)->render();
    die;
}

function regex(string $pattern, string $place)
{
    if(preg_match('/'.$pattern.'/i',$place, $result))
        return current($result);

    return false;
}