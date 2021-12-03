<?php
namespace Application\Mvc\View\Contracts;

interface Inclusable
{
    public function include(string $path): void;
}