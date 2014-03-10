<?php
/*-----------------------followuplist.php sql_followup_list1-----------------------------------------------------*/

$cnd=" Where followupR = 'Yes' && en.enquiry_id in 
(
SELECT enquiry_id FROM tbl_follow_up follow_up
 inner join tbl_sales_emp USER
         ON follow_up.company_id = USER.company_id
         where (USER.Company_id =" .$_SESSION['duUserCompanyId']." OR ".$_SESSION['duUserTypeId']." = 1)


)";
$sf= " en.enquiry_id, p.Project, pty.project_type, cfg.configuration, 
prs.fName,prs.sName,prs.Mobile, prs.EDateofVisit ,
(SELECT next_planned_visit 	
FROM  tbl_follow_up f where f.enquiry_id=en.enquiry_id  limit 0 ,1 ) as next_planned_visit ,
(SELECT next_follow_up_adviced FROM  tbl_follow_up f where f.enquiry_id=en.enquiry_id limit 0 ,1) as next_follow_up_adviced ,
(SELECT date_time_of_follow_up 	
FROM  tbl_follow_up f where f.enquiry_id=en.enquiry_id  limit 0 ,1 ) as lastFoUP ,
(SELECT user.first_name FROM tbl_sales_emp user left join tbl_follow_up fu ON fu.sales_empl_id=user.sales_empl_id  where fu.enquiry_id=en.enquiry_id    limit 0 ,1) as first_name,
(SELECT user.last_name FROM tbl_sales_emp user left join tbl_follow_up fu ON fu.sales_empl_id=user.sales_empl_id  where fu.enquiry_id=en.enquiry_id    limit 0 ,1) as last_name ";

$sql_followup_list1="SELECT ".$sf." from tbl_prospect prs left 
	join tbl_enquiry en on prs.enquiry_id=en.Enquiry_id 
	join mast_project p on p.Project_id=en.Project_id 
	join mast_project_type pty on pty.project_type_id=en.Project_Type_id
	join mast_configuration cfg on cfg.configuration_id=en.Configuration_id ".$cnd."  Order by    next_follow_up_adviced,next_planned_visit ASC  ";
/*-----------------------followuplist.php sql_followup_list1 end -----------------------------------------------------*/

/*-----------------------insert_This_Follow_up_qry-----------------------------------------------------*/
$cd="where enquiry_id ='".$_GET['en_id']."'";
$FachAll_PastFollow_ups="SELECT fw.*,us.first_name,us.last_name,rcl.FReasonClose, dbook.Reason_for_Delay_in_Booking FROM  tbl_follow_up fw left join tbl_sales_emp us on fw.sales_empl_id=us.sales_empl_id JOIN mast_reason_for_delay_in_booking dbook ON  dbook.ReasonB_id=fw.delay_reson	JOIN mast_freasonclose rcl ON  rcl.id=fw.reson_for_close where enquiry_id ='".$_GET['en_id']."'  order by date_time_of_follow_up  DESC ";

/*-----------------------insert_This_Follow_up_qry end-----------------------------------------------------*/


""

?>
