<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Stock</li>
		  <li class="active">Raw Materials</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Raw Materials </div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>
				
				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" id="addIssueRMBtn" data-toggle="modal" data-target="#issueRowMaterialModel"> <i class="glyphicon glyphicon-plus-sign"></i> Issue Raw Material </button>
					<button class="btn btn-default button1" id="addNewRMCategoryBtn" data-toggle="modal" data-target="#addNewRMCategoryModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Category </button>
				</div> <!-- /div-action -->	<br><br>
								
				<table class="table" id="rmCategoryTable">
					<thead>
						<tr>							
							<th>Raw Material Name</th>
							<th>Rate(LKR)</th>
							<th>Quantity</th>
							<th>Status</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<!-- Add new Raw Material Category -->
<div class="modal fade" id="addNewRMCategoryModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="addNewRMCategoryForm" action="php_action/createRMStock.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add new Raw Material Category </h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-RMCategory-messages"></div>

	        <div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label"> Name </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="categoryName" placeholder="Raw-material Name" name="categoryName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	<label for="categoryRate" class="col-sm-3 control-label">Rate </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
						<input type="text" class="form-control" onkeypress="return isNumber(event)" id="categoryRate" placeholder="Rate" name="categoryRate" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>	        
	        <button type="submit" class="btn btn-primary" id="submitNewRMCategoryBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Add </button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / Add new Raw Material Category -->

<!-- Issue Raw Materials -->
<div class="modal fade" id="issueRowMaterialModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
		
		<form class="form-horizontal" method="POST" action="php_action/issurRMStock.php" id="issueRMForm">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-plus"></i> Issue Raw Materials </h4>
			</div>
			<div class="modal-body">
			
			<div class="successIssuedmessages"></div>
				<table class="table" id="issueRMTable">
					<thead>
						<tr>			  			
							<th style="width:40%;"> <center> Material Name </center> </th>
							<!-- <th style="width:20%;">Rate</th> -->
							<th style="width:15%;"> <center> Quantity </center> </th>			  			
							<!-- <th style="width:15%;">Total</th> -->		  			
							<th style="width:10%;"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$arrayNumber = 0;
						for($x = 1; $x < 4; $x++) 
						{ ?>
							<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">
			  				
								<td style="padding-left:40px;">
									<div class="form-group">
										<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
											<option value="">~~SELECT~~</option>
											<?php
												$productSql = "SELECT * FROM rmitem WHERE deleted = 0 AND rmQty != 0";
												$productData = $connect->query($productSql);

												while($row = $productData->fetch_array()) 
												{									 		
													echo "<option value='".$row['rmID']."' id='changeProduct".$row['rmID']."'>".$row['rmName']."</option>";
												} // /while 
											?>
										</select>									
									</div>
								</td>
																
								<td style="padding-left:35px;">
									<div class="form-group">
									<input type="number" name="quantity[]" onkeypress="return isNumber(event)" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
									</div>
								</td>
																
								<td style="padding-left:25px;">
									<button class="btn btn-default removeProductRowBtn" type="button" id="row" onclick="removeRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
								</td>
							</tr>
						<?php
						$arrayNumber++;
						} // /for
						?>
					</tbody>			  	
				</table>	
				
				<div class="modal-footer">					
					<button type="button" class="btn btn-default" onclick="addRow()" id="row" data-loading-text="Loading..." > <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>						
					<button type="button" class="btn btn-default" data-dismiss="modal" > <i class="glyphicon glyphicon-remove-sign"></i> Close </button>
					<button type="reset" class="btn btn-default" > <i class="glyphicon glyphicon-erase"> </i> Reset </button>
					<button type="submit" id="createIssueBtn" data-loading-text="Loading..." class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i> Issue </button>						
				</div>
			</div>
		</form> <!-- /form-->
		
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / Issue Raw Material -->


<!-- edit RM Stock -->
<div class="modal fade" id="editRMModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editRMStockForm" action="php_action/editRMStock.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Raw Material</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-RM-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
				<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
				<span class="sr-only">Loading...</span>
			</div>

		      <div class="edit-RM-result">
		      	<div class="form-group">
		        	<label for="editBrandName" class="col-sm-3 control-label"> Name </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editRMName" placeholder="Raw Material Name" name="editRMName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editBrandStatus" class="col-sm-3 control-label">Rate </label>
		        	<label class="col-sm-1 control-label">: </label>
					<div class="col-sm-8">
					      <input type="text" class="form-control" id="editRMRate" onkeypress="return isNumber(event)" placeholder="Raw-material Rate" name="editRMRate" autocomplete="off">
					   </div>   
		        </div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editBrandFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-success" id="editRMBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit brand -->

<!-- Remove RM Category -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeRMModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Row Material </h4>
      </div>
      <div class="modal-body">
	  
      	<div class="removeRMMessages"></div>

        <p> <b> Do you really want to remove ? </b> </p>
      </div>
      <div class="modal-footer removesupplierFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close </button>
        <button type="button" class="btn btn-danger" id="removeRMBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Remove </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /Remove RM Category -->

<script src="custom/js/rmstock.js"></script>

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