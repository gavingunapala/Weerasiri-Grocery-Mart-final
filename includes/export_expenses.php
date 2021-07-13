<?php  
 
include_once 'db_conn_inc.php';
if(isset($_POST["export"]))
{

 $query = "SELECT * FROM expense";

if(isset($_POST['submit'])) {
         $searchKey = $_POST['search'];
         $query= "SELECT * FROM expense WHERE vehicle_id LIKE '%$searchKey%'";
      } 

 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
 $output ='
   <table  >  
                    <tr >  
                         <th>Expense ID</th>  
                         <th>Vehicle ID</th>  
                         <th>Description</th>  
       			 <th>Cost</th>
       			 <th>Date</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["expense_id"].'</td>  
                         <td>'.$row["vehicle_id"].'</td>  
                         <td>'.$row["description"].'</td>  
       			 <td>'.$row["cost"].'</td>  
       			 <td>'.$row["date"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Expenses_report.xls');
  echo $output;
 }
}
?>