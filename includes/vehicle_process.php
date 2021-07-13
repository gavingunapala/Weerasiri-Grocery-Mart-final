<?php

if(isset($_POST['save']))
{   
include_once 'db_conn_inc.php';

    $vahicle_brand = $_POST['brand'];
    $vehicle_model = $_POST['model'];
    $manufacture_year = $_POST['year'];
    $vehicle_color = $_POST['color'];
    $vehicle_mileage = $_POST['mileage'];
    $vehicle_regno = $_POST['reg'];
   
    $sql = "INSERT INTO vehicle (vahicle_brand,vehicle_model,manufacture_year,vehicle_color,vehicle_mileage,vehicle_regno,vehicle_status)
    VALUES ('$vahicle_brand','$vehicle_model','$manufacture_year','$vehicle_color',$vehicle_mileage,'$vehicle_regno','$vehicle_status')";
    if (mysqli_query($conn, $sql)) {
      header("Location: ../Add_Vehicle.php?add=success");
         exit();
    } else {
     header("Location: ../Add_Vehicle.php?add=unsuccess");
         exit();
    }
 mysqli_close($conn);
}
?>