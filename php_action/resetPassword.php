<?php 
require_once 'Database.php';
require_once 'core.php';

$Database = new Database;
$connect = $Database->getcon();

if($_POST) 
{

	//$currentPassword = md5($_POST['password']);
	$newPassword = md5($_POST['npassword']);
	$conformPassword = md5($_POST['cpassword']);
	$user = $_POST['user'];
	

	/*$sql ="SELECT * FROM user WHERE userID = {$userId}";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();*/

	/*if($currentPassword == $result['password']) 
	{*/

		if($newPassword == $conformPassword) 
		{

			$updateSql = "UPDATE user SET password = '$newPassword' WHERE userName = '$user'";
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

	/*} 
	else 
	{
		$valid['success'] = false;
		$valid['messages'] = "Current password is incorrect";
	}*/

	$connect->close();

	echo json_encode($valid);

}

?>

