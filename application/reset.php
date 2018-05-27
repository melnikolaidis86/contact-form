<?php

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php');

//Requiring appopriate model for current page
require_once('../system/models/User.php');

//Creating instance of the User model class
$user = new User();

//Get template and assign variables
$template = new Template('templates/reset-password.php');

//Assign variables
$template->title = "ΕΠΑΝΑΦΟΡΑ ΚΩΔΙΚΟΥ ΠΡΟΣΒΑΣΗΣ";
$template->no_navigation = true;

if(isset($_GET['recovery']) && $_GET['recovery'] != '') {

    $template->recovery_hash = urldecode($_GET['recovery']);

} else {

    redirect(BASE_URI . 'application/index.php');
}

if(isset($_POST['reset'])) {

    $user_hash = $user->get_user($template->recovery_hash);
    $form_errors = array();

    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $password_validation = new Validation($password, 'password', array('required' => true, 'maxLength' => 30));

    if($password_validation->getError()) {
        array_push($form_errors, $password_validation->getError());
    }
    if($password != $password_confirm) {
        array_push($form_errors, 'Το πεδίο password δεν ταιριάζει με το πεδίο confirm password');
    }

    if(empty($form_errors)) {


        if($user_hash) {
            $user->update_password($user_hash->user_id, password_hash($password, PASSWORD_DEFAULT));

            redirect(BASE_URI . 'application/login.php', 'Ο κωδικός πρόσβασης ανανεώθηκε με επιτυχια!', 'success');
        } 

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

