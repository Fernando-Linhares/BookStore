<?php

require __DIR__.'/../config/config.php';
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../helpers/helpers.php';
require __DIR__.'/../routes/routes.php';

use Application\Main\MvcApp;

echo MvcApp::render();
