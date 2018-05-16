<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$orderId = $_POST['orderId'];

if($orderId) 
{ 

	 $sql = "UPDATE salesorder SET deleted =1 WHERE sOrderID = {$orderId}";

	 //$orderItem = "UPDATE order_item SET order_item_status = 2 WHERE  order_id = {$orderId}";

	 if($connect->query($sql) === TRUE) 
	 {
		$valid['success'] = true;
		$valid['messages'] = "Order Successfully Removed...";		
	 } 
	 else 
	 {
		$valid['success'] = false;
		$valid['messages'] = "Error while remove the Order";
	 }
	 
	 $connect->close();

	 echo json_encode($valid);
	 
} // /if $_POST