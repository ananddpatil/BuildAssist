<?php
include_once('../../includes/SiteSetting.php'); 

#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE--------
if(!$_SESSION['UserLgn'])
	exit;
	
#-----------------------------------Messaging-----------------------------------
if(isset($_SESSION['msg'])){
	$smarty->assign("msg", $_SESSION['msg']);
	unset($_SESSION['msg']);
}
#-------------------------------------Messaging-END----------------------------- 		
#--------------------If click on submit button--------------------------------------------	
if(isset($_POST['Submit']))
{
	extract($_POST);
#-----------------------------------Inser records to tbl_sales_emp  --------	
    if(isset($_GET['id']))
	{
	$project=$dbObj->cupdt('tbl_sales_emp',array('emptype_id','Company_id','project_id','first_name','last_name','mobile'),
										 array($userrole,$company,$project,$fname,$lname,$mobile),"sales_empl_id",$_GET['id'],'');	
	if($project)
	{
		$_SESSION['msg']="User updated successfully.";
		header('Location: update-user.php?id='.$_GET['id']);
	}
	}
	else
	{
		$_SESSION['msg']="Select Existing Users to update.";
	}
}
#------------------	submit end-----------------------------------------------------------------


#-------------------Fach all user data to update ------------------------
if(isset($_GET['id']))
{
	$user=$dbObj->customqry('SELECT * FROM  tbl_sales_emp where sales_empl_id='.$_GET['id'],'');
	$urow = mysql_fetch_assoc($user);
	$smarty->assign('userdata',$urow); // store all data in smarty varable to print on tpl  file 
}

$project=$dbObj->customqry('SELECT * FROM  mast_company where status="Active" order by Company ','');
while($row = mysql_fetch_assoc($project))
 {
	$projectdata[]=$row;
 }	
$smarty->assign('projectdata',$projectdata); // store all data in smarty varable to print on tpl  file 	

#-----------------------------------Fach all user roletype data to select box--------	
$roletype=$dbObj->customqry('SELECT * FROM  mast_usertype where typeid !="1"','');
while($row2 = mysql_fetch_assoc($roletype))
 {
	$rrole[]=$row2;
 }	
$smarty->assign('userrole',$rrole); // store all data in smarty varable to print on tpl  file 	
	
	


$smarty->display(TEMPLATEDIR."/modules/manage-users/update-user.tpl"); 
$dbObj->Close();
?>
