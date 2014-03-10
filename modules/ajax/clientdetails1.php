<?php

include_once('../../includes/SiteSetting.php'); 
#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE------------------
include_once('../../includes/cklogin.php'); 

if (isset($_GET['Client_Key']))
{

//Connect to database
try
{
	$Client_Key = $_GET['Client_Key'];
	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);

	//Retrieve the query
	$clientdetails = $DBH->prepare(' SELECT Client_Key, Client_Name, Status, Perct_of_CTC
										FROM client_dim
										where										
										Client_Key = :Client_Key
										and Active = 1');
	$clientdetails->bindParam(':Client_Key',$Client_Key);
	$clientdetails->execute();
	
	while($row = $clientdetails->fetch()){	
		$array[] = $row;
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
