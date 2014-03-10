<?php /* Smarty version 2.6.19, created on 2013-08-10 14:33:02
         compiled from login/ForgotPassword.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header1'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title>Forgot Password - BuildAssist</title>
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
    <h3>Forgot Password</h3>
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


<form name="loginName"  id="loginName"   method="post" action="" class="well">
  <label>Enter Username (Registered EMail)</label>
  
  <input name="username" type="text"  id="username" class="span4"   tabindex="1"  maxlength="50" />
  
  <br/>
  
   <!--Re-CAPTCHA Inserted by Anand START-->
         <!-- <td align="center" colspan="2"> <?php echo $this->_tpl_vars['captcha']; ?>
 -->
            <!--Re-CAPTCHA Inserted by Anand END-->
			
	<br/>
	
	<input name="Submit"  type="Submit" class="btn btn-primary" id="Submit" value="Send me Password Reset Link" tabindex="3" >
   <input type="reset" class="btn" value="Clear" id="Reset" name="Reset" tabindex="4" >
			
		
</form>
<div class="" align="right"> <a href="mailto:<?php echo $this->_tpl_vars['SITEEMAIL']; ?>
">Contact Administrator</a> </div>
<div class="" align="right"> <a href="<?php echo $this->_tpl_vars['siteroot']; ?>
">Back to Login page</a> </div>
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

</html>