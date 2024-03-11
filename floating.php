<?php
if(isset($_POST['submit'])) {
    $email_to = "sales@greylabel-fx.com";
    $email_subject = "Contact Us Form";
    
    // Check if required fields are set and not empty
    if(empty($_POST['float-name']) ||
       empty($_POST['float-email']) ||
       empty($_POST['msg'])) {
        die('We are sorry, but there appears to be a problem with the form you submitted.');
    }
    
    $name = $_POST['float-name']; 
    $email_from = $_POST['float-email']; 
    $comments = $_POST['msg']; 
    $ip = $_SERVER['REMOTE_ADDR']; 
    
    // Construct email message
    $email_message = "Form details below.\n\n";
    $email_message .= "Senders IP: ".$ip."\n\n"; 
    $email_message .= "Name: ".$name."\n";
    $email_message .= "Email: ".$email_from."\n";
    $email_message .= "Requirements: ".$comments."\n";
    
    // Set headers
    $headers = 'From: noreply@greylabel-fx.com'."\r\n";
    $headers .= 'Reply-To: '.$email_from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
    
    // Send email
    if (@mail($email_to, $email_subject, $email_message, $headers)) {
        ?>
        <script language="javascript" type="text/javascript">
            alert('Thank you for the message. We will contact you shortly.');
            window.location = 'index.html';
        </script>
        <?php
    } else {
        ?>
        <script language="javascript" type="text/javascript">
            alert('Message failed. Please, send an email to customercare@prixim.co.uk');
            window.location = 'index.html';
        </script>
        <?php
    }
}
?>
