<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{
	$customerFirstName 		= $_POST['customerFirstName'];
	$customerLastName 		= $_POST['customerLastName'];  
 	$addressLine1 			= $_POST['addressLine1'];
 	$addressLine2 			= $_POST['addressLine2'];
 	$addressLine3 			= $_POST['addressLine3'];
  	$nic 				= $_POST['nic'];
  	$contact 			= $_POST['contact'];  

	$sql = " INSERT INTO customer (fname, lname, address1, address2, address3, cusTP, cusNIC,deleted) VALUES ( '$customerFirstName', '$customerLastName', '$addressLine1', '$addressLine2', '$addressLine3', '$nic', '$contact' , 0) ";
	
	if($connect->query($sql) === TRUE) 
	{
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} 
	else 
	{
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
	}	

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST

?>