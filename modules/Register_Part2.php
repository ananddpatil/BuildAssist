<?php
include_once('../includes/SiteSetting.php');
include_once('../includes/comman.php');

//Include below for sending Gmails
include_once('../includes/smtp_send_gmail.php'); 

$_SESSION['pageback']=CurrentPageURL();
require_once('../modules/login/logincheck.php'); 
include_once('../includes/cklogin.php'); 

#------------------------------------------------------------------------------------------------------

if(isset($_SESSION['msg']))
	{
		$smarty->assign('msg',$_SESSION['msg']);
		$_SESSION['msg']='';
		unset($_SESSION['msg']);
		} //if(isset($_SESSION['msg']))
		
		
		
//PROCESS THE DATA AFTER SUBMIT - START
if(isset($_POST['additional_info_submit']) && $_POST['additional_info_submit'] == 'Buyer' )
{
	try
	{
	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);
	$buyer_additional_info_reg = $DBH->prepare('insert into buyer_site_master
														(	member_id,
															project_name,
															area_sq_ft_planned,
															area_sq_ft_approved,
															area_sq_ft_constructed,
															site_pincode,
															locational_area,
															inserted_by,
															inserted_datetime)
													values
														(	:member_id,
															:project_name,
															:area_sq_ft_planned,
															:area_sq_ft_approved,
															:area_sq_ft_constructed,
															:site_pincode,
															:locational_area,
															:member_id,
															now()	)');
	$buyer_additional_info_reg->bindParam(':project_name',$_POST['projname']);
	$buyer_additional_info_reg->bindParam(':area_sq_ft_planned',$_POST['AreaPlanned']);
	$buyer_additional_info_reg->bindParam(':area_sq_ft_approved',$_POST['AreaApproved']);
	$buyer_additional_info_reg->bindParam(':area_sq_ft_constructed',$_POST['AreaConstruction']);
	$buyer_additional_info_reg->bindParam(':site_pincode',$_POST['sitepincode']);
	$buyer_additional_info_reg->bindParam(':locational_area',$_POST['sitelocation']);
	$buyer_additional_info_reg->bindParam(':member_id',$_SESSION['member_id']);
	$buyer_additional_info_reg->execute();
	
	if($buyer_additional_info_reg->rowCount() > 0)
		{ $_SESSION['msg']='Your details are updated. Thank you.<br/>You are now ready to use BuildAssist.';
		} //if($buyer_additional_info_reg->rowCount() > 0)

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


} //if(isset($_POST['additional_info_submit']) && $_POST['additional_info_submit'] == 'Buyer' )
//PROCESS THE DATA AFTER SUBMIT - END

//DISPLAY PAGE
$smarty->display("Register_Part2.tpl"); 

?>