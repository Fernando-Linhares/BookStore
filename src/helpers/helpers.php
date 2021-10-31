<?php

include __DIR__.'/database.php';
include __DIR__.'/csrftoken.php';

function view(string $name,$data=null): void
{
    $views = new Application\Mvc\View\ViewLable;
    $views->setView($name)->with($data)->render();
}

function hasAnyUser(): bool
{
    return (new \App\Models\Entity\User)->has();
}

function redirect(string $route)
{
    $fullroute = "location:$route";
    header($fullroute);
}

function regex(): Application\Regex\Regex
{
    return new Application\Regex\Regex;
}


function dd(...$some)
{
    var_dump(...$some);
    die;
}

function is_match(string $pattern, string $input): bool
{
    $regex = new Application\Regex\Regex;
    $regex->setPattern($pattern);
    $regex->setInput($input);
    return $regex->is_match();
}

function get_from_file(string $file, string $key)
{
    $collection  = require getcwd().'/'.$file;
    return $collection[$key];
}

function generate(string $key)
{
    $collection = require '../dbitems.php';
    return $collection[$key];
}

function env($key)
{
    $dotenv = new Application\Dotenv\Dotenv('../.env');
    return $dotenv->getKey($key);
}

function request(): Application\Http\Request\RequestHttp
{
    $request = new Application\Http\HttpContract\Http;
    return $request->getRequest();
}

function path(string $path): string
{
    return URL . $path;
}

function check_password(string $password_from_database, string $password_from_request): bool
{
   $cryptLib = new Application\Cripto\Crypt;
   $password_decrypted = $cryptLib->decrypt($password_from_database);
   return $password_decrypted === $password_from_request;
}

function nonce_regenerate()
{
    $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    return file_put_contents('../temp/nonce',base64_encode($nonce));
}

function temp(string $file)
{
    return file_get_contents('../temp/'.$file);
}