<?php
namespace Application\Router\Request;

use Application\Http\HttpContract\Http;
use Application\Http\HttpContract\HttpInterface;

class Request
{
    private HttpInterface $http;

    public function __construct()
    {
        $this->http = new Http;
    }

    public function has(): bool
    {
        return count($_REQUEST) > 0;
    }

    public function __get($name)
    {
        return $this->http->getRequest()->$name;
    }
}