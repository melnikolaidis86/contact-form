<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php'); 

//Get template and assign variables
$template = new Template('templates/front-page.php');

//Assign variables
$template->title = "ΑΡΧΙΚΗ";
$template->active_page = "homepage";

//Display template
echo $template;
