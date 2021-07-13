<?php
      include_once 'db_conn_inc.php';

      $supplierID = $_GET['supplier_id'];

      //Delete query
      $sql = "DELETE FROM supplier WHERE supplier_id='$supplierID'";
      if(mysqli_query($conn,$sql)){
        header("location:../supplier_manager.php");
      }
      else{
        echo "Something went wrong!";
      }

?>
