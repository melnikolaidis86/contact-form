<?php 
//Starting Session
session_start();

//Requiring configuration file
require_once(__DIR__ . '/config/config.php');

//Autoloading classes from library
spl_autoload_register(function($className) {
    
    include __DIR__ . '/libraries/' . $className . '.php';
});

//Requiring vendor files
require_once('vendor/autoload.php');
