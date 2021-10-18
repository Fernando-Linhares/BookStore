
<?php

<<<<<<< HEAD
define("APPNAME", env('appname'));
define('DATABASE',env('database'));
define("USER",env('user'));
define("PASSWORD",env('password'));
=======
define('DATABASE',"book_store");
define("USER","root");
define("PASSWORD","");
>>>>>>> 7f2cf9e0ef36ac7f325e9089133ca14fb2eceae5
define("OPTIONS",[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE=>PDO::CASE_NATURAL,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'
]);
<<<<<<< HEAD
define('DEBUG', env('debug'));
define('PRODUCTION',env('production'));
define('DEVELOPMENT',env('development'));
=======
define('DEBUG', true);
define('PRODUCTION',false);
define('DEVELOPMENT',true);
>>>>>>> 7f2cf9e0ef36ac7f325e9089133ca14fb2eceae5
