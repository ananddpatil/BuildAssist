<?php /* Smarty version 2.6.19, created on 2013-08-09 07:06:15
         compiled from Register_Part1.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header1'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title>New Registration - BuildAssist</title>
</head><body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['navbar2'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--Sub header - START -->
<header id="overview" class="">
  <div class="container-fluid offset1">
    <h1>Create New Account</h1>
    <p class="lead">Post requirements &amp; get bids from your preferred as well as other rated suppliers - Buy at great rates</p>
  </div>
</header>
<!--Sub Header - END -->
<!--BODY START -->
<div class="row-fluid">
  <div class="span10 offset1">
  	<!--SESSION MESSAGE START -->
 <?php if ($this->_tpl_vars['msg']): ?>
  <div class="createuser" id="msgcan"  style="background:gold;" >
    <p style=" color:green !important; text-align:center">&nbsp;&nbsp;&nbsp; <?php echo $this->_tpl_vars['msg']; ?>
 </p>
    <br />
  </div>
  <?php endif; ?>

<!--SESSION MESSAGE END -->
  
    <!--BREADCRUMB START -->
    <ul class="breadcrumb">
      <li><a href="index.html">Home</a> <span class="divider">/</span></li>
      <li class="active">Create new account</li>
    </ul>
    <!--BREADCRUMB END -->
  </div>
  <!--<div class="span10 offset1"> -->
</div>
<!--<div class="row-fluid"> -->
<!--ALERT1 BEGINS -->
<div class="row-fluid">
  <div class="span10 offset1">
    <div class="alert alert-block">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Once you register, you will get email to set your password and a sms to confirm mobile number. You will be able to post requirements or respond to bids only after you confirm email. You will be able to get requirement alerts only after you verify mobile number. <br/>
      <br/>
      <b>IMPORTANT</b>: To prevent fake accounts, we will verify your business details within 48 hours via phone call, our references and directories checks. Accounts which cannot be verified will be locked. </div>
  </div>
  <!--<div class="span10 offset1"> -->
</div>
<!--<div class="row-fluid"> -->
<!--ALERT1 ENDS -->
<!--JOIN REQUIREMENTS FORM STARTS -->
<div class="row-fluid">
  <div class="span8 offset2">
    <!--TYPE OF USER - START -->
    <form method="post" name="RegisterUser" id="RegisterUser" >
	<div class=well>
      <div class="control-group">
        <h2>Step 1: How do you plan to use BuildAssist?</h2>
        <!-- Multiple Radios -->
        <div class="control-group">
          <label class="control-label">What do you want to do right now? (Select one)</label>
          <div class="controls">
            <label class="radio">
            <input type="radio" name="usertype" value="Buyer" checked="checked" tabindex="1" >
            Buy </label>
            <label class="radio">
            <input type="radio" name="usertype" value="Seller" tabindex="2">
            Sell </label>
          </div>
        </div>
      </div>
    </div>
    <!--TYPE OF USER - END -->
    <!--USERNAME AND PASSWORD START -->
    <div class="well">
      <div class="control-group">
        <h2>Step 2: Basic Information</h2>
        <label>Email Address</label>
        <input type="email" name="email" class="span3" tabindex="2" required="">
        <label>Password</label>
        <input type="password" name="password" id="password" class="span3" tabindex="3" required="">
		 <label>Confirm Password</label>
        <input type="password" name="rpassword" id="rpassword" class="span3" tabindex="4" required="">
        <label>Company Name</label>
        <input type="text" name="companyname" class="span3" tabindex="5" required="">
        <label>Display Name (This will be displayed to the other users on the site)</label>
        <input type="text" name="displayname" class="span3" tabindex="6" required="">
      </div>
    </div>
    <!--USERNAME AND PASSWORD END -->
    <!--CONTACT INFO START -->
    <div class="well">
      <div class="control-group">
        <h2>Step 3: Contact Details</h2>
        <!-- Text input-->
        <div class="control-group">
          <label class="control-label">Contact Name</label>
          <div class="controls">
            <input id="joinercontactname" name="joinercontactname" type="text" placeholder="FirstName LastName" class="input-xlarge" required="" tabindex="10">
            <p class="help-block">This person will be the contact point for inquires for BuildAssist.</p>
          </div>
          <label class="control-label">Mobile</label>
          <div class="controls">
            <input id="joinerphone" name="joinerphone" type="text" placeholder="NO spaces, leading 0s OR country code" class="input-xlarge" required="" tabindex="11">
            <p class="help-block">Enter mobile without spaces, leading 0s or country code. Example: Correct - 9820889289. Wrong: +91 9820 088 9289 <br/><b>Note:</b>b A verification text will be sent on this number.</p>
          </div>
        </div>
        <br/>
        <fieldset>
        <!-- address_line1 input-->
        <div class="control-group">
          <label class="control-label">Office Address</label>
          <div class="controls">
            <input id="address_line1" name="address_line1" type="text" placeholder="Address line 1"	class="input-xlarge" tabindex="12" required="">
          </div>
          <p> </p>
          <div class="controls">
            <input id="address_line2" name="address_line2" type="text" placeholder="Address line 2"	class="input-xlarge" tabindex="13">
          </div>
          <p> </p>
          <div class="controls">
            <input id="city_taluka" name="city_taluka" type="text" placeholder="City or Taluka " class="input-xlarge" tabindex="14" required="">
          </div>
          <p></p>
          <div class="controls">
            <input id="postal_code" name="postal_code" type="text" placeholder="pin code" class="input-xlarge" tabindex="15" required="">
          </div>
        </div>
        <!--<div class="control-group"> -->
        <!-- address_line2 input-->
        </fieldset>
      </div>
    </div>
    <!--CONTACT INFO END -->
    <div class=well>
      <div class="control-group">
        <!--TandC START -->
        <h2>Step 4: Agree to terms and conditions</h2>
        <br/>
        <p>
          <label class="checkbox">
          <input type="checkbox" name="TandC" value="BuildAssistTandCagreed" tabindex="21" required="">
          I agree to BuildAssist's Terms &amp; Conditions. </label>
        </p>
        <br/>
        <!--TandC END -->
        <!--BUTTON START -->
        <fieldset>
        </fieldset>
        <!--BUTTON END -->
      </div>
	   </div>   <!--<div class=well> -->
   
    <!-- Button (Double) START -->
    <div class="control-group">
      <div class="controls">
        <table>
          <tr>
            <td><button id="joinsubmit" name="joinsubmit" value="Confirm" class="btn btn-success" tabindex="22" type="submit">Send me a confirmation e-mail</button></td>
            <td>&nbsp;</td>
            <td><button id="joincancel" name="joincancel" class="btn btn-default" tabindex="23">Cancel</button></td>
          </tr>
        </table>
      </div>
    </div>
	 <!-- Button (Double) END -->
	 
	  </form>
  </div>
</div>
<!--<div class="span10 offset1"> -->
<!--<div class="row-fluid"> -->
<!--BODY ENDS -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footer2'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
<script src="<?php echo $this->_tpl_vars['siteroot']; ?>
/templates/bootstrap/js/jquery.min.js"></script>
<script src="<?php echo $this->_tpl_vars['siteroot']; ?>
/templates/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $this->_tpl_vars['siteroot']; ?>
/templates/bootstrap/js/bootstrap-datepicker.js"></script>
<?php echo '
<script>
	$(function(){
		$(\'#dp3\').datepicker();
				});
						
</script>
'; ?>


<!--jquery validator -START -->
<script src="<?php echo $this->_tpl_vars['siteroot']; ?>
/js/jquery.validate.js"></script>
<?php echo '
<script type="text/javascript">
	jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
}, "Letters only please"); 
	
  jQuery.validator.addMethod(
        \'ContainsAtLeastOneDigit\',
        function (value) { 
            return /[0-9]/.test(value); 
        },  
        \'<b>Your password must contain at least one digit.</b>\'
    );  
 
    jQuery.validator.addMethod(
        \'ContainsAtLeastOneCapitalLetter\',
        function (value) { 
            return /[A-Z]/.test(value); 
        },  
        \'<b>Your password must contain at least one capital letter.</b>\'
    );
	
	jQuery(document).ready(function() {
	
	 jQuery("#RegisterUser").validate({
		errorElement:\'div\',
		rules: {
				password  :	{	required: true,								rangelength: [6, 14],
								ContainsAtLeastOneDigit: true,
								ContainsAtLeastOneCapitalLetter: true},
				rpassword   :	{	required: true,equalTo:"#password"}
					
			},				
		messages: {
			password: {
				required: "<b>Please provide new password.</b>"
			},
			rpassword:{
				required: "<b>Please retype password.</b>",
				equalTo:"<b>The passwords you entered do not match with each other.</b>"
			}
		}
	});	
	
});
</script>
'; ?>


<!--JQUERY VALIDATOR ENDS -->



</html>