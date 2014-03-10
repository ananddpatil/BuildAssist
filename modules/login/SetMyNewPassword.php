<?php
include_once('../../includes/SiteSetting.php'); 
include_once('../../includes/comman.php'); 

#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE------------------
include_once('../../includes/cklogin.php'); 	


#--------------------If click on submit button--------------------------------------------	
#--------------------If click on submit button--------------------------------------------	
if(isset($_POST['Submit']) && $_POST['Submit']  == 'Set Password')
{
	extract($_POST);
#-----------------------------------Inser records to tbl_sales_emp  --------	
   	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);

	$update_password = $DBH->prepare('UPDATE credentials_master

									SET 
									password = :password,
									password_updated_timestamp = :password_updated_timestamp,
									activationcode = '."''".',
									last_logged_ip = :last_logged_ip
									
									WHERE 
									activationcode = :activationcode
									and blocked = 0
									and isverified = '."'yes'".'');
		
	$password_encr = md5($password);							
	$update_password->bindParam(':password',$password_encr);
	
	date_default_timezone_set('Asia/Calcutta');
	$password_updated_timestamp = date('Y-m-d H:i:s');
	$update_password->bindParam(':password_updated_timestamp',$password_updated_timestamp);
	$update_password->bindParam(':last_logged_ip',$_SERVER['REMOTE_ADDR']);
	$update_password->bindParam(':activationcode',$_GET['activationcode']);
	
	$update_password->execute();
	
	if($update_password->rowCount() > 0)
   	{
		$_SESSION['msg']="Your password has been updated successfully. Please go back to the main page using the link below and sign-in. Thank you.";
	}//if($update_password->rowCount() > 0)
   	else
	{
		$_SESSION['msg']="ERR-PSSWD-01: Something is wrong. Either the activation code has been used before or your account might be blocked. Please try resetting password again using FORGOT PASSWORD link in the main page.";
	} // else if($update_password->rowCount() > 0)
	 
} // if(isset($_POST['Submit']))
	
#-----------------------------------Messaging-----------------------------------
if(isset($_SESSION['msg'])){
	$smarty->assign("msg", $_SESSION['msg']);
	unset($_SESSION['msg']);
}
#-------------------------------------Messaging-END------------------------------

$smarty->display("login/SetMyNewPassword.tpl"); 
$dbObj->Close();
?>
