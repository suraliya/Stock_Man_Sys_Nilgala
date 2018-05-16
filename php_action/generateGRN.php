<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'grnID' => '');

if($_POST) 
{	
	$orderId 	= $_POST['orderId'];
	$grnDate 	= $_POST['grnDate'];	
	$grnAmt 	= $_POST['grnAmt'];
		
	$sql1 = " INSERT INTO grn(grnDate, pOrderID, grnAmt) VALUES ('$grnDate', '$orderId', $grnAmt) ";
	$sql2 = " UPDATE purchaseorder SET orderStatus = 2 WHERE pOrderID = {$orderId} ";
	$sql3 = " SELECT grnID FROM grn WHER pOrderID = {$orderId} ";
	
	if($connect->query($sql1) === true) 
	{
		$grnID = $connect->insert_id;
		$valid['grnID'] = $grnID;			
	}
	
	$connect->query($sql2);	
	
	$readyToUpdateOrderItem = false;
	// add the quantity from the grnitem to rmitem table
	for($x = 0; $x < count($_POST['productName']); $x++) 
	{		
		//  RM Item table
		$updateProductQuantitySql = "SELECT rmQty FROM rmitem WHERE rmID = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);			
			
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) 
		{
			// order item table add product quantity
			$orderItemTableSql = "SELECT qty FROM porderitem WHERE pOrderID = {$orderId}";
			$orderItemResult = $connect->query($orderItemTableSql);
			$orderItemData = $orderItemResult->fetch_row();

			$editQuantity = $updateProductQuantityResult[0] + $orderItemData[0];							

			$updateQuantitySql = "UPDATE rmitem SET rmQty = $editQuantity WHERE rmID = ".$_POST['productName'][$x]."";
			$connect->query($updateQuantitySql);		
		} // while	
		
		if(count($_POST['productName']) == count($_POST['productName'])) 
		{
			$readyToUpdateOrderItem = true;			
		}
	} // /for quantity

	if($readyToUpdateOrderItem) 
	{
			// insert the order item data 
		for($x = 0; $x < count($_POST['productName']); $x++) 
		{			
			// add into order_item
			$orderItemSql = "INSERT INTO grnitem (grnID, rmID, qty, rate, tot) 
			VALUES ({$grnID}, '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."')";
			$connect->query($orderItemSql);		
			//} // while	
		} // /for quantity
	}	
	
	$valid['success'] = true;
	$valid['messages'] = "GRN Successfully created...";		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);