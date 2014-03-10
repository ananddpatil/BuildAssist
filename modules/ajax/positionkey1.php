<?php

include_once('../../includes/SiteSetting.php'); 
#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE------------------
include_once('../../includes/cklogin.php'); 

if (isset($_GET['query']))
{


try
{
	$inputval = '%'.$_GET['query'].'%';
	$client_key = $_GET['client_key'];
	if(isset($_GET['position_status'])){$Status = $_GET['position_status'] ;} else {$Status = '0';}
	if(isset($_GET['Status_Details'])){$Status_Details = $_GET['Status_Details'] ;} else {$Status_Details = '0';}
	
	//Data level Security
	$WorkArea_Key = $_SESSION['WorkArea_Key'];
	
	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);

	//Retrieve the query - Includes condition to retrieve positions Open or Closed by Us together.
	$positiondetails = $DBH->prepare(' select Client_Key, Position_Key, Position_Name,Search_String
										from position_dim
										where
										(Client_Key = :client_key OR :client_key = 0)
										and Search_String LIKE :Position_Name
										and Active = 1
										and WorkArea_Key = :WorkArea_Key
										and ('."'0'".' = :Status
										OR status = :Status 
										OR  (Status_Details = :Status_Details AND (Status_Update_Timestamp is null OR Status_Update_Timestamp > adddate(now(),-150))
										))
										order by Position_Key desc
										LIMIT 8');
										
	$positiondetails->bindParam(':client_key',$client_key);
	$positiondetails->bindParam(':Position_Name',$inputval);
	$positiondetails->bindParam(':WorkArea_Key', $WorkArea_Key );
	$positiondetails->bindParam(':Status', $Status );
	$positiondetails->bindParam(':Status_Details', $Status_Details );
	
	$positiondetails->execute();
	$i=0;
	
	while($row = $positiondetails->fetch()){	
		$positiondetails_out[$i]['Client_Key']		= $row['Client_Key'];	
		$positiondetails_out[$i]['Position_Key']	= $row['Position_Key'];	
		$positiondetails_out[$i]['Position_Name']	= $row['Position_Name'];
		$positiondetails_out[$i]['Search_String']	= $row['Search_String'];
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
