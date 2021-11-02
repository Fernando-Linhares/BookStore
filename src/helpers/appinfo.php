<?php

function appname(): string
{
    $names = explode('_', APPNAME);

    $namesuppercasefirst = array_map(
            function($name){
                return ucfirst($name);
            }
        ,$names);

    $appname = implode(' ',$namesuppercasefirst);

    return $appname;
}