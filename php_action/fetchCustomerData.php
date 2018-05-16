<?php 	

require_once 'core.php';

$sql = "SELECT cusID, fname FROM customer WHERE deleted = 0";

$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);

?>