<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('core/init.php'); 

//Require email configuration
require_once('config/email_config.php');

//Get template and assign variables
$template = new Template('templates/modules/contact-form.php');

//Assign variables
$template->heading = 'This the template heading';

//Display template
echo $template;


// try {
//     //Recipients
//     $mail->setFrom('melnikolaidis@hotmail.com', 'Meletis Nikolaidis');
//     $mail->addAddress('12472gr@saeinstitute.edu');     // Add a recipient

//     //Content
//     $mail->isHTML(true);                                  // Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
// }
 