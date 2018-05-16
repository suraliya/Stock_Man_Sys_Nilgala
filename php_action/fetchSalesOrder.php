<?php 	

require_once 'core.php';

$sql = " SELECT * FROM salesorder WHERE deleted = 0 ";
$result = $connect->query($sql);

$output = array('data' => array());
$button = "";

if($result->num_rows > 0) 
{ 
 $paymentType = "";
 $orderStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) 
 {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM sorderitem WHERE sOrderID = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();
	
	//get cus data
	$cusDataSql = " SELECT * FROM customer WHERE cusID = $row[2] ";
	$getcusData = $connect->query($cusDataSql);
	while($cusData = $getcusData->fetch_row())
	{
		$cusName = $cusData[1]." ".$cusData[2];
		$cusTP = $cusData[6];
	}
	
	// active 
 	if($row[6] == 1) 
	{ 		
 		$paymentType = "<label class='label label-info'>Cash</label>";
 	} 
	else if($row[6] == 2) 
	{ 		
 		$paymentType = "<label class='label label-default'>Cheque</label>";
 	} 
	else 
	{ 		
 		$paymentType = "<label class='label label-success'>Credit Card</label>";
 	} // /else
		
	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">	    
	    <li><a type="button" onclick="printSalesOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Print/ View </a></li>	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';	

 	$output['data'][] = array( 		
 		// #
 		$x,
 		// order date
 		$row[1],
 		// Supplier name
 		$cusName, 
 		// Supplier contact
 		$cusTP, 
		// no of items
		$itemCountRow,
 		//order amt, 		 	
 		$row[5],
		//order status
		$paymentType,
 		// button		
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);