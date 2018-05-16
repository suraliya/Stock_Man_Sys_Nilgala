<?php
require_once 'core.php';
//$zonedate = new DateTime("now", new DateTimeZone('Asia/Colombo') );
$valid['success'] = array('success' => false, 'messages' => array());


	if($_POST)
	{	
	// Authorisation details.
	$username =  "tharikatheekshana@gmail.com";
	$hash = "cbb94fa144d0df24877f79f7acc8540a715038d84e965335b5e5ebeebee447df";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "NilgalaDWS"; // This is who the message appears to be from.
	$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers
	$message = $_POST['mess'];

	date_default_timezone_set('Asia/Colombo');  
	$date=date("Y-m-d");
	$time=date("H:i:sa");
	//$date = date('Y-m-d H:i:s');
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	//echo($result);
	
	$sql = " INSERT INTO `message`(`sendTo`, `msgDescript`, `msgDate`, `msgTime`, `deleted`) VALUES ( '$numbers', '$message','$date','$time',0) ";
	
	if($connect->query($sql) === TRUE) 
	{
		$valid['success'] = true;
		$valid['messages'] = "Successfully Send";	
	} 
	else 
	{
		$valid['success'] = false;
		$valid['messages'] = "Error while sending the message";
	}	

	$connect->close();

	echo json_encode($valid);
	
	}

?>