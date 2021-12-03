<?php
namespace Application\Mvc\View;

class Compactor
{
    public function __construct(
        private array $data
    ){}

    public function open(): void
    {
        extract($this->data, EXTR_PREFIX_SAME);
    }
}