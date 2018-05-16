<?php 	

require_once 'core.php';

$customerID = $_POST['customerID'];

$sql = " SELECT cusID, fname, lname, address1, address2, address3, cusNIC, cusTP FROM customer WHERE cusID = $customerID ";

$result = $connect->query($sql);

if($result->num_rows > 0) 
{ 
	$row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);

?>




