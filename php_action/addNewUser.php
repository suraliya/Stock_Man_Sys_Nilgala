<?php 

require_once 'core.php';

if($_POST) 
{
	$valid['success'] = array('success' => false, 'messages' => array());

	$userName = $_POST['userName'];
	$userType = "Stock Manager";
	$npassword = md5($_POST['npassword']);
	$conpassword = md5($_POST['cpassword']); 

		if($npassword == $conpassword) 
		{
			$Sql = "INSERT INTO users (username, password, userType,deleted) VALUES ('$userName', '$npassword', '$userType',0)";
			$query = $connect->query($Sql);
			if($connect->query($Sql) == TRUE) 
			{
				$valid['success'] = true;
				$valid['messages'] = "Successfully Added";		
			} 
			else 
			{
				$valid['success'] = false;
				$valid['messages'] = "Error while adding the users plese contact your system administrater";	
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