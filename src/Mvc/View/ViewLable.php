<?php

namespace Application\Mvc\View;

class ViewLable
{
    private const DEPENDECES = [
        FrontEnd::CSSFRAMEWORK,
        FrontEnd::JSLIB,
        FrontEnd::ICONS,
        FrontEnd::JS,
        FrontEnd::CSS
    ];

    public string $content;
    public string $title;
    private string $viewname;

    public function setView(string $name): self
    {
        $this->viewname = '../app/views/'.$name.'-view.php';
        return $this;
    }

    public function getView(): string
    {
        return $this->viewname;
    }

    public function render()
    {
        return include $this->getView();
    }

    public function with($data): self
    {
        if(isset($data))
            foreach($data as $key =>$value)
                $this->$key = $value;

        return $this;
    }

    public function __get($name)
    {
        return htmlentities($this->$name);
    }

    public function include(string $name)
    {
        include '../app/views/'.$name.'-view.php';
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