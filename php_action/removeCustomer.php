<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$customerID = $_POST['customerID'];

if($customerID) 
{ 
	 $sql = " UPDATE customer SET deleted = 1 WHERE cusID = {$customerID} ";

	 if($connect->query($sql) === TRUE) 
	 {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Removed";		
	 } 
	 else 
	 {
		$valid['success'] = false;
		$valid['messages'] = "Error while remove the brand";
	 }
	 
	 $connect->close();

	 echo json_encode($valid);
 
} // /if $_POST

?>