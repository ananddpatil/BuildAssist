<?php
include_once('../../includes/SiteSetting.php'); 
include_once('../../includes/comman.php'); 



#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE--------
if(!$_SESSION['UserLgn'])
	exit;
	
#-----------------------------------Messaging-----------------------------------
if(isset($_SESSION['msg'])){
	$smarty->assign("msg", $_SESSION['msg']);
	unset($_SESSION['msg']);
}
#-------------------------------------Messaging-END----------------------------- 

#-------------------Fach all user data to update ------------------------
if(isset($_GET['id']))
{
	$user=$dbObj->customqry('SELECT username,first_name,last_name FROM  tbl_sales_emp where sales_empl_id='.$_GET['id'],'');
	$urow = mysql_fetch_assoc($user);
	$smarty->assign('userdata',$urow); // store all data in smarty varable to print on tpl  file 
}		
#--------------------If click on submit button--------------------------------------------	
if(isset($_POST['Submit']))
{
	extract($_POST);
#-----------------------------------Inser records to tbl_sales_emp  --------	
    if(isset($_GET['id']))
	{
	    $project=$dbObj->cupdt('tbl_sales_emp',array('password','encode5t'),array(md5($password),encode5t($password)),"sales_empl_id",$_GET['id'],'');	
	
		$_SESSION['msg']="User password updated successfully.";
		header('Location: Change-Password.php?id='.$_GET['id']);
	
	}
	else
	{
		$_SESSION['msg']="Select Existing Users to update.";
	}
}
	

$smarty->display(TEMPLATEDIR."/modules/manage-users/Change-Password.tpl"); 
$dbObj->Close();
?>
