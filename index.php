<?php

define('VERSION', '1.0.0');
define('DS', DIRECTORY_SEPARATOR); 
define('ROOT', realpath(dirname(__FILE__)) . DS); 


require_once('config/autoload.php');
config\autoload::run();



$request = new config\request();
config\routes::run($request);

?>