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

	$sql = "SELECT grnitem.rate,grnitem.qty,rmitem.rmName,grnitem.tot,grn.grnDate 
			FROM grn 
			INNER JOIN purchaseorder ON grn.pOrderID = purchaseorder.pOrderID
			INNER JOIN porderitem ON purchaseorder.pOrderID = porderitem.pOrderID 
			INNER JOIN rmitem ON porderitem.rmID = rmitem.rmID 
			INNER JOIN grnitem ON rmitem.rmID = grnitem.rmID
			WHERE grn.grnDate >= '$start_date' AND grn.grnDate <= '$end_date'";
	$query = $connect->query($sql);
	
	echo
	'<pre>
	Date :'.$zonedate->format('Y-m-d').'<b>             Nilgala Drinking Water System</b>  
	Time :'.$zonedate->format('H:i:s').'		<b>Purchase Oredr Item Report  '.$startDate.' to '.$endDate.'</b></br></br>
	';
	
	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Order Date</th>
			<th>Raw Materil Name</th>
			<th>Raw Materil Quntity</th>
			<th>Raw Materil Rate</th>
			<th>Total Price</th>
		</tr>

		<tr>';
		while ($result = $query->fetch_assoc()) 
		{
			$table .= '
			<tr>
				<td><center>'.$result['grnDate'].'</center></td>
				<td><center>'.$result['rmName'].'</center></td>
				<td><center>'.$result['qty'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
				<td><center>'.$result['tot'].'</center></td>
			</tr>';	
		}
		$table .= '
		</tr>
	</table>
	';	
	
	echo $table;
}

?>