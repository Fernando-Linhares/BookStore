<?php
namespace Application\Router\Url;

class FactoryRegex implements FactoryRegexInterface
{
    public function getRegex(): MatchAble
    {
        return new RegexDefault;
    }
}