<?php

// parametros generales
define('URL','http://localhost/');
define('USER','root');
define('PASSWORD','root');
define('HOST','root');

define('MAINPUBLIC','main');

define('MAINPRIVATE','private');

//----------------------------------------------
error_reporting(E_ALL);

ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', TRUE);
ini_set('log_errors', TRUE);
ini_set('error_log','logs/php-error_'.date('Ymd').'.log');
//----------------------------------------------

define('CHARSET','utf8mb4');
define('TITLE','Gestion de Personal');

//----------------------------------------------

define("CSSPUB",constant("URL")."public/css/");
define("JSPUB",constant("URL")."public/js/");
define("CSSBOOS",constant("URL")."public/common/bootstrap_5.1.0/");
define('JSPUBCMM',constant('URL').'public/common/js/');


?>