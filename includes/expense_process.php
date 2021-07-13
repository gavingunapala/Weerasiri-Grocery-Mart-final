<?php
if(isset($_POST['addexpense']))
{   
include_once 'db_conn_inc.php';
   
    $vehicle_id = $_POST['vehicle_id'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $date = $_POST['date'];
    $sql = "INSERT INTO expense (vehicle_id, description, cost, date)
    VALUES ( $vehicle_id,'$description',$cost,'$date')";
    if (mysqli_query($conn, $sql)) {
      header("Location: ../Enter_expenses.php?expense=success");
         exit();
    } else {
     header("Location: ../Enter_expenses.php?expense=unsuccess");
         exit();
    }
 mysqli_close($conn);
}
?>