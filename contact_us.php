<?php
header('Access-Control-Allow-Origin: https://greylabelfx.com');
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "rama.prixim@gmail.com";
    $email_subject = "GreyLabel contact form";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['email']) ||
        !isset($_POST['country']) ||
        !isset($_POST['skype']) ||
        !isset($_POST['telegram']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $phone = $_POST['phone']; // required
    $email = $_POST['email']; // required
    $country = $_POST['country']; // required
    $skype = $_POST['skype']; // required
    $telegram = $_POST['telegram']; // required
    $message = $_POST['comments']; // required
    $ip = $_SERVER['REMOTE_ADDR']; 
 

 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
    $email_message .= "Senders IP: ".clean_string($ip)."\n\n"; 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Country: ".clean_string($country)."\n";
    $email_message .= "Skype: ".clean_string($skype)."\n";
    $email_message .= "Telegram: ".clean_string($telegram)."\n";
    $email_message .= "Comments: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: noreply@GreyLabelFX'."\r\n";
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

if (@mail($email_to, $email_subject, $email_message, $headers))
      {
         ?>
        <script language="javascript" type="text/javascript">
            alert('Thank you for the message. We will contact you shortly.');
            window.location = history.back();
        </script>
    <?php
    }
    else { ?>
        <script language="javascript" type="text/javascript">
            alert('Message failed. Please, send an email to support@finovace.com');
            window.location = history.back();;
        </script>
    <?php
    }
   }
?>