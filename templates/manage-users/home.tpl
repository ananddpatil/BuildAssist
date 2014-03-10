{include file=$header1}

<title>User Administration Panel</title>
<script src="{$siteroot}/js/jquery-latest.js"></script>
<script type="text/javascript" src="{$siteroot}/js/jquery.validate.js"></script>

{literal}
<script type="text/javascript">
	jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
}, "Letters only please"); 
	
	
	jQuery(document).ready(function() {
	
	 jQuery("#addusers").validate({
		errorElement:'div',
		rules: {
				fname  :	{	required: true,minlength:3,lettersonly:true},
				lname   :	{	required: true,minlength:3,lettersonly:true},
				Emailid   	:	{	required: true, 
									email:true,
									remote:"modules/login/check_duplication.php"
				},
				mobile : {required: true,number:true,minlength:10},
				company : {required: true},project : {required: true},
				userrole : {required: true}
					
			},				
		messages: {
			fname: {
				required: "Please provide your First name."
				
				
			},
			lname:{
				required: "Please provide your Last name."
			},
			Emailid: {
				required: "Please provide valid email.",
				email: "Invalid email address. Please re-enter valid email.",
				remote: "This email address is already in use"
				
			},
			mobile:{
				required: "Please enter mobile no."
			},
			company:{
				required: "Please selecct company."
			},
			project:{
				required: "Please selecct project."
			},
			userrole:{
				required: "Please select userrole."
			}
		}
	});	
	jQuery("#msg").fadeOut(5000);
});

function change_src(link_src)
{
	document.getElementById("main_frm").src=link_src;
} 

/*function showPage()
{
	var company = jQuery('#company').val();
	//jQuery('#sCatDiv').html("<image src='"+site_root+"/templates/default/images/loading.gif'>");
	jQuery.get(SITEROOT+"/modules/enquiry/ajax_projects.php",{cid:company},function(data){jQuery("#project").html(data);});

}
jQuery.get(SITEROOT+"/modules/enquiry/ajax_projects.php",function(data){jQuery("#project").html(data);});*/
</script>
{/literal}
{include file=$header2}
<div class="subpagecontainer"><!--subpagecontainer START-->

        	

            <div class="toppagecontain"><!--topcontain START-->

            

            	<ul class="ul-toppage">
					<li style="background: none repeat scroll 0 0 transparent; padding-left:0px;"><a href="{$siteroot}"><img src="{$siteimg}/home.png" border="0" /></a></li>
                	<li>User Administration Panel</li>

                </ul>

            

            </div><!--topcontain END-->

            

            <div class="middlepagecontain"><!--middlepagecontain START-->



<!----------------------------Start to create User Administration Panel Form-------------->  

            	

                <div class="createuser"><!--createuser START-->

                

                	<p>Create User</p>

                    
						
                     <form action="" method="POST" name="addusers" id="addusers" >
 {if $msg}
 <table width="100%" border="0" id="msg">
                            <tr>
                            <th align="center"  style="text-align:center; color:red;">{$msg}</th>
                            </tr>
                            </table>
                        {/if}
                	<table width="100%" border="0">

                       
                                             
                                             
                                             
                        <tr>

                      

                        <th class="user1" style="text-align:left;">First Name<span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span>&nbsp;</th>

                        <td><input class="userinput1" type="text"  value="" name="fname" id="fname" tabindex="1"  /></td>

                        

                        <th class="user1" style="text-align:left;">Mobile<span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span>&nbsp;</th>

                        <td><input class="userinput1" type="text"  value="" name="mobile" id="mobile" tabindex="4"  /></td>

                        

                        <th class="user1" style="text-align:left;">Company&nbsp;<span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span></th>

                        <td>
                                <select name="company"  id="company" class="userinput1 w84" style="color:#6e8b90" onchange="showPage();" tabindex="6"  >
                                <option value="">--Select company--</option>
                                {section loop=$projectdata name=i}
                                <option value="{$projectdata[i].Company_id}" {if $projectdata[i].Company_id eq $smarty.session.duUserCompanyId} selected="selected"{/if}>{$projectdata[i].Company}</option>
                                {/section}
                                </select>  

                        </td>

                        

                      </tr>

                      

                      <tr>

                      

                        <th class="user1" style="text-align:left;">Last Name<span class="user1" style="text-align:left;" > <font color="#FF0000">*</font> </span></th>

                        <td><input class="userinput1" type="text"  value="" name="lname" id="lname"   tabindex="2"/></td>

                        <th class="user1" style="text-align:left;">Role&nbsp;<span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span></th>

                       
                       <td>

                        <select name="userrole" id="userrole" class="userinput1  w84" style="color:#6e8b90;" tabindex="5">
                        <option value="">-----Select Role-----</option>
                        {section loop=$userrole name=i}
                        <option value="{$userrole[i].typeid}" >{$userrole[i].usertype}</option>
                        {/section}
                        </select> 
                        </td>

                        <th class="user1" style="text-align:left;">
                      <!--  Project&nbsp;<span class="user1" style="text-align:left;"> <font color="#FF0000">*</font></span>--></th>

                        <td><!--<input class="userinput1" type="text"  value="" name="company" />-->
                        <!--<select name="project"  id="project" class="userinput1 w84" style="color:#6e8b90 ;" tabindex="7" multiple="multiple" >
                      
                        </select>-->
                        </td>

                        

                        

                      </tr>

                      

                      <tr>

                      

                        <th class="user1" style="text-align:left;">E-Mail (User Name)<span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span>&nbsp;</th>

                        <td><input class="userinput1" type="text"  value=""  name="Emailid" id="Emailid" tabindex="3"  /></td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                       <td>&nbsp;</td>
                       <td>&nbsp;</td>

                      </tr>

                      <tr>
                      
                      <td colspan="7"><input name="Submit"  type="submit" class="button" id="adduser" style="width:110px; height:30px; float:right; margin-right: 8px;" value="Add User" tabindex="8" ></td>
                      </tr>

                    </table>
                    </form>
                    



                </div><!--createuser END-->

                

                <div class="middleuser"><!--middleuser START-->

                

                	<div class="leftmiddleuser"><!--leftmiddleuser START-->

                    

                    	<p>Update / Delete Users</p>

                        

                        <p style="font-size:14px; font-weight:normal; padding-top:10px;">Existing Users&nbsp;:</p>

                        

                        <div class="leftmiddleuser_contain">
                        <table width="100%" border="0" align="left" cellpadding="4" cellspacing="0" >
                        
                        {section loop=$userdata name=i}
                        <tr>
                        <td align="left" class="bgstyle">{$userdata[i].first_name} {$userdata[i].last_name}</td>
                        <td  class="bgstyle" width="10" align="center">
                        
                        <a onclick="change_src('{$siteroot}/modules/manage-users/update-user.php?id={$userdata[i].sales_empl_id}')" href="#"><img src="{$siteimg}/icons/edit.png"  border="0" title="update user"/></a>                        </td>
                         <td class="bgstyle" width="10" align="center">
                         <a onclick="change_src('{$siteroot}/modules/manage-users/Change-Password.php?id={$userdata[i].sales_empl_id}')" href="#">
                         <img src="{$siteimg}/icons/lock_icon.png"  border="0" title="Change Password"/>
                         </a>
                         </td>
                         <td class="bgstyle" width="20px" align="center">
                          {if $userdata[i].status eq 'active'}
                             <a href="{$siteroot}/user-administration-panel?deuid={$userdata[i].sales_empl_id}&amp;status={$userdata[i].status}"  onclick="return (confirm('Do you really want to inactivate this user?'))">
                             <img src="{$siteimg}/tick.png"  border="0" title="Inactive User"	/>
                             </a>  
                         {else}
                             <a href="{$siteroot}/user-administration-panel?deuid={$userdata[i].sales_empl_id}&amp;status={$userdata[i].status}"  onclick="return (confirm('Do you really want to activate this user?'))">
                             <img src="{$siteimg}/publish_x.png"  border="0" title="Active User"	/>
                             </a>       
                         {/if}                 </td>
                        </tr>
                        {/section}
                        </table>
                        </div>

                    

                    </div><!--leftmiddleuser END-->

                    <div class="imgarrowstyle">
                    
                    	<img src="{$siteimg}/arrow.png"  width="14"/>
                    	
                    </div>

                    <div class="rightmiddleuser"><!--rightmiddleuser START-->

                    <!--

                    	<table width="100%" border="0">

                        

                          <tr>

                             <th class="user1" align="left" style="text-align:left;">First Name*&nbsp;:</th>

                             <td><input class="userinput1" type="text"  value="" name="fname" id="fname" /></td>

                             <th class="user1" style="text-align:left;">Company&nbsp;:</th>

                             <td><select name="company" class="userinput1 w84" style="color:#6e8b90">

									<option value="">-Select one-</option>

                                 </select>

                        	 </td>

                          </tr>

                          

                           <tr>

                             <th class="user1" style="text-align:left;">Last Name*&nbsp;:</th>

                             <td><input class="userinput1" type="text"  value="" name="lname" /></td>

                             <th class="user1" style="text-align:left;">Project&nbsp;:</th>

                             <td><select name="project" class="userinput1 w84" style="color:#6e8b90">

									<option value="">-Select one-</option>

                                 </select>

                        	 </td>

                          </tr>

                          

                          <tr>

                             <th class="user1" style="text-align:left;">E-Mail (User Name)*&nbsp;:</th>

                             <td><input class="userinput1" type="text"  value="" name="email" /></td>

                             <th class="user1" style="text-align:left;">Role&nbsp;:</th>

                             <td><select name="role" class="userinput1 w84" style="color:#6e8b90">

									<option value="">-Select one-</option>

                                 </select>

                        	 </td>

                          </tr>

                          

                          <tr>

                            <th class="user1" style="text-align:left;">Mobile*&nbsp;:</th>

                             <td><input class="userinput1" type="text"  value="" name="mob" /></td>

                            <td>&nbsp;</td>

                            <td>&nbsp;</td>

                          </tr>

                          

                          <tr>

                          	<td>&nbsp;</td>

                            <td>&nbsp;</td>

                            <td>&nbsp;</td>

                            <td>&nbsp;</td>

                          </tr>

                          

                          <tr>

                         	<td colspan="4">

                            	<input type="submit" value="Reset Password" style="width:11em; height:30px;" id="repwd" class="button" name="repwd">          

                                <input type="submit" value="Delete User" style="width:11em; height:30px;" id="deluser" class="button" name="deluser">                 

                                <input type="submit" value="Update User" style="width:11em; height:30px;" id="upuser" class="button" name="upuser">

                           </td>

                         </tr>

                                

                        </table>



                    -->

<iframe id="main_frm" width="100%" scrolling="auto" height="230px" frameborder="0" style="padding:0px;margin:0px; background:#E0E8FF; " name="adduser" src="{$siteroot}/modules/manage-users/update-user.php"></iframe>


                    </div><!--rightmiddleuser END-->

                    

                    <div class="bottomrightmiddleuser"><!--bottomrightmiddleuser START-->

                    

                    	<p><strong>*Note&nbsp;:</strong><font style="font-size:13px; font-weight:normal; letter-spacing:1px;"> Click the "Update User button" if you wish to modify the "User Details" . </font></p>

                    

                    </div><!--bottomrightmiddleuser END-->

                

                </div><!--middleuser END-->

                

<!---------------------------End User Administration Panel Form--------------> 

            

            </div><!--middlepagecontain END-->

            

        </div>
<!--
<form action="" method="POST" name="addusers" id="addusers"  style="border:1px solid">
<table width="100%" border="0" cellspacing="5" cellpadding="0">
<tbody>

<tr>
    <td colspan="3">Create User</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>First Name</td>
    <td><input type="text" name="fname" id="fname"></td>
    <td>Mobile</td>
    <td><input type="text" name="mobile" id="mobile"></td>
  </tr>
  <tr>
    <td>Last name</td>
    <td><input type="text" name="lname" id="lname"></td>
    <td>Company</td>
    <td>
    
    <select name="company"  id="company" >
    <option value="">-----Select company-----</option>
    {section loop=$projectdata name=i}
        <option value="{$projectdata[i].project_id	}">{$projectdata[i].Project}</option>
     {/section}
        </select>    </td>
  </tr>
  <tr>
    <td>E-mail(Username)</td>
    <td><input type="text" name="Emailid" id="Emailid"></td>
    <td>Role</td>
    <td>
    
     <select name="userrole" id="userrole">
    <option value="">-----Select Role-----</option>
    {section loop=$userrole name=i}
       <option value="{$userrole[i].typeid}" >{$userrole[i].usertype}</option>
     {/section}
        </select>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="Submit" type="submit" id="Submit" value="Add User"></td>
  </tr>
</tbody></table>
</form>


<table width="58%" border="0" align="right" cellpadding="4" cellspacing="0"  style="border:1px solid">
  <tr>
    <td colspan="2">
    <iframe id="main_frm" width="100%" scrolling="auto" height="230px" frameborder="0" style="padding:0px;margin:0px; " name="adduser" src="{$siteroot}/modules/manage-users/update-user.php"></iframe>
    
    </td>
  </tr>
</table>-->

{include file=$footer}