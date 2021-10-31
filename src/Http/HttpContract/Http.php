<?php
namespace Application\Http\HttpContract;

use Application\Http\Request\RequestHttp;
use Application\Messages\BrowserMessager;
use Application\Messages\ShellMessager;

class Http implements HttpInterface
{
    public function __construct()
    {
        $this->message = new BrowserMessager;
    }

    public function getRequest(): RequestHttp
    {
        $request = new RequestHttp;

        foreach($_REQUEST as $key => $value)
        {
            $request->$key = $request->safe($value);
        }
    
        if(!$request->validate())
           return $this->message->span('ERROR HTTP FORBIDEN');

        return $request;
    }
}