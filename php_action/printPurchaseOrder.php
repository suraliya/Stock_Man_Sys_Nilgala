<?php 	

require_once 'core.php';

$zonedate = new DateTime("now", new DateTimeZone('Asia/Colombo') );

$orderId = $_POST['orderId'];

$sql = "SELECT * FROM purchaseorder WHERE porderID = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[1]; 
$subTotal = $orderData[3];
$supID = $orderData[2];

//get suplier data
$supDataSql = "SELECT fname, lname, supTp FROM supplier WHERE supID = $supID ";

$getSupData = $connect->query($supDataSql);
$supData = $getSupData->fetch_array();

$SupplierName = $supData[0]." ".$supData[1];
$SupplierContact = $supData[2];
 
$orderItemSql=" SELECT rmitem.rmName, porderitem.rate, porderitem.qty, porderitem.tot 
				FROM rmitem, porderitem 
				WHERE rmitem.rmID = porderitem.rmID AND porderitem.porderID = $orderId ";
 
$orderItemResult = $connect->query($orderItemSql);

echo
	'
	<center>		
		<b> Nilgala Drinking Water Systems <br/>  
				Purchase Order   <br/> 
	</center>
	<pre>
	Date :'.$zonedate->format('Y-m-d').'              
	Time :'.$zonedate->format('H:i:s').'</b>
	</pre>	
	';
	
 $table = '
 <table class="tablea" border="1" cellspacing="0" cellpadding="10" width="100%">
	<thead>
		<tr >
			<th colspan="5">

			<center>
				Order No : '.$orderId.' </br>
				Order Date : '.$orderDate.'
				<center>Supplier Name : '.$SupplierName.'</center>
				Contact : '.$SupplierContact.'
			</center>		
			</th>
				
		</tr>		
	</thead>
</table>
<table border="0" width="100%;" cellpadding="5" style="border:1px solid black;border-top-style:1px solid black;border-bottom-style:1px solid black;">

	<tbody>
		<tr>
			<th>#</th>
			<th>Product</th>
			<th>Rate</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>
		<tr>
         <td colspan="5"><hr/></td>
		</tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) 
		{					
			$table .= '<tr>
				<th>'.$x.'</th>
				<th>'.$row[0].'</th>
				<th>'.$row[1].'</th>
				<th>'.$row[2].'</th>
				<th>'.$row[3].'</th>				
			</tr>
			';
			$x++;
		} // /while

		$table .= '<tr>
			<th></th>
			
		</tr>

		<tr>
			<th></th>
		</tr>
		<tr>
         <td colspan="5"><hr/></td>
		</tr>
		
		<tr>			
			<th>Order Amount(LKR)</th>
			<th>'.$subTotal.'</th>			
		</tr>
		
	</tbody>
</table> ';


$connect->close();

echo $table;