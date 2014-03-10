<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>{include file=$header1}
<title>Login - BuildAssist</title>
</head><body >
<div class="span6 offset5" align="justify" >
  <!-- Modal - START -->
  <div id="myModal" class="modal">
    
	<div class="row-fluid">
     
	   
	   {if $msg}
			{include file=$message}

		{else}
		 <div class="span4 offset4"> <br/>
        		<img src="{$logo}" > <br/><br/>
      	</div>
		{/if}
    
	</div>
    {include file=$loginwindow} 
	</div>
</div>
</body>
<script src="{$siteroot}/templates/bootstrap/js/jquery.min.js"></script>
<script src="{$siteroot}/templates/bootstrap/js/bootstrap.min.js"></script>
</html>
