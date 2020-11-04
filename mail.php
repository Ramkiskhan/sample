<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\OAuth;

require ('src/Exception.php');
require ('src/PHPMailer.php');
require ('src/SMTP.php');
//require('src/OAuth.php');

define('username','walloncharlie@gmail.com');
define('apipass','bblahwzunqpirork');


// Instantiation and passing `true` enables exceptions


function phpmail($to,$subject,$body,$cc = NULL){
	$mail = new PHPMailer(true);
	$mail->SMTPDebug = 0;
	$mail->isSMTP();      
    $mail->Host       = 'smtp.gmail.com';       
    $mail->SMTPAuth   = true;               
    $mail->Username   = username;     
    $mail->Password   = apipass;                         
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
    $mail->Port       = 587;
	
	//Recipients
    $mail->setFrom('contact@taswira.net', 'Taswira');
	
	//add each addresse from an array
	$addresses = explode(",",$to);
	foreach($addresses as $adr){
		$mail->addAddress($adr);
	};
	
	$cc? $mail->addCC($cc): null;
	
	// Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
	$mail->send();
	//echo 'Message has been sent';
}
//phpmail('govindsaini0101@gmail.com, priyajohri3579@gmail.com,rockstarr0101@gmail.com','mysubject','mybody');
//echo 'mail page';


/*--------------------------------------------------------------------------------------------*/

/***
BELOW PART IS COMMENTED BY ME (GOVIND) || COPY OR MODIFY OR REFERENCE IT AS PER YOUR NEEDS
***/

/*
try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->SMTPDebug = 0;  // No Debug on production app
	
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = username;                     // SMTP username
    $mail->Password   = password;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@altamirapizza.be', 'Altamira Support');
    $mail->addAddress('govindsaini0101@gmail.com', 'Joe User');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
*/
?>