<?php

namespace Application\Http\Request;

abstract class BaseRequest
{
    protected string $csrf_token;

    public function validate()
    {
        return verify_token($this->csrf_token);
    }
}