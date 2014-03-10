<?php
	function curPageURL() {
	 $pageURL = 'http';
	 //Uncommeneted below by Anand on 3 Jan 2013
		if ($_SERVER['SERVER_PORT'] == 443){$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}
	
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
		// last request was more than 30 minates ago
		session_destroy();   // destroy session data in storage
		session_unset();     // unset $_SESSION variable for the runtime
	}	
	
	$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
	$_SESSION['SESSION_EXP']="Your session has expired. Please log in again.";
	$_SESSION['pageback']=curPageURL();
	
	$fingerprint = sha1('SECRET-SALT'.$_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].$_SESSION['SESS_TOKEN']);
	
	if( !isset($_SESSION['SESS_MEMBER_ID'])  || 
	     ($_SESSION['SESS_FINGERPRINT'] != $fingerprint) || 
		 !isset($_SESSION['SESS_TOKEN']) || 
		 (trim($_SESSION['SESS_TOKEN']) == '') 
      ) 
	{
		$_SESSION['msg']='Your session has expired.<br/><br/>Please login again.';
		header("Location:". SITEROOT."/login" );
		exit();
	}
?>