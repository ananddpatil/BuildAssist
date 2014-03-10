<?php
include_once('../includes/SiteSetting.php');

//Include below for sending Gmails
include_once('../includes/smtp_send_gmail.php'); 
 

try
{
$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);



// PROCESS THE FORM AFTER SUBMIT - START
if(isset($_POST['joinsubmit']) && $_POST['joinsubmit'] == 'Confirm')
{
extract($_POST);


if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password == $rpassword && intval($joinerphone) >= 2147483647) // Last partverifies that the phone no is atleast 10 digits
 {
 	if(intval($postal_code) >= 100000 && intval($postal_code) < 999999 && $address_line1 != "" && $joinercontactname != ""  && $usertype != "" && $city_taluka != "" && $companyname != "" &&  $displayname != "")
	{
		$activationcode=md5($email.date("F j, Y \a\t g:ia"));
		
		$cred_insert = $DBH->prepare('INSERT INTO credentials_master
											(username,
											password,
											
											activationcode,
											last_logged_ip)
											VALUES
											(
											:username,
											:password,
											:activationcode,
											:last_logged_ip
											)');
											
		$cred_insert->bindParam(':username',$email);
		$cred_insert->bindParam(':password',md5($password));
		$cred_insert->bindParam(':activationcode',$activationcode);
		$cred_insert->bindParam(':last_logged_ip',$_SERVER['REMOTE_ADDR']);

		$cred_insert->execute();
		
		if($cred_insert->rowCount() > 0)
			{	// Insert User details
				$user_id= $DBH->lastInsertId();
				$member_insert = $DBH->prepare('INSERT INTO member_master
													(
														user_id,
														companyname,
														displayname,
														contactname,
														mobile1,
														email,
														address1,
														address2,
														city_taluka,
														pincode,
														inserted_datetime
														)
														VALUES
														(
														:user_id,
														:companyname,
														:displayname,
														:contactname,
														:mobile1,
														:email,
														:address1,
														:address2,
														:city_taluka,
														:pincode,
														:inserted_datetime
														)
												');
				$member_insert->bindParam(':user_id', $user_id);
				$member_insert->bindParam(':companyname', $companyname);
				$member_insert->bindParam(':displayname', $displayname);
				$member_insert->bindParam(':contactname', $joinercontactname);
				$member_insert->bindParam(':mobile1', $joinerphone);
				$member_insert->bindParam(':email', $email);
				$member_insert->bindParam(':address1', $address_line1);
				$member_insert->bindParam(':address2', $address_line2);
				$member_insert->bindParam(':city_taluka',$city_taluka);
				$member_insert->bindParam(':pincode',$postal_code);
				date_default_timezone_set('Asia/Calcutta');
				$member_insert->bindParam(':inserted_datetime',date('Y-m-d H:i:s'));
				
				$member_insert->execute();
				if($member_insert->rowCount() > 0)
					{$_SESSION['msg']='SUCCESS';
						$body = "<html>
									<head>
									<title>Build Assist</title>
									</head>
									<body style=".'"font-family:Arial, Helvetica, sans-serif"'.">
									<p>Welcome &nbsp;".$joinercontactname."!</p>
									</div>
									<table width='600' cellpadding='4'>
									  <tr>
										<td align='left'>Thank you for signing up for BuildAssist. </td>
										<td align='left'></td>
									  </tr>
									  <tr>
									  <tr>
										<td align='left'><strong>Username</strong> (Registered E-Mail): ".$email." </td>
										<td align='left'></td>
									  </tr>
									  <tr>
										<td colspan='2'><a href='".SITEROOT."/Register_Part2/".$usertype."/".$email."/".$activationcode."'>Click Here </a>to validate your email.</td>
									  </tr>
									  <tr>
										<td colspan='2'>You can also paste following link into your browser address bar to to validate your email. <br/>
										  ".SITEROOT."/Register_Part2/".$usertype."/".$email."/".$activationcode."</td>
									  </tr>
									  <tr>
										<td colspan='2'>Please note that this activation link can be used only once. Once you validate the email, please use FORGOT PASSWORD functionality to change password.</td>
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
									
									$mail->Subject = "Activate your account - Confirm e-mail address - BuildAssist";
									$mail->MsgHTML($body);
									
									$address = $email;
									$mail->AddAddress($address, $joinercontactname);
									
									if(!$mail->Send()) {
									  $_SESSION['msg']="<b>The details you entered have been captured, but the confirmation email wasn't sent. Please contact site admin via details mentioned in the page footer. We are sorry for the inconvinience.</b>";
									} //if(!$mail->Send()) 
									
									 else {
									  $_SESSION['msg']="<b>Please email to validate your email address has been sent to your inbox. Kindly click the link in that e-mail to proceed. Thank you.</b>";
									} //else if(!$mail->Send()) 
									
									//Include below for sending Emails - ENDS
					
					
					} // if($member_insert->rowCount() > 0)
				} //if($cred_insert->rowCount() > 0)
			else
			{$_SESSION['msg']='Oops. Something is wrong. Please try again. Contact administrator if problem persists.';}

	
	} //if(filter_var($postal_code, FILTER_VALIDATE_INT) && address_line1 != "" && ...
 	else
	{  $_SESSION['msg']='ERROR! One of the required field is missing.';
	} ////if(filter_var($postal_code, FILTER_VALIDATE_INT) && address_line1 != "" && ...
 } // if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password == $rpassword)
 else
 { $_SESSION['msg']='ERROR! Email/Mobile is not in correct format or the passwords entered dont match. Please re-try';
 }//// if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password == $rpassword)

} //if($_POST[ClientSubmit] == 'Save')
// PROCESS THE FORM AFTER SUBMIT - END
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
		
	
	#------------------------------------------------------------------------------------------------------

if(isset($_SESSION['msg']))
	{
		$smarty->assign('msg',$_SESSION['msg']);
		$_SESSION['msg']='';
		unset($_SESSION['msg']);
		} //if(isset($_SESSION['msg']))

//DISPLAY PAGE
$smarty->display("Register_Part1.tpl"); 

?>