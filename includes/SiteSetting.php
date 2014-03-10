<?php
session_start();

include_once("DBRecords.php");

include_once("libs/Smarty.class.php");

$smarty = new Smarty;

$smarty->compile_check = true;

$SSdbObj=$dbObj;

$dbObj->is_valid_browser();

//define("SITEJS", SITEROOT."/js");

//define("TEMPLATEDIR", "default");

define("TEMPLATEDIR", SITEROOT."/templates");

define("LOGO", SITEROOT."/templates/bootstrap/img/BuildAssistLogo_v4.png");

define("SITELANGUAGE", "ENGLISH");

define("SITETITLE","SITETITLE");

define("GOOGLEMAPKEY", "GOOGLEMAPKEY");

//define("SITEIMG", SITEROOT."/templates/".TEMPLATEDIR."/images");

//define("SITECSS", SITEROOT."/templates/".TEMPLATEDIR."/css");



$smarty->assign("siteroot", SITEROOT);

$smarty->assign("sitetitle", SITETITLE);

$smarty->assign("templatedir", TEMPLATEDIR);

$smarty->assign("siteimg", SITEIMG);

$smarty->assign("logo", LOGO);


$smarty->assign("sitecss", SITECSS);

$smarty->assign("header1", 'common/header1.tpl');	

$smarty->assign("footer2", 'common/footer2.tpl');

$smarty->assign("navbar1", 'common/navbar1.tpl');
	
$smarty->assign("navbar2", 'common/navbar2.tpl');

$smarty->assign("loginwindow", 'common/loginwindow.tpl');

$smarty->assign("message", 'common/message.tpl');	

			// FOLLOWING IS FOR DISPLAY NAME IN THE NAVBAR
			$smarty->assign("displayname", $_SESSION['displayname']);
			$smarty->assign("contactname", $_SESSION['contactname']);

function con2mysql($date) {
  $date = explode("/",$date);
  if ($date[0]<=9) 
  { $date[0]=$date[0]; }
  if ($date[1]<=9) 
  { $date[1]=$date[1]; }
  $date = array($date[2], $date[1], $date[0]);
 
 return $n_date=implode("-", $date);
 }
?>