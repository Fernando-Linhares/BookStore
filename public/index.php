<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/helpers/helpers.php';
require __DIR__.'/../routes/routes.php';
require __DIR__.'/../config/config.php';

use Application\Main\MvcApp as Kernel;

Kernel::render();

// use Application\Main\Routing\Url;

// $route = '/index/{name}/{age}';

// $url = new Url('/index/fernando/22');
// // $url->convertToRouteRegex($route);
// // echo PHP_EOL;
// // echo $route;
// // echo PHP_EOL;
// print_r($url->getArgs($route));