<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>{include file=$header1}
<title>Set New Password - Activity Sheet</title>
</head><body>
<header id="overview" class="">
  <div class="container-fluid offset5">
    <h3>Set New Password - Activity Sheet</h3>
  </div>
</header>
<div class="span6 offset5">

<!--SESSION MESSAGE START -->
 {if $msg}
  <div class="createuser" id="msgcan"  style="background:gold;" >
    <p style=" color:green !important; text-align:center">&nbsp;&nbsp;&nbsp; {$msg} </p>
    <br />
  </div>
  {/if}

<!--SESSION MESSAGE END -->

 <form action="" method="POST" name="Updateusers" id="Updateusers"  >

  <label>Enter New Password</label>
  <input   class="span4" type="password" name="password" id="password" tabindex="1" value="" maxlength="50" placeholder="Enter Password">

  <br/>
  <label>Confirm Password</label>
  <input  class="span4" type="password" name="rpassword" id="rpassword" tabindex="2" value="" maxlength="50" placeholder="Confirm Password">
  <br/>
  <br/>
  <!--Re-CAPTCHA Inserted by Anand START-->
  {$captcha}
  <!--Re-CAPTCHA Inserted by Anand END-->
  <br />
  <input name="Submit"  type="submit" class="btn btn-primary" id="Submit" value="Set Password" tabindex="3" >
   
  <input type="reset" class="btn" value="Clear" id="Reset" name="Reset" tabindex="4" >
  
</form>
<div class="" align="right"> <a href="{$siteroot}/ForgotPassword">Forgot Password?</a> </div>
<div class="" align="right"> <a href="mailto:{$SITEEMAIL}">Contact Administrator</a> </div>
</body>
<script src="{$siteroot}/templates/bootstrap/js/jquery.min.js"></script>
<script src="{$siteroot}/templates/bootstrap/js/bootstrap.min.js"></script>

<!--jquery validator -START -->
<script src="{$siteroot}/js/jquery-latest.js"></script>
<script type="text/javascript" src="{$siteroot}/js/jquery.validate.js"></script>
{literal}
<script type="text/javascript">
	jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
}, "Letters only please"); 
	
  jQuery.validator.addMethod(
        'ContainsAtLeastOneDigit',
        function (value) { 
            return /[0-9]/.test(value); 
        },  
        'Your password must contain at least one digit.'
    );  
 
    jQuery.validator.addMethod(
        'ContainsAtLeastOneCapitalLetter',
        function (value) { 
            return /[A-Z]/.test(value); 
        },  
        'Your password must contain at least one capital letter.'
    );
	
	jQuery(document).ready(function() {
	
	 jQuery("#Updateusers").validate({
		errorElement:'div',
		rules: {
				password  :	{	required: true,								rangelength: [6, 14],
								ContainsAtLeastOneDigit: true,
								ContainsAtLeastOneCapitalLetter: true},
				rpassword   :	{	required: true,equalTo:"#password"}
					
			},				
		messages: {
			password: {
				required: "Please provide new password."
				
				
			},
			rpassword:{
				required: "Please retype password.",
				equalTo:"The passwords you entered do not match."
			}
		}
	});	
	
});
</script>
{/literal}

<!--JQUERY VALIDATOR ENDS -->

</html>
