<?php /* Smarty version 2.6.19, created on 2013-08-31 11:45:13
         compiled from Register_Part2.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header1'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title>New Registration - BuildAssist</title>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['navbar2'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--Sub header - START -->
<header id="overview" class="">
  <div class="container-fluid offset1">
    <h1>Member Confirmation</h1>
    <p class="lead">Welcome back to BuildAssist!</p>
  </div>
</header>
<!--Sub Header - END -->
<!--BODY START -->
<div class="row-fluid">
  <div class="span10 offset1">
  	<!--SESSION MESSAGE START -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['msg'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!--SESSION MESSAGE END -->
  
    <!--BREADCRUMB START -->
    <ul class="breadcrumb">
      <li><a href="index.html">Home</a> <span class="divider">/</span></li>
      <li class="active">Additional Information</li>
    </ul>
    <!--BREADCRUMB END -->
  
  	<!--ALERT1 BEGINS -->
<div class="row-fluid">
  <div class="span10 offset1">
    <div class="alert alert-block">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Before you can start using BuildAssist, we need some more information<br/>
      <br/>
      <b>This information will help us deliver a better and a more customized service to you. Thank you.</div>
  </div>
  <!--<div class="span10 offset1"> -->
</div>
<!--<div class="row-fluid"> -->
<!--ALERT1 ENDS -->
<!--JOIN REQUIREMENTS FORM STARTS -->
<div class="row-fluid">
  <div class="span10 offset1">
    <!--PROJ NAME - START -->
    <form method="post" name="Additional_Info" id="Additional_Info" >
		<div class=well>
			<div class="control-group">
			<h3>Step 1: Please enter your most current project name</h3>
			<label>Project Name <font color="#6C6C6C">(We assume that we will be procuring material for this project)</font></label>
			<input type="text" name="projname" class="span3" tabindex="1" required="">
		</div>
      </div>

    <!--PROJ NAME - END -->
	
    <!--PROJ STATS - START -->
    <div class="well">
      
        <h3>Step 2: Provide current status of the project</h3>
		
			<div class="input-append">
				<label>Area Planned</label>
				<input id="AreaPlanned" name="AreaPlanned" class="span8" placeholder="0" type="number" tabindex="2" required="" align="right">
				<span class="add-on">sq. ft.</span>
			</div>	
			
			<br/><br/>
			
			<div class="input-append">
				<label>Area Approved</label>
				<input id="AreaApproved" name="AreaApproved" class="span8" placeholder="0" type="number" tabindex="3" required="" align="right">
				<span class="add-on">sq. ft.</span>
			</div>	
			
			<br/><br/>
			
			<div class="input-append">
				<label>Area Construction</label>
				<input id="AreaConstruction" name="AreaConstruction" class="span8" placeholder="0" type="number" tabindex="4" required="" align="right">
				<span class="add-on">sq. ft.</span>
			</div>	
			
			
			
    </div>
	<!--PROJ STATS - END -->
   	
	    <!--CONTACT INFO START -->
    <div class="well">
	
			<h3>Step 3: Site Location</h3>
			<label>Pincode of the site</label>
			<input id="sitepincode" name="sitepincode" type="text" placeholder="Enter Pin without spaces or dashes" class="span4" required="" tabindex="10">
			<p class="help-block">A pincode will help a supplier give you an accurate transportation and tax estimate</p>
			<br/>
			<br/>
			<label>Area of the site</label>
			<select id="sitelocation" name="sitelocation" class="span4">
						<option>Select location of site</option>
					  <option>Mumbai Eastern & Central</option>
					  <option>Mumbai South</option>
					  <option>Mumbai West</option>
					  <option>Mumbai NorthWest (Goregaon-Dahisar)</option>
					  <option>Mira-Bhyander</option>
					  <option>Vasai-Virar</option>
					  <option>Palghar-Boisar</option>
					  <option>Dahanu-Umbergaon</option>
					  <option>Thane-Bhandup-Mulund</option>
					  <option>Navi Mumbai</option>
					  <option>Bhiwandi-Dombivali</option>
					  <option>Other</option>
					</select>
			<p class="help-block">Area of site is not necessary if pincode is provided</p>

	</div>
    <!--CONTACT INFO END -->
    <!-- Button (Double) START -->
    <div class="control-group">
      <div class="controls">
        <table>
          <tr>
            <td><button id="submit" name="additional_info_submit" value="Buyer" class="btn btn-success" tabindex="22" type="submit">Submit</button></td>
            <td>&nbsp;</td>
            <td><button id="cancel" name="cancel" class="btn btn-default" tabindex="23" type="reset">Cancel</button></td>
          </tr>
        </table>
      </div>
    </div>
	 <!-- Button (Double) END -->
   
	  </form>

  
  
  </div>
  <!--<div class="span10 offset1"> -->
</div>
<!--<div class="row-fluid"> -->


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
<script>
//FADE THE NOTIFICATION BOX
$("#msgcan").fadeTo(5000,1).fadeOut(2000);
</script>

<?php echo '
<script>
	$(function(){
		$(\'#dp3\').datepicker();
				});
						
</script>
'; ?>



</html>