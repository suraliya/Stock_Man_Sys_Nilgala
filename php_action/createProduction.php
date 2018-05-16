<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	
	$categoryName = $_POST['categoryName'];
	$categoryRate = $_POST['categoryRate']; 

	$sql = "INSERT INTO production (productName, productRate, productQty, deleted) VALUES ('$categoryName', '$categoryRate', 0, 0)";

	if($connect->query($sql) === TRUE) 
	{
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} 
	else 
	{
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the Product";
	}	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST