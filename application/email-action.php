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
    $first_name_validation = new Validation($first_name, 'όνομα', array('required' => true, 'maxLength' => 30));
    $last_name_validation = new Validation($last_name, 'επώνυμο', array('required' => true, 'maxLength' => 30));
    $email_validation = new Validation($email, 'e-mail', array('required' => true, 'validateEmail' => true));
    $phone_validation = new Validation($phone, 'τηλέφωνο', array('customRegex' => '/^\d{3}\d{7}$/'));
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
        array_push($form_errors, $phone_validation->getError());
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

            //Get template and assign variables
            $template = new Template('templates/email/default-email.php');

            //Assign variables
            $template->full_name = $first_name . ' ' .$last_name;
            $template->message = $text_area;

            //Opening outbuffering stream to load html template for the e-mail body
            ob_start();

            echo $template;

            $mail->Body = ob_get_contents();

            ob_clean();

            //Alternative messafe for clients that don't accept html e-mail
            $mail->AltBody = $text_area;
        
            $mail->send();
            $_SESSION['email_msg_success'] = 'Το μηνυμά σας στάλθηκε επιτυχώς. Θα έρθουμε σύντομα σε επικοινωνία μαζί σας...';
            unset($_SESSION['form_errors']);
            unset($_SESSION['email_msg_fail']);
            } catch (Exception $e) {
                $_SESSION['email_msg_fail'] = 'Υπήρξε κάποιο πρόβλημα με την αποστολή του μηνύματός σας. Παρακαλούμε προσπαθήστε ξανά...' . $mail->ErrorInfo;
                unset($_SESSION['form_errors']);
                unset($_SESSION['email_msg_success']);
        }

    } else {

        $_SESSION['form_errors'] = $form_errors;
        unset($_SESSION['email_msg_success']); 
        unset($_SESSION['email_msg_fail']);

    }

    header('Location: ' . BASE_URI . 'application/contact.php');
    die();

}
 