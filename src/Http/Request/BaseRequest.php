<?php

namespace Application\Http\Request;

abstract class BaseRequest
{
    protected string $csrf_token;

    public function validate()
    {
        return base64_decode($this->csrf_token) == 'anomatopeia';
    }
}