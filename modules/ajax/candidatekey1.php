<?php

include_once('../../includes/SiteSetting.php'); 
#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE------------------
include_once('../../includes/cklogin.php'); 

if (isset($_GET['query']))
{


try
{
	$Search_String = '%'.$_GET['query'].'%';
	if($_GET['client_key'] != '') {$client_key = $_GET['client_key'];} else {$client_key = 0;}
	if($_GET['position_key'] != '') {$position_key = $_GET['position_key'];} else {$position_key = 0;}
	if(isset($_GET['candidate_status'])){$Status = $_GET['candidate_status'] ;} else {$Status = '0';}
		
	//Data level Security
	$WorkArea_Key = $_SESSION['WorkArea_Key'];
	
	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);

	//Retrieve the query
	$candidatedetails = $DBH->prepare('select
										Candidate_Key,
										Candidate_FullName,
										Search_String
										from
										candidate_dim
										where
										Active = 1
										and WorkArea_Key = :WorkArea_Key
										and (Client_Key = :Client_Key OR :Client_Key = 0)
										and (Position_Key = :Position_Key OR :Position_Key = 0)
										and Search_String LIKE :Search_String
										and (status = :Status OR '."'0'".' = :Status)
										LIMIT 8');
										
	$candidatedetails->bindParam(':Client_Key',$client_key);
	$candidatedetails->bindParam(':Position_Key',$position_key);
	$candidatedetails->bindParam(':WorkArea_Key', $WorkArea_Key );
	$candidatedetails->bindParam(':Search_String', $Search_String );
	$candidatedetails->bindParam(':Status', $Status );
	
	$candidatedetails->execute();
	$i=0;
	
	while($row = $candidatedetails->fetch()){	
		$candidatedetails_out[$i]['Candidate_Key']		= $row['Candidate_Key'];	
		$candidatedetails_out[$i]['Candidate_FullName']	= $row['Candidate_FullName'];	
		$candidatedetails_out[$i]['Search_String']	= $row['Search_String'];
		$i++;
		} // End of while($row = $candidatedetails->fetch()){	
		
	
	
	//IMPORTANT! Following statement returns the json query in text formart. The output needs to be prefixed with an arrayname and then parsed in json format at receiver's end
	echo json_encode($candidatedetails_out);


	
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
