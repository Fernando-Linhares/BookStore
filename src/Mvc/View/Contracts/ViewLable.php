<?php
namespace Application\Mvc\View\Contracts;

interface ViewLable
{
    public function setAddress(string $name): void;

    public function getAddress(): string;

    public function with($data): self;

    public function getData(): \Application\Mvc\View\Compactor;
}