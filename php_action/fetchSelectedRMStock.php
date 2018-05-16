<?php 	

require_once 'core.php';

$rmID = $_POST['rmID'];

$sql = "SELECT * FROM rmitem WHERE rmID = $rmID";
$result = $connect->query($sql);

if($result->num_rows > 0) 
{ 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);