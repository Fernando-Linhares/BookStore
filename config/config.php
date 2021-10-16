
<?php

define('DATABASE',"book_store");
define("USER","fernando");
define("PASSWORD","F3rnand0");
define("OPTIONS",[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE=>PDO::CASE_NATURAL,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'
]);
define('DEBUG', true);
define('PRODUCTION',false);
define('DEVELOPMENT',true);