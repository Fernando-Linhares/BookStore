<?php

namespace Application\Http\Request;

abstract class BaseRequest
{
    protected string $csrf_token;

    public function validate()
    {
        return verify_token($this->csrf_token);
    }

    public function safe(string $input): string
    {
        return $this->clear($input);
    }

    private function clear(string $input)
    {
        $message = new \Application\Messages\BrowserMessager;

        if(is_match('(.*?[=|;].*)',$input))
            return $message->span('ERROR WHAT YOU WANTING DO? ('. $input.')');

        return htmlspecialchars($input);
    }
}