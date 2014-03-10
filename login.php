<?php
include_once('includes/SiteSetting.php'); 
//RECAPTCHA CHECK BELOW
require_once('includes/recaptcha-php/recaptchalib.php');

#-----------------------------------IF LOGIN REDIRECT TO WELCOME PAGE---------- 
if(isset($_SESSION['pageback']))
$pgbck = $_SESSION['pageback'];
else
$pgbck = '';//$_POST['pgbck'];


if(isset($_SESSION['SESS_MEMBER_ID']))
{ if($_SESSION['duUserId'] > 0 )
				{
					if($pgbck=='')
					{header("Location:".SITEROOT."/welcome");} // if($pgbck=='')
					else
					{header("Location:".$pgbck);} // else if($pgbck=='')
					
				}//if($_SESSION['duUserId'] > 0 && $pgbck=='')

} //if(isset($_SESSION['SESS_MEMBER_ID']))

	 
#-----------------------------------Messaging-----------------------------------

if(isset($_SESSION['SESSION_EXP']))
$_SESSION['msg']=$_SESSION['SESSION_EXP'];
unset($_SESSION['SESSION_EXP']);

if(isset($_SESSION['msg'])){
	$smarty->assign("msg", $_SESSION['msg']);
	unset($_SESSION['msg']);
} // if(isset($_SESSION['msg']))


		  

#-------------------------------------Messaging-END----------------------------- 

#-------------------------------------Contact Administrator Email------------------------------
$smarty->assign('SITEEMAIL',SITEEMAIL);
#-------------------------------------Contact Administrator-END----------------------------- 

$smarty->display("login.tpl"); 

?>

