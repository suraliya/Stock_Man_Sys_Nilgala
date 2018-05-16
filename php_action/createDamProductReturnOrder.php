<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{
	$orderDate 		= $_POST['orderDate'];	
	$cusID 			= $_POST['SupplierName'];	
	$subTotal	 	= $_POST['subTotalValue'];
	$discription    = $_POST['discription'];							
				
	$sql = "INSERT INTO damproreturn (returnDate, cusID, orderReturnAmt, discription, deleted ) VALUES ('$orderDate', '$cusID', '$subTotal', '$discription', 0)";	
	
	if($connect->query($sql) === true) 
	{
		$pReturnID = $connect->insert_id;
		$valid['pReturnID'] = $pReturnID;			
	}
	
	for($x = 0; $x < count($_POST['productName']); $x++) 
	{
		// add into order_item
		$orderItemSql = "INSERT INTO damproreturnitem (damProReturnID, productID, qty, rate, tot) VALUES ('$pReturnID', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."')";
		$connect->query($orderItemSql);								
	}
			
	$valid['success'] 	= true;
	$valid['messages'] 	= "Damaged product returned Successfully...";	
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
