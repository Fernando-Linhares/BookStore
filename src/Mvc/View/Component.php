<?php
namespace Application\Mvc\View;

class Component
{
    private array $tagname;
    private string $tag = '';

    public function setClass(string $classname)
    {
        $this->tag .= ' class="'.$classname.'">';
        return $this;
    }

    public function setId(string $idname)
    {
        $this->tag .= ' id="'.$idname.'"';
        return $this;
    }

    public function setSrc(string $srcname)
    {
        $this->tag .= ' src="'.$srcname.'">';
        return $this;
    }

    public function startTag(string $tagname){
        $this->tagname[] = $tagname;
        $this->tag .= '<'.$tagname;
        return $this;
    }

    public function setContent($content)
    {
            $this->tag .= $content;
        return $this;
    }
    public function endTag()
    {
        $len = count($this->tagname);
        if($len>1)
            $this->tag .= '</'.$this->tagname[--$len].'>';
        else
            $this->tag .= '</'.current($this->tagname).'>';
        return $this;
    }

    public function __toString()
    {
        return $this->tag;
    }
}