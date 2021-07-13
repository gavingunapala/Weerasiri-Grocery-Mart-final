<?php
   if(isset($_GET['delete_id'])) {
      include_once 'db_conn_inc.php';

      $expenseID = $_GET['delete_id'];

      //Delete query
      $sql = "DELETE FROM expense WHERE expense_id='$expenseID'";
      $result = mysqli_query($conn, $sql);

      //Checking if deleted or not
      if(!$result) {
         header("Location: ../Expenses_report.php?delete=unsuccess");
         exit();
      } else {
         header("Location: ../Expenses_report.php?delete=success");
         exit();
      }
   }
?>