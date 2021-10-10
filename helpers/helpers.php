<?php


function route(string $route, array $param): string
{
    $url = new Application\Main\Routing\Url($route);
    $url->addParm($param);
    return $url;
}

function query_string($route)
{
    $url = new Application\Main\Routing\Url($route);

    return $url->queryString()->get();
}