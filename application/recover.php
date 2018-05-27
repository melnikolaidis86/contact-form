<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php');

//Require email configuration
require_once('../system/config/email_config.php');

//Requiring appopriate model for current page
require_once('../system/models/User.php');

//Creating instance of the User model class
$user = new User();

//Get template and assign variables
$template = new Template('templates/recovery-form.php');

//Assign variables
$template->title = "ΕΠΑΝΑΦΟΡΑ ΚΩΔΙΚΟΥ ΠΡΟΣΒΑΣΗΣ";
$template->no_navigation = true;

//Checking recover form is submitted
if(isset($_POST['recover'])) {

    $email = $_POST['email'];

    $email_validation = new Validation($email, 'e-mail', array('required' => true, 'validateEmail' => true));

    if(!$email_validation->getError()) {

        //Checking if email address is a valid user record in the database
        $user_email = $user->check_if_valid_user_email($email);

        if($user_email) {

            try {
                $recovery_hash = random_bytes(32);
            } catch (TypeError $e) {
                // Well, it's an integer, so this IS unexpected.
                die("An unexpected error has occurred"); 
            } catch (Error $e) {
                // This is also unexpected because 32 is a reasonable integer.
                die("An unexpected error has occurred");
            } catch (Exception $e) {
                // If you get this message, the CSPRNG failed hard.
                die("Could not generate a random string. Is our OS secure?");
            }

            $user->register_recovery_hash($user_email->email, bin2hex($recovery_hash));

            try {
                //Recipients
                $mail->setFrom('info@melnikolaidis.eu');
                $mail->addAddress($user_email->email);  // Add a recipient
    
                //Content
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = "Επαναφορά κωδικού πρόσβασης.";

                //Email message
                $mail->Body = '<h3><a href=' . BASE_URI . 'application/reset.php?recovery=' . bin2hex($recovery_hash) . '>Επαναφορά Κωδικού</a></h3>';
 
                //Alternative messafe for clients that don't accept html e-mail
                $mail->AltBody = BASE_URI . 'application/reset.php?recovery=' . bin2hex($recovery_hash);
            
                $mail->send();
                $email_msg = 'Το μηνυμά σας στάλθηκε επιτυχώς. Θα έρθουμε σύντομα σε επικοινωνία μαζί σας...';
                $email_msg_type = 'success';
                
                } catch (Exception $e) {
                    $email_msg = 'Υπήρξε κάποιο πρόβλημα με την αποστολή του μηνύματός σας. Παρακαλούμε προσπαθήστε ξανά...' . $mail->ErrorInfo;
                    $email_msg_type = 'danger';
            }

        } else {

            $email_msg = 'Δεν υπάρχει εγγραμμένος χρήστης με το συγκεκριμένο e-mail.';
            $email_msg_type = 'danger';
        }

    } else {

        $email_msg = 'Παρακαλούμε εισάγετε μια έγκυρη διεύθυνση e-mail.';
        $email_msg_type = 'danger';
    }

    $_SESSION['email_msg'] = $email_msg;
    $_SESSION['email_msg_type'] = $email_msg_type;

}


//Display template
echo $template;

//Unsetting session
session_unset();
