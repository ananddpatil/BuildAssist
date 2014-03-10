<?php 
include_once('../../includes/SiteSetting.php');

// RECORD LOGOUT TIME - START
try {
	    $DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD);
		$add_logout_details = $DBH->prepare('update tbl_ip_login_success
											set logouttime = CURRENT_TIMESTAMP
											where
											SESSION_ID = :SESSION_ID
											');
		

		$add_logout_details->bindParam(':SESSION_ID',session_id());
		$add_logout_details->execute();
		
		session_destroy();
		header("Location: ". SITEROOT );
	
// RECORD LOGOUT TIME - END

 	} // try
	catch(PDOException $e)
	{
	//echo $e->getMessage();
	file_put_contents(DBLOG, $e->getMessage(), FILE_APPEND); 
	$DBH = NULL;
	exit; 
	} //catch(PDOException $e)



?>