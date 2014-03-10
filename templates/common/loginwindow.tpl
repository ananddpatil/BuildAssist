<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h3 id="myModalLabel">Login - BuildAssist</h3>
</div>
<div class="modal-body">
  <form class="well" name="loginName"  id="loginName" value="{$smarty.cookies.csUsremail}"  method="post" action="{$siteroot}/modules/login/logincheck.php">
    <label>Username (Registered EMail)</label>
    <input name="loginName" class="span4" type="text"  id="loginName" value="{if $smarty.cookies.csUsremail}{$smarty.cookies.csUsremail}{else}Enter E-Mail{/if}"  {literal}onblur="if(this.value==''){this.value='Enter E-Mail'}" onfocus="if(this.value=='Enter E-Mail') {this.value=''}" {/literal} maxlength="50" tabindex="1"  />
    <br/>
    <label>Password</label>
    <input name="loginPassword" type="password"    id="loginPassword" value="{if $smarty.cookies.csUsrpass}{$smarty.cookies.csUsrpass}{else}{/if}"   size="33" class="span4"  tabindex="2"  maxlength="50" />
    <br/>
    <br />
    <button class="btn btn-primary">Submit</button>
    <button class="btn">Clear</button>
    <input type="hidden" name="func" id="func" value="auth"  />
  </form>
</div>
<div class="modal-footer" align="right">
  <div class="" align="right"> <a href="{$siteroot}/ForgotPassword">Forgot Password?</a> </div>
  <div class="" align="right"> <a href="mailto:{$SITEEMAIL}">Contact Administrator</a> </div>
  <div class="" align="left"> <a href="{$siteroot}">BuildAssist Main Page</a> </div>
</div>
