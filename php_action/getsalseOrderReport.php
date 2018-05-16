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

	$sql = "SELECT customer.fname,customer.lname,customer.cusTp,salesorder.discount,salesorder.grandTot,salesorder.sOrderDate,salesorder.payType
			FROM salesorder
			INNER JOIN customer ON salesorder.cusID = customer.cusID 
			WHERE salesorder.sOrderDate >= '$start_date' AND salesorder.sOrderDate <= '$end_date' and salesorder.deleted = 0";
	$query = $connect->query($sql);
	$res = $query->fetch_assoc();
	if($res['payType'] == 1)
	{
		$var = "Cash";
	}
	else if($res['payType'] == 2)
	{
		$var = "Cheque";
	}
	else if($res['payType'] == 3)
	{
		$var = "Credit Card";
	}
	echo
	'<pre>
	Date :'.$zonedate->format('Y-m-d').'<b>             Nilgala Drinking Water System</b>  
	Time :'.$zonedate->format('H:i:s').'		<b>Salse Oredr Report  '.$startDate.' to '.$endDate.'</b></br></br>
	';
	
	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Order Date</th>
			<th>Customer Name</th>
			<th>Customer Contact</th>
			<th>Payment Type</th>
			<th>Discount</th>
			<th>Grand Total</th>
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) 
		{
			$table .= '
			<tr>
				<td><center>'.$result['sOrderDate'].'</center></td>
				<td><center>'.$result['fname']." ".$result['lname'].'</center></td>
				<td><center>'.$result['cusTp'].'</center></td>
				<td><center>'.$var.'</center></td>
				<td><center>'.$result['discount'].'</center></td>
				<td><center>'.$result['grandTot'].'</center></td>
			</tr>';	
			$totalAmount += $result['grandTot'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="5"><center>Total Amount</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	
	
	echo $table;
}

?>