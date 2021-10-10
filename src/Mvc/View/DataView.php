<?php
namespace Application\Mvc\View;

class DataView
{
    private array $data;

    public function __construct($data=null)
    {
        $this->data = (array) $data;
    }

    public function map(\Closure $closure)
    {
        return array_map($closure(), $this->data);
    }
    
    public function filter(\Closure $closure)
    {
        return array_map($closure(),$this->data);
    }
}