<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('core/init.php'); 

//Require email configuration
require_once('config/email_config.php');

//Email Functionality
if(isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $text_area = $_POST['text_area'];

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

}
 