<?php 
//Starting Session
session_start();

//Autoloading classes from src library
spl_autoload_register(function($className) {
    
    include __DIR__ . '/libraries/src/' . $className . '.php';
});

//Loading helper scripts
require_once (__DIR__ . '/helpers/' . 'format_helper.php');

//Requiring configuration file
require_once(__DIR__ . '/config/config.php');

//Requiring vendor files
require_once('vendor/autoload.php');
