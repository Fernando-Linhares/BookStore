<?php
namespace Application\Mvc\View;

class Component
{
    private string $tag = '';

    private array $attr;

    private string $tagname;

    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function tag($tagname)
    {
        $this->tagname = $tagname;
        return $this;
    }

    public function setAttr(array $attr)
    {
        $this->attr = $attr;
        return $this;
    }

    public function generate()
    {
        $this->tag = "<{$this->tagname} {$this->attr[0]}=\"{$this->attr[1]}\">{$this->content}</{$this->tagname}>";
        return $this;
    }

    public function __toString()
    {
        return $this->generate();
    }
}