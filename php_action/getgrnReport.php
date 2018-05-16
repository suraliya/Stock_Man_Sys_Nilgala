<?php 

require_once 'core.php';
$zonedate = new DateTime("now", new DateTimeZone('Asia/Colombo') );
if($_POST) 
{
	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT supplier.supName,supplier.supTp,purchaseorder.pOrderAmt,grn.grnAmt,grn.grnDate 
			FROM grn INNER JOIN purchaseorder ON grn.pOrderID = purchaseorder.pOrderID INNER JOIN supplier ON purchaseorder.supID = supplier.supID 
			WHERE grn.grnDate >= '$start_date' AND grn.grnDate <= '$end_date'";
	$query = $connect->query($sql);
	
	echo
	'<pre>
	Date :'.$zonedate->format('Y-m-d').'<b>             Nilgala Drinking Water System</b>  
	Time :'.$zonedate->format('H:i:s').'		<b>GRN Report  '.$startDate.' to '.$endDate.'</b></br></br>
	';
	
	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>GRN Date</th>
			<th>Supplier Name</th>
			<th>Supplier Contact</th>
			<th>Purchase Order Amount</th>
			<th>GRN Amount</th>
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['pOrderDate'].'</center></td>
				<td><center>'.$result['supName'].'</center></td>
				<td><center>'.$result['supTp'].'</center></td>
				<td><center>'.$result['pOrderAmt'].'</center></td>
			</tr>';	
			$totalAmount += $result['pOrderAmt'];
		}
		$table .= '
		</tr>
	</table>
	';	
	
	echo $table;
}

?>