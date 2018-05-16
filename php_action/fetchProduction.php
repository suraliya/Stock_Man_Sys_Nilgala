<?php 	

require_once 'core.php';

$sql = "SELECT * FROM production WHERE deleted = 0";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) 
{ 

 // $row = $result->fetch_array();
 $productStatus = ""; 

 while($row = $result->fetch_array()) 
 {
 	$productID = $row[0];
 	
	if($row[3] > 1000 ) 
	{			
		$productStatus = "<label class='label label-success'> Available </label>";
	} 
	else if($row[3] > 0) 
	{			
		$productStatus = "<label class='label label-warning'> Low Stock </label>";
	}
	else
	{
		$productStatus = "<label class='label label-danger'> Not Available </label>";
	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editProductionModel" onclick="editProduction('.$productID.')"> <i class="glyphicon glyphicon-edit"></i> Edit </a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeProductionModal" onclick="removeProduction('.$productID.')"> <i class="glyphicon glyphicon-trash"></i> Remove </a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 
		$row[2],	
		$row[3],
 		$productStatus,
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);