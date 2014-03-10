<?php

include_once('../../includes/SiteSetting.php'); 
#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE------------------
include_once('../../includes/cklogin.php'); 

if (isset($_GET['query']))
{

//Connect to database
try
{
	$inputval = '%'.$_GET['query'].'%';
	if(isset($_GET['client_status'])){$Status = $_GET['client_status'] ;} else {$Status = '0';}
	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);

	//Retrieve the query
	$clientdetails = $DBH->prepare(' SELECT Client_Key, Client_Name 
										FROM client_dim
										where
										Search_String LIKE :Client_Name
										and (status = :Status OR '."'0'".' = :Status)
										and Active = 1
										');
	$clientdetails->bindParam(':Client_Name',$inputval);
	$clientdetails->bindParam(':Status',$Status);
	$clientdetails->execute();
	
	$i=0;
	
	while($row = $clientdetails->fetch()){	
		$array[$i]['Client_Key'] = $row['Client_Key'];
		$array[$i]['Client_Name'] = $row['Client_Name'];
		$i++;
		} // End of while($row = $clientdetails->fetch()){
		
	
	//Return the json query
	echo json_encode($array);
		
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

}//if (isset($_GET['query']))
?>
