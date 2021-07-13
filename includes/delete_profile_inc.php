<?php
   session_start();
   include_once 'db_conn_inc.php';
   
   //Delete query
   $customerID = $_SESSION['customer_id'];
   $sql = "DELETE FROM customer WHERE customer_id='$customerID'";
   $result = mysqli_query($conn, $sql);

   //Checking if deleted or not
   if(!$result) {
      header("Location: ../customer_profile.php?delete=unsuccess");
      exit();
   } else {
      header("Location: ../index.php?delete=success");
      exit();

      session_unset();
      session_destroy();
   } 
?>