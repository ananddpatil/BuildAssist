<?php

include_once('../../includes/SiteSetting.php'); 
#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE------------------
include_once('../../includes/cklogin.php'); 

if (isset($_GET['Position_Key']))
{


try
{
	$Position_Key = $_GET['Position_Key'];
	
	
	//Data level Security
	$WorkArea_Key = $_SESSION['WorkArea_Key'];
	
	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);

	//Retrieve the query
	$positiondetails = $DBH->prepare(' select 
										Client_Key,
										Position_Key,
										Position_name,
										DATE_FORMAT(date(Position_Created_Date),'."'%Y/%m/%d'".') as Position_Created_Date,
										Position_Number,
										CAST(Top_CTC_in_Rupees as decimal(10,2)) as Top_CTC_in_Rupees,
										Base_Location,
										Consultant_Key,
										Discussion_with_CustFacingConsultant,
										Agreement_Signed_with_Client,
										Status,
										Status_Details,
										DATE_FORMAT(date(Status_Update_Timestamp),'."'%Y/%m/%d'".') as Status_Update_Timestamp,
										cast(Invoiced_Amount as decimal(10,2)) as Invoiced_Amount,
										DATE_FORMAT(date(Invoiced_Date),'."'%Y/%m/%d'".') as Invoiced_Date,
										DATE_FORMAT(date(Invoice_Paid),'."'%Y/%m/%d'".') as Invoice_Paid
										
										
										from position_dim
										where
										Position_Key = :Position_Key
										and WorkArea_Key = :WorkArea_Key
										and Active = 1');
	$positiondetails->bindParam(':Position_Key',$Position_Key);
	
	$positiondetails->bindParam(':WorkArea_Key', $WorkArea_Key );
	
	$positiondetails->execute();
	$i=0;
	
	while($row = $positiondetails->fetch()){	
		$positiondetails_out[]	= $row;	
		$i++;
		} // End of while($row = $clientdetails->fetch()){
		
	
	
	//IMPORTANT! Following statement returns the json query in text formart. The output needs to be prefixed with an arrayname and then parsed in json format at receiver's end
	echo json_encode($positiondetails_out);
	
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
	}  

}//if (isset($_POST['query']))
?>
