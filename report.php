<?php require_once 'includes/header.php'; 

if($_GET['o'] == 'salseorder') { 
	echo "<div class='div-request div-hide'>salseorder</div>";
} else if($_GET['o'] == 'salseorderitem') { 
	echo "<div class='div-request div-hide'>salseorderitem</div>";
} else if($_GET['o'] == 'purchaseorderitem') { 
	echo "<div class='div-request div-hide'>purchaseorderitem</div>";
} else if($_GET['o'] == 'irm') { 
	echo "<div class='div-request div-hide'>irm</div>";
} else if($_GET['o'] == 'ip') { 
	echo "<div class='div-request div-hide'>ip</div>";
} else if($_GET['o'] == 'pr') { 
	echo "<div class='div-request div-hide'>pr</div>";
} else if($_GET['o'] == 'rmr') { 
	echo "<div class='div-request div-hide'>rmr</div>";
} else if($_GET['o'] == 'dp') { 
	echo "<div class='div-request div-hide'>dp</div>";
} else if($_GET['o'] == 'drm') { 
	echo "<div class='div-request div-hide'>drm</div>";
} else if($_GET['o'] == 'purchaseorder') { 
	echo "<div class='div-request div-hide'>purchaseorder</div>";
}  else if($_GET['o'] == 'message') { 
	echo "<div class='div-request div-hide'>message</div>";
} 


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Reports</li>
  <li class="active">
  	<?php if($_GET['o'] == 'salseorder') { ?>
  		Salse Order Report
		<?php } else if($_GET['o'] == 'salseorderitem') { ?>
			Sales Order Item Report
		<?php } else if($_GET['o'] == 'purchaseorderitem') { ?>
			Purchase Order Item Report
		<?php } else if($_GET['o'] == 'irm') { ?>
			Issue Raw Material Report
		<?php } else if($_GET['o'] == 'ip') { ?>
			Issue Production Report
		<?php } else if($_GET['o'] == 'pr') { ?>
			Product Returns Report
		<?php } else if($_GET['o'] == 'rmr') { ?>
			Row Material Returns Report
		<?php } else if($_GET['o'] == 'dp') { ?>
			Damaged Product Report
		<?php } else if($_GET['o'] == 'drm') { ?>
			Damaged Row Material Report
		<?php } else if($_GET['o'] == 'purchaseorder') { ?>
			Purchase Order Report
		<?php } else if($_GET['o'] == 'message') { ?>
			message Report
		<?php } ?>
  </li>
</ol>


<div class="panel panel-default">
	<div class="panel-heading">

		<?php if($_GET['o'] == 'salseorder') { ?>
  		<i class="glyphicon glyphicon-edit"></i>	Salse Order Report
		<?php } else if($_GET['o'] == 'salseorderitem') { ?>
			<i class="glyphicon glyphicon-edit"></i> Sales Order Item Report
		<?php } else if($_GET['o'] == 'purchaseorderitem') { ?>
			<i class="glyphicon glyphicon-edit"></i> Purchase Order Item Report
		<?php } else if($_GET['o'] == 'irm') { ?>
			<i class="glyphicon glyphicon-edit"></i> Issue Raw Material Report
		<?php } else if($_GET['o'] == 'ip') { ?>
			<i class="glyphicon glyphicon-edit"></i> Issue Production Report
		<?php } else if($_GET['o'] == 'pr') { ?>
			<i class="glyphicon glyphicon-edit"></i> Product Returns Report
		<?php } else if($_GET['o'] == 'rmr') { ?>
			<i class="glyphicon glyphicon-edit"></i> Row Material Returns Report
		<?php } else if($_GET['o'] == 'dp') { ?>
			<i class="glyphicon glyphicon-edit"></i> Damaged Product Report
		<?php } else if($_GET['o'] == 'drm') { ?>
			<i class="glyphicon glyphicon-edit"></i> Damaged Row Material Report
		<?php } else if($_GET['o'] == 'purchaseorder') { ?>
			<i class="glyphicon glyphicon-edit"></i> Purchase Order Report
		<?php } else if($_GET['o'] == 'message') { ?>
			<i class="glyphicon glyphicon-edit"></i> message Report
		<?php } ?>

	</div> <!--/panel-->	
	<div class="panel-body">
			
		<?php if($_GET['o'] == 'salseorder') 
		{ 
			// selseorder Report
			?>			
				<form class="form-horizontal" action="php_action/getsalseOrderReport.php" method="post" id="getsalseOrderReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
		
			<?php
		}
		else if($_GET['o'] == 'salseorderitem') 
		{ 
			// sales order item Report
			?>
				<form class="form-horizontal" action="php_action/getsalseOrderItemReport.php" method="post" id="getsalseorderitemReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
			<?php 
		}
		else if($_GET['o'] == 'purchaseorderitem') 
		{ 
			// purchase order item Report
			?>
				<form class="form-horizontal" action="php_action/getpurchaseorderItemReport.php" method="post" id="getpurchaseorderitemReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
			<?php 
		}
		else if($_GET['o'] == 'irm') 
		{ 
			// purchase order item Report
			?>
				<form class="form-horizontal" action="php_action/getirmReport.php" method="post" id="getirmReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
			<?php 
		}
		else if($_GET['o'] == 'ip') 
		{ 
			// purchase order item Report
			?>
				<form class="form-horizontal" action="php_action/getipReport.php" method="post" id="getipReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
			<?php 
		}
		else if($_GET['o'] == 'pr') 
		{ 
			// Product Returns Report
			?>
				<form class="form-horizontal" action="php_action/getprReport.php" method="post" id="getprReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
			<?php 
		}		
		else if($_GET['o'] == 'rmr') 
		{ 
			// Row Material Returns Report
			?>
				<form class="form-horizontal" action="php_action/getrmrReport.php" method="post" id="getrmrReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
			<?php 
		}
		else if($_GET['o'] == 'dp') 
		{ 
			// Damaged Product Report
			?>
				<form class="form-horizontal" action="php_action/getdpReport.php" method="post" id="getdpReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
			<?php 
		}
		else if($_GET['o'] == 'drm') 
		{ 
			// Damaged Row Material Report
			?>
				<form class="form-horizontal" action="php_action/getdrmReport.php" method="post" id="getdrmReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
			<?php 
		}
		else if($_GET['o'] == 'purchaseorder') 
		{ 
			// purchaseorder Report
			?>
				<form class="form-horizontal" action="php_action/getpurchaseorderReport.php" method="post" id="getpurchaseorderReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>
			<?php 
		}
		else if($_GET['o'] == 'message') 
		{ 
			// message Report
			?>
				<form class="form-horizontal" action="php_action/getmessageReport.php" method="post" id="getmessageReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>			
			<?php
		} ?>

		

	</div> <!--/panel-->	
</div> <!--/panel-->

<script src="custom/js/report.js"></script>

<?php require_once 'includes/footer.php'; ?>