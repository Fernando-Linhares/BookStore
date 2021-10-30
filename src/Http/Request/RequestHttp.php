<?php
namespace Application\Http\Request;

class RequestHttp extends BaseRequest
{
    public function __set($name, $value)
    {
        if($name == 'token')
            $this->csrf_token = $value;
        else
            $this->$name = $value;
    }
}