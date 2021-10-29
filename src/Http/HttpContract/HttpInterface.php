<?php

namespace Application\Http\HttpContract;

use Application\Http\Request\RequestHttp;

interface HttpInterface
{
    public function getRequest(): RequestHttp;
}