<?php

namespace Application\Mvc\View;

class ViewLable extends BaseView
{

    public string $content;

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

    public function render(): self
    {
        $this->content = include $this->getView();
        return $this;
    }

    public function with($data): self
    {
        $this->data = (object) $data;
        return $this;
    }

    public function __toString()
    {
        return $this->content;
    }

}