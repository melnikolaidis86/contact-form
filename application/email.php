<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php'); 

//Require email configuration
require_once('../system/config/email_config.php');

//Email Functionality
if(isset($_POST['submit'])) {

    //Retrieving all the $_POST variables through the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $text_area = $_POST['text_area'];

    //An array to hold all the errors
    $form_errors = array();

    //Running Validation for each of the form fields
    $first_name_validation = new Validation($first_name, 'όνομα', array('required' => true, 'maxLength' => 20));
    $last_name_validation = new Validation($last_name, 'επώνυμο', array('required' => true, 'maxLength' => 20));
    $email_validation = new Validation($email, 'e-mail', array('required' => true, 'validateEmail' => true));
    $phone_validation = new Validation($phone, 'τηλέφωνο', array('customRegex' => '/^[0-9]{3}-[0-9]{7}$/'));
    $subject_validation = new Validation($subject, 'θέμα', array('required' => true, 'maxLength' => 30));
    $text_area_validation = new Validation($text_area, 'κείμενο', array('required' => true));

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
    if($phone_validation->getError()){
        array_push($form_errors, $phone_validation->getError() . '(xxx-xxxxxxx)');
    }
    if($subject_validation->getError()) {
        array_push($form_errors, $subject_validation->getError());
    }
    if($text_area_validation->getError()) {
        array_push($form_errors, $text_area_validation->getError());
    }
    
    //Checking if there are no errors in the errors array and trying to send the message
    if(empty($form_errors)) {

        try {
            //Recipients
            $mail->setFrom($email, $first_name . ' ' . $last_name);
            $mail->addAddress(EMAIL_RECIPIENT);  // Add a recipient
        
            //Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $text_area;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

    } else {

        echo '<pre>';
            print_r($form_errors);
        echo '</pre>';
    }

}
 