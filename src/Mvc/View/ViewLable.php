<?php

namespace Application\Mvc\View;

trait ViewLable
{
    public function view(string $name): string
    {
        return file_get_contents('views/'.$name.'-view.php');
    }
}