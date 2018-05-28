<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php');

//Destroy Session for login
if(isset($_SESSION['logged_in'])) {

    session_unset($_SESSION['logged_in']);
    session_destroy();

    redirect(BASE_URI . 'application/login.php');
}