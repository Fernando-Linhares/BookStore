<?php
namespace Application\Mvc\View;

class CardsComponent implements ContractComponent 
{
    public $data;

    public Component $component;

    public function __construct($data)
    {
        $this->data = $data->title;
    }

    public function render()
    {
        $component = new Component($this->data);
        $component->tag('div')->setAttr(['class','card card-body']);
        return (string)$component;
    }
}