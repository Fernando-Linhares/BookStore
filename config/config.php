<?php

define("APPNAME", env('appname'));
define('DATABASE',env('database'));
define("USER",env('username'));
define("PASSWORD",env('password'));
define("OPTIONS",[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE=>PDO::CASE_NATURAL,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
]);
define('DEBUG', env('debug'));
define('PRODUCTION',env('production'));
define('DEVELOPMENT',env('development'));
define('URL','http://localhost:8000/');
define('KEY',env('key'));
define('NONCE',temp('nonce'));
define('TEMP_PATH', path('temp/'));
define('VOID_STRING', '');
define('DEPENDENCES', [
    Application\Mvc\View\FrontEnd::CSSFRAMEWORK,
    Application\Mvc\View\FrontEnd::JSLIB,
    Application\Mvc\View\FrontEnd::JS,
    Application\Mvc\View\FrontEnd::CSS,
    Application\Mvc\View\FrontEnd::ICONS
]);