<?php

require __DIR__.'/../config/config.php';
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../helpers/helpers.php';
require __DIR__.'/../routes/routes.php';

use Application\Main\MvcApp as Kernel;

echo Kernel::render();

// use Application\Main\Routing\Url;

// $url = new Url('/ola/{name}');
// var_dump($url->getArgs('/ola/fernando'));