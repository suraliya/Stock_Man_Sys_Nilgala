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

	$sql = "SELECT damproreturn.returnDate, damproreturn.time, damproreturn.orderReturnAmt,customer.fname,customer.lname,customer.cusTp,damproreturnitem.qty,production.productName 
			FROM customer 
			INNER JOIN damproreturn ON customer.cusID = damproreturn.cusID 
            INNER JOIN damproreturnitem ON damproreturn.damProReturnID = damproreturnitem.damProReturnID
            INNER JOIN production ON damproreturnitem.productID = production.productID 
			WHERE damproreturn.returnDate >= '$start_date' AND damproreturn.returnDate <= '$end_date'";
	$query = $connect->query($sql);
	
	echo
	'<pre>
	Date :'.$zonedate->format('Y-m-d').'<b>             Nilgala Drinking Water System</center></b>  
	Time :'.$zonedate->format('H:i:s').'<b>       Damaged Product Report  '.$startDate.' to '.$endDate.'</center></b></br></br>
	';
	
	$table = '
	<table  border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Return Date</th>
			<th>Return Time</th>
			<th>Return Order Amount</th>
			<th>Product Name</th>
			<th>Product Quantity</th>
			<th>Customer Name</th>
			<th>Customer Tp</th>
		</tr>

		<tr>';
		while ($result = $query->fetch_assoc()) 
		{
			$table .= '
			<tr>
				<td><center>'.$result['returnDate'].'</center></td>
				<td><center>'.$result['time'].'</center></td>
				<td><center>'.$result['orderReturnAmt'].'</center></td>
				<td><center>'.$result['productName'].'</center></td>
				<td><center>'.$result['qty'].'</center></td>
				<td><center>'.$result['fname']." ".$result['lname'].'</center></td>
				<td><center>'.$result['cusTp'].'</center></td>
			</tr>';	
		}
		$table .= '
		</tr>
	</table>
	';	
	
	echo $table;
}


?>

<style>

</style>