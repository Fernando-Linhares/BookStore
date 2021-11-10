<?php
namespace Application\Http\HttpContract;

use Application\Http\Request\RequestHttp;
use Application\Messages\BrowserMessager;

class Http implements HttpInterface
{
    private BrowserMessager $message;

    public function __construct()
    {
        $this->message = new BrowserMessager;
    }

    public function getRequest(): ?RequestHttp
    {
        if(!isset($_REQUEST['token']))
            return $this->message->span('ERROR HTTP FORBIDEN EXPECTED TOKEN');

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