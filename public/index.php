<?php

/**
 *   Here is where all code of application is rendering.
 * the page root where all dependences is loaded and where
 * is included cofiguration file with constants of used for define
 * passwords and more.
 * 
 *  The main class is the class MvcApp that can be call of kernel
 * for a best understanding.
 * 
 * For more information see documentation
 * github: https://github.com/Fernando-Linhares/BookStore/
 * 
 */

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/helpers/helpers.php';
require __DIR__.'/../routes/routes.php';
require __DIR__.'/../config/config.php';

use Application\Main\MvcApp as Kernel;

Kernel::render();
