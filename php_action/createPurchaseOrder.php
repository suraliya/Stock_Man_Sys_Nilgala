<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'pOrderID' => '');
//print_r($valid);

if($_POST) 
{
	$orderDate 			= $_POST['orderDate'];	
	$supID 			= $_POST['SupplierName'];
	//$supTP		 		= $_POST['supTP'];
	$subTotal	 		= $_POST['subTotalValue'];							
				
	$sql = "INSERT INTO purchaseorder (pOderDate, supID, pOrderAmt, orderStatus, deleted ) VALUES ('$orderDate', '$supID', '$subTotal', 1, 0)";	
	
	
	$pOrderID;
	
	if($connect->query($sql) === true) 
	{
		$pOrderID = $connect->insert_id;
		$valid['pOrderID'] = $pOrderID;			
	}
	
	for($x = 0; $x < count($_POST['productName']); $x++) 
	{	
		// add into order_item
		$orderItemSql = "INSERT INTO porderitem (pOrderID, rmID, qty, rate, tot) VALUES ('$pOrderID', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."')";
		$connect->query($orderItemSql);					
	} 

	$valid['success'] = true;
	$valid['messages'] = " Successfully Added ";		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
