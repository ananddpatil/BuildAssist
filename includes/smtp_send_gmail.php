<?php

error_reporting(E_ALL);
//error_reporting(E_STRICT);

//date_default_timezone_set('America/Toronto');
//require_once('../class.phpmailer.php');
include_once('class.phpmailer.php'); 
//include_once('../includes/class.phpmailer.php'); 

//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
//$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->Host       = "smtp.gmail.com"; // Anand 8 Aug 12
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPDebug  = 1; 			// Anand 8 Aug 12						
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server

// Anand 8 Aug 12
$mail->Username   = "pinn.alerts@gmail.com";  // GMAIL username
$mail->Password   = "Pinnacle@123";            // GMAIL password

$mail->SetFrom('pinn.alerts@gmail.com', 'Activity Sheet System Alerts'); //Insert GMail address
$mail->AddReplyTo('pinn.alerts@gmail.com', 'Activity Sheet System Alerts'); //Insert GMail address
//$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";
//Added by Anand
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
?>
