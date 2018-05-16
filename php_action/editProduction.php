<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	

	$productName 	= $_POST['editProductionName'];
	$productRate 	= $_POST['editProductionRate']; 
	$productID		= $_POST['productID'];

	$sql = "UPDATE production SET productName = '$productName', productRate = '$productRate' WHERE productID = '$productID'";

	if($connect->query($sql) === TRUE) 
	{
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} 
	else 
	{
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the Product";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST