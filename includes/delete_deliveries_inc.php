<?php
   if(isset($_GET['delete_id'])) {
      include_once 'db_conn_inc.php';

      $deliveryID = $_GET['delete_id'];

      //Delete query
      $sql = "DELETE FROM delivery WHERE delivery_id='$deliveryID'";
      $result = mysqli_query($conn, $sql);

      //Checking if deleted or not
      if(!$result) {
         header("Location: ../add_deliveries.php?delete=unsuccess");
         exit();
      } else {
         header("Location: ../add_deliveries.php?delete=success");
         exit();
      }
   }
?>