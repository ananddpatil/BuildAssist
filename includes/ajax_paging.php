<?php
// quickLink
# writes out page links
function quickLink ($linkHref, $desc, $accessKey, $linkTitle) {
   $theLink = '<a href="javascript: ' . $linkHref . '" title="'. $desc .'" accesskey="'. 
                   $accessKey .'">'. $linkTitle .'</a>';
   return $theLink;

} 
// google_like_pagination.php 
function pagination($number, $show, $showing, $firstlink, $baselink, $seperator, $total_records="") {
	include_once('SiteSetting.php');
	$disp = floor($show / 2);
    if ( $showing <= $disp) :

        ///if ( ($disp - $showing) > 0 ):
        //$low  = ($disp - $showing);
        //else:
        $low = 1;
       // endif;
        $high = ($low + $show) - 1;

    elseif ( ($showing + $disp) > $number) :

        $high = $number;
        $low = ($number - $show) + 1;

    else:

        $low  = ($showing - $disp);
        $high = ($showing + $disp);

    endif;
    
    // next / prev / first / last
    if ( ($showing - 1) > 0 ) :
        if ( ($showing - 1) == 1 ):
        $prev  = quickLink ($firstlink, 'Previous', '', "<img src='". SITEROOT. "/templates/".TEMPLATEDIR."/images/icons/resultset_previous.png' align='absmiddle' />");
        else:
        $prev  = quickLink ("searchUser(" . ($showing - 1) . ");", 
        'Previous', 'z', "<img src='". SITEROOT. "/templates/".TEMPLATEDIR."/images/icons/resultset_previous.png' align='absmiddle' />");
        endif;
    else:
        $prev  = '';
    endif; 

    $next  = ($showing + 1) <= $number ? 
    quickLink ("searchUser(" . ($showing + 1) . ");", 'Next', 'x', "<img src='". SITEROOT. "/templates/".TEMPLATEDIR."/images/icons/resultset_next.png' align='absmiddle' />") : '';    

    if ( $prev == '')
    	$first = '';
    else
    	$first = quickLink ($firstlink, 'First Page', '', "<img src='". SITEROOT. "/templates/".TEMPLATEDIR."/images/icons/resultset_first.png' align='absmiddle' />");    
    
    if ( $showing == $number ):
    $last = '';    
    else:
    $last = quickLink ("searchUser(" . $number . ");", 'Last Page', '', "<img src='". SITEROOT. "/templates/".TEMPLATEDIR."/images/icons/resultset_last.png' align='absmiddle' />");
    endif;
        
    $navi = '<div id="paging"><span>'."";
    // start the navi

        $navi .= $first . ' '. $prev ." ";
    
    // loop through the numbers

    foreach (range($low, $high) as $newnumber):

           if($newnumber < 0)
		   		continue;
		   $link = ( $newnumber == 1 ) ? $firstlink : 
                "searchUser(" .$newnumber . ");";
           if ($newnumber > $number):
        $navi .= '';
        elseif ($newnumber == 0):
        $navi .= '';
        else:
        $navi .= ( $newnumber == $showing ) ? 
            ' <b>'. $newnumber .'</b> '."" :
            ' '. quickLink ($link, 'Page '. $newnumber, '', $newnumber) ." "; 
        endif;                   
    endforeach;    
    
	$navi .= ' '. $next ." " . $last;
	
	if($total_records)
		$navi .= " &nbsp; &nbsp; " . $total_records . " Records Found&nbsp; ";
            
    $navi .= '</span></div><br/>';
    
	return $navi;    

}
?>