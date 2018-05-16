<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{
	/*$sql = "INSERT INTO addproduct (date, time ) VALUES ('$date', '$time')";
	
	$issueproID;
	
	if($connect->query($sql) === true) 
	{
		$issueproID = $connect->insert_id;
		$valid['issueproID'] = $issueproID;
		
		if(empty($row['batchID']))
			{
				$lastRow = $row['batchID'] = 1000;      
			}
			else
			{
				$lastRow = $row['batchID'] + 1 ;
			}
	}*/
	
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) 
	{	
		//get max batchID
		$sql = " SELECT MAX(batchID) FROM addproduct WHERE productID = ".$_POST['productName'][$x]." ";
		$proData = $connect->query($sql);		
  		while($row = $proData->fetch_array()) 
		{	
			$lastRow =  $row[0] + 1 ;
		}
		
		// add into addproduct
		$addproductsql = "INSERT INTO addproduct (productID, batchID, date, qty) VALUES ('".$_POST['productName'][$x]."', '$lastRow', '$date', '".$_POST['quantity'][$x]."')";
		//$addproductsql = "INSERT INTO user (uID, name) VALUES ('".$_POST['quantity'][$x]."', '$time')";
		$connect->query($addproductsql);
		
		$updateRMQuantitySql = "SELECT productQty FROM production WHERE productID = ".$_POST['productName'][$x]."";
		$updateRMQuantityData = $connect->query($updateRMQuantitySql);		
		
		while ($updateRMQuantityResult = $updateRMQuantityData->fetch_row()) 
		{			
			$updateQuantity[$x] = $updateRMQuantityResult[0] + $_POST['quantity'][$x];							
			// update rmitem table
			$updateProductTable = "UPDATE production SET productQty = '".$updateQuantity[$x]."' WHERE productID = ".$_POST['productName'][$x]." ";
			$connect->query($updateProductTable);
		} // while	
	} // /for quantity
	
	if($connect->query($updateProductTable) === true ) 
	{
		$valid['success'] = true;
		$valid['messages'] = "Product items Successfully added...";
	}
	else
	{					
		$valid['success'] = false;
		$valid['messages'] = "Error while adding Product items..";
	}	
	
	$connect->close();
	
	echo json_encode($valid);

} // /if $_POST
