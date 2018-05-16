<?php 

require_once 'core.php';
		
$sql = " SELECT cusID, fname, lname, address1, address2, address3, cusTP, cusNIC FROM customer WHERE deleted = 0 ";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) 
{ 

 while($row = $result->fetch_array()) 
 {
 	$customerID = $row[0];

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editCustomerModalBtn" data-target="#editCustomerModal" onclick="editCustomer('.$customerID.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeCustomerModal" id="removeCustomerModalBtn" onclick="removeCustomer('.$customerID.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';	

 	$output['data'][] = array( 		
 		
		//first Name
 		$row[1], 
 		//last Name
 		$row[2],
 		//add1 
 		$row[3], 		 	
 		//add2
 		$row[4],
 		//add3
 		$row[5],
 		//Contact 
 		$row[6], 		 	
 		//NIC
 		$row[7], 		 		
 		//Edit, Remove button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);

?>