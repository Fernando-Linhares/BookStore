<?php
namespace Application\Router\Url;

interface FactoryRegexInterface
{
    public function getRegex(): MatchAble;
}