<?php /* Smarty version 2.6.19, created on 2013-08-31 12:18:20
         compiled from index.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header1'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title>Home - BuildAssist</title>
</head>
<body>


	
	<!-- Modal - START -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['loginwindow'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>			
		</div>
	<!-- Modal - END -->
	
	<div class="container-fluid" align="center">
	
		<div class="row-fluid">
			<div class="span4 offset4">
			
				<img src="<?php echo $this->_tpl_vars['logo']; ?>
" > <br/>
				<h5></h5>
				
			</div>
		</div>	
					
		
		<div class="row-fluid">
			<div class="span8 offset2">
			
			<table class="table">
					<tbody>
						<tr>							
							<td> <h4> Post your requirements and get bids </h4></td>
							<td> <h4> Get exclusive deals from suppliers </h4></td>
							<td> <h4> Buy at great rates </h4></td>
						</tr>
					</tbody>
			</table>			
			</div>
		</div>
		
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['message'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<div class="row-fluid">
			<div class="span6 offset3">
			<table align="center">
				<tr>
					<td width="40%" align="right" valign="top">
						<a href="Register.html" role="button" class="btn btn-large btn-success">Create Account</a>
					</td>
					
					<td width="40%" align="left" valign="top">
						<!-- Button to trigger modal -->
						<a href="#myModal" role="button" class="btn btn-large" data-toggle="modal">Login here</a>
					</td>

				</tr>
			</table>

				
			</div>
		</div>
		
		<br/>
		
		<div class="row-fluid">
			<div class="span6 offset3">
			<h4> Deals currently available for following brands</h4>
			
				<table class="table">
					<thead>
						<th width="25%"> Cement </th>
						<th width="25%"> Steel </th>
						<th width="25%"> Plywood </th>
						<th width="25%"> Fittings </th>
					</thead>
					<tbody>
						<!-- row 1 -->
						<tr>
							<td><li> ACC </li>
							</td>
							<td><li> SAIL </li>
							</td> 
							<td><li> Century Ply </li>
							</td>
							<td><li> Jaquar </li>
							</td>
						</tr>
						<!-- row 2 -->
						<tr>
							<td><li> Ultratech </li>
							</td>
							<td><li> TATA Tiscon </li>
							</td>
							<td><li> Guardian Ply </li>
							</td>
							<td><li> KOHLER </li>
							</td>
						</tr>
						<!-- row 3 -->
						<tr>
							<td><li> Ambuja / Holcim </li>
							</td>
							<td><li> Kamdhenu Ispat Ltd </li>
							</td>
							<td><li> India Plywood </li>
							</td>
							<td>
							</td>
						</tr> 
						<tr> 
							<td> </td>
							<td colspan="2"> <a href=""><i><ul>Click here for more catagories & brands</ul> </i></a> </td>
							<td> </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span2 offset3">
				<a class="btn btn-large btn-block" type="button" href="Deals.html">View open deals</a>(For Buyers)
			</div>
			<div class="span2">
				<a class="btn btn-large btn-block" type="button" href="New_Requirement.html">Post new requirements</a>(For Buyers)
			</div>
			<div class="span2">
				<a class="btn btn-large btn-block" type="button" href="View_Buyer_Requirement.html">View open requirements</a>(For Suppliers)
			</div>
		</div>
		
		<br/>
		<br/>
		
		<h4> What our customers say about us</h4>
		
		<br/>
		<div class="row-fluid">
			<div class="span2 offset3"> <i>"Incorporating BuildAssist into my business has allowed me to expand my inventory without storing it. Rather than directing a customer elsewhere when I don't carry what they are needing, I can login to BuildAssist, order the product, have it delivered straight to my store, and have the customer pick it up." - Athens Siding & Windows</i>
			</div>
			<div class="span2"> <a href=""><i>View more testimonials</i></a> <br/> <br/>
			<i>"With BuildAssist taking over the 100's of calls, chasing prices on products, I have more time to spend with my family. Logging in, choosing my products, and paying is just THAT easy now."- Wallace Guttering</i>
			</div>
			<div class="span2"><i>As the owner of a small sized company, I have to be on the job site every day and cannot afford to spend time constantly tracking down materials and placing orders throughout the day. Using BuildAssist is like having another employee that truly works me for me." - BlueGround Construction</i>
			</div>
		</div>

		<br/>
		<br/>
		<div class="row-fluid">
				<div class="span4 offset4">
							
					<h4>Manufacturers & Suppliers - Sell with us</h4>
					
					<table align="center">
						<tr>
							<td width="50%" align="right"><p><a class="btn btn-large btn-success" type="button" href="Register.html">Create Account</a></p></td>
							<td width="50%" align="left"><p/><button class="btn btn-large" type="button">Login here</button></td>
						</tr>
					</table>
					
				</div>
			</div>	
			
		<br/>
		<br/>
		<div class="row-fluid">
				<div class="span4 offset4">
							
					<h4>Contact BuildAssist</h4> 
					
					<p>Phone: +91 982 088 9289 - E-Mail: contact@buildassist.in</p>
					<br/>
				</div>
		</div>
		
		</div>

</body>
<script src="<?php echo $this->_tpl_vars['siteroot']; ?>
/templates/bootstrap/js/jquery.min.js"></script>
<script src="<?php echo $this->_tpl_vars['siteroot']; ?>
/templates/bootstrap/js/bootstrap.min.js"></script>

</html>