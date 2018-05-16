<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>


<!-- data table -->
<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Supplier</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Supplier</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addSupplierModalBtn" data-target="#addsupplierModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Supplier </button>
				</div> <!-- /div-action -->	<br><br>			
				
				<table class="table" id="managesupplierTable">
					<thead>
						<tr>														
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address 1</th>
							<th>Address 2</th>
							<th>Address 3</th>							
							<th>NIC</th>
							<th>Contact</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add Supplier -->
<div class="modal fade" id="addsupplierModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitSupplierForm" action="php_action/createSupplier.php" method="POST" enctype="multipart/form-data">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><i class="fa fa-plus"></i> Add Supplier</h4>
			 </div>

			<div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-supplier-messages"></div>	      		     	           	       

	        <div class="form-group">
	        	<label for="supplierFirstName" class="col-sm-3 control-label">First Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="supplierFirstName" placeholder="First Name" name="supplierFirstName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="supplierLastName" class="col-sm-3 control-label">Last Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="supplierLastName" placeholder="Last Name" name="supplierLastName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="address1" class="col-sm-3 control-label">Address Line 1: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="address1" placeholder="Line 1" name="address1" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="address2" class="col-sm-3 control-label">Address Line 2: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="address2" placeholder="Line 2" name="address2" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="address3" class="col-sm-3 control-label">Address Line 3: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="address3" placeholder="Line 3" name="address3" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="nic" class="col-sm-3 control-label">NIC: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nic" placeholder="NIC" name="nic" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     	        

	        <div class="form-group">
	        	<label for="supTp" class="col-sm-3 control-label">Contact No: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="supTp" name="supTp" placeholder="Contact No" autocomplete="off">				      	
				    </div>
	        </div> <!-- /form-group-->	
				        	         	       
        	        
			</div> <!-- /modal-body -->
	      
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				
				<button type="submit" class="btn btn-primary" id="createsupplierBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save</button>
			</div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add Supplier -->


<!-- edit Supplier -->
<div class="modal fade" id="editsupplierModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit supplier</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<!--<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
				<span class="sr-only">Loading...</span>
	      	</div>-->		   
				    <div role="tabpanel" class="tab-pane" id="supplierInfo">
				    	<form class="form-horizontal" id="editsuppliertForm" action="php_action/editSupplier.php" method="POST">				    
				    	<br />

				    	<div id="edit-supplier-messages"></div>

				    <div class="form-group">
			        	<label for="editsupplierFirstName" class="col-sm-3 control-label">First Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editsupplierFirstName" placeholder="First Name" name="editsupplierFirstName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editsupplierLastName" class="col-sm-3 control-label">Last Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editsupplierLastName" placeholder="Last Name" name="editsupplierLastName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	    

			        <div class="form-group">
			        	<label for="editaddress1" class="col-sm-3 control-label">Address Line 1: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editaddress1" placeholder="Address Line 1" name="editaddress1" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editaddress2" class="col-sm-3 control-label">Address Line 2: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editaddress2" placeholder="Address Line 2" name="editaddress2" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editaddress3" class="col-sm-3 control-label">Address Line 3: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editaddress3" placeholder="Address Line 3" name="editaddress3" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	        	 

			        <div class="form-group">
			        	<label for="editnic" class="col-sm-3 control-label">NIC: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editnic" placeholder="NIC" name="editnic" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	     	        

			        <div class="form-group">
			        	<label for="editsupTp" class="col-sm-3 control-label">Contact: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editsupTp" name="editsupTp" placeholder="Contact No" autocomplete="off"> 							      	
						    </div>
			        </div> <!-- /form-group-->

			        <div class="modal-footer editsupplierFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editsupplierBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /supplier info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /Supplier brand -->

<!-- Remove supplier -->
<div class="modal fade" tabindex="-1" role="dialog" id="removesupplierModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Supplier </h4>
      </div>
      <div class="modal-body">
	  
      	<div class="removesupplierMessages"></div>

        <p> <b> Do you really want to remove ? </b> </p>
      </div>
      <div class="modal-footer removesupplierFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close </button>
        <button type="button" class="btn btn-primary" id="removesupplierBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Remove </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /Supplier brand -->


<script src="custom/js/supplier.js"></script>

<?php require_once 'includes/footer.php'; ?>