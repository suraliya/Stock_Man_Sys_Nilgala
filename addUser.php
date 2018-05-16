<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">		
		<ol class="breadcrumb">
		  <li> <a href="dashboard.php"> Home </a> </li>		  
		  <li class="active"> User Settings</li>
		   <li class="active"> Add User </li>
		</ol>
		
        <h4>
			<i class="glyphicon glyphicon-circle-arrow-right" style="margin-left:17px;"></i>
			 Add User	
		</h4>
		<div class="panel panel-default" style="margin-left:17px; margin-right:17px; ">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-plus-sign"></i> Add New User </div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="remove-messages"></div>
                <div class="messages">
							<?php if($errors) 
							{
								foreach($errors as $key => $value) 
								{
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
								}
							} 
							?>
				</div>

				<form class="form-horizontal" method="POST" action="php_action/addNewUser.php" id="addNewUserForm">
                		
                  <div class="form-group">
                    <label for="userName" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="userName" name="userName" placeholder="User Name" autocomplete="off" />
                    </div>
                  </div> <!--/form-group-->
                  
                  <div class="form-group">
	        	  <label for="brandStatus" class="col-sm-2 control-label">User Type </label>	        	
				    <div class="col-sm-10">
				      <select class="form-control" id="userType" name="userType">
				      	<option value="">~~SELECT~~</option>
                        <option value="manager">Manager</option>
				      	<option value="stockManager">Stock Manager</option>
				      	<option value="cashier">Cashier</option>
				      </select>
				  </div>
	        	  </div> <!-- /form-group-->
                  
                    
                  <div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" />
						</div>
				  </div>
                  
                  <div class="form-group">
					<label for="password" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" autocomplete="off" />
						</div>
				  </div>
                   
                    <div class="div-action pull pull-left" style="padding-bottom:20px; margin-left:255px">
                        <button type = "submit" class="btn btn-default button1" id="addUserbtn" data-toggle="modal" data-target="#addUser"> <i class="glyphicon glyphicon-plus-sign"></i> Add User</button>						
                    </div> <!-- /div-action -->
                    <div class="success_message" ></div>
                 </form>
                		

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script src="custom/js/addUser.js"> </script>

<?php require_once 'includes/footer.php'; ?>