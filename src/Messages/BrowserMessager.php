<?php
namespace Application\Messages;

class BrowserMessager
{
    public function span(string $text)
    {
        return view('error/span', ['message'=>$text]);
    }
}