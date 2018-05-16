<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 

if($_GET['o'] == 'pReturn') 
{ 
	echo "<div class='div-request div-hide'>pReturn</div>";
} 
else if($_GET['o'] == 'rmReturn') 
{ 
	echo "<div class='div-request div-hide'>rmReturn</div>";
} 
else if($_GET['o'] == 'damPro') 
{ 
	echo "<div class='div-request div-hide'>damPro</div>";
}
else if($_GET['o'] == 'damRM') 
{ 
	echo "<div class='div-request div-hide'>damRM</div>";
} // /else manage order


?>


<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Returns</li>
  <li class="active">
		<?php if($_GET['o'] == 'pReturn') { ?>
			Product Returns
		<?php } else if($_GET['o'] == 'rmReturn') { ?>
			Row Material Returns
		<?php } else if($_GET['o'] == 'damPro') { ?>
			Damaged Product
		<?php } else if($_GET['o'] == 'damRM') { ?>
			Damaged Row Material
		<?php }  ?>				
  </li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading">

		<?php if($_GET['o'] == 'pReturn') { ?>
  		<i class="glyphicon glyphicon-plus-sign"></i> Product Returns
		<?php } else if($_GET['o'] == 'rmReturn') { ?>
			<i class="glyphicon glyphicon-edit"></i> Row Material Returns
		<?php } else if($_GET['o'] == 'damPro') { ?>
			<i class="glyphicon glyphicon-edit"></i> Damaged Products Returns
		<?php } else if($_GET['o'] == 'damRM') { ?>
			<i class="glyphicon glyphicon-edit"></i> Damaged Row Materials Returns
		<?php } ?>

	</div> <!--/panel-->	
	<div class="panel-body">
	
<!-- product return -->			
<?php if($_GET['o'] == 'pReturn') 
{ 		
?>	
		<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/createProductReturnOrder.php" id="createOrderForm">
					
			  <div class="form-group">
			    <label for="orderDate" class="col-sm-2 control-label">Return Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" readonly id="orderDate" name="orderDate" value = '<?php echo $date; ?>'  />
			    </div>
			  </div> <!--/form-group-->
			<div class="form-group">
			    <label for="SupplierName" class="col-sm-2 control-label">Customer Name</label>			  
			    <div class="col-sm-10">
					<select class="form-control" id = "SupplierName"  name = "SupplierName" >
			  			<option value=""> ~~Select Customer~~ </option>						
			  			<?php						
							$sql = " SELECT * FROM customer WHERE deleted = 0 ";
			  				$supData = $connect->query($sql);							
  							while($row = $supData->fetch_array()) 
							{	
								echo "<option  name='".$row['cusTp']."' value='".$row['cusID']."'>".$row['fname']." ".$row['lname']."</option>";							
							} // /while								
						?>					
		  			</select>			   
			    </div>
			</div> <!--/form-group-->


				<div class="form-group">
					<label for="text" class="col-sm-2 control-label">Customer Contact</label>
					<div class="col-sm-10">
					    <input type="text" readonly class="form-control" id="supTP" name="supTP" placeholder="Supplier Contact" >						
					</div>
				</div>			  

			  <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:40%;">Product Name</th>
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

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value="">~~SELECT~~</option>
			  						<?php
			  							$productSql = "SELECT * FROM production WHERE deleted = 0";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array())
										{									 		
			  								echo "<option value='".$row['productID']."' id='changeProduct".$row['productID']."'>".$row['productName']."</option>";
										} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
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
			
			<table>
				<tr>
					<td>
						<div class="form-group">
					    <label for="text" class="col-sm-1 control-label">Discription</label>
					    <div class="col-sm-12">
					      <textarea rows="3" cols="30" class="form-control" id="discription" name="discription" placeholder="Message"></textarea>
					    </div>
					  </div>
					</td>

					<td>
			  <div class="col-md-offset-4 col-sm-11">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label"> Order Amount </label>
				    <div class="col-sm-8">
				      <input type="text" readonly class="form-control" id="subTotal" name="subTotal" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				</div> <!--/form-group-->				  					  
			  </div> <!--/col-md-6-->
			</td>
			  </tr>
			  </table>



			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-4 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset </button>
			    </div>
			  </div>
		</form>
<!-- / End of product return -->

<!-- /RM Return -->	
<?php 
} 
else if($_GET['o'] == 'rmReturn') 
{ 	
?>

<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/createRMReturnOrder.php" id="createOrderForm">
					
			  <div class="form-group">
			    <label for="orderDate" class="col-sm-2 control-label">Return Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" readonly id="orderDate" name="orderDate" value = '<?php echo $date; ?>'  />
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
			  				<td style="padding-left:20px;">			  					
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
			
			 <!-- <div class="col-md-offset-6 col-sm-6">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label"> Order Amount </label>
				    <div class="col-sm-8">
				      <input type="text" readonly class="form-control" id="subTotal" name="subTotal" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				</div> 				  					  
			  </div> /col-md-6-->


			  <table>
				<tr>
					<td>
						<div class="form-group">
					    <label for="text" class="col-sm-1 control-label">Discription</label>
					    <div class="col-sm-12">
					      <textarea rows="3" cols="30" class="form-control" id="discription" name="discription" placeholder="Message"></textarea>
					    </div>
					  </div>
					</td>

					<td>
			  <div class="col-md-offset-4 col-sm-11">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label"> Order Amount </label>
				    <div class="col-sm-8">
				      <input type="text" readonly class="form-control" id="subTotal" name="subTotal" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				</div> <!--/form-group-->				  					  
			  </div> <!--/col-md-6-->
			</td>
			  </tr>
			  </table>


			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-4 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRMRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset </button>
			    </div>
			  </div>
		</form>		
<!-- /end of RM Return -->


<!-- damaged product Return -->		
<?php 
} 
else if($_GET['o'] == 'damPro') 
{
?>
<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/createDamProductReturnOrder.php" id="createOrderForm">
					
			  <div class="form-group">
			    <label for="orderDate" class="col-sm-2 control-label">Return Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" readonly id="orderDate" name="orderDate" value = '<?php echo $date; ?>'  />
			    </div>
			  </div> <!--/form-group-->
			<div class="form-group">
			    <label for="SupplierName" class="col-sm-2 control-label">Customer Name</label>			  
			    <div class="col-sm-10">
					<select class="form-control" id = "SupplierName"  name = "SupplierName" >
			  			<option value=""> ~~Select Customer~~ </option>						
			  			<?php						
							$sql = " SELECT * FROM customer WHERE deleted = 0 ";
			  				$supData = $connect->query($sql);							
  							while($row = $supData->fetch_array()) 
							{	
								echo "<option  name='".$row['cusTp']."' value='".$row['cusID']."'>".$row['fname']." ".$row['lname']."</option>";								
							} // /while								
						?>					
		  			</select>			   
			    </div>
			</div> <!--/form-group-->


				<div class="form-group">
					<label for="text" class="col-sm-2 control-label">Customer Contact</label>
					<div class="col-sm-10">
					    <input type="text" readonly class="form-control" id="supTP" name="supTP" placeholder="Supplier Contact" >						
					</div>
				</div>			  

			  <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:40%;">Product Name</th>
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

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value="">~~SELECT~~</option>
			  						<?php
			  							$productSql = "SELECT * FROM production WHERE deleted = 0";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array())
										{									 		
			  								echo "<option value='".$row['productID']."' id='changeProduct".$row['productID']."'>".$row['productName']."</option>";
										} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
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
			
			<!--  <div class="col-md-offset-6 col-sm-6">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label"> Order Amount </label>
				    <div class="col-sm-8">
				      <input type="text" readonly class="form-control" id="subTotal" name="subTotal" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				</div> 				  					  
			  </div> /col-md-6-->


			  <table>
				<tr>
					<td>
						<div class="form-group">
					    <label for="text" class="col-sm-1 control-label">Discription</label>
					    <div class="col-sm-12">
					      <textarea rows="3" cols="30" class="form-control" id="discription" name="discription" placeholder="Message"></textarea>
					    </div>
					  </div>
					</td>

					<td>
			  <div class="col-md-offset-4 col-sm-11">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label"> Order Amount </label>
				    <div class="col-sm-8">
				      <input type="text" readonly class="form-control" id="subTotal" name="subTotal" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				</div> <!--/form-group-->				  					  
			  </div> <!--/col-md-6-->
			</td>
			  </tr>
			  </table>


			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-4 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset </button>
			    </div>
			  </div>
		</form>
<!-- end of damaged product Return -->


<!-- damaged RM Return -->
<?php 
} 
else if($_GET['o'] == 'damRM') 
{
?>

<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/createDamRMReturnOrder.php" id="createOrderForm">
					
			  <div class="form-group">
			    <label for="orderDate" class="col-sm-2 control-label">Return Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" readonly id="orderDate" name="orderDate" value = '<?php echo $date; ?>'  />
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
			  				<td style="padding-left:20px;">			  					
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
			
			 <!-- <div class="col-md-offset-6 col-sm-6">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label"> Order Amount </label>
				    <div class="col-sm-8">
				      <input type="text" readonly class="form-control" id="subTotal" name="subTotal" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				</div> 				  					  
			  </div> /col-md-6-->

			  <table>
				<tr>
					<td>
						<div class="form-group">
					    <label for="text" class="col-sm-1 control-label">Discription</label>
					    <div class="col-sm-12">
					      <textarea rows="3" cols="30" class="form-control" id="discription" name="discription" placeholder="Message"></textarea>
					    </div>
					  </div>
					</td>

					<td>
			  <div class="col-md-offset-4 col-sm-11">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label"> Order Amount </label>
				    <div class="col-sm-8">
				      <input type="text" readonly class="form-control" id="subTotal" name="subTotal" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				</div> <!--/form-group-->				  					  
			  </div> <!--/col-md-6-->
			</td>
			  </tr>
			  </table>

			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-4 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRMRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset </button>
			    </div>
			  </div>
		</form>		
<!-- /end of RM Return -->
			
		
<!-- end of damaged RM Return -->
<?php
}
?>

	</div> <!--/panel-->	
</div> <!--/panel-->	
<!-- /End of form -->

<script src="custom/js/return.js"></script>

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


	