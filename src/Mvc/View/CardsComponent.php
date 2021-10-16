<?php
namespace Application\Mvc\View;

class CardsComponent implements ContractComponent 
{
    public $data;

    public Component $component;

    public function __construct($data)
    {
        $this->component = new Component;
        $this->data = $data;
    }

    public function render()
    {
        return $this->component
        ->startTag('div')
        ->setClass('card card-border')
        ->startTag('div')
        ->setClass('card-title')
        ->setContent($this->data->title)
        ->endTag()
        ->startTag('div')
        ->setClass('card card-body')
        ->startTag('img')
        ->setSrc($this->data->image)
        ->setContent($this->data->description)
        ->endTag()
        ->endTag();
    }
}