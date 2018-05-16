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

	$sql = "SELECT productreturn.returnDate, productreturn.returnTime, productreturn.orderReturnAmt,customer.fname,customer.lname,customer.cusTp,preturnitem.qty,production.productName 
			FROM customer 
			INNER JOIN productreturn ON customer.cusID = productreturn.cusID 
            INNER JOIN preturnitem ON productreturn.pReturnID = preturnitem.pReturnID 
            INNER JOIN production ON preturnitem.productID = production.productID 
			WHERE productreturn.returnDate >= '$start_date' AND productreturn.returnDate <= '$end_date'";
	$query = $connect->query($sql);
	
	echo
	'<pre>
	Date :'.$zonedate->format('Y-m-d').'<b>             Nilgala Drinking Water System</center></b>  
	Time :'.$zonedate->format('H:i:s').'<b>       Product Returns Report  '.$startDate.' to '.$endDate.'</center></b></br></br>
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
				<td><center>'.$result['returnTime'].'</center></td>
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