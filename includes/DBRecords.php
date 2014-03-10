<?php 
include_once("SiteConfig.php");

Class DBTransact {
	
	function Connect() 
	{	
		mysql_connect(HST, USR, PWD) OR die("Failed Connecting To Mysql");
		mysql_select_db(DBN) OR die("Failed Connecting To Database");
		//include_once("../libs/Smarty.Class.php");

	}
	
	function Close() 
	{	
		mysql_close() OR die("Failed To Close Connection.");
	}
	
	
	function customqry($qry, $prn)
	{
		$rs=@mysql_query($qry);
		if($prn)
			echo $qry;
		return $rs;
	}

	/**************************************************************************************
	
	*	1. globalselect($tblname, $wherefields, $wherevalues, $orderbyfield, $ad)
	*	Select records from table.
	***************************************************************************************/

	function cgs($tbl, $sf, $wf, $wv, $ob, $ot, $prn)
	{
	 
		$sql = "SELECT ";
		if(is_array($sf))
		{
			$fields = implode(",", $sf);
		}
		else
		{
			if($sf)
			$fields = $sf;
			else
			$fields = "*";
		}
		if(is_array($wf))
		{
			if(sizeof($wf) > 0)
			{
				for($j=0; $j<sizeof($wf); $j++)
				{  
					if(is_numeric($wv[$j]))//strstr($wv[$j],".") && !strstr($wv[$j],"@"))
					$condition.= " " . $wf[$j] ."=". $this->quotes_to_entities($wv[$j]). " ";
					else
					$condition.= " " . $wf[$j] ."='". $this->quotes_to_entities($wv[$j]). "' ";
					
					if($j<sizeof($wf)-1)
					$condition .= " and "; 
				}
			}	
		}
		else
		{
			if($wf)
			$condition = " $wf = '$wv' ";
			else
			$condition ="1";
		}
		
	
		$query = $sql.''.$fields." FROM ".$tbl." WHERE ".$condition;
		if($ob)
		{
			$query.=" ORDER BY ".$ob;
		}
		
		if($ot)
		{
			$query.=" ".$ot;
		}
		if($prn)
		{
			echo $query;
		}

		$result = @mysql_query($query) or die(mysql_error());
		$num = @mysql_num_rows($result);
		if($num<1)
		{
			$retval = "n";
		}
		else
		{
			$retval = $result;
		}

		return $retval;
	}
/*****************************************************************************************************************

*	1. globalchkexist($tblname,$wherefield,$wherevalue);
*	Check wheather the particular value exist in the table or not.
*****************************************************************************************************************/
	function globalchkexist($tblname, $wherefields, $wherevalues, $prn)
	{
		$query.=" SELECT * FROM  ".$tblname ;			 
		if(is_array($wherefields))
		{
			if(sizeof($wherefields) > 0)
			{
				for($j=0; $j<sizeof($wherefields); $j++)
				{
					if(strstr($wherevalues[$j],".") && !strstr($wherevalues[$j],"@"))
					$condition.= " $wherefields[$j] = $wherevalues[$j] ";
					else
					$condition.= " $wherefields[$j] = '$wherevalues[$j]' ";
					
					if($j<sizeof($wherefields)-1)
					$condition .= " and "; 
				}
			}	
		}
		else
		{
			if($wherefields)
			$condition = " $wherefields = '$wherevalues' ";
			else
			$condition ="1";
		}
		
		/*if($wherefield)
		{
			$condition.=" $wherefield = '$wherevalue' ";
		}
		else
		{
			$condition ="1";
		}*/
		
		 $query.=" WHERE $condition ";
		//echo "<br>asa".$query;		
		//die;

		if($prn==1)
		{
			echo $query;exit;
		}
		$result = @mysql_query($query) or die(mysql_error());
		
		//return (@mysql_num_rows($result) > 0)?true:false;
		$mm = @mysql_num_rows($result);
		if($mm=="")
		{
			$a =0;
		}
		else if($mm==0)
		{
			$a = 0;
		}
		else
		{
			$a = $mm;
		}
		return $a;
	}	
     function cgii($tbl, $flvl, $prn){
		$tblname = $tbl;
		$fields = array_keys($flvl);
		$values = array_values($flvl);
	
		$sql.= "INSERT INTO ".$tblname." "; 
		
		$fieldnames.="(";
		if(is_array($fields))
		{
			for($i=0; $i<sizeof($fields); $i++)
			{
				$fieldnames.= $fields[$i];
				if($i<sizeof($fields)-1)
				$fieldnames.= ", ";
			}
			$fieldnames.= ") ";
			
			$value.= " VALUES (";
			if(sizeof($values) > 0)
			{
				for($i=0; $i<sizeof($values); $i++)
				{
					$value.= "'". $this->quotes_to_entities($values[$i])."'";
					//$value.= "'".$this->sanitize($values[$i])."'";
					if($i<sizeof($values)-1)
					$value.= ", ";
				}	
			}	
			$value.= ")";
		}
		else
		{
			$fieldnames .= $fields.')';
			$value = " VALUES "."('".$values."')";
		}
		 $query = $sql.$fieldnames.$value;
		if($prn)
		{
			echo $query;
		}

		$result = @mysql_query($query) or die(mysql_error());
		return mysql_insert_id();
	}
	
	
	
		
		function not_login_admin()
		{
			if(!$_SESSION['duAdmId'])
			{
				$url_s=base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				header("Location:".SITEROOT."/admin/login/home.php?mode=nologin&url_s=".$url_s);
				exit;
			}
		}
	/**********************************************************************************
	
	*	1. globalinsert($tblname, $fields,$values);
	*	Insert record into the table.
	*****************************************************************************************/
	function cgi($tbl, $fl, $vl, $prn)
	{

	$tblname = $tbl;
	$fields = $fl;
	$values = $vl;
 
		$sql.= "INSERT INTO ".$tblname." "; 
		
		$fieldnames.="(";
		if(is_array($fields))
		{
			for($i=0; $i<sizeof($fields); $i++)
			{
				$fieldnames.= $fields[$i];
				if($i<sizeof($fields)-1)
				$fieldnames.= ", ";
			}
			$fieldnames.= ") ";
			
			$value.= " VALUES (";
			if(sizeof($values) > 0)
			{
				for($i=0; $i<sizeof($values); $i++)
				{
					$value.= "'". $this->quotes_to_entities($values[$i])."'";
// 					$value.= "'". $this->sanitize($values[$i]) ."'";
					if($i<sizeof($values)-1)
					$value.= ", ";
				}	
			}	
			$value.= ")";
		}
		else
		{
			$fieldnames .= $fields.')';
			$value = " VALUES "."('".$values."')";
// 			$value = " VALUES "."('". $this->sanitize($values) ."')";
		}
		 $query = $sql.$fieldnames.$value;
		if($prn)
		{
			echo $query;
		}

		$result = @mysql_query($query) or die(mysql_error());
		return mysql_insert_id();
	}	
	
	
	/******************************************************************
	
	*	1. globaldelete($tblname,$wherefield,$wherevalue);
	*	Delete particular record from the table.
	**********************************************************************/

	function gdel($tbl, $wf, $wv, $prn)
	{
		
		$query.=" DELETE FROM  ".$tbl ;			 
		if(is_array($wf))
		{
			if(sizeof($wf) > 0)
			{
				for($j=0; $j<sizeof($wf); $j++)
				{			
					
					$condition.=" $wf[$j] = '$wv[$j]'";
					if($j<sizeof($wf)-1)

					$condition.=" and";
						
				}
			}
		}
		else
		{
			$condition = "$wf = '$wv'";
		}
		$query.=" WHERE $condition ";
		if($prn)
		{
			echo $query;
			
		}
		$result = @mysql_query($query) or die(mysql_error());
		return $result;

	}	

	/***********************************************************************************
	
	*	1. cupdt($tblname,$setfield,$setvalue,$wherefields,$wherevalues);
	*	Update record in the table.
	*******************************************************************************************/

	function cupdt($tbl, $sf, $sv, $wf, $wv, $prn)
	{
		$query.=" UPDATE ".$tbl." SET " ;			 
		
		/* Here updating fields and values are composed */
		
		if(is_array($sf))
		{
			if(sizeof($sf) > 0)
			{
				for($j=0; $j<sizeof($sf); $j++)
				{			
					$update_vars.= " $sf[$j] = '" . $sv[$j] . "' ";
					
					if($j<sizeof($sf)-1)
					$update_vars .= ", "; 
				}
			}
		}
		else
		{
			$update_vars.= " $sf = '" . $sv . "' ";
		}
			
		$query.= $update_vars;
		
		/*Here condition is created*/
		
		if(is_array($wf))
		{
			if(sizeof($wf) > 0)
			{
				for($k=0; $k<sizeof($wf); $k++)
				{			
					$condition.= " $wf[$k] = '$wv[$k]' ";
					
					if($k<sizeof($wf)-1)
					$condition .= " and "; 
				}
			}
		}	
		else
		{
			if($wf)
				$condition = $wf." = '$wv' ";
			else
				$condition="1";
		}
		$query.= " WHERE $condition ";
		if($prn==1)
		{
			echo $query;
		}
		$result = @mysql_query($query) or die(mysql_error());
		return $result;
	}
	

	/*********************************************************************************
	* Function : Creating for complex join query by passing directly condition string
	*  
	* Validation Type: PHP Server Side
	* globaljoinquery($tblname, $selectfields , $condition, $orderbyfield, $groupby, $ad, $limit)
	
	*********************************************************************************/

	function gj($tbl, $sf , $cd, $ob, $gb, $ad, $l, $prn)
	{		
		if(is_array($sf))
		{
			$fields = implode(",", $sf);
		}	
		else
		{
			if($sf)
			$fields = $sf;
			else
			$fields = "*";
		}
		$query='';
		$query.=" SELECT ".$fields." FROM  ".$tbl ;
			
		$query.=" WHERE $cd ";
		
		if($gb)
		$query.=" group by ".$gb;

		if($ob)
		$query.=" order by ".$ob." ".$ad;
		
		
		
		if($l)
		$query.=" limit ".$l;
		if($prn!="")
		{
 		echo $query;
		}
		$result = @mysql_query($query) or die(mysql_error());
		$num = @mysql_num_rows($result);
		if($num<1)
		{
			$result = 'n';
		}
		return $result;
	}	
	
	/*****************************************************************************************************************
	
	*	1. globaldropdown($tblname, $valfield, $showfield, $orderbyfield, $condition, $selvalue)
	*
	*****************************************************************************************************************/
	function cddSmarty($tbl, $valfield, $showfield, $ob, $cdn, $selvalue, $prn)
	{
		//echo "hello";
		$query.=" SELECT ".$showfield.", ".$valfield." FROM  ".$tbl ;
		$query.=" WHERE $cdn ORDER BY ".$ob;
		if($prn)
		{
			echo $query;
		}
		$opt	='';
		$result = @mysql_query($query) or die(mysql_error());
		$num = mysql_num_rows($result);
		if($num<1)
		{
			return "n";
		}
		else
		{
			for($k=0; $k<mysql_num_rows($result); $k++)
			{
				$row=mysql_fetch_array($result);
				
				if($selvalue == $row[$valfield])
				$selected = " selected";
				else
				$selected = "";
				
				$opt	.= "<option value='".$row[$valfield]."' ".$selected.">".$row[$showfield]."</option>\n";
	
			}
			return $opt;
		}
	}	
	
	function quotes_to_entities($str)
	{	
		return str_replace(array("\'","\"","'",'"','<', '>'), array("&#39;","&quot;","&#39;","&quot;","&lt;","&gt;"), $str);
	}

// 	function not_login()
// 	{
// 		if(!$_SESSION['csUserId'])
// 		{
// 			header("Location:".SITEROOT."/modules/login");
// 		}
// 	}

	function page_back()
	{
		
		$pgback = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		return $pgback;
	}


	function not_login()
		{
// 			if(!$_SESSION['csUserId'])
// 				{	header("Location:".SITEROOT."/modules/login/index.php");	}
			if(!$_SESSION['csUserId'])
			{
				$req = str_replace("~","", $_SERVER['REQUEST_URI']);
				$url_s = base64_encode("http://".$_SERVER['HTTP_HOST'].$req);

// 				$url_s = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				header("Location:".SITEROOT."/modules/register/freeregister.php?mode=nologin&url_s=".$url_s);
				exit;
			}
		}
		
		function not_login_soft()
		{
			if(!$_SESSION['duAdmId'])
			{
				$url_s=base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				header("Location:".SITEROOT."/soft/login/home.php?mode=nologin&url_s=".$url_s);
				exit;
			}
		}
	/*********************************************************************************
	* Function :: unlink file (to : unlink file)
	
	*********************************************************************************/
	function unlink_file($path, $root='')
	{
		$path = (($root)? $root.$path : $path);
		if(file_exists($path))
		{
			//echo $path;
			unlink($path);
		}
	}
	function dir_operation($dir_name,$flag=1)
	{
		if($flag==1)
		{
			if(!is_dir($dir_name))
			{
				mkdir($dir_name,0777);
				chmod($dir_name,0777);
			}	
		}
	}

/******************************* Date Differance *********************************************/
	function dateDiffWithFormat($dformat, $endDate, $beginDate)
    {
	$date_parts1=explode($dformat, $beginDate);
	$date_parts2=explode($dformat, $endDate);
	$start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
	$end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
	return $end_date - $start_date;
    }
	
	function datediff($interval, $datefrom, $dateto, $using_timestamps = false)
	{
		/*
		$interval can be:
		yyyy - Number of full years
		q - Number of full quarters
		m - Number of full months
		y - Difference between day numbers
		(eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
		d - Number of full days
		w - Number of full weekdays
		ww - Number of full weeks
		h - Number of full hours
		n - Number of full minutes
		s - Number of full seconds (default)
		*/
		
		if (!$using_timestamps) {
		$datefrom = strtotime($datefrom, 0);
		$dateto = strtotime($dateto, 0);
		}
		$difference = $dateto - $datefrom; // Difference in seconds
		
		switch($interval) {
		
		case 'yyyy': // Number of full years
		
		$years_difference = floor($difference / 31536000);
		if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
		$years_difference--;
		}
		if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
		$years_difference++;
		}
		$datediff = $years_difference;
		break;
		
		case "q": // Number of full quarters
		
		$quarters_difference = floor($difference / 8035200);
		while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
		$months_difference++;
		}
		$quarters_difference--;
		$datediff = $quarters_difference;
		break;
		
		case "m": // Number of full months
		
		$months_difference = floor($difference / 2678400);
		while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
		$months_difference++;
		}
		$months_difference--;
		$datediff = $months_difference;
		break;
		
		case 'y': // Difference between day numbers
		
		$datediff = date("z", $dateto) - date("z", $datefrom);
		break;
		
		case "d": // Number of full days
		
		$datediff = floor($difference / 86400);
		break;
		
		case "w": // Number of full weekdays
		
		$days_difference = floor($difference / 86400);
		$weeks_difference = floor($days_difference / 7); // Complete weeks
		$first_day = date("w", $datefrom);
		$days_remainder = floor($days_difference % 7);
		$odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
		if ($odd_days > 7) { // Sunday
		$days_remainder--;
		}
		if ($odd_days > 6) { // Saturday
		$days_remainder--;
		}
		$datediff = ($weeks_difference * 5) + $days_remainder;
		break;
		
		case "ww": // Number of full weeks
		
		$datediff = floor($difference / 604800);
		break;
		
		case "h": // Number of full hours
		
		$datediff = floor($difference / 3600);
		break;
		
		case "n": // Number of full minutes
		
		$datediff = floor($difference / 60);
		break;
		
		default: // Number of full seconds (default)
		
		$datediff = $difference;
		break;
		}
		//echo $datediff;
		return $datediff;

	}
	/******************************** Date diff end here *****************************************/

	function is_location($deal_id="", $char="", $loc_type="", $search_loc_text="", $city="")
	{ 

		//echo " ".$deal_id." ".$char." ".$loc_type." ".$search_loc_text." ".$city; echo "jjjjjjj";

			$deal_info_query = $this-> cgs('tbl_deals', " offer_locations ", 'deal_id', $_GET['deal_id'], $ob, $ot, $prn);
	
			if($deal_info_query != "n")
			{
				$deal_info = mysql_fetch_assoc($deal_info_query);
			}
		
			$deal_location_explode = explode(',', $deal_info['offer_locations']);
			
			for($i=0; $i<count($deal_location_explode); $i++)
			{	
				$tables = " tbl_partner_location as tpl ";
		
				$selectfields = " tpl.loc_id, tpl.location, tpl.loc_type, tpl.address, tpl.phone ";
			
				$condition =  " tpl.loc_id = '".$deal_location_explode[$i]."' and tpl.location like '".$char."%' ";

				
				if($loc_type)
				{	
					$condition .= " and tpl.loc_type =  '".$loc_type."' ";
				}
			
				if($search_loc_text)
				{
					$condition .= " and tpl.location like '%".$search_loc_text."%' ";
				}

				if($city)
				{
					$condition .= " and tpl.city_id = '".$city."' ";
				}
				
				 $deal_location_query = $this->gj($tables, $selectfields , $condition , $order, $gb, $ad, $l, "");

				
				
				if($deal_location_query != 'n')
				{ 
					return true;
				}
								
			//	$deal_location_info[$i][0] = @mysql_fetch_assoc($deal_location_query);
				
			}

			return false;

					
			//$smarty->assign("deal_location_info", $deal_location_info);
	}

	
	function is_Partner($char)
	{
		$cnd = "p.first_name LIKE '".$char."%' AND p.isverified = 'yes'";
		$sf = "first_name, last_name, isverified";
		$rs = $this->gj("tbl_partners AS p", $sf, $cnd, "", "", "", "", "");
		if($rs != 'n')
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function secureQueryValue($value){
	
		return(urlencode(htmlspecialchars(stripcslashes(trim($value)))));
	}
	
	/*
	* Description : The following function is used to convert the data back to its original form as it was before being converted by secureQueryValue.
	* Date & Time : 05-03-2009 & 11:46
	* @param : $value
	* @access public
	* @return string
	*/
	function originalValue($value){
	
		return(htmlspecialchars_decode(urldecode(trim($value))));
	}
	/******/

	/*********************************************************************************
	* Function :: unlink file (to : unlink file)
	
	*********************************************************************************/
	function sub_str($str,$start,$end)
	{
		if(strlen($str) > $end)
			$fin_str = substr($str,$start,$end)."....";
		else
			$fin_str = $str;
			
		return $fin_str;	
	}
	
	/*********************************************************************************
	* Function :: Date format file (to : display date in below format)
	
	*********************************************************************************/
	function date_format($date)
	{
		return date("M jS, Y", strtotime($date));
	}
	
	function cntRecord($tblname, $wherefields, $wherevalues,$prn)
	{
		$query.=" SELECT * FROM  ".$tblname ;
		if(is_array($wherefields))
		{
			if(sizeof($wherefields) > 0)
			{
				for($j=0; $j<sizeof($wherefields); $j++)
				{
					$condition.= " $wherefields[$j] = '$wherevalues[$j]' ";
					
					if($j<sizeof($wherefields)-1)
					$condition .= " and "; 
				}
			}
		}	
		else
		{
			
			if($wherefields)
				$condition = $wherefields." = '".$wherevalues."'"; 
			else 
				$condition = "1";
		}
		$query.=" WHERE $condition ";
		if($prn==1)
		{
			echo $query;
		}
		$result = @mysql_query($query) or die(mysql_error());
		return @mysql_num_rows($result);
	}

	function common_ajax_paging($sql, $do_paging, $size, $ajax_params)
	{
 		//$size	= (($size) ? $size : "10");
		if($do_paging)
		{
			$res 			= $this->customqry($sql, 0);
			$numrows 		= @mysql_num_rows($res);
		
			$l			= page_limit($size);
			$output['paging']	= dispay_paging($size, $numrows, $ajax_params,$l);
			//print_r($res);
		}
		else
			$l=$size;
		if($l)
		 $sql.= " limit ".$l;
		$output['res'] = $this->customqry($sql, 0);
		return $output;
	}
	
	function is_valid_browser()
	{
		$arr = $this->browser_info();
		if($arr['name'] == 'msie' && $arr['version'] < 7)
		{
			$_SESSION['is_valid_browser'] = 0;
		}
		else
			$_SESSION['is_valid_browser'] = 1;
			
		return 	$_SESSION['is_valid_browser'];
	}

	/****************** Function get browser information *************************/
	function browser_info($agent=null) 
	{
		// Declare known browsers to look for
		$known = array('msie', 'firefox', 'safari', 'webkit', 'opera', 'netscape',
		'konqueror', 'gecko');
		
		// Clean up agent and build regex that matches phrases for known browsers
		// (e.g. "Firefox/2.0" or "MSIE 6.0" (This only matches the major and minor
		// version numbers.  E.g. "2.0.0.6" is parsed as simply "2.0"
		$agent = strtolower($agent ? $agent : $_SERVER['HTTP_USER_AGENT']);
		$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9]+(?:\.[0-9]+)?)#';
		
		// Find all phrases (or return empty array if none found)
		if (!preg_match_all($pattern, $agent, $matches)) return array();
		
		// Since some UAs have more than one phrase (e.g Firefox has a Gecko phrase,
		// Opera 7,8 have a MSIE phrase), use the last one found (the right-most one
		// in the UA).  That's usually the most correct.
		$i = count($matches['browser'])-1;
		
		//return array($matches['browser'][$i] => $matches['version'][$i]);
		$arr['name'] = $matches['browser'][$i];
		$arr['version'] = $matches['version'][$i];
		return $arr;
	}
}

$dbObj = new DBTransact();
$dbObj->Connect();
?>