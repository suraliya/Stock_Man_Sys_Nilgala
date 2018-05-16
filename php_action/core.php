<?php 

session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location: http://localhost/stock/index.php');	
} 

?>

<?php 
	date_default_timezone_set('Asia/Colombo');  
	$date=date("Y-m-d");
	$time=date("h:i:s a");
?>