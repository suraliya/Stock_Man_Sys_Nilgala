 <?php  
 $connect = mysqli_connect("localhost", "root", "", "ndws_ims_db");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM customer WHERE cusName LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="lis" value='.$row[3].'>'.$row["cusName"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li class="lis">Customer Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?> 