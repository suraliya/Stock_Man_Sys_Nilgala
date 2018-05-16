<?php require_once 'php_action/core.php'; ?>

<?php 
	date_default_timezone_set('Asia/Colombo');  
	$date=date("Y-m-d");
	$time=date("h:i:s a");
?>

<!DOCTYPE html>
<html>
<head>

	<title>Stock Management System</title>

	
	<!-- jquery -->
  <script src="assests/jquery/jquery.min.js"></script>

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--  Paper Dashboard core CSS -->
  <link href="assetss/css/paper-dashboard.css" rel="stylesheet"/>

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

  <!-- file input -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.6/css/fileinput.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
  
  <!-- jquery ui -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"> 

  <!-- jquery ui(js) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <!--  Fonts and icons --> 
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
  <link href="assetss/css/themify-icons.css" rel="stylesheet">

  <!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->

  <!-- jQuery 
  <script src="vendors/jquery/dist/jquery.min.js"> </script>-->

  <script src="vendors/datepicker.js"> </script>


  <!-- bootstrap js 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --> 

  


</head>
<body>

 <?php 
 
//$uname =  $_SESSION['name'];

//Manager priviledges 

if($_SESSION['type'] == 'Manager')
    {
  echo '<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header"><img src = "nilgala_logo.jpeg" width = "120px" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

      	<li id="navDashboard"><a href="index.php"> <img src="https://png.icons8.com/dashboard/Dusk_Wired/18/000000"/> <b> Dashboard </b> </a></li>  

		<li class="dropdown" id="navReports">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="https://png.icons8.com/purchase-order/dotty/20/000000"/> Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavSalseOrderReport"><a href="report.php?o=salseorder"> <i class="glyphicon glyphicon-edit" ></i> Sales Orders</a></li>            
            <li id="topNavpurchaseorderReport"><a href="report.php?o=purchaseorder"> <i class="glyphicon glyphicon-edit"></i> Purchase Orders </a></li>
			<li id="topNavsalseorderitemReport"><a href="report.php?o=salseorderitem"> <i class="glyphicon glyphicon-edit"></i> Sales Order Item</a></li>
			<li id="topNavpurchaseorderitemReport"><a href="report.php?o=purchaseorderitem"> <i class="glyphicon glyphicon-edit"></i> Puchase Order Item</a></li>
			<li id="topNavirmReport"><a href="report.php?o=irm"> <i class="glyphicon glyphicon-edit"></i> Issu Row Materials </a></li>
			<li id="topNavipReport"><a href="report.php?o=ip"> <i class="glyphicon glyphicon-edit"></i> Issu Production </a></li>
			<li id="topNavprReport"><a href="report.php?o=pr"> <i class="glyphicon glyphicon-edit"></i> Product Returns </a></li>
			<li id="topNavrmrReport"><a href="report.php?o=rmr"> <i class="glyphicon glyphicon-edit"></i> Row Material Returns </a></li>
			<li id="topNavdpReport"><a href="report.php?o=dp"> <i class="glyphicon glyphicon-edit"></i> Damaged Product </a></li>
			<li id="topNavdrmReport"><a href="report.php?o=drm"> <i class="glyphicon glyphicon-edit"></i> Damaged Row Material </a></li>
			<li id="topNavmessageReport"><a href="report.php?o=message"> <i class="glyphicon glyphicon-edit"></i> Message</a></li>            
          </ul>
        </li>         
        
		<li id="navSMS"><a href="sms.php"> <img src="https://png.icons8.com/message/win8/18/000000"> Send Messages </a> </li> 
				
        <li class="dropdown" id="navUserSettings">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-cogs"></i> User Settings <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavARUser"><a href="usersetting.php?o=add"> <img src="https://png.icons8.com/add-user-male/ios7/20/000000"/> Add/Remove user  </a></li>            
            <li id="topNavManageUser"><a href="usersetting.php?o=manusr"> <img src="https://png.icons8.com/user-rights/ios7/20/000000"/> Manage User </a></li>
          </ul>
        </li> 
 	 
		
        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="https://png.icons8.com/user-male/ios11/22/000000"/> <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavSetting"><a href="setting.php"> <img src="https://png.icons8.com/profile/androidL/20/000000"/> Profile </a></li>            
            <li id="topNavLogout"><a href="logout.php"> <img src="https://png.icons8.com/logout-rounded-down/ios7/20/000000"/> Logout</a></li>            
          </ul>
        </li>     
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">';
}

//Stock Manager priviledges
else //if($_SESSION['type'] == 'Stock Manager')	
{
	echo '<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header"><img src = "nilgala_logo.jpeg" width = "120px" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

        <li id="navDashboard"><a href="index.php"> <img src="https://png.icons8.com/dashboard/Dusk_Wired/18/000000"/> <b> Dashboard </b> </a></li>   	

        <li class="dropdown" id="navStock">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="https://png.icons8.com/hangar/ios7/20/000000"/> Stock <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavRMStock"><a href="rmstock.php"> <img src="https://png.icons8.com/amazon-s3/ios7/20/000000"/> Row Materials </a></li>            
            <li id="topNavproductionStock"><a href="production.php"> <img src="https://png.icons8.com/mini-bar/ios7/20/000000"/> Production </a></li>            
          </ul>
        </li> 	

		<li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="https://png.icons8.com/trolley/Dusk_Wired/20/000000"/> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddsalesOrder"><a href="salesOrders.php?o=add"> <img src="https://png.icons8.com/truck/ios7/20/000000"/> Place Sales Order</a></li>                  
			<li id="topNavManageselsOrder"><a href="salesOrders.php?o=manord"> <img src="https://png.icons8.com/restore-window/Dusk_Wired/20/000000"/> Manage Sales Orders</a></li>
			<li id="topNavAddpurchaseOrder"><a href="purchaseOrder.php?o=add"> <img src="https://png.icons8.com/delivered/ios7/20/000000"/> Place Purchase Order</a></li> 
            <li id="topNavManagepurchaseOrder"><a href="purchaseOrder.php?o=manord"> <img src="https://png.icons8.com/restore-window/Dusk_Wired/20/000000"/> Manage Purchase Orders</a></li>        
		   </ul>
        </li>       
		
		<li class="dropdown" id="navreturn">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="https://png.icons8.com/return/Dusk_Wired/20/000000"/> Returns <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavreturnproduct"><a href="return.php?o=pReturn"> <img src="https://png.icons8.com/enter/win10/20/000000"> Product Returns </a></li>            
            <li id="topNavreturnrmproduct"><a href="return.php?o=rmReturn"> <img src="https://png.icons8.com/enter/androidL/20/000000"> Row Material Returns </a></li>
            <li id="topNavreturndproduct"><a href="return.php?o=damPro"> <img src="https://png.icons8.com/broken-bottle/ios7/20/000000"/> Damaged Product</a></li>            
            <li id="topNavreturndrmproduct"><a href="return.php?o=damRM"> <img src="https://png.icons8.com/particle/ios7/20/000000"/> Damaged Row Material</a></li>            
          </ul>
        </li> 
		
		<li id="navsupplier"><a href="supplier.php"> <img src="https://png.icons8.com/supplier/Dusk_Wired/18/000000"> Supplier </a></li>

        <li id="navCustomer"><a href="customer.php"> <img src="https://png.icons8.com/fairytale/win10/20/000000"> Customer</a></li>           
      
        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="https://png.icons8.com/user-male/ios11/22/000000"/> <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavSetting"><a href="setting.php"> <img src="https://png.icons8.com/profile/androidL/20/000000"/> Profile </a></li>            
            <li id="topNavLogout"><a href="logout.php"> <img src="https://png.icons8.com/logout-rounded-down/ios7/20/000000"/> Logout</a></li>            
          </ul>
        </li>        
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>
  <div class="container">';
}
  ?>