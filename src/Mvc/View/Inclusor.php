<?php
namespace Application\Mvc\View;

class Inclusor implements Contracts\Inclusable
{
    public function include(string $path): void
    {
        include $path;
    }
}