<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php'); 

//Get template and assign variables
$template = new Template('templates/contact-form.php');

//Assign variables
$template->title = "ΕΠΙΚΟΙΝΩΝΙΑ";
$template->active_page = "contact";
$template->categories = get_all_categories();

//Display template
echo $template;

