{if $smarty.get.id}
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<link type="text/css" rel="stylesheet" href="{$sitecss}/style.css">

{literal}
<style type="text/css">
.error{ color:#FF0000;}
body{ background: #E0E8FF;}
</style>
<script type="text/javascript">
	jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
}, "Letters only please"); 
	var SITEROOT="{/literal}{$siteroot}{literal}";
	var Company_id={/literal}{if $userdata.Company_id}{$userdata.Company_id}{else}''{/if}{literal};
	var project_id={/literal}{if $userdata.project_id}{$userdata.project_id}{else}''{/if}{literal};
	
	jQuery(document).ready(function() {
	
	 jQuery("#Updateusers").validate({
		errorElement:'div',
		rules: {
				fname  :	{	required: true,minlength:3,lettersonly:true},
				lname   :	{	required: true,minlength:3,lettersonly:true},
				Emailid   	:	{	required: true, 
									email:true,
									remote:"modules/login/check_duplication.php"
				},
				mobile : {required: true,number:true,minlength:10},
company : {required: true},project : {required: true},				userrole : {required: true}
					
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
	

	jQuery.get(SITEROOT+"/modules/enquiry/ajax_projects.php",{cid:Company_id,pid:project_id},function(data){jQuery("#project").html(data);});
	
});
function showPage()
{
	var company = jQuery('#company').val();
	//jQuery('#sCatDiv').html("<image src='"+site_root+"/templates/default/images/loading.gif'>");
	jQuery.get(SITEROOT+"/modules/enquiry/ajax_projects.php",{cid:company},function(data){jQuery("#project").html(data);});

}
</script>
{/literal}
<form action="" method="POST" name="Updateusers" id="Updateusers">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
<tbody>
{if $msg}
    <tr>
    <td colspan="4" align="center"  style="font-weight:bold; color:#008000"><div id="msg">{$msg}</div></td>
    </tr>
{/if}


  <tr>
    <th class="user1" style="text-align:left;">First Name</td>
    <font color="#FF0000">*</font>
    <td><input type="text" name="fname" id="fname" class="userinput1 " value="{$userdata.first_name}"></td>
    <th class="user1" style="text-align:left;">Mobile</td>
      <span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span>
    <td><input type="text" name="mobile" id="mobile" class="userinput1" value="{$userdata.mobile}"></td>
  </tr>
  <tr>
    <th class="user1" style="text-align:left;">Last name</td>
      <span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span>
    <td><input type="text" name="lname" id="lname" class="userinput1" value="{$userdata.last_name}"></td>
   <th class="user1" style="text-align:left;">Company</td>
     <span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span>
   <td>
    
                <select name="company"  id="company" class="userinput1 w84" style="color:#6e8b90"  onchange="showPage();" >
                <option value="">--Select company-----</option>
                {section loop=$projectdata name=i}
                <option value="{$projectdata[i].Company_id}" {if $userdata.project_id eq $projectdata[i].Company_id} selected="selected"{/if}>{$projectdata[i].Company}</option>
                {/section}
                </select>                                 </td>
  </tr>
  <tr>
    <th class="user1" style="text-align:left;">E-mail<br />
(Username)
        </td>
        <span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span> </th>
    <td><input type="text" name="Emailid" id="Emailid" class="userinput1"  value="{$userdata.email}" disabled="disabled" /></td>
    <th class="user1" style="text-align:left;"><!--Project    
      <span class="user1" style="text-align:left;"> <span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span> </span> -->
	  </th>
    <td>
    <!--<select name="project"  id="project" class="userinput1 w84" style="color:#6e8b90 ;">
	    <option value="">Select company first</option>
    </select>  -->   </td>
  </tr>
  <tr>
    <th class="user1" style="text-align:left;">Role
        </td>
        <span class="user1" style="text-align:left;"> <font color="#FF0000">*</font> </span> </th>
    <td><select name="userrole" id="userrole" class="userinput1 w84" style="color:#6e8b90">
        <option value="">--Select Role-----</option>
      
    {section loop=$userrole name=i}
       
      <option value="{$userrole[i].typeid}"  {if $userdata.emptype_id eq $userrole[i].typeid} selected="selected"{/if}>{$userrole[i].usertype}</option>
      
     {/section}
        
    </select>    </td>
    <th class="user1" style="text-align:left;">
    <td><input name="Submit" type="submit" id="Submit" value="Update User" style="width:110px; height:30px; margin-left: 84px;"  class="button" /></td>
  </tr>
</tbody></table>
</form>


{/if}