<?php 

require_once 'core.php';

$sql = "SELECT * FROM supplier WHERE deleted = 0";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) 
{ 

	while($row = $result->fetch_array()) 
	{
		$supplierID = $row[0];

		$button = '<!-- Single button -->
		<div class="btn-group">
		  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
			<li><a type="button" data-toggle="modal" id="editsupplierModalBtn" data-target="#editsupplierModal" onclick="editsupplier('.$supplierID.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
			<li><a type="button" data-toggle="modal" data-target="#removesupplierModal" id="removesupplierModalBtn" onclick="removesupplier('.$supplierID.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
		  </ul>
		</div>';	

		$output['data'][] = array( 		
			//fname
			$row[1], 
			//lname
			$row[2],
			//add1
			$row[3], 		 	
			//add2 
			$row[4],
			//add3
			$row[5],
			// supTp
			$row[7], 		 	
			// nic 
			$row[6],
			// button
			$button 		
			); 	
	} // /while 

}// if num_rows

$connect->close();

echo json_encode($output);

?>