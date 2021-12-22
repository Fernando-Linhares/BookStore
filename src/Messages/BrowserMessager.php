<?php
namespace Application\Messages;

class BrowserMessager
{
    public function span(string $text)
    {
        $view = view('error/span', ['message'=>$text]);

        return die(render($view->getAddress(), $view->getData()));
    }
}