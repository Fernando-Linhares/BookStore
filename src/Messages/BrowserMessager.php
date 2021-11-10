<?php
namespace Application\Messages;

class BrowserMessager
{
    public function span(string $text)
    {
        return die(view('error/span', ['message'=>$text]));
    }
}