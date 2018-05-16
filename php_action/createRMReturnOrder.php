<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
//print_r($valid);

if($_POST) 
{
	$orderDate 		= $_POST['orderDate'];	
	$supID 			= $_POST['SupplierName'];	
	$subTotal	 	= $_POST['subTotalValue'];
	$discription    = $_POST['discription'];							
				
	$sql = "INSERT INTO rmreturn (returnDate, supID, orderReturnAmt, discription, deleted ) VALUES ('$orderDate', '$supID', '$subTotal', '$discription', 0)";		
	
	$pReturnID;
	
	if($connect->query($sql) === true) 
	{
		$pReturnID = $connect->insert_id;
		$valid['pReturnID'] = $pReturnID;			
	}
	
	for($x = 0; $x < count($_POST['productName']); $x++) 
	{
		//get available product qty
		$updateRMQuantitySql = "SELECT rmQty FROM rmitem WHERE rmID = ".$_POST['productName'][$x]."";
		$updateRMQuantityData = $connect->query($updateRMQuantitySql);
		
		while($updateRMQuantityResult = $updateRMQuantityData->fetch_row())
		{
			$updateQuantity[$x] = $updateRMQuantityResult[0] + $_POST['quantity'][$x];							
			// update rmitrm table
			$updateProductTable = "UPDATE rmitem SET rmQty = '".$updateQuantity[$x]."' WHERE rmID = ".$_POST['productName'][$x]."";
			$connect->query($updateProductTable);
			
			// add into rereturnitem
			$orderItemSql = "INSERT INTO rmreturnitem (rmReturnID, rmID, qty, rate, tot) VALUES ('$pReturnID', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."')";
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
