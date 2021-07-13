<?php
   if(isset($_POST['submit'])) {
      session_start();
      unset($_SESSION['admin_id']);

      header("Location: ../admin_login.php?logout=success");
      exit();
   }
?>