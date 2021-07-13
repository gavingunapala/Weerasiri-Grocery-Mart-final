<?php
   if(isset($_GET['delete_id'])) {
      include_once 'db_conn_inc.php';

      $customerID = $_GET['delete_id'];

      //Delete query
      $sql = "DELETE FROM customer WHERE customer_id='$customerID'";
      $result = mysqli_query($conn, $sql);

      //Checking if deleted or not
      if(!$result) {
         header("Location: ../owner.php?delete=unsuccess");
         exit();
      } else {
         header("Location: ../owner.php?delete=success");
         exit();
      }
   }
?>