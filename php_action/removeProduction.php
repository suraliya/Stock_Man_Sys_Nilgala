<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$productId = $_POST['productID'];

if($productId) 
{ 

 $sql = "UPDATE production SET deleted = 1 WHERE productQty = 0 AND productID = {$productId}";

 if($connect->query($sql) === TRUE) 
 {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } 
 else 
 {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the Product";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST