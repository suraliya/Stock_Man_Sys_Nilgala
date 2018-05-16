<?php 

require_once 'core.php';

if($_POST) 
{
	$valid['success'] = array('success' => false, 'messages' => array());


	$newPassword = md5($_POST['npassword']);
	$conformPassword = md5($_POST['cpassword']);
	$allusername = $_POST['hidusername'];


		if($newPassword == $conformPassword) 
		{
			$updateSql = "UPDATE users SET password = '$newPassword' WHERE username = '$allusername'";
			if($connect->query($updateSql) === TRUE) 
			{
				$valid['success'] = true;
				$valid['messages'] = "Successfully Updated";		
			} 
			else 
			{
				$valid['success'] = false;
				$valid['messages'] = "Error while updating the password";	
			}
		} 
		else 
		{
			$valid['success'] = false;
			$valid['messages'] = "New password does not match with Conform password";
		}


	$connect->close();

	echo json_encode($valid);
}

?>
	

	