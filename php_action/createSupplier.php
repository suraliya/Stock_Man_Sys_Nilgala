<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	
	$supplierFirstName 		= $_POST['supplierFirstName'];
	$supplierLastName 		= $_POST['supplierLastName'];  
 	$address1 			= $_POST['address1'];
 	$address2 			= $_POST['address2'];
 	$address3 			= $_POST['address3'];
  	$nic 				= $_POST['nic'];
  	$supTp 				= $_POST['supTp'];
  
	$sql = "INSERT INTO supplier(fname, lname, address1, address2, address3, supTp, supNIC, deleted) VALUES ('$supplierFirstName', '$supplierLastName', '$address1', '$address2', '$address3', '$supTp', '$nic', 0)";

	if($connect->query($sql) === TRUE) 
	{
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} 
	else 
	{
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the suppliers";
	}	

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST

?>