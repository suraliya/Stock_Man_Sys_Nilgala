<?php
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 

if($_GET['o'] == 'add') { 
	echo "<div class='div-request div-hide'>add</div>";
} else if($_GET['o'] == 'manusr') { 
	echo "<div class='div-request div-hide'>manusr</div>";
} 


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>User Settings</li>
  <li class="active">
  	<?php if($_GET['o'] == 'add') { ?>
  		Add / Remove User
		<?php } else if($_GET['o'] == 'manusr') { ?>
			Manage User
		<?php } ?>
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php if($_GET['o'] == 'add') {
		echo "Add / Remove User";
	} else if($_GET['o'] == 'manusr') { 
		echo "Manage User";
	} 
	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		<?php if($_GET['o'] == 'add') { ?>
  		<i class="glyphicon glyphicon-plus-sign "></i>	Add / Remove User
		<?php } else if($_GET['o'] == 'manusr') { ?>
			<i class="glyphicon glyphicon-edit"></i> Manage User
		<?php } ?>

	</div> <!--/panel-->	
	<div class="panel-body">
			
		<?php if($_GET['o'] == 'add') { 
			// add user
			?>			

			<div class="success-messages"></div> <!--/success-messages-->
			<div class="removeuserMessages"></div>
				<form action="php_action/removeUser.php" method="post" class="form-horizontal" id="removeForm"> 
					<fieldset>
							<legend>Select User to Remove</legend>		

							<div class="form-group">
							<label for="username" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<select class="form-control" id="username" name="username">
										<option value="">~~SELECT~~</option>
										<?php
										$sql = "SELECT * FROM users WHERE userType != 'Manager' AND deleted = 0";
										$resul = $connect->query($sql);

										while($row = $resul->fetch_array()) 
										{
											echo "<option value='".$row[1]."'>".$row[1]."</option>";
										} 
										
										?>
									</select>
								</div>
						  </div>

						<div class="col-sm-offset-2 col-sm-10">
							<a type="button" data-toggle="modal" class="btn btn-success" data-target="#removeuserModal"> <i class="glyphicon glyphicon-trash"></i> Remove </a>      
						</div>
						
						<div class="modal fade" tabindex="-1" role="dialog" id="removeuserModal">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove User</h4>
							  </div>
							  <div class="modal-body">
								<p>Do you really want to remove ?</p>
							  </div>	
							  <div class="modal-footer removeBrandFooter">
								<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> No </button>
								<button type = "submit" class="btn btn-danger" id="removeuserBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Yes </button>
							  </div>
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					</fieldset>
				</form>
				
				<form class="form-horizontal" method="post" action="php_action/addNewUser.php" id="addNewUserForm">
                	<fieldset>
							<legend>Add USer</legend>
						<div class="success_message" ></div>							
						<div class="form-group">
							<label for="userName" class="col-sm-2 control-label">User Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="userName" name="userName" placeholder="User Name" autocomplete="off" />
							</div>
						</div> <!--/form-group-->
						
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password" autocomplete="off" />
								</div>
						</div>
					  
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">Confirm Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off" />
								</div>
						</div>
					   
						<div class="col-sm-offset-2 col-sm-10">
							<button type = "submit" class="btn btn-primary" id="addUserbtn" data-toggle="modal" data-target="#addUser"> <i class="glyphicon glyphicon-ok-sign"></i> Add User</button>						
						</div> <!-- /div-action -->
                    </fieldset>
                </form>
				 
			<?php } else if($_GET['o'] == 'manusr') { 
			// manage user
			?>

			<div id="success-messages"></div>
				 
				<form action="php_action/changeUsernameAll.php" method="post" class="form-horizontal" onclick="submitform()" id="changeUsernameForm"> 
					<fieldset>
						<legend>Select User to Manage</legend>

						<div class="changeUsenrameMessages"></div>			

				    	<div class="form-group">
					    <label for="username" class="col-sm-2 control-label">Username</label>
					    	<div class="col-sm-10">
					      		<select class="form-control" id="allusername" name="allusername">
					      			<option value="">~~SELECT~~</option>
					      			<?php
					      			$sql = "SELECT * FROM users WHERE userType != 'Manager' AND deleted = 0 ";
									$resul = $connect->query($sql);

									while($row = $resul->fetch_array()) 
									{
										echo "<option value='".$row[1]."'>".$row[1]."</option>";
									} 
									
					      			?>
				      			</select>
					    	</div>
					  </div>

					  <legend>Change Username</legend>
						<div class="form-group">
					    <label for="username" class="col-sm-2 control-label">Username</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					    </div>
					  </div>
					</fieldset>
				</form>
				<form action="php_action/changePass.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Reset Password</legend>

						<div class="changePasswordMessages"></div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">New password</label>
					    <div class="col-sm-10">
							<input type="hidden" class="form-control" id="hidusername" name="hidusername">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <input type='hidden' name='variable' id='variable' value=''>
					      <button type="submit" class="btn btn-primary" id="changePasswordBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					      
					    </div>
					  </div>
					</fieldset>
				</form>
				
			<?php } ?>


	</div> <!--/panel-->	
</div> <!--/panel-->
                		
<script>
	$("#allusername").on('change',function(){
    $("#hidusername").val($("#allusername option:selected").val());
	});
</script>

<script src="custom/js/usersetting.js"></script>
<?php require_once 'includes/footer.php'; ?>