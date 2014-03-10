<?php
include_once('../includes/SiteSetting.php');
include_once('../includes/comman.php');
include_once('../includes/cklogin.php'); 

#------------------------------------------------------------------------------------------------------

/*
		
	
	try
	{
	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);
	
	$buyer_additional_info_reg = $DBH->prepare('');
	$buyer_additional_info_reg->bindParam(':project_name',$_POST['projname']);

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



//PROCESS THE DATA AFTER SUBMIT - END
*/
if(isset($_SESSION['msg']))
	{
		$smarty->assign('msg',$_SESSION['msg']);
		$_SESSION['msg']='';
		unset($_SESSION['msg']);
		} //if(isset($_SESSION['msg']))

//DISPLAY PAGE
$smarty->display("MyBuildAssist_MyRequirements.tpl"); 

?>