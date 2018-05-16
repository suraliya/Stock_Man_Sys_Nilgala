<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
//print_r($valid);

if($_POST) 
{
	$orderDate 		= $_POST['orderDate'];	
	$cusID 			= $_POST['SupplierName'];	
	$subTotal	 	= $_POST['subTotalValue'];
	$discription    = $_POST['discription'];							
				
	$sql = "INSERT INTO productreturn (returnDate, cusID, orderReturnAmt, discription, deleted) VALUES ('$orderDate', '$cusID', '$subTotal', '$discription', 0)";		
	
	$pReturnID;
	
	if($connect->query($sql) === true) 
	{
		$pReturnID = $connect->insert_id;
		$valid['pReturnID'] = $pReturnID;			
	}
	
	for($x = 0; $x < count($_POST['productName']); $x++) 
	{
		//get available product qty
		$updateProductQuantitySql = "SELECT productQty FROM production WHERE productID = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);
		
		while($updateProductQuantityResult = $updateProductQuantityData->fetch_row())
		{
			$updateQuantity[$x] = $updateProductQuantityResult[0] + $_POST['quantity'][$x];							
			// update production table
			$updateProductTable = "UPDATE production SET productQty = '".$updateQuantity[$x]."' WHERE productID = ".$_POST['productName'][$x]."";
			$connect->query($updateProductTable);
			
			// add into order_item
			$orderItemSql = "INSERT INTO preturnitem (pReturnID, productID, qty, rate, tot) VALUES ('$pReturnID', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."')";
			$connect->query($orderItemSql);	
		}						
	} 

	if($connect->query($updateProductTable) === true)
	{		
		$valid['success'] 	= true;
		$valid['messages'] 	= "Order returned Successfully...";
	}
	else
	{
		$valid['success'] = false;
		$valid['messages'] = "Error while returning order...";
	}		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
