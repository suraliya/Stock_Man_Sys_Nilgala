<?php 
	require_once 'php_action/db_connect.php'; 
	require_once 'core.php';
	require_once 'header.php';

	//$Database = new Database;
	//$connect = $Database->getcon();


$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM user WHERE userID = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb" style="margin-left:17px; margin-right:17px;">
		  <li><a href="dashboard.php" style="color:rgb(255, 255, 255)">Home</a></li>		  
		  <li class="active">Setting</li>
		</ol>

		<div class="panel panel-default" style="margin-left:17px; margin-right:17px;">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Setting</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				

				<form action="changeUsernameAll.php" method="post" class="form-horizontal" id="changeUsernameForm">
					<fieldset>
						<legend>Select User to Manage</legend>

						<div class="changeUsenrameMessages"></div>			

				    	<div class="form-group">
					    <label for="username" class="col-sm-2 control-label">Username</label>
					    	<div class="col-sm-10">
					      		<select class="form-control" id="brandName" name="brandName" onclick="updateMyText()">
					      			<option value="">~~SELECT~~</option>
					      			<?php

					      				$Database = new Database;
										$connect = $Database->getcon();

					      			$row = 0;
					      			$sql = "SELECT userID,userName,password,userType,deleted FROM user WHERE deleted = 0";
									$resul = $connect->query($sql);

									while($row = $resul->fetch_array()) 
									{
										echo "<option value='".$row[0]."'>".$row[1]."</option>";
									} 
									
					      			?>
				      			</select>
					    	</div>
					  </div>

					  <legend>Change Username</legend>
						<div class="form-group">
					    <label for="username" class="col-sm-2 control-label">Username</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php /*echo $result['userName'];*/ ?>"/>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<!--<input type="hidden" name="user_id" id="user_id" value="<?php/* echo $result['userID']*/?>" />
					    	<input type="hidden" name="xxx" id="xxx" value="<?php// echo $result['userID']?>" />-->

					      <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					    </div>
					  </div>
					</fieldset>
				</form>

				<form action="resetPassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Reset Password</legend>

						<div class="changePasswordMessages"></div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">New password</label>
					    <div class="col-sm-10">
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
					      <input type="hidden" name="user" id="user"  />
					      <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					      
					    </div>
					  </div>
					</fieldset>
				</form>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->


<script type='text/javascript'>

function updateMyText()
{
	var dd = document.getElementById("brandName");
	var ddtext = dd.options[dd.selectedIndex].text;
	document.getElementsByName('username')[0].value=ddtext;

	var ddtext = dd.options[dd.selectedIndex].text;
	document.getElementsByName('user')[0].value=ddtext;
}

</script>

<script src="custom/js/setting.js"></script>
<?php require_once 'footer.php'; ?>