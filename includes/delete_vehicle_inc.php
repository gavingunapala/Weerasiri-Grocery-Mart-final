<?php
   if(isset($_GET['delete_id'])) {
      include_once 'db_conn_inc.php';

      $vehicleID = $_GET['delete_id'];

      //Delete query
      $sql = "DELETE FROM vehicle WHERE vehicle_id='$vehicleID'";
      $result = mysqli_query($conn, $sql);

      //Checking if deleted or not
      if(!$result) {
         header("Location: ../Vehicles.php?delete=unsuccess");
         exit();
      } else {
         header("Location: ../Vehicles.php?delete=success");
         exit();
      }
   }
?>