<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$supplierID = $_POST['supplierID'];

if($supplierID) { 

 $sql = "UPDATE supplier SET deleted = 1 WHERE supID = {$supplierID}";

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