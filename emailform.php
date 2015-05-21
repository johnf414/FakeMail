<?php

if(isset($_POST['email'])) {
	
    $email_to_send_to = $_POST['sendtomail']; // required
    $email_input_subject = $_POST['subject']; //required
    
    // EDIT THE 2 LINES BELOW AS REQUIRED
	
	
	
	function died($error) {
		// your error code can go here
		echo "We are very sorry, but there were error(s) found with the form your submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if
		(!isset($_POST['email'])) {
		died('We are sorry, but there appears to be a problem with the email your submitted.');		
	}
	
	
	$email_from = $_POST['email']; // required
	$email_digest = $_POST['digest']; // required
	
	$error_message = "";
	$email_exp = "^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$";
  if(!eregi($email_exp,$email_from)) {
  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
	
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	$email_to .= "".clean_string($email_to_send_to)."\n";
	$email_subject .= "".clean_string($email_input_subject)."\n";
	
	$email_message .= "".clean_string($email_digest)."\n";

	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- include your own success html here -->

Thank you for contacting us. We will be in touch with you very soon.

<?
}
?>
 