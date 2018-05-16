<?php 
	require_once 'includes/header.php';
	require_once 'php_action/core.php'; 
?>

<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Send SMS</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-circle-arrow-right"></i> Send SMS</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				
				<form action="php_action/sendsms.php" method="post" class="form-horizontal" id="sendSMSForm">
					<fieldset>
						<legend>Send SMS</legend>

						<div class="sendMessages"></div>	

			  		  <div class="col-md-6">
				 		 <div class="form-group">
				    		<label for="text" class="col-sm-2 control-label">Send To</label>
				    		<div class="col-sm-9">
				      			<select class="form-control" name="userType" id="userType" onchange="update(this.value)">
				      				<option value="">~~SELECT WHO~~</option>
				      				<option value="1">Customer</option>
				      				<option value="2">Supplier</option>
				      			</select>
				    		</div>
				  			</div> <!--/form-group-->	
					  </div>

			  		  <div class="col-md-6">
				 		 <div class="form-group">
				    		<div class="col-sm-9">
				      			<select class="form-control" name="userName" id="userName">
				      				<option value="">~~SELECT TP~~</option>
				      			</select>
				    		</div>
				  			</div> <!--/form-group-->	
					  </div>			  		 

					  <div class="form-group">
					    <label for="text" class="col-sm-1 control-label">Number</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="num" name="num" placeholder="Number" readonly>
					    </div>
					  </div>
					  
					  <div class="form-group">
					    <label for="text" class="col-sm-1 control-label">Message</label>
					    <div class="col-sm-10">
					      <textarea rows="3" class="form-control" id="mess" name="mess" placeholder="Message"></textarea>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-1 col-sm-10">
					      <button type="submit" class="btn btn-primary" id="sendbtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Send</button>
					    </div>
					  </div>


					</fieldset>
				</form>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->


 <script type="text/javascript">
   function update(str)
   {
      var xmlhttp;
 
      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }	
 
      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("userName").innerHTML = xmlhttp.responseText;
        }
      }
 
      xmlhttp.open("GET","php_action/demo.php?opt="+str, true);
      xmlhttp.send();
  }
</script>
<script src="custom/js/sendsms.js"></script>
<?php require_once 'includes/footer.php'; ?>