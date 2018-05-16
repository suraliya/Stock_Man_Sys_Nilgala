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

	$sql = "SELECT rmreturn.returnDate, rmreturn.returnTime, rmreturn.orderReturnAmt,supplier.fname,supplier.lname,supplier.supTp,rmreturnitem.qty,rmitem.rmName 
			FROM supplier 
			INNER JOIN rmreturn ON supplier.supID = rmreturn.supID
			INNER JOIN rmreturnitem ON rmreturn.rmReturnID = rmreturnitem.rmReturnID 
			INNER JOIN rmitem ON rmreturnitem.rmID = rmitem.rmID
			WHERE rmreturn.returnDate >= '$start_date' AND rmreturn.returnDate <= '$end_date'";
	$query = $connect->query($sql);
	
	echo
	'<pre>
	Date :'.$zonedate->format('Y-m-d').'<b>             Nilgala Drinking Water System</center></b>  
	Time :'.$zonedate->format('H:i:s').'<b>       Row Material Returns Report  '.$startDate.' to '.$endDate.'</center></b></br></br>
	';
	
	$table = '
	<table  border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Return Date</th>
			<th>Return Time</th>
			<th>Return Order Amount</th>
			<th>Item Name</th>
			<th>Item Quantity</th>
			<th>supplier Name</th>
			<th>supplier Tp</th>
		</tr>

		<tr>';
		while ($result = $query->fetch_assoc()) 
		{
			$table .= '
			<tr>
				<td><center>'.$result['returnDate'].'</center></td>
				<td><center>'.$result['returnTime'].'</center></td>
				<td><center>'.$result['orderReturnAmt'].'</center></td>
				<td><center>'.$result['rmName'].'</center></td>
				<td><center>'.$result['qty'].'</center></td>
				<td><center>'.$result['fname']." ".$result['lname'].'</center></td>
				<td><center>'.$result['supTp'].'</center></td>
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