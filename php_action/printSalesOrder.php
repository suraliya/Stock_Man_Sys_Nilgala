<?php 	

require_once 'core.php';

$zonedate = new DateTime("now", new DateTimeZone('Asia/Colombo') );

$orderId = $_POST['orderId'];

$sql = "SELECT * FROM salesorder WHERE sOrderID = $orderId";

//get order data
$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[1];
$cusID = $orderData[2];
$subAmt = $orderData[3];
$discount = $orderData[4];
$grandTot = $orderData[5];
//$payType = $orderData[6];

if( $orderData[6] = 1)
{
	$payType = 'Cash';
}
else if( $orderData[6] = 2)
{
	$payType = 'Cheque';
}
else
{
	$payType = 'Credit Card';
}

//get cusplier data
$cusDataSql = "SELECT fname, lname, cusTp FROM customer WHERE cusID = $cusID ";
$getcusData = $connect->query($cusDataSql);
$cusData = $getcusData->fetch_array();

$CustomerName = $cusData[0]." ".$cusData[1];
$CustomerContact = $cusData[2];
	


 
$orderItemSql=" SELECT production.productName, sorderitem.rate, sorderitem.qty, sorderitem.tot 
				FROM production, sorderitem 
				WHERE production.productID = sorderitem.productID AND sorderItem.sOrderID = $orderId ";
 
$orderItemResult = $connect->query($orderItemSql);

echo
	'
	<center>		
		<b> Nilgala Drinking Water Systems <br/>  
				Sales Order   <br/> 
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
				Customer Invoice </br>
				Invoice No 		: '.$orderId.' </br>
				Order Date 		: '.$orderDate.' </br>
				Customer Name 	: '.$CustomerName.' </br>
				Contact 		: '.$CustomerContact.'
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
			<th>Rate(LKR)</th>
			<th>Quantity</th>
			<th>Total(LKR)</th>
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
			<td>Sub Amount(LKR)</td>
			<td>'.$subAmt.'</td>							
		</tr>
		<tr>
			<td>Discount(LKR)</td>
			<td>'.$discount.'</td>			
		</tr>
		<tr>
			<td><b>Grand Total(LKR)</b></td>
			<td><b>'.$grandTot.'</b></td>			
		</tr>
		<tr>
			<td>Payment Method</td>
			<td>'.$payType.'</td>
		</tr>
		
		
	</tbody>
</table> ';


$connect->close();

echo $table;