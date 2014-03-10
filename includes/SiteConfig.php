<?php

$application = "local";
//$application = "web";

if($application == "local")
{
	define("HST", 		"localhost");
	define("USR", 		"root");
	define("PWD", 		"");
	define("DBN", 		"buildassist");
	define("DBTYPE",	"mysql");
}
else
{

   define("HST", 		"localhost");
   define("USR", 		"root");
   define("PWD", 		"");
   define("DBN", 		"buildassist");
   define("DBTYPE", 	"mysql");
   
}

	define("SITEEMAIL", "pinn.alerts@gmail.com");	//Insert GMail address
	define("ITservices", "pinn.alerts@gmail.com");
	define("SUPPORT","pinn.alerts@gmail.com");
	//define("SITEROOT", "http://182.50.129.194:80/sales");
	define("SITEROOT", "http://localhost:8080/buildassist");

	define("DBLOG", "C:\wamp\logs\DBLOG.TXT");
	
	define("EMAILLOG", "C:\wamp\logs\EMAIL.TXT");
	
//  define("PDF_Dump", "C:/Workspace/zendy/public/sales/PDF_Dump/");
	
	error_reporting(E_ALL ^ E_NOTICE);
?>