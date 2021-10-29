<?php

namespace Application\Http\HttpContract;

use Application\Http\Request\RequestHttp;
use Exception;

class Http implements HttpInterface
{
    public function getRequest(): RequestHttp
    {
        $request = new RequestHttp;

        foreach($_REQUEST as $key => $value)
        {
            $request->$key = $value;
        }

        if(!$request->validate())
            die('csrf-token-less');

        return $request;
    }
}