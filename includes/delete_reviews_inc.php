<?php
   if(isset($_GET['delete_id'])) {
      include_once 'db_conn_inc.php';

      $feedbackID = $_GET['delete_id'];

      //Delete query
      $sql = "DELETE FROM feedback WHERE feedback_id='$feedbackID'";
      $result = mysqli_query($conn, $sql);

      //Checking if deleted or not
      if(!$result) {
         header("Location: ../Manage_reviews.php?delete=unsuccess");
         exit();
      } else {
         header("Location: ../Manage_reviews.php?delete=success");
         exit();
      }
   }
?>