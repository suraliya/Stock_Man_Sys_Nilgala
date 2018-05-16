<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST)
{
	$supplierID 				= $_POST['supplierID'];
	$editsupplierFirstName 		= $_POST['editsupplierFirstName'];
	$editsupplierLastName 		= $_POST['editsupplierLastName']; 
    $editaddress1 				= $_POST['editaddress1'];
    $editaddress2 				= $_POST['editaddress2'];
    $editaddress3 				= $_POST['editaddress3'];
    $nic 						= $_POST['editnic'];
    $supTp 						= $_POST['editsupTp'];
    				
	$sql = "UPDATE supplier SET supID = '$supplierID', fname = '$editsupplierFirstName', lname = '$editsupplierLastName',  address1 = '$editaddress1', address2 = '$editaddress2', address3 = '$editaddress3', supTp = '$supTp', supNIC = '$nic',  deleted = 0 WHERE supID = $supplierID ";

	if($connect->query($sql) === TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} 
	else 
	{
		$valid['success'] = false;
		$valid['messages'] = "Error while updating supplier info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);

?>
 
