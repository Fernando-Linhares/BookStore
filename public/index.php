<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/helpers/helpers.php';
require __DIR__.'/../routes/routes.php';
require __DIR__.'/../config/config.php';

use Application\Main\MvcApp as Kernel;

Kernel::render();
