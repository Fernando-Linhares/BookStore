<?php

namespace Application\Main\Routing;

class Url
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    

    public function __toString()
    {
        return $this->content;
    }
}