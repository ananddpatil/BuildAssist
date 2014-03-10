<?php
include_once('../../includes/SiteSetting.php'); 

#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE--------
include_once('../../includes/cklogin.php'); 	
//echo $_SESSION['duUserTypeId'];
if($_SESSION['duUserTypeId'] ==3 )
	header("location:". SITEROOT . "");
	


#--------------------If click on submit button--------------------------------------------	
if(isset($_POST['Submit']))
{
	extract($_POST);
#-----------------------------------Inser records to tbl_sales_emp  --------	
	$project=$dbObj->cgi('tbl_sales_emp',array('emptype_id','Company_id','project_id','username','email','first_name','last_name','mobile'),
										 array($userrole,$company,$project,$Emailid,$Emailid,$fname,$lname,$mobile),'');
	
	 $insertid=mysql_insert_id();	
	 $activationcode=md5($insertid);
	 	
	 $project=$dbObj->cupdt('tbl_sales_emp',array('activationcode'),array($activationcode),"sales_empl_id	",$insertid,'');	
		
	if($project)
	{
		
		$to = $Emailid;
		$subject = "Reset password.";
		$link1 = 'Profile';
		
	$message = "<html>
<head>
<title>Anand Team</title>
</head>
<body>
			<div style='border:1px solid #666666'>
           <div style='border:1px solid #666666; background:#666666; color:#FFFFFF;'> <p>&nbsp;Welcome &nbsp; &nbsp;".$fname." ".$lname."</p></div>
		
			
			<table width='400' cellpadding='4'>
				<tr><td colspan='2'>&nbsp;</td></tr><tr><td colspan='2'>&nbsp;</td></tr>
				<tr>
					<td align='left'><strong>Username</strong>:</td>
				    <td align='left'>".$Emailid."</td>
				</tr>
			<tr>
			<td colspan='2' columspan='2' >
				<a href='".SITEROOT."/set-new-password/".$activationcode."'>Click Here </a>to reset your password & activate your acount </td>
			  </tr>
</table>
			<br /><br />
			<p>Thanks
</p>
			<p>Anand  Team</p>
            <div style='border:1px solid #666666; background:#666666; color:#FFFFFF; text-align:center;'>&copy;</div>
            </div>
            
</body>
		</html>
		";
		
		//echo $message;exit;	
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= 'From: <'.SITEEMAIL.'>' . "\r\n";
		//$headers .= 'Cc: admin@example.com' . "\r\n";

		$resmail = mail($to,$subject,$message,$headers);

		$_SESSION['msg']="New User added successfully.";
		header('Location: '.SITEROOT.'/user-aminisration-panel');
	}
}
#------------------	submit end-----------------------------------------------------------------


#-------------------Fach all user data to update ------------------------
if($_SESSION[duUserTypeId]==1)
$sql="SELECT sales_empl_id,first_name,last_name,status FROM  tbl_sales_emp where emptype_id != 1  order by status, first_name";
else
$sql="SELECT sales_empl_id,first_name,last_name,status FROM  tbl_sales_emp where Company_id = '".$_SESSION['duUserCompanyId']."' AND  emptype_id != 1  order by status, first_name";

$user=$dbObj->customqry($sql,'');
while($urow = mysql_fetch_array($user))
 {
	$userdata[]=$urow;
 }	
$smarty->assign('userdata',$userdata); // store all data in smarty varable to print on tpl  file 



#-------------------Fach all mast_company data to select box------------------------
if($_SESSION[duUserTypeId]==1)
$sql="SELECT * FROM  mast_company where status='Active' order by Company ";
else
$sql="SELECT * FROM  mast_company where status='Active' AND Company_id='".$_SESSION['duUserCompanyId']."' order by Company ";

$project=$dbObj->customqry($sql,'');
while($row = mysql_fetch_array($project))
 {
	$projectdata[]=$row;
 }	
$smarty->assign('projectdata',$projectdata); // store all data in smarty varable to print on tpl  file 	

#-----------------------------------Fach all user roletype data to select box--------	

$roletype=$dbObj->customqry('SELECT * FROM  mast_usertype where typeid !="1"','');
while($row = mysql_fetch_array($roletype))
 {
	$userrole[]=$row;
 }	
$smarty->assign('userrole',$userrole); // store all data in smarty varable to print on tpl  file 	
	
	
#-----------------------------------Messaging-----------------------------------
if(isset($_SESSION['msg'])){
	$smarty->assign("msg", $_SESSION['msg']);
	unset($_SESSION['msg']);
}
#-------------------------------------Messaging-END----------------------------- 
if(isset($_GET['deuid']))
{
	if($_GET['status'] == 'inactive')
	$status='active';
	else
	$status='inactive';
	$roletype=$dbObj->customqry('UPDATE  `tbl_sales_emp` SET  `status` =  "'.$status.'" WHERE  sales_empl_id != 1 && `sales_empl_id` ="'.$_GET['deuid'].'"','');
	$_SESSION['msg']='User '.$status.' successfully';
	header("Location:".SITEROOT."/user-administration-panel");
	exit;
}
$smarty->display(TEMPLATEDIR."/modules/manage-users/home.tpl"); 
$dbObj->Close();
?>