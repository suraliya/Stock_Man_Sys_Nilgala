<?php 	

require_once 'core.php';

$sql = " SELECT * FROM purchaseorder WHERE deleted = 0 ";
$result = $connect->query($sql);

$output = array('data' => array());
$button = "";

if($result->num_rows > 0) 
{ 
 
 $orderStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) 
 {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM porderitem WHERE pOrderID = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();
	
	//get suplier data
	$supDataSql = "SELECT fname, lname, supTp FROM supplier WHERE supID = $row[2] ";
	$getSupData = $connect->query($supDataSql);
	while($supData = $getSupData->fetch_row())
	{
		$supName = $supData[0]." ".$supData[1];
		$supTP = $supData[2];
	}

		
	if($row[4] == 1)
	{
		$orderStatus = "<label class='label label-info'>Pending</label>";
		
		$button = '<!-- Single button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Action <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a href="purchaseOrder.php?o=editOrd&i='.$orderId.'"  id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Generate GRN </a></li>
				<li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Print/ View </a></li>								
				<li><a type="button" data-toggle="modal" data-target="#cancelOrderModal" id="cancelOrderModalBtn" onclick="cancelOrder('.$orderId.')"> <img src="https://png.icons8.com/cancel/android/17/000000" /> Cancel Order </a></li>       			  				
			 </ul>
			</div>';
	}
	else if($row[4] == 2)
	{
		$orderStatus = "<label class='label label-success'>Success</label>";
		
		$button = '<!-- Single button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Action <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">								
				<li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Print/ View </a></li>
				<li><a type="button" data-toggle="modal" id="removeOrderModalBtn" data-target="#removeOrderModal" onclick="removeOrder('.$orderId.')"> <img src="https://png.icons8.com/trash-can/win8/17/000000" /> Remove </a></li>
				</ul>
			</div>';		
	}
	else if($row[4] == 3)
	{
		$orderStatus = "<label class='label label-danger'>Canceled</label>";
		
		$button = '<!-- Single button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Action <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Print /View </a></li>				
				<li><a type="button" data-toggle="modal" id="removeOrderModalBtn" data-target="#removeOrderModal" onclick="removeOrder('.$orderId.')"> <img src="https://png.icons8.com/trash-can/win8/17/000000" /> Remove </a></li>
				</ul>
			</div>';
	}
		
	

 	$output['data'][] = array( 		
 		// #
 		$x,
 		// order date
 		$row[1],
 		// Supplier name
 		$supName, 
 		// Supplier contact
 		$supTP, 
		// no of items
		$itemCountRow,
 		//order amt, 		 	
 		$row[3],
		//order status
		$orderStatus,
 		// button		
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);