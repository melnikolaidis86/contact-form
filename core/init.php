<?php 
//Starting Session
session_start();

//Requiring configuration file
require_once('config/config.php');

//Autoloading classes from library
spl_autoload_register(function($className) {
    include 'libraries/' . $className . '.php';
});

//Requiring vendor files
require_once('vendor/autoload.php');