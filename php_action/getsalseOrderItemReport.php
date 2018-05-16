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

	$sql = "SELECT sorderitem.qty,sorderitem.rate,salesorder.sOrderDate,production.productName,sorderitem.tot 
			FROM salesorder 
			INNER JOIN sorderitem ON salesorder.sOrderID = sorderitem.sOrderID 
			INNER JOIN production ON sorderitem.productID = production.productID 
			WHERE salesorder.sOrderDate >= '$start_date' AND salesorder.sOrderDate <= '$end_date' and salesorder.deleted = 0";
	$query = $connect->query($sql);
	
	echo
	'<pre>
	Date :'.$zonedate->format('Y-m-d').'<b>             Nilgala Drinking Water System</b>  
	Time :'.$zonedate->format('H:i:s').'		<b>Sels Oredr Item Report  '.$startDate.' to '.$endDate.'</b></br></br>
	';
	
	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Order Date</th>
			<th>Product Name</th>
			<th>Product Quntity</th>
			<th>Product Rate</th>
			<th>Total Price</th>
		</tr>

		<tr>';
		while ($result = $query->fetch_assoc()) 
		{
			$table .= '
			<tr>
				<td><center>'.$result['sOrderDate'].'</center></td>
				<td><center>'.$result['productName'].'</center></td>
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