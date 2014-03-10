<?php 

/* 
* Smarty plugin 
* ------------------------------------------------------------- 
* Type: modifier 
* Name: money_format 
* File: modifier.money_format.php 
* Purpose: format currency amount 
* Input: string: money value 
* decimals: number of decimal places 
* dec_point: string for decimal 
* thousands_sep: string for thousands separation 
* Example: {$value|money_format:2:".":","} 
* Author: Gabriel Birke <birke {at} kontor4.de> 
* Modfied By: Desean [http://www.eighteencharacters.com] 
* Modification: Check if string is numeric first 
* Source URL: http://marc.theaimsgroup.com/?l=smarty-general&m=104972875929464&w=2 
* Date: 2003-04-07 15:19:14 
* Modfied on: 16 Aug 2003 
*/ 

function smarty_modifier_money_format_inr($number,$currency='INR') 
{ 
	$s=explode(".",$number);
	//print_r($s);
	$fl=$s[1];
	
	$num=$s[0];
    if(strlen($num)>3){ 
	 		$explrestunits ='';
            $lastthree = substr($num, strlen($num)-3, strlen($num)); 
            $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits 
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping. 

            $expunit = str_split($restunits, 2); 
            for($i=0; $i<sizeof($expunit); $i++){ 
                $explrestunits .= $expunit[$i].","; // creates each of the 2's group and adds a comma to the end 
            }    

            $thecash = $explrestunits.$lastthree; 
    } 
	else
	{ 
           $thecash = $num;//'';$convertnum; 
    } 
    
    return $currency.ltrim($thecash.".".$fl, "0"); // writes the final format where $currency is the currency symbol. 
} 

/* vim: set expandtab: */ 

?>