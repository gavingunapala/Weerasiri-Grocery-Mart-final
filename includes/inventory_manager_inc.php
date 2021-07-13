<?php
   if(isset($_GET['delete_item'])) {
      include_once 'db_conn_inc.php';

      $itemID = $_GET['delete_item'];

      //Delete query
      $sql = "DELETE FROM item WHERE id='$itemID'";
      $result = mysqli_query($conn, $sql);

      //Checking if deleted or not
      if(!$result) {
         header("Location: ../inventory_manager.php?delete=unsuccess");
         exit();
      } else {
         header("Location: ../inventory_manager.php?delete=success");
         exit();
      }
   }
?>