<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST)
{
	$customerID 				= $_POST['customerID'];
	$editCustomerFirstName 		= $_POST['editCustomerFirstName'];
	$editCustomerLastName 		= $_POST['editCustomerLastName']; 
    $editAddress1 				= $_POST['editAddress1'];
    $editAddress2 				= $_POST['editAddress2'];
    $editAddress3 				= $_POST['editAddress3'];
    $nic 						= $_POST['editNIC'];
    $contact 					= $_POST['editContact'];   
	
	$sql = " UPDATE customer SET fname = '$editCustomerFirstName', lname = '$editCustomerLastName', address1 = '$editAddress1', address2 = '$editAddress2', address3 = '$editAddress3', cusTP = '$contact', cusNIC = '$nic' WHERE cusID = $customerID ";
	
	if($connect->query($sql) === TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} 
	else 
	{
		$valid['success'] = false;
		$valid['messages'] = "Error while updating Customer info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);

?>
 
