<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST)
{		
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) 
	{	
		$updateRMQuantitySql = "SELECT rmQty FROM rmitem WHERE rmID = ".$_POST['productName'][$x]."";
		$updateRMQuantityData = $connect->query($updateRMQuantitySql);		
		
		while ($updateRMQuantityResult = $updateRMQuantityData->fetch_row()) 
		{
			if($updateRMQuantityResult[0] >= $_POST['quantity'][$x])
			{
				$sql = "INSERT INTO issuerm (date, time ) VALUES ('$date', '$time')";	
				$issuermID=" ";	
				if($connect->query($sql) === true) 
				{
					$issuermID = $connect->insert_id;
					$valid['issuermID'] = $issuermID;
				}
				
				// add into issuermitem
				$orderItemSql = "INSERT INTO issuermitem (issueRMID, rmID, qty) VALUES ('$issuermID', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."')";
				$connect->query($orderItemSql);	
				
				$qtyVali = true;		
				$updateQuantity[$x] = $updateRMQuantityResult[0] - $_POST['quantity'][$x];
				$updateProductTable = "UPDATE rmitem SET rmQty = '".$updateQuantity[$x]."' WHERE rmID = ".$_POST['productName'][$x]." ";
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
		if($connect->query($updateProductTable) === true ) 
		{
			$valid['success'] = true;
			$valid['messages'] = "Row-materials Successfully issued ...";
		}
		else
		{					
			$valid['success'] = false;
			$valid['messages'] = "Error while issuing raw materials..";
		}
	}
	else if($qtyVali == false)
	{			
		$valid['success'] = false;
		$valid['messages'] = "Sorry... Cannot issue requested quantity... ";	
	}
	
	$connect->close();

	echo json_encode($valid);
} // /if $_POST
//echo json_encode($valid);
?>