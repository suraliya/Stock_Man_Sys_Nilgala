<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());
	
$userName = $_POST['username'];

if($userName) { 

 $sql = "UPDATE users SET deleted = '1' WHERE username = '$userName'";

 if($connect->query($sql) === TRUE) 
 {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed..! Refesh the page ";		
 }
 else
 {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the user";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST

?>