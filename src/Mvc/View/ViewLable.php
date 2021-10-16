<?php

namespace Application\Mvc\View;

class ViewLable
{
    private const DEPENDECES = [
        FrontEnd::BOOTSTRAP,
        FrontEnd::JS,
        FrontEnd::CSS
    ];

    public string $content;
    public string $title;
    private string $viewname;

    public function setView(string $name): self
    {
        $this->viewname = '../views/'.$name.'-view.php';
        return $this;
    }

    public function getView(): string
    {
        return $this->viewname;
    }

    public function render()
    {
        $this->content = include $this->getView();
        return;
    }

    public function with($data): self
    {
        $this->data = (object) $data;
        return $this;
    }

    public function include(string $name)
    {
        include '../views/'.$name.'-view.php';
    }

    public function getComponent(ContractComponent $component)
    {
        return $component->render();
    }

    public function getDependences()
    {
        foreach(self::DEPENDECES as $dependences)
            echo $dependences;
    }

    public function __toString()
    {
        return $this->content;
    }
}