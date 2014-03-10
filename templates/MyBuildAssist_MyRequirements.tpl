<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>{include file=$header1}
<title>New Registration - BuildAssist</title>
</head>
<body>
{include file=$navbar1}
<!--Sub header - START -->
<header id="overview" class="">
  <div class="container-fluid offset1">
    <h1>My BuildAssist</h1>
    <p class="lead">My Activities - View & Edit your Loyalty Points, Requirements, Buys, Deals & Bids</p>
  </div>
</header>
<!--Sub Header - END -->
<!--BODY START -->
<div class="row-fluid">
  <div class="span10 offset1">
  	<!--SESSION MESSAGE START -->
	{include file=$message}
	<!--SESSION MESSAGE END -->

<div class="row-fluid">
  <div class="span10 offset1">
    <!--MY BUILASSIST NAVBAR START -->
    <div id="navbar-example" class="navbar navbar-static">
      <div class="navbar-inner">
        <div class="container" style="width: auto;">
          <!-- <a class="brand" href="#">Project Name</a> -->
          <ul class="nav" role="navigation">
            <li class="dropdown"> <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Notifications Central<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="MyBuildAssist_Notifications.html">Notifications</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#anotherAction">Inbox - Direct Messages</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sent - Direct Messages</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Trash</a></li>
              </ul>
            </li>
            <li class="dropdown"> <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">My Activities<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="
MyBuildAssist_MyRequirements.html">My Requirements</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Purchases</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Deals</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Bids</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="MyBuildAssist_MyLoyaltyPoints.html">My Loyalty Points</a></li>
              </ul>
            </li>
            <li class="dropdown"> <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">My Reputation<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ratings Received</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Reviews Received</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ratings Given</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Reviews Written</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="MyBuildAssist_MyPublicProfile.html">My Public Profile</a></li>
              </ul>
            </li>
            <li class="dropdown"> <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">My Details<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Basic Information</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Contact Details</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Construction Site Details (for buyers)</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Supplier Details (for suppliers)</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="MyBuildAssist_MyPublicProfile.html">My Public Profile</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--MY BUILDASSIST NAVBAR END -->
  </div>
  <!--<div class="span10 offset1"> -->
</div>
<!--<div class="row-fluid"> -->
<div class="row-fluid"  align="center">
<div class="span10 offset1">
  <!--Sidebar content-->
  <div class="span3">
    <ul class="nav nav-tabs nav-stacked">
      <li  class="active"> <a href="">My Requirements</a> </li>
       
      <li> <a href="">My Purchases</a> </li>
      <li> <a href="">My Deals</a> </li>
      <li> <a href="">My Bids</a> </li>
      <li> <a href="">My Loyalty Points</a> </li>
    </ul>
	
	  	<!--Action Button Area START -->
   	 <div>
	 	<table>
			<tbody>
				<tr align="center">
					
					<td><a class="btn btn-success" type="button" href="New_Requirement.html">Create a new requirement</button></a>
				</tr>
			</tbody>
		</table>
        
      </div>
	  <!--Action Button Area END -->
  </div>
  

  <!--<div class="span3"> -->
  <!--Sidebar content-->
  <!--Body content-START-->
  <div class="span9">
    <!--MY REQUIREMENTS - START -->
    <!--RESULTS START -->
    <div class="mini-layout-body fluid">
      <table class="table">
        <tbody>
          <tr valign="top">
            <td><div><font class="muted">Status:</font><font color="#FF0000" style="font-weight:bold">Active</font></div>
               
              <div><font class="muted">Catagory:</font>Cement</div>
               
              </td>
            <td><div><font class="muted">Expiry:</font>1 June 2013</div>
               
              <div><font class="muted">Spec:</font>OPC 53 Grade</div>
               
              </td>
            <td>
				<div><font class="muted">Bids:</font><font color="#FF0000" style="font-weight:bold">(2)</font></div>
              <br/>
              <div><font class="muted">My Quantity: </font>500 kgs.</div>
               
               
              <div></div></td>
            <td>
               
              <div>&nbsp;</div>
              <div>&nbsp;</div>
               
              <div> <a class="btn btn-warning" type="button" href="Requirement_Details.html">Edit</a> </div></td>
          </tr>
          <tr valign="top">
            <td><div><font class="muted">Status:</font><font style="font-weight:bold">Closed</font></div>
               
              <div><font class="muted">Catagory:</font>Cement</div>
               
             </td>
            <td><div><font class="muted">Closed:</font>31 March 2013</div>
               
              <div><font class="muted">Spec:</font>OPC 53 Grade</div>
               
              </td>
            <td> <div><font class="muted">Bids:</font>(3)</div>
              <br/>
              <div><font class="muted">My Quantity: </font>100 kgs.</div>
               
               
              <div></div></td>
            <td>
               <div>&nbsp;</div>
              <div>&nbsp;</div>
              <div>&nbsp;</div>
               
              <div> <a class="btn btn-info" type="button" href="Requirement_Details.html">View</a> </div></td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--<div class="mini-layout fluid"> -->
    <!--RESULTS END -->
    <!--MY REQUIREMENTS - END -->
  </div>
  <!--<div class="span9"> -->
  <!--Body content-END-->
</div>
  
  
  
  
  </div>  <!--<div class="span10 offset1"> -->
</div><!--<div class="row-fluid"> -->


<!--<div class="span10 offset1"> -->
<!--<div class="row-fluid"> -->
<!--BODY ENDS -->
{include file=$footer2}
</body>
<script src="{$siteroot}/templates/bootstrap/js/jquery.min.js"></script>
<script src="{$siteroot}/templates/bootstrap/js/bootstrap.min.js"></script>
<script src="{$siteroot}/templates/bootstrap/js/bootstrap-datepicker.js"></script>
<script>
//FADE THE NOTIFICATION BOX
$("#msgcan").fadeTo(5000,1).fadeOut(2000);
</script>

{literal}
<script>
	$(function(){
		$('#dp3').datepicker();
				});
						
</script>
{/literal}


</html>
