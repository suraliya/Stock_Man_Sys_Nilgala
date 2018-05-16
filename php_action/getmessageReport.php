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

	$sql = "SELECT * FROM message WHERE msgDate >= '$start_date' AND msgTime <= '$end_date' and deleted = 0";
	$query = $connect->query($sql);
	
	echo
	'<pre>
	Date :'.$zonedate->format('Y-m-d').'<b>             Nilgala Drinking Water System</b>  
	Time :'.$zonedate->format('H:i:s').'		<b>Message Report  '.$startDate.' to '.$endDate.'</b></br></br>
	';
	
	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th> Send Date </th>
			<th> Send Time </th>
			<th>Message SendTo</th>
			<th>Message Description</th>
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['msgDate'].'</center></td>
				<td><center>'.$result['msgTime'].'</center></td>
				<td><center>'.$result['sendTo'].'</center></td>
				<td><center>'.$result['msgDescript'].'</center></td>
			</tr>';	
		}
		$table .= '
		</tr>
	</table>
	';	
	
	echo $table;
}

?>