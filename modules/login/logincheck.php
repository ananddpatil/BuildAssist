<?php

//INCLUDE THE sitesetting.php FILE ONLY FOR AUTH PURPOSES IE FROM LOGIN PAGE
if (isset($_POST['func']) && $_POST['func'] == 'auth')
{include_once('../../includes/SiteSetting.php');}


if(isset($_SESSION['pageback']))
$pgbck = $_SESSION['pageback'];
else
$pgbck = '';//$_POST['pgbck'];

/********************************** start server side validation **********************************/


try {  

	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD); 
	
	if (!(isset($_SESSION['SESS_MEMBER_ID']))) // CHECK IF AUTHENTICATED SESSION EXITS
		{
		
		
		//CLEAR RESIDUES FROM PREVIOUS SESSIONS - START
		//session_regenerate_id();
		//CLEAR RESIDUES FROM PREVIOUS SESSIONS - END
		 
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
		
		//CHECK WHTHER PASSWORD IS PASSED FROM THE LOGIN PAGE. 
		if (isset($_POST['func']) && $_POST['func'] == 'auth')
		{ $loginPassword = md5($_POST['loginPassword']); 		
		$stmt = $DBH->prepare('
									SELECT 
										credentials_master.user_id,
										credentials_master.username,
										member_master.member_id,
										member_master.displayname,
										member_master.contactname,
										member_master.companyname
										
										FROM 
										credentials_master
										inner join
										member_master
										on (credentials_master.user_id = member_master.user_id)
										where
										isverified = '."'yes'".'
										and	username = :username
										and 
										(password = :password
										OR (activationcode = :password AND activationcode <> '."''".')
										)
							   ');
		
		$loginName = $_POST['loginName'];
			
		$stmt->bindParam(':username', $loginName );
		$stmt->bindParam(':password', $loginPassword);  
		
		   
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		$stmt->execute(); 
		
		if($stmt->rowCount() > 0)
			{$loginrow = $stmt->fetch();}
			
		else
			{$_SESSION['msg']="AUTH-ERROR-01: Incorrect E-Mail & Password combination. <br/>Please try again.";
			}//else if($cred_verify->rowCount() > 0)
		} //if ($_POST['func'] == 'auth')

		else
		{ 	//CHECK IF ACTIVATION CODE IS PASSED FROM REGISTRATION PART 2 PAGE
			if(isset($_GET['activity']) && isset($_GET['activationcode']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
			{
			$cred_verify = $DBH->prepare('select 
										credentials_master.user_id,
										credentials_master.username,
										member_master.member_id,
										member_master.displayname,
										member_master.contactname,
										member_master.companyname
										
										FROM 
										credentials_master
										inner join
										member_master
										on (credentials_master.user_id = member_master.user_id)
										where
									credentials_master.username = :email
									and credentials_master.activationcode = :activationcode');
	
			$cred_verify->bindParam(':email', $_GET['email']);
			$cred_verify->bindParam(':activationcode', $_GET['activationcode']);
			
			$cred_verify->execute();
			
			if($cred_verify->rowCount() > 0)
			{	$loginrow = $cred_verify->fetch();
				$record_veri = $DBH->prepare('update credentials_master
											set 
											/*isverified = '."'yes'".',
											activationcode = '."''".',*/
											last_logged_ip = :last_logged_ip,
											email_verified_timestamp = :inserted_datetime
											
											where
											username = :email');
			
			$record_veri->bindParam(':email', $_GET['email']);
			$record_veri->bindParam(':last_logged_ip',$_SERVER['REMOTE_ADDR']);
			
			date_default_timezone_set('Asia/Calcutta');
			$record_veri->bindParam(':inserted_datetime',date('Y-m-d H:i:s'));
			$record_veri->execute();
			if($record_veri->rowCount() > 0)
			{
				$_SESSION['msg']='SUCCESS: Your E-Mail address is verified. <br>You are almost ready to use BuildAssist';
			} // if($record_veri->rowCount() > 0)
			else
			{
				$_SESSION['msg']='CRED-ERROR-02: Your credentials matched, but some problem occoured.<br> Please contact administrator.';
			} // else if($record_veri->rowCount() > 0)
			} //if($cred_verify->rowCount() > 0)
			else
			{$_SESSION['msg']='CRED-ERROR-01: Either your activity code has already been used or the email is not linked to this activation code. <br><br>Please try using the verification link again. Contact administrator if the error persists';} //if($cred_verify->rowCount() > 0)
			
			
			
			}//if(isset($_GET['activity']) && isset($_GET['activationcode']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
			
		} // else if ($_POST['func'] == 'auth')
		
		

	
		if($loginrow)// USER IS AUTHENTICATED
		{
			
			setcookie('duUserName',"", time() - 3600);
			setcookie('duUserpass',"", time() - 3600);
			$_SESSION['UserLgn']=true;
			$_SESSION['duUserId']=$loginrow['user_id'];
			$_SESSION['duUserEmail'] = $loginrow['username']; //LOGIN NAME IS EMAIL ADDRESS
			
			$_SESSION['member_id']=$loginrow['member_id'];
			$_SESSION['displayname']=$loginrow['displayname'];
			$_SESSION['contactname']=$loginrow['contactname'];
			$_SESSION['companyname']=$loginrow['companyname'];
			

			
			$_SESSION['SESS_MEMBER_ID'] = $_SESSION['duUserId'];
			
			$token = md5(uniqid(rand(),TRUE))."<br />";
			$fingerprint = sha1('SECRET-SALT'.$_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].$token);
			$_SESSION['SESS_TOKEN'] = $token;
			$_SESSION['SESS_FINGERPRINT'] = $fingerprint;
			
			// RECORD LOGIN INFO - START
			
		
						
			//RECORD LOGIN DETAILS IF AUTH - START
			if (isset($_POST['func']) && $_POST['func'] == 'auth')
			{			$update_ip = $DBH->prepare('UPDATE credentials_master
												SET last_logged_ip = :last_logged_ip,
												last_login_timestamp = :last_login_timestamp
												WHERE username = :username');
			
						$update_ip->bindParam(':last_logged_ip',$_SERVER['REMOTE_ADDR']);
						$update_ip->bindParam(':username',$loginName);
						
						date_default_timezone_set('Asia/Calcutta');
						$update_ip->bindParam(':last_login_timestamp',date('Y-m-d H:i:s'));
						
						$update_ip->execute();
			}//	if ($_POST['func'] == 'auth')	
			//RECORD LOGIN DETAILS - END
			
			// RECORD LOGIN INFO - END
			
				if($_SESSION['duUserId'] > 0)
				{
					if($pgbck=='')
					{header("Location:".SITEROOT."/welcome");} // if($pgbck=='')
					else
					{header("Location:".$pgbck);} // else if($pgbck=='')
					
				}//if($_SESSION['duUserId'] > 0 && $pgbck=='')
				
			
			
			} // if($loginrow) 
			
			else
			{	
				header("Location:". SITEROOT."/login" );
				exit();
			} // else  if($loginrow) 
		} //if (!(isset($_SESSION['SESS_MEMBER_ID']))
		
$DBH = NULL;

} //try


 
catch(PDOException $e) 
{  
    echo " CONN-ERR-01: INTERNAL Connection Error. Please contact administrator on ".SITEEMAIL;  
	echo " Please quote the page address and you were doing.";
	echo " Go back to Home Page ".SITEROOT;
	
    file_put_contents(DBLOG, $e->getMessage(), FILE_APPEND);  
}  

?>