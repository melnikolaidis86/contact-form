<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php');

//Requiring appopriate model for current page

//Creating instance of the Post model class

//Get template and assign variables
$template = new Template('templates/login-form.php');

//Assign variables
$template->title = 'Login';

//Display template
echo $template;