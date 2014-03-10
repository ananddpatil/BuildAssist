<script type="text/javascript"  src="{$siteroot}/js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="{$siteroot}/js/jquery.validate.min.js"></script>
<link type="text/css" rel="stylesheet" href="{$sitecss}/style.css">

{literal}
<style type="text/css">
body{background:none;}
</style>
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
				password  :	{	required: true,rangelength: [6, 14],
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
<form action="" method="POST" name="Updateusers" id="Updateusers"  >
  <table width="100%" border="0" cellspacing="2" cellpadding="0">
<tbody>
{if $msg}
    <tr>
    <td colspan="4" align="center"  style="font-weight:bold; color:#008000"><div id="msg">{$msg}</div></td>
    </tr>
{/if}    
<tr>
      <th class="user"  colspan="4" style="text-align:left; padding-bottom: 20px; text-transform:capitalize">
     {$userdata.first_name} {$userdata.last_name}
    </td>    </tr>


<tr>
    <th align="left" valign="middle" class="user" style="text-align:left; width:150px; padding-left: 44px;">UserName  
    <td colspan="3">{$userdata.username} </td>
  </tr>

  <tr>
    <th width="150" align="left" valign="middle" class="user" style="text-align:left; width:150px; padding-left: 44px;">New Password
      </td>
    <font color="#FF0000">*</font>
    <td colspan="3"><input  type="password" name="password" id="password" class="userinput1 " value=""> <br />
<div htmlfor="password" generated="true" class="error" >&nbsp;</div>    </td>
    </tr>
  
 
    <th align="left" valign="middle" class="user" style="text-align:left;"><span class="user" style="text-align:left; width:150px; padding-left: 38px;">Re-Password</span>
      </td>
      <font color="#FF0000">*</font>
    <td colspan="3"><input  type="password" name="rpassword" id="rpassword" class="userinput1" value=""><br />
<div htmlfor="rpassword" generated="true" class="error" >&nbsp;</div>      </td>
    </tr>
 
    <td>&nbsp;</td>
    <td width="150"><input name="Submit" type="submit" id="Submit" value="Reset Password" style="width:115px; height:30px;"  class="button" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</tbody></table>
</form>

