<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php');

//Requiring appopriate model for current page
require_once('../system/models/User.php');

//Creating instance of the User model class
$user = new User();

//Get template and assign variables
$template = new Template('templates/login-form.php');

//Assign variables
$template->title = "ΕΙΣΟΔΟΣ";
$template->no_navigation = true;

//Authentication user and allow login if authentication is successful
if(isset($_POST['log_in'])) {

    $log_in = $user->authenticate_user($_POST['username'], $_POST['password']);

    if($log_in == true) {
        
        session_unset();
        $_SESSION['logged_in'] = true;

        redirect(BASE_URI . 'application/admin.php');
    } else {

        redirect(BASE_URI . 'application/login.php', 'Τα στοιχεία που δώσατε δν αντιστοιχούν σε κάποιο εγγραμμένο χρήστη.', 'danger');

    }
    
}

//Display template
echo $template;

//Unsetting session
if(isset($_SESSION['message'])) {

    session_unset($_SESSION['message']);
}

if(isset($_SESSION['message_type'])) {

    session_unset($_SESSION['message_type']);
}



