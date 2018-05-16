<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'sOrderID' => '');
// print_r($valid);
if($_POST) 
{	

  $orderDate 					= $_POST['orderDate'];	
  $CustomerID 					= $_POST['CustomerName'];
  //$CustomerContact 			= $_POST['CustomerContact'];
  $subTotalValue 				= $_POST['subTotalValue'];
  //$vatValue 					= $_POST['vatValue'];
  //$totalAmountValue     		= $_POST['totalAmountValue'];
  $discount 					= $_POST['discount'];
  $grandTotalValue 				= $_POST['grandTotalValue'];
  //$paid 						= $_POST['paid'];
  //$dueValue 					= $_POST['dueValue'];
  $paymentType 					= $_POST['paymentType'];
  //$paymentStatus 				= $_POST['paymentStatus'];

	
	//$sql = "INSERT INTO orders (order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_type, payment_status, order_status) VALUES ('$orderDate', '$clientName', '$clientContact', '$subTotalValue', '$vatValue', '$totalAmountValue', '$discount', '$grandTotalValue', '$paid', '$dueValue', $paymentType, $paymentStatus, 1)";
	$sql = " INSERT INTO salesorder (sOrderDate, cusID, tot, discount, grandTot, payType, deleted) VALUES ('$orderDate', '$CustomerID', '$subTotalValue', '$discount', '$grandTotalValue', '$paymentType', '0')";
	
	$sOrderID;
	$orderStatus = false;
	if($connect->query($sql) === true) 
	{
		$sOrderID = $connect->insert_id;
		$valid['sOrderID'] = $sOrderID;	
		
		$orderStatus = true;
	}
	
	// echo $_POST['productName'];
	//$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) 
	{			
		$updateProductQuantitySql = "SELECT productQty FROM production WHERE productID = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);		
		
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) 
		{
			if($updateProductQuantityResult[0] >= $_POST['quantity'][$x])
			{
				$qtyVali = true;
				
				$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
				// update production table
				$updateProductTable = "UPDATE production SET productQty = '".$updateQuantity[$x]."' WHERE productID = ".$_POST['productName'][$x]."";
				$connect->query($updateProductTable);
				
				$orderItemSql = "INSERT INTO sorderitem (sOrderID, productID, qty, rate, tot) 
				VALUES ('$sOrderID', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rate'][$x]."', '".$_POST['totalValue'][$x]."')";
				$connect->query($orderItemSql);	
			}
			else
			{
				$qtyVali = false;
				break 2; //break outermost for loop
			}				
		} // while	
	} // /for quantity

	if($qtyVali == true)
	{
		if($connect->query($updateProductTable) === true)
		{		
			$valid['success'] = true;
			$valid['messages'] = "Order Successfully placed...";
		}
		else
		{
			$valid['success'] = false;
			$valid['messages'] = "Error while creating the order...";
		}
	}
	else if($qtyVali == false)
	{
		$valid['success'] = false;
		$valid['messages'] = "Sorry... No requested product quantity to place the order...";
	}
	/*if($x == count($_POST['productName'])) 
	{
		$orderItemStatus = true;
	}	
	$connect->query($updateProductTable);
				// add into sorderitem
				$orderItemSql = "INSERT INTO sorderitem (sOrderID, productID, qty, rate, tot) 
				VALUES ('$sOrderID', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rate'][$x]."', '".$_POST['totalValue'][$x]."')";
				$connect->query($orderItemSql);	
	$valid['success'] = true;
	$valid['messages'] = "Order Successfully placed...";*/		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);