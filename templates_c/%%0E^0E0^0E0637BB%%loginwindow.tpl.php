<?php /* Smarty version 2.6.19, created on 2013-08-30 05:01:35
         compiled from common/loginwindow.tpl */ ?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h3 id="myModalLabel">Login - BuildAssist</h3>
</div>
<div class="modal-body">
  <form class="well" name="loginName"  id="loginName" value="<?php echo $_COOKIE['csUsremail']; ?>
"  method="post" action="<?php echo $this->_tpl_vars['siteroot']; ?>
/modules/login/logincheck.php">
    <label>Username (Registered EMail)</label>
    <input name="loginName" class="span4" type="text"  id="loginName" value="<?php if ($_COOKIE['csUsremail']): ?><?php echo $_COOKIE['csUsremail']; ?>
<?php else: ?>Enter E-Mail<?php endif; ?>"  <?php echo 'onblur="if(this.value==\'\'){this.value=\'Enter E-Mail\'}" onfocus="if(this.value==\'Enter E-Mail\') {this.value=\'\'}" '; ?>
 maxlength="50" tabindex="1"  />
    <br/>
    <label>Password</label>
    <input name="loginPassword" type="password"    id="loginPassword" value="<?php if ($_COOKIE['csUsrpass']): ?><?php echo $_COOKIE['csUsrpass']; ?>
<?php else: ?><?php endif; ?>"   size="33" class="span4"  tabindex="2"  maxlength="50" />
    <br/>
    <br />
    <button class="btn btn-primary">Submit</button>
    <button class="btn">Clear</button>
    <input type="hidden" name="func" id="func" value="auth"  />
  </form>
</div>
<div class="modal-footer" align="right">
  <div class="" align="right"> <a href="<?php echo $this->_tpl_vars['siteroot']; ?>
/ForgotPassword">Forgot Password?</a> </div>
  <div class="" align="right"> <a href="mailto:<?php echo $this->_tpl_vars['SITEEMAIL']; ?>
">Contact Administrator</a> </div>
  <div class="" align="left"> <a href="<?php echo $this->_tpl_vars['siteroot']; ?>
">BuildAssist Main Page</a> </div>
</div>