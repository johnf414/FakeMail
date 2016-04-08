<?php

if(isset($_POST['email'])) {
	
    $email_to_send_to = $_POST['sendtomail']; // required
    $email_input_subject = $_POST['subject']; //required
    if( ($time = $_SERVER['REQUEST_TIME']) == '') {
    $time = time();
  }
    if( ($remote_addr = $_SERVER['REMOTE_ADDR']) == '') {
    $remote_addr = "REMOTE_ADDR_UNKNOWN";
  }
    $date = date("Y-m-d H:i:s", $time);
    
	
	
	
	function died($error) {
		// your error code can go here
		echo "We are very sorry, but there were error(s) found with the form your submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(($email_to_send_to) === "johnfernandez2201@gmail.com") {
     
        died('No. No. No...... Aint happening');
        
       }
    if(($email_to_send_to) === "19jfernandez@ga.usmk12.org") {
     
        died('No. No. No...... Aint happening');
        
    }
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
	//Logging Mechanism
	$logfile = fopen("emailLog.txt", "a+") or die("Unable to open file!");
	fwrite($logfile, $date);
	$txt = "\n";
	fwrite($logfile, $txt);
	fwrite($logfile, $remote_addr);
	fwrite($logfile, $txt);
	$txt = "Email from: ";
	fwrite($logfile, $txt);
	fwrite($logfile, $email_from);
	$txt = "\n";
	fwrite($logfile, $txt);
	$txt = "Email sent to: ";
	fwrite($logfile, $txt);
	fwrite($logfile, $email_to_send_to);
	$txt = "\n";
	fwrite($logfile, $txt);
	$txt = "Email Subject: ";
	fwrite($logfile, $txt);
	fwrite($logfile, $email_input_subject);
	$txt = "\n";
	fwrite($logfile, $txt);
	$txt = "Email Message: ";
	fwrite($logfile, $txt);
	fwrite($logfile, $email_digest);
	$txt = "\n";
	fwrite($logfile, $txt);
	fwrite($logfile, $txt);
	fclose($logfile);

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to_send_to, $email_input_subject, $email_digest, $headers);  
?>

<!-- include your own success html here -->

Email Sent! Remember, if the receiver actually responds to the email, it will go to the actual email owner.

<?
}
?>
 
