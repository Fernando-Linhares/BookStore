<?php
namespace Application\Http\Request;

class RequestHttp extends BaseRequest
{
    public function toArray(): array
    {
        unset($this->csrf_token);
        return (array) $this;
    }

    public function __set($name, $value)
    {
        if($name == 'token')
            $this->csrf_token = $value;
        else
            $this->$name = $this->safe($value);
    }

    public function __get($name)
    {
        if($name == 'csrf_token')
            return 'ok';
    }
}