<?php

//Include below for sending Gmails
include_once('../../includes/smtp_send_gmail.php'); 

//RECAPTCHA CHECK BELOW
require_once('../../includes/recaptcha-php/recaptchalib.php');

include_once('../../includes/SiteSetting.php'); 
include_once('../../includes/comman.php');

if(isset($_POST['Submit']) && isset($_POST['username']))
{

	if($_POST['Submit'] == 'Send me Password Reset Link' && filter_var($_POST['username'], FILTER_VALIDATE_EMAIL))
	{
		
	extract($_POST);
	try
	{
	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);
	
	$check_user_exist = $DBH->prepare('SELECT user_id, username FROM 
										credentials_master
										where
										username = :username
										and isverified = '."'yes'".'
										and blocked = 0');
	$check_user_exist->bindParam(':username',$username);
	$check_user_exist->execute();

	if(!$check_user_exist->rowCount())
	{
			$_SESSION['forgot_email']=$username;
			$_SESSION['msg']='Please enter an email addresses that has been registered.';
			header("Location:".SITEROOT."/ForgotPassword");
			exit;
	} //if(!$check_user_exist->rowCount())
	else
	{
		
		$activationcode=md5($user_id.date("F j, Y \a\t g:ia"));		
		
		$cred_insert = $DBH->prepare('UPDATE credentials_master

										SET activationcode = :activationcode,
										last_logged_ip = :last_logged_ip
										
										WHERE 
										username = :username
										and blocked = 0');
											
		$cred_insert->bindParam(':username',$username);
		$cred_insert->bindParam(':activationcode',$activationcode);
		$cred_insert->bindParam(':last_logged_ip',$_SERVER['REMOTE_ADDR']);

		$cred_insert->execute();
		
				
		if($cred_insert->rowCount() > 0)
		
		{ 
			date_default_timezone_set('Asia/Calcutta');
			$email_sent_timestamp = date('Y-m-d H:i:s');
			//SEND EMAIL - STARTS
			
			$body = "<html>
									<head>
									<title>Build Assist</title>
									</head>
									<body style=".'"font-family:Arial, Helvetica, sans-serif"'.">
									
									</div>
									<table width='600' cellpadding='4'>
									  <tr>
										<td align='left'>Thank you for using BuildAssist. </td>
										<td align='left'></td>
									  </tr>
									  <tr>
									  <tr>
										<td align='left'><strong>Username</strong> (Registered E-Mail): ".$username." </td>
										<td align='left'></td>
									  </tr>
									  <tr>
										<td colspan='2'><a href='".SITEROOT."/set-new-password/".$activationcode."'>Click Here </a>to validate your email.</td>
									  </tr>
									  <tr>
										<td colspan='2'>You can also paste following link into your browser address bar to reset your password. <br/>
										  ".SITEROOT."/set-new-password/".$activationcode."</td>
									  </tr>
									  <tr>
										<td colspan='2'><p>Password Reset Request - Sent on ".$email_sent_timestamp." Indian Standard Time. Please disregard any password reset email generated before this time.</p> Please note that this email can be used to reset the password only once. </td>
									  </tr>
									</table>
									<p>Thank you. </p>
									<p>Team Build Assist<br/>
									  Email: contact@buildassist.in <br/>
									  Tel: 9820889289</p>
									</div>
									</body>
									</html>
									";
									//Include below for sending Emails - BEGINS
									
									$mail->Subject = "Reset your password - BuildAssist";
									$mail->MsgHTML($body);
									
									$address = $username;
									$mail->AddAddress($address, $address);
									
									if(!$mail->Send()) {
									  $_SESSION['msg']="<b>Internal ERROR - SEND-ERR01. E-Mail could not be sent. Please contact site administrator via details mentioned in the page footer. We are sorry for the inconvinience.</b>";
									} //if(!$mail->Send()) 
									
									 else {
									  $_SESSION['msg']="<b>SUCCESS! E-Mail sent on ".$email_sent_timestamp." IST. <br/>Kindly click the link in that e-mail to proceed. Thank you.</b>";
									} //else if(!$mail->Send()) 
									
									//Include below for sending Emails - ENDS
			
			// SEND EMAIL - ENDS		
		
		} //if($cred_insert->rowCount() > 0)
		
		
		


		}//else if(!$check_user_exist->rowCount())
		
		$DBH = NULL;
		} // try 
		catch(PDOException $e) 
		{  
				//echo " Dbase Connection Error. Pls contact administrator on ".SITEEMAIL;  
				//echo " Pls quote the page address and you were doing.";
				//echo " Go back to Home Page ".SITEROOT;
				echo $e->getMessage();
				file_put_contents(DBLOG, $e->getMessage(), FILE_APPEND);  
				$DBH = NULL;
		} //catch(PDOException $e) 

} //if($_POST['username'] && $_POST['username']!='')

else
{
$_SESSION['msg'] = 'ERROR - ERR-02: Invalid e-mail format. Please enter a valid email address to continue.';
} // else //if($_POST['username'] && $_POST['username']!='')

} //if(isset($_POST['Submit']) && isset($_POST['username'])

#-----------------------------------Messaging-----------------------------------
if(isset($_SESSION['msg'])){
	$smarty->assign("msg", $_SESSION['msg']);
	unset($_SESSION['msg']);
} //if(isset($_SESSION['msg'])
#-------------------------------------Contact Administrator Email------------------------------
$smarty->assign('SITEEMAIL',SITEEMAIL);
#-------------------------------------Contact Administrator-END----------------------------- 
#-------------------------------------Messaging-END----------------------------- 


$smarty->display("login/ForgotPassword.tpl"); 
$dbObj->Close();

?>