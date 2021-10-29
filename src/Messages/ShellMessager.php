<?php
namespace Application\Messages;

class ShellMessager
{
    public function success(string $text): void
    {
        echo "\e[32m$text\e[39m\n";
    }

    public function danger(string $text): void
    {
        echo "\e[31m$text\e[39m\n";
    }

    public function warnning(string $text): void
    {
        echo "\e[33m$text\e[39m\n";   
    }

    public function primary(string $text): void
    {
        echo "\e[34m$text\e[39m\n";
    }
}