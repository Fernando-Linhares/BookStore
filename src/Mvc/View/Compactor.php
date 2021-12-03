<?php

namespace Application\Mvc\View;

class Compactor
{
    public function __construct(
        private ?array $data=null
    ){}

    public function open()
    {
        return $this->data;
    }

    public function has(): bool
    {
        return isset($this->data);
    }
}