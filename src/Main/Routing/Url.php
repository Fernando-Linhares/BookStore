<?php

namespace Application\Main\Routing;

class Url
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function get()
    {
        return $this;
    }

    public function addParm(array $param)
    {
        $key = current(array_keys($param));
        $value = current(array_values($param));
        $this->content .= "?$key=$value";
    }

    public function queryString()
    {
        $this->content .= '?'.$_SERVER['QUERY_STRING'];
        return $this;
    }

    public function __toString()
    {
        return $this->content;
    }
}