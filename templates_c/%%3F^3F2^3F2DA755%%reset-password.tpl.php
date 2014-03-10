<?php /* Smarty version 2.6.19, created on 2013-08-11 22:36:29
         compiled from login/reset-password.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header1'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title>Set New Password - BuildAssist</title>
</head><body>




<div class="span6 offset5" align="center">

<div class="row-fluid">
			<div class="span8 offset2">
			
				<img src="<?php echo $this->_tpl_vars['logo']; ?>
" > <br/>
				<h5></h5>
				
			</div>
		</div>	

<header id="overview" class="">
  <div class="container-fluid" align="center">
    <h3>Set New Password </h3>
  </div>
</header>

<!--SESSION MESSAGE START -->
 <?php if ($this->_tpl_vars['msg']): ?>
  <div class="createuser" id="msgcan"  style="background:gold;" >
    <p style=" color:green !important; text-align:center">&nbsp;&nbsp;&nbsp; <?php echo $this->_tpl_vars['msg']; ?>
 </p>
    <br />
  </div>
  <?php endif; ?>

<!--SESSION MESSAGE END -->


<form action="" method="POST" name="Updateusers" id="Updateusers" class="well" >

  <label>Enter New Password</label>
  <input   class="span4" type="password" name="password" id="password" tabindex="1" value="" maxlength="50" placeholder="Enter Password">

  <br/>
  <label>Confirm Password</label>
  <input  class="span4" type="password" name="rpassword" id="rpassword" tabindex="2" value="" maxlength="50" placeholder="Confirm Password">
  <br/>
  <br/>
  <!--Re-CAPTCHA Inserted by Anand START-->
  <?php echo $this->_tpl_vars['captcha']; ?>

  <!--Re-CAPTCHA Inserted by Anand END-->
  <br />
  <input name="Submit"  type="Submit" class="btn btn-primary" id="Submit" value="Set Password" tabindex="3" >
   
  <input type="reset" class="btn" value="Clear" id="Reset" name="Reset" tabindex="4" >
  
  
</form>
<div class="" align="right"> <a href="<?php echo $this->_tpl_vars['siteroot']; ?>
">Back to Main page</a> </div>
<div class="" align="right"> <a href="mailto:<?php echo $this->_tpl_vars['SITEEMAIL']; ?>
">Contact Administrator</a> </div>
<br/>
<br/>
<br/>
</div>

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
        \'Your password must contain at least one digit.\'
    );  
 
    jQuery.validator.addMethod(
        \'ContainsAtLeastOneCapitalLetter\',
        function (value) { 
            return /[A-Z]/.test(value); 
        },  
        \'Your password must contain at least one capital letter.\'
    );
	
	jQuery(document).ready(function() {
	
	 jQuery("#Updateusers").validate({
		errorElement:\'div\',
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
'; ?>


<!--JQUERY VALIDATOR ENDS -->

</html>