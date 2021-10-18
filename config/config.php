
<?php

define("APPNAME", env('appname'));
define('DATABASE',env('database'));
define("USER",env('user'));
define("PASSWORD",env('password'));
define("OPTIONS",[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE=>PDO::CASE_NATURAL,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'
]);
define('DEBUG', env('debug'));
define('PRODUCTION',env('production'));
define('DEVELOPMENT',env('development'));