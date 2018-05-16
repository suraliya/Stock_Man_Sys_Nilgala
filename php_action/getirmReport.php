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

	$sql = "SELECT issuerm.date,issuerm.time,issuermitem.qty,rmitem.rmName
			FROM issuerm 
			INNER JOIN issuermitem ON issuerm.issueRMID = issuermitem.issueRMID
			INNER JOIN rmitem ON issuermitem.rmID = rmitem.rmID
			WHERE issuerm.date >= '$start_date' AND issuerm.date <= '$end_date'";
	$query = $connect->query($sql);
	
	echo
	'<pre>
	Date :'.$zonedate->format('Y-m-d').'<b>				Nilgala Drinking Water System</center></b>  
	Time :'.$zonedate->format('H:i:s').'<b>		Issu Raw Material Report  '.$startDate.' to '.$endDate.'</center></b></br></br>
	';
	
	$table = '
	<table  border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Issue Date</th>
			<th>Isssue Time</th>
			<th>Raw Material Name</th>
			<th>Raw Material Quntity</th>
		</tr>

		<tr>';
		while ($result = $query->fetch_assoc()) 
		{
			$table .= '
			<tr>
				<td><center>'.$result['date'].'</center></td>
				<td><center>'.$result['time'].'</center></td>
				<td><center>'.$result['rmName'].'</center></td>
				<td><center>'.$result['qty'].'</center></td>
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