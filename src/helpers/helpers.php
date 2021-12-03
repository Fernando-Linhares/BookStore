<?php

use Application\Mvc\View\Compactor;

include __DIR__.'/appinfo.php';
include __DIR__.'/database.php';
include __DIR__.'/csrftoken.php';

function view(string $name,$data=null): Application\Mvc\View\View
{
    $views = new Application\Mvc\View\View;
    $views->setAddress($name);

    $views->with($data);
    
    return $views;
}

function middlewares(): array
{
    return include '../config/middlewares.php';
}

function route(string $route, null|int|string $parameter=null)
{
    if(is_null($parameter))
        return URL.$route;

    return URL .$parameter.'/'.$route;
}

function assets($file): string
{
    return URL.$file;
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
    return password_verify($password_from_request, $password_from_database);
}

function nonce_regenerate()
{
    $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    return file_put_contents('../temp/nonce',base64_encode($nonce));
}

function temp(?string $file=null)
{
    return file_get_contents('../temp/'.$file);
}

function render(string $view, Compactor $data): void
{
    if($data->has()){
       $data = $data->open();
       extract($data, EXTR_PREFIX_SAME, 'app');
    }

    include $view;
}

function import(string $name, mixed $data=null): void
{
    $data = new Compactor($data);
    $name = "../app/views/$name.php";
    render($name, $data);
}

function dependences(): void
{
    foreach(DEPENDENCES as $dependence)
        echo $dependence;
}