<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('core/init.php'); 

//Get template and assign variables
$template = new Template('templates/modules/contact-form.php');

//Assign variables
$template->title = "Contact Form";

//Display template
echo $template;

$field = '';

$form_validation = new Validation($field, 'username', array('required' => true));

$form_validation->validate();

print_r($form_validation->errors);


