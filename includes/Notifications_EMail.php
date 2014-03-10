<?php
include_once('../../includes/SiteSetting.php');
include_once('../../includes/classes/validation.php'); 
include_once('../../includes/cklogin.php'); 

//Include below for sending Gmails
include_once('../../includes/smtp_send_gmail.php'); 

//Include this function for validating emails
// http://stackoverflow.com/questions/3314493/check-for-valid-email-address
//returns the email if it is valid, or FALSE if not.
function checkEmail( $email ){
    return filter_var( $email, FILTER_VALIDATE_EMAIL );
} //function checkEmail( $email ){

function Notify_via_Email($SalesEmp, $Functionality, $EMail_Customer, $Cust_FName, $Cust_LName, $rowunit_info[] )
{
try {
	    $DBH = new PDO("mysql:host=".HST.";dbname=".DBN, USR, PWD); 

		// EMAIL SECTION START
		  // EMAIL SECTION START
		  // EMAIL SECTION START
		  // EMAIL SECTION START
		  // EMAIL SECTION START
		  
		  //FETCH SALES EMPLOYEE DETAILS - START
			
			$SalesEmpDetails = $DBH->prepare(' 
			SELECT
				 tbl_sales_emp.email,
				 tbl_sales_emp.first_name,
				 tbl_sales_emp.last_name 
				
				FROM  tbl_sales_emp 
				
				where  tbl_sales_emp.status = '."'active'".'
				and sales_empl_id = :sales_empl_id
				and (Company_id= '.$_SESSION['duUserCompanyId'].' OR '.$_SESSION['duUserTypeId'].' = 1)
			');
			$SalesEmpDetails->bindParam(':sales_empl_id',$SalesEmp);
			$SalesEmpDetails->execute();
			$SalesEmpDetails_row = $SalesEmpDetails->fetch()	;
			
			$smarty->assign('SalesEmpDetails_row',$SalesEmpDetails_row );
			
			// FETCH SALES EMPLOYEE DETAILS - END
		  
		  	// SET THE FUNCTIONALITY FOR E-MAIL
			$smarty->assign('Functionality',$Functionality );
			
			// FETCH NOTIFICATION SETTINGS - START
			
			
			$notification_details = $DBH->prepare(' 
								SELECT
								 tbl_notification_central.Functionality,
								 tbl_notification_central.SMS_Customer,
								 tbl_notification_central.EMail_Customer,
								 tbl_notification_central.SMS_Sales,
								 tbl_notification_central.EMail_Sales,
								 tbl_notification_central.SMS_Accounting,
								 tbl_notification_central.EMail_Accounting,
								 tbl_notification_central.SMS_Management,
								 tbl_notification_central.EMail_Management
								
								FROM 
								tbl_notification_central
								
								inner join
								mast_company
								on (tbl_notification_central.Company_id = mast_company.Company_id)
								
								left outer join
								tbl_sales_emp
								on (tbl_sales_emp.sales_empl_id = tbl_notification_central.sales_empl_id)
								
								where
								
								mast_company.Status = '."'Active'".'
								and tbl_notification_central.Status = '."'Active'".'
								and (tbl_notification_central.Company_id = '.$_SESSION['duUserCompanyId'].' OR '.$_SESSION['duUserTypeId'].' = 1)
								and tbl_notification_central.Functionality  = :Functionality
								');

					$notification_details->bindParam(':Functionality',$Functionality );
					$notification_details->execute();										
					$notificationdetails = $notification_details->fetch();
						

			
			// FETCH NOTIFICATION SETTINGS - END
			
			// FETCH EMAILS FOR EMAILING THE TRANSACTION TO - START
			
			$fetch_noti_email_address = $DBH->prepare(' SELECT 
														Sales_Email,
														Accounting_Email,
														Management_EMail,
														Phone_No_for_Print,
														CompanyName_for_Print,
														current_timestamp
														
														FROM tbl_project_details
														where
														(Company_id= '.$_SESSION['duUserCompanyId'].' OR '.$_SESSION['duUserTypeId'].' = 1)
														and Project_Id = :Project_Id
														and Status = '."'Active'".'');
			$fetch_noti_email_address->bindParam(':Project_Id',$rowunit_info['Project_Id']);
			
			$fetch_noti_email_address->execute();
			$fetch_noti_email_address_row = $fetch_noti_email_address->fetch()	;
			$smarty->assign('fetch_noti_email_address_row',$fetch_noti_email_address_row );
			
			
			// FETCH EMAILS FOR EMAILING THE TRANSACTION TO - END
			
			
			if(	$notificationdetails['EMail_Customer'] == 'Yes' || $notificationdetails['EMail_Sales']	== 'Yes' || 
				$notificationdetails['EMail_Accounting'] == 'Yes' || $notificationdetails['EMail_Management'] == 'Yes')// if
			{
			
			//checkEmail function is added above.
			if ( 	checkEmail($fetch_noti_email_address_row['Sales_Email']) 		|| 
					checkEmail($fetch_noti_email_address_row['Accounting_Email']) 	|| 
					checkEmail($fetch_noti_email_address_row['Management_EMail'])	||
					// CUSTOMER EMAIL DETAILS HAVE CHANGED HERE FOR THIS PHP
					checkEmail($EMail_Customer) //if
			{
							
			//ASSIGN STUFF TO SMARTY TEMPLATE
			$smarty->assign('Cust_FName',$Cust_FName );
			$smarty->assign('Cust_LName',$Cust_LName );
			$smarty->assign('Unit_info',$rowunit_info);
												
			$body = $smarty->fetch(TEMPLATEDIR."/modules/Booking/EMailBooking.tpl"); 
			// UNIT DETAIL SOURCES HAVE CHANGED HERE FOR THIS PHP
			$mail->Subject = "Notification: New Booking for Unit No: ".$rowunit_info['Unit_No']." - Project: ".$rowunit_info['Project']." - Building: ".$rowunit_info['Building_Id'];
			$mail->MsgHTML($body);
	
			// ADD EMAIL ADDRESSES - START	
			// CUSTOMER EMAIL DETAILS HAVE CHANGED HERE FOR THIS PHP
			if($notificationdetails['EMail_Customer'] == 'Yes' && checkEmail($EMail_Customer))
			{$mail->AddAddress($EMail_Customer,$Cust_FName.' '.$Cust_LName);}
			
			if($notificationdetails['EMail_Sales'] == 'Yes' && checkEmail($fetch_noti_email_address_row['Sales_Email']))
			{$mail->AddAddress($fetch_noti_email_address_row['Sales_Email'],"Sales");}
			
			if($notificationdetails['EMail_Accounting']	== 'Yes' && checkEmail($fetch_noti_email_address_row['Accounting_Email']) )
			{$mail->AddAddress($fetch_noti_email_address_row['Accounting_Email'],"Accounting");}
			
			if($notificationdetails['EMail_Management']	== 'Yes' && checkEmail($fetch_noti_email_address_row['Management_EMail']) )
			{$mail->AddAddress($fetch_noti_email_address_row['Management_EMail'],"Management");}
						
			// ADD EMAIL ADDRESSES - END	
			
			if(!$mail->Send()) {
			  file_put_contents(EMAILLOG, 'Notification email for transaction id '.$Payment_Transaction_Id.' FAILED', FILE_APPEND); 
			  $DBH= NULL;
			   return(TRUE);
				}  // if(!$mail->Send())
			else
			{ 	$DBH= NULL;
				return(FALSE);
			}
	
			
						
			} // END // if ( 	checkEmail($fetch_noti_email_address_row['Sales_Email']) 		|| 
					//	checkEmail($fetch_noti_email_address_row['Accounting_Email']) 	|| 
					//	checkEmail($fetch_noti_email_address_row['Management_EMail'])	) //if
			
			} //END	//if(	$notificationdetails['EMail_Customer']		== 'Yes' || $notificationdetails['EMail_Sales']			== 'Yes' || 
					//$notificationdetails['EMail_Accounting']	== 'Yes' || $notificationdetails['EMail_Management']	== 'Yes')// if
			
			//EMAIL THE TRANSACTION DETAILS TO ACCOUNTS AND SALES EMAIL IDS - END
		
				  
		  // EMAIL SECTION END
		  // EMAIL SECTION END
		  // EMAIL SECTION END
		  // EMAIL SECTION END
		  // EMAIL SECTION END


		$DBH= NULL;
		
	 } //try
		catch(PDOException $e)
		{
		echo $e->getMessage();
		file_put_contents(DBLOG, $e->getMessage(), FILE_APPEND); 
		$DBH= NULL;
		exit; 
		} // catch(PDOException $e)
		
	} //function Notify_via_Email()
?>