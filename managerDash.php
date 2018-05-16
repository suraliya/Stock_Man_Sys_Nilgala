<?php 
$query = mysqli_query($connect, "SELECT productQty FROM production WHERE productName = '500ml - El'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $btl1 = $row; 
}

$query = mysqli_query($connect, "SELECT productQty FROM production WHERE productName = '1000ml'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $btl2 = $row; 
}

$query = mysqli_query($connect, "SELECT productQty FROM production WHERE productName = '1500ml'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $btl3 = $row; 
}

$query = mysqli_query($connect, "SELECT productQty FROM production WHERE productName = '5l'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $btl4 = $row; 
}

$query = mysqli_query($connect, "SELECT productQty FROM production WHERE productName = '500ml'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $btl5 = $row; 
}

$query = mysqli_query($connect, "SELECT productQty FROM production WHERE productName = '19l'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $btl6 = $row; 
}

$sql = "SELECT SUM(productQty) AS productQty FROM production";
$result = $connect->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $countProduct = $row["productQty"];

        $stock1 = ($btl1[0]/$countProduct)*100;
        $stock2 = ($btl2[0]/$countProduct)*100;
        $stock3 = ($btl3[0]/$countProduct)*100;
        $stock4 = ($btl4[0]/$countProduct)*100;
        $stock5 = ($btl5[0]/$countProduct)*100;
        $stock6 = ($btl6[0]/$countProduct)*100;        
    }
}


$sql = "SELECT SUM(rmQty) AS rmQty FROM rmitem";
$result = $connect->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $rmqty = $row["rmQty"];        
    }
}

$result = $connect->query("SELECT COUNT(*) FROM `supplier` WHERE deleted = 0");
$row = $result->fetch_row();
$suppliers = $row[0];

$result = $connect->query("SELECT COUNT(*) FROM `customer` WHERE deleted = 0");
$row = $result->fetch_row();
$customer = $row[0];


/*$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = "";
while ($orderResult = $orderQuery->fetch_assoc()) {
    $totalRevenue += $orderResult['paid'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;*/

////////////////////////////////////////////////////////////////////


 /*//$chart = array('stock1' => '', 'stock2' => '', 'stock3' => '', 'stock4' => '', 'stock5' => '');
$valid['success'] = array('success' => false, 'stock1' => '', 'stock2' => '', 'stock3' => '', 'stock4' => '', 'stock5' => '');

//$array = array("const1" => "val", "const2" => "val2");
$query = mysqli_query($connect, "SELECT rmQty FROM rmitem WHERE rmName = '500ml EB'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $etl1 = $row; 
}

$query = mysqli_query($connect, "SELECT rmQty FROM rmitem WHERE rmName = '1000ml EB'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $etl2 = $row; 
}

$query = mysqli_query($connect, "SELECT rmQty FROM rmitem WHERE rmName = '1.5l EB'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $etl3 = $row; 
}

$query = mysqli_query($connect, "SELECT rmQty FROM rmitem WHERE rmName = '19l EB'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $etl4 = $row; 
}

$query = mysqli_query($connect, "SELECT rmQty FROM rmitem WHERE rmName = '750ml EB'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $etl5 = $row; 
}

/*$query = mysqli_query($connect, "SELECT rmQty FROM rmitem WHERE rmName = '19l'");
$table = null;
while ($row = mysqli_fetch_array($query)) 
{
    $btl6 = $row; 
}*/

/*$sql = "SELECT SUM(rmQty) AS rmQty FROM rmitem";
$result = $connect->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $countProduct = $row["rmQty"];

        $stocke1 = ($etl1[0]/$countProduct)*100;
        $stocke2 = ($etl2[0]/$countProduct)*100;
        $stocke3 = ($etl3[0]/$countProduct)*100;
        $stocke4 = ($etl4[0]/$countProduct)*100;
        $stocke5 = ($etl5[0]/$countProduct)*100;
        
    }
    //$valid['order_id'] = $order_id;
    $valid['stock1'] = $stocke1;
    $valid['stock2'] = $stocke2;
    $valid['stock3'] = $stocke3;
    $valid['stock4'] = $stocke4;
    $valid['stock5'] = $stocke5;

    /*$chart['stock1'] = $stocke1;
    $chart['stock2'] = $stocke2;
    $chart['stock3'] = $stocke3;
    $chart['stock4'] = $stocke4;
    $chart['stock5'] = $stocke5;*/
   
    //echo json_encode($valid);
    /*$temp = json_encode($chart);

    echo $temp;
}*/

$connect->close();

?>
                
               

                    <div class="col-lg-3 col-sm-6" style="width: 280px;">

                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Product</p>
                                            <span class="badge pull pull-right"><?php echo $countProduct; ?></span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i>Check now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    


                    <div class="col-lg-3 col-sm-7" style="width: 280px;">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-truck"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Suppliers</p>
                                            <span class="badge pull pull-right"><?php echo  $suppliers; ?></span>   
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i>Check now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-7" style="width: 280px;">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-truck"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Customers</p>
                                            <span class="badge pull pull-right"><?php echo  $customer; ?></span>   
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i>Check now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="width: 280px;">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-time"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                           
                                            <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>   
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Check now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
      
            <div class="col-md-12">
                  <div class="row">
                 
                        <div class="panel panel-body">
                          <div class="x_title">
                            <h4>End Producton as Precentage</h4>
                          </div>

                            <div class="row">
                                <div class="col-xs-2"><h6>500ml</h6>
                                  <span class="chart" data-percent="<?php echo $stock5; ?>">
                                                  <span class="percent"></span>
                                  </span>
                                </div>
                                <div class="col-xs-2"><h6>1l</h6>
                                  <span class="chart" data-percent="<?php echo $stock2; ?>">
                                                  <span class="percent"></span>
                                  </span>
                                </div>
                                <div class="col-xs-2"><h6>1.5l</h6>
                                  <span class="chart" data-percent="<?php echo $stock3; ?>">
                                                  <span class="percent"></span>
                                  </span>
                                </div>

                                  <div class="col-xs-2"><h6>5l</h6>
                                  <span class="chart" data-percent="<?php echo $stock4; ?>">
                                                  <span class="percent"></span>
                                  </span>
                                </div>

                                 <div class="col-xs-2"><h6>19l</h6>
                                  <span class="chart" data-percent="<?php echo $stock6; ?>">
                                                  <span class="percent"></span>
                                  </span>
                                </div>

                                 <div class="col-xs-2"><h6>500ml - El</h6>
                                  <span class="chart" data-percent="<?php echo $stock1; ?>">
                                                  <span class="percent"></span>
                                  </span>
                                </div>
                            
                                
                                <div class="clearfix"></div>
                          </div>

                        </div>   
                </div>
            </div>
           



<script src="abc.js"></script>

