<?php
   if(isset($_GET['delete_id'])) {
      include_once 'db_conn_inc.php';

      $feedbackID = $_GET['delete_id'];

      //Delete query
      $sql = "DELETE FROM customer_order WHERE order_id='$feedbackID'";
      $result = mysqli_query($conn, $sql);

      //Checking if deleted or not
      if(!$result) {
         header("Location: ../order_list.php?delete=unsuccess");
         exit();
      } else {
         header("Location: ../order_list.php?delete=success");
         exit();
      }
   }
?>