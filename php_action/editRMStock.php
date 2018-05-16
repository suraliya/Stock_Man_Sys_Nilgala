<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{
	$editRMName = $_POST['editRMName'];
	$editRMRate = $_POST['editRMRate']; 
	$rmID 		= $_POST['rmID'];

	$sql = "UPDATE rmitem SET rmName = '$editRMName', rmRate = '$editRMRate' WHERE rmID = '$rmID'";

	if($connect->query($sql) === TRUE) 
	{
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} 
	else 
	{
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while edit the Item";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST