<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$rmID = $_POST['rmID'];

if($rmID) 
{ 

	 $sql = "UPDATE rmitem SET deleted = 1 WHERE rmID = {$rmID}";

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