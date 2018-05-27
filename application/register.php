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

    //Retrieving all the $_POST variables through the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    //An array to hold all the errors
    $form_errors = array();
    

    //Running Validation for each of the form fields
    $first_name_validation = new Validation($first_name, 'όνομα', array('required' => true, 'maxLength' => 30));
    $last_name_validation = new Validation($last_name, 'επώνυμο', array('required' => true, 'maxLength' => 30));
    $email_validation = new Validation($email, 'e-mail', array('required' => true, 'validateEmail' => true));
    $username_validation = new Validation($username, 'username', array('required' => true, 'maxLength' => 30));
    $password_validation = new Validation($password, 'password', array('required' => true, 'maxLength' => 30));

    //If there are any errors push them into form errors array
    if($first_name_validation->getError()) {
        array_push($form_errors, $first_name_validation->getError());
    }
    if($last_name_validation->getError()) {
        array_push($form_errors, $last_name_validation->getError());
    }
    if($email_validation->getError()) {
        array_push($form_errors, $email_validation->getError());
    }
    if($password_validation->getError()) {
        array_push($form_errors, $password_validation->getError());
    }
    if($password != $password_confirm) {
        array_push($form_errors, 'Το πεδίο password δεν ταιριάζει με το πεδίο confirm password');
    }

    if(empty($form_errors)) {

        $user->register_user($first_name, $last_name, $username, $email, password_hash($password, PASSWORD_DEFAULT));

        redirect(BASE_URI . 'application/login.php', 'Ευχαριστούμε για την εγγραφή σας', 'success');

    } else {

        $_SESSION['form_errors'] = $form_errors;
    }


}

//Display template
echo $template;

//Unsetting session
if(isset($_SESSION['form-errors'])) {

    session_unset($_SESSION['form_errors']);
}

if(isset($_SESSION['message'])) {

    session_unset($_SESSION['message']);
}

if(isset($_SESSION['message_type'])) {

    session_unset($_SESSION['message_type']);
}
