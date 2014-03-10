<?php

include_once('../../includes/SiteSetting.php'); 
#-----------------------------------IF NOT LOGIN REDIRECT TO LOGIN PAGE------------------
include_once('../../includes/cklogin.php'); 

if (isset($_GET['Candidate_Key']))
{


try
{
	$Candidate_Key = $_GET['Candidate_Key'];
	
	
	//Data level Security
	$WorkArea_Key = $_SESSION['WorkArea_Key'];
	
	$DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);

	//Retrieve the query
	$candidatedetails = $DBH->prepare('select
										c.Client_Key,
										c.Position_Key,										
										c.Candidate_Key,
										c.Candidate_FullName,
										c.Source,
										c.Status,
										c.Status_Details,
										c.Agreed_CTC,
										DATE_FORMAT(date(c.Joining_Date),'."'%Y/%m/%d'".') as Joining_Date,
										p.Search_String as Position_Search_String
										from
										candidate_dim c
										inner join
										position_dim p
										on(p.Position_Key = c.Position_Key)
										where
										c.Active = 1
										and c.WorkArea_Key = :WorkArea_Key
										and c.Candidate_Key = :Candidate_Key');
										
	$candidatedetails->bindParam(':Candidate_Key',$Candidate_Key);
	
	$candidatedetails->bindParam(':WorkArea_Key', $WorkArea_Key );
	
	$candidatedetails->execute();
	$i=0;
	
	while($row = $candidatedetails->fetch()){	
		$candidatedetails_out[]	= $row;	
		$i++;
		} // End of while($row = $clientdetails->fetch()){
		
	
	
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
