<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php');

print_r($_SESSION);

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

    //Requiring appopriate model for current page

    //Creating instance of the Post model class

    //Get template and assign variables

    //Assign variables

    //Display template
} else {

    redirect(BASE_URI . 'application/login.php');
}


