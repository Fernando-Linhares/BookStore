<?php

namespace Application\Http\HttpContract;

use Application\Http\Request\RequestHttp;
use Application\Messages\BrowserMessager;

interface HttpInterface
{
    public function getRequest(): ?RequestHttp;
}