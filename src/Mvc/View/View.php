<?php

namespace Application\Mvc\View;

use Application\Mvc\View\Compactor;

class View implements Contracts\ViewLable
{
    private string $address;

    private Compactor $data;

    public function setAddress(string $name): void
    {
        $this->address = '../app/views/'.$name.'-view.php';
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function with($data): self
    {
        $this->data = new Compactor($data);
        return $this;
    }

    public function getData(): Compactor
    {
        return $this->data;
    }
}