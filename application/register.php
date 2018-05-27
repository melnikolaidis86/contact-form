<?php

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php');

//Requiring appopriate model for current page
require_once('../system/models/User.php');

//Creating instance of the User model class
$user = new User();

//Get template and assign variables
$template = new Template('templates/register-form.php');

//Assign variables
$template->title = "ΕΓΓΡΑΦΗ";
$template->no_navigation = true;

if(isset($_POST['register'])) {

    $user->register_user($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['email'], $_POST['password']);

}

//Display template
echo $template;