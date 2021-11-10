<?php
namespace Application\Router\Url;

interface MatchAble
{
    public function match(string $base, string $value): bool;
}