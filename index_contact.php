<?php
header('Access-Control-Allow-Origin: https://greylabelfx.com');
if(isset($_POST['submit'])) {
 
    $email_to = "sales@greylabelfx.com";
    
    $email_subject = "Contact Us Form (greylabelfx.com)";
 
    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    if(!isset($_POST['fullname']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['email']) ||
        !isset($_POST['skype']) ||
        !isset($_POST['country']) ||
        !isset($_POST['telegram']) ||
       
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 

     
    $name = $_POST['fullname']; 
    $phone = $_POST['phone']; 
    $email_from = $_POST['email']; 
    $skype = $_POST['skype']; 
    $country = $_POST['country']; 
    $services = $_POST['telegram']; 
    
    $comments = $_POST['comments']; 
    $ip = $_SERVER['REMOTE_ADDR']; 
 

 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Senders IP: ".clean_string($ip)."\n\n"; 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Skype ID: ".clean_string($skype)."\n";
    $email_message .= "Telegram ID: ".clean_string($services)."\n";
    $email_message .= "Country: ".clean_string($country)."\n";
   
    $email_message .= "Requirements: ".clean_string($comments)."\n";
    
      
    
$headers = 'From: noreply@greylabelfx.com'."\r\n";
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

if (@mail($email_to, $email_subject, $email_message, $headers))
	  {
         ?>
    	<script language="javascript" type="text/javascript">
    		alert('Thank you for the message. We will contact you shortly.');
    		window.location = 'index.html';
    	</script>
    <?php
    }
    else { ?>
    	<script language="javascript" type="text/javascript">
    		alert('Message failed. Please, send an email to customercare@prixim.co.uk');
    		window.location = 'index.html';
    	</script>
    <?php
    }
   }
?>