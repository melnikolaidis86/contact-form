<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php');

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

    //Requiring appopriate model for current page

    //Creating instance of the Admin model class

    //Get template and assign variables
    $template = new Template('templates/admin-page.php');

    //Assign variables
    $template->title = "ΔΙΑΧΕΙΡΗΣΗ";
    $template->no_navigation = true;

    //Display template

    echo $template;
} else {

    redirect(BASE_URI . 'application/login.php');
}


