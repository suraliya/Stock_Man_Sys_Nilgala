<?php 	

require_once 'core.php';

$supplierID = $_POST['supplierID'];

$sql = "SELECT supID, fname, lname, address1, address2, address3, supTp, supNIC FROM supplier WHERE supID = $supplierID ";

$result = $connect->query($sql);

if($result->num_rows > 0) 
{ 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);

?>

