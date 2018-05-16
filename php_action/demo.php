<?php
	require_once 'db_connect.php';	
	require_once 'core.php';	
	
  $opt = $_GET['opt'];
 
  switch($opt)
  {
    case 0:
    default:
      echo '
            <option>~~SELECT TP~~</option>
           ';
        break;
    case 1:
									echo '<option>~~SELECT TP~~</option>';
					      			$sql = "SELECT * FROM customer WHERE deleted = 0";
									$result = $connect->query($sql);									
									while($row = $result->fetch_array()) 
									{
										echo "<option name='".$row[6]."' value='".$row[1]."'>".$row[1]." ".$row[2]."</option>";
									} 
									
        break;
		case 2:
									echo '<option>~~SELECT TP~~</option>';
      					      		$sql = "SELECT * FROM supplier WHERE deleted = 0";
									$result = $connect->query($sql);									
									while($row = $result->fetch_array()) 
									{
										echo "<option name='".$row[6]."' value='".$row[1]."'>".$row[1]." ".$row[2]."</option>";
									} 
			
        break;
	
  }
?>