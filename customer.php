<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>


<!-- data table -->
<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Customer</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Customer</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addCustomerBtn" data-target="#addCustomerModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Customer </button>
				</div> <!-- /div-action -->	<br><br>			
				
				<table class="table" id="manageCustomerTable">
					<thead>
						<tr>
														
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address 1</th>
							<th>Address 2</th>
							<th>Address 3</th>	
							<th>Contact</th>
							<th>NIC</th>							
							
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add Customer -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitCustomerForm" action="php_action/createCustomer.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Customer</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-customer-messages"></div>	      		     	           	       

	        <div class="form-group">
	        	<label for="firstName" class="col-sm-3 control-label">First Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="customerFirstName" placeholder="First Name" name="customerFirstName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="lastName" class="col-sm-3 control-label">Last Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="customerLastName" placeholder="Last Name" name="customerLastName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="address1" class="col-sm-3 control-label">Address Line 1: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="addressLine1" placeholder="Address" name="addressLine1" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="address2" class="col-sm-3 control-label">Address Line 2: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="addressLine2" placeholder="Address" name="addressLine2" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="address3" class="col-sm-3 control-label">Address Line 3: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="addressLine3" placeholder="Address" name="addressLine3" autocomplete="off">
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
	        	<label for="contact" class="col-sm-3 control-label">Contact No: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact No" autocomplete="off">
				      	
				    </div>
	        </div> <!-- /form-group-->	       				        	         	       
        	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createCustomerBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save </button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit Customer -->
<div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Customer</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<!--<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>-->

	      	
				   
				    <div role="tabpanel" class="tab-pane" id="customerInfo">
				    	<form class="form-horizontal" id="editCustomerForm" action="php_action/editCustomer.php" method="POST">				    
				    	<br />

				    	<div id="edit-customer-messages"></div>

				    <div class="form-group">
			        	<label for="editCustomerFirstName" class="col-sm-3 control-label">First Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editCustomerFirstName" placeholder="First Name" name="editCustomerFirstName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editCustomerLastName" class="col-sm-3 control-label">Last Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editCustomerLastName" placeholder="Last Name" name="editCustomerLastName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	    

			        <div class="form-group">
			        	<label for="editAddress1" class="col-sm-3 control-label">Address Line 1: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editAddress1" placeholder="Address Line 1" name="editAddress1" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editAddress2" class="col-sm-3 control-label">Address Line 2: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editAddress2" placeholder="Address Line 2" name="editAddress2" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editAddress3" class="col-sm-3 control-label">Address Line 3: </label>
			        	<label class="col-sm-1 control-labe3">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editAddress3" placeholder="Address Line 3" name="editAddress3" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	        	 

			        <div class="form-group">
			        	<label for="editNIC" class="col-sm-3 control-label">NIC: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editNIC" placeholder="NIC" name="editNIC" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	     	        

			        <div class="form-group">
			        	<label for="editContact" class="col-sm-3 control-label">Contact: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editContact" name="editContact" placeholder="Contact No" autocomplete="off"> 							      	
						    </div>
			        </div> <!-- /form-group-->		                	        

			        <div class="modal-footer editCustomerFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editCustomerBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /customer info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /edit Customer -->

<!-- Remove Customer -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCustomerModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Customer </h4>
      </div>
      <div class="modal-body">

      	<div class="removeCustomerMessages"></div>

        <p><b>Do you really want to remove ?</b></p>
      </div>
      <div class="modal-footer removeCustomerFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close </button>
        <button type="button" class="btn btn-primary" id="removeCustomerBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Remove </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /Remove Customer -->




<script src="custom/js/customer.js"></script>

<?php require_once 'includes/footer.php'; ?>