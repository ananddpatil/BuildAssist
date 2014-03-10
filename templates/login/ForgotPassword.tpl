<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>{include file=$header1}
<title>Forgot Password - BuildAssist</title>
</head><body bgcolor="#D5D5D5">




<div class="span6 offset5" align="center">

<div class="row-fluid">
			<div class="span8 offset2">
			
				<img src="{$logo}" > <br/>
				<h5></h5>
				
			</div>
		</div>	

<header id="overview" class="">
  <div class="container-fluid" align="center">
    <h3>Forgot Password</h3>
  </div>
</header>

<!--SESSION MESSAGE START -->
 {if $msg}
  <div class="createuser" id="msgcan"  style="background:gold;" >
    <p style=" color:green !important; text-align:center">&nbsp;&nbsp;&nbsp; {$msg} </p>
    <br />
  </div>
  {/if}

<!--SESSION MESSAGE END -->


<form name="loginName"  id="loginName"   method="post" action="" class="well">
  <label>Enter Username (Registered EMail)</label>
  
  <input name="username" type="text"  id="username" class="span4"   tabindex="1"  maxlength="50" />
  
  <br/>
  
   <!--Re-CAPTCHA Inserted by Anand START-->
         <!-- <td align="center" colspan="2"> {$captcha} -->
            <!--Re-CAPTCHA Inserted by Anand END-->
			
	<br/>
	
	<input name="Submit"  type="Submit" class="btn btn-primary" id="Submit" value="Send me Password Reset Link" tabindex="3" >
   <input type="reset" class="btn" value="Clear" id="Reset" name="Reset" tabindex="4" >
			
		
</form>
<div class="" align="right"> <a href="mailto:{$SITEEMAIL}">Contact Administrator</a> </div>
<div class="" align="right"> <a href="{$siteroot}">Back to Login page</a> </div>
<br/>
<br/>
<br/>
</div>

{include file=$footer2}
</body>
<script src="{$siteroot}/templates/bootstrap/js/jquery.min.js"></script>
<script src="{$siteroot}/templates/bootstrap/js/bootstrap.min.js"></script>

</html>
