<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 



if($_GET['o'] == 'add') { 
// add order
	echo "<div class='div-request div-hide'>add</div>";
} else if($_GET['o'] == 'manord') { 
	echo "<div class='div-request div-hide'>manord</div>";
} else if($_GET['o'] == 'editOrd') { 
	echo "<div class='div-request div-hide'>editOrd</div>";
} // /else manage order


?>

<!-- Add purchace order -->
<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Orders</li>
  <li class="active">
  	<?php if($_GET['o'] == 'add') { ?>
  		Purchase Order
		<?php } else if($_GET['o'] == 'manord') { ?>
			Manage Purchase Order
		<?php } else  { ?>
				Generate GRN
		<?php } ?>
  </li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading">

		<?php if($_GET['o'] == 'add') { ?>
  		<i class="glyphicon glyphicon-plus-sign"></i> Place Purchase Order
		<?php } else if($_GET['o'] == 'manord') { ?>
			<i class="glyphicon glyphicon-edit"></i> Manage Purchase Order
		<?php } else if($_GET['o'] == 'editOrd') { ?>
			<i class="glyphicon glyphicon-edit"></i> Generate Purchase GRN 
		<?php } ?>

	</div> <!--/panel-->	
	<div class="panel-body">
			
		<?php if($_GET['o'] == 'add') { 
			// add order
			?>			
		
		<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/createPurchaseOrder.php" id="createOrderForm">
		

			<?php $date = getdate(date("U")); ?>
			  <div class="form-group">
			    <label for="orderDate" class="col-sm-2 control-label">Order Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" readonly id="orderDate" name="orderDate" value = "<?php echo date("Y-m-d"); ?>" />
			    </div>
			  </div> <!--/form-group-->
			<div class="form-group">
			    <label for="SupplierName" class="col-sm-2 control-label">Supplier Name</label>			  
			    <div class="col-sm-10">
					<select class="form-control" id = "SupplierName"  name = "SupplierName" >
			  			<option value=""> ~~Select Supplier~~ </option>						
			  			<?php						
							$sql = " SELECT * FROM supplier WHERE deleted = 0 ";
			  				$supData = $connect->query($sql);							
  							while($row = $supData->fetch_array()) 
							{	
								echo "<option  name='".$row['supTp']."' value='".$row['supID']."'>".$row['fname']." ".$row['lname']."</option>";								
							} // /while								
						?>					
		  			</select>			   
			    </div>
			</div> <!--/form-group-->


				<div class="form-group">
					<label for="text" class="col-sm-2 control-label">Supplier Contact</label>
					<div class="col-sm-10">
					    <input type="text" readonly class="form-control" id="supTP" name="supTP" placeholder="Supplier Contact" >						
					</div>
				</div>			  

			  <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:40%;">Row-material Name</th>
			  			<th style="width:20%;">Rate(LKR)</th>
			  			<th style="width:15%;">Quantity</th>			  			
			  			<th style="width:15%;">Total</th>			  			
			  			<th style="width:10%;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php
			  		$arrayNumber = 0;
			  		for($x = 1; $x < 4; $x++) { ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="margin-left:20px;">
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getRMData(<?php echo $x; ?>)" >
			  						<option value="">~~SELECT~~</option>
			  						<?php
			  							$productSql = "SELECT * FROM rmitem WHERE deleted = 0";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array())
										{									 		
			  								echo "<option value='".$row['rmID']."' id='changeProduct".$row['rmID']."'>".$row['rmName']."</option>";
										} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>
			  				<td style="padding-left:20px; ">			  					
			  					<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" />			  					
			  					<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td style="padding-left:20px;">
			  					<div class="form-group">
			  					<input type="number" name="quantity[]" onkeypress="return isNumber(event)" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td>
			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			</table>
			
			  <div class="col-md-offset-6 col-sm-6">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label"> Order Amount </label>
				    <div class="col-sm-8">
				      <input type="text" readonly class="form-control" id="subTotal" name="subTotal" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				</div> <!--/form-group-->				  					  
			  </div> <!--/col-md-6-->

			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-4 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset </button>
			    </div>
			  </div>
		</form>
<!-- / End of Add purchace order -->

<!-- /Manage purchace order -->	



<?php } 
else if($_GET['o'] == 'manord') 
{ 
	// manage order
?>

	<div id="success-messages"></div>
			
		<table class="table" id="manageOrderTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Order Date</th>
					<th>Supplier Name</th>
					<th>Supplier Contact No</th>
					<th>Total Order Items</th>
					<th>Order Amount</th>
					<th>Order Status</th>
					<th>Option</th>
				</tr>
			</thead>
		</table>

		
<!-- /generate grn -->		
<?php
} 
else if($_GET['o'] == 'editOrd') 
{
?>
			
		<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/generateGRN.php" id="editOrderForm">
		
			<?php $date = getdate(date("U")); ?>
			
  			<?php $orderId = $_GET['i'];

  			$sql = "SELECT supplier.fname, supplier.supTp, purchaseorder.pOrderAmt FROM supplier, purchaseorder WHERE purchaseorder.supID = supplier.supID AND purchaseorder.pOrderID = {$orderId}";

				$result = $connect->query($sql);
				$data = $result->fetch_row();				
  			?>

			  <div class="form-group">
			    <label for="orderDate" class="col-sm-2 control-label">GRN Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="orderDate" name="grnDate" readonly autocomplete="off" value="<?php echo date("Y-m-d"); ?>" />
				  <input type="hidden" name="orderID" id="orderID autocomplete="off" class="form-control" value="<?php echo $orderId; ?>"/>
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="SupplierName" class="col-sm-2 control-label">Supplier Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="SupplierName" name="SupplierName" placeholder="Supplier Name" readonly autocomplete="off" value="<?php echo $data[0] ?>" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="SupplierContact" class="col-sm-2 control-label">Supplier Contact</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="SupplierContact" name="SupplierContact" placeholder="Contact Number" readonly autocomplete="off" value="<?php echo $data[1] ?>" />
			    </div>
			  </div> <!--/form-group-->			  

			  <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:40%;">Row-material Name</th>
			  			<th style="width:20%;">Rate(LKR)</th>
			  			<th style="width:15%;">Quantity</th>			  			
			  			<th style="width:15%;">Total</th>			  			
			  			<th style="width:10%;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php

			  		$orderItemSql = "SELECT * FROM porderitem WHERE pOrderID = {$orderId}";
					$orderItemResult = $connect->query($orderItemSql);
					// $orderItemData = $orderItemResult->fetch_all();						
						
					// print_r($orderItemData);
			  		$arrayNumber = 0;
			  		// for($x = 1; $x <= count($orderItemData); $x++) {
			  		$x = 1;
			  		while($orderItemData = $orderItemResult->fetch_array()) 
					{ 
			  			// print_r($orderItemData); ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="margin-left:20px;">
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getRMData(<?php echo $x; ?>)" >
			  						<option value="">~~SELECT~~</option>
			  						<?php 
			  							$productSql = "SELECT * FROM rmitem WHERE deleted = 0";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array()) 
										{									 		
			  								$selected = "";
			  								if($row['rmID'] == $orderItemData['rmID']) 
											{
			  									$selected = "selected";
			  								} 
											else 
											{
			  									$selected = "";
			  								}

			  								echo "<option value='".$row['rmID']."' id='changeProduct".$row['rmID']."' ".$selected." >".$row['rmName']."</option>";
										} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" value="<?php echo $orderItemData['rate']; ?>" />			  					
			  					<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['rate']; ?>" />			  					
			  				</td>
			  				<td style="padding-left:20px;">
			  					<div class="form-group">
			  					<input type="number" name="quantity[]" onkeypress="return isNumber(event)" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" value="<?php echo $orderItemData['qty']; ?>" />
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" value="<?php echo $orderItemData['tot']; ?>"/>			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['tot']; ?>"/>			  					
			  				</td>
			  				<td>

			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
		  			$x++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>

			<div class="col-md-6">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label">Order Amount</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="subTotal" name="grnAmt" readonly value="<?php echo $data[2] ?>" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" value="<?php echo $data[2] ?>" />
				    </div>
				</div> <!--/form-group-->				
			</div>
			
			<div class="form-group editButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			    <input type="hidden" name="orderId" id="orderId" value="<?php echo $_GET['i']; ?>" />

			    <button type="submit" id="editOrderBtn" data-loading-text="Loading..."  class="btn btn-info"><i class="glyphicon glyphicon-ok-sign"></i> <a  data-toggle="tooltip" title="Generate GRN for selected order"> Generate GRN </a> </button>
			      
			    </div>
			</div>
		</form>
<?php
} 
?>
	</div> <!--/panel-->	
</div> <!--/panel-->	
<!-- /End of Edit purchace order -->	


<!-- cancel order -->
<div class="modal fade" tabindex="-1" role="dialog" id="cancelOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Cancel Order</h4>
      </div>
      <div class="modal-body">

      	<div class="cancelOrderMessages"></div>

        <p><b>Do you really want to cancel this order ? </b> <br/><br/> <b><u>Note:</u></b> <br/> If you cancell this order, you cannot generate GRN for this order... </p>
      </div>
      <div class="modal-footer cancelProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close </button>
        <button type="button" class="btn btn-warning" id="cancelOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Cancel </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /cancel order-->


<!-- Remove order -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Order</h4>
      </div>
      <div class="modal-body">

      	<div class="removeOrderMessages"></div>

        <p><b>Do you really want to Remove this order ? </b> <br/><br/> <b><u>Note:</u></b> <br/>  If you press the 'Remove' button, you never see this order in the list... </p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close </button>
        <button type="button" class="btn btn-danger" id="removeOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Remove </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /Reove order-->


<script src="custom/js/purchaseOrder.js"></script>

<script type="text/javascript">
	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>

<?php require_once 'includes/footer.php'; ?>


	